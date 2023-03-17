<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if (isset($_POST['send'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $phone=$_POST["phone"];

    $replys = "Dear " . $name;
    $replys .= "\n \nWe got your email. Thanks to contacting us. We will reach you soon.\n";
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

    $mail->setFrom("jayrama002@gmail.com", "Abinash");
    $mail->addAddress($email, $name);

    $mail->Subject = "Confermation mail from Tech-Buzz";
    $mail->Body = $replys;

    if ($mail->send() != 0) {
        include '_dbcon.php';
        $sql = "INSERT INTO `contacts` (`name`,`phone_num`,`subject`, `msg`,`email`) VALUES ('$name','$phone','$subject','$message', '$email')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            header("Location:self_email.php?self_email=0&email=".$email."&name=".$name."");
        }
    } else {
        header("Location:../contact.php?senterr=true");
    }
}
