<html>
    <head>
    </head>

    <boby>
        <p>Search result:</p>
<?php
    session_start();
    

if(!empty($_POST))
{
    // parse_str($_SERVER['QUERY_STRING'], $query_string);
    $category = $_POST["category"];
    $bookname = $_POST["bookname"];
    $isbn = $_POST["isbn"];

    require_once '../query_sql/connect.php';
    $records = array();
    if(strlen($isbn) != 0)
    {
        $records = searchRecord("se_book", "bookinfo", "ISBN", $isbn);
    }
    else if(strlen($bookname) != 0)
    {  
        $records = searchRecord("se_book", "bookinfo", "bookname", $bookname);
    }
    else
    {
        $records = searchRecord("se_book", "bookinfo", "category", $category);
    }

    if(count($records) == 0) {
        echo '<h2>Cannot find such book!</h2>';
        return 0;
    }
    // extract book information from records
    $booksInfo = array();
    foreach($records as $obj) {
        $info = array();
        array_push($info, $obj->bookname);
        array_push($info, $obj->ISBN);
        array_push($info, $obj->author);
        array_push($info, $obj->price);
        array_push($info, $obj->location);
        array_push($info, $obj->store);
        array_push($info, $obj->category);

        array_push($booksInfo, $info);
    }

    // echo '<form action="purchaseBook.php" method="post">';
    // // show up information for each book
    // $size = count($booksInfo);
    // for($index = 0; $index < $size; $index++) {
    //     $s = implode(",", $booksInfo[$index]);
    //     $name = $booksInfo[$index][0];
    //     print <<<EOT
    //         <input type="checkbox" id="$name" name="buy[]" value="$s">
    //         <label for="$name">$s</label><br>
    //     EOT;
    // }
    // print <<<EOT
    //     <input type="submit" value= "add to cart">
    //     </form>
    // EOT;

    echo '<form action="purchaseBook.php" method="post">';
    // table
    print <<<EOT
    <h2>item list：</h2>
    <table cellpadding="0" cellspacing="0" border="1" width="90%">
        <tr>
        <td>CheckBox</td>
        <td>BookName</td>
        <td>ISBN</td>
        <td>Author</td>
        <td>Price</td>
        <td>Location</td>
        <td>Store</td>
        <td>Category</td>
        </tr>
    EOT;

    $size = count($booksInfo);
    for($index = 0; $index < $size; $index++) {
        $s = implode(",", $booksInfo[$index]);
        $name = $booksInfo[$index][0];
        print <<<EOT
        <tr>
        <td><input type="checkbox" id="$name" name="buy[]" value="$s"></td>
        <td>{$booksInfo[$index][0]}</td>
        <td>{$booksInfo[$index][1]}</td>
        <td>{$booksInfo[$index][2]}</td>
        <td>{$booksInfo[$index][3]}</td>
        <td>{$booksInfo[$index][4]}</td>
        <td>{$booksInfo[$index][5]}</td>
        <td>{$booksInfo[$index][6]}</td>
        </tr>
        EOT;
    }

    print <<<EOT
        <input type="submit" value= "add to cart">
        </form>
    EOT;
}
   
?>

    </body>
</html>

