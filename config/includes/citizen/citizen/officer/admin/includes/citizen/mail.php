<?php

use PHPMailer\PHPMailer\PHPMailer;

require '../vendor/autoload.php';

function sendEmail(
$to,
$subject,
$body
){

$mail = new PHPMailer(true);

$mail->isSMTP();

$mail->Host = 'smtp.gmail.com';

$mail->SMTPAuth = true;

$mail->Username = 'yourgmail@gmail.com';

$mail->Password = 'your-app-password';

$mail->SMTPSecure = 'tls';

$mail->Port = 587;

$mail->setFrom(
'yourgmail@gmail.com',
'Disaster Alert System'
);

$mail->addAddress($to);

$mail->Subject = $subject;

$mail->Body = $body;

$mail->send();

}
?>