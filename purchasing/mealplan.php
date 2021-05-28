<?php
session_start();
if(isset($_SESSION['loginid'])){
         
}
else {
    header("location: login.php");
}
 ?>
<form action="./purchaseMeal.php" method="post">
  <p>Please select your meal plan:</p>
  <input type="radio" id="1" name="meal" value="month">
  <label for="1">Month</label><br>
  <input type="radio" id="2" name="meal" value="semester">
  <label for="2">Semester</label><br>
  <input type="submit" value="add to cart"><br>
</form>
<label color="red">Choose your semester meal plan and get 5% discount!</label>

