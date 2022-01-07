<?php 
require "phpmailer/PHPmailerAutoloader.php";
$mail= new PHPMailer;
//$mail->isSMTP();
$mail->Host="smtp.gmail.com";
$mail->Port=587;
$mail->SMTPAuth=true;
$email->SMTPsecure='tls';
$mail->Username='shuklaharsh665@gmail.com';
$mail->Password='harsh@123';
$mail->setForm('shuklaharsh50@gmail.com','PJS');
$mail->addAddress('shuklaharsh989@gmail.com');
$mail->addReplyTo('shuklaharsh989@gmail.com');
$mail->isHTML(true);
$mail->Subject='PHP mailer subject';
$mail->Body='<h1>Hello harsh shukla</h1>';
if(!$mail->send()){

    echo "message not send";

}else{
    echo "mess send succesfull";
}

?>