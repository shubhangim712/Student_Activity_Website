

<?php
session_start();
if(isset($_SESSION['loginid'])){
class Items {
    public  $category = "";  // book, meal, ticket
    public  $itemName = "";
    public  $quality = 0;
    public  $price = 0.0;

    public function __construct($aCategory, $aName, $aQuality, $aPrice) {
        $this->category = $aCategory;
        $this->itemName = $aName;
        $this->quality = $aQuality;
        $this->price = $aPrice; 
    }

    public function getItemAsArray() {
        $arr = array();
        array_push($arr, $this->category);
        array_push($arr, $this->itemName);
        array_push($arr, $this->quality);
        array_push($arr, $this->price);
        return $arr;
    }
}

// require_once '../query_sql/connect.php';
class Order {
    private static $_instance;
    private $_userName;
    private $_items = array();

    private function __construct() {
        
    }

    private function __clone() {

    }

    public static function getInstance() {
        if(!(self::$_instance instanceof self)) {
            self::$_instance = new self();
            
        }

        return self::$_instance;
    }

    public function setUserName($userName) {
        $this->_userName = $userName;
    }

    public function pushItem($item) {
        // check if this item exist, add quality
        $isExist = false;
        foreach($this->_items as &$element) {
            if($element->category == $element->category 
                && $element->itemName == $item->itemName) {
                $isExist = true;
                ++$element->quality;
            }
        }
        if(!$isExist) {
            array_push($this->_items, $item);
        }

        unset($element);
    }

    public function getItems() {
        return $this->_items;
    }
    
    public function cleanItems() {
        unset($this->_items);
    }
/*
    function saveToDB($purchase) {
        // TODO: 1. check if table already exist, if not create a table 2. insert _items into DB 
        // db_name: order_history table_name: _userName
        $sql = 'order_history';
        if(!isExist($sql, self::$_userName)) {
            $conn = new mysqli("localhost", "root", "", $sql);
            $table = "CREATE TABLE self::$_userName (
                category VARCHAR(30),
                descript VARCHAR(30),
                quality INT(10),
                price INT(30),
                purchaseDate VARCHAR(30), 
            )";

            // check out if create successfully
            if($conn->query($table) === TRUE) {
                echo "success";
            } else {
                echo "fail";
            }

            $conn->close();
        }

        $time = date("m.d.y");
        foreach($this->_items as $item) {
            $arr = $item->getItemAsArray();
            array_push($arr, $time);
            addRecord($sql, self::$_userName, $arr);
        }
    }
*/
    public function calculate() {
        $bookSum = 0.0;
        $mealSum = 0.0;
        $ticketSum = 0.0;

        foreach($this->_items as $item) {
            if($item->category == "book") {
                $bookSum += $item->price * $item->quality;
            } elseif($item->category == "meal") {
                $mealSum += $item->price * $item->quality;
            } else {
                $ticketSum += $item->price * $item->quality;
            }
        }

        if($bookSum >= 200.0) {
            $bookSum = $bookSum * 0.90;
        }

        if($mealSum >= 1800.0) {
            $mealSum = $mealSum * 0.95;
        }

        $total = array('book'=>$bookSum, 'meal'=>$mealSum, 'ticket'=>$ticketSum);
        return $total;
    }
}

function updateSession(&$order) {
    $_SESSION['order'] = serialize($order);
}
    }
    else {
        header("location: login.php");
    }
?>

