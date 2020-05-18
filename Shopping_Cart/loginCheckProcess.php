<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 5/9/2018
 * Time: 10:18 AM
 */

//session_start();

include("testNav.php");



$username = $_POST['username'];
$password = $_POST['password'];
//$type = $_GET['type'];



//read and make sure it is the same

$json = file_get_contents("accounts.json");

$accounts = json_decode($json, true);

$found = false;
$type;
foreach($accounts as  $account){


    if($account["username"] === $username && $account["password"] === $password)
    {
        $found=true;
        $type = $account["type"];
    }

    else{


    }

    /*
     //foreach($account as $key=> $value) {
     foreach($object as $account) {

        //echo $key . " " . "$value"."<br>";

        //if($key == username)


    }
*/
}


if($found){
    echo "Login successfully";

    $_SESSION['account'] = $type;
    // session object for statud?



    echo "<br><a href='./startbootstrap/index2.html'>Continue</a>";

    // send to page header

}else{

    // go back to form
    echo "Wrong username or password";

    echo "<br><a href='./login.php'>Go back</a>";

}




?>




