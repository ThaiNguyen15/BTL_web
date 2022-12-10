<?php

require_once "../bookstore/connectDB.php";

if(isset($_REQUEST['bookid'])){
    $book_id = $_REQUEST['bookid'];
}

$stmt = $pdo->prepare("SELECT * FROM book WHERE BookID = '$book_id'");

$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['push'])){

    require_once "../bookstore/connectDB.php";



    $sql = "UPDATE `book` SET `BookTitle`='$_POST[title]',`ISBN`='$_POST[isbn]',`Price`='$_POST[price]',`Author`='$_POST[author]',`Type`='$_POST[type]',`Image`='$_POST[image]' WHERE BookID = $book_id";
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute();
    // echo $stmt->rowCount() . " records UPDATED successfully";
    header("Location:./manage-book.php");
    
    /**
     * Can't uploaded image yet
     * Help me plz
     */
}

$pdo = NULL;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel='stylesheet' href='../css/admin.css'>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php  
 echo"
    <form action='edit_book.php?bookid=$result[BookID]' method='post'>



   
<label for='title'>Book Title: </label>
<input type='text' name='title' id='title' value = '$result[BookTitle]'>
<br>
<label for='author'>Book Author: </label>
<input type='text' name='author' id='author' value = '$result[Author]'>
<br>
<label for='isbn'>Book ISBN: </label>
<input type='text' name='isbn' id='isbn' value = '$result[ISBN]'>
<br>
<label for='type'>Book Type: </label>
<input type='text' name='type' id='type' value = '$result[Type]'>
<br>
<label for='price'>Book Price: </label>
<input type='number' step ='0.01' name='price' id='price' value = '$result[Price]'>
<br>
<label for='image'>Book Image: </label>
<input type='text ' name='image' id='image' value = '$result[Image]'>
<br>
";



?>

<button type='submit' name='push' class='btn-primary'>Edit</button>

</form>    
</body>
</html>


