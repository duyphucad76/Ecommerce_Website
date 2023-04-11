<div class="row col-md-4 col-md-offset-4">
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $order = new order();
        $result = $order->getOrderById($id);
    }
    ?>
    <form action="index.php?action=admin&act=update_order" method="post" enctype="multipart/form-data">
        <table class="table" style="border: 0px;">
            <tr>
                <td>Order_Id</td>
                <td> <input type="text" class="form-control" name="id" value="<?php echo $id ?>" readonly /></td>
            </tr>
            <tr>
                <td>User_Id</td>
                <td><input type="text" class="form-control" name="user_id" value="<?php echo $result['user_id'] ?>" maxlength="100px" readonly></td>
            </tr>
            <tr>
                <td>Date</td>
                <td><input type="date" class="form-control" name="date" value="<?php echo $result['date'] ?>">
                </td>
            </tr>
            <tr>
                <td>Total</td>
                <td><input type="number" class="form-control" name="total" value="<?php echo $result['total'] ?>" readonly>
                </td>
            </tr>
            <?php if ($_SESSION['admin']['role'] == 3) { ?>
                <tr>
                    <td colspan="2">
                        <button type="submit" name="update" class="normal" style="background-color: #088178; color: white;"> Update</button>

                    </td>
                </tr>
            <?php } ?>
        </table>
    </form>
</div>