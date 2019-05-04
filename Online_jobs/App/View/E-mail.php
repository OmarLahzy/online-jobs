<script src="../Resources/js/Notifiecation.js"></script><?php
include 'HTML_B.php';
include 'Header.php';
if(isset($_SESSION['username']) && $_SESSION['user_type'] == 3){
include '../model/updateJob.php';
include 'nav_bar.php';
//$upjob = new updateJob($_GET['jobid']);
?>
<div class = "container">
    <div class="update">
        <form action="../Controller/Mail.php" method="POST">
            <fieldset>
                <legend><span class="number">U</span> E-Mail</legend>
                <h4>Company E-Mail</h4>
                <input type="text" name="company_email" placeholder="From : ">
                <h4>Employee E-Mail</h4>
                <input  type="text" name="employee_email" value="<?php echo $_GET['email'];?>">
                <h4>Subject</h4>
                <input type="text" name="subject">
                <h4>Content</h4>
                <textarea style= "width: 100%;height: 197px;resize: none;" name="content"></textarea>
                <input type="submit" value="Send" />
            </fieldset>
        </form>
    </div>
</div>
<?php
include 'Footer.php';
} else {
            echo '<script type="text/javascript">notifyMe("Not Loged in OR you Dont have permisson!"," ");</script>';
            echo '<script type="text/javascript">Redirect("../View/Home.php");</script>';
}
?>

