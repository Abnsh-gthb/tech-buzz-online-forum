<?php

$empty_err=false;
$success=false;
if (isset($_POST["send"])) {
    
    $sender = $_POST['name'];
    $email ="From:". $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $toemail="jayrama002@gmail.com";
    
    if(empty($sender)|| empty($email)||empty($subject)||empty($message)){
        header("Location:../contact.php?empty_err=false");
        
    }
    else{
        if(mail($toemail,$subject,$message,$email)){
            header("Location:../contact.php?success=false");
            
        }
    }



}
?>