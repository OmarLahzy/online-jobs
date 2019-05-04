<?php
include '../model/updateJob.php';
include 'HTML_B.php';
include 'Header.php';
include 'nav_bar.php';
if(isset($_SESSION) and $_SESSION['user_type']== 3)
{
    $upjob = new updateJob();
}
else{
    header('Location:../index.php');
}
?>
<div class = "container">
    <div class="update">
        <form action="../Controller/AddJobController.php" method="post">
            <fieldset>
                <legend><span class="number">J</span> Enter Job Info</legend>
                <input style="display: none;"name="com_id" value="<?php echo $_SESSION['ID'];?>">
                <h4>Job Name</h4>
                <input  required="required"type="text" name="jobName">
                <h4>Job Description</h4>
                <textarea required="required" name="jobDescription" rows="5" style="resize: none;"></textarea>
                <h4>Category</h4>
                <select required="required" name="category">
                    <option value="" ></option>
                    <?php
                    $res = $upjob->GetAllDataOrderd("job_categories", "cat_name", "ASC");
                    foreach ($res as $key => $value) {
                        echo '<option value = "' . $value['cat_id'] . '">' . $value['cat_name'] . '</option>';
                    }
                    ?>
                </select>
                <h4>Job Salary</h4>
                <input required="required" type="number" name="jobSalary">
                <h4>Free Places</h4>
                <input required="required" type="number" name="freePlaces">
                <h4>Experience</h4>
                <input required="required" type="number" name="experience">
                <input type="submit" value="Add" />
            </fieldset>
        </form>
    </div>
</div>
<?php
include 'Footer.php';
?>

