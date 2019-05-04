<script src="../Resources/js/Notifiecation.js"></script>
<script type= "text/javascript" src = "../Resources/js/countries.js"></script> 
<?php
include 'HTML_B.php';
include 'Header.php';
include 'nav_bar.php';
if(isset($_SESSION['username'])){
include '../model/updateuser.php';
$emp_id = $_SESSION['ID'];
$up_user = new updateuser();
$up_user->set_id($emp_id);
$result = $up_user->getinfo();
?>
<div class = "container">
    <div class="update">
        <form action="../Controller/UserController.php?id=<?php echo $emp_id; ?>" method="post">
            <fieldset>
                <legend><span class="number">U</span> Enter Your Info</legend>
                <h4>First Name</h4>
                <input type="text" name="firstName" placeholder="<?php echo $result[0]['first_name']; ?>">
                <h4>Last Name</h4>
                <input type="text" name="lastName" placeholder="<?php echo $result[0]['last_name']; ?>">
                <h4>Country</h4>
                <select id="country" name="country"></select>
                <select id="state" name="town"></select>
                <script language="javascript">
                    populateCountries("country", "state");
                </script>
                <h4>Phone Number</h4>
                <input type="number" name="phoneNumber" placeholder="<?php echo $result[0]['phone_num']; ?>">
                <h4>Phone Code</h4>
                <input type="number" name="phoneCode" placeholder="<?php echo $result[0]['phone_code']; ?>">
                <h4>Password</h4>
                <input  type="Password" name="Password" >
                <h4>Confirm Password</h4>
                <input  type="Password" name="confirmPassword">
                <input type="submit" name="Update" value="Update" />
                <input type="submit" name="Delete" value="Delete Account" style="float: left;width: 164px;" />
            </fieldset>
        </form>
    </div>
</div>
<?php
include 'Footer.php';
}else {
             echo '<script type="text/javascript">notifyMe("Not Loged in OR you Dont have permisson!"," ");</script>';
            echo '<script type="text/javascript">Redirect("../View/Home.php");</script>';
}
?>
