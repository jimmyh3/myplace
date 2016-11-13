<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
     * 
     * @param int $apt_id
     */
    public function deleteApartment($apt_id)
    {
        
    }
    
    /**
     * Update an apartment database record.
     * @param Apartment $apt
     * @return int - 0 for failure, 1 for success.
     */
    public function editApartment(Apartment $apt)
    {
        if ($apt->apartment_id === NULL) return 0;  //Need apartment_id to UPDATE
        
        //TODO: implement! 'image' refers to a table and 'tags' refer a LONGTEXT string.
        
        $aptColsArray = array(  "area_code"     => $apt->areaCode,
                                "bedroom"       => $apt->bedroom,
                                "description"   => "'" . $apt->description . "'",
                                "parking"       => $apt->parking,
                                "pet_friendly"  => $apt->petFriendly,
                                "actual_price"  => $apt->price,
                                "rental_term"   => "'" . $apt->rentalTerm . "'", //"tags"          => $apt->tags,      //IS ARRAY
                                "thumbnail"     => "'" . $apt->thumbnail . "'");
        
        /* Create UPDATE statement */
        $sql = "UPDATE apartment SET ";
        
        /* Append all apartment table columns with their values */
        $colKeys = array_keys($aptColsArray);
        for ($i = 0; $i < count($colKeys); $i++)
        {
            $sql = $sql . $colKeys[$i] . " = " . $aptColsArray[$colKeys[$i]];
            if (($i + 1) < count($colKeys)) $sql = $sql . " , ";    
        }
        
        $sql = $sql . " WHERE id = " . $apt->apartment_id; 

        /* Execute the UPDATE Statement */
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        
        return $stmt;
    }
    
    /**
     * Search the database and return apartments that contains at least some of 
     * the values referenced by the given arrays of search parameters.
     * @param indexed array $query
     * @param associative array $filters
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
        
        //TODO: implement! 'image' refers to a table and 'tags' refer a LONGTEXT string.
        //$aprt->image        = $apartmentRecord['image_id'];
        //$aprt->tags         = $apartmentRecord['tags'];
        
        
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
        //$aprt->image        = $apartmentRecord['image_id'];
        //$aprt->tags         = $apartmentRecord['tags'];
        
        
    }
}
