<?php include 'partials/_dbcon.php'; ?>
<link rel="stylesheet" href="partials/style.css">
<style>
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-image: url("img/Autumn.jpg");
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }

    body::after {
        content: "";
        width: 100%;
        height: 100%;
        background-color: rgba(red, green, blue, .7)
    }

    .form {
        width: 40%;
        margin-top: 2rem;
        padding: 2rem 2rem;
        border: 1px solid white;
        border-radius: 12px;
        /* box-shadow: 10px 10px 10px white; */
        box-shadow: 0px 0px 60px 0px white;
    }

    .form-cont {
        /* border: 1px solid white; */
        margin-bottom: 5%;
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
    input[type="text"],
    input[type="email"],
    #exampleFormControlTextarea1 {
        background: transparent;
        border: none;
        border-bottom: 1px solid gray;
    }

    input[type="text"],
    input[type="email"],
    :focus {
        background-color: rgba(245, 222, 179, 0.559);
        box-shadow: 0 0 10px 2px rgba(208, 230, 229, 0.472);
        outline: rgba(118, 164, 161, 0.472);
    }

    #exampleFormControlTextarea1 {
        background-color: rgba(245, 222, 179, 0.559);
    }

    #exampleFormControlTextarea1:focus {
        background: white;
    }

    label {
        color: rgba(212, 243, 243, 0.496);
    }
</style>
<?php include 'partials/_nav.php'; ?>

<div class="container d-flex justify-content-center form-cont">
    <form class="form" action="partials/send_email_run.php" method="post">
        <h1 align="center">
            <font color="white"> Contact us</font>
        </h1>
        <hr style=" color:white;">
        <!-- <?php
                if ($_GET['empty_err'] = true) {
                    echo '
           <div style="width:auto; background:rgba(235, 179, 190,.100); border-radius: 12px;">
            <p align="center" style="color: rgb(218, 11, 11);font-size: 20px; font-weight: 600;">Fill the form accordingly!!</p>
        </div>
            ';
                }
                if ($_GET['success'] = true) {
                    echo '
            <div style="width:auto; background:rgba(187, 235, 179, 0.1); border-radius: 12px;">
                <p align="center" style="color: rgb(42, 218, 11);font-size: 20px; font-weight: 600;">Email has been successfully sent!!</p>
            </div>
            ';
                }
                ?> -->
        <div class="form-row d-flex my-3 justify-content-between">
            <div class="form-group col-md-5">
                <label for="inputEmail4">Name</label>
                <input type="text" class="form-control" id="inputEmail4" name="name" placeholder="Name">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Email</label>
                <input type="email" class="form-control" id="inputPassword4" name="email" placeholder="exmple@mail.com">
            </div>
        </div>
        <div class="form-group my-3">
            <label for="inputAddress">Phone</label>
            <input type="text" class="form-control" id="inputAddress" name="phone" placeholder="+(91)">
        </div>
        <div class="form-group my-3">
            <label for="inputAddress">Subject</label>
            <input type="text" class="form-control" id="inputAddress" name="subject" placeholder="Subject">
        </div>
        <div class="form-group my-3">
            <label for="inputAddress2">Message</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3" placeholder="Leave here your message for us.....&#9786;"></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary col-md-4" name="send" onclick="sendMsg()">Send &#9993;</button>
        </div>
    </form>



</div>




<?php include "partials/_footer.php "; ?>