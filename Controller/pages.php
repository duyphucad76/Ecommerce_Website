<?php
$act = '';
isset($_GET['act']) && $act = $_GET['act'];
switch ($act) {
    case 'shop':
        include 'View/pages/shop.php';
        break;
    case 'blog':
        include 'View/pages/blog.php';
        break;
    case 'about':
        include 'View/pages/about.php';
        break;
    default:
        include 'View/pages/home.php';
        break;
}
