<?php

require '../Resources/PHPMailer/PHPMailerAutoload.php';

if ($_POST) {
    
    
    $mail = new PHPMailer;
    $mail->isSMTP();                            // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                     // Enable SMTP authentication
    $mail->Username = 'onlinejobsystem2017@gmail.com';          // SMTP username
    $mail->Password = 'As123456789'; // SMTP password
    $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                          // TCP port to connect to
    
    $mail->setFrom($_POST['company_email'], 'Online Jobs');
    $mail->addAddress($_POST['employee_email']);   // Add a recipient
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    $mail->isHTML(true);  // Set email format to HTML

    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['content'];

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}
?>