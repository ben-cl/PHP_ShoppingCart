<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 4/26/2018
 * Time: 9:13 AM
 */


session_start();

include("dbConn.php");


$filename = "saleItems.txt";
$display_block="";

if ($fhandle = fopen($filename, "r")) {

    while (!feof($fhandle)) {

        $line = fgets($fhandle);

        $data = explode('-', $line);



        $item_id = $data[0];

        echo $item_id;

        if($data[0]!= null) {

            //get items
            $get_items_sql = "SELECT id, item_title, item_price FROM store_items WHERE id = $item_id ORDER BY item_title";
            $get_items_res = $conn->query($get_items_sql) or die("Couldn't connect");

            if ($get_items_res->num_rows < 1) {
                $display_block = "<p><em>Sorry, no items in this category.</em></p>";

            } else {

                $display_block .= "<ul>";
                while ($items = $get_items_res->fetch_array()) {
                    $item_id = $items['id'];
                    $item_title = stripslashes($items['item_title']);
                    $item_price = $items['item_price'];

                    //$display_block .= "<li><a href=\"showitem.php?item_id=" . $item_id . "\">" . $item_title . "</a></strong> (\$" . $item_price . ")</li>";
                    $display_block .= "<tr>
                                       <td><strong>$item_title </strong></td>
                                        <td><strong>(\$" . getPrice($item_id) . ")</strong></td></tr>";
                }

                $display_block .= "</ul>";
            }


            //free results
            //conn_free_result($get_items_res);
            $get_items_res->free();
            /*
            if (!empty($data[0])) {

                if ($data[0] === $name) $exist = true;
            }

            */
        }


    }

    fclose($fhandle);
}


function getPrice($itemId){


    echo "45";
    $price=0;

    global $item_price;
    // read file

    $filename = "saleItems.txt";
    $exist = false;

    //need to check if name already exist in the file first
    if ($fhandle = fopen($filename, "r")) {

        while (!feof($fhandle)) {

            $line = fgets($fhandle);

            $data = explode('-', $line);

            if (!empty($data[0])) {

                if ($data[0] === $itemId){

                    $discount = $item_price * ($data[1]/100);



                    $price = ($item_price-$discount)." with ".$data[1]."% discount";
                    $exist = true;
                }
            }
        }

        fclose($fhandle);
    }

    if(!$exist){


        $price = $item_price;
    }



    return $price;
}

?>


<html>
<head>
    <title>My Categories</title>


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

    <h1>Display of items in sales:</h1>

    <br>

    <?php echo $display_block; ?>

    <br>

    <a href="admin.php">Go back to admin page</a><br>
    <a href="./startbootstrap/index2.html">Go back to home page</a>


</div>

</body>
</html>
