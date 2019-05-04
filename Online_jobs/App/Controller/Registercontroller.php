<script src="../Resources/js/Notifiecation.js" type="text/javascript"></script>
<?php
if ($_POST) {
    if (isset($_POST['submit']) and $_POST['submit'] = 'Register') {
        $email = filter_var($_POST['user_email'], FILTER_SANITIZE_EMAIL);
        $fname = filter_var($_POST['user_Fname'], FILTER_SANITIZE_STRING);
        $lname = filter_var($_POST['user_Lname'], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST['user_pass'], FILTER_SANITIZE_STRING);
        $contry = $_POST['contry'];
        $town = $_POST['town'];
        $birthday = $_POST['user_birthday'];
        $gender = $_POST['user_gender'];
        $phonenumber = $_POST['user_phone'];
        $phonecode = $_POST['user_code'];
        $q_answer = filter_var($_POST['user_answer'], FILTER_SANITIZE_STRING);
        $pic = "../Resources/Images/uploads/facebook-avatar.jpg";
        ;
        $cv = 'later';
        $type = $_POST['user_type'];
        try {
            include '../model/Regiset.php';
            $register = new Regiset();
            $register->setdata($email, $fname, $lname, $password, $contry, $town, $birthday, $gender, $phonenumber, $phonecode, $q_answer, $pic, $cv, $type);
            if ($register->Insert()) {
                echo '<script type="text/javascript">notifyMe("Registerd!","You Have Succsfuly Registerd");</script>';
                echo '<script type="text/javascript">Redirect("../View/Login.php");</script>';
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
?>


