<?php
$id = $_SESSION['ID'];
$Data = new getjob();
$company = $Data->GetDatabyID('users', 'user_id', $id);
//echo "<pre>";print_r($company); echo "<pre>";
$job_info = $Data->GetDatabyID('job_info', 'company_id', $id);
//echo "<pre>";print_r($job_info); echo "<pre>$id";
?>
<div class="main_body">

    <div class="container">
        <div class="small_container">
            <div class="emp_info">
                <div class="emp_img">
                    <div class="emp_img_container">
                        <img src="<?php echo $company[0]['profile_pic'] ?>">
                    </div>
                    <form action="../Controller/UploadImageController.php" method="post" enctype="multipart/form-data">
                        <input required="required" type="file" name="image">
                        <input type="submit" name="upload" value="submit" class="submit_img">
                    </form>
                    <form action="../Controller/UploadImageController.php" method="post" enctype="multipart/form-data">
                        <input type="submit" name="upload" value="remove" class="submit_img">
                    </form>
                </div>

                <div class="emp_data" style="">
                    <h3 class="name"><?php echo $company[0]['first_name']; ?></h3>
                    <div class="emp_data_container">
                        <ul class="ul_com">
                            <li class="a2"><p class="gender"><?php echo $company[0]['email'] ?></p></li>
                            <li class="a3"><p class="phone">  <?php echo $company[0]['town'] . ", " . $company[0]['country'] ?></p></li>
                        </ul>
                    </div>
                    <div class="emp_cv">
                        <a class="cv_button2" href="UpdateUser.php">Edite Account</a>
                        <a class="cv_button2" href="AddJob.php">AddJob</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="job_info">
                <h2>Your Jobs</h2>
                <div class="list_container">
                    <div class="list"  id="list1">
                        <div class="job_data" >
                            <ul>
                                <?php
                                for ($i = 0; $i < count($job_info); $i++) {
                                    echo '<li class="company_jobs"><a class="job_data_a" href="page.php?id=' . $job_info[$i]['job_id'] . '">' . $job_info[$i]['job_name'] . '</a>';
                                    echo '<a class="jobs_button" href="../View/test.php?id=' . $job_info[$i]['job_id'] . '">Edit Job</a></li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="job_4">
                <div class="about_company"><b>About Company:</b></div>
                <div class="about_com">
                    <span><br>
                        Email : <?php echo $company[0]['email']; ?><br><br>
                        Phone : <?php echo $company[0]['phone_code'] . $company[0]['phone_num']; ?>
                    </span>
                </div>
                <div class="c_pic">
                    <img src="<?php echo $company[0]['profile_pic'] ?>">
                </div>
            </div>

        </div>
    </div>
</div>