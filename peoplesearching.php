<?php
   include("config.php");
  include("index1.php");

if(isset($_SESSION['loginid'])){

}
else {
    header("location: login.php");
}

$firstname = $lastname = $department = "";

 header("Expires: Thu, 19 Nov 1981 08:52:00 GMT"); //Date in the past
 header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0"); //HTTP/1.1
header("Pragma: no-cache");

   if($_SERVER["REQUEST_METHOD"] == "POST")
   {
       $firstname = mysqli_real_escape_string($db_connect,$_POST['Firstname']);
       $lastname = mysqli_real_escape_string($db_connect,$_POST['Lastname']);
       $department = mysqli_real_escape_string($db_connect,$_POST['Department']);
       
       if($firstname != "" || $lastname != "" || $department != "") {
           if($firstname != "" && $lastname == "" || $department == "") $sql_stmt = "SELECT firstname, lastname, department, phonenumber, emailid FROM registrationform WHERE firstname = '$firstname'";
           if($firstname == "" && $lastname != "" || $department == "") $sql_stmt = "SELECT firstname, lastname, department, phonenumber, emailid FROM registrationform WHERE lastname = '$lastname'";
           if($firstname == "" && $lastname == "" || $department != "") $sql_stmt = "SELECT firstname, lastname, department, phonenumber, emailid FROM registrationform WHERE department = '$department'";
           if($firstname != "" && $lastname != "" || $department == "") $sql_stmt = "SELECT firstname, lastname, department, phonenumber, emailid FROM registrationform WHERE firstname = '$firstname' and lastname = '$lastname'";
           if($firstname != "" && $lastname == "" || $department != "") $sql_stmt = "SELECT firstname, lastname, department, phonenumber, emailid FROM registrationform WHERE firstname = '$firstname' and department = '$department'";
           if($firstname == "" && $lastname != "" || $department != "") $sql_stmt = "SELECT firstname, lastname, department, phonenumber, emailid FROM registrationform WHERE lastname = '$lastname' and department = '$department'";
           if($firstname != "" && $lastname != "" || $department != "") $sql_stmt = "SELECT firstname, lastname, department, phonenumber, emailid FROM registrationform WHERE firstname = '$firstname' and lastname = '$lastname' and department = '$department'";
           
               $result = mysqli_query($db_connect,$sql_stmt);
    
    if (mysqli_num_rows($result) > 0) {
        echo "<table><tr><th>Name</th><th>Department</th><th>Phone Number</th><th>Email ID</th></tr>";
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>".$row["firstname"]." ".$row["lastname"]."</td><td>".$row["department"]."</td><td>".$row["phonenumber"]."</td><td>".$row["emailid"]."</td></tr>";
  }
} else {
  echo "0 results";
   }
       }
       else {
  echo "Fill in at least 1 field";
   }
       
       
}
?>

<!DOCTYPE html>
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
<body>
  <div id="event" class="container">
  <div>
        <form method="post" enctype="multipart/form-data" autocomplete="off">
           <div class="page-detail">
   <center>
     <div class="heb">People Searching</div>
  </center>
            <div>
                <input type="text" name="Firstname" placeholder = "First Name" class="form-control" value="<?php echo $firstname; ?>">
            </div>
            <div>
                <input type="text" name="Lastname" placeholder = "Last Name" class="form-control" value="<?php echo $lastname; ?>">
            </div>
            <div>
                    <select name="Department" value="<?php echo $department; ?>" class="form-control">
                    <option selected disabled hidden style='display: none' value=''>Select Department</option>
            <option value="Computer Science">Computer Science</option>
            <option value="Data science">Data Science</option>
            <option value="Data science">Software Engineering</option>
        </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Search">
            </div>
          </form>


  </div>
</div>
</div>
    
</body>
</html>
