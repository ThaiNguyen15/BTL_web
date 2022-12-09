<?php include('partials/menu.php')?>
<?php include('../config/constants.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update User</h1>

        <br><br>

        <?php
            $id=$_GET["UserID"];

            $sql = "SELECT * FROM users WHERE UserID=$id";

            $res = mysqli_query($conn, $sql); 

            if($res == TRUE){
                $count = mysqli_num_rows($res);

                if($count == 1){
                    $row = mysqli_fetch_assoc($res);

                    $username = $row['username'];
                }else{
                    header('Location:'.SITEURL.'admin/manage-user.php');
                }
            }

        ?>

        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update User" class = "btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $username = $_POST['username'];

        $sql = "UPDATE users SET
        username ='$username'
        WHERE id='$id'
        ";

        $res = mysqli_query($conn, $sql);

        if($res == TRUE){
            header("Location:".SITEURL.'admin/manage-user.php');
            $_SESSION['update'] = "<div class='success'>User Updated Successfully.</div>";
            
        }else{
            header("Location:".SITEURL.'admin/manage-User.php');
            $_SESSION['update'] = "<div class='error'>User Updated Fail.</div>";
            
        }
    }
?>
<?php include('partials/footer.php')?>