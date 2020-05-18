<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 4/24/2018
 * Time: 9:58 PM
 */

?>



<?php




$display_block = "<h1>Admin: Item Detail</h1>";


//include file ?
include("dbConn.php");



//try
//$item_id = $_GET['id'];



//validate item
$get_item_sql = "SELECT c.id as cat_id, c.cat_title, si.item_title, si.item_price, si.item_desc, si.item_image FROM store_items AS si LEFT JOIN store_categories AS c on c.id = si.cat_id WHERE si.id = '".$_GET["item_id"]."'";
$get_item_res = $conn->query($get_item_sql) or die("Couldn't connect");

if ($get_item_res->num_rows < 1) {
    //invalid item
    $display_block .= "<p><em>Invalid item selection.</em></p>";
}

else{

    //valid item, get info
    while ($item_info = $get_item_res->fetch_array()) {
        $cat_id = $item_info['cat_id'];
        $cat_title = strtoupper(stripslashes($item_info['cat_title']));
        $item_title = stripslashes($item_info['item_title']);
        $item_price = $item_info['item_price'];
        $item_desc = stripslashes($item_info['item_desc']);
        $item_image = $item_info['item_image'];
    }

    //make breadcrumb trail
    $display_block .= "<p><strong><em>You are viewing:</em><br/>
   <a href=\"seestore.php?cat_id=".$cat_id."\">".$cat_title."</a> &gt; ".$item_title."</strong></p>
   <table cellpadding=\"3\" cellspacing=\"3\">
   <tr>
   <td valign=\"middle\" align=\"center\"><img src=\""."Images/".$item_image."\"/></td>
   <td valign=\"middle\"><p><strong>Description:</strong><br/>".$item_desc."</p>
   <p><strong>Price:</strong> \$".$item_price."</p>
   
   
   <form method=\"post\" action=\"adminUpdateProcess.php\">";

    // Should change to adminProcess or something to write into data file




    //free result
    $get_item_res->free();





//get colors
//  $get_colors_sql = "SELECT item_color FROM store_item_color WHERE item_id = '".$_GET["item_id"]."' ORDER BY item_color";
    // $get_colors_res = $conn->query($get_colors_sql) or die("Couldn't connect");

    $get_colors_sql = "SELECT color_id FROM store_variations WHERE store_variations.item_id = '".$_GET["item_id"]."'";
    $get_colors_res = $conn->query($get_colors_sql) or die("Couldn't connect");


    //check this
    if ($get_colors_res->num_rows > 0) {

        $display_block .= "<p><strong>Available Colors:</strong><br/>
            <select name=\"sel_item_color\">";

        while ($colors = $get_colors_res->fetch_array()) {

            // query for item value? id to value

            $color_id = $colors['color_id'];

            $get_colors_value_sql = "SELECT item_color FROM store_item_color WHERE store_item_color.item_id = '$color_id'";
            $get_colors_value_res = $conn->query($get_colors_value_sql) or die("Couldn't connect");


            if ($get_colors_value_res->num_rows > 0) {


                while ($colors_value = $get_colors_value_res->fetch_array()) {

                    $color_res = $colors_value['item_color'];

                    $display_block .= "<option value=\"" . $color_res . "\">" . $color_res . "</option>";
                }


            }

        }
        $display_block .= "</select>";

    }



    //free result
    $get_colors_res->free();





// to keep record of the id
    $size_id_record = NULL;

    //get sizes
    //$get_sizes_sql = "SELECT item_size FROM store_item_size WHERE item_id = ".$_GET["item_id"]." ORDER BY item_size";
    //$get_sizes_res = $conn->query($get_sizes_sql) or die("Couldn't connect");

    $get_sizes_sql = "SELECT size_id FROM store_variations WHERE store_variations.item_id = '".$_GET["item_id"]."'";
    $get_sizes_res = $conn->query($get_sizes_sql) or die("Couldn't connect");

    if ($get_sizes_res->num_rows > 0) {
        $display_block .= "<p><strong>Available Sizes:</strong><br/>
       <select name=\"sel_item_size\">";

        while ($sizes = $get_sizes_res->fetch_array()) {

            $size_id = $sizes['size_id'];

            $get_sizes_value_sql = "SELECT item_size FROM store_item_size WHERE store_item_size.item_id = '$size_id'";
            $get_sizes_value_res = $conn->query($get_sizes_value_sql) or die("Couldn't connect");


            if ($get_sizes_value_res->num_rows > 0) {

                while ($size_value = $get_sizes_value_res->fetch_array()) {

                    $size_res = $size_value['item_size'];

                    $display_block .= "<option value=\"".$size_res."\">".$size_res."</option>";               }

            }

        }
    }

    $display_block .= "</select>";

    //free result
    $get_sizes_res->free();






    $display_block .= "
   <p><strong>Enter Discount Percentage %:</strong> <input type='number' name='discount'/>";

    /*
   <select name=\"sel_item_qty\">";

    for($i=1; $i<11; $i++) {
        $display_block .= "<option value=\"".$i."\">".$i."</option>";
    }

*/
    // add hidden value for color and size id ?
    $display_block .= "
   </select>
   <input type=\"hidden\" name=\"sel_item_id\" value=\"".$_GET["item_id"]."\"/>
   
   
   <input type='hidden' name='price' value='$item_price'>
   

   
   <p><input type=\"submit\" name=\"submit\" value=\"Update Percentasge\"/></p>
   </form>
   </td>
   </tr>
   </table>";
}


//close connection to conn
$conn->close();
?>


<html>
<head>
    <title>My Store</title>

    <?phpinclude("./startbootstrap/header.php");?>

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

<body>
<div class="container">








    <?php echo $display_block; ?>

    <br>
    <a href="./startbootstrap/index2.html">Go back to home page</a>

</div>

</body>
</html>
