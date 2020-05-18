<?php
//connect to database
//$conn = conn_connect("NEWPC\SQLEXPRESS", "", "");
//$db = conn_select_db("Storefront",$conn);
session_start();


include("dbConn.php");

//added class
include "class.php";

if (!isset($_POST["id"])) {
   //validate item and get title and price
    $get_iteminfo_sql = "SELECT item_title FROM store_items WHERE id =".$_POST["sel_item_id"];
    $get_iteminfo_res = $conn->query($get_iteminfo_sql) or die("Couldn't connect");

    if ($get_iteminfo_res->num_rows < 1) {
   	    //invalid id, send away
   	    //header("Location: seestore.php");
   	    //exit();
		echo "1"; 
    } else {
   	    //get info !=
   	    while ($item_info = $get_iteminfo_res->fetch_array()) {
   	    	$item_title =  stripslashes($item_info['item_title']);
		}

		
		//echo $_POST["sel_item_qty"];
		//echo $_COOKIE["PHPSESSID"];
		//$color = $_POST["sel_item_color"];
   	    //add info to cart table
		
		
		//addobject to class array
		
		// date
		$date = date('m/d/Y h:i:s a', time());




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
		
		

			// hidden field
	 $price = $_POST["price"];
		
		

		



		// Find the variation id

		//testing

        //echo "<br>".$_POST["sel_item_id"]." u";
		//echo "<br>".$size_id." u";
        ///echo "<br>".$color_id." u";



        //$variation_id = NULL;
		// mysql comparing null impossible

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
        //echo "<br>".$variation_id." u";





        // need to check inventory


        $quantity;

        $get_quantity_sql = "SELECT Quantity FROM store_variations WHERE store_variations.id ='".$variation_id."'";
        $get_quantity_res = $conn->query($get_quantity_sql) or die("Couldn't connect");


        if ($get_quantity_res->num_rows > 0) {

            while ($quantity_res = $get_quantity_res->fetch_array()) {
                $quantity = $quantity_res['Quantity'];
            }
        }
        //echo "<br>".$quantity." u";






        // Check if in stock first
        if($_POST["sel_item_qty"] > $quantity){

            echo "The item is currently not in stock at this time and cannot be ordered. ".$quantity. " item are remaining ";

            echo"<a href='seestore.php'>Go back shopping</a>";
            exit();
        }



		
		// Add item object class array
        $item = new CartItem($_COOKIE["PHPSESSID"], $_POST["sel_item_id"],$item_title, $_POST["sel_item_qty"],$size, $color, $date, $price, $variation_id);



        //modify inventory
        $newQuantity = $quantity - $_POST["sel_item_qty"];


        $set_new_quantity_sql = "UPDATE store_variations set Quantity ='".$newQuantity."' WHERE store_variations.id ='".$variation_id."'";
        $set__new_quantity_res = $conn->query($set_new_quantity_sql) or die("Couldn't connect");

/*
        if ($set__new_quantity_res->num_rows > 0) {

            while ($new_quantity_res = $set__new_quantity_res->fetch_array()) {
                $quantity = $quantity_res['Quantity'];
            }
        }
*/

        //


        if(!isset($_SESSION["cart"])){
            $_SESSION["cart"] = array($item);
        }else{
            array_push($_SESSION["cart"],$item);
        }



        //redirect to showcart page
   	    header("Location: showcart.php");
        exit;
	
    }

} else {
    //send them somewhere else
   header("Location: seestore.php");
    exit();

}
?>
