<?php
require_once "config.php";
session_start();


$Username = $Password = "";
$Username_err = $Password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$Username_res = mysqli_real_escape_string($db_connect,$_POST['Username']);
    $Password_res = mysqli_real_escape_string($db_connect,$_POST['Password']);

	$sql_stmt = "SELECT id FROM registrationform WHERE Username = '$Username_res' and Password = '$Password_res'";

	$result = mysqli_query($db_connect,$sql_stmt);
	$row = mysqli_fetch_array($result);
	$count = mysqli_num_rows($result);

	if($count == 1)
	{
		$_SESSION['loginid'] = $row['id'];
        

        // track the user
        require_once './shopping_cart/order.php';
        $userCache = Order::getInstance();  
        $userCache->setUserName($Username_res);
        updateSession($userCache);    
        
        // Redirect to Main page
        header("location: index.php");
	}
	else
	{
		echo "The Username or Password entered is incorrect.";

	}		
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ 
        		background-color: gainsboro; 
        		font: 14px sans-serif; 
        	}
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($Username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="Username" class="form-control" value="<?php echo $Username; ?>">
                <span class="help-block"><?php echo $Username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($Password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="Password" name="Password" class="form-control">
                <span class="help-block"><?php echo $Password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a></p>
            <p>Forgot Password? <a href="password_Reset.php">Reset Password</a></p>
            <p>Go to Home page  <a href="main.php">Home</a></p>
        </form>
    </div>    
</body>
</html>
