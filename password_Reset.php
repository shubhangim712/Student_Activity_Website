<?php
   include("config.php");
   include ("send_email.php");
   session_start();
     $error=" ";
   if($_SERVER["REQUEST_METHOD"] == "POST")
   {
      // username and password sent from form

     $EmailID = mysqli_real_escape_string($db_connect, $_POST['EmailID']);


	   $sql = "SELECT EmailID FROM registrationform WHERE EmailID = '$EmailID'";
     $result = mysqli_query($db_connect,$sql);
     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     $count = mysqli_num_rows($result);

      // If result matched, table row must be 1 row

    if($count == 1)
    {
  		$EmailID;
      $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
      $newPassword= substr(str_shuffle($permitted_chars), 0, 8);
      $sql = "UPDATE registrationform SET Password='$newPassword' WHERE EmailID = '$EmailID'";
      $result = mysqli_query($db_connect,$sql);
  	  $msg = "Hello\n Your Reset Password is : $newPassword";

  		// use wordwrap() if lines are longer than 50 characters
  		$msg = wordwrap($msg, 50);
  		$mailing = new emaill($EmailID, "Reset Password", $msg);
  		// send an email
  		try
      {
  		  $mailing->sendmail();
  		}
      catch(EPDOException $e)
      {
  			 echo $sql . "<br>" . $e->getMessage();
  		}
  		 
       $error = "Check your mail for new password";// redirect one to another

      }
    else
    {
       $error = "Your username not registered with us";
    }
   }
?>

<html>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 400px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #a9ccd2;
  max-width: 400px;
  margin: 0 auto 100px;
  padding: 45px;
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
  font-size: 15px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #ffd118;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #000104;
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
  background: #ffd118;
  max-width: 400px;
  border: 0;
  padding: 15px;
  color: #000104;
  font-size: 18px;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #00161a;
  font-size: 13px;
}
.form .message a {
  color: #00161a;
  text-decoration: none;
}
.form .register-form {
  display: none;
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
<body>
   <div class="login-page">
     <div class="heb">Forgot Password?</div>
	 <div class="form">
	   <form class="login-form" action = "" method = "post">
       <input type="EmailID" placeholder="EmailID" name = "EmailID" required/>
       <button type = "submit">Reset Password</button>
	   <p class="message"> <a href="login.php">Sign In</a></p>
     <p class="message">Don't want to reset password? <a href="main.php">Go To Main Page</a></p>
       <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
	   </form>
     </div>
   </div>
</body>
</html>
