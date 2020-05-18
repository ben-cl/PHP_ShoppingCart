<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 4/16/2018
 * Time: 8:41 PM
 */


include "class.php";

include("dbConn.php");


session_start();







$_SESSION['shippingOption'] = array(

    "Standard Shipping" => 0.99,
    "Two-Day Shipping" => 3.99,
    "One-Day Shipping" =>5.99


);

?>

<!--

<html>
<header>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>


    <style>
        body{
            background-color: #212529;
        }

        div{
            padding:20px;
            background-color: white;
        }

    </style>
</header>


<body>

-->
<?php include("testNav.php");?>

<div class="container">

    <div class="row">

        <div class="col-xs-12">

            <h2> Check out information</h2>

            <form action="invoice.php">


                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" name="firstName"required="true"/>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" name="lastName" required="true"/>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-12 form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" required="true"/>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="postalCode">Postal Code</label>
                        <input type="text" class="form-control" name="postalCode" required="true"/>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city" required="true"/>
                    </div>
                </div>



                <?php // add shipping option from array ? and payment option ?>





                        <h4>Shipping Option</h4>
                        <br>

                        <?php


                        if(isset($_SESSION['shippingOption'])){


                            foreach($_SESSION['shippingOption'] as $key=>$option){
                                echo "<div class='row'>";
                                echo '<label class="radio"><input type="radio" name="shipping" required="true" value="'.$option.'">'.$key.' '.$option.'$</label>';
                                echo "</div>";
                            }

                        }


                        ?>



                <br>

                <h4>Payment Option</h4>



                    <br>
                    <div class='row'><label class="radio"><input type="radio" name="payment" required="true" value="Paypal">Paypal</label></div>
                <div class='row'><label class="radio"><input type="radio" name="payment" required="true" value="Credit">Credit Card</label></div>


                <div class ="row" id="option">yo</div>

                <p id="demo"></p>

                <script>

                    alert("yo")

                    document.getElementById('demo').innerHTML ='hello';


                    var choice = document.getElementsByName("payment");

                    if(choice[0].checked){


                        document.getElementById("option").innerHTML ='

                        Email: <input type="email" name="email" required="true"/>
                        <br>Password: <input type="password" name="password" required="true"/>' ;



                    }
                    else if(choice[1]){

                        Card Number:
                    }


                </script>






                <br>



                <input type="hidden" name="total" value="<?php echo$_GET['total']?>"/>

                <br>
                <input type="submit" value="Buy"/>
            </form>


            <br><br>
            <a href="showcart.php">Go Back </a>


        </div>



    </div>





</div>







</body>

</html>




