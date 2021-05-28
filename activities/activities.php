<?php
session_start();
if(isset($_SESSION['loginid'])){
    <form name="activities" action="./searchActivities.php" method="post">
        <li>Please enter the start and end date!</li>
        <br>
        Start Date: <input type="text" name="start" style="margin-left: 1em;">
        <br><br>
        <br>
        End Date: <input type="text" name="end" style="margin-left: 1em;">
        <br><br>
        <input type="submit" value="search">
    </form>
}
else {
    header("location: login.php");
}
 ?>

