<?php 
        // Start Session
        if(!isset($_SESSION)) 
        { 
                session_start(); 
        }
        else
        {
                session_destroy();
                session_start(); 
        }


        // Create Constants to Store Non Repeating Values
        if (!defined('SITEURL')) define('SITEURL', 'http://localhost:8080/PHP-Bookstore-Website-Example/');
        if (!defined('LOCALHOST')) define('LOCALHOST', 'localhost');
        if (!defined('DB_USERNAME')) define( 'DB_USERNAME', 'root' );
        if (!defined('DB_PASSWORD')) define( 'DB_PASSWORD', '');
        if (!defined('DB_NAME')) define( 'DB_NAME', 'bookstore' );
        
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn)); //DB connection
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn)); //Selecting database
?>