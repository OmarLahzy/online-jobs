<?php
$id = $_SESSION['ID'];
$Data = new getjob();
$result = $Data->GetDatabyID("users", "user_id", $id);
$applied_jobs_id = $Data->GetDatabyID("apply_job", "employee_id", $id);
for ($i = 0; $i < count($applied_jobs_id); $i++) {
    $applied_jobs[] = $Data->GetDatabyID("job_info", "job_id", $applied_jobs_id[$i]['job_id']);
}
$fav_job_id = $Data->GetDatabyID("favorite_jobs", "emp_id", $id);
for ($i = 0; $i < count($fav_job_id); $i++) {
    $fav_job[] = $Data->GetDatabyID("job_info", "job_id", $fav_job_id[$i]['fav_job']);
}
$Approve_emp = $Data->GetDatabyID("approve", "app_emp", $id);
for ($i = 0; $i < count($Approve_emp); $i++) {
    $Approve_job[] = $Data->GetDatabyID("job_info", "job_id", $Approve_emp[$i]['app_job']);
}
?>
<div class="main_body">

    <div class="container">
        <div class="small_container">
            <div class="emp_info">
                <div class="emp_img">
                    <div class="emp_img_container">
                        <img src="<?php echo $result[0]['profile_pic']; ?>">
                    </div>
                    <form action="../Controller/UploadImageController.php" method="post" enctype="multipart/form-data">
                        <input required="required" type="file" name="image">
                        <input type="submit" name="upload" value="submit" class="submit_img">
                    </form>
                    <form action="../Controller/UploadImageController.php" method="post" enctype="multipart/form-data">
                        <input type="submit" name="upload" value="remove" class="submit_img">
                    </form>
                </div>
                <div class="emp_data">
                    <h3 class="name"><?php echo $result[0]['first_name']; ?></h3>
                    <div class="emp_data_container">
                        <ul class="ul_emp1">
                            <li class="emp_a2"><p class="gender"><?php echo $result[0]['gender']; ?></p></li>
                            <li class="emp_a3"><p class="phone"><?php echo $result[0]['phone_num']; ?></p></li>
                        </ul>
                        <ul class="ul_emp2">
                            <li class="emp_a2"><p class="adress"><?php echo $result[0]['town'] . ", " . $result[0]['country']; ?></p></li>
                            <li class="emp_a3"><p class="phone"><?php echo $result[0]['email']; ?></p></li>
                        </ul><br>
                    </div>
                    <div class="emp_cv">
                        <a class="cv_button" href="Apply_Form.php">Upload CV</a>
                        <a class="cv_button" href="UpdateUser.php">Edite Account</a>
                    </div>
                </div>
            </div>


            <hr>
            <div class="job_info">
                <h2>Applied Jobs</h2>
                <div class="list_container">
                    <div class="list"  id="list1">
                        <div class="job_data" >
                            <ul>
                                <?php
                                for ($i = 0; $i < @count($applied_jobs); $i++)
                                    echo '<li><a class="job_data_a" href="page.php?id=' . $applied_jobs[$i][0]['job_id'] . '" >' . $applied_jobs[$i][0]['job_name'] . '</a></li>';
                                ?>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            <hr>
            <div class="job_info">
                <h2>Fav Jobs</h2>
                <div class="list_container">
                    <div class="list"  id="list1">
                        <div class="job_data" >
                            <ul>
                                <?php
                                for ($i = 0; $i < @count($fav_job); $i++) {
                                    echo '<li><a class="job_data_a" href="page.php?id=' . $fav_job[$i][0]['job_id'] . '" >' . $fav_job[$i][0]['job_name'] . '</a>';

                                    echo '<a class="jobs_button" href="../Controller/Delete_job_Controller.php?id=' . $fav_job[$i][0]['job_id'] . '">delete</a>';
                                    echo '<a class="jobs_button" href="../Controller/Apply_for_job_controller.php?id=' . $fav_job[$i][0]['job_id'] . '&comp='
                                    . $fav_job[$i][0]['company_id'] . '">apply' . '</a></li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="job_info">
                <h2>Approved Jobs</h2>
                <div class="list_container">
                    <div class="list"  id="list1">
                        <div class="job_data" >
                            <ul>
                                <?php
                                for ($i = 0; $i < @count($Approve_job); $i++) {
                                    echo '<li><a class="job_data_a" href="page.php?id=' . @$Approve_job[$i][0]['job_id'] . '" >' . @$Approve_job[$i][0]['job_name'] . '</a>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
?>