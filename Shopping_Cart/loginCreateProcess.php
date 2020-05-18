<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 5/8/2018
 * Time: 8:12 PM
 */

//session_start();

include("testNav.php");


$json = file_get_contents("accounts.json");

$accounts = json_decode($json, true);



$found = false;
//$type;


// check if account exist
foreach($accounts as  $account){


    if($account["username"] === $_POST['username'])
    {
        $found=true;

    }

}


if($found){
    echo "Username already exist";

    //$_SESSION['account'] = $type;

    exit;


}else {



    $extra = array(

        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'type' => $_POST['type']
    );


    $accounts[] = $extra;

    $final_data = json_encode($accounts);

    file_put_contents("accounts.json", $final_data);


    echo "Account created successfully";

}
?>






