<?php
include 'Database.php';
class advice
{
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
    function GetAllDataOrderd($tablename,$clo,$DESC){
        $dhb = new Database();
        $q = "SELECT * FROM `".$tablename."` ORDER BY `".$clo."`".$DESC;
        $stm = $dhb->prepare($q);
        $stm->execute();
        $result = $stm->fetchAll();
        $dhb = NULL;
        return $result;
    }
    function add_advice($advice_cont,$advisor)
    {
        try 
        { 
            $dbh = new Database();
            $q = "INSERT INTO `advice` (`advice_cont`, `advisor`) VALUES ('$advice_cont', '$advisor')";
            $stm = $dbh->prepare($q);
            $stm->execute();
            if($stm->rowCount()>0)
            {
                $result = TRUE;
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
    function delete_advice($advice_id)
    {
        try 
        { 
            $dbh = new Database();
            $q = "DELETE FROM `advice` WHERE `advice_id` = '$advice_id'";
            $stm = $dbh->prepare($q);
            $stm->execute();
            if($stm->rowCount()>0)
            {
                $result =TRUE;
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
    function show_advice($tablename,$pageid)
    {
        try 
        { 
        $start = 20*($pageid-1);
        $row = 20;
        $dhb = new Database();
        $q = "SELECT * FROM `".$tablename."` LIMIT $start,$row";
        $stm = $dhb->prepare($q);
        if($stm->execute()){
                 $result = $stm->fetchAll();
        $dhb = NULL;
        return $result;   
        }
             
            else 
            {
                $dhb = NULL;
                echo 'WRONG USER NAME OR PASSWORD';    
            }    
        } 
        catch (Exception $ex) 
        {
            echo $ex->getMessage();
        }
    }
    function show_myadvice($advisor)
    {
        try 
        { 
            $dbh = new Database();
            $q = "SELECT `advice_cont`, `advice_id`  , `advice_time` FROM `advice` WHERE `advisor` = $advisor";
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
    function add_comment($comment_con,$advice_id,$commenter)
    {
        try 
        { 
            $dbh = new Database();
            $q = "INSERT INTO `comment` (`advice_id`, `comment_cont`, `commenter`) VALUES ( '$advice_id', '$comment_con', '$commenter')";
            $stm = $dbh->prepare($q);
            $stm->execute();
            if($stm->rowCount()>0)
            {
                $result = TRUE;
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
    public function del_comment($comm_id)
    {
        try 
        { 
            $dbh = new Database();
            $q = "DELETE FROM `comment` WHERE `comm_id` = '$comm_id'";
            $stm = $dbh->prepare($q);
            $stm->execute();
            if($stm->rowCount()>0)
            {
                $result = TRUE;
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
    public function update_comment($comm_id , $update)
    {
        try 
        { 
            $dbh = new Database();
            $q = "UPDATE `comment` SET`comment_con`= '$update' WHERE `comm_id`='$comm_id'";
            $stm = $dbh->prepare($q);
            $stm->execute();
            if($stm->rowCount()>0)
            {
                $result = TRUE;
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
    public function show_comment($advice_id)
    {
        try 
        { 
            $dbh = new Database();
            $q = "SELECT * FROM `comment` WHERE `advice_id`='$advice_id'";
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
                echo 'NO COMMENTS FOUNDED';    
            }    
        } 
        catch (Exception $ex) 
        {
            echo $ex->getMessage();
        }
    }
    public function advisor_info($advisor)
    {
        try 
        { 
            $dbh = new Database();
            $q ="SELECT   `first_name`, `last_name`, `profile_pic` FROM `users` WHERE `user_id` = " . $advisor;
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
}

