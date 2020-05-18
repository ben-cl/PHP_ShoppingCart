<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 4/24/2018
 * Time: 1:27 PM
 */
include("testNav.php");


?>


<html>
<header>

</header>
<body>

<h1>Welcome, please enter your credentials:</h1>

<form action="loginCheckProcess.php" method="post">

    Username: <input type="text" name="username" required/>
    <br><br>
    Password: <input type="password" name="password" required/>


    <br>
    <input type="submit" value="Login"/>
</form>


<a href="loginCreate.php">Create new account</a>

</body>
</html>
