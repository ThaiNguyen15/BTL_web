<?php

require_once "../bookstore/connectDB.php";

if(isset($_REQUEST['bookid'])){
    $book_id = $_REQUEST['bookid'];
}

$pdo->exec("DELETE FROM book WHERE BookID = '$book_id'");
header("Location:./manage-book.php");

$pdo = NULL;