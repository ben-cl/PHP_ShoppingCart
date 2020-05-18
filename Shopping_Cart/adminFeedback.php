<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 5/2/2018
 * Time: 9:16 PM
 */


$xml = simplexml_load_file("feedback.xml");


//$data = $xml->data;

//$feedbacks = $data->feedbacks;

//$feedbacks = $xml->feedbacks;

//echo "<h2>Comments pending for approuval</h2>";

$pending="";

$approved="<table>";

$pending.="<table>";

$rejected = "<table>";

foreach($xml as $feedback){

    echo $feedback->name;
    echo "Hey";

    if($feedback->status == 'null') {

        $pending .= "<form action='adminFeedbackProcess.php'>";

        $pending .= "<tr>";
        $pending  .="<td>" . $feedback->attributes()->id . "</td>";
        $pending .= "<td>" . $feedback->name . "</td>";
        $pending .= "<td>" . $feedback->email . "</td>";

        $pending .= "<td>" . $feedback->message . "</td>";
       // $pending .= "<td>" . $feedback->status . "</td>";

        //echo form and submit in order to modified is status

        $pending .="<input type='hidden' name='name' value='". $feedback->name."'/>";
        $pending .="<input type='hidden' name='item_id' value='". $feedback->attributes()->id."'/>";
        $pending.="<td>Approuve<input type='radio' name='choice' value='approved' required/></td>";
        $pending.="<td>Reject<input type='radio' name='choice' value='rejected' required/></td>";
        $pending.="<td><input type='submit'/></td>";
        $pending .= "</tr>";

        $pending.="</form>";



   }
   else if($feedback->status == 'approved') {

       $approved .= "<tr>";
       $approved .= "<td>" . $feedback->attributes()->id . "</td>";
       $approved .= "<td>" . $feedback->name . "</td>";
       $approved .= "<td>" . $feedback->email . "</td>";

       $approved .= "<td>" . $feedback->message . "</td>";
     //  $approved .= "<td>" . $feedback->status . "</td>";
       $approved .= "</tr>";

   }

   else if($feedback->status == 'rejected') {

       $rejected .= "<tr>";
       $rejected .= "<td>" . $feedback->attributes()->id . "</td>";
       $rejected .= "<td>" . $feedback->name . "</td>";
       $rejected .= "<td>" . $feedback->email . "</td>";

       $rejected .= "<td>" . $feedback->message . "</td>";
      // $rejected .= "<td>" . $feedback->status . "</td>";
       $rejected .= "</tr>";

   }

}

$pending.= "</table>";

$approved.= "</table>";
$rejected.= "</table>";

echo"yo";




?>


<?php include("./testNav.php");?>
<div class="container">



<h1>Feedback page</h1>

<br>
<div>
<h2>Comments pending for approval</h2>
<?php echo $pending;?>
</div>

<br>
<div>
<h2>Comments approved</h2>
<?php echo $approved;?>
</div>

<br>
<div>
<h2>Comments rejected</h2>
<?php echo $rejected;?>
</div>

</div>
</html>


