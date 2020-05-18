<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 5/8/2018
 * Time: 8:05 PM
 */





?>



<?php include("testNav.php");?>

<div class="main">

    <h1>Create new account</h1>

    <form action="loginCreateProcess.php" method="post">

        Username: <input type="text" name="username" required/>
        <br><br>
        Password: <input type="password" name="password" required />


        <br><br>
        <select name="type">
            <option  name="admin" value="admin">Administrator</option>
            <option name="customer" value="customer">Customer</option>
        </select>

       <br> <br><input type="submit"/>
    </form>



</div>
</html>
