<?php
$act = 'cart';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
switch ($act) {
    case 'cart':
        // if (!isset($_SESSION['user']) || count($_SESSION['user']) == 0) {
        //     echo "<script>alert('Sign in to continue')
        //     location.href='index.php?action=user&act=view_login'
        //     </script>";
        // } else {
        if (isset($_POST['id']) || isset($_GET['id'])) {
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $quantity = $_POST['quantity'];
                $color = $_POST['color'];
                $size = $_POST['size'];
            } else {
                $id = $_GET['id'];
                $quantity = 1;
                $table = new product();
                $result = $table->getSingleDataById("colors", 1);
                $color = $result['name'];
                $result = $table->getSingleDataById("sizes", 1);
                $size = $result['size'];
            }
            $Scart = new cart();
            $Scart->addToCart($id, $quantity, $color, $size);
        }
        // }
        include 'View/pages/cart.php';
        break;
    case 'update':
        if (isset($_POST['quantity'])) {
            $new_arr = $_POST['quantity'];
            foreach ($new_arr as $key => $sl) {
                if ($_SESSION['cart'][$key]['quantity'] != $sl) {
                    $cart = new cart();
                    $cart->updateItems($key, $sl);
                }
            }
        }
        include 'View/pages/cart.php';
        break;
    case 'delete':
        if (isset($_GET['id'])) {
            $idx = $_GET['id'];
            $cart = new cart();
            $cart->deleteItem($idx);
        }
        //Refesh lại trang web để cập nhật số lượng giỏ hàng
        header("Refresh:0, url=index.php?action=cart");
        break;
    case 'payment':
        if (!isset($_SESSION['user'])) {
            echo "<script>alert('Please log in to continue')
            location.href='index.php?action=user'
            </script>";
        } else {
            include 'View/pages/vnpay_php/index.php';
        }
        break;
}
