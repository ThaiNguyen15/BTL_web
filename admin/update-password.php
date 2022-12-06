<?php include('partials/menu.php')?>
<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            }
        ?>

        <form action="" method="post" name="change_password">

            <table class='tbl-30'>
                <tr>
                    <td>Current Password:</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>

                <tr>
                    <td>New Password:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2" >
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>

    </div>
</div>

<?php 
    //Check whether the submit button is clicked or not
    if(isset($_POST['submit'])){
        //1. Get the data from the form
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        //2. Check whether the user with current ID and Password Exists or NOT exists
        $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        if($res == TRUE){
            //3. Check whether data is available or not
            $count= mysqli_num_rows($res);

            if($count == 1){
                //User Exists and Password can be changed
                // echo "User Found";
                //Check whether the new password and confirm_password match or NOT
                if($new_password ==$confirm_password){
                    //Update password
                    $sql2 = "UPDATE tbl_admin SET
                        password = '$new_password'
                        WHERE id = $id
                    ";

                    //Execute SQL Query
                    $res2 = mysqli_query($conn,$sql2);

                    //Check whether the query executed successfully or not
                    if($res2 == TRUE){
                        //Display success message
                        //Redirect to Manage Admin Page with success message
                        $_SESSION['change-pwd'] = "<div class='success'>Password changed successfully</div>";
                        //Redirect to Manage Admin Page
                        header("Location:".SITEURL.'admin/manage-admin.php');
                    }else{
                        //Display error message
                        //Redirect to Manage Admin Page with error message
                        $_SESSION['change-pwd'] = "<div class='success'>Fail to change password</div>";
                        //Redirect to Manage Admin Page
                        header("Location:".SITEURL.'admin/manage-admin.php');
                    }

                }else{
                    //Redirect to Manage Admin Page with Error message
                    $_SESSION['pwd-not-found']= "<div class='error'>Password did not match. </div>";
                    //Redirect the User
                    header("Location:".SITEURL.'admin/manage-admin.php');
                }
                
            }else{
                $_SESSION['user-not-found']= "<div class='error'>User not Found. </div>";
                //Redirect the User
                header("Location:".SITEURL.'admin/manage-admin.php');
            }
        }
        //3. Check whether the New Password and Confirm Password Match or NOT

        //4, Change Password if all above is TRUE
    }
?>

<?php include('partials/footer.php')?>