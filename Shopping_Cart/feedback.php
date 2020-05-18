<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 4/30/2018
 * Time: 8:45 PM
 */
include("testNav.php");



// check first if user login

if(!isset($_SESSION['account'])){


    echo "<h4>You need to login</h4>";
    exit;

}


else{













//
//session_start();

include("dbConn.php");




//get items
$get_items_sql = "SELECT id, item_title FROM store_items ORDER BY item_title";
$get_items_res = $conn->query($get_items_sql) or die("Couldn't connect");






if ($get_items_res->num_rows < 1) {
    $display_block = "<p><em>Sorry, no items in this category.</em></p>";

}
else {

    $item_menu = "
   Select Item:
   <select name='item_id'>";


    while ($items = $get_items_res->fetch_array()) {
        $item_id = $items['id'];
        $item_title = stripslashes($items['item_title']);
        //$item_price = $items['item_price'];

        $item_menu .= "<option value=\"" . $item_id ."\">" . $item_title . "</option>";
    }

    $item_menu.= "</select>";

}


?>



<!-- Contact -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Feed back</h2>
                <h3 class="section-subheading text-muted">Please let us a review</h3>
            </div>
        </div>
        <div class="row">




            <div class="col-lg-12">
                <form id="contactForm" name="sentMessage" action ="feedbackProcess.php" method="get">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control"  name="name" type="text" placeholder="Your Name *" required data-validation-required-message="Please enter your name."/>
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="form-group">
                                <!--<input class="form-control" id="item_id" name="item_id" type="number" placeholder="Item ID *" required data-validation-required-message="Please enter the product ID.">

                                 <p class="help-block text-danger"></p>
                                 -->


                                <?php echo $item_menu?>

                            </div>
                            <div class="form-group">
                                <input class="form-control" id="rating" name="rating" min="0" max="10" type="number" placeholder="Your Rating on 10" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" id="message" name="message" style="height:140px;" placeholder="Your Message *" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <input id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit"/>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
</section>


<?php }?>


