
<form method="POST">
    <p>Credit Card: <input type="text" name="card" /></p>
    <p>First Name: <input type="text" name="fname" /></p>
    <p>Last Name: <input type="text" name="lname" /></p>
    <p>Address: <input type="text" name="addr" /></p>
    <p>City: <input type="text" name="city" /></p>
    <p>Sate: <input type="text" name="state" /></p>
    <p>Zip Code: <input type="text" name="zip" /></p>
    <input type="submit" value="Pay"/>
</form>



<?php
session_start();
require_once './order.php';
if(isset($_SESSION['loginid'])){
if(!empty($_POST)) {
    echo '<p>Purchase successed!</p>';

    $order = unserialize($_SESSION["order"]);
    $order->cleanItems();    // because has bought items in cart, need to clean up the cache
    updateSession($order);
    echo '<a href="../main.php"><input type="button" value="Back to Main Page"></a>';
}
}
    else {
        header("location: login.php");
    }
?>


