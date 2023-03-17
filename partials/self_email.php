<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


// if (isset($_POST['send'])){
 
    $sub_email=$_GET['email'];
    $sub_name=$_GET['name'];

    // $sub_email=$_POST['email'];
    // $sub_name=$_POST['name'];


    $replys = "Dear Abinash" ;
    $replys .= "\n \nWe got a new email from ".$sub_name."(".$sub_email.").Plz do reply or needful.\n";
    $replys .= "\n Thanks & Regards,\n";
    $replys .= "\n The Tech-Buzz Team";

    require "../vendor/autoload.php";



    $mail = new PHPMailer(true);

    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "jayrama002@gmail.com";
    $mail->Password = "vtaqcrmlukedaddg";

    $mail->setFrom("jayrama002@gmail.com","Tim");
    $mail->addAddress("jayrama002@gmail.com","Abinash");
    $mail->Subject = "Subscription mail from Tech-Buzz";
    $mail->Body = $replys;

    if($mail->send()!=0){
        header("Location:../contact.php?senterr=false");
    }

?>