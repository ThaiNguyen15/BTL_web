<?php 
include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1> 
        <br>              
                <table class="tbl-full">
                    <tr>
                        <th>Customer</th>
                        <th>BookID</th>
                        <th>Book Name</th>
                        <th>Time</th>
                        <th>Quantity</th>
                        <th>Price($)</th>
                        <th>Total($)</th>
                    </tr>
                    <?php 
                        $query1 = mysqli_query($conn,"SELECT DISTINCT CustomerID FROM `order`");
                        while($cus_order = mysqli_fetch_array($query1)){
                            $query2 = mysqli_query($conn, "SELECT * FROM `order` WHERE CustomerID = {$cus_order['CustomerID']}");
                            $query3 = mysqli_query($conn,"SELECT * FROM `customer` WHERE CustomerID = {$cus_order['CustomerID']}");
                            $cus_name = mysqli_fetch_array($query3);
                            $count = 0;
                            while($order = mysqli_fetch_array($query2)){
                                $query4 = mysqli_query($conn,"SELECT * FROM `book` WHERE BookID = '{$order['BookID']}'");
                                $book = mysqli_fetch_array($query4);
                    ?>      
                                <tr>
                                    <td>
                                        <?php if($count ==0)
                                            echo $cus_name["CustomerName"]; 
                                        ?>
                                    </td>
                                    <td><?php echo $order["BookID"]; ?></td>
                                    <td><?php echo $book["BookTitle"]; ?></td>
                                    <td><?php echo $order["DatePurchase"]; ?></td>
                                    <td><?php echo $order["Quantity"]; ?></td>
                                    <td><?php echo $book["Price"]; ?></td>
                                    <td><?php echo $order["TotalPrice"]; ?></td>
                                </tr>
                                <?php $count = 1; ?>
                            <?php } ?>
                            <th></th>
                        <?php } ?>
                        
                    
                </table>
    </div>
</div>
<?php include('partials/footer.php') ?>