<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 4/24/2018
 * Time: 9:51 PM
 */



//Dispplay all the item and add a field for the %sale ?


?>






<?php
//connect to database
//$conn = conn_connect("NEWPC\SQLEXPRESS", "", "");
//$db = conn_select_db('Storefront', $conn);

session_start();

include("dbConn.php");

$display_block = "<h1>My Categories</h1>
<p>Select a category to see its items.</p>";

//show categories first
$get_cats_sql = "SELECT id, cat_title, cat_desc FROM store_categories ORDER BY cat_title";

$get_cats_res = $conn->query($get_cats_sql) or die("Couldn't connect");

if ($get_cats_res->num_rows < 1) {
    $display_block = "<p><em>Sorry, no categories to browse.</em></p>";

    // added else
}
else{
    while ($cats = $get_cats_res->fetch_array()) {
        $cat_id  = $cats['id'];
        $cat_title = strtoupper(stripslashes($cats['cat_title']));
        $cat_desc = stripslashes($cats['cat_desc']);

        $display_block .= "<p><strong><a href=\"adminUpdateStore.php?cat_id=\$cat_id\">$cat_title</a></strong><br>$cat_desc</p>";


        //need to fix these if STATEMENT

        //deleted the ! need maybe back on and click
        if (isset($_GET["cat_id"])) {
            if ($_GET["cat_id"] === $cat_id)



                //
                echo "tea";

            //get items
            $get_items_sql = "SELECT id, item_title, item_price FROM store_items WHERE cat_id = $cat_id ORDER BY item_title";
            $get_items_res = $conn->query($get_items_sql) or die("Couldn't connect");

            if ($get_items_res->num_rows < 1) {
                $display_block = "<p><em>Sorry, no items in this category.</em></p>";

            }
            else{

                $display_block .= "<ul>";
                while ($items = $get_items_res->fetch_array()) {
                    $item_id  = $items['id'];
                    $item_title = stripslashes($items['item_title']);
                    $item_price = $items['item_price'];

                    $display_block .= "<li><a href=\"adminUpdateItem.php?item_id=".$item_id."\">".$item_title."</a></strong> (\$".$item_price.")</li>";
                }

                $display_block .= "</ul>";
            }


            //free results
            //conn_free_result($get_items_res);
            $get_items_res->free();

        }
    }
}


//free results
//conn_free_result($get_cats_res);
$get_cats_res->free();

//close connection to conn
$conn->close();




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




<div class="container">

    <h1>Admin: Update Store</h1>





    <?php echo "$display_block"; ?>

    <br>
    <a href="./startbootstrap/index2.html">Go back to home page</a>


</div>

</body>
</html>


