<?php
session_start();
include "_dbcon.php";
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $cat_name = $_POST['cat_name'];
        $cat_desc = $_POST['cat_desc'];
        $cat_name = str_replace("<", "&lt;", $cat_name);
        $cat_name = str_replace(">", "&gt;", $cat_name);
        $cat_desc = str_replace("<", "&lt;", $cat_desc);
        $cat_desc = str_replace(">", "&gt;", $cat_desc);
        
        $img_name = $_FILES['cat_dp']['name'];
        $img_size = $_FILES['cat_dp']['size'];
        $tmp_name = $_FILES['cat_dp']['tmp_name'];
        $error = $_FILES['cat_dp']['error'];
        if($error===0){
            if($img_size>154576){
                echo 1;
                exit;
                // header("location: ..\addCategory.php?Up_sz_err=true");
                header("Location:..\addCategory.php?Up_sz_err=true");
            }
            else{
                $img_x=pathinfo($img_name, PATHINFO_EXTENSION);
                // echo($img_x);
                $img_x_lc = strtolower($img_x);
                
                $allowed_xt=array("jpg","jpeg","png");
                if(in_array( $img_x,$allowed_xt)){
                    $new_img_id=uniqid("IMG_",true).'.'. $img_x_lc;
                    $upload_path='../img/'.$new_img_id;
                    move_uploaded_file($tmp_name,$upload_path);
                    $sql_qr="INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_desc`, `img`, `time`) VALUES (NULL, '$cat_name', '$cat_desc', '$new_img_id', current_timestamp())";
                    if(mysqli_query($con,$sql_qr)){ 
                        header("Location:..\index.php?Upload=success");
                    }
                }
    
                //insrtion into database
                else{
                    header("location:..\addCategory.php?type_error=true");
                }
            }
        }
        else{
            header("Location:..\addCategory.php?unknown_err=true");
        }
    }
    else{
        header("Location:..\addCategory.php?unknown_err=true");
    }
}

?>