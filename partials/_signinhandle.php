<?php
$showerror=false;
$cpassError=false;
$showAlert=false;


if($_SERVER['REQUEST_METHOD']=='POST'){
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
            // $hash=password_hash($pass,PASSWORD_DEFAULT);
            $sql="INSERT INTO `user_details` (`user_email`, `user_pass`, `timestamp`) VALUES ('$username', '$pass', current_timestamp())";
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
?>