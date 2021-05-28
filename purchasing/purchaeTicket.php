<?php
session_start();

$tickets = array("zone-1" => 2, "zone-2" => 4, 
    "zone-3" => 6, "cards" => 40);

require_once '../shopping_cart/order.php';
if(isset($_POST['buy'])) {
    $buy = $_POST['buy'];
    $size = count($buy);

    $str = $_SESSION["order"];
    $order = unserialize($str);

    $index = 0;
    foreach($tickets as $key=>$value) {
            $quality = intval($buy[$index]);
            if($quality != 0) {
                $item = new Items("ticket", $key, $quality, $value);
                $order->pushItem($item);
            }
            
        ++$index;
    }

    updateSession($order);
    header("location: ../index.php");
}


?>

