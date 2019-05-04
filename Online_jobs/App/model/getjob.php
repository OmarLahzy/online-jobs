<?php
include 'Database.php';
class getjob {
     
    function Add_Fav_Job($tablename,$job_id,$emp_id){
        $dhb = new Database();
        $q = "INSERT INTO `".$tablename."`(`emp_id`,`fav_job`)VALUES('$emp_id','$job_id')";
        $stm = $dhb->prepare($q);
        if($stm->execute()){
         $dhb = NULL;
        return TRUE;
        } else {
         $dhb = NULL;
        return FALSE;
        }
    }

    function Add_Apply_job($tablename,$job_id,$com_id,$emp_id){
        $dhb = new Database();
        $q = "INSERT INTO `".$tablename."`(`job_id`,`com_id`,`employee_id`)VALUES('$job_id','$com_id','$emp_id')";
        $stm = $dhb->prepare($q);
        if($stm->execute()){
         $dhb = NULL;
        return TRUE;
        } else {
         $dhb = NULL;
        return FALSE;
        }
    }
    
    function GetAllDataOrderd($tablename,$clo,$DESC){
        $dhb = new Database();
        $q = "SELECT * FROM `".$tablename."` ORDER BY `".$clo."`".$DESC;
        $stm = $dhb->prepare($q);
        $stm->execute();
        $result = $stm->fetchAll();
        $dhb = NULL;
        return $result;
    }
    function GetDatabyID($tablename,$clo,$id){
        $dhb = new Database(); 
        $q = "SELECT * FROM `".$tablename."` Where `".$clo."`= '$id'";
        $stm = $dhb->prepare($q);
        $stm->execute();
        $result = $stm->fetchAll();
        $dhb = NULL;
        return $result;
    }
  
    function GetDataByLIMIT($tablename,$pageid){
        $start = 20*($pageid-1);
        $row = 20;
        $dhb = new Database();
        $q = "SELECT * FROM `".$tablename."` LIMIT $start,$row";
        $stm = $dhb->prepare($q);
        $stm->execute();
        $result = $stm->fetchAll();
        $dhb = NULL;
        return $result;
    }
    function GetOneData($selectby,$tablename,$clo,$id){
        $dhb = new Database(); 
        $q = "SELECT `".$selectby."` FROM `".$tablename."` Where `".$clo."`= '$id'";
        $stm = $dhb->prepare($q);
        $stm->execute();
        $result = $stm->fetchAll();
        $dhb = NULL;
        return $result;
    }
   function Deleteuser($tablename,$col,$id){
        $dhb = new Database(); 
        $q = "DELETE FROM `".$tablename."`WHERE `".$col."`= '$id' ";
        $stm = $dhb->prepare($q);
        $stm->execute();
        if($stm->execute()){
        $dhb = NULL;
        return TRUE;   
        } else {
            $dhb = NULL;
            echo 'Wrong';    
        }
    }
      function Delete_Fav_job($tablename,$col1,$col2,$emp_id,$fav_id){
        $dhb = new Database(); 
        $q = "DELETE FROM `".$tablename."`WHERE `".$col1."`= '$emp_id'AND `".$col2."`='$fav_id'";
        $stm = $dhb->prepare($q);
        $stm->execute();
        if($stm->execute()){
        $dhb = NULL;
        return TRUE;   
        } else {
            $dhb = NULL;
            echo 'Wrong';    
        }
    }
    
        function UpdateByID($tablename,$col,$update,$colId,$id){
        $dhb = new Database(); 
        $q = "UPDATE `".$tablename."` SET `".$col."` = '".$update."' WHERE `".$colId."` = '$id';";
        $stm = $dhb->prepare($q);
        if($stm->execute()){
        $dhb = NULL;
        return TRUE;
        } else {
            echo 'Wrong';    
        }

    }
       function Add_cat($cat_name){
         $dhb = new Database(); 
        $q = "INSERT INTO `job_categories`(`cat_id`, `cat_name`) VALUES ('','$cat_name')";
        $stm = $dhb->prepare($q);
        if($stm->execute()){
        $dhb = NULL;
        return TRUE;
        } else {
            echo 'Wrong';    
        }
    }
  function checkApproved_user($jobid , $compid){
        $dhb = new Database(); 
        $q = "SELECT `app_emp` FROM `approve` WHERE `app_job` = '$jobid' AND `company`= '$compid'";
        $stm = $dhb->prepare($q);
        $stm->execute();
        if($stm->execute()){
            $result = $stm->fetchAll();
        $dhb = NULL;
        return $result;   
        } else {
            $dhb = NULL;
            echo 'Wrong';    
        }
  }
    
}
