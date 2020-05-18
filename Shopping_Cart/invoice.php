<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 4/17/2018
 * Time: 12:57 PM
 */


// get the information and check if every field is fill


include "class.php";

include("dbConn.php");


session_start();



// produce bill

?>


<html>
<header>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <style>
        body{
            background-color: #212529;
        }

        div {
            padding: 5px;
            background-color: white;
        }
        .container{
            padding:20px;
        }


    </style>
</header>
<body>






<form >



    <div class="container">



        <div class="row">

            <div class="col-xs-12">

                <h1>Thanks for your purchase at XYZ Store!</h1>

                <h2>Invoice information</h2>

                <form>






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

                            </tr>
                            <?php
                            if(!empty($_SESSION['cart'])):

                                $total = 0;
                                $runningSubTotal=0;

                                foreach($_SESSION['cart'] as $key => $product):
                                    ?>
                                    <tr>
                                        <td><?php echo $product->get_title(); ?></td>
                                        <td><?php echo $product->get_size(); ?></td>
                                        <td><?php echo $product->get_color(); ?></td>
                                        <td>$ <?php echo number_format($product->get_price(), 2); ?></td>
                                        <td><?php echo $product->get_quantity(); ?></td>
                                        <?php $total =  $product->get_quantity() * $product->get_price();

                                        $runningSubTotal += $total;
                                        ?>
                                        <td>$ <?php echo number_format($total , 2); ?></td>

                                    </tr>
                                <?php
                                    //$total = $total + ($product['quantity'] * $product['price']);
                                endforeach;
                                ?>

                            <!--
                                <tr>
                                    <td colspan="3" align="right">Sub Total</td>
                                    <td align="right">$ <?php echo number_format($runningSubTotal, 2); ?></td>
                                    <td></td>
                                </tr>
                            -->
                            <?php
                            endif;
                            ?>
                        </table>
                    </div>

                    <br>
                    <div class="row">

                        <div class="col-md-12 form-group">
                            <label for="subTotal">Sub Total: $<?php echo $_GET['total']?></label>
                        </div>


                    </div>

                    <div class="row">

                        <div class="col-md-12 form-group">
                            <label for="shipping">Shipping Cost: $</label>
                            <?php echo $_GET['shipping']?>
                        </div>


                    </div>

                    <div class="row">

                        <div class="col-md-12 form-group">
                            <label for="shipping">Total: $</label>
                            <?php echo $_GET['shipping'] + $_GET['total']?>
                        </div>


                    </div>


                    <br>

                    <h3>Personal Information</h3>


                    <br>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="firstName">First Name: </label>
                            <?php echo $_GET['firstName']?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="lastName">Last Name: </label>
                            <?php echo $_GET['lastName']?>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-12 form-group">
                            <label for="address">Address: </label>
                            <?php echo $_GET['address']?>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="postalCode">Postal Code: </label>
                            <?php echo $_GET['postalCode']?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="city">City: </label>
                            <?php echo $_GET['city']?>
                        </div>
                    </div>



                    <?php // add shipping option from array ? and payment option ?>

                    <h3>Payment Option</h3>



                    <div class="row">
                        <div class="col-md-12 form-group">
                        <label for="payment">Payment Option: </label>
                        <?php echo $_GET['payment']?>
                        </div>

                    </div>

                    <div class="row">

                        <?php if($_GET['payment'] ==='Paypal'){
                            ?>

                        <div class="col-md-12 form-group">
                            <label for="payment">Email: </label>
                            <?php echo $_GET['email']?>
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="payment">Password: </label>
                            <?php echo str_repeat ('*', strlen ($_GET['password']));?>
                        </div>

                        <?php }?>




                    </div>



                    <input type="submit" formaction="message.php" value="Confirm"/>
                    <input type="submit" formaction="showcart.php" value="Go Back"/>
                </form>


            </div>





        </div>





    </div>




</form>
<?php  //should decrease inventory if buy ?>
</body>


</html>
