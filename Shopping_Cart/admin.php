<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 4/24/2018
 * Time: 9:44 PM
 */


?>


<!--
<html>
<head>



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <style>
        body{
            background-color: #212529;
        }

        div{
            background-color: white;
            height: 100%;
            padding:20px;
        }

    </style>


</head>
<body>

-->

<?php include("./testNav.php");?>

<?php
// check first if user login

if(!isset($_SESSION['account'])){


    echo "<h4>You need to login with an admin account</h4>";
    exit;

}
else if($_SESSION['account']!="admin"){

    echo "<h4>You need to have administrator right</h4>";
}


else{



?>

<div class="container">



<h1>Admin Page </h1>
    <br>

    <h3>Add new discount:</h3>
    <br>
    <form action="adminUpdateProcess.php">


        <strong>Item id:</strong><input name="item_id" type="number"/>

        <strong>Enter Discount Percentage %:</strong> <input type='number' name='discount'/>


        <br><br><input type="submit" value="Submit"/>


</form>



    <h3>Reset discounts:</h3>

<form action="adminReset.php">

    <input type="submit" value="Reset Discounts"/>
</form>

    <br>

    <h3>Display Items on Sales:</h3>
    <br>

    <form action="adminDisplay.php">

        <input type="submit" value="Display Item on sale"/>
    </form>



    <br>

    <h3>Display Feedback:</h3>
    <br>
    <form action="adminFeedback.php">

        <input type="submit" value="See comments"/>
    </form>


    <a href="./startbootstrap/index2.html">Go back to home page</a>

</div>


</body>
</html>

<?php }?>