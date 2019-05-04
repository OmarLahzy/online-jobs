<?php

include 'Database.php';

class updateuser {

    private $id;

    function set_id($emp_id) {
        $this->id = $emp_id;
    }

    function getinfo() {
        try {
            $dbh = new Database();
           $q = "SELECT `email`, `first_name`, `last_name`, `country`, `town`, `birthday`, `gender`, `phone_num`, `phone_code`,  `profile_pic`, `cv`FROM `users` WHERE `user_id` = '$this->id'";

            $stm = $dbh->prepare($q);
            $stm->execute();
            if ($stm->rowCount() > 0) {
                $result = $stm->fetchAll();
                $dhb = NULL;
                return $result;
            } else {
                echo 'WRONG USER NAME OR PASSWORD';
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function update($col, $value) {
        try {
            $dbh = new Database();
            $q = "UPDATE `users` SET `$col`= '$value' WHERE `user_id` = '$this->id'";
            $stm = $dbh->prepare($q);
            $stm->execute();
            if ($stm->rowCount() > 0) {
                $result = TRUE;
                $dhb = NULL;
                return $result;
            } else {
                echo 'WRONG USER NAME OR PASSWORD';
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function Delete() {
        try {
            $dbh = new Database();
            $q = "DELETE FROM `users` WHERE `users`.`user_id` = $this->id";
            $stm = $dbh->prepare($q);
            $stm->execute();
            if ($stm->rowCount() > 0) {
                $result = TRUE;
                $dhb = NULL;
                return $result;
            } else {
                echo 'WRONG USER NAME OR PASSWORD';
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}
