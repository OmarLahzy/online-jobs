<?php
 include '../Controller/SearchController.php';
 include 'HTML_B.php';
 include 'Header.php';
 include 'nav_bar.php';
 
  echo'<div class="JOB_BROWES">
    <div class="container">';
  if(!empty($result)){
    for($i=0;$i<count($result);$i++){
        echo '<div class="JOB_INFO">';
        echo '<a href="page.php?id='.$result[$i]['job_id'].'">'.$result[$i]['job_name'].'<span><br> '.$result[$i]['job_date'].'</span></a>
        <p>'.substr($result[$i]['job_description'],0,50).'<a href="page.php?id='.$result[$i]['job_id'].'">..more>></a></p>
        <p>'.$result[$i]['job_salary'].'</p>
        </div>';
        }} else {
            echo '<div class="JOB_INFO">';
    echo 'Nothing Found!';    
    echo '</div>';
}
   echo'
  </div>
</div>
';
echo '<div class="Clear"></div>';
echo '</div>';
         
        include 'Footer.php';
?>