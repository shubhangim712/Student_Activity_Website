<?php
session_start();
if(isset($_SESSION['loginid'])){
  
}
else {
    header("location: login.php");
}
 ?>

<form name="searchBook" action="./searchBook.php" method="POST">
    <li>Search with Category or ISBN</li>
    <br>
    Category: <input type="text" name="category" style="margin-left: 1em;">
    <br><br>
    <br>
    bookname: <input type="text" name="bookname" style="margin-left: 1em;">
    <br><br>
    <br>
    ISBN    : <input type="text" name="isbn" style="margin-left: 1em;">
    <br><br>
    <input type="submit" name="submitButton">
</form>
