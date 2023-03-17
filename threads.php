<?php include 'partials/_dbcon.php'; ?>
<link rel="stylesheet" href="partials/style.css">
<style>
  body {
    background: linear-gradient(160deg, pink, wheat, skyblue);
  }

  #search2,
  #searchbar2 {
    display: block;
    background: none;
    border-radius: 8px;
    border: none;
  }

  #search2,
  #searchbar2:focus {
    outline: none;
  }

  #searchbar2 {
    border-left: 1px solid #f0F;
    border-bottom: 1px solid #f00;
    padding: 0 4px 2px;
  }

  #search {
    display: none;
  }

  .grd-btn {
    padding: 0 !important;
    display: flex;
    width: 30px;
    height: 30px;
    border: none;
    border-radius: 2px;
    color: white;
    margin: 1.5px;
    justify-content: center;
    align-items: center;
    background: linear-gradient(160deg, rgba(255, 204, 0, 0.665), rgb(0, 128, 109), rgb(117, 117, 226));
  }
</style>
<?php include 'partials/_nav.php'; ?>
<?php
$id = $_GET['catid'];
$sql = "SELECT * FROM `categories` WHERE cat_id=$id";
$res = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($res)) {
  $catname = $row['cat_name'];
  $desc = $row['cat_desc'];
}

?>
<?php

$logerr = false;


$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $question_title = $_POST['question_title'];
    $question_desc = $_POST['question_desc'];
    $question_title = str_replace("<", "&lt;", $question_title);
    $question_title = str_replace(">", "&gt;", $question_title);
    $question_desc = str_replace("<", "&lt;", $question_desc);
    $question_desc = str_replace(">", "&gt;", $question_desc);
    $posted_by = $_SESSION['useremail'];
    $sql_user = "SELECT sno FROM `user_details` WHERE user_email='$posted_by'";
    $res2 = mysqli_query($con, $sql_user);
    $fetch = mysqli_fetch_assoc($res2);
    $post = $fetch['sno'];
    $sql = "INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$question_title', '$question_desc', '$id', '$post', current_timestamp())";
    $res = mysqli_query($con, $sql);

    $show_alert = true;

    if ($show_alert == true) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Successfully Inserted!</strong>Your Question has been inserted. Wait for somebody to response!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
  } else {
    $logerr = true;
  }
}

?>

<div class="p-4 mb-4 mt-4 bg-info-subtle rounded-3 container">
  <div class="container-fluid py-3">
    <h1 class="display-5 fw-bold">Welcom to the <b style="color: blue;"> <?php echo $catname; ?></b> Thread</h1>
    <p class="col-md-8 fs-4"><?php echo $desc; ?></p>
    <hr>
    <p> Happy to see you! This a knowledge sharing forum!!</p>
    <a href="index.php"><button class="btn btn-primary btn-lg" type="button">Main Page</button></a>
  </div>
</div>

<form class="container bg-light p-4 rounded" action="<?php $_SERVER['REQUEST_URI'] ?>" method="post">
  <h2 class="mb-4">Start a Discussion</h2>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title of Your Question</label>
    <input type="text" class="form-control" id="ques_title" name="question_title" aria-describedby="emailHelp" placeholder="Give a title in a short" required>
  </div>
  <div class="mb-3">
    <div class="form-floating">
      <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="question_desc" style="height: 100px" required></textarea>
      <label for="floatingTextarea2" style="color: rgb(120, 120, 120);">Describe the problem here......</label>
    </div>
  </div>
  <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <button type="submit" class="btn btn-primary">Submit</button>
  <?php

  if ($logerr) {
    echo '
    <p style="color:red;">Sorry! You are not logged in. plz log in to post</p>
    ';
  }

  ?>
</form>

<div class="container " style="min-height: 100vh;">
  <h1>Browse Questions</h1>
  <?php
  //pagination
  $per_page_num = 04;

  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = 1;
  }
  $start_from = ($page - 1) * 04;
  //....................................//
  $id = $_GET['catid'];
  $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id ORDER BY `threads`.`timestamp` DESC limit $start_from,$per_page_num";
  $res = mysqli_query($con, $sql);
  $noRes = true;
  while ($row = mysqli_fetch_assoc($res)) {
    $noRes = false;
    $id = $row['thread_id'];
    $catname = $row['thread_title'];
    $desc = $row['thread_desc'];
    $user_id = $row['thread_user_id'];
    $time = $row['timestamp'];
    $sql_user = "SELECT user_email FROM `user_details` WHERE sno='$user_id'";
    $res2 = mysqli_query($con, $sql_user);
    $fetch = mysqli_fetch_assoc($res2);

    echo ' <div class="media my-3 d-flex category-card">
  <img class="mr-3 rounded-circle" src="img/slider2.jpg" style="width:100px; height:100px;" alt="Generic placeholder image">
  <div class="mx-3">
  <h5 class="mt-0"><a href="thread.php?threadid=' . $id . '&user_id=' . $user_id . '" class="text-decoration-none">' . $catname . '</a></h5> <div class="pst_by">Posted by: <span><b>' . $fetch['user_email'] . '</b></span></div> @ <b><span style="color:black; font-size:12px; margin:auto;">' . substr($time, 0, 16) . '</span></b>
  
  <p>' . $desc . '</p>
  </div>
  </div>';
  }
  if ($noRes) {

    echo '<div class="jumbotron jumbotron-fluid p-4 mb-4 mt-4 bg-info-subtle rounded-3 container">
  <div class="container">
    <h1 class="display-4">No question has been added</h1>
    <p class="lead" style="margin:.75rem auto; color:purple; text-shadow:0 0 12px purple;">Be the Fisrt to start this journey</p>
  </div>
</div>';
  }
  ?>
  <div class="d-flex justify-content-center">
    <?php
    $id = $_GET['catid'];
    $sql = "select * from threads where thread_cat_id=" . $id . "";
    $sql_result = mysqli_query($con, $sql);
    $total_rec = mysqli_num_rows($sql_result);
    $total_page = ceil($total_rec / $per_page_num);

    for ($i = 1; $i <= $total_page; $i++) {
      echo '<button class="btn grd-btn"><a  href="' . $_SERVER['REQUEST_URI'] . '&page=' . $i . '" style=" text-decoration:none; color: white; font-weight: 1000;">' . $i . '</a></button>';
    }
    ?>
  </div>
</div>

<?php include "partials/_footer.php"; ?>