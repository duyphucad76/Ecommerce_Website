<?php
$act = 'order';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'order':
        if (!isset($_SESSION['order_item'])) {
            $_SESSION['order_item'] = array();
            $_SESSION['order_item'] = $_SESSION['cart'];
        } else {
            $_SESSION['order_item'] = $_SESSION['cart'];
        }
        unset($_SESSION['cart']);
        if (isset($_SESSION['user'])) {
            $order = new order();
            $user_id = new user();
            $user_id = $user_id->checkUserEmail($_SESSION['user']['email']);
            $user_id = $user_id['id'];
            $date = date('Y-m-d');
            if (isset($_POST['confirm'])) {
                $total = $_POST['total'];
            }
            $order->insertOrder($user_id, $date, $total);
            $order_id = $order->getNewOrder()['id'];
            $order_detail = new order_detail();
            if (isset($_SESSION['order_item'])) {
                foreach ($_SESSION['order_item'] as $item) {
                    $product_id = $item['id'];
                    $quantity = $item['quantity'];
                    $color = $item['color'];
                    $size = $item['size'];
                    $subtotal = $item['subTotal'];
                    $order_detail->insertOrderDetail($order_id, $product_id, $quantity, $color, $size, $subtotal);
                }
            }
        } else {
            include 'View/pages/customer_order.php';
        }
        include "View/pages/order.php";
        break;
    case 'order_detail':
        include "View/pages/order_detail.php";
        break;
    case 'customer':
        if (isset($_POST['customer'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['telNo'];
            $address = $_POST['address'];
            $_SESSION['customer']['email'] = $email;
            $_SESSION['customer']['name'] = $name;
            $_SESSION['customer']['phone'] = $phone;
            $_SESSION['customer']['address'] = $address;
            $cus = new customer();
            $check = $cus->checkCustomerEmail($email);
            if (!$check) {
                $cus->addNewCustomer($name, $email, $address, $phone);
            } else {
                echo "<script>alert('Error')</script>";
            }
            $check = $cus->checkCustomerEmail($email);
            $cus_id = $check['id'];
            $date = date('Y-m-d');
            $total = $_POST['total'];
            $order = new order();
            $check = $order->insertCustomerOrder($cus_id, $date, $total);
            if ($check !== false) {
                echo "<script>alert('thanh cong')</script>";
            } else {
                echo "<script>alert('loi')</script>";
            }
            $order_id = $order->getNewOrder()['id'];
            $order_detail = new order_detail();
            if (isset($_SESSION['order_item'])) {
                foreach ($_SESSION['order_item'] as $item) {
                    $product_id = $item['id'];
                    $quantity = $item['quantity'];
                    $color = $item['color'];
                    $size = $item['size'];
                    $subtotal = $item['subTotal'];
                    $order_detail->insertOrderDetail($order_id, $product_id, $quantity, $color, $size, $subtotal);
                }
            }
        }
        include 'View/pages/order.php';
        break;
}
