<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 4/19/2018
 * Time: 12:33 PM
 */


// Should reduce the stock once buy or at cart?

session_start();


include("dbConn.php");

//added class
include "class.php";


//empty the cart array
$_SESSION['cart'] = array();

?>




<html>
<head>
    <title>My Categories</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</head>


<body>
<div class="container">


    <h1>Success</h1>

    <p>Thank you for your purchase, you will receive your item soon. You are welcome to leave a review on our page</p>



    <a href="./startbootstrap/index2.html">Go back to home page</a>


</div>

</body>
</html>

