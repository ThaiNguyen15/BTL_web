<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage User</h1>

        <?php
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
        <br>

        <br><br>
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

            <?php
                $sql = "SELECT * FROM `users`";
                $res = mysqli_query($conn, $sql);
                if($res == TRUE){
                    $count = mysqli_num_rows($res);
                    $sn =1;
                    
                    if($count > 0){
                        while($row = mysqli_fetch_assoc($res)){

                            $id = $row['UserID'];
                            $username = $row['UserName'];
                            ?>
                                <tr>
                                    <td><?php echo $sn++; ?>.</td>
                                    <td><?php echo $username; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-pw-user.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a> 
                                        <a href="<?php echo SITEURL; ?>admin/update-user.php?id=<?php echo $id; ?>" class="btn-secondary">Update User</a> 
                                        <a href="<?php echo SITEURL; ?>admin/delete-user.php?id=<?php echo $id; ?>" class="btn-danger">Delete User</a> 
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