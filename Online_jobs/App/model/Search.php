<?php
include 'Database.php';
class Search {
     private $keyword;
             
    public function SetData($keyword) {
        $this->keyword = $keyword;
    }

    public function Select() {
        $dhb = new Database();
        $this->keyword = preg_replace("#[^0-9a-z]#i"," ", $this->keyword);
        $q = "SELECT * FROM `job_info` WHERE `job_name` LIKE '%$this->keyword%'";
        $stm = $dhb->prepare($q);
        $stm->execute();
        if($stm->rowCount() == 0){
            $dhb = NULL;
            return FALSE;
        } else {
             $result = $stm->fetchAll();
             $dhb = NULL;
             return $result;
            }   
        }
    }



