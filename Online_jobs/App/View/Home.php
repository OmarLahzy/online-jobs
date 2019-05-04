
<?php
include '../model/getjob.php';
include 'HTML_B.php';
 include 'Header.php';
 include 'nav_bar.php';           
$result_job = new getjob();
$result = $result_job->GetAllDataOrderd("job_info","job_date","DESC");
?>
<div class="About">
                <div class="container">
                    <h2><i class="fa fa-clock-o" aria-hidden="true"></i>Latest Jobs<i class="fa fa-clock-o" aria-hidden="true"></i></h2>
                    <div class="jobs">
                        <ul>
                            <?php
                            for($i=0;$i< count($result)&& $i<20;$i++){
                            echo '<li>';
                            echo "<a href="."page.php?id=".@$result[$i]['job_id'].">".@$result[$i]['job_name']."</a>";
                            echo "<br><strong> Salary ".@$result[$i]['job_salary']."</strong><br>";
                            echo "<p>".@$result[$i]['job_date']."</p>";
                            echo '</li>';
                            }
                           ?>
                        </ul>
                    </div>
                    <div class="Clear"></div>
                    <h2><i class="fa fa-graduation-cap" aria-hidden="true"></i>Latest Jobs<i class="fa fa-graduation-cap" aria-hidden="true"></i></h2>
                 <div class="jobs">
                        <ul>
                            <?php
                            for($i=0;$i<count($result) && $i<20;$i++){
                            echo '<li>';
                            echo "<a href="."page.php?id=".@$result[$i]['job_id'].">".@$result[$i]['job_name']."</a>";
                            echo"<br><strong> Salary ".@$result[$i]['job_salary']."</strong><br>";
                            echo "<p>".@$result[$i]['job_date']."</p>";
                            echo '</li>';
                            }
                           ?>
                        </ul>
                    </div>
                </div>
                    <div class="Clear"></div>
             <div class="Browes">
                <div class="container">
                    <div class="JOBS">
                        <h2>Browes <span style="color:red;">Jobs</span></h2>
                        <?php
                        $Cat_result = $result_job->GetAllDataOrderd("job_categories","cat_name","ASC");
                         for($i = 0;$i<20;$i++){
                       echo'<ul>';
                            echo'<li><h3><a href="BrowesJobs.php?id='.@$Cat_result[$i]['cat_id'].'">'.@$Cat_result[$i]['cat_name'].'</a></h3></li>';
                        echo'</ul>';
                         }
                        ?>
                    </div>
                </div>
            </div>

            </div>
<?php
  include 'Footer.php';
?>
