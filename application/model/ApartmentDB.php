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
     * 
     * @param Apartment $apt
     */
    public function editApartment(Apartment $apt)
    {
        
    }
    
    /**
     * Search the database and return apartments that contains at least some of 
     * the values referenced by the given arrays of search parameters.
     * @param indexed array $query
     * @param associative array $filters
     * @return array $apartments - an array of Apartment records from the database.
     */
    public function search(array $query, array $filters){

        $sql            = "";
        $sql_select     = "SELECT * FROM apartment ";
        $sql_where      = "WHERE ";
        $sql_tagsLike   = "tags LIKE "; //'tags' == apartment table 'tags' column.
        $sql_openPrcnt  = "'%";         //IMPORTANT: there is no space after "'%".
        $sql_closePrcnt = "%'";
        $sql_or         = " OR ";
        $sql_and        = " AND ";
        $sql_openPrn    = "( ";
        $sql_closePrn   = ") ";
        $sql_equal      = " = ";

        $sql = $sql . $sql_select;      //SELECT * FROM apartment

        if (!empty($query) || !empty($filters))
        {
            $sql = $sql . $sql_where;   //SELECT * FROM apartment WHERE
            if (!empty($query))
            {
                                                //SELECT * FROM apartment WHERE
                $sql = $sql . $sql_openPrn;     //Append "( "
                $sql = $sql . $sql_tagsLike;    //Append "tags LIKE "
                $sql = $sql . $sql_openPrcnt;   //Append "%"
                $sql = $sql . $query[0];        //Append "$query[0] "
                $sql = $sql . $sql_closePrcnt;  //Append "%"

                $i = 0;
                $arraylen = count($query);
                for ($i = 1; $i < $arraylen; $i++)
                {
                    $sql = $sql . $sql_or;      //Append OR
                    $sql = $sql . $sql_tagsLike;//Append "tags LIKE "
                    $sql = $sql . $sql_openPrcnt; //Append "%"
                    $sql = $sql . $query[$i];   //Append "$query[$i] "
                    $sql = $sql . $sql_closePrcnt; //Append "%"
                }

                $sql = $sql . $sql_closePrn;    //Append ") "

                /*
                 * Resulting $sql =
                 * "SELECT *
                 *  FROM apartment
                 *  WHERE ( tags LIKE $query[$i] <OR <repeat tags LIKE >> ) "
                 */

            }

            if (!empty($filters) && !empty($filters))
            {
                $sql = $sql . $sql_and; //Append AND
            }

            if (!empty($filters))
            {
                $filterKeys = array_keys($filters);

                $sql = $sql . $sql_openPrn;     //Append "( "
                $sql = $sql . $filterKeys[0];   //Append first key.
                $sql = $sql . $sql_equal;       //Append "= "
                $sql = $sql . $filters[$filterKeys[0]]; //Append first value.

                $i = 0;
                $arraylen   = count($filters);
                for ($i = 1; $i < $arraylen; $i++)
                {
                    $sql = $sql . $sql_and;     //Append "AND ";
                    $sql = $sql . $filterKeys[$i];   //Append first key.
                    $sql = $sql . $sql_equal;        //Append "= "
                    $sql = $sql . $filters[$filterKeys[$i]]; //Append first value.
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
        
        $statement = $this->db->prepare($sql);
        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * 
     * @param int $user_id
     */
    public function getLandLordApartments($user_id)
    {
        
    }
}
