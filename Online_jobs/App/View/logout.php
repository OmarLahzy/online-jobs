<script src="../Resources/js/Notifiecation.js" type="text/javascript"></script>
<?php
session_start();
session_destroy();
     echo '<script type="text/javascript">notifyMe("Loged Out!","You Have Succsfuly LogedOut");</script>';
     echo '<script type="text/javascript">Redirect("../View/Home.php");</script>';
?>

