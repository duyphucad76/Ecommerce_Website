<table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Order_Id</th>
                <th>Product_Id</th>
                <th>Qty</th>
                <th>Color</th>
                <th>Size</th>
                <th>Total</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $ord = new order_detail();
            $result = $ord->getAllOrderDetails();
            while ($set = $result->fetch()) {
            ?>
                <tr>
                    <td><?php echo $set['id'] ?></td>
                    <td><?php echo $set['order_id'] ?></td>
                    <td><?php echo $set['product_id'] ?></td>
                    <td><?php echo $set['quantity'] ?></td>
                    <td><?php echo $set['color'] ?></td>
                    <td><?php echo $set['size'] ?></td>
                    <td><?php echo $set['total'] ?></td>
                    <td><a href="index.php?action=admin&act=update_order_details&id=<?php echo $set['id'] ?>">Update</a></td>
                    <td><a href="index.php?action=admin&act=delete_order_details&id=<?php echo $set['id'] ?>">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>