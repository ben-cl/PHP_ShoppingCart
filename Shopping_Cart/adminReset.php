<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 4/26/2018
 * Time: 9:38 AM
 */


$filename = "saleItems.txt";
$fh = fopen($filename,'w'); // Open and truncate the file
fclose($fh);







?>



<html>

<head>
    <title></title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="./startbootstrap/css/custom.css">

    <?php include("./startbootstrap/header.php");?>

    <style>
        body{
            background-color: #212529;
        }

        div{
            padding:20px;
            background-color: white;
            height: 100%;
        }


    </style>
</head>
<body>

<body>
<div class="container">

    <h1>Reset of discounts</h1>

    <p>All discount were reset successfully </p>


    <br>
    <a href="admin.php">Go back to admin page</a><br>
    <br>
    <a href="./startbootstrap/index2.html">Go back to home page</a>


</div>

</body>


</html>
