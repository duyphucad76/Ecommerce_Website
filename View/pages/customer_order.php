<div class="container pt-5 pb-5">
    <h2>Customer Order</h2>
    <form action="index.php?action=order&act=customer" method="post">
        <div class="row">
            <div class="col-5">
                <label for="name" class="d-block">Name</label>
                <input type="text" class="d-block mb-2 pb-1 pt-1 w-100 pl-4 rounded-pill" name="name">
                <span class="msg-error text-danger"><?php echo isset($err['name']) ? $err['name'] : '' ?></span>

                <label for="address" class="d-block">Address</label>
                <input type="text" class="d-block mb-2 pb-1 w-100 pl-2 pl-4 pt-1 rounded-pill" name="address">
                <span class="msg-error text-danger"><?php echo isset($err['address']) ? $err['address'] : '' ?></span>

                <label for="Email" class="d-block">Email</label>
                <input type="text" class="d-block mb-2 pb-1 w-100 pl-2 pl-4 pt-1 rounded-pill" name="email">
                <span class="msg-error text-danger"><?php echo isset($err['email']) ? $err['email'] : '' ?></span>

                <label for="telNo" class="d-block">Tel Number</label>
                <input type="text" class="d-block mb-2 pb-1 w-100 pl-2 pl-4 pt-1 rounded-pill" name="telNo">
                <span class="msg-error text-danger"><?php echo isset($err['phone']) ? $err['phone'] : '' ?></span>
            </div>
            <div class="col-7">
                <table class="table table-hover">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Subtotal</th>
                    </tr>
                    <?php
                    $total = 0;
                    foreach ($_SESSION['order_item'] as $key => $item) {
                        $total += $item['subTotal'];
                    ?>
                        <tr>
                            <input type="hidden" name="total" value="<?php echo $total ?>">
                            <td><img src="./Assets/images/products/<?php echo $item['image'] ?>" alt="" width="150px"></td>
                            <td><?php echo $item['name'] ?></td>
                            <td><?php echo $item['subTotal'] ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="2">Total: </td>
                        <td>
                            <?php echo $total ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <button type="submit" name="customer" class="normal" style="background-color: #088178; color: white;">Order</button>
    </form>
</div>