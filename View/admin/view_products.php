    <table class="table">
        <thead>
            <tr>
                <th>ProId</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Image</th>
                <th>Description</th>
                <th>Qty</th>
                <th>Discount</th>
                <th>Rating</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $product = new product();
            $result = $product->getAllProduct('','','');
            while ($set = $result->fetch()) {
            ?>
                <tr>
                    <td><?php echo $set['id'] ?></td>
                    <td><?php echo $set['name'] ?></td>
                    <td><?php echo $set['brand'] ?></td>
                    <td><?php echo $set['price'] ?></td>
                    <td><img src="./Assets/images/products/<?php echo $set['image'] ?>" width="100px"></td>
                    <td><?php echo $set['detail'] ?></td>
                    <td><?php echo $set['quantity'] ?></td>
                    <td><?php echo $set['discount'] ?></td>
                    <td><?php echo $set['rating'] ?></td>
                    <td><a href="index.php?action=admin&act=update_product&id=<?php echo $set['id'] ?>">Update</a></td>
                    <td><a href="index.php?action=admin&act=delete_product&id=<?php echo $set['id'] ?>">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>