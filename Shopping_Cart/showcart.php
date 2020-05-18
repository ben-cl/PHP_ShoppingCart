<?php
//connect to database
//$mssql = mssql_connect("NEWPC\SQLEXPRESS", "", "");
//$db = mssql_select_db("Storefront",$mssql);


//added class
include "class.php";

include("dbConn.php");

include("./testNav.php");
//session_start();


$_SESSION['shippingOption'] = array(

    "regular" => 3,
    "fast" => 6,
    "2-day" =>9


);



$display_block = "<h1>Your Shopping Cart</h1>";


?>

<!--
<!DOCTYPE html>
<html lang="en">



<head>

    <style>
        body{
            background-color: #212529;
        }

        .container{
            background-color: white;
            height: 100%;

        }

    </style>
</head>
<body id="page-top">

-->

<?php //include("./testNav.php");?>

<div class="container">

<!--

<?php echo $display_block; ?>

    <table celpadding=\"3\" cellspacing=\"2\" border=\"1\" width=\"98%\">
    <tr>
    <th>Title</th>
    <th>Size</th>
    <th>Color Price</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Total Price</th>
    <th>Action</th>
    </tr>

<?php

$subotal = 0;
$tax=0;
$total=0;


// shipping array

$_SESSION['shippingOption '] = array(

  "regular" => 3,
  "fast" => 6,
  "2-day" =>9


);


?>

</table>
-->


<div class="table-responsive">
    <table class="table">
        <tr><th colspan="5"><h3>Order Details</h3></th></tr>
        <tr>
            <th width="20%">Product Name</th>
            <th width="10%">Size</th>
            <th width="10%">Color</th>
            <th width="10%">Price</th>
            <th width="10%">Quantity</th>
            <th width="10%">Total Price</th>
            <th width="5%">Action</th>
        </tr>
        <?php

        $total = 0;
        $runningSubTotal=0;


        if(!empty($_SESSION['cart'])):



            foreach($_SESSION['cart'] as $key => $product):
                ?>
                <tr>
                    <td><?php echo $product->get_title(); ?></td>
                    <td><?php echo $product->get_size(); ?></td>
                    <td><?php echo $product->get_color(); ?></td>


                    <?php

                    //<td>$ <?php echo number_format($product->get_price(), 2); </td>

                    $item_id = $product->get_item_id();
                    $item_price =  $product->get_price();
                        $price = getPrice($item_id,$item_price);

                       // echo $price;
                        //echo $product->get_item_id();
                    ?>
                    <td>$ <?php echo number_format($price, 2); ?></td>


                    <td><?php echo $product->get_quantity(); ?></td>
                        <?php $total =  $product->get_quantity() * $price;

                        $runningSubTotal += $total;
                        ?>
                    <td>$ <?php echo number_format($total , 2); ?></td>

                    <td>

                        <?php //$del = preg_replace("/%/", "", $key) ?>
                        <a href="./removefromcart.php?key=<?php echo $key?>">
                            <div class="btn-danger">Remove</div>
                        </a>
                    </td>
                </tr>
                <?php
                //$total = $total + ($product['quantity'] * $product['price']);
            endforeach;
            ?>
            <tr>
                <td colspan="3" align="right">Sub Total</td>
                <td align="right">$ <?php echo number_format($runningSubTotal, 2); ?></td>
                <td></td>
            </tr>
            <tr>
                <!-- Show checkout button only if the shopping cart is not empty -->
                <td colspan="5">

                </td>
            </tr>
        <?php
        endif;
        ?>
    </table>
</div>

<?php // add shipping option, radio button?  ?>


<br>
<a href="./removefromcart.php?all='all'\">Remove all items</a>
<br>
<p>Sub Total: $<?php echo $runningSubTotal?></p>
<?php $tax = $runningSubTotal * 0.15;?>
<p>Tax (15%): $<?php echo $tax?></p></p>

<p>Shipping: $<?php echo $_SESSION['shippingOption ']["regular"]?></p>
    <?php $grantTotal = $runningSubTotal + $tax + $_SESSION['shippingOption']["regular"]?>


        <p>Total: $<?php echo $grantTotal?></p>


    <?php $totalCheckOut = $runningSubTotal + $tax;?>


    <?php
    //Show check out button when presence of item

    if (isset($_SESSION['cart'])):
    if (count($_SESSION['cart']) > 0):
    ?>
        <form action="checkout.php">
            <input type="hidden" name="total" value="<?php echo$totalCheckOut?>"/>
            <input type="submit" value="Check Out">
       </form>


    <?php endif; endif; ?>

<br>
<a href="./seestore.php">Continue Shopping</a>
<br>
<a href="./startbootstrap/index2.html">Go back to home page</a>








    </div>
</body>
</html>


<?php


function getPrice($itemId,$item_price){

    $price=0;

   // global $item_price;
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


                    //echo "can work out";
                    //$price = ($item_price-$discount)." with ".$data[1]."% discount";
                    $price = ($item_price-$discount);
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

