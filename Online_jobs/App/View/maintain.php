<script type="text/javascript" src="../Resources/js/Notifiecation.js"></script>
<?php
session_start();

if(!(isset($_SESSION['username']) and $_SESSION['username'] == 'admin@g.com' and $_SESSION['user_type'] == 1))
{
    echo '<script type="text/javascript">notifyMe("Loged In!","You Are not an Admin");</script>';
    echo '<script type="text/javascript">Redirect("../index.php");</script>';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="../Resources/css/main.css" type="text/css">
        <link rel="stylesheet" href="../Resources/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="../Resources/css/bootstrap.css" type="text/css">
        <script src="../Resources/js/bootstrap.min.js"></script>
        <script src="../Resources/js/bootstrap.js"></script>
    </head>
    <body>
        <aside>
                    <nav>
                        <a  href="Home.php">Home</a>
                        <a  href="?page=Admin_Remove_user">Remove Users</a>
                        <a  href="?page=Add_cat">Add Catigories</a>
                        <a  href="?page=Remove_cat">Remove Categories</a>
                        <a  href="?page=Remove_Job">Remove Job</a>
                    </nav>
           </aside>
        <div class="maintain">
            <?php
            if (@$_GET['page']) {
                        $url = $_GET['page'] . ".php";
                        if (is_file($url)) {
                            include $url;
                        } else {
                            echo 'requested file is not found !';
                        }
                    } else {
                        header("Location:maintain.php?page=Admin_Remove_user") ;
                    }
          ?>
        </div>
       
    </body>
    
</html>
