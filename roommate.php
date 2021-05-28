<?php
 session_start();
if(isset($_SESSION['loginid'])){

}
else {
    header("location: login.php");
}
 ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
<?php
include('roommate.css');
?>
.single-div {
    width: auto%;
    display: inline-block;
    text-align: center;
    vertical-align: middle;
    margin: 0 5px;
    white-space: normal;
}
/* Mobile */
@media screen and (max-width: 480px) {

    .single-div {
        display: block;
        width: 65%;
        margin: 0 auto;
    }

}
</style>
<script language = "javascript" type = "text/javascript">
         <!--
            //Browser Support Code
            function ajaxFunction(){
               var ajaxRequest;  // The variable that makes Ajax possible!

               try {
                  // Opera 8.0+, Firefox, Safari
                  ajaxRequest = new XMLHttpRequest();
               }catch (e) {
                  // Internet Explorer Browsers
                  try {
                     ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                  }catch (e) {
                     try{
                        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                     }catch (e){
                        // Something went wrong
                        alert("Your browser broke!");
                        return false;
                     }
                  }
               }

               // Create a function that will receive data
               // sent from the server and will update
               // div section in the same page.

               ajaxRequest.onreadystatechange = function(){
                  if(ajaxRequest.readyState == 4){
                     var ajaxDisplay = document.getElementById('ajaxDiv');
                     ajaxDisplay.innerHTML = ajaxRequest.responseText;
                  }
               }

               // Now get the value from user and pass it to
               // server script.
                    // alert(document.getElementById('gender').value);
               var date = document.getElementById('date').value;
               var price = document.getElementById('price').value

                var pricesplit = price.split("-");
            //    alert(pricesplit[0]);

               var gender = document.getElementById('gender').value;
               var queryString = "?date=" + date ;

               queryString +=  "&pricemin=" + pricesplit[0] + "&pricemax=" + pricesplit[1] + "&gender=" + gender;
               ajaxRequest.open("GET", "roommate-ajax.php" + queryString, true);
               ajaxRequest.send(null);
            }
         //-->
      </script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Activity Website</title>
</head>
<body>
  <nav class="navbar navbar-light" style="background-color: #F7DC6F;">
    <!-- Brand -->
    <a class="navbar-brand" href="main.php">&nbsp; Student Activity</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
        <a class="nav-link" href="main.php">Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </nav>
<form>

    <div class="form">
    <center>
<h3><b>Roommate Search</b></h3>
</center>
</br>
    <div class="single-div" >
    DATE: <input type="date"  name = "date" id="date"/>
    </div>
    <div class="single-div" >
    PRICE<select name="price" id="price" required >
            <option value="0-500">0-500</option>
            <option value="500-800">500-800</option>
            <option value="800-1200">800-1200</option>
            </select>
    </div>
    <div class="single-div" >
    GENDER<select name="Gender" id="gender" required >
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Either">Either</option>
    </select>
    </div>
    <div class="single-div" >
    <input type = 'button' class="button" onclick = 'ajaxFunction()' value = 'Search'/>
    </div>
    </div>
    <div>
    </div>

</form>
<center>
<br/>
<div id = 'ajaxDiv' class="result"></div>
</center>
</body>
</html>
