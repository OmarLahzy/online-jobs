<?php
include 'Database.php';
class Regiset {
    private $email;
    private $fname;
    private $lname;
    private $password;
    private $contry;
    private $town;
    private $birthday;
    private $gender;
    private $phonenumber;
    private $phonecode;
    private $q_answer;
    private $pic;
    private $cv;
    private $type;
            
    public function setdata($email,$fname,$lname,$password,$contry,$town,$birthday,$gender,$phonenumber,$phonecode,$q_answer,$pic,$cv,$type){
        $this->email = $email;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->password = $password;
        $this->contry = $contry;
        $this->town = $town;
        $this->birthday = $birthday;
        $this->gender = $gender;
        $this->phonenumber = $phonenumber;
        $this->phonecode  = $phonecode;
        $this->q_answer = $q_answer;
        $this->pic = $pic;
        $this->cv = $cv;
        $this->type = $type;
    }

    public function Insert(){
        $dbh = new Database();
        $query = "SELECT * FROM `users` WHERE `email` = '$this->email'";
        $check = $dbh->prepare($query);
        $check->execute();
        if($check->rowCount() == 0){
         $q = "INSERT INTO `users` (`user_id`, `email`, `first_name`, `last_name`, `password`, `country`, `town`, `birthday`, `gender`, `phone_num`, `phone_code`, `answer`, `profile_pic`, `cv`, `user_type`) VALUES (NULL, '$this->email', '$this->fname', '$this->lname', '$this->password', '$this->contry', '$this->town', '$this->birthday', '$this->gender', '$this->phonenumber', '$this->phonecode', '$this->q_answer', '$this->pic', '$this->cv', '$this->type')";
         $stm = $dbh->prepare($q);
         $sql = $stm->execute();
        if($sql){
            return TRUE;;
            }
        else {
            throw new Exception("Somthing went wrong"); 
        }
        } else {
            echo 'The Email Already used';    
        }
        $dbh = NULL;
    }
}
