<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include '../model/getjob.php';
session_start();
$id = $_SESSION['ID'];
$GetJob = new getjob();
$DATA = $GetJob->GetDatabyID("users", "user_id", $id);
?>
<html>
    <head>
        <title>Apply</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../Resources/css/Style.css" type="text/css">
    </head>
    <body>
        <div style="padding: 8% 0 0;margin: auto" class="login-form">
            <div class="form">
                <h2>Apply_Job</h2>
                <form action="../Controller/Upload_CV_Controller.php" method="post">
                    <input name="Firstname" type="text" value="<?php echo $DATA[0]['first_name']; ?>">
                    <input name="Lastname" type="text" value="<?php echo $DATA[0]['last_name']; ?>">
                    <input name="Email" type="email" value="<?php echo $DATA[0]['email']; ?>">
                    <input name="BirthDay" type="date" value="<?php echo $DATA[0]['birthday']; ?>">
                    <input name="Phone" type="number" value="<?php echo $DATA[0]['phone_code'] . $DATA[0]['phone_num']; ?>">
                    <input name="Country" type="text" value="<?php echo $DATA[0]['town'] . "," . $DATA[0]['country']; ?>">
                    <label>Years of EXP?</label>
                    <input name="EXP" type="number" min="0" max="20">
                    <label>Skills</label>
                    <textarea style="display: block; background: #f2f2f2;border:2px solid #DDD;  color: #000; margin: auto;" name="Skills"cols="50" rows="10"></textarea>
                    <label>Previous Job</label>
                    <textarea style="display: block; background: #f2f2f2;border:2px solid #DDD;  color: #000; margin: auto;"name="Previous_Job"cols="50" rows="10"></textarea>
                    <input name="submit" type="submit" value="Apply">
                </form>
            </div>
        </div>
    </body>
</html>

