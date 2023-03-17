<?php include 'partials/_dbcon.php'; ?>







<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
    .d-searchbar,#search {
    display: none;
}
</style>
<?php include 'partials/_nav.php'; ?>
<style>
        body{
        background: linear-gradient(160deg,pink,wheat,skyblue);
    }
    .gradient-border {
        font-size: 20px;
        font-weight: 700;
        background: -webkit-linear-gradient(180deg, red, blue);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .divup {
        bottom: 3rem;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 6rem;
    }

    /* .divup:hover {
        transform: scale(1.1);
        transition: .4s;
    } */

    .box {
        position: relative;
        width: 200px;
        height: 50px;
        background: white;
        border-radius: 8px;
        overflow: hidden;
    }

    .box::before {
        content: '';
        position: absolute;
        inset: 20px -10px;
        background: linear-gradient(325deg, rgb(3, 3, 255), rgb(249, 1, 1));
        transition: 0.5s;
        animation: animate 5s linear infinite;
    }

    .box:hover::before {
        inset: -100px -4px;
    }

    @keyframes animate {
        0% {
            transform: rotate(360deg);
        }

    }

    .box::after {
        content: '';
        position: absolute;
        inset: 1px;
        background: black;
        border-radius: 8px;
        z-index: 1;
        background-color: rgb(241, 245, 246);
    }

    .content {
        background-color: rgb(241, 245, 246);
        position: absolute;
        inset: 1px;
        border: 2px solid black;
        z-index: 5;
        border: none;
    }
</style>

<!-- <?php
$sz_err=false;
// include "partials/_catupload.php";
if (isset($_GET['Up_sz_err'])) {
$sz_err=$_GET['Up_sz_err'];
}

?> -->



<div class="container mt-5" style="min-height: 80vh; width:40%;">
    <form action="partials/_catupload.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="cat_name" name="cat_name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">About category</label>
            <textarea class="form-control" id="cat_desc" name="cat_desc" rows="3"></textarea>
        </div>
        <div class="mb-2">
            <label for="formFile" class="form-label">Browse Image</label>
            <?php
            if(isset($_GET['Up_sz_err'])){ 
            echo '<label for="formFile" class="float-right text-danger">File size should be under 1.4Mb !!</label>';}
            if (isset($_GET['type_error'])){ 
            echo '<label for="formFile" class="float-right text-danger">File should be .jpeg, .jpg or .png !!</label>';}
            if (isset($_GET['unknown_err'])){ 
            echo '<label for="formFile" class="float-right text-danger">Something went wrong !!</label>';}
            ?>
            <input class="form-control" type="file" id="formFile" name="cat_dp">
        </div>

        <!-- <div>
    <button type="submit" class="gradient-border">Creat</button>
</div> -->

        <div class="divup my-0">
            <div class="box">
                <!-- <div class="content "> -->
                <button type="submit" class=" content gradient-border">Creat</button>
                <!-- </div> -->
            </div>
        </div>


    </form>





</div>


<?php include "partials/_footer.php "; ?>