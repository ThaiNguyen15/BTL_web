<?php include('../config/constants.php') ?>
<html>
    <head>
        <title>Login - Admin</title>
        <style> <?php include '../css/admin.css'; ?> </style>
    </head>

    <body>
        <div class='login'>
            <h1 class="text-center">Login</h1><br>

            <?php 
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                if(isset($_SESSION['no-login-message'])){
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>

            <!-- Login form start here -->
            <form action="" method='post'>
                Username: <br><input type="text" name="username" placeholder="Enter Username"><br><br>
                Password: <br><input type="password" name="password" placeholder="Enter Password"><br><br>

                <input type="submit" name ="submit" value="Login" class="btn-primary">
            </form>
            <!-- Login form end here -->

            <p class="text-center">Create by - <a href="#">Ng Duc Thai</a> </p>
        </div>
    </body>
</html>

<?php 
    //Check whether the submit button is Clicked or not
    if(isset($_POST['submit'])){
        //Process for login
        //1. Get the Data from the login form
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        
        //2. sql to check whether the user with the username and password
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //3. Execute the query
        $res = mysqli_query($conn, $sql);

        //4. Count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count == 1){
            //header('Location:'.SITEURL.'admin/');
            echo "<script>  window.location='manage-admin.php';</script>";
            //Login Successfully
            $_SESSION['login'] = "<div class='success text-center'>Login Successfully.</div>";
             //Redirect to Home Page
             //
            $_SESSION['user'] = $username; 
            
            
            
        }else{
            //Redirect to Home Page
            echo "<script>  window.location='login.php';</script>";
            //User not available
            $_SESSION['login'] = "<div class='error text-center'>Username or password incorrect.</div>";
            
            
        }
    }
?>