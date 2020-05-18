<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 4/30/2018
 * Time: 9:05 PM
 */


// getting info

$name = $_GET['name'];

$rating = $_GET['rating'];

$item_id = $_GET['item_id'];

$message = $_GET['message'];


// now need to write information to xml file

$xml = simplexml_load_file("feedback.xml");

//$feedbacks = $xml->feedbacks;

//var_dump($newRec);


if($xml === false) {
    $xml = new SimpleXMLElement('<root/>');
}

$xml_item = $xml->addChild("item");

$xml_item->addAttribute("id", $item_id);

//foreach($item as $name => $value) {
    $xml_item->addChild("name", $name);

    $xml_item->addChild("rating", $rating);
    $xml_item->addChild("message", $message);

    $xml_item->addChild("status", "null");
//}




$xml->asXML('feedback.xml');

/*

$feedback = $xml->addChild("feedback");

$feedback->addChild("name", $name);

$feedback->addChild("email", $email);
$feedback->addChild("item_iD", $item_id);
$feedback->addChild("message", $message);
$feedback->addChild("status", "null");

$xml->asXML("feedback.xml");
*/


?>



<?php include("testNav.php");?>

<div class="main">


    <h1>Feedback</h1>

    <p>Your comment was successfully added</p>

    <br>
    <a href="./startbootstrap/index2.html">Home Page</a>

</div>







