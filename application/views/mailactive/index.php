<?php
//include '../../config/config.php';
require 'phpmailer/PHPMailerAutoload.php';
function sendmails($sendfrom,$to,$message,$subject){
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output
$email = new PHPMailer(true);
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'noreplyatcastindia@gmail.com';                 // SMTP username
$mail->Password = 'rmdunniulzojlimi';
//$mail->Username = 'support@porwadjain.com';                 // SMTP username
//$mail->Password = 'support123';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom($sendfrom,'Cast India' );
//$mail->From = 'support@porwadjain.com';
//$mail->FromName = 'PJS';
$mail->addAddress($to);     // Add a recipient
$mail->addReplyTo($sendfrom, 'Cast India');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = '<div>'.$message.'</div>';
$mail->AltBody = $message;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    return "false";
} 
return "true";
}
?>