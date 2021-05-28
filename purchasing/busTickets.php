<?php
session_start();
if(isset($_SESSION['loginid'])){
    

}
else {
    header("location: login.php");
}
 ?>
<form action="./purchaeTicket.php" method="post">
    <input type="text" id="1" name="buy[]">
    <label for="1">zone-1</label><br>
    <input type="text" id="2" name="buy[]">
    <label for="2">zone-2</label><br>
    <input type="text" id="3" name="buy[]">
    <label for="3">zone-3</label><br>
    <input type="text" id="4" name="buy[]">
    <label for="4">card</label><br>
    <input type="submit" value="purchase"><br>
</form>
