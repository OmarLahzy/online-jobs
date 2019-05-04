<?php
  include '../model/getjob.php';
  $path = new getjob();
  $dir = $path->GetOneData("cv", "users", "user_id", $_GET['id']);
  print_r($dir);
  header('Content-type: application/pdf');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  echo file_get_contents($dir[0]['cv']);
?>