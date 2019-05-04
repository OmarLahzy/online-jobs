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
      icon: '../Resources/Images/notification-flat.png',
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