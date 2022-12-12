<?php 
    include('../config/constants.php') ;
    include('login-check.php'); 
?>
<html>
    <head>
        <title>Book Order Website - Home Page </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <style> <?php include '../css/admin.css"'; ?> </style>
    </head>

    <body>
    <header>
    <div class="px-3 py-2 bg-dark text-white">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
          </a>

          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
              <a href="../bookstore/index.php" class="nav-link text-secondary">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="index.php"></use></svg>
                Home
              </a>
            </li>
            <li>
              <a href="manage-admin.php" class="nav-link text-white">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="manage-admin.php"></use></svg>
                Dashboard
              </a>
            </li>
            <li>
              <a href="manage-order.php" class="nav-link text-white">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="manage-order.php"></use></svg>
                Orders
              </a>
            </li>
            <li>
              <a href="manage-book.php" class="nav-link text-white">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="manage-book.php"></use></svg>
                Stores
              </a>
            </li>
            <li>
              <a href="manage-user.php" class="nav-link text-white">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="manage-user.php"></use></svg>
                Customers
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

  </header>
        <!-- Menu Section starts -->
        
    <!--     <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Manager User</a></li>
                    <li><a href="manage-admin.php">Manage Admin</a></li>
                    <li><a href="manage-user.php">User</a></li>
                    <li><a href="manage-book.php">Books</a></li>
                    <li><a href="manage-order.php">Order Information</a></li>
                    <li><a href="logout.php">LogOut</a></li>
                </ul>
            </div>  -->  
        </div>
        <!-- Menu Section ends -->