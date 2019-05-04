<?php

include 'Database.php';

class addJob {

    private $jobName;
    private $jobDesc;
    private $jobCat;
    private $jobSalary;
    private $jobFree;
    private $com_id;
    private $job_exp;
                function GetAllDataOrderd($tablename, $clo, $DESC) {
        $dhb = new Database();
        $q = "SELECT * FROM `" . $tablename . "` ORDER BY `" . $clo . "`" . $DESC;
        $stm = $dhb->prepare($q);
        $stm->execute();
        $result = $stm->fetchAll();
        $dhb = NULL;
        return $result;
    }

    function add_info($name, $description, $category, $salary, $free_places, $com_id,$job_exp) {
        $this->jobName = $name;
        $this->jobDesc = $description;
        $this->jobCat = $category;
        $this->jobSalary = $salary;
        $this->jobFree = $free_places;
        $this->com_id = $com_id;
        $this->job_exp = $job_exp;
    }

    function addjob() {
        try {
            $dbh = new Database();
            $q = $sql = "INSERT INTO `job_info` (`job_name`, `job_field`, `job_salary`, `job_free_places`, `job_description`, `job_date`, `company_id` , `job_exp`) 
				   VALUES ('$this->jobName', '$this->jobCat', '$this->jobSalary', '$this->jobFree', '$this->jobDesc', NOW(), '$this->com_id' , '$this->job_exp')";
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
