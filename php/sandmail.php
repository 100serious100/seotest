<?php
// require_once('../PHPMailer/PHPMailer-master/PHPMailerAutoload.php');
// $mail = new PHPMailer();
// $mail->CharSet = 'utf-8';
// $name = $_POST['name'];
// $tel = $_POST['tel'];

// $mail->isSMTP();
// $mail->Host = 'smtp.mail.ru';
// $mail->SMTPAuth = true;
// $mail->Username ='mishast_ul@mail.ru';//от кого письмо
// $mail->Password = '4yuOv~+{,gdslp7beT1s';
// $mail->SMTPSecure = 'ssl';
// $mail->Port = 465;

// $mail->setFrom('mishast_ul@mail.ru');
// $mail->addAddress('mishastup_ul@mail.ru');//кому письмо
// $mail->isHTML(true);

// $mail->Subject = 'Обратный звонок';
// $mail->Body = ''.$name. ' оставил заявку, его телефон '. $tel;
// $mail->AltBody='';

// $mail->send();

$to = "mishastup_ul@mail.ru";
$tema = "Обратный звонок";
$message = $_POST['name'];
$message .= $_POST['tel'];

mail($to, $tema, $message);
?>