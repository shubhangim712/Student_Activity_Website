<?php
session_start();

require_once './order.php';
    if(isset($_SESSION['loginid'])){
$order = unserialize($_SESSION['order']);
$items = $order->getItems();
if(count($items) == 0) {
    echo "Cart is empty";
} else {
    print <<<EOT
    <h3>Order list:</h3>
    <table cellpadding="0" cellspacing="0" border="1" width="90%">
        <tr>
        <td>Category</td>
        <td>Name</td>
        <td>Quantity</td>
        <td>Unit price</td>
        </tr>
    EOT;

    foreach($items as $item) {
        $arr = $item->getItemAsArray();
        print <<<EOT
        <tr>
        <td>$item->category</td>
        <td>$item->itemName</td>
        <td>$item->quality</td>
        <td>$item->price</td>
        </tr>
        EOT;
    }
    print "</table>";

    $subtotal = $order->calculate();
    $bookSum = subtotal['book'];
    $mealSum = subtotal['meal'];
    $ticketSum = subtotal['ticket'];

    print <<<EOT
    <h3>Sub-total: </h3>
    <table cellpadding="0" cellspacing="0" border="1" width="50%">
    <tr>
    <td>Book</td>
    <td>Meal</td>
    <td>Ticket</td>
    </tr>
    <tr>
    <td>$bookSum</td>
    <td>$mealSum</td>
    <td>$ticketSum</td>
    </tr>
    </table>
    EOT;

    echo '<a href="payment.php"><input type="button" value="Check out"></a>';
}
    }
    else {
        header("location: login.php");
    }
?>
