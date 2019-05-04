<script src="../Resources/js/Notifiecation.js"></script>
<?php
//print_r($_POST);
if($_POST)
{
    include '../model/updateJob.php';
    $sql = new updateJob();
    $sql->set_id($_GET['id']);
    if(isset($_POST['submit']))
    {
        $job_name = filter_var($_POST['jobName'],FILTER_SANITIZE_STRING);
        $job_description = filter_var($_POST['jobDescription'],FILTER_SANITIZE_STRING);
        $job_salary = filter_var($_POST['jobSalary'],FILTER_SANITIZE_NUMBER_INT);
        $job_freePlaces = filter_var($_POST['freePlaces'],FILTER_SANITIZE_NUMBER_INT);
        $job_experience = filter_var($_POST['jobExperience'],FILTER_SANITIZE_NUMBER_INT);
        
        
        if($job_name!='')
        {
            $sql->updatedata('job_name', $job_name);
        }
        if($job_description !='')
        {
            $sql->updatedata('job_description',$job_description);
        }
        if($_POST['category']!='')
        {
            $sql->updatedata('job_field',$_POST['category']);
        }
        if($job_salary !='')
        {
            $sql->updatedata('job_salary', $job_salary);
        }
        if($job_freePlaces !='')
        {
            $sql->updatedata('job_free_places', $job_freePlaces);
        }
        if($job_experience !='')
        {
            $sql->updatedata('job_exp',$job_experience);
        }
        echo '<script type="text/javascript">notifyMe("Job is Updated!","You Have Succsfuly update The job");</script>';
        echo '<script type="text/javascript">Redirect("../View/Site_page.php?page=Profile");</script>';
    }
    if(isset($_POST['delete']))
    {
        $sql->deletejob();
        echo '<script type="text/javascript">notifyMe("Job is Deleted!","You Have Succsfuly Deleted The job");</script>';
        echo '<script type="text/javascript">Redirect("../View/Site_page.php?page=Profile");</script>';
    }
    if(isset($_POST['approve']))
    {
        $sql->approve($_GET['empid']);
        header("Location:../View/test.php?id=".$_GET['id']."");

    }
    if(isset($_POST['ignore']))
    {
        $sql->ignore($_GET['empid']);
        header("Location:../View/test.php?id=".$_GET['id']."");

    }
    if(isset($_POST['email']))
    {
        header("Location: ../View/E-Mail.php?email=".$_GET['email']."&jobid=".$_GET['id']);
    }
}
