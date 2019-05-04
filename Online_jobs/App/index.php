<script type="text/javascript">
   function notifyMe($var,$var2) {
  if (!("Notification" in window)) {
    alert("This browser does not support system notifications");
  }
  else if (Notification.permission === "granted") {
    notify($var,$var2);
  }
  else if (Notification.permission !== 'denied') {
    Notification.requestPermission(function (permission) {
      if (permission === "granted") {
        notify($var,$var2);
      }
    });
  }
  
  function notify($var,$var2) {
    var notification = new Notification($var, {
      icon: 'Resources/Images/notification-flat.png',
      body: $var2,
    });

    notification.onclick = function () {
      window.open("../View/Site_page.php?page=Profile");      
    };
    setTimeout(notification.close.bind(notification),5000); 
  }

}
            function Redirect($var) {
               window.location=$var;
           }

</script>
<?php
include 'model/getjob.php';
session_start();
$id = @$_SESSION['ID'];
$Data = new getjob();
$emp_id = $Data->GetDatabyID("approve", "app_emp", $id);
$action = $Data->GetOneData("action", "approve", "app_emp", $id);
 if(empty($emp_id)){
     echo '<script type="text/javascript">Redirect("View/Home.php");</script>';
 } else {
     for($i = 0;$i<count($action);$i++){
         if($action[$i]['action'] == 'unseen'){
         $Data->UpdateByID("approve", "action", "seen", "app_emp", $id);
      echo '<script type="text/javascript">notifyMe("A Compny Approved You","Check your Profile");</script>';
      echo '<script type="text/javascript">Redirect("View/Site_page.php?page=Profile");</script>';
         }
     }
}
echo '<script type="text/javascript">Redirect("View/Home.php");</script>';



?>

