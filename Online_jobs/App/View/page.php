<?php
include '../model/getjob.php';
include  'HTML_B.php';
include 'Header.php';
include 'nav_bar.php';
$id = $_GET['id'];
$tablename = "job_info";
$result_job = new getjob();
$result = $result_job->GetDatabyID($tablename,"job_id", $id);
$job_approved = $result_job->GetOneData('app_emp', 'approve', 'app_job', $id);
$free_places = $result[0]['job_free_places'] - count($job_approved);
$cat = $result_job->GetOneData('cat_name', 'job_categories', 'cat_id', $result[0]['job_field']);
//echo "<pre>";print_r($cat); echo "<pre>";
$similarJobs = $result_job->GetDatabyID("job_info", "job_field", $result[0]['job_field']);
//echo "<pre>";print_r($similarJobs); echo "<pre>";
$company = $result_job->GetDatabyID("users", "user_id",$result[0]['company_id']);
$empid = $result_job->GetOneData("app_emp", "approve","app_job", $id);
?>
    <div class="main_body">
        <div class="container0">
            <div class="container1">
            
                <div class="job_1">
                    <div class="job_pic">
                        <img src="<?php echo $company[0]['profile_pic'];?>">
                    </div>
                    <div class="job_name_container">
                        <ul>
                            <li><h2><?php echo $result[0]['job_name'];?></h2></li><br>
                            <li><p><i class="fa fa-map-marker" aria-hidden="true" style="color:#f23535">
                                
                            </i> <?php echo $company[0]['town'].", ".$company[0]['country'];  ?></p></li>
                        </ul>
                    </div>
                    <?php
                     echo '<a href="../Controller/Apply_for_job_controller.php?id='.$id.'&comp='.$result[0]['company_id'].'">Apply</a>';
                    echo '<a href="../Controller/Add_fav_controller.php?id='.$id.'&comp='.$result[0]['company_id'].'">Add_fav</a>';
                  ?>
                </div>
                
                <div class="job_2">
                    <div class="data_container1">
                        <ul class="data1">
                            <li class="aa2"><p><b>Job Function : </b><span><?php echo $cat[0]['cat_name']; ?></span></p></li>
                            <li class="aa3"><p><b>Salary : </b><span><?php echo $result[0]['job_salary']; ?></span></p></li>
                        </ul>
                        <ul class="data2">
                            <li class="aa2"><p><b>experience :</b><span> <?php echo $result[0]['job_exp']; ?> years</span></p></li>
                            <li class="aa3"><p><b>free places : </b><span> <?php echo $free_places;?> places</span></p></li>
                        </ul>
                    </div>
                </div>
                
                <div class="job_3">
                    <div class="Job_Description"><p>Job Description:</p></div>
                    <div class="job_desc">
                        <?php echo '<span>'.$result[0]['job_description'].'</span>'; ?> 
                    </div>
                </div>
                
                <div class="job_4_1">
                    <div class="about_company1"><p>About Company:</p></div>
                    <div class="about_com1">
                        <span><br>
                            Email : <?php echo $company[0]['email']; ?><br><br>
                            Phone : <?php echo $company[0]['phone_code'].$company[0]['phone_num']; ?>
                        </span>
                    </div>
                    <div class="c_pic1">
                        <img src="<?php echo $company[0]['profile_pic'];?>">
                    </div>
                </div>
                
            </div>
            <div class="container2">
                <div class="job_5">
                    <div class="similar_jobs">Similar Job:</div>
                    <div class="similars">
                        <?php
                        for ($i=0;$i< count($similarJobs);$i++)
                        {
                            echo '<div class="similar1">'. '<a style="color:black;text-decoration: none;" class="AAA" href="page.php?id='.$similarJobs[$i]['job_id'].' ">'.$similarJobs[$i]['job_name'].'</a>';
                            echo '<p><i class="fa fa-clock-o" aria-hidden="true" style="margin-right:3px"></i>'.$similarJobs[$i]['job_date'].'</p>';
                            echo '</div>';
                        }
                        ?>
                        
                                                      
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
 
 include 'Footer.php';
?>

