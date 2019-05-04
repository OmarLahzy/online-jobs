<?php
include 'Database.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Restorepassword
 *
 * @author omar
 */
class Restorepassword {
    private $username;
    private $answer;
    private $update;
    
    function setData($username,$answer,$newpassword){
        $this->username = $username;
        $this->answer = $answer;
        $this->update = $newpassword;
    }
    function Checkuser(){
        $dhb = new Database();
        $q = "SELECT * FROM `users` WHERE `email` = '$this->username' AND `answer` = '$this->answer'";
        $stm = $dhb->prepare($q);
        $stm->execute();
        if($stm->rowCount()== 1){
            $query = "update `users` set `password`='$this->update' where `email`='$this->username'";
            $row = $dhb->prepare($query);
            $row->execute();
            $dhb = NULL;
        } else {
            echo 'NOT FOUND'; 
            $dhb = NULL;
        }
    }
}
