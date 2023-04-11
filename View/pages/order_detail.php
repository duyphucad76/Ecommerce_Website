<div class="container">
    <?php
    if (isset($_SESSION['user'])) {
        $user = new user();
        $result = $user->checkUserEmail($_SESSION['user']['email']);
    } else {
        $cus = new customer();
        $result = $cus->checkCustomerEmail($_SESSION['customer']['email']);
    }
    ?>
    <h1>Bill to:</h1>
    <div class="row">
        <div class="col-6">
            <h3>Name</h3>
            <span><?php echo $result['name'] ?></span>
        </div>
        <div class="col-6">
            <h3>Address</h3>
            <span><?php echo $result['address'] ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <h3>Phone Number</h3>
            <span><?php echo $result['phone'] ?></span>
        </div>
        <div class="col-6">
            <h3>Email</h3>
            <span><?php echo $result['email'] ?></span>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>NO.</th>
                <th>PRODUCT DESCRIPTION</th>
                <th>PRICE</th>
                <th>QUANTITY</th>
                <th>SUBTOTAL</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            $no = 0;
            foreach ($_SESSION['order_item'] as $key => $item) {
                $total += $item['subTotal'];
            ?>
                <tr>
                    <td scope="row"><?php echo ++$no ?></td>
                    <td><?php echo "Name: " . $item['name'] . "<br>Size: " . $item['size'] . " - " . "Color: " . $item['color'] ?></td>
                    <td>$<?php echo $item['price'] ?>.00</td>
                    <td><?php echo $item['quantity'] ?></td>
                    <td>$<?php echo $item['subTotal'] ?>.00</td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="4">
                    <h1>Total</h1>
                </td>
                <td>
                    <h3>$<?php echo $total ?>.00</h3>
                </td>
            </tr>
        </tbody>
    </table>
</div>