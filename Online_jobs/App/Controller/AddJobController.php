<script type="text/javascript" src="../Resources/js/Notifiecation.js"></script>
<?php
include '../model/Add_job.php';
if($_POST)
{
    $job_name = filter_var($_POST['jobName'],FILTER_SANITIZE_STRING);
    $job_description = filter_var($_POST['jobDescription'],FILTER_SANITIZE_STRING);
    $job_salary = filter_var($_POST['jobSalary'],FILTER_SANITIZE_NUMBER_INT);
    $job_freePlaces = filter_var($_POST['freePlaces'],FILTER_SANITIZE_NUMBER_INT);
    $job_experience = filter_var($_POST['experience'],FILTER_SANITIZE_NUMBER_INT);
    $add = new addjob();
    $add->add_info($job_name, $job_description, $_POST['category'],
            $job_salary, $job_freePlaces, $_POST['com_id'], $job_experience);
    $add->addjob();
    echo '<script type="text/javascript">notifyMe("Job Added","You have Added Job")</script>';
    echo '<script type="text/javascript">Redirect("../View/Site_page.php?page=Profile")</script>';
}
?>