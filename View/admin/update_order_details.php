<div class="row col-md-4 col-md-offset-4">
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $order = new order_detail();
        $result = $order->getOrderDetailById($id);
    }
    ?>
    <form action="index.php?action=admin&act=update_order" method="post" enctype="multipart/form-data">
        <table class="table" style="border: 0px;">
            <tr>
                <td>Id</td>
                <td> <input type="text" class="form-control" name="id" value="<?php echo $id ?>" readonly /></td>
            </tr>
            <tr>
                <td>Order_Id</td>
                <td> <input type="text" class="form-control" name="order_id" value="<?php echo $result['order_id'] ?>" readonly /></td>
            </tr>
            <tr>
                <td>Product_Id</td>
                <td><input type="text" class="form-control" name="product_id" value="<?php echo $result['product_id'] ?>" maxlength="100px" readonly></td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td><input type="number" class="form-control" name="quantity" value="<?php echo $result['quantity'] ?>">
                </td>
            </tr>
            <tr>
                <td>Color</td>
                <td> <input type="text" class="form-control" name="color" value="<?php echo $result['color'] ?>" /></td>
            </tr>
            <tr>
                <td>Size</td>
                <td> <input type="text" class="form-control" name="size" value="<?php echo $result['size'] ?>" /></td>
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