<?php
//connect to database
//$conn = conn_connect("NEWPC\SQLEXPRESS", "", "");
//$db = conn_select_db("Storefront",$conn);
session_start();


include("dbConn.php");

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

		
		echo $_POST["sel_item_qty"];
		echo $_COOKIE["PHPSESSID"];
		$_POST["sel_item_color"];
   	    //add info to cart table
		// change getdate to now 
   	    $addtocart_sql = "INSERT INTO store_shoppertrack (session_id, sel_item_id, sel_item_qty, sel_item_size, sel_item_color, date_added) VALUES ('".$_COOKIE["PHPSESSID"]."', '".$_POST["sel_item_id"]."', '".$_POST["sel_item_qty"]."', '".$_POST["sel_item_size"]."', '".$_POST["sel_item_color"]."', NOW())";
  	    $addtocart_res = $conn->query($addtocart_sql) or die("Couldn't connect");

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
