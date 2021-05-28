<?php
   include("config.php");
  include("index1.php");

if(isset($_SESSION['loginid'])){

}
else {
    header("location: login.php");
}

$login = $_SESSION['loginid'];

   if($_SERVER["REQUEST_METHOD"] == "POST")
   {
    $candidate = mysqli_real_escape_string($db_connect,$_POST['candidate']);
    
    $sql_search = "SELECT votedfor FROM registrationform where id='$login'";
    $searchresult = mysqli_query($db_connect,$sql_search);
    
    if(mysqli_fetch_assoc($searchresult)["votedfor"] == "") {
        $sql_cast1 = "UPDATE poll SET votecount=votecount+1 WHERE id='$candidate'";
        $castresult1 = mysqli_query($db_connect,$sql_cast1);
        $sql_cast2 = "UPDATE registrationform SET votedfor='$candidate' WHERE id='$login'";
        $castresult2 = mysqli_query($db_connect,$sql_cast2);
    }
    else{
        echo "You have already voted";
    }
   }
   $sql_john = "SELECT votecount FROM poll where name = 'John'";
   $johnresult = mysqli_query($db_connect,$sql_john);
   $johncount = mysqli_fetch_assoc($johnresult)["votecount"];
   $sql_mary = "SELECT votecount FROM poll where name = 'Mary'";
   $maryresult = mysqli_query($db_connect,$sql_mary);
   $marycount = mysqli_fetch_assoc($maryresult)["votecount"];
   $sql_susan = "SELECT votecount FROM poll where name = 'Susan'";
   $susanresult = mysqli_query($db_connect,$sql_susan);
   $susancount = mysqli_fetch_assoc($susanresult)["votecount"];
   

?>



<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Student Activity Website</title>
</head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {
      
      var johnc = parseInt(<?php echo json_encode($johncount); ?>, 10);
      var maryc = parseInt(<?php echo json_encode($marycount); ?>, 10);
      var susanc = parseInt(<?php echo json_encode($susancount); ?>, 10);
      
    var data = google.visualization.arrayToDataTable([
        ['Candidate', 'Number of votes',],
        ['John',johnc],
        ['Mary',maryc],
        ['Susan',susanc],
      ]);

      var options = {
        title: 'Student Elections',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Number of votes',
          minValue: 0
        },
        vAxis: {
          title: 'Candidates'
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
</script>
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
     <div class="heb">Vote Today!</div>
  </center>
            <div>
                    <select name="candidate" value="<?php echo $candidate; ?>" class="form-control" required>
                    <option selected disabled hidden style='display: none' value=''>Select a candidate</option>
            <option value="1">John</option>
            <option value="2">Mary</option>
            <option value="3">Susan</option>
        </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Vote">
            </div>
            </div>
          </form>


  </div>
</div>

  <div id="chart_div"></div>
    
</body>

</html>
