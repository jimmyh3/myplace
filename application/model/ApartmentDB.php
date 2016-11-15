<?php

require APP . 'libs/Apartment.php';

/**
 * Description of ApartmentDB
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
        /* Get mapping of Apartments column names to Apartment object value */
        $aptColsValsArray  = $this->apartmentToDBRecord($apt);
        
        $sql_apt_columns = "";  //stores: ( col1, col2, col3 ...)
        $sql_apt_values  = "";  //stores: ( val1, val2, val3 ...)
        
        $colNames = array_keys($aptColsValsArray);
        /* Create Column and Value SQL string for INSERT */
        for ($i = 0; $i < count($aptColsValsArray); $i++)
        {
            /* Append column names together. */
            $sql_apt_columns = $sql_apt_columns . $colNames[$i];
            /* Append values of specific columns respectively. */
            $sql_apt_values  = $sql_apt_values  . $aptColsValsArray[$colNames[$i]];
            
            /* Append comma for the next value */
            if (($i+1) < count($aptColsValsArray)){
                $sql_apt_columns = $sql_apt_columns . " , ";
                $sql_apt_values  = $sql_apt_values  . " , ";
            }
        }
        
        /* Create INSERT query with the column and value strings */
        $sql = "INSERT INTO Apartments ( " . $sql_apt_columns . " ) " .
               " VALUES ( " . $sql_apt_values . " ) ";
        
        /* Execute the assembled INSERT query */
        $stmt = $this->db->prepare($sql);
        if ($stmt === false)
        {
            throw new Exception('Could not prepare apartment delete query');
        }
        
        $result = $stmt->execute();
        if ($result === false)
        {
            throw new Exception('Could not run post update query');
        }
        
        return 1 ;
    }
    
    
    /**
     * Delete the targeted database apartment record with the given id.
     * 
     * @param int $apt_id - unique apartment ID to target.
     * @throws Exception if the query failed.
     * @return boolean false for failure, true for success.
     */
    public function deleteApartment($apt_id)
    {
        //WARNING: does the Database automatically drop 'image' as well? <<-----------------------------
        
        if ($apt_id === NULL) return false;
        
        $sql  = "DELETE FROM Apartments WHERE id = :id";
        
        /* Create and execute the DELETE query */
        $stmt = $this->db->prepare($sql);
        if ($stmt === false)
        {
            throw new Exception('Could not prepare apartment delete query');
        }
        
        $result = $stmt->execute(array("id" => $apt_id));
        if ($result === false)
        {
            throw new Exception('Could not run post update query');
        }
        
        return true;
    }
    
    
    /**
     * Update an apartment database record.
     * 
     * @throws Exception if query somehow failed.
     * @param Apartment $apt
     * @return boolean - 0 for failure, 1 for success.
     */
    public function editApartment(Apartment $apt)
    {
        if ($apt->apartment_id === NULL) return false;  //Need apartment_id to UPDATE
        
        $aptColsArray = $this->apartmentToDBRecord($apt);
        
        /* This is for SET-ting values of this apartment */
        $sql_set_values = "";
        /* Append all apartment table columns with their values for SET */
        $colKeys = array_keys($aptColsArray);
        for ($i = 0; $i < count($colKeys); $i++)
        {
            $sql_set_values = $sql_set_values . $colKeys[$i] . " = " . $aptColsArray[$colKeys[$i]];
            
            if (($i + 1) < count($colKeys))
            {
                $sql_set_values = $sql_set_values . " , "; //Append comma for set value
            }
        }
        
        /* Create initial piece of UPDATE query */
        $sql = "UPDATE Apartments SET ";
        /* Append SET [col = val ...] */
        $sql = $sql . $sql_set_values;
        /* Append WHERE along with the targeted apartment ID */
        $sql = $sql . " WHERE id = :id"; 

        /* Prepare and Execute the UPDATE Statement */
        $stmt = $this->db->prepare($sql);
        if ($stmt === false)
        {
            throw new Exception('Could not prepare apartment update query');
        }
        
        $result = $stmt->execute(array("id" => $apt->apartment_id));
        if ($result === false)
        {
            throw new Exception('Could not execute apartment update query');
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
    public function search(array $query, array $filters){

        $sql            = "";
        $sql_select     = "SELECT * FROM Apartments ";
        $sql_where      = "WHERE ";
        $sql_like       = " LIKE ";
        $sql_openPrcnt  = "'%";         //IMPORTANT: there is no space after "'%".
        $sql_closePrcnt = "%'";
        $sql_or         = " OR ";
        $sql_and        = " AND ";
        $sql_openPrn    = "( ";
        $sql_closePrn   = ") ";
        $sql_equal      = " = ";

        /* These are the apartment table columns $query will 'LIKE %' against. */
        $aprtQueryCols  = array("rental_term",
                                "description",
                                "tags"        );

        $queryKeys      = array_keys($query);
        $filterKeys     = array_keys($filters);

        $sql = $sql . $sql_select;      //SELECT * FROM Apartments

        /* This entire IF is for creating the SQL Query */
        if ($queryKeys || $filterKeys)
        {
            $sql = $sql . $sql_where;       //Append WHERE

            if ($queryKeys)
            {
                $sql = $sql . $sql_openPrn; //Append "( "

                $queryKeysLen       = count($queryKeys);
                $aprtQueryColsLen   = count($aprtQueryCols);
                for ($i = 0; $i < $queryKeysLen; $i++)
                {
                    for ($j = 0; $j < $aprtQueryColsLen; $j++)
                    {
                        $sql = $sql . $aprtQueryCols[$j];    //Append 'rental_term' || 'description' || 'tags'
                        $sql = $sql . $sql_like;             //Append LIKE
                        $sql = $sql . $sql_openPrcnt;        //Append "%"
                        $sql = $sql . $query[$queryKeys[$i]];//Append "value"
                        $sql = $sql . $sql_closePrcnt;       //Append "% "
                        if (($j + 1) < $aprtQueryColsLen) { $sql = $sql . $sql_or; }
                    }
                    if (($i + 1) < $queryKeysLen) { $sql = $sql . $sql_or; }
                }

                $sql = $sql . $sql_closePrn;    //Append ") "

                /*
                 * Resulting $sql =
                 * "SELECT *
                 *  FROM Apartments
                 *  WHERE ( tags LIKE $query[$i] <OR <repeat tags LIKE >> ) "
                 */

            }

            if ($queryKeys && $filterKeys)
            {
                $sql = $sql . $sql_and;         //Append AND
            }

            if ($filterKeys)
            {
                $sql = $sql . $sql_openPrn;     //Append "( "

                $filterKeysLen   = count($filters);
                for ($i = 0; $i < $filterKeysLen; $i++)
                {
                    $sql = $sql . $filterKeys[$i];           //Append first key.
                    $sql = $sql . $sql_equal;                //Append "= "
                    $sql = $sql . $filters[$filterKeys[$i]]; //Append first value.
                    if (($i + 1) < $filterKeysLen) { $sql = $sql . $sql_and; }
                }

                $sql = $sql . $sql_closePrn;    //Append ") "

                /*
                 * Resulting $sql =
                 * "SELECT *
                 *  FROM Apartments
                 *  WHERE ( tags LIKE $query[$i] <OR <repeat tags LIKE >> )  
                 *  AND ( filterKey = value <AND <repeat >> ) "
                 * 
                 * IF $query was passed in as empty but $filter wasn't then this
                 * is the actual result:
                 * 
                 * Resulting $sql =
                 * "SELECT *
                 *  FROM Apartments
                 *  WHERE ( filterKey = value <AND <repeat >> ) "
                 *   
                 * ^^^vice versa if $filters was empty but $query was not^^^
                 */
            }

        }
        
        /* Execute the Query */
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        /* Get all applicable apartments */
        $apartmentRecords = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $apartmentRecords;
        
        /* Create and return an array of Apartments */
//        $apartmentArray = array();
//        foreach ($apartmentRecords as $apartmentRecord)
//        {
//            $aprt = $this->dbRecordToApartment($apartmentRecord);
//            array_push($apartmentArray, $aprt);
//        }
//
//        return $apartmentArray;
        
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
        
//        $apartmentArray = array();
//        foreach ($apartmentRecords as $apartmentRecord)
//        {
//            $aprt = $this->dbRecordToApartment($apartmentRecord);
//            array_push($apartmentArray, $aprt);
//        }
//        
//        return $apartmentArray;
    }
    
    
    //--------------------PRIVATE HELPER FUNCTIONS------------------------------
    
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
        $tagStr = "";
        /* Convert tags array to String */
        for ($i = 0; $i < count($apt->tags); $i++)
        {
            $tagStr = $tagStr . $apt->tags[$i];
            
            if (($i + 1) < count($apt->tags)) { //Append comma for next tag.
                $tagStr = $tagStr . ",";
            }
        }
        
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
                                "tags"          => "'" . $tagStr . "'");
        
        
        return $aptColsArray;
    }
}
