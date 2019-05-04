<?php
include '../model/Upload.php';
include '../model/getjob.php';
include 'HTML_B.php';
 include 'Header.php';
 include 'nav_bar.php';

$page = @$_GET['page'];
$id = @$_SESSION['ID'];

if($page == "Profile"){
    if(!isset($_SESSION['username'])){
    header("Location:Login.php");
} else {
  if($_SESSION['user_type'] == 2){
      include 'profile.php';
  }
    elseif($_SESSION['user_type'] == 3){
      include 'company.php';
  }
    
}
  } else if($page == "Career_Advice"){
      include 'CareerAdvice.php';
}
if($page=="About_us")
    include './about_us.php';
include 'Footer.php';
?>