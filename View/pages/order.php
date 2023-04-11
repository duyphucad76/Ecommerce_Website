<div class="container pt-5">
    <?php
    $order = new order();
    $result = $order->getNewOrder();
    ?>
    <div class="row">
        <div class="col-9"><img src="./Assets/images/logo.png" alt="Logo"></div>
        <div class="col-3">
            <div>
                <p align="right">Invoice INV#<?php echo $result['id'] ?></p>
                <p align="right">Invoice Date: <?php echo $result['date'] ?></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <ul style="list-style: none;">
                <li>Cara Shop</li>
                <li>12 Trinh Dinh Thao</li>
                <li>HCM VN</li>
            </ul>
        </div>
        <?php
        if (isset($_SESSION['user'])) {
            $user = new user();
            $set = $user->checkUserEmail($_SESSION['user']['email']);
        } else {
            $cus = new customer();
            $set = $cus->checkCustomerEmail($_SESSION['customer']['email']);
        }
        ?>
        <div class="col-6">
            <ul style="list-style: none;">
                <li><?php echo $set['name'] ?></li>
                <li><?php echo $set['address'] ?></li>
                <li>HCM VN</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead>
                <th>OrderId</th>
                <th>Status</th>
                <th>Amount</th>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $result['id'] ?></td>
                    <td></td>
                    <td>$<?php echo number_format($result['total'], 2) ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Total: $<?php echo number_format($result['total'], 2) ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Amount Paid: $<?php echo number_format($result['total'], 2) ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Balance: <?php echo '$0.00' ?></td>
                </tr>
                <tr>
                    <td cols="3">
                        <a href="index.php?action=order&act=order_detail">
                            <button class="normal" style="color: white; background-color: #088178">Order Detail</button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>