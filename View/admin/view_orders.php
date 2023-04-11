<table class="table">
        <thead>
            <tr>
                <th>Order_Id</th>
                <th>User_Id</th>
                <th>Date</th>
                <th>Total</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $order = new admin();
            $result = $order->getAllOrders();
            while ($set = $result->fetch()) {
            ?>
                <tr>
                    <td><?php echo $set['id'] ?></td>
                    <td><?php echo $set['user_id'] ?></td>
                    <td><?php echo $set['date'] ?></td>
                    <td><?php echo $set['total'] ?></td>
                    <td><a href="index.php?action=admin&act=update_order&id=<?php echo $set['id'] ?>">Update</a></td>
                    <td><a href="index.php?action=admin&act=delete_order&id=<?php echo $set['id'] ?>">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>