<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 4/25/2018
 * Time: 10:00 AM
 */


//if adding

//write information to file

session_start();



include("dbConn.php");


//added class
include "class.php";

/*

if (isset($_POST["sel_item_id"])) {




    $item_id = $_POST["sel_item_id"];


    // idee query pour retrouver le id

    if(isset($_POST["sel_item_size"])){

        $size =$_POST["sel_item_size"];

        $get_sizes_id_sql = "SELECT item_id FROM store_item_size WHERE store_item_size.item_size = '".$size."'";
        $get_sizes_id_res = $conn->query($get_sizes_id_sql) or die("Couldn't connect");

        if ($get_sizes_id_res->num_rows > 0) {

            while ($sizes_res = $get_sizes_id_res->fetch_array()) {
                $size_id = $sizes_res['item_id'];
            }
        }

    }
    else{

        $size = "";
        $size_id = NULL;

    }




    if(isset($_POST["sel_item_color"])){
        $color =$_POST["sel_item_color"];

        $get_color_id_sql = "SELECT item_id FROM store_item_color WHERE store_item_color.item_color = '".$color."'";
        $get_color_id_res = $conn->query($get_color_id_sql) or die("Couldn't connect");

        if ($get_color_id_res->num_rows > 0) {

            while ($color_res = $get_color_id_res->fetch_array()) {
                $color_id = $color_res['item_id'];
            }
        }



    }
    else{
        $color = 0;

        $color_id = NULL;
    }


    // Figure a way to put it  in the query

    if(is_null($size_id)){

        $size_q = "is null";
    }else{

        $size_q = "= '$size_id'";
    }

    if(is_null($color_id)){

        $color_q = "is null";
    }else{

        $color_q = "= '$color_id'";
    }


    $variation_id;
    $get_variation_id_sql = "SELECT id FROM store_variations WHERE store_variations.item_id = '".$_POST["sel_item_id"]."' AND store_variations.color_id $color_q AND store_variations.size_id $size_q ";
    $get_variation_id_res = $conn->query($get_variation_id_sql) or die("Couldn't connect");


    if ($get_variation_id_res->num_rows > 0) {

        while ($variation_res = $get_variation_id_res->fetch_array()) {
            $variation_id = $variation_res['id'];
        }
    }

    // just founded variaton id



    echo $variation_id;

    echo "futur success";



    $discount = $_POST['discount'];

    echo $discount;

*/

    // need to write important information to the file

$message = "Please enter positive value in all field ";

if(isset($_GET["item_id"]) && isset($_GET["discount"])){

    if($_GET["item_id"]>0 && $_GET["discount"]>0 ) {


        $item_id = $_GET['item_id'];
        $discount = $_GET['discount'];

        $filename = "saleItems.txt";

        $fhandle = fopen($filename, "a");

        $data = $item_id . '-' . $discount . "\r\n";
        //$data = $item_id . '-' . $size_q . '-' . $color_q . '-' . $variation_id . "\r\n";

        fwrite($fhandle, $data);

        fclose($fhandle);

        // add message of success
        $message = "The discount was successfully added";


    }

}


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

    <h1>Add items discount </h1>


    <?php echo $message?>



    <br><br>
    <br>
    <a href="admin.php">Go back to admin page</a><br>
    <br>
    <a href="./startbootstrap/index2.html">Go back to home page</a>


</div>

</body>











?>



