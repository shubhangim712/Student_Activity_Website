<?php
session_start();
// $status = session_status();
// if($status == PHP_SESSION_NONE){
//     //There is no active session
//     session_start();
// }elseif($status == PHP_SESSION_DISABLED){
//     //Sessions are not available
// }elseif($status == PHP_SESSION_ACTIVE){
//     //Destroy current and start new one
//     session_destroy();
//     session_start();
// }

require_once '../shopping_cart/order.php';
        
if(isset($_POST['buy'])) {
    // if(empty($_SESSION["order"])) {
    //     $order = Order::getInstance();
    //     $order->setUserName("k xiong");
    //     $_SESSION["order"] = serialize($order);
    // }

    $order = unserialize($_SESSION["order"]);
    $buy = $_POST['buy'];

    foreach($buy as $s) {
        $arr = explode(",", $s);
        $item =  new Items("book", $arr[0], 1, $arr[3]);
        $order->pushItem($item);
    }

    // need update to $_SESSION
    updateSession($order);
    header("location: ../index.php");
    }

?>
