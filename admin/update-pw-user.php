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
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        $sql = "SELECT * FROM users WHERE UserID=$id AND Password='$current_password'";

        $res = mysqli_query($conn, $sql);

        if($res == TRUE){
            $count= mysqli_num_rows($res);

            if($count == 1){
                if($new_password ==$confirm_password){
                    $sql2 = "UPDATE users SET
                        Password = '$new_password'
                        WHERE UserID = $id
                    ";

                    $res2 = mysqli_query($conn,$sql2);

                    if($res2 == TRUE){
                        $_SESSION['change-pwd'] = "<div class='success'>Password changed successfully</div>";
                        header("Location:".SITEURL.'admin/manage-user.php');
                    }else{
                        $_SESSION['change-pwd'] = "<div class='success'>Fail to change password</div>";
                        header("Location:".SITEURL.'admin/manage-user.php');
                    }

                }else{
                    $_SESSION['pwd-not-found']= "<div class='error'>Password did not match. </div>";
                    header("Location:".SITEURL.'admin/manage-user.php');
                }
                
            }else{
                $_SESSION['user-not-found']= "<div class='error'>User not Found. </div>";
                header("Location:".SITEURL.'admin/manage-user.php');
            }
        }
        
    }
?>

<?php include('partials/footer.php')?>