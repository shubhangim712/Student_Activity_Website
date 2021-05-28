<?php
   include("config.php");
  include("index1.php");

if(isset($_SESSION['loginid'])){

}
else {
	header("location: login.php");
}

 header("Expires: Thu, 19 Nov 1981 08:52:00 GMT"); //Date in the past
 header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0"); //HTTP/1.1
header("Pragma: no-cache");

   $errorflag = true;
   $Password = "";
   $cPassword = "";
   $errordept = " ";
   $error = " ";
   $changepass = 0;
   $login = $_SESSION['loginid'];

   if($_SERVER["REQUEST_METHOD"] == "POST")
   {
      // username and Password sent from form
	  $Firstname = mysqli_real_escape_string($db_connect,$_POST['Firstname']);
    $Lastname = mysqli_real_escape_string($db_connect,$_POST['Lastname']);
    $gender = mysqli_real_escape_string($db_connect,$_POST['gender']);
	  $Department = mysqli_real_escape_string($db_connect,$_POST['Department']);
	  $Address = mysqli_real_escape_string($db_connect,$_POST['Address']);
	  $Phonenumber = mysqli_real_escape_string($db_connect,$_POST['Phonenumber']);
	  $City = mysqli_real_escape_string($db_connect,$_POST['City']);
  	$State = mysqli_real_escape_string($db_connect,$_POST['State']);
	  $Zipcode = mysqli_real_escape_string($db_connect,$_POST['Zipcode']);
	  $EmailID = mysqli_real_escape_string($db_connect,$_POST['EmailID']);
	  $Username = mysqli_real_escape_string($db_connect,$_POST['Username']);
	  $Password = mysqli_real_escape_string($db_connect,$_POST['Password']);
	  $cPassword = mysqli_real_escape_string($db_connect,$_POST['confirm_Password']);
	  $changepass = mysqli_real_escape_string($db_connect,isset($_POST['changepass']));

	if ($changepass==1)
	{
	validation();
	}
	else
	{
		$errorflag=false;
	}
      // echo "If result matche, table row must be 1 row";

    if (!$errorflag)
    {
			try
			{
		     $sql = "UPDATE registrationform SET Firstname = '$Firstname', Lastname = '$Lastname', gender = '$gender', Address = '$Address', City = '$City', State = '$State', Zipcode = $Zipcode, Department = '$Department', Phonenumber = '$Phonenumber'";
             if ($changepass==1)
             {
				$sql =$sql.",Password='$Password', confirm_Password = '$cPassword'";
			 }
			 $sql=$sql." WHERE EmailID='$EmailID'";
             $result = mysqli_query($db_connect,$sql);
             $error = "Information Updated Successful";
		    }
		    catch(PDOException $e)
            {
			 	echo $sql . "<br>" . $e->getMessage();
			}
		  }

       // $db_connect.close;
   }
   else
   {// get the all the details of the loged in user as set that value to the textbox.
 	$sql = "SELECT * FROM registrationform WHERE id='$login'";// addd session varible when integration is done
   $retval = mysqli_query( $db_connect, $sql);
   if(! $retval )
   {
      die('Could not get data: ' . mysql_error());
   }

   while($row = mysqli_fetch_array($retval))
   {
      // echo "EMP ID :{$row['EmailID']}  <br> ";
   $_POST['Firstname'] = $row['Firstname'];
   $_POST['Lastname']= $row['Lastname'];
   $_POST['gender']= $row['gender'];
	 $_POST['Department'] = $row['Department'];
	 $_POST['Address'] = $row['Address'];
	 $_POST['Phonenumber'] = $row['Phonenumber'];
	 $_POST['EmailID']= $row['EmailID'];

   }
   }

   function validation()
   {
	 	global $Password;
		global $cPassword;
		global $errordept,$errorflag,$error;
		if ($Password == $cPassword)
		{
			$errorflag=false;
		}
		else
		{
			$error= "Password and Confirm Password not matched ";
			$errorflag=true;
		}

	}
?>


<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<title>Student Activity Website</title>
</head>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.page-detail {
  width: 100%;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #ffe88e;
  max-width: 550px;
  margin: 0 auto 100px;
  padding: 35px;
  text-align: center;
  box-shadow: 0 0 1px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form p {
  font-family: "Roboto", sans-serif;
  margin: 0 0 0px;
  text-align:left;
  font:bold;
  font-size: 16px;
  color:black;
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
  background: #694caf;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
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
  background: #694caf;
  max-width: 550px;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 18px;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #4279b9;
  font-size: 14px;
}
.form .messageerror {
  margin: 0px 0 0;
  color: red;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
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
<script>
//$('.message a').click(function(){
  // $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
//});
</script>
<body>
<form method="post" enctype="multipart/form-data" autocomplete="off">



   <div class="page-detail">
   <center>
     <div class="heb">personal details</div>
  </center>
	 <div class="form">
       <form class="register-form" method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<p>First Name</p>
		<input type="text" placeholder="First Name" name = "Firstname" value="<?php echo isset($_POST["Firstname"]) ? $_POST["Firstname"] : ''; ?>"  required/>
        <p>Last Name</p>
		<input type="text" placeholder="Last Name" name = "Lastname" value="<?php echo isset($_POST["Lastname"]) ? $_POST["Lastname"] : ''; ?>" required/>
    <p>Gender</p>
    <select name="gender" id="gender" required>
      <option selected disabled hidden style='display: none' value="">Select Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="female">Other</option>
    </select>
		<p>Address</p>
		<input type="text" placeholder="Address" name = "Address" value="<?php echo isset($_POST["Address"]) ? $_POST["Address"] : ''; ?>" required/>
		<p>City</p>
		<input type="text" placeholder="City" name = "City" value="<?php echo isset($_POST["City"]) ? $_POST["City"] : ''; ?>" required/>
		<p>State</p>
		<input type="text" placeholder="State" name = "State" value="<?php echo isset($_POST["State"]) ? $_POST["State"] : ''; ?>" required/>
		<p>Zipcode</p>
		<input type="text" placeholder="Zipcode" name = "Zipcode" value="<?php echo isset($_POST["Zipcode"]) ? $_POST["Zipcode"] : ''; ?>" required/>
		<p>Phonenumber Number</p>
		<input type="text" placeholder="Phonenumber Number" pattern="[0-9]{10}" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('Enter correct Phonenumber number')"  name = "Phonenumber" value="<?php echo isset($_POST["Phonenumber"]) ? $_POST["Phonenumber"] : ''; ?>" required/>
		<p>Department</p>
		<select name="Department" id="Department" required>
			<option value="">Select Department</option>
		    <option value="Computer Science">Computer Science</option>
			<option value="Data science">Data Science</option>
			<option value="Data science">Software Engineering</option>
		</select>
		<p>EmailID</p>
		<input type="EmailID"  placeholder="EmailID" name = "EmailID" value="<?php echo isset($_POST["EmailID"]) ? $_POST["EmailID"] : ''; ?>" readonly/>
		<p></p>
		<p>Username</p>
		<input type="Username"  placeholder="Username" name = "Username" value="<?php echo isset($_POST["Username"]) ? $_POST["Username"] : ''; ?>" readonly/>
		<p></p>
		<p style="display: block"><input type="checkbox" style="width:auto"name="changepass" value="good"/><label style="block:inline">Check the box to Change Password</label></P>
		<p>Password</p>
			<input type="Password" id="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('Password must contain one uppercase letter, one lowercase letter and a numeric value')" placeholder="Password" name = "Password"/>
		<p>Confirm Password</p>
		<input type="Password" placeholder="Confirm Password" id="confirm_Password" name = "confirm_Password" />
        <button type = "submit">Update Details</button>
        <p class="message">Don't want to update information? <a href="index.php">Go To Main Page</a></p>

		 <p class="messageerror"><?php echo $error; ?></p>

       </form>

     </div>
   </div>
   </form>
</body>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</html>
