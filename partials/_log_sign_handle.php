<?php
$showerror=false;
$cpassError=false;
$showAlert=false;


if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['_sign_handle']=true){
    include '_dbcon.php';
    $username=$_POST['sign_email'];
    $pass=$_POST['sign_pass'];
    $cpass=$_POST['sign_cpass'];

    $existSql="SELECT * FROM `user_details` WHERE user_email='$username'";
    $res=mysqli_query($con,$existSql);
    $row_num=mysqli_num_rows($res);
    if($row_num>0){
        $showerror=true;
        header("Location:..\index.php?showerror=true");
    }
    else{
        if($pass==$cpass){
            $hash=password_hash($pass,PASSWORD_DEFAULT);
            $sql="INSERT INTO `user_details` (`user_email`, `user_pass`, `timestamp`) VALUES ('$username', '$hash', current_timestamp())";
            $result=mysqli_query($con,$sql);
            if($result){
                $showAlert=true;
                header("Location:..\index.php?showAlert=".$showAlert);
            }
        }
        else{
            $cpassError=true;
            header("Location:..\index.php?cpassError=true");
        }
    }
} 
else if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['_log_handle']=true){


$login=false;
$logerr=false;
 if ($_SERVER["REQUEST_METHOD"]=="POST"){
    include '_dbcon.php';

    $email=$_POST['log_email'];
    $password=$_POST['log_pass'];
    echo $password."<br>";
    
    // $sql="Select * from user_details where user_email='$email'";
    $sql="SELECT * FROM `user_details` WHERE user_email='$email'";;
    $res=mysqli_query($con,$sql);
    $num=mysqli_num_rows($res);
    $fetch=mysqli_fetch_assoc($res);
    $pass=$fetch['user_pass'];
    echo $pass;
    $pass_hash=password_verify($password,$pass) ;
    exit();
    if($num==1 && $pass_hash==true){
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['useremail']=$email;
            header("Location:..\index.php?login=true");
        }
        else{
            header("Location:..\index.php?logerr=true");
        }
    }


}
else{
    header("Location:..\index.php?logerr=true");
}

?>