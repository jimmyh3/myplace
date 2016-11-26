<?php

require APP . 'libs/Apartment.php';

/**
 * ApartmentDB class is used to handle Apartments records from the database.
 *
 * @author Jimmy
 */
class ApartmentDB{
    
    /**
     * @param object $db A PDO database connection
     */
    public function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    
    /**
     * Adds the given Apartment object to the 'Apartments' table of the database.
     * 
     * @param Apartment $apt - the Apartment object to add to the database.
     */
    public function addApartment(Apartment $apt)
    {
        $sql = "";  //SQL query to execute.
        $sql_insert     = "INSERT INTO Apartments ";
        $sql_values     = " VALUES ";
        $sql_openPrn    = " ( ";
        $sql_closePrn   = " ) ";
        
        /* Get mapping of Apartments column names to Apartment object value */
        $aptColsValsArray  = $this->apartmentToDBRecord($apt);
        
        $sqlAptColumns = "";  //stores: ( col1, col2, col3 ...)
        $sqlAptValues  = "";  //stores: ( val1, val2, val3 ...)
        
        $colNames = array_keys($aptColsValsArray);
        /* Create Column and Value SQL string for INSERT */
        for ($i = 0; $i < count($aptColsValsArray); $i++)
        {
            /* Append column names together. */
            $sqlAptColumns = $sqlAptColumns . $colNames[$i];
            /* Append values of specific columns respectively. */
            $sqlAptValues  = $sqlAptValues  . $aptColsValsArray[$colNames[$i]];
            
            /* Append comma for the next value */
            if (($i+1) < count($aptColsValsArray)){
                $sqlAptColumns = $sqlAptColumns . " , ";
                $sqlAptValues  = $sqlAptValues  . " , ";
            }
        }
        
        //----------------------------------------------------------------------
        /* Create INSERT query with the column and value strings */
        
        //e.g INSERT INTO Apartments ( <column names> ) VALUES ( <values> )
        $sql = $sql_insert . $sql_openPrn . $sqlAptColumns . $sql_closePrn .
               $sql_values . $sql_openPrn . $sqlAptValues  . $sql_closePrn ;
         
        /* Execute the assembled INSERT query */
        $stmt = $this->db->prepare($sql);
        if ($stmt === false)
        {
            throw new Exception('Could not prepare apartment INSERT query');
        }
        
        $result = $stmt->execute();
        if ($result === false)
        {
            throw new Exception('Could not execute apartment INSERT query');
        }
        
        return true ;
    }
    
    
    /**
     * Delete the targeted database apartment record with the given id.
     * 
     * @param int $apt_id - unique apartment ID to target.
     * @throws Exception - if the query failed.
     * @return boolean - true for success.
     */
    public function deleteApartment($apt_id)
    {
        if ($apt_id === NULL) return false; //Need id to target Apartments record
        
        $sql  = "DELETE FROM Apartments WHERE id = :id";
        
        /* Create and execute the DELETE Apartment query */
        $stmt = $this->db->prepare($sql);
        if ($stmt === false)
        {
            throw new Exception('Could not prepare apartment DELETE query');
        }
        
        $result = $stmt->execute(array("id" => $apt_id));
        if ($result === false)
        {
            throw new Exception('Could not execute apartment DELETE query');
        }
        
        return true;
    }
    
    
    /**
     * Update the apartment database record based on the given Apartment object.
     * 
     * @throws Exception if query somehow failed.
     * @param Apartment $apt
     * @return boolean - 0 for failure, 1 for success.
     */
    public function editApartment(Apartment $apt)
    {
        if ($apt->apartment_id === NULL) return false;  //Need apartment_id to UPDATE
        
        $sql = "";  //SQL query to execute;
        $sql_update_set = "UPDATE Apartments SET ";
        $sql_where      = " WHERE ";
        
        /* Get array mapping of column names to the Apartment object values */
        $aptColsArray = $this->apartmentToDBRecord($apt);
        
        /* This is for SET-ting values of this apartment */
        $sqlSETValues = "";
        
        /* Append all apartment table columns with their values for SET */
        $colKeys = array_keys($aptColsArray);
        for ($i = 0; $i < count($colKeys); $i++)
        {
            $sqlSETValues = $sqlSETValues . 
                            $colKeys[$i]  . " = " . $aptColsArray[$colKeys[$i]];
            
            if (($i + 1) < count($colKeys))
            {
                $sqlSETValues = $sqlSETValues . " , "; //Append comma for set value
            }
        }
        
        //---------------------------------------------------------------------
        
        /* Create UPDATE query */
        $sql = $sql . $sql_update_set;  /* UPDATE Apartments SET */
        $sql = $sql . $sqlSETValues;    /* Append SET [col = val ...] */
        $sql = $sql . $sql_where;       /* Append WHERE */
        $sql = $sql . " id = :id ";     /* Append 'id' as target with parameter */

        /* Prepare and Execute the UPDATE Statement */
        $stmt = $this->db->prepare($sql);
        if ($stmt === false)
        {
            throw new Exception('Could not prepare apartment UPDATE query');
        }
        
        $result = $stmt->execute(array("id" => $apt->apartment_id));
        if ($result === false)
        {
            throw new Exception('Could not execute apartment UPDATE query');
        }
        
        return true;
    }
    
    /**
     * Search the database and return apartments that contains at least some of 
     * the values referenced by the given arrays of search parameters.
     * 
     * @param indexed array $query - values to look through 'rental_term' & 'description' & 'tags'
     * @param associative array $filters - values to look through specific columns.
     * @return array $apartments - an array of Apartments from the database.
     */
    public function search(array $query, array $filters)
    {
        /* Default - get all Apartments */
        $sql = "SELECT * FROM Apartments ";
        
        if (!empty($query) || !empty($filters))
        {
            /* SQL statement for formatting */
            $sql_stmt = "SELECT 
                            %s.* 
                        FROM 
                            (%s) AS %s
                        INNER JOIN
                            (%s) AS %s
                        ON 
                            %s.id = %s.id
                        UNION 
                            (%s)";

            $sql_queryID    = "x1"; //SQL Alias
            $sql_filtersID  = "x2"; //SQL Alias

            $sql_query      = $this->search_query($query);
            $sql_filters    = $this->search_filters($filters);

            /* Replace parameterized SQL statement string with values */
            $sql = sprintf( $sql_stmt, 
                            $sql_filtersID,
                            $sql_query,   $sql_queryID,
                            $sql_filters, $sql_filtersID,
                            $sql_queryID, $sql_filtersID,
                            $sql_filters);
            
        }
        
        /* Execute the Query */
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        /* Get all applicable apartments */
        return $stmt->fetchAll();
        
        /*
         * Resulting SQL example =
         * "
         * SELECT x2.* FROM 
         * (
         *         SELECT * FROM f16g14.apartments
         *         WHERE (tags LIKE '%value%' <repeat)
         * ) AS x1
         * INNER JOIN
         * (
         *         SELECT * FROM f16g14.apartments
         *         WHERE (area_code = 94116, (actual_price BETWEEN min AND max))
         * ) AS x2
         * ON
         * (x1.id = x2.id)
         * UNION
         * (
         *         SELECT * FROM f16g14.apartments
         *         WHERE (area_code = 94116, (actual_price BETWEEN min AND max))
         * )
         * "
         */     
        
    }
    
    /**
     * Retrieve all Apartments belonging to a landlord of the specified ID.
     * @param int $user_id - user landlord ID.
     */
    public function getLandLordApartments($user_id)
    {
        $sql  = "SELECT * FROM Apartments WHERE user_id = :user_id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute(
            array('user_id' => $user_id)
        );
        
        /* Get all applicable apartments */
        $apartmentRecords = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $apartmentRecords;
    }
    
    
    /*
     * --------------------PRIVATE HELPER FUNCTIONS-----------------------------
     */
    
    /**
     * Helper method for search($query, $filters) to handle the $query argument.
     * 
     * @see search($query, $filters) 
     * @param array $query - list of values to look for in Apartment records.
     * @return String $sql - an SQL query to execute to get specific Apartment records.
     */
    private function search_query(array $query)
    {
        
        $sql            = "";   //The SQL query to execute
        $sql_select     = "SELECT * FROM Apartments ";
        $sql_where      = " WHERE ";
        $sql_like       = " LIKE ";
        $sql_openPrcnt  = "'%";    //IMPORTANT: no space after "'%" to isolate value.
        $sql_closePrcnt = "%'";
        $sql_or         = " OR ";
        
        /* These are the apartment table columns $query will 'LIKE %' against. */
        $aprt_cols  = array("area_code",
                            "actual_price",
                            "begin_term",
                            "end_term",
                            "rental_term",
                            //"parking",      //is 1 or 0, too vague to match.
                            //"pet_friendly", //is 1 or 0, too vague to match.
                            "description",
                            "bedroom",
                            "tags"        );
        
        $queryCount     = count($query);
        $aprt_colsCount = count($aprt_cols);
        
        /* Begin SQL query creation */
        $sql .= $sql_select;                         //"SELECT * FROM Apartments
        $sql .= ($queryCount > 0) ? $sql_where : ""; //Append WHERE
        
        $i = 0; //index for $query
        foreach ($query as $query_val)
        {
            $j = 0; //index for aprt_cols
            foreach ($aprt_cols as $aprt_col)
            {
                $sql .= $aprt_col;          //Append apartent_column_name
                $sql .= $sql_like;          //Append LIKE
                $sql .= $sql_openPrcnt;     //Append '%
                $sql .= $query_val;         //Append query_search_value
                $sql .= $sql_closePrcnt;    //Append %'
                $sql .= (($j + 1) < $aprt_colsCount) ? $sql_or : ""; //Append OR
                
                $j++;
            }
            $sql .= (($i + 1) < $queryCount) ? $sql_or : ""; //Append OR
            $i++;
        }
        
        return $sql;
        
        /*
         * Resulting $sql example =
         * "SELECT *
         *  FROM Apartments
         *  WHERE ( tags LIKE '%$query[$i]%' <OR <repeat tags LIKE >> ) "
         * 
         * or returns "SELECT * FROM Apartments" if $query size is zero
         */
        
    }
    
    /**
     * Helper method for search($query, $filters) to handle the $filters argument.
     * 
     * @see search($query, $filters) 
     * @param array $filters - list of key-values
     * @return String $sql - an SQL query to execute to get specific Apartment records.
     */
    private function search_filters(array $filters)
    {
        $sql            = "";   //The SQL query to execute
        $sql_select     = "SELECT * FROM Apartments ";
        $sql_where      = " WHERE ";
        $sql_and        = " AND ";
        $sql_equal      = " = ";
        
        $filtersCount     = count($filters);
        
        /* Begin SQL query creation */
        $sql .= $sql_select;                           //"SELECT * FROM Apartments
        $sql .= ($filtersCount > 0) ? $sql_where : ""; //Append WHERE
        
        $i = 0;
        foreach ($filters as $f_key=>$f_val)
        {
            $sql .= $f_key;         //Append filter_key
            $sql .= $sql_equal;     //Append " = "
            $sql .= $f_val;         //Append filter_value
            $sql .= (($i + 1) < $filtersCount) ? $sql_and : "";
            
            $i++;
        }
        
        return $sql;
        
        /*
         * Resulting $sql example =
         * "SELECT *
         *  FROM Apartments
         *  WHERE ( col_name = value <AND <repeat>> ) "
         * 
         * or returns "SELECT * FROM Apartments" if $query size is zero
         */
        
    }
    
    /**
     * Helper method to generate a SQL BETWEEN query piece for the search() function.
     * <p>Example: "( colname BETWEEN min AND max )"  </p>
     * 
     * @see search($query, $filters) - the calling method.
     * @param String $colName - column to apply the SQL BETWEEN query against.
     * @param array $min_max - array of at least 2 values, being minumum and maximum.
     * @return string - a parentheses SQL BETWEEN query to append to parent query.
     * @throws Exception - if given array is not at least size 2.
     */
    private function search_range($colName, array $min_max)
    {
        $sql = "";  //SQL query to execute.
        $sql_between    = " BETWEEN ";
        $sql_and        = " AND ";
        $sql_openPrn    = " ( ";
        $sql_closePrn   = " ) ";
        $sql_maxInt     = "~0";     //largest BigINT ...for MySQL only I believe.
        $sql_minInt     = "-(~0)";  //largest BigINT multipled by negative.

        $min_max_keys   = array_keys($min_max);
        
        /* empty array return empty string. */
        $min_max_size   = count($min_max);
        
        if ($min_max_size >= 2)
        {
            $temp_min = $min_max[$min_max_keys[0]];
            $temp_max = $min_max[$min_max_keys[1]];
            
            $min = (is_numeric($temp_min)) ? $temp_min : $sql_minInt;
            $max = (is_numeric($temp_max)) ? $temp_max : $sql_maxInt;
            
            /* Create SQL query for using BETWEEN sytax */
            $sql .= $sql_openPrn;     // (
            $sql .= $colName;         // ( colname
            $sql .= $sql_between;     // ( colname BETWEEN
            $sql .= $min;             // ( colname BETWEEN min
            $sql .= $sql_and;         // ( colname BETWEEN min AND
            $sql .= $max;             // ( colname BETWEEN min AND max
            $sql .= $sql_closePrn;    // ( colname BETWEEN min AND max )  
        }else{
            throw Exception("ApartmentDB->search_range() requires an array of at least size 2!");
        }
        
        return $sql;
    }
    
    
    /**
     * Helper method to convert a database apartment record into an Apartment
     * object.
     * @param array $apartmentRecord - a single database apartment record.
     * @return Apartment
     */
    private function dbRecordToApartment($apartmentRecord)
    {
        $aprt = new Apartment();
        
        $aprt->apartment_id = $apartmentRecord['id'];
        $aprt->user_id      = $apartmentRecord['user_id'];
        $aprt->areaCode     = $apartmentRecord['area_code'];
        $aprt->actualPrice  = $apartmentRecord['actual_price'];
        $aprt->beginTerm    = $apartmentRecord['begin_term'];
        $aprt->endTerm      = $apartmentRecord['end_term'];
        $aprt->rentalTerm   = $apartmentRecord['rental_term'];
        $aprt->parking      = $apartmentRecord['parking'];
        $aprt->petFriendly  = $apartmentRecord['pet_friendly'];
        $aprt->description  = $apartmentRecord['description'];
        $aprt->bedroom      = $apartmentRecord['bedroom'];
        $aprt->thumbnail    = $apartmentRecord['thumbnail'];

        //----------------------------------------------------------------------
        /* Parse the 'tags' string into an array of strings */
        $tags_tokenized = explode(",", $apartmentRecord['tags']);
        
        foreach ($tags_tokenized as $tags_token)
        {
            array_push($aprt->tags, trim($tags_token));
        }
        
        //----------------------------------------------------------------------
        /* Get Images of the this Apartment */
        $sql_getimages = "SELECT * FROM Image WHERE apartment_id = :apartment_id";
        
        $stmt=$this->db->prepare($sql_getimages);
        $stmt->execute(array("apartment_id" => $aprt->apartment_id));
        
        //Note, there may be no Images at all.
        $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($images as $image)
        {
            array_push($aprt->image, $image['image']);
        }
        //----------------------------------------------------------------------
        
        return $aprt;
    }
    
    /**
     * Helper method to convert an Apartment object to an array that maps the
     * actual apartment column name to the value stored in the Apartment object.
     * 
     * @param Apartment $apt - the Apartment object to be converted.
     * @return array - key values of column names with values paired.
     */
    private function apartmentToDBRecord(Apartment $apt)
    {
        /*
         * TODO: Apartment->thumbnail and Apartment->image  need implementing.
         * Blob values which are string seems to be causing issues. I assume it
         * may have to do with the fact that the blob consist of commas and
         * apostrophes which may cause SQL to believe they're new arguments.
         */
        
        $aptColsArray = array(  "user_id"       => $apt->user_id,
                                "area_code"     => $apt->areaCode,
                                "actual_price"  => $apt->actualPrice,
                                "begin_term"    => "'" . $apt->beginTerm   . "'",
                                "end_term"      => "'" . $apt->endTerm     . "'",
                                "rental_term"   => "'" . $apt->rentalTerm  . "'", 
                                "parking"       => $apt->parking,
                                "pet_friendly"  => $apt->petFriendly,
                                "description"   => "'" . $apt->description . "'",
                                "bedroom"       => $apt->bedroom,
                                //"thumbnail"     => "'" . $apt->thumbnail   . "'",
                                );
        
        /* Convert Apartment->tags array to a single string with comma separation */  
        $tagStr = "";
        
        for ($i = 0; $i < count($apt->tags); $i++)
        {
            $tagStr = $tagStr . $apt->tags[$i];
            
            if (($i + 1) < count($apt->tags)) { //Append comma for next tag.
                $tagStr = $tagStr . ",";
            }
        }
        
        /* Add the newly converted tag string to the array */
        $aptColsArray['tags'] = "'" . $tagStr . "'";
        
        return $aptColsArray;
    }
    
    public function getImageDB( $id) {
        $sql = "SELECT * FROM Image WHERE apartment_id = " . $id;
        $query = $this->db->prepare( $sql);
        $query->execute();
        
        return $query->fetchAll();
    }
}
