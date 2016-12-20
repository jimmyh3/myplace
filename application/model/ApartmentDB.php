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
     * @throws Exception - throws exception if the SQL query fails.
     * @param Apartment $apt - the Apartment object to add to the database.
     * @return boolean - returns true upon success.
     */
    public function addApartment(Apartment $apt)
    {
        $sql =  " INSERT INTO Apartments 
                  ( %s )
                  VALUES
                  ( %s );
                  ";
        
        $sql_comma = " , ";
        $sql_colon = ":";
        
        $sqlAptColumns = "";  //stores: ( col1, col2, col3 ...)
        $sqlAptValues  = "";  //stores: ( val1, val2, val3 ...)
        
        /* Get mapping of Apartments column names to Apartment object value */
        $aptColsValsArray  = $this->apartmentToDBRecord($apt);
        unset($aptColsValsArray['id']);  //Adding new apartment, 'id' unneeded.
        
        /* Create Column and Value SQL string for INSERT */
        $i = 0; //index
        foreach ($aptColsValsArray as $colName=>$colVal)
        {
            /* Append column names */
            $sqlAptColumns  .= $colName;
            /* Append values of specific columns respectively. */
            $sqlAptValues   .= $sql_colon . $colName;
            
            /* Append comma for the next value */
            if (($i+1) < count($aptColsValsArray)){
                $sqlAptColumns .= $sql_comma;
                $sqlAptValues  .= $sql_comma;
            }
            
            $i++;
        }
        
        /* Create INSERT query with the column and value strings */
        $sql = sprintf($sql, $sqlAptColumns,
                             $sqlAptValues);
        
        /* Execute the assembled INSERT query */
        $stmt = $this->db->prepare($sql);
        if ($stmt === false)
            {throw new Exception('Could not prepare apartment INSERT query'); }
            
        /* Bind columns names listed in $sql to apartment object values */
        foreach ($aptColsValsArray as $colName=>$colVal)
        {
            $param = 0;
            if(is_numeric($colVal)) {
                $param = PDO::PARAM_INT; 
            } elseif(filter_var($colVal, FILTER_VALIDATE_BOOLEAN)) {
                $param = PDO::PARAM_BOOL;
            } elseif(is_null($colVal)) {
                $param = PDO::PARAM_NULL;
            } elseif(is_string($colVal)) {
                $param = PDO::PARAM_STR;
            } elseif($colName === 'thumbnail') {
                $param = PDO::PARAM_LOB;
            } else {
                $param = FALSE;
            }
            
            $stmt->bindValue(":".$colName, $colVal, $param);
        }
        
        $result = $stmt->execute();
        if ($result === false)
            {throw new Exception('Could not execute apartment INSERT query'); }

        /*---------------------------------------------------------------------
         * Get the new ID attributed to the new Apartment that was just added.
         * -------------------------------------
         */    
        $aptID = $this->getLastInsertID();
        $apt->setID($aptID);
        
        /* Send any Apartment images to the Image database table */
        foreach ($apt->getImages() as $imageName=>$imageBlob)
        {
            $this->addToImageDB($apt->getID(), $imageName, $imageBlob);
        }
        
        return true ;
        
        /*
         * Resulting SQL example:
         * 
         * INSERT INTO Apartments 
         * ( <column names> ) 
         * VALUES 
         * ( <values> )
         */
        
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
        if ($apt_id === NULL){ return false; }  //Need id to target Apartments record
        
        $sql  = "DELETE FROM Apartments WHERE id = :id";
        
        /* Create and execute the DELETE Apartment query */
        $stmt = $this->db->prepare($sql);
        
        if ($stmt === false)
            {throw new Exception('Could not prepare apartment DELETE query'); }
        
        /* Execute $sql with the array argument id */
        $result = $stmt->execute(array("id" => $apt_id));
        
        if ($result === false)
            {throw new Exception('Could not execute apartment DELETE query'); }
        
        return true;
    }
    
    /**
     * Update the apartment database record based on the given Apartment object.
     * 
     * @throws Exception if query somehow failed.
     * @param Apartment $aprt
     * @return boolean - 0 for failure, 1 for success.
     */
    public function editApartment(Apartment $aprt)
    {
        if ($aprt->getID() === NULL) return false;  //Need apartment_id to UPDATE
        
        //SQL query to execute;
        $sql = " UPDATE Apartments SET  
                 %s
                 WHERE
                 id = :_id ";
        
        $sql_equal = " = ";
        $sql_comma = " , ";
        $sql_colon = ":";
        $sql_setValues = "";
        
        /* Get array mapping of column names to the Apartment object values */
        $aptColsArray = $this->apartmentToDBRecord($aprt);
        
        /* Append all apartment table columns with their values for SET */
        $i = 0;
        foreach ($aptColsArray as $colName=>$aptVal)
        {
            $sql_setValues .= $colName;             //Append Apartment column name
            $sql_setValues .= $sql_equal;           //Append =
            $sql_setValues .= $sql_colon . $colName;//Append Apartment new(?) value.
            
            if (($i+1) < count($aptColsArray)) { $sql_setValues .= $sql_comma; }
            $i++;
        }
        
        /* Append the SET values to the UPDATE query string */
        $sql = sprintf($sql, $sql_setValues);

        /* Prepare and Execute the UPDATE Statement */
        $stmt = $this->db->prepare($sql);
        if ($stmt === false)
            {throw new Exception('Could not prepare apartment UPDATE query'); }
        
        /* Bind columns names listed in $sql to apartment object values */
        foreach ($aptColsArray as $colName=>$aptVal)
        {
            $param = 0;
            if(is_numeric($aptVal)) {
                $param = PDO::PARAM_INT; 
            } elseif(filter_var($aptVal, FILTER_VALIDATE_BOOLEAN)) {
                $param = PDO::PARAM_BOOL;
            } elseif(is_null($aptVal)) {
                $param = PDO::PARAM_NULL;
            } elseif(is_string($aptVal)) {
                $param = PDO::PARAM_STR;
            } elseif($colName === 'thumbnail') {
                $param = PDO::PARAM_LOB;
            } else {
                $param = FALSE;
            }
            
            $stmt->bindValue($sql_colon.$colName, $aptVal, $param);
        }
        
        $stmt->bindValue(":_id", $aprt->getID(), PDO::PARAM_INT);
        
        $result = $stmt->execute();
        if ($result === false)
            {throw new Exception('Could not execute apartment UPDATE query'); }
        
        /* Send any Apartment images to the Image database table */
        foreach ($aprt->getImages() as $image)
        {
            $this->addToImageDB($aprt->getID(), $image);
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
    
    public function getFeaturedApartments() {
        $sql = " SELECT * FROM Apartments";
        $stmt = $this->db->prepare( $sql);
        $stmt->execute();
         
        $results = array();
        array_push( $results, $stmt->fetch());
        array_push( $results, $stmt->fetch());
        array_push( $results, $stmt->fetch());
        
        return $results;
    }
    

    public function search(array $query, array $filters, $order)
    {
        //TODO: Delete $order later.

        /* Default SQL statement - get all Apartments */
        $sql                =   " SELECT * FROM Apartments ";
        $sql_where          =   " WHERE ";
        $sql_where_query    =   $this->search_create_param_query($query);
        $sql_and            =   " AND ";    
        $sql_where_filters  =   $this->search_create_param_filters($filters);
        $sql_orderby        =   " ORDER BY ";
        $sql_orderby_args   =   $this->search_create_param_orderby($query, $filters, $order);
        
        /*
         * Compose the rest of the SQL statement for execution.
         */
        /* Append WHERE or "" */
        $sql .= ($sql_where_query ||
                 $sql_where_filters)    ? $sql_where : "";    
        /* Append $query search arguments after WHERE */
        $sql .= ($sql_where_query)      ? "(".$sql_where_query.")" : "";
        /* Append AND or "" */
        $sql .= ($sql_where_query && 
                 $sql_where_filters)    ? $sql_and : "";
        /* Append $filters search arguments after WHERE */
        $sql .= ($sql_where_filters)    ? "(".$sql_where_filters.")" : "";  
        /* Append ORDER BY with its arguments */
        $sql .= ($sql_orderby_args)     ? $sql_orderby . $sql_orderby_args : "";
        //$sql .= $sql_orderby; 
        
        /* Execute the Query */
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        /* Get all applicable apartments */
        return $stmt->fetchAll();
        
        /*
         * Resulting $sql EXAMPLE =;
         * "
         * SELECT * FROM Apartments
         * WHERE 
         *      ( area_code LIKE '%94116%' OR
         *      <... other_columns LIKE '%value%' ...> )
         *      AND
         *      ( (actual_price BETWEEN 1000 AND 3000) AND
         *      <... other_columns = 'value' ...> )
         * ORDER BY 
         * CASE 
         *      WHEN 
         *          area_code = '94116' OR
         *          <... other_columns = value ...> OR
         *          tags = '94116'
         *      THEN 1
         *      ...
         *      ELSE 4
         * END
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
        $apartmentRecords = $stmt->fetchAll();
        
        return $apartmentRecords;
    }
    
    /**
     * Retrieve a single Apartment given the apartment ID.
     * @param type $apartment_id
     * @return type
     */
    public function getApartment($apartment_id)
    {
        $sql = "SELECT * FROM Apartments WHERE id = :id ";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute(
            array('id' => $apartment_id)
        );
        
        /* Get all applicable apartments */
        $apartmentRecord = $stmt->fetch();
        
        return $apartmentRecord;
    }
    
    
    /*
     * --------------------PRIVATE HELPER FUNCTIONS-----------------------------
     */
    
    
    /**
     * Helper method for search($query, $filters) to handle the $query argument
     * for the <strong>WHERE</strong> clause.
     * 
     * @see search(array, array) 
     * @param array $query - list of values to create a search range for.
     * @return String $sql - possibly empty string : append this after WHERE clause.
     */
    private function search_create_param_query(array $query)
    {
//        echo print_r($query);
        /* Return: SQL WHERE clause arguments */
        $sql_where_query = "";
        
        /* These are the apartment columns $query will search against. */
        $aprt_cols  = array("area_code",
                            "actual_price",
                            //"begin_term",
                            //"end_term",
                            //"rental_term",
                            //"parking",      //is 1 or 0, too vague to match.
                            //"pet_friendly", //is 1 or 0, too vague to match.
                            "description",
                            "bedroom"
                            );
        
        
        /* Values for quick reuse */
        $sql_like       = " LIKE ";
        $sql_or         = " OR ";
        $queryCount     = count($query);
        $aprt_colsCount = count($aprt_cols);
        
        /*
         * Set WHERE argument here to have Apartments searched using "LIKE '%value%'.
         */
        $i = 0; //index for $query
        foreach ($query as $query_val)
        {
            if( $query_val != "")
            {
                $j = 0;      //index for $aprt_cols
                foreach ($aprt_cols as $aprt_col)
                {
                    $sql_where_query .= $aprt_col;          //Append apartment_column_name
                    $sql_where_query .= $sql_like;          //Append LIKE
                    $sql_where_query .= "'%".$query_val."%'";         //Append '%value%'
                    $sql_where_query .= (($j + 1) < $aprt_colsCount) ? $sql_or : ""; //Append OR

                    $j++;
                }
                $sql_where_query .= (($i + 1) < $queryCount) ? $sql_or : ""; //Append OR
            } else {
                
            }
            $i++;
        }
        
        return $sql_where_query;
        
        /*
         * Example result:
         * "col1 LIKE '%val1%' ... <repeat>"
         */
    }
    
    /**
     * Helper method for search($query, $filters) to handle the $filters argument
     * for the <strong>WHERE</strong> clause.
     * 
     * @see search(array, array) 
     * @param array $filters - list of values to create a search range for.
     * @return String $sql - possibly empty string : append this after WHERE clause.
     */
    private function search_create_param_filters(array $filters)
    {
        /* Return: SQL WHERE clause arguments */
        $sql_where_filters = "";
        
        /* Values for quick reuse */
        $sql_and        = " AND ";
        $sql_equal      = " = ";
        $filtersCount   = count($filters);
        
        $i = 1;
        
        // Using array_slice to omit the first filter array element 'order'
        // 'order' is a not being used to query the database, it is used to
        // determine the type of sorting for the query results
        
        foreach (array_slice($filters,1) as $f_key=>$f_val)
        {
            /* Array - will be a range search */
            if (!is_array($f_val))
            {
                if( $f_key == "min_price") {
                    $sql_where_filters .= "actual_price";
                    $sql_where_filters .= ">=";
                } else if ( $f_key == "max_price") {
                    $sql_where_filters .= "actual_price";
                    $sql_where_filters .= "<=";
                } else {
                    $sql_where_filters .= $f_key;       //Append filter_key
                    $sql_where_filters .= $sql_equal;   //Append " = "
                }
                $sql_where_filters .= (is_numeric($f_val)) ? $f_val : "'".$f_val."'"; //Append filter_value
            }else {
                $sql_where_filters .= $this->search_create_param_range($f_key, $f_val);
            }
            $sql_where_filters .= (($i + 1) < $filtersCount) ? $sql_and : "";

            $i++;
        }
        
        
        return $sql_where_filters;
        
        /*
         * Example result:
         * "col1 = 'val1' ... <repeat>"
         */
    }
    
    /**
     * Helper method for search($query, $filters) to handle the ordering of
     * retrieved records for the <strong>ORDER BY</strong> clause.
     * 
     * @param array $query   - used to set the ordering of retrieved records.
     * @param array $filters - used to set the ordering of retrieved records.
     * @param int $order default 0 - indicates which way to use $query/$filter to set the ordering.
     * @return String   - possibly empty string : append this after ORDER BY clause.
     */
    private function search_create_param_orderby(array $query, array $filters, $order)
    {
        /* Return: SQL ORDER BY clause arguments */
        $sql_orderby = "";  
        /* These are the apartment columns $query will search against. */
        $aprt_cols  = array("area_code",
                            "actual_price",
                            //"begin_term",
                            //"end_term",
                            //"rental_term",
                            //"parking",      //is 1 or 0, too vague to match.
                            //"pet_friendly", //is 1 or 0, too vague to match.
                            "description",
                            "bedroom"
                            );

        if ($order == 0 && !empty($query))
        {
            //$sql_orderby = " id ASC";
            $sql_orderby_case  =    "   CASE
                                            WHEN %s THEN 1
                                            WHEN %s THEN 2
                                            WHEN %s THEN 3
                                            ELSE 4
                                        END";       //default

            /* Arguments for CASE clause $sql_ordebyr_case */
            $sql_order_case_arg1 = "";
            $sql_order_case_arg2 = "";
            $sql_order_case_arg3 = "";

            /* Values for quick reuse */
            $sql_like       = " LIKE ";
            $sql_or         = " OR ";
            $sql_equal      = " = ";      
            $queryCount     = count($query);
            $aprt_colsCount = count($aprt_cols);

            /* 
             * Set ORDER BY CASE arguments here to return results in a certain order.
             */
            $k = 0; //index for $query
            foreach ($query as $query_val)
            {
                $l = 0; //index for $aprt_cols
                foreach ($aprt_cols as $aprt_col)
                {
                    //col1 = val1 ...
                    $sql_order_case_arg1 .= $aprt_col;   //Append aprt_column_name
                    $sql_order_case_arg1 .= $sql_equal;  //Append ' = '
                    $sql_order_case_arg1 .= (is_numeric($query_val)) ? $query_val : "'".$query_val."'";   //Append value
                    $sql_order_case_arg1 .= (($l + 1) < $aprt_colsCount) ? $sql_or : "";                  //Append OR ?

                    //col1 LIKE 'val1%' OR col1 LIKE '%val1' ...   < NOTICE '%' placements >
                    $sql_order_case_arg2 .= $aprt_col;              //Append aprt_column_name
                    $sql_order_case_arg2 .= $sql_like;              //Append LIKE
                    $sql_order_case_arg2 .= "'".$query_val."%'";    //Append 'value%'
                    $sql_order_case_arg2 .= $sql_or;                //Append OR
                    $sql_order_case_arg2 .= $aprt_col;              //Append aprt_column_name
                    $sql_order_case_arg2 .= $sql_like;              //Append LIKE
                    $sql_order_case_arg2 .= "'%".$query_val."'";    //Append '%value'
                    $sql_order_case_arg2 .= (($l + 1) < $aprt_colsCount) ? $sql_or : ""; //Append OR ?

                    //col1 LIKE '%val1% ...
                    $sql_order_case_arg3 .= $aprt_col;              //Append aprt_column_name
                    $sql_order_case_arg3 .= $sql_like;              //Append LIKE
                    $sql_order_case_arg3 .= "'%".$query_val."%'";   //Append '%value%'
                    $sql_order_case_arg3 .= (($l + 1) < $aprt_colsCount) ? $sql_or : "";    //Append OR ?

                    $l++;
                }

                //Append OR    if there are more $query values
                if (($k + 1) < $queryCount)
                {
                    $sql_order_case_arg1 .= $sql_or;
                    $sql_order_case_arg2 .= $sql_or;
                    $sql_order_case_arg3 .= $sql_or;
                }

                $k++;
            }

            /*
             *  Finalize the SQL ORDER BY arguments
             */
            if ($queryCount > 0)
            {
                //Apply ORDER BY arguments via formatting.
                $sql_orderby_case = sprintf($sql_orderby_case,  $sql_order_case_arg1,
                                                                $sql_order_case_arg2,
                                                                $sql_order_case_arg3);

                $sql_orderby .= $sql_orderby_case;
            }
        }else if($order == 1){
            $sql_orderby = " actual_price ASC"; 
        }else if($order == 2){
            $sql_orderby = " actual_price DESC"; 
        }
        
        return $sql_orderby;       
    }
    
    /**
     * Helper method to generate a SQL BETWEEN query piece for the search() function.
     * <p>Example: "( colname BETWEEN min AND max )"  </p>
     * 
     * @see search($query, $filters) - the calling method.
     * @throws Exception - if given array is not at least size 2.
     * @param String    $colName - column to apply the SQL BETWEEN query against.
     * @param array     $min_max - array of at least 2 values, being minumum and maximum.
     * @return string - "(column_name BETWEEN min AND MAX)"
     */
    private function search_create_param_range($colName, array $min_max)
    {
        //Return: SQL BETWEEN argument
        $sql_between    = " ( %s BETWEEN %s AND %s ) ";
        
        $sql_maxInt     = "~0";     //largest BigINT ...for MySQL.
        $sql_minInt     = "-(~0)";  //largest BigINT multipled by -1. (negative)

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
            $sql_between = sprintf( $sql_between, $colName, $min, $max);
            
        }else{
            throw Exception("ApartmentDB->search_range() requires an array of at least size 2!");
        }
        
        return $sql_between;
    }
    
    
    /**
     * Helper method to convert a database apartment record into an Apartment
     * object.
     * @param array $apartmentRecord - a single database apartment record.
     * @return Apartment
     */
    //private function dbRecordToApartment($apartmentRecord)
    public function dbRecordToApartment($apartmentRecord)
    {
        $aprt = new Apartment();
        
        $aprt->setID($apartmentRecord->id);
        $aprt->setTitle($apartmentRecord->title);
        $aprt->setUserID($apartmentRecord->user_id);
        $aprt->setAreaCode($apartmentRecord->area_code);
        $aprt->setActualPrice($apartmentRecord->actual_price);
        $aprt->setBeginTerm($apartmentRecord->begin_term);
        $aprt->setEndTerm($apartmentRecord->end_term);
        $aprt->setParking($apartmentRecord->parking);
        $aprt->setPetFriendly($apartmentRecord->pet_friendly);
        $aprt->setDescription($apartmentRecord->description);
        $aprt->setBedRoomCount($apartmentRecord->bedroom);
        $aprt->setThumbnail($apartmentRecord->thumbnail);
        $aprt->setSmoking($apartmentRecord->smoking);
        $aprt->setLaundry($apartmentRecord->laundry);
        $aprt->setSharedRoom($apartmentRecord->shared_room);
        $aprt->setFurnished($apartmentRecord->furnished);
        $aprt->setWheelChairAccess($apartmentRecord->wheel_chair_access);
        
        //----------------------------------------------------------------------
        /* Get Images of the this Apartment */
        $images = array();
        foreach ($this->getImageDB($apartmentRecord->id) as $imageRecord)
        {
            $images[$imageRecord->name] = $imageRecord->image;
            //array_push($images, $imageRecord->image);
        }
        
        /* Set Apartment's array of images */
        $aprt->addImages($images);
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
        $aptColsArray = array(  "id"                    => $apt->getID(),
                                "title"                 => $apt->getTitle(),
                                "user_id"               => $apt->getUserID(),
                                "area_code"             => $apt->getAreaCode(),
                                "actual_price"          => $apt->getActualPrice(),
                                "begin_term"            => $apt->getBeginTerm(),
                                "end_term"              => $apt->getEndTerm(), 
                                "parking"               => $apt->hasParking(),
                                "pet_friendly"          => $apt->isPetFriendly(),
                                "description"           => $apt->getDescription(),
                                "bedroom"               => $apt->getBedRoomCount(),
                                "thumbnail"             => $apt->getThumbnail(),
                                "smoking"               => $apt->hasSmoking(),
                                "laundry"               => $apt->hasLaundry(),
                                "shared_room"           => $apt->isSharedRoom(),
                                "furnished"             => $apt->isFurnished(),
                                "wheel_chair_access"    => $apt->hasWheelChairAccess(),
                                //"tags"                  => $apt->tags
                                //"rental_term"   => "'" . $apt->rentalTerm  . "'",
                                );
        
        return $aptColsArray;
    }
    
    /**
     * Retrieve the last ID belonging to <strong>whatever</strong> record that
     * was inserted into the database.
     * 
     * @return int - id
     * @throws Exception - if query fails to execute.
     */
    private function getLastInsertID()
    {
        /* Now get the autoincremented ID just made for the new Apartment */    
        $sql = " SELECT * FROM Apartments WHERE id = LAST_INSERT_ID() ";
        
        /* Create INSERT query with the column and value strings */
        $stmt = $this->db->prepare($sql);
        if ($stmt === false)
            {throw new Exception('Could not prepare apartment ID SELECT query'); }
            
        /* Execute the assembled INSERT query */    
        $result = $stmt->execute();
        if ($result === false)
            {throw new Exception('Could not execute apartment ID SELECT query'); }
            
        return $stmt->fetch()->id;
    }
    
    /**
     * Get the images of an Apartment.
     * 
     * @param int $id
     * @return Image records.
     */
    public function getImageDB( $id) {
        $sql = "SELECT * FROM Image WHERE apartment_id = :apartment_id ";
        $query = $this->db->prepare( $sql);
        $query->execute(array("apartment_id" => $id));
        
        return $query->fetchAll();
    }
    
    /**
     * Get the single image of an apartment.
     * 
     * @param int Image ID
     * @return Image Record
     */
    public function getImage( $id) {
        $sql = "SELECT * FROM Image WHERE id = :id ";
        $query = $this->db->prepare( $sql);
        $query->execute(array("id" => $id));
        
        return $query->fetch();
    }
    
    /**
     * Add the given BLOB image to the Image table. Each image must be
     * associated with an Apartment, thus the apartment's ID is required.
     * 
     * @param int $apartmentID - the apartment's ID.
     * @param String $imageName - name of the file.
     * @param String $imageBlob - the BLOB data image.
     * @return boolean - true
     * @throws Exception - thrown if the INSERT query fails.
     */
    public function addToImageDB($apartmentID, $imageName, $imageBlob)
    {
        $sql = " INSERT INTO Image 
                 ( apartment_id , name,  image ) 
                 VALUES 
                 (:apartment_id , :name, :image ) ";
        
        $query = $this->db->prepare( $sql);
        if ($query === false)
            {throw new Exception('Could not prepare Image INSERT query'); }
        
        $query->bindValue(":apartment_id", $apartmentID, PDO::PARAM_INT);
        $query->bindValue(":name", $imageName, PDO::PARAM_STR);
        $query->bindValue(":image", $imageBlob, PDO::PARAM_LOB);
        
        $result = $query->execute();
        if ($result === false)
            {throw new Exception('Could not execute Image INSERT query'); }
          
        return true;
    }
    
    /**
     * Update a specific Image in the Image database.
     * 
     * @param int $imageId - the Image to update.
     * @param String $imageBlob
     * @return boolean - true
     * @throws Exception - throws if query fails.
     */
    public function editImageDB($imageId, $imageName, $imageBlob)
    {
        //SQL query to execute;
        $sql = " UPDATE Image SET  
                 image = :image , name = :name
                 WHERE
                 id = :id ";
        
        $query = $this->db->prepare( $sql);
        if ($query === false)
            {throw new Exception('Could not prepare Image UPDATE query'); }
        
        $query->bindValue(":id", $imageId, PDO::PARAM_INT);
        $query->bindValue(":name", $imageName, PDO::PARAM_STR);
        $query->bindValue(":image", $imageBlob, PDO::PARAM_LOB);
        
        $result = $query->execute();
        if ($result === false)
            {throw new Exception('Could not execute Image UPDATE query'); }
            
        return true;
    }
    
    /**
     * Delete a specific Image from the Image database.
     * 
     * @param int $imageId - target ID of Image to delete.
     * @return boolean
     * @throws Exception
     */
    public function deleteImage($imageId)
    {
        $sql = "DELETE FROM Image WHERE id = :id ";
        
        $query = $this->db->prepare( $sql);
        if ($query === false)
            {throw new Exception('Could not prepare Image DELETE query'); }
        
        $result = $query->execute(array("id" => $imageId));
        if ($result === false)
            {throw new Exception('Could not execute Image DELETE query'); }
            
        return true;
    }
    
}