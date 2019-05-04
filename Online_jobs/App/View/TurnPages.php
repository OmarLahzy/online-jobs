<?php
include '../model/getjob.php';
include 'HTML_B.php'; 
include 'Header.php';
 include 'nav_bar.php';
 ?>
<div class = "container" style="overflow: hidden;">
            <?php
    $result_job = new getjob();
                    
    $cat_cat = $result_job->GetDataByLIMIT("job_categories",$_GET['page']);
            for($i = 0;$i<count($cat_cat);$i++) {
            echo '<div class ="cat"><a href="BrowesJobs.php?id='.$cat_cat[$i]['cat_id'].'">'.$cat_cat[$i]['cat_name'].'</a></div>';
    }
?>
</div>
<?php
echo '<div class="paginate paginate-dark wrapper">';
echo '<ul>';
echo '<li><a href="TurnPages.php?page='.($_GET['page']-1).'">Previous Page</a></li>';
for($i=1;$i<6;$i++){
    echo '<li><a href="TurnPages.php?page='.$i.'">Page'.$i.'</li>';
}
echo '<li><a href="TurnPages.php?page='.($_GET['page']+1).'">Next Page</a></li>';
echo '</ul>';
echo '<div class="Clear"></div>';
echo '</div>';
 include 'Footer.php';
?>

