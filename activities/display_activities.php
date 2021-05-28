<?php
session_start();
require_once './definition.php';
if(isset($_SESSION['loginid'])){
if(isset($_POST['select'])) {
    $records = unserialize($_SESSION['activities']);
    $select = $_POST['select'];

    if(!isset($_SESSION['selected'])) {
        $_SESSION['selected'] = serialize(array());
    }
    $selected_activities = unserialize($_SESSION['selected']);
    foreach($select as $index) {
        array_push($selected_activities, $records[$index]);
    }

    $_SESSION['selected'] = serialize($selected_activities);

    print <<<EOT
    <h2>Activities list：</h2>
    <table cellpadding="0" cellspacing="0" border="1" width="90%">
        <tr>
        <td>Date</td>
        <td>Activity</td>
        <td>Location</td>
        </tr>
    EOT;
    
    foreach($selected_activities as $atv) {
        print <<<EOT
        <tr>
        <td>$atv->date</td>
        <td>$atv->name</td>
        <td>$atv->location</td>
        </tr>
        EOT;
    }
    

    print <<<EOT
    </form>
    <form>
    <a href="../main.php"><input type="button" value="Back to Main Page"></a>
    </form>

    EOT;
}
}
    else {
        header("location: login.php");
    }
?>


