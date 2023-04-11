<?php
if (!isset($_SESSION['wishlist']) || count($_SESSION['wishlist']) == 0) {
    echo "<h3 class='ml-5 pt-5'>WISHLIST IS EMPTY. <a href='index.php?action=product'>GO TO SHOP</a></h3>";
} else {
?>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Image</th>
                <th>Details</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['wishlist'] as $key => $value) {
            ?>
                <tr>
                    <td scope="row"><?php echo $key ?></td>
                    <td><?php echo $value['name'] ?></td>
                    <td><img src="Assets/images/products/<?php echo $value['image'] ?>" alt="Image" width="150px"></td>
                    <td><?php echo $value['detail'] ?></td>
                    <td><a href="index.php?action=wishlist&act=delete&id=<?php echo $key ?>"><button class="btn btn-danger">Delete</button></a></td>
                    <td><a href="index.php?action=cart&act=cart&id=<?php echo $value['id'] ?>"><button class="btn btn-primary">Add To Cart</button></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>