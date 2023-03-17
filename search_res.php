<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<link rel="stylesheet" href="index_st.css">
<link rel="stylesheet" href="partials/style.css">
<style>
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
    padding:0 4px 2px;
  }

  #search {
    display: none;
  }
  .search-container{
    min-height: 80%;
  }
</style>

<?php include 'partials/_dbcon.php'; ?>
<?php include 'partials/_nav.php'; ?>



<?php if(isset($_GET['search'])){?>
<div class="container my-5 text-center">
  <h1><small>Search results for </small> <em>'<?php echo $_GET['search']?>'</em></h1>
  <div class="search-container mt-5 text-left">
  <?php
  $search = $_GET['search'];
  $sql = "SELECT * FROM threads WHERE MATCH(thread_title, thread_desc) AGAINST ('$search')";
  $res = mysqli_query($con, $sql);
  $noRes = true;
  while ($row = mysqli_fetch_assoc($res)) {
    $noRes = false;
    $id = $row['thread_id'];
    $catname = $row['thread_title'];
    $desc = $row['thread_desc'];
    $user_id = $row['thread_user_id'];
    $sql_user = "SELECT user_email FROM `user_details` WHERE sno='$user_id'";
    $res2 = mysqli_query($con, $sql_user);
    $fetch = mysqli_fetch_assoc($res2);

    echo ' <div class="media my-3 d-flex">
  <img class="mr-3 rounded-circle" src="img/slider2.jpg" style="width:50px; height:50px;" alt="Generic placeholder image">
  <div class="mx-3">
  <h5 class="mt-0"><a href="thread.php?threadid=' . $id . '&user_id=' . $user_id . '" class="text-decoration-none">' . $catname . '</a></h5> <div class="">Posted by: <span><b>' . $fetch['user_email'] . '</b></span></div>
  
  <p>' . $desc . '</p>
  </div>
  </div>
  <hr>';
  }
  if ($noRes) {

    echo '<div class="jumbotron jumbotron-fluid p-4 mb-4 mt-4 bg-info-subtle rounded-3 container">
  <div class="container">
    <h1 class="display-4">No result found</h1>
    <p class="lead" style="margin:.75rem auto; color:purple; text-shadow:0 0 12px red;">Try with relative instance</p>
  </div>
</div>';
  }
  ?>
  <?php } ?>


<!--.................................//Commentsearch................................ -->
<?php if(isset($_GET['search_comm'])){?>
<div class="container my-5 text-center">
  <h1><small>Search results for </small> <em>'<?php echo $_GET['search_comm']?>'</em></h1>
  <div class="search-container mt-5 text-left">
  <?php
  $search = $_GET['search_comm'];
  $sql = "SELECT * FROM comments WHERE MATCH(comment) AGAINST ('$search')";
  $res = mysqli_query($con, $sql);
  $noRes = true;
  while ($row = mysqli_fetch_assoc($res)) {
    $noRes = false;
    // $id = $row['comm_id'];
    $desc = $row['comment'];
    $user_id = $row['comm_by'];
    $time=$row['comm_time'];
    $sql_user = "SELECT user_email FROM `user_details` WHERE sno='$user_id'";
    $res2 = mysqli_query($con, $sql_user);
    $fetch = mysqli_fetch_assoc($res2);

    echo ' <div class="media my-3 d-flex category-card">
    <img class="mr-3 rounded-circle" src="img/slider2.jpg" style="width:100px; height:100px;" alt="Generic placeholder image">
    <div class="mx-3">
    <h5 class="mt-0"><a href="#" class="text-decoration-none d-flex">' . $fetch['user_email'] . '<span style="color:black; font-size:12px; margin:auto .75rem;">' . substr($time, 0, 16) . '</span></a></h5>
    <p>' . $desc . '</p>
  </div>
  </div>
  <hr>';
  }
  if ($noRes) {

    echo '<div class="jumbotron jumbotron-fluid p-4 mb-4 mt-4 bg-info-subtle rounded-3 container">
  <div class="container">
    <h1 class="display-4">No result found</h1>
    <p class="lead" style="margin:.75rem auto; color:purple; text-shadow:0 0 12px red;">Try with relative instance</p>
  </div>
</div>';
  }
  ?>
  <?php } ?>


  </div>
</div>
















<?php include "partials/_footer.php "; ?>