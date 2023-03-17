<?php include 'partials/_dbcon.php'; ?>
<link rel="stylesheet" href="partials/style.css">
<style>
    body {
        background: linear-gradient(160deg, pink, wheat, skyblue);
        /* margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-size: contain;
        background-repeat: no-repeat;
        height: 100%;
        width: 100%;
        background-size: 100% 100%;
        opacity: .8; */
    }

    /* .bd {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-size: contain;
        background-repeat: no-repeat;
        height: 100%;
        width: 100%;
        background-size: 100% 100%;
        opacity: .8;
    } */

    .about {
        display: flex;
        margin-top: 8rem;
        justify-content: space-around;
        flex-direction: column;
        min-height: 80vh;

    }

    img {
        width: 3rem;
    }
    
    #img1 {
        /* height: 1rem; */
        border-radius: 50%;
        box-shadow: 0px 0px 15px 5px rgb(79, 164, 249);
        animation: glow-fb 2s ease-in-out infinite alternate;
    }

    #img2 {
        border-radius: 50%;
        /* height: 1rem; */
        box-shadow: 0px 0px 15px 5px rgb(132, 231, 114);
        animation: glow-wp 2s ease-in-out infinite alternate;
    }

    #img3 {
        border-radius: 12px;
        border: none;
        box-shadow: 0px 0px 15px 5px rgb(97, 237, 72);
        animation: glowinsta 2s ease-in-out infinite alternate;
    }

    @keyframes glow-fb {
        0% {
            box-shadow: 0px 0px 25px 1px rgb(77, 142, 212);
        }

        25% {
            box-shadow: 0px 0px 25px 2px rgb(72, 126, 183);
        }

        50% {
            box-shadow: 0px 0px 25px 3px rgb(28, 105, 187);
        }

        75% {
            box-shadow: 0px 0px 25px 4px rgb(61, 148, 241);
        }

        100% {
            box-shadow: 0px 0px 25px 5px rgb(80, 132, 188);
        }
    }
    @keyframes glow-wp {
        0% {
            box-shadow: 0px 0px 25px 1px rgb(116, 237, 72);
        }

        25% {
            box-shadow: 0px 0px 25px 2px rgb(173, 231, 66);
        }

        50% {
            box-shadow: 0px 0px 25px 3px rgb(68, 244, 121);
        }

        75% {
            box-shadow: 0px 0px 25px 4px rgb(9, 217, 120);
        }

        100% {
            box-shadow: 0px 0px 25px 5px rgb(6, 251, 137);
        }
    }
    @keyframes glowinsta {
        0% {
            box-shadow: 0px 0px 25px 1px rgb(237, 72, 174);
        }

        25% {
            box-shadow: 0px 0px 25px 2px rgb(231, 66, 66);
        }

        50% {
            box-shadow: 0px 0px 25px 3px rgb(72, 149, 237);
        }

        75% {
            box-shadow: 0px 0px 25px 4px rgb(198, 72, 237);
        }

        100% {
            box-shadow: 0px 0px 25px 5px rgb(237, 72, 187);
        }
    }

    .sc-links {
        margin: .5rem 0;
        width: 20rem;
        height: 4rem;
        display: flex;
        justify-content: space-between;
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
        padding: 0 4px 2px;
    }

    #search {
        display: none;
    }
</style>
<?php include 'partials/_darktext_nav.php'; ?>
<div class="about flex-lg-row ">

    <div class="w-auto" style="left:6rem;">
        <img src="img/team-work.png" alt="" style="width: 500px;" align="center">
    </div>


    <div class="about-desc w-auto" style="width:25rem;">
        <h1 style="display: inline-block;">We are Tech-Buzz</h1>
        <p style="width: 25rem;">We make your technical discussion and finding your solution easier. Lorem ipsum dolor
            sit, amet consectetur adipisicing elit. Deleniti inventore maiores quibusdam aliquam, molestias asperiores
            vel voluptate veniam consequuntur tempora dicta corrupti reprehenderit ratione cupiditate doloremque quo,
            distinctio magnam doloribus.</p>

        <a href="contact.php"><button class="btn btn-primary">Join Us</button></a>
        <div class="sc-links">
            <p style="align-self:center; font-size: larger;">Find us @</p>
            <a href="https://facebook.com" target="_blank"><img id="img1" class="border-glow" src="img/fb.webp" alt=""></a>
            <a href="https://whatsapp.com" target="_blank"><img id="img2" class="border-glow" src="img/wp.png" alt=""></a>
            <a href="https://instagram.com" target="_blank"><img id="img3" class="border-glow" src="img/insta.png" alt=""></a>
        </div>
    </div>
</div>




<?php include "partials/_footer.php "; ?>