<script src="../Resources/js/Notifiecation.js" type="text/javascript"></script>
<?php
include '../model/getjob.php';
session_start();
if (isset($_SESSION['username'])) {
    if (!($_SESSION['user_type'] == 1 || $_SESSION['user_type'] == 3)) {
        $Data = new getjob();
        $emp_id = $_SESSION['ID'];
        $com_id = $_GET['comp'];
        $job_id = $_GET['id'];
        $emp_App = $Data->checkApproved_user($job_id, $com_id);
        if (@!$emp_App[0]['app_emp'] == $_SESSION['ID']) {
            $userData = $Data->GetDatabyID("users", "user_id", $emp_id);
            $job = $Data->GetDatabyID("apply_job", "employee_id", $emp_id);
            $bool = FALSE;
            if (empty($userData[0]['cv']) || $userData[0]['cv'] == 'later') {
                echo '<script type="text/javascript">notifyMe("No CV!","You dont have any CV");</script>';
                echo '<script type="text/javascript">Redirect("../View/Apply_Form.php");</script>';
                //you should check if the user Appplied or Not
            } else {
                for ($i = 0; $i < count($job); $i++) {
                    if ($job[$i]['job_id'] == $job_id) {
                        $bool = TRUE;
                    }
                }
                if (!$bool) {
                    $Data->Delete_Fav_job("favorite_jobs", "emp_id", "fav_job", $emp_id, $job_id);
                    if ($inserintoApply = $Data->Add_Apply_job("apply_job", $job_id, $com_id, $emp_id)) {
                        echo '<script type="text/javascript">notifyMe("Job Applied!","You Have Applied for This job check Profile");</script>';
                        echo '<script type="text/javascript">Redirect("../View/Site_page.php?page=Profile");</script>';
                    }
                } else {
                    echo '<script type="text/javascript">notifyMe("Job Already Applied!","You Have Already Applied for This job check Profile");</script>';
                    echo '<script type="text/javascript">Redirect("../View/Site_page.php?page=Profile");</script>';
                }
            }
        } else {
            echo '<script type="text/javascript">notifyMe("you can\'t Apply Agine!","The company Already Approved You");</script>';
            echo '<script type="text/javascript">Redirect("../View/Home.php");</script>';
        }
    } else {
        echo '<script type="text/javascript">notifyMe("You Can\'t prform this Action!"," ");</script>';
        echo '<script type="text/javascript">Redirect("../View/Home.php");</script>';
    }
} else {
    echo '<script type="text/javascript">notifyMe("Not Login!","You need To Log In to Apply for a job");</script>';
    echo '<script type="text/javascript">Redirect("../View/Login.php");</script>';
}
?>
