<?php

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
     * 
     * @param Apartment $apt
     */
    public function addApartment(Apartment $apt)
    {
        
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
        //TODO: does the Database automatically drop 'image' as well?
        
        if ($apt_id === NULL) return false;
        
        $sql  = "DELETE FROM apartment WHERE id = :id";
        
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
        
        //TODO: implement! 'image' refers to a table and 'tags' refer a LONGTEXT string.
        
        $aptColsArray = array(  "area_code"     => $apt->areaCode,
                                "bedroom"       => $apt->bedroom,
                                "description"   => "'" . $apt->description . "'",
                                "parking"       => $apt->parking,
                                "pet_friendly"  => $apt->petFriendly,
                                "actual_price"  => $apt->price,
                                "rental_term"   => "'" . $apt->rentalTerm . "'", 
                                "thumbnail"     => "'" . $apt->thumbnail . "'");
        
        /* Column values to be changed */
        $sql_set_values = "";
        
        /* Append all apartment table columns with their values for SET */
        $colKeys = array_keys($aptColsArray);
        for ($i = 0; $i < count($colKeys); $i++)
        {
            $sql_set_values = $sql_set_values . $colKeys[$i] . " = " . $aptColsArray[$colKeys[$i]];
            
            if (($i + 1) < count($colKeys))
            {
                $sql_set_values = $sql_set_values . " , "; //Append comma for next
            }
        }
        
        /* Create initial piece of UPDATE query */
        $sql = "UPDATE apartment SET ";
        
        /* Append SET [col = val ...] */
        $sql = $sql . $sql_set_values;      
        
        /* Append WHERE along with the targeted apartment ID */
        $sql = $sql . " WHERE id = " . $apt->apartment_id; 

        /* Prepare and Execute the UPDATE Statement */
        $stmt = $this->db->prepare($sql);
        if ($stmt === false)
        {
            throw new Exception('Could not prepare apartment update query');
        }
        
        $result = $stmt->execute();
        if ($result === false)
        {
            throw new Exception('Could not run apartment update query');
        }
        
        return true;
    }
    
    /**
     * Search the database and return apartments that contains at least some of 
     * the values referenced by the given arrays of search parameters.
     * 
     * @param jndexed array $query - values to look through 'rental_term' & 'description' & 'tags'
     * @param associative array $filters - values to look through specific columns.
     * @return array $apartments - an array of Apartments from the database.
     */
    public function search(array $query, array $filters){

        $sql            = "";
        $sql_select     = "SELECT * FROM apartment ";
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

        $sql = $sql . $sql_select;      //SELECT * FROM apartment

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
                 *  FROM apartment
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
                 *  FROM apartment
                 *  WHERE ( tags LIKE $query[$i] <OR <repeat tags LIKE >> )  
                 *  AND ( filterKey = value <AND <repeat >> ) "
                 * 
                 * IF $query was passed in as null but $filter wasn't then this
                 * is the actual result:
                 * 
                 * Resulting $sql =
                 * "SELECT *
                 *  FROM apartment 
                 *  WHERE ( filterKey = value <AND <repeat >> ) "
                 * 
                 */
            }

        }
        
        /* Execute the Query */
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        /* Get all applicable apartments */
        $apartmentRecords = $stmt->fetchAll(PDO::FETCH_ASSOC);

        /* Create and return an array of Apartments */
        $apartmentArray = array();
        foreach ($apartmentRecords as $apartmentRecord)
        {
            $aprt = $this->dbRecordToApartment($apartmentRecord);
            array_push($apartmentArray, $aprt);
        }

        return $apartmentArray;
        
    }
    
    /**
     * Retrieve all Apartments belonging to a landlord of the specified ID.
     * @param int $user_id - user landlord ID.
     */
    public function getLandLordApartments($user_id)
    {
        $sql  = "SELECT * FROM apartment WHERE user_id = :user_id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute(
            array('user_id' => $user_id)
        );
        
        /* Get all applicable apartments */
        $apartmentRecords = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $apartmentArray = array();
        foreach ($apartmentRecords as $apartmentRecord)
        {
            $aprt = $this->dbRecordToApartment($apartmentRecord);
            array_push($apartmentArray, $aprt);
        }
        
        return $apartmentArray;
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
        
        //TODO: implement! 'image' - it refers to a table and 'tags' - refer a LONGTEXT string.
        
        $aprt->apartment_id = $apartmentRecord['id'];
        $aprt->areaCode     = $apartmentRecord['area_code'];
        $aprt->price        = $apartmentRecord['actual_price'];
        $aprt->rentalTerm   = $apartmentRecord['rental_term'];
        $aprt->parking      = $apartmentRecord['parking'];
        $aprt->petFriendly  = $apartmentRecord['pet_friendly'];
        $aprt->description  = $apartmentRecord['description'];
        $aprt->bedroom      = $apartmentRecord['bedroom'];
        $aprt->thumbnail    = $apartmentRecord['thumbnail'];
        
        return $aprt;
    }
    
    private function apartmentToDBRecord(Apartment $aprt)
    {
        //TODO: implement! 'image' refers to a table and 'tags' refer a LONGTEXT string.
        
    }
}
