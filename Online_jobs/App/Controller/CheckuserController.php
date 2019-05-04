<?php
if($_POST){
      if(isset($_POST['submit']) and $_POST['submit'] = 'Restore'){
          $username = filter_var($_POST['user_email'],FILTER_SANITIZE_EMAIL);
          $answer = filter_var($_POST['user_answer'],FILTER_SANITIZE_STRING);
          $newpassword = filter_var($_POST['user_pass'],FILTER_SANITIZE_STRING);
          try {
              include '../model/Restorepassword.php'; 
              $retore = new Restorepassword();
              $retore->setData($username, $answer,$newpassword);
              $retore->Checkuser();
              header("Location:../View/Login.php");
          } catch (Exception $ex) {
              echo $ex->getMessage();
          }
      
    }
   }
?>

