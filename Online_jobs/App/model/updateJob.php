<?php
include 'Database.php';
class updateJob
{
    private $job_id;
    function set_id($job_id)
    {
        $this->job_id=$job_id;
    }
    function GetAllDataOrderd($tablename,$clo,$DESC)
    {
        $dhb = new Database();
        $q = "SELECT * FROM `".$tablename."` ORDER BY `".$clo."`".$DESC;
        $stm = $dhb->prepare($q);
        $stm->execute();
        $result = $stm->fetchAll();
        $dhb = NULL;
        return $result;
    }
    function getdata()
    {
        try 
        { 
            $dbh = new Database();
            $q = "SELECT * FROM `job_info` WHERE `job_id` =".$this->job_id;
            $stm = $dbh->prepare($q);
            $stm->execute();
            if($stm->rowCount()>0)
            {
                $result = $stm->fetchAll();
                $dhb = NULL;
                return $result;
            } 
            else 
            {
                echo 'WRONG USER NAME OR PASSWORD';    
            }    
        } 
        catch (Exception $ex) 
        {
            echo $ex->getMessage();
        }
    } 
    function updatedata($column,$value)
    {
        try 
        { 
            $dbh = new Database();
            $q = "UPDATE `job_info` SET `$column`='$value' WHERE `job_id`=".$this->job_id;
            $stm = $dbh->prepare($q);
            $stm->execute();
            if($stm->rowCount()>0)
            {
                $dhb = NULL;
                return TRUE;
            } 
            else 
            {
                echo 'WRONG Job';    
            }    
        } 
        catch (Exception $ex) 
        {
            echo $ex->getMessage();
        }
    }
    function deletejob()
    {
        try 
        { 
            $dbh = new Database();
            $q = "DELETE FROM `job_info` WHERE `job_id` =".$this->job_id;
            $stm = $dbh->prepare($q);
            $stm->execute();
            if($stm->rowCount()>0)
            {
                $dhb = NULL;
                return TRUE;
            } 
            else 
            {
                echo 'WRONG Job';    
            }    
        } 
        catch (Exception $ex) 
        {
            echo $ex->getMessage();
        }
    }
    function showapplayemp()
    {
        $arr= [];
        try 
        { 
            $dbh = new Database();
            $q = "SELECT `employee_id` FROM `apply_job` WHERE `job_id` =". $this->job_id;
            $stm = $dbh->prepare($q);
            $stm->execute();
            if($stm->rowCount()>0)
            {
                $result = $stm->fetchAll();
                for ($i =0;$i<count($result);$i++) 
                {
                    //echo $value['employee_id'] . '<br>';
                    $q = "SELECT `email` FROM `users` WHERE `user_id` =". $result[$i]['employee_id'];
                    $stm = $dbh->prepare($q);
                    $stm->execute();
                    $r=$stm->fetchAll();
                    $arr[$i]['email']= $r[0]['email'];
                    $arr[$i]['id']=$result[$i]['employee_id'];
                }
                return $arr;
            } 
            else 
            {
                return FALSE;   
            }    
        } 
        catch (Exception $ex) 
        {
            echo $ex->getMessage();
        }
    }
    function approve($emp_id)
    {
        try 
        { 
            $dbh = new Database();
            $q = "SELECT * FROM `apply_job` WHERE `employee_id`='$emp_id' AND `job_id` = '$this->job_id'";
            $stm = $dbh->prepare($q);
            $stm->execute();
            $result = $stm->fetchAll();
            if($stm->rowCount()>0)
            {
                $x=$result[0]['com_id'];
                $s = "INSERT INTO `approve` (`app_emp`, `app_job`, `company`) VALUES ('$emp_id','$this->job_id','$x')";
                $stm = $dbh->prepare($s);
                $stm->execute();
                $l= "DELETE FROM `apply_job` WHERE `job_id`= '$this->job_id' AND`employee_id`='$emp_id'";
                $stm = $dbh->prepare($l);
                $stm->execute();  
            } 
            else 
            {
                echo 'WRONG Job';    
            }    
        } 
        catch (Exception $ex) 
        {
            echo $ex->getMessage();
        }
    }
    function showapproveemp()
    {
        $arr= [];
        try 
        { 
            $dbh = new Database();
            $q = "SELECT `app_emp` FROM `approve` WHERE `app_job`=". $this->job_id;
            $stm = $dbh->prepare($q);
            $stm->execute();
            if($stm->rowCount()>0)
            {
                $result = $stm->fetchAll();
                for ($i =0;$i<count($result);$i++) 
                {
                    //echo $value['employee_id'] . '<br>';
                    $q = "SELECT `email` FROM `users` WHERE `user_id` =". $result[$i]['app_emp'];
                    $stm = $dbh->prepare($q);
                    $stm->execute();
                    $r=$stm->fetchAll();
                    $arr[$i]['email']= $r[0]['email'];
                    $arr[$i]['id']=$result[$i]['app_emp'];
                }
                return $arr;
            } 
            else 
            {
                echo 'NO APPROVED EMPLOYEES';    
            }    
        } 
        catch (Exception $ex) 
        {
            echo $ex->getMessage();
        }
    }
    function ignore($emp_id)
    {
        try 
        { 
            $dbh = new Database();
            $l= "DELETE FROM `apply_job` WHERE `job_id`= '$this->job_id' AND`employee_id`='$emp_id'";
            $stm = $dbh->prepare($l);
            $stm->execute();  
            if($stm->rowCount()>0)
            {
                $dhb = NULL;
                return TRUE;
            } 
            else 
            {
                echo 'WRONG Job';    
            }    
        } 
        catch (Exception $ex) 
        {
            echo $ex->getMessage();
        }
    }
}


