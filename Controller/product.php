<?php
$act = 'shop';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'shop':
        if (isset($_POST['submit'])) {
            $option = $_POST['option'];
            $category_id = $_POST['category_id'];
            $search_input = $_POST['search_input'];
            $pro = new product();
            $pro->getAllProduct($option, $category_id, $search_input);
        }
        include 'View/pages/shop.php';
        break;
    case 'detail':
        include 'View/pages/sproduct.php';
        break;
}
