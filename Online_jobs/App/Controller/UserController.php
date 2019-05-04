<script src="../Resources/js/Notifiecation.js" type="text/javascript"></script>
<?php
//print_r($_POST);
include '../model/updateuser.php';
$update = new updateuser();
$update->set_id($_GET['id']);
if($_POST)
{
    if(isset($_POST['Update']))
    {
        $first_name = filter_var($_POST['firstName'],FILTER_SANITIZE_STRING);
        $last_name = filter_var($_POST['lastName'],FILTER_SANITIZE_STRING);
        $country = filter_var($_POST['country'],FILTER_SANITIZE_STRING);
        @$town = filter_var($_POST['town'],FILTER_SANITIZE_STRING);
        $password = filter_var($_POST['Password'],FILTER_SANITIZE_STRING);
        $confirmPassword = filter_var($_POST['confirmPassword'],FILTER_SANITIZE_STRING);
        
        if($first_name!='')
        {
            $update->update('first_name', $first_name);
        }
        if($last_name!='')
        {
            $update->update('last_name', $last_name);
        }
        if($country!= -1)
        {
            $update->update('country', $country);
            if(isset($town))
            {
                $update->update('town', $town);
            }
        }
        if($_POST['phoneNumber']!='')
        {
            $update->update('phone_num', $_POST['phoneNumber']);
        }
        if($_POST['phoneCode'] !='')
        {
            $update->update('phone_code', $_POST['phoneCode']);
        }
        if($password !='')
        {
            if($password == $confirmPassword){
            $update->update('password', $password);
            }
        }
      echo '<script type="text/javascript">notifyMe(" Account updated!","You Have Succsfuly Updated Your Account");</script>';
      echo '<script type="text/javascript">Redirect("../View/Site_page.php?page=Profile");</script>';
        
    }
   if(isset($_POST['Delete']))
   {
       $update->Delete();
       session_start();
       session_destroy();
      echo '<script type="text/javascript">notifyMe(" Account Deleted!","You Have Succsfuly Deleted Your Account");</script>';
      echo '<script type="text/javascript">Redirect("../View/Home.php");</script>';
   }
}
