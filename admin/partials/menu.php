<?php 
    include('../config/constants.php') ;
    include('login-check.php'); 
?>
<html>
    <head>
        <title>Book Order Website - Home Page </title>
        <style> <?php include '../css/admin.css'; ?> </style>
    </head>

    <body>
        <!-- Menu Section starts -->
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="manage-admin.php">Admin</a></li>
                    <li><a href="manage-category.php">Category</a></li>
                    <li><a href="manage-book.php">Books</a></li>
                    <li><a href="manage-order.php">Order</a></li>
                    <li><a href="logout.php">LogOut</a></li>
                </ul>
            </div>   
        </div>
        <!-- Menu Section ends -->