<?php 
    //Include constants.php file here
    include('../config/constants.php');

    //1. Get the ID of Admin to be deleted
    $id = $_GET['id'];

    //2.Create SQL Query to delete Admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";
    //Execute the query
    $res = mysqli_query($conn, $sql);

    //Check whether the query executed successfully or not
    if($res == TRUE){
        //Query Executed successfully and Admin is deleted
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully. </div>";
        //Redirect to Manage Admin Page
        header("Location:".SITEURL.'admin/manage-admin.php');
    }else{
        //failed to delete Admin
        
        $_SESSION['delete'] = "<div class='error'>Fail to Delete Admin. Try again later. </div>";
        header("Location:".SITEURL.'admin/manage-admin.php');
    }
    //3. Redirect to Manage Admin page with message (success/error)
?>