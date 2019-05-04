<?php
include '../model/updateJob.php';
include 'HTML_B.php';
include 'Header.php';
include 'nav_bar.php';
$upjob = new updateJob();
$upjob->set_id($_GET['id']);
$result = $upjob->getdata();
//print_r($result);
$emp = $upjob->showapplayemp();
$job_id = $result[0]['job_id'];
$empid = $emp[0]['id'];
//echo $empid;
?>
<div class = "container" style="overflow: hidden">
    <div style="min-height: 615px;">
        <div class="update" style="width: 500px;float: right; height: 670px;">	
            <?php
            echo '<form action="../Controller/jobController.php?id=' . $job_id . '&empid=' . $empid . '" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend><span class="number">U</span> Update Job Info</legend>
                    <h4>Job Name</h4>
                    <input type="text" name="jobName" placeholder="' . $result[0]['job_name'] . '">
                    <h4>Job Description</h4>
                    <textarea name="jobDescription" rows="5" placeholder="' . $result[0]['job_description'] . '"></textarea>
                    <h4>Category</h4>
                    <select name="category">
                        <option value="" ></option>';
            ?>
            <?php
            $res = $upjob->GetAllDataOrderd("job_categories", "cat_name", "ASC");
            foreach ($res as $key => $value) {
                if ($value['cat_id'] == $result[0]['job_field']) {
                    echo '<option disabled>' . $value['cat_name'] . '</option>';
                } else {
                    echo '<option value = "' . $value['cat_id'] . '">' . $value['cat_name'] . '</option>';
                }
            }
            ?>
            </select>
            <h4>Job Salary</h4>
            <input type="number" name="jobSalary" placeholder="<?php echo $result[0]['job_salary']; ?>">
            <h4>Free Places</h4>
            <input type="number" name="freePlaces"placeholder="<?php echo $result[0]['job_free_places']; ?>">
            <h4>Experience</h4>
            <input type="number" name="jobExperience" min="0" max="20" placeholder="<?php echo $result[0]['job_exp']; ?>">
            <input type="submit" name="delete" value="Delete job" style="float: left;width: 164px;" />
            <input type="submit" name="submit" value="Update"/>
            </fieldset>
            </form>
        </div>
        <div class="update"style="max-width: 640px; float: left;width: 640px;height: 670px;">
            <pre class="head">Applied Employees</pre>					
            <div class="applay">
<?php
if ($emp == FALSE) {
    echo 'No One Applied';
} else {
    for ($i = 0; $i < count($emp); $i++) {
        echo '
                    <form style="height:50px;"action="../Controller/jobController.php?id=' . $job_id . '&empid=' . $empid . '" method="post" enctype="multipart/form-data">
                    <input style="display: none;"name="emp_id" value="' . $emp[$i]['id'] . '">
                    <a href="OpenPdf.php?id=' . $emp[$i]['id'] . '" target="_blank" >' . $emp[$i]['email'] . '</a>
                    <input type="submit" name="approve" value="Accept">
                    <input type="submit" name="ignore" value="Reject"style="margin-right: 5px;">
                    </form>';
    }
}
?>
            </div>
            <pre class="head"style="padding-top: 20px;">Approved Employees</pre>
            <div class="approve">
                <?php
                $emp = $upjob->showapproveemp();
                for ($i = 0; $i < count($emp); $i++) {
                    echo '
                    <form style="height:50px;"action="../Controller/jobController.php?id=' . $job_id . '&email=' . $emp[$i]['email'] . '" method="post" enctype="multipart/form-data">
                    <a href="OpenPdf.php?id=' . $emp[$i]['id'] . '" target="_blank" >' . $emp[$i]['email'] . '</a>
                    <input type="submit" name="email"value="Send Mail">
                    </form>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
                <?php
                include 'Footer.php';
                ?>


