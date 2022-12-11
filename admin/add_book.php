<head>
<link rel="stylesheet" href="../css/admin.css">
</head>
<form action="add_book.php" method="post">

<label for="title">Book Title: </label>
<input type="text" name="title" id="title">
<br>
<label for="author">Book Author: </label>
<input type="text" name="author" id="author">
<br>
<label for="isbn">Book ISBN: </label>
<input type="text" name="isbn" id="isbn">
<br>
<label for="type">Book Type: </label>
<input type="text" name="type" id="type">
<br>
<label for="price">Book Price: </label>
<input type="number" name="price" id="price">
<br>
<label for="image">Book Image: </label>
<input type="file" name="image" id="image">
<br>
<button type="submit" name="push" class="btn-primary">Add Book</button>

</form>

<?php
    require_once "../bookstore/connectDB.php";

    if(isset($_POST['push'])){

        //upload img
        $filename = pathinfo($_FILES['image'], PATHINFO_FILENAME);
        copy($filename, 'image/'.$filename);
        
        $pdo->exec("INSERT INTO `book`( `BookTitle`, `ISBN`, `Price`, `Author`, `Type`, `Image`) VALUES ('$_POST[title]','$_POST[isbn]','$_POST[price]','$_POST[author]','$_POST[type]','$filename')");
        header("Location:./manage-book.php");
        
        /**
         * Can't uploaded image yet
         * Help me plz
         */
    }
    
    $pdo = NULL;
?>