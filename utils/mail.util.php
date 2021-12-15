<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once(dirname(__DIR__) . "/vendor/autoload.php");

/**
 * Send email using PHPMailer
 *
 * @param array $receiver Receiver's info (name, email)
 *
 * @param string $subject Email's subject
 *
 * @param string $content Email's content
 *
 * @return true|false Return true on success, false otherwise
 */
function sendmail($receiver, $subject, $content)
{
  $name = getenv("MAIL_NAME");
  $username = getenv("MAIL_USERNAME");
  $password = getenv("MAIL_PASSWORD");

  //Create a new PHPMailer instance
  $mail = new PHPMailer();

  //Tell PHPMailer to use SMTP
  $mail->isSMTP();

  //Enable SMTP debugging
  //SMTP::DEBUG_OFF = off (for production use)
  //SMTP::DEBUG_CLIENT = client messages
  //SMTP::DEBUG_SERVER = client and server messages
  //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
  $mail->SMTPDebug = SMTP::DEBUG_OFF;

  //Set the hostname of the mail server
  $mail->Host = 'smtp.gmail.com';
  //Use `$mail->Host = gethostbyname('smtp.gmail.com');`
  //if your network does not support SMTP over IPv6,
  //though this may cause issues with TLS

  //Set the SMTP port number:
  // - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
  // - 587 for SMTP+STARTTLS
  $mail->Port = 465;

  //Set the encryption mechanism to use:
  // - SMTPS (implicit TLS on port 465) or
  // - STARTTLS (explicit TLS on port 587)
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;

  //Username to use for SMTP authentication - use full email address for gmail
  //$mail->Username = 'username@gmail.com';
  $mail->Username = $username;

  //Password to use for SMTP authentication
  //$mail->Password = 'yourpassword';
  $mail->Password = $password;

  //Set who the message is to be sent from
  //Note that with gmail you can only use your account address (same as `Username`)
  //or predefined aliases that you have configured within your account.
  //Do not use user-submitted addresses in here
  //$mail->setFrom('from@example.com', 'First Last');
  $mail->setFrom($username, $name);

  //Set an alternative reply-to address
  //This is a good place to put user-submitted addresses
  //$mail->addReplyTo('replyto@example.com', 'First Last');
  $mail->addReplyTo($username, $name);

  //Set who the message is to be sent to
  //$mail->addAddress('whoto@example.com', 'John Doe');
  $mail->addAddress($receiver["email"], $receiver["name"]);

  //Set the subject line
  $mail->Subject = $subject;

  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body
  /* $content = "<b>I just want to test php send mail</b>"; */
  //$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
  $mail->msgHTML($content);

  //Replace the plain text body with one created manually
  //$mail->AltBody = 'This is a plain-text message body';

  //Attach an image file
  //$mail->addAttachment('images/phpmailer_mini.png');

  //send the message, check for errors
  if (!$mail->send()) {
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
    return false;
  } else {
    //echo 'Message sent!';
    return true;
  }
}
