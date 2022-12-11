<?php include('partials/menu.php');
require_once "../bookstore/connectDB.php";

$stmt = $pdo->prepare("SELECT * FROM book");

$stmt->execute();

$result = $stmt->fetchAll();

$pdo = NULL;
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Books</h1>  
        
        <br>
        <a href="add_book.php" class="btn-primary">Add Book</a>
        <br> <br>
                <table class="tbl-full">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                
                    
                        <?php
                        foreach ($result  as $rs) {
                            echo "                        
                            <tr>
                                <td>$rs[BookID]</td>
                                <td>$rs[BookTitle]</td>
                                <td>$rs[Author]</td>
                                <td>$rs[Type]</td>
                                <td>$rs[Price]</td>
                                <td>
                                    <a href='edit_book.php?bookid=$rs[BookID]' class='btn-secondary'>Edit Book</a> 
                                    <a href='delete_book.php?bookid=$rs[BookID]' class='btn-danger'>Delete Book</a> 
                                </td>
                            </tr>";
                        }

                        ?>
            </table>
    </div>
</div>

<?php include('partials/footer.php') ?>
