<?php 
    include('partials/menu.php'); 
    include('../config/constants.php');
?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Add Admin</h1>
            <br><br>

            <?php
                    if(isset($_SESSION['add'])){ //Checking whether the Session is set or not
                        echo $_SESSION['add'];  //Displaying Session Message
                        unset($_SESSION['add']);//Removing Session Message
                    }
                ?>

            <form action="" method="POST">

                <table class="tbl-30">
                    <tr>
                        <td>Full Name:</td>
                        <td>
                            <input type="text" name="full_name" placeholder="Enter Your Name">
                        </td>
                    </tr>

                    <tr>
                        <td>Username:</td>
                        <td>
                            <input type="text" name="username" placeholder="Your Username">
                        </td>
                    </tr>

                    <tr>
                        <td>Password:</td>
                        <td>
                            <input type="password"  name="password" placeholder="Your Password">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>


<?php
    /* Process the value from the form and save it in Database*/

    // Check whether the submit button is clicked or not
    if(isset($_POST['submit'])){
        //Button clicked 

        // 1. Get data from the Form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password =md5( $_POST['password']); //Password Encryption with md5

        // 2. SQL Query to save the data into database
        $sql = "INSERT INTO tbl_admin SET
            full_name ='$full_name',
            username ='$username',
            password ='$password'
        ";

        
        // 3. Executing Query and Saving Data into database
        $res = mysqli_query($conn, $sql) or die(mysqli_error($con));

        /* 4. Check whether the (Query is executed) data is inserted or not and display 
        appropriate message */
        if($res == TRUE){
            //Data Inserted
            //Redirect Page to manage admin
            header("Location:".SITEURL.'admin/manage-admin.php');
            //Create a Session variable to Display message
            $_SESSION['add'] = "Admin Added Successfully";
            
        }else{
            //Failed to Inserted
            //Redirect Page to manage admin
            header("Location:".SITEURL.'admin/add-admin.php');
            //Create a Session variable to Display message
            $_SESSION['add'] = "Failed to add admin";
            
        }


    }else{
        //Button not clicked
    }
?>
<?php include('partials/footer.php'); ?>