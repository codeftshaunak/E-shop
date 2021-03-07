<?php

//use to fatch admin data
class user{
        public $db = null;
        
        public function __construct(DBController $db){
            if (!isset($db->con)) return null;
            $this->db=$bd;
            
        }

    //featch data using getdata method
    public function getdata($table='users'){
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray[]=array();

        //featch data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $itemuser;
        }

        return $resultArray;
    }


    //get data using item id
    public function getUser($usersid = null, $table='users'){
        if (isset($usersid)) {
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE userid={$usersid}");

            $resultArray = array();

            // fetch product data one by one
            while ($itemuser = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $itemuser;
            }

            return $resultArray;
        }
    }

}