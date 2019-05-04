<script src="../Resources/js/Notifiecation.js"></script>
<?php
include '../model/Upload.php';
include '../model/getjob.php';
session_start();
$id = $_SESSION['ID'];
$update = new getjob();
if ($_POST) {
    if (isset($_FILES)) {
        if (!empty($_FILES['image']['name'])) {
            $allowedext = array('png', 'jpeg', 'jpg', 'gif');
            $file = $_FILES['image'];
            $maxsize = 4000000;
            $dir = "../Resources/Images/uploads/";
            $upload = new Upload($file, $allowedext, $dir, $maxsize);
            $upload->Upload();
            $diractor = $dir . $upload->getFileUrl();
            $update->UpdateByID("users", "profile_pic", $diractor, "user_id", $id);
            echo '<script type="text/javascript">notifyMe("Profile_pic is Add!","You Have Succsfuly Add Profile_pic");</script>';
            echo '<script type="text/javascript">Redirect("../View/Site_page.php?page=Profile");</script>';
        } else {
            $update->UpdateByID("users", "profile_pic", "../Resources/Images/uploads/facebook-avatar.jpg", "user_id", $id);
            echo '<script type="text/javascript">notifyMe("Profile_pic is Removed!","You Have Succsfuly Removed Profile_pic");</script>';
            echo '<script type="text/javascript">Redirect("../View/Site_page.php?page=Profile");</script>';
        }
    }
}
?>

