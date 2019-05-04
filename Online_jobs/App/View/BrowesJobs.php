<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 include '../model/getjob.php';
 include 'HTML_B.php';
 include 'Header.php';
 include 'nav_bar.php';
 $result_job = new getjob();
 $id = @$_GET['id'];
  $result = $result_job->GetDatabyID("job_info","job_field", $id);
  $count = 0;
  
  echo'<div class="JOB_BROWES">
    <div class="container">';
           for($i =0;$i<count($result);$i++){
            echo'<div class ="div">';
            echo '<a class="a" href="page.php?id='.$result[$i]['job_id'].'"><h3>'.$result[$i]['job_name'].'</h3></a>';
            echo '<p id="p" >'.$result[$i]['job_description'].'</p><br>
            </div>';
}
   echo'
  </div>
</div>
';

 
 include 'Footer.php';
?>
