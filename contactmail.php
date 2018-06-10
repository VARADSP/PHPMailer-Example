<!DOCTYPE html>
<html>
<header>
  <?php
  // Import PHPMailer classes into the global namespace
  // These must be at the top of your script, not inside a function
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
 ?>
<title>HTML Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://studentstutorial.com/div/d.css">
<header>
<body>
<div class="w3-row">
<div class="w3-half w3-card-2 w3-round">
<div class="w3-container w3-center w3-green">
<h2>Send Email</h2>

<?php
if(isset
//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'user@example.com';                 // SMTP username
    $mail->Password = 'secret';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
    $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
 ?>
</div>
<br>
<form class="w3-container" method="post" action="process.php">
<label class="w3-label w3-text-black"><b>Name</b></label>
<p><input class="w3-input w3-border w3-round" type="text" placeholder="name" name="name" required></p>
<label class="w3-label w3-text-black"><b>Email</b></label>
<p><input class="w3-input w3-border w3-round" type="text" placeholder="email" name="email"></p>
<label class="w3-label w3-text-black"><b>Phone</b></label>
<p><input class="w3-input w3-border w3-round" type="text" placeholder="phone" name="phone"></p>
<p class="w3-center"><button class="w3-btn w3-green w3-round" style="width:100%;height:40px" name="btn-save">Submit</button></p>
</form>
<div class="w3-container w3-center w3-light-grey">
<h4>Students Tutorial</h4>
</div>
</div>
<div class="w3-half">
</div>
</div>
</body>
</html>
