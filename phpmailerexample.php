<?php

  require("PHPMailer-master/PHPMailer-master/src/PHPMailer.php");
  require("PHPMailer-master/PHPMailer-master/src/SMTP.php");
  require("PHPMailer-master/PHPMailer-master/src/Exception.php");

    $mail = new PHPMailer\PHPMailer\PHPMailer();
                           // Passing `true` enables exceptions
  try {
      //Server settings
      $mail->SMTPDebug = 2;
      $mail->SMTPOptions = array(
      'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
      )
  );                              // Enable verbose debug output
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'spartaclub86@gmail.com';                 // SMTP username
      $mail->Password = 'sparta86';                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to

      //Recipients
      $mail->setFrom('parlikarvarad@gmail.com', 'VSP');
      $mail->addAddress('parlikarvarad@gmail.com', 'Joe User');     // Add a recipient
      $mail->addAddress('parlikaranuradha@gmail.com');               // Name is optional
      $mail->addReplyTo('machinelearn81@gmail.com', 'Information');
      $mail->addCC('parlikarvarad@gmail.com');
      $mail->addBCC('parlikarvarad@gmail.com');

      //Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Here is the VSP subject';
      $mail->Body    = 'This is the VSP message  <b>in bold!</b>';
      $mail->AltBody = 'This is the body in plain text for non-VSP mail clients';

      $mail->send();
      echo 'Message has been sent';
  } catch (Exception $e) {
      echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
  }
?>
