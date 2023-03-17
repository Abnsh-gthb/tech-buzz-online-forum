<?php include 'partials/_dbcon.php'; ?>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<link rel="stylesheet" href="index_st.css">
<link rel="stylesheet" href="partials/style.css">
<style>
     body{
        background: linear-gradient(160deg,pink,wheat,skyblue);
    }
    #search,
  #searchbar:focus {
    outline: none;
  }
  nav{
    background: transparent !important;
    z-index: 10;
  }
</style>





<?php include 'partials/_nav.php'; ?>



<?php
if (isset($_GET['showerror'])) {
    // $showerror = $_GET['showerror'];
    echo '<div class="d-flex flex-row-reverse"><div class="mt-5 alert alert-danger alert-dismissible fade show" role="alert" style="z-index:500; position:absolute;" >
    <strong>User Exixsts!</strong> User with same email id has been exists.
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div></div>';
}
if (isset($_GET['showAlert'])) {
    // $showAlert = $_GET['showAlert'];
    echo '<div class="d-flex flex-row-reverse"><div class="mt-5 alert alert-success alert-dismissible fade show" role="alert" style="z-index:500; position:absolute;">
    <strong>Success!</strong>Sign up has been succesfull. You can Login now.
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" style="margin-left:200px">&times;</span>
    </button>
  </div></div>';
}
if (isset($_GET['cpassError'])) {
    // $cpassError = $_GET['cpassError'];

    echo '<div class="d-flex flex-row-reverse"><div class="mt-5 alert alert-warning alert-dismissible fade show" role="alert" style="z-index:500; position:absolute;" >
    <strong>Confirm password did not match!</strong> You should check in on some of those fields below.
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div></div>';
}
if (isset($_GET['login'])) {
    // $cpassError = $_GET['cpassError'];

    echo '<div class="d-flex flex-row-reverse"><div class="mt-5 alert alert-success alert-dismissible fade show" role="alert" style="z-index:500; position:absolute;" >
    <strong>Congratulations!</strong> You are logged in.
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div></div>';
}
if (isset($_GET['logerr'])) {
    // $cpassError = $_GET['cpassError'];

    echo '<div class="d-flex flex-row-reverse"><div class="mt-5 alert alert-danger alert-dismissible fade show" role="alert" style="z-index:500; position:absolute;" >
    <strong>Error!</strong>Recheck your username password. 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div></div>';
}

?>


<div id="carouselExampleIndicators" class="carousel slide" style="top:-62px; margin-bottom:0 !important;">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/sldr1.png" class="d-block" alt="..." height="450vh" style="width:100%;">
        </div>
        <div class="carousel-item">
            <img src="img/sldr2.png" class="d-block" alt="..." height="450vh" style="width:100%;">
        </div>
        <div class="carousel-item">
            <img src="img/sldr4.jpg" class="d-block" alt="..." height="450vh" style="width:100%;">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div> 


<div class="container " style="min-height: 100vh;">
    <h1 class="text-center">Welcome to Tech-Buzz</h1>

    <div class="row">
        <!-- dbconnect -->
        <?php
        $sql = "SELECT * FROM `categories` ORDER BY `time` DESC";
        $res = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($res)) {
            $cat = $row['cat_name'];
            $id = $row['cat_id'];

            // $cat_desc=$row['cat_desc'];
            $cat_desc = substr($row['cat_desc'], 0, 60);
            echo '<div class="col-md-4 my-3 category-card ">
            <a href="threads.php?catid=' . $id . '" style="text-decoration: none;">
            <div class="card" style="width: 18rem;">
                <img height="200px" src="img/' . $row['img'] . '" class="card-img-top" alt="...">
                <div class="card-body">
                <span class=""><h5 class="card-title">' . $cat . '</h5></span>
                    <p class="card-text">' . $cat_desc . '...</p>
                    <a href="threads.php?catid=' . $id . '" class="btn btn-primary">View</a>
                </div>
            </div>
            </a>
        </div>';
        }


        ?>
        <!-- //loop to add categories -->




    </div>

</div>
<div class="d-flex justify-content-end ">
    <span>
        <a href="addCategory.php">
            <div class="rounded px-2 py-2 m-4 fixed fw-bold " style="background-color: rgb(242, 89, 43); color:white;">
                Add New Category
            </div>
        </a>
    </span>
</div>




<script src="partials/script_onlineforum.js"></script>

<?php include "partials/_footer.php "; ?>