<script src="../Resources/js/Notifiecation.js"></script>
<?php
session_start();
if (isset($_SESSION['username'])) {
    if (!($_SESSION['user_type'] == 1 || $_SESSION['user_type'] == 3)) {
        $Job_id = $_GET['id'];
        $com_id = $_GET['comp'];
        $emp_id = $_SESSION['ID'];
        include '../model/getjob.php';
        $Add_fav = new getjob();
        $emp_App = $Add_fav->checkApproved_user($Job_id, $com_id);
        if (@!$emp_App[0]['app_emp'] == $_SESSION['ID']) {
            $job = $Add_fav->GetDatabyID("favorite_jobs", "emp_id", $emp_id);
            $job_applied = $Add_fav->GetDatabyID("apply_job", "employee_id", $emp_id);
            $bool = FALSE;
            for ($i = 0; $i < count($job); $i++) {
                if ($job[$i]['fav_job'] == $Job_id) {
                    echo '<script type="text/javascript">notifyMe("EXIST!","You Have Already Add This Job To fav_job");</script>';
                    echo '<script type="text/javascript">Redirect("../View/Home.php");</script>';
                    $bool = TRUE;
                }
            }
            for ($i = 0; $i < count($job_applied); $i++) {
                if ($job_applied[$i]['job_id'] == $Job_id) {
                    echo '<script type="text/javascript">notifyMe("Cant Add To Fav!","You Are Applied For This Check Your Account");</script>';
                    echo '<script type="text/javascript">Redirect("../View/Home.php");</script>';
                    $bool = TRUE;
                }
            }

            if (!$bool) {
                $Add_fav->Add_Fav_Job("favorite_jobs", $Job_id, $emp_id);
                echo '<script type="text/javascript">notifyMe("ADD!","Add To Favourit In Your Profile");</script>';
                echo '<script type="text/javascript">Redirect("../View/Home.php");</script>';
            }
        } else {
        echo '<script type="text/javascript">notifyMe("you can\'t Add to Fav!","The company Already Approved You");</script>';
         echo '<script type="text/javascript">Redirect("../View/Home.php");</script>';
        }
    } else {
        echo '<script type="text/javascript">notifyMe("You Can\'t prform this Action!"," ");</script>';
        echo '<script type="text/javascript">Redirect("../View/Home.php");</script>';
    }
} else {
    header("Location:../View/Login.php");
}
?>
