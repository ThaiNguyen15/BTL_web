<?php
    include('../config/constants.php');

    $id = $_GET['UserID'];

    $sql = "DELETE FROM users WHERE UserID=$id";
    $res = mysqli_query($conn, $sql);

    if($res == TRUE){
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully. </div>";
        header("Location:".SITEURL.'admin/manage-admin.php');
    }else{
        
        $_SESSION['delete'] = "<div class='error'>Fail to Delete User. Try again later. </div>";
        header("Location:".SITEURL.'admin/manage-user.php');
    }
?>