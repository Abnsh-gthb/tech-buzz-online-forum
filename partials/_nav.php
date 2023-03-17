<?php
session_start();
echo '<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tech-Buzz(The buzz of Technology)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="partials/script_onlineforum.js"></script>
    <style>
        .navbar{
            background: transparent !important;
        }
    </style>
    </head>


<body> 

     <nav class="navbar navbar-expand-lg bg-danger-subtle">
        <div class="container-fluid a">
            <a class="navbar-brand text-white" href="index.php">Tech-Buzz</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="index.php"><b> Home</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="about.php"><b> About</b></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Top Categories
                        </a>
                        <ul class="dropdown-menu">';
$sql = "SELECT * FROM `categories` ORDER BY `categories`.`cat_id` DESC LIMIT 5";
$res = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($res)) {
    echo '<li><a class="dropdown-item" href="threads.php?catid=' . $row['cat_id'] . '">' . $row['cat_name'] . '</a></li>';
}


echo ' <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="contact.php"><b>Contact</b></a>
                    </li>
                </ul>';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo '
                    <p class="mx-4 my-auto text-white" style="font-weight:500;">Welcome ' . $_SESSION['useremail'] . '
                <form class="d-flex my-auto" role="search" method="get" action="search_res.php">
                    <input class=" d-searchbar " type="search" placeholder="Search post" aria-label="Search post" id="searchbar2" name="search" onkeyup="search_category()">
                    <button class="d-searchbar" id="search2" type="submit">&#128270;</button>
                </form>
                <form class="d-flex my-auto" role="search" method="get" action="search_res.php">
                    <input class=" d-searchbar " type="search" placeholder="Search comment" aria-label="Search post" id="searchbar3" name="search_comm" onkeyup="search_category()">
                    <button class="d-searchbar" id="search3" type="submit">&#128270;</button>
                </form>


                <form class="d-flex my-auto" role="search" id="form2">
                    <input class=" d-searchbar " type="search" placeholder="Search" aria-label="Search" id="searchbar" onkeyup="search_category()">
                    <button class="btn" id="search" type="submit" onclick="collaps()" > &#128269;</button>
                </form>
                <a href="partials/_logout.php"><div class="btn btn-outline-danger mx-2 my-1" data-bs-toggle="modal">Logout</div></a>';
} else {
    echo '<div class="btn btn-outline-danger mx-2 my-1" id="login" data-bs-toggle="modal" data-bs-target="#loginModal">Login</div>
                <div class="btn btn-outline-danger mr-2 my-1" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</div>';
}
echo '</div>
        </div>
    </nav>';
include "_loginmdl.php";
include "_signmdl.php";