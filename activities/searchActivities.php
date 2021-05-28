<?php
session_start();
require_once './definition.php';
if(isset($_SESSION['loginid'])){
if(!empty($_POST))
{
    $start_date = $_POST["start"];
    $end_date = $_POST["end"];
    $start = (new DateTime($start_date))->format('m/d/y'); 
    $end = (new DateTime($end_date))->format('m/d/y');

    $connected = mysqli_connect("localhost", "root", "", "student_activity_db");
    $query = "SELECT * FROM activitiesinfo";
    $result = mysqli_query($connected, $query);

    $records = array();
    while($obj = mysqli_fetch_object($result))
    {
        $date = (new DateTime($obj->date))->format('m/d/y');

        if(strtotime($date) >= strtotime($start) && strtotime($date) <= strtotime($end)) {
           array_push($records, new Activity($obj->date, $obj->activityName, $obj->location)); 
        }

    }
    mysqli_close($connected);
    
    $size = count($records);
    if($size > 0) {
        $_SESSION['activities'] = serialize($records);
    
        echo '<form action="display_activities.php" method="post">';
        // table
        print <<<EOT
        <h2>item list：</h2>
        <table cellpadding="0" cellspacing="0" border="1" width="90%">
            <tr>
            <td>CheckBox</td>
            <td>Date</td>
            <td>Activity</td>
            <td>Location</td>
            </tr>
        EOT;
    
        for($index = 0; $index < $size; $index++) {
            $atv = $records[$index];
            print <<<EOT
            <tr>
            <td><input type="checkbox" name="select[]" value="$index"></td>
            <td>$atv->date</td>
            <td>$atv->name</td>
            <td>$atv->location</td>
            </tr>
            EOT;
        }
    
        print <<<EOT
        <input type="submit" value= "select">
        </form>
        EOT;
    } else {
        echo "No activities in this period";
    }
}
    }
    
    else {
        header("location: login.php");
    }
?>
