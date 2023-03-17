<?php include 'partials/_dbcon.php'; ?>
<link rel="stylesheet" href="partials/style.css">
<?php include 'partials/_nav.php'; ?>

<style>
    body{
        background: linear-gradient(160deg,pink,wheat,skyblue);
    }
    #login{
      display:none;
    }
  #search3,
  #searchbar3 {
    display: block;
    background: none;
    border-radius: 8px;
    border: none;
  }

  #search3,
  #searchbar3:focus {
    outline: none;
  }

  #searchbar3 {
    border-left: 1px solid #f0F;
    border-bottom: 1px solid #f00;
    padding:0 4px 2px;
  }

  #search {
    display: none;
  }
</style>
<?php
$logerr=false;

  $id = $_GET['threadid'];
  $user_id = $_GET['user_id'];
  
  $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
  $res = mysqli_query($con, $sql);
  while ($row = mysqli_fetch_assoc($res)) {
    $catname = $row['thread_title'];
    $desc = $row['thread_desc'];
  }
?>
<?php

  $method = $_SERVER['REQUEST_METHOD'];
  if ($method == 'POST') {
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $comment_desc = $_POST['comment'];
    $comment_desc=str_replace("<","&lt;",$comment_desc);
    $comment_desc=str_replace(">","&gt;",$comment_desc);
    $comment_by=$_SESSION['useremail'];
    $sql_user="SELECT sno FROM `user_details` WHERE user_email='$comment_by'";
    $res2=mysqli_query($con,$sql_user);
    $fetch=mysqli_fetch_assoc($res2);
    $comm_by=$fetch['sno'];
    $sql = "INSERT INTO `comments` ( `comment`, `thread_id`, `comm_by`, `comm_time`) VALUES ('$comment_desc', '$id','$comm_by', current_timestamp())";
    $res = mysqli_query($con, $sql);

    $show_alert = true;

    if ($show_alert == true) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Successfully Posted!</strong>Your Comment has been posted.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
  }
  else{
    $logerr=true;
  }
}

?>
<?php
$sql_user="SELECT user_email FROM `user_details` WHERE sno='$user_id'";
$res2=mysqli_query($con,$sql_user);
$fetch=mysqli_fetch_assoc($res2);
?>

<div class="p-4 mb-4 mt-4 bg-info-subtle rounded-3 container">
  <div class="container-fluid py-3">
    <h3 class=""><b style="color: blue;"> <?php echo $catname; ?></b></h3>
    <p class="col-md-8 fs-6"><?php echo $desc; ?></p>
    <hr>
    <!-- <p> Happy to see you! This a knoledge sharing forum!!</p> -->
    <div class="pst_by">Posted by: <span><b><?php echo $fetch['user_email']; ?></b></span></div>
  </div>
</div>

<!-- //////////////////////comment////////////////////// -->
<form class="container bg-light p-4 rounded" action="<?php $_SERVER['REQUEST_URI'] ?>" method="post">
  <h3 class="mb-4">comment....</h3>

  <div class="mb-3">
    <div class="form-floating">
      <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="comment" style="height: 100px"></textarea>
      <label for="floatingTextarea2" style="color: rgb(120, 120, 120);">Describe the Answer here......</label>
    </div>
  </div>
  <div class="d-flex flex-row-reverse">
    <button type="submit" class="btn btn-primary px-5 ">Post</button>
  </div>
  <?php
  if($logerr){
    echo'
    <p style="color:red;">Sorry! You are not logged in. plz log in to post</p>
    ';
  }
  
  ?>
</form>

<!-- /////////////////////////////Answers/////////////////////////// -->

<div class="container" style="min-height: 16rem;">
  <h1>Discussions</h1>
  <?php
  try {
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `comments` WHERE thread_id=$id ORDER BY `comments`.`comm_time` DESC";
    $res = mysqli_query($con, $sql);
    $ans = false;
    $noRes = true;
    while ($row = mysqli_fetch_assoc($res)) {
      $noRes = false;
      $ans = true;
      $id = $row['comm_id'];
      $comment = $row['comment'];
      $time = $row['comm_time'];
      $comm_by = $row['comm_by'];
      $sql_user="SELECT user_email FROM `user_details` WHERE sno='$comm_by'";
    $res2=mysqli_query($con,$sql_user);
    $fetch=mysqli_fetch_assoc($res2);


      echo ' <div class="media my-3 d-flex category-card">
      <img class="mr-3 rounded-circle" src="img/slider2.jpg" style="width:100px; height:100px;" alt="Generic placeholder image">
      <div class="mx-3">
      <h5 class="mt-0"><a href="#" class="text-decoration-none d-flex">' . $fetch['user_email'] . '<span style="color:black; font-size:12px; margin:auto .75rem;">' . substr($time, 0, 16) . '</span></a></h5>
      <p>' . $comment . '</p>
    </div>
    </div>';
    }
    // echo $noRes;
    if ($noRes) {

      echo '<div class="jumbotron jumbotron-fluid p-4 mb-4 mt-4 bg-info-subtle rounded-3 container">
    <div class="container">
      <h1 class="display-4">No Comment has been added</h1>
      <p class="lead" style="margin:.75rem auto; color:purple; text-shadow:0 0 12px purple;">Be the Fisrt to start this journey</p>
    </div>
  </div>';
    }
  } catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
  }

  ?>
</div>



<script src="partials/script_onlineforum.js"></script>
</body>

</html>
<?php include "partials/_footer.php"; ?>