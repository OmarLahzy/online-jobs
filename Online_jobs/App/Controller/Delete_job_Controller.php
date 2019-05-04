<script src="../Resources/js/Notifiecation.js" type="text/javascript"></script>
<?php
try {
    include '../model/getjob.php';
    $id = $_GET['id'];
    $Delete_job = new getjob();
    
    if($Delete_job->Deleteuser("favorite_jobs", "fav_job",$id)){
      echo '<script type="text/javascript">notifyMe("Deleted!","Job has been Deleted");</script>';
      echo '<script type="text/javascript">Redirect("../View/Site_page.php?page=Profile");</script>';
    } else {
        echo 'Error';    
    }
} catch (Exception $ex) {
    
}
?>
