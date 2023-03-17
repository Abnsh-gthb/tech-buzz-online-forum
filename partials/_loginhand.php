<?php 

$login=false;
$logerr=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '_dbcon.php';

    $email=$_POST['log_email'];
    $password=$_POST['log_pass'];   
    $uri=$_GET['continue']; 
    // $sql="Select * from user_details where user_email='$email'";
    $sql="SELECT * FROM `user_details` WHERE user_email='$email'";;
    $res=mysqli_query($con,$sql);
    $num=mysqli_num_rows($res);
    $fetch=mysqli_fetch_assoc($res);
    $pass=$fetch['user_pass'];
    // $pass_hash=password_verify($password,$pass) ;
    // echo var_dump($pass_hash);
    // exit();
    if($num==1 && $pass==$password){
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['useremail']=$email;
            header("Location:".$uri);
        }
        else{
            header("Location:..\index.php?logerr=true");
        }
    }

?>