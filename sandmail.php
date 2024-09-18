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
///////////////////////////////////////////////
// $to = "mishastup_ul@mail.ru";
// $tema = "Обратный звонок";
// $message = $_POST['name'];
// $message .= $_POST['tel'];

// mail($to, $tema, $message);
/////////////////////////////////////////////

// $to = "mishastup_ul@mail.ru"; // емайл получателя данных из формы
// $tema = "Форма обратной связи на PHP"; // тема полученного емайла
// $message = "Ваше имя: ".$_POST['name']."<br>";//присвоить переменной значение, полученное из формы name=name
// $message .= "Телефон: ".$_POST['tel']."<br>"; //tl
// $headers = 'MIME-Version: 1.0' . "\r\n"; // заголовок соответствует формату плюс символ перевода строки
// $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n"; // указывает на тип посылаемого контента
// mail($to, $tema, $message, $headers); //отправляет получателю на емайл значения переменных
// 
/////////////////////////////////////////////
error_reporting( E_ERROR );   //Отключение предупреждений и нотайсов (warning и notice) на сайте
// создание переменных из полей формы		
if (isset($_POST['name']))			{$name			= $_POST['name'];		if ($name == '')	{unset($name);}}
if (isset($_POST['email1']))		{$tel		= $_POST['tel'];		if ($tel == '')	{unset($tel);}}
//стирание треугольных скобок из полей формы
/* комментарий */
if (isset($name) ) {
$name=stripslashes($name);
$name=htmlspecialchars($name);
}
if (isset($tel) ) {
$tel=stripslashes($tel);
$tel=htmlspecialchars($tel);
}
// адрес почты куда придет письмо
$address="mishast_ul@mail.ru";
// текст письма 
$note_text="Имя : $name \r\n Phone : $tel \r\n";

if (isset($name)) {
mail($address,$note_text,"Content-type:text/plain; windows-1251"); 
// сообщение после отправки формы
echo "<p style='color:green;'>Уважаемый(ая) <b style='color:red;'>$name</b> Ваше письмо отправленно успешно. <br> Спасибо. <br>Вам скоро ответят по телефону <b style='color:red;'> $tel</b>.</p>";
}










?>