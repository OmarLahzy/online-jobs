<script src="../Resources/js/Notifiecation.js"></script>
<?php
if($_POST){
    if(isset($_POST['submit']) and $_POST['submit'] == 'Add'){
        $catname = $_POST['cat_name'];
        try {
            include '../model/getjob.php';
            $insert = new getjob();
            if($insert->Add_cat($catname)){
                echo '<script type="text/javascript">notifyMe("Categorie ADD!","You Have Succsfuly Added a Categorie");</script>';
                echo '<script type="text/javascript">Redirect("../View/maintain.php?page=Remove_cat");</script>';
            } else {
                echo 'ERROR';    
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();    
        }
    }
} else {
     echo '<script type="text/javascript">Redirect("../View/Home.php");</script>';
}
?>