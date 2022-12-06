 <?php include('partials/menu.php') ?>
 <blockquote>
	<img src="../bookstore/image/logo.png">
	<input class="hi" style="float: right; margin: 2%;" type="button" name="cancel" value="Home" onClick="window.location='../bookstore/index.php';" />
</blockquote>
        
        <!-- Menu Section ends -->

        <!-- Main content Section Starts-->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>
                <br>

                <?php
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];  //Displaying Session Message
                        unset($_SESSION['add']);//Removing Session Message
                    }
                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                    if(isset($_SESSION['user-not-found'])){
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                    }
                    if(isset($_SESSION['pwd-not-found'])){
                        echo $_SESSION['pwd-not-found'];
                        unset($_SESSION['pwd-not-found']);
                    }
                    if(isset($_SESSION['change-pwd'])){
                        echo $_SESSION['change-pwd'];
                        unset($_SESSION['change-pwd']);
                    }
                ?>
                <br><br>

                <!-- Button ot Add Admin -->
                <a href="add-admin.php" class="btn-primary">Add Admin</a>

                <br> <br>
                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>

                    </tr>

                    <?php
                        //Query to get add admin
                        $sql = "SELECT * FROM `tbl_admin`";
                        //Execute the Query
                        $res = mysqli_query($conn, $sql);
                        //Check whether the Query is Executed or not
                        if($res == TRUE){
                            // Count Rows to Check whether we have data in database or not
                            $count = mysqli_num_rows($res); //Fuction to get all the rows in database
                            $sn =1; //Create a variable and assign the value
                            
                            //Check the num of rows
                            if($count > 0){
                                //Have data in database
                                while($row = mysqli_fetch_assoc($res)){
                                    //Using While loop to get all the data from the database
                                    //And while loop will run as long as we have data in database

                                    //Get individual data
                                    $id = $row['id'];
                                    $full_name = $row['full_name'];
                                    $username = $row['username'];
                                    //Display the Values in our table
                                    ?>
                                        <tr>
                                            <td><?php echo $sn++; ?>.</td>
                                            <td><?php echo $full_name; ?></td>
                                            <td><?php echo $username; ?></td>
                                            <td>
                                                <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a> 
                                                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a> 
                                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a> 
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }else{
                                //Do not have data in database

                            }
                        }
                    ?>

                </table>

            </div>
        </div>
        <!-- Main content Section Ends -->

        <!-- Footer Section Starts -->
<?php include('partials/footer.php') ?>