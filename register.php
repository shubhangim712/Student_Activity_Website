<?php
    include("config.php");
    session_start();
    $errorflag =true;
    $Password ="";
    $cPassword ="";
    $errordept =" ";
	$error =" ";
	$display_result = " ";
   if($_SERVER["REQUEST_METHOD"] == "POST") {

    global  $errorflag,$Password,$cPassword,$errordept,$error, $display_result;
	  $Firstname = mysqli_real_escape_string($db_connect,$_POST['Firstname']);
      $Lastname = mysqli_real_escape_string($db_connect,$_POST['Lastname']);
      $gender = mysqli_real_escape_string($db_connect,$_POST['gender']);
	  $Department = mysqli_real_escape_string($db_connect,$_POST['Department']);
	  $Address = mysqli_real_escape_string($db_connect,$_POST['Address']);
	  $Phonenumber = mysqli_real_escape_string($db_connect,$_POST['Phonenumber']);
	  $city = mysqli_real_escape_string($db_connect,$_POST['City']);
  	  $state = mysqli_real_escape_string($db_connect,$_POST['State']);
	  $zipcode = mysqli_real_escape_string($db_connect,$_POST['Zipcode']);
	  $EmailID = mysqli_real_escape_string($db_connect,$_POST['EmailID']);
	  $Password = mysqli_real_escape_string($db_connect,$_POST['Password']);
	  $Username = mysqli_real_escape_string($db_connect,$_POST['Username']);
	  $cPassword = mysqli_real_escape_string($db_connect,$_POST['confirm_Password']);

	validation();

      if (!$errorflag){


	 $sql = "SELECT Username FROM registrationform WHERE Username = '$Username'";

      $result = mysqli_query($db_connect,$sql);
      $row = mysqli_fetch_array($result);

      $count = mysqli_num_rows($result);

      if($count == 1) {
		 $display_result= "This Username is already taken. Please use different Username.";

      }else {

		   $sql = "INSERT INTO registrationform (Firstname, Lastname, gender, Address, City, State, Zipcode, EmailID, Department, Phonenumber, Username, Password, confirm_Password) VALUES ('$Firstname','$Lastname','$gender', '$Address', '$city', '$state', $zipcode, '$EmailID', '$Department', $Phonenumber, '$Username', '$Password', '$cPassword')";

             $result = mysqli_query($db_connect,$sql);
             $display_result = "Registration Successful";
             

			}
		}

   }

   function validation(){
	 global $Password;
		 global $cPassword;
		 global $errordept,$errorflag,$error;

if ($Password == $cPassword){
$errorflag=faLSE;
}
else{

	$error= "Password and Confirm Password not matched ";
	$errorflag=true;
}

	}

?>
<html>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 550px;
  padding: 4% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #bfbfb8;
  max-width: 550px;
  margin: 0 auto 100px;
  padding: 35px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form select,.form select-selected {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}

.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #121211;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.heb {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  text-align:center;
  outline: 0;
  background: #660d06;
  max-width: 550px;
  border: 0;
  padding: 15px;
  color: #adaba5;
  font-size: 18px;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #25095c;
  font-size: 14px;
}
.form .messageerror {
  margin: 0px 0 0;
  color: red;
  font-size: 12px;
}
.form .message a {
  color: #043b09;
  text-decoration: none;
}
.form .register-form {
  display: ;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {

  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$('#Password, #confirm_Password').on('keyup', function () {
	alert("sd");
  if ($('#Password').val() == $('#confirm_Password').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else
    $('#message').html('Not Matching').css('color', 'red');
})

</script>
<body>
   <div class="login-page">
     <div class="heb">Registration</div>
	 <div class="form">

       <form class="register-form" method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="text" placeholder="First Name" name = "Firstname" value="<?php echo isset($_POST["Firstname"]) ? $_POST["Firstname"] : ''; ?>" />
        <input type="text" placeholder="Last Name" name = "Lastname" value="<?php echo isset($_POST["Lastname"]) ? $_POST["Lastname"] : ''; ?>"/>
        <select name="gender" placeholder="Last Name" id="gender" required>
            <option selected disabled hidden style='display: none' value=''>Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="female">Other</option>

        </select>
		<input type="text" placeholder="Address" name = "Address" value="<?php echo isset($_POST["Address"]) ? $_POST["Address"] : ''; ?>" />
		<input type="text" placeholder="City" name = "City" value="<?php echo isset($_POST["City"]) ? $_POST["City"] : ''; ?>" />
		<input type="text" placeholder="State" name = "State" value="<?php echo isset($_POST["State"]) ? $_POST["State"] : ''; ?>" />
		<input type="text" placeholder="Zipcode" name = "Zipcode" value="<?php echo isset($_POST["Zipcode"]) ? $_POST["Zipcode"] : ''; ?>" />
		<input type="tel" pattern="[0-9]{10}" title="Enter correct Phonenumber"  placeholder="Phonenumber" name = "Phonenumber" value="<?php echo isset($_POST["Phonenumber"]) ? $_POST["Phonenumber"] : ''; ?>"/>
		<input type="EmailID"  placeholder="EmailID" name = "EmailID" value="<?php echo isset($_POST["EmailID"]) ? $_POST["EmailID"] : ''; ?>"/>
		<select name="Department" id="Department" required>
			<option value="">Select Department</option>
		    <option value="Computer Science">Computer Science</option>
			<option value="Data science">Data Science</option>
			<option value="Data science">Software Engineering</option>
		</select>
		<input type="text" placeholder="Username" name = "Username" value="<?php echo isset($_POST["Username"]) ? $_POST["Username"] : ''; ?>"/>
		<input type="Password" id="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('Password must contain one uppercase letter, one lowercase letter and a numeric value')"  placeholder="Password" name = "Password" required/>
		<input type="Password" placeholder="Confirm Password" id="confirm_Password" name = "confirm_Password" required/>
        <span id='message'></span>
        <button type = "submit">create</button>
        <p class="message">Already registered? <a href="login.php">Sign In</a></p>
        <p>Go to Home page  <a href="main.php">Home</a></p>
		<br/>
		 <p class="messageerror"><?php echo $display_result; ?></p>

       </form>

     </div>
   </div>
</body>
</html>
