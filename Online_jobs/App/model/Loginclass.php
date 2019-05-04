<?php
include 'Database.php';
class Loginclass {
    private $username;
    private $password;


    public function setdata($username,$password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function getdata() {
        try { 
        $dbh = new Database();
        $q = "SELECT * FROM `users` WHERE `email` = '$this->username' AND `password` = '$this->password'";
        $stm = $dbh->prepare($q);
        $stm->execute();
        if($stm->rowCount()>0){
            $result = $stm->fetchAll();
            $dhb = NULL;
            return $result;
        } else {
            return false;    
        }
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    

}
