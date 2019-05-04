<script src="../Resources/js/Notifiecation.js" type="text/javascript"></script>
<?php
if ($_POST) {

    if (isset($_POST['submit']) and $_POST['submit'] = 'Login') {
        $username = filter_var($_POST['user_email'], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['user_pass'], FILTER_SANITIZE_STRING);

        try {
            include '../model/Loginclass.php';
            $login = new Loginclass();
            $login->setdata($username, $password);
            $result = $login->getdata();
            if($result == false)
            {
                echo '<script type="text/javascript">notifyMe("Error!","Wrong Password Or E-mail");</script>';
                echo '<script type="text/javascript">Redirect("../View/Login.php");</script>';
                
            }
            else if (count($result) == 1) {
                $login = NULL;
                session_start();
                $_SESSION['username'] = $username;
                foreach ($result as $row) {
                    $_SESSION['ID'] = $row['user_id'];
                    $_SESSION['user_type'] = $row['user_type'];
                }
                echo '<script type="text/javascript">notifyMe("Loged In!","You Have Succsfuly LogedIn");</script>';
                echo '<script type="text/javascript">Redirect("../index.php");</script>';
            } else {
                throw new Exception("ERROR");
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
?>

