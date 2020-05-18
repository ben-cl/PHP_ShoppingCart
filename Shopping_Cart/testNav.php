<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 4/28/2018
 * Time: 2:00 PM
 */

session_start();



?>


<html>

<head>

    <!-- Bootstrap core CSS -->
    <link href="./startbootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template
    <link href="./startbootstrap/css/agency.min.css" rel="stylesheet">-->
    <link href="./startbootstrap/css/nav.css" rel="stylesheet">

<style>
    #mainNav{
        padding-top: 0;
        padding-bottom: 0;
        background-color: #212529;
    }


    .container a{
        text-decoration: none;

        color: #002752;
    }


    .container a:hover{
        text-decoration: none;

        color: #fec503;
    }



</style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="./startbootstrap./index2.html#page-top">XYZ</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">

                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="./admin.php">Admin</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="./startbootstrap./index2.html#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="./seestore.php">Shop items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="./showcart.php">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="./startbootstrap./index2.html#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="./startbootstrap./index2.html#contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="./feedback.php">Feedback</a>
                </li>

                <!-- should display status with maybe the help of session
                 and if login logout etc -->

                <?php if(isset($_SESSION['account'])){?>

                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="./logout.php">Logout</a>
                </li>

                <?php } else{?>

                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="./login.php">Login</a>
                </li>

                <?php }?>
            </ul>
        </div>
    </div>
</nav>

<br><br><br>
