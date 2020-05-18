<?php
//connect to database
//$mssql = mssql_connect("NEWPC\SQLEXPRESS", "", "");
//$db = mssql_select_db("Storefront", $conn);

include "class.php";

include("dbConn.php");



session_start();

//echo "to";


//echo $_GET["id"];
echo"<br><br>";
if (isset($_GET["key"])) {


    // reverse inventory
    $quantity = $_SESSION["cart"][$_GET["key"]]->get_quantity();
    $variation_id = $_SESSION["cart"][$_GET["key"]]->get_variation_id();

    //echo $variation_id;

    //echo $quantity;

    $set_new_quantity_sql = "UPDATE store_variations set Quantity =Quantity +".$quantity." WHERE store_variations.id ='".$variation_id."'";
    $set__new_quantity_res = $conn->query($set_new_quantity_sql) or die("Couldn't connect");


    unset($_SESSION["cart"][$_GET["key"]]);

    //redirect to showcart page
    header("Location: showcart.php");
    exit();


}
elseif(isset($_GET["all"])){


    foreach ($_SESSION["cart"] as $key => $item) {



        unset($_SESSION["cart"][$key]);


    }
    //redirect to showcart page
    header("Location: showcart.php");
    exit();


}




else{
//send them somewhere else
header("Location: seestore.php");
exit();
}
?>