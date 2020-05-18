<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 5/3/2018
 * Time: 12:51 PM
 */


$choice = $_GET['choice'];

$name = $_GET['name'];
//$name = "Miami";

$item_id = $_GET['item_id'];
$xml = simplexml_load_file("feedback.xml");

$displayblock="";

foreach($xml as $feedback) {


    // if to find the right one, thought of index but nvm

    // maybe add more field to check to make sure id
    if($feedback->name == $name && $feedback->attributes()->id == $item_id) {

       // echo $feedback->status;
        $feedback->status = $choice;

       // echo $feedback->status;
       // echo $choice;

       // $xml->asXML('ratings.xml');

        $displayblock .="You item ".$item_id." ".$name." status was successfully set to ".$choice;

    }



}
//$xml->asXML('ratings.xml');

file_put_contents("feedback.xml", $xml->asXML());

?>



<?php include("./testNav.php");?>
<div class="container">


<h1>Status process</h1>

<br>
<?php echo $displayblock?>

<br>

<a href="admin.php">Go back </a>
