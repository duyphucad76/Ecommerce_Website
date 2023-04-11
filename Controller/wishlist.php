<?php
$act = 'view';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = array();
}
switch ($act) {
    case 'view':
        include 'View/pages/wishlist.php';
        break;
    case 'add_to_wishlist':
        if (!isset($_SESSION['user']) || count($_SESSION['user']) == 0) {
            echo "<script>alert('Sign in to continue')
            location.href='index.php?action=user&act=view_login'
            </script>";
        } else {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                foreach ($_SESSION['wishlist'] as $key => $value) {
                    if ($value['id'] == $id) {
                        echo "<script>
                alert('Product already exists !!!')
                location.href='index.php?action=product&act=detail&id=$id'
                </script>";
                        break 2;
                    }
                }
                $pro = new product();
                $result = $pro->getProductById($id);
                $wishlist = new wishlist();
                $check = $wishlist->addToWishlist($id);
                if ($check !== false) {
                    echo "<script>
                alert('Add to Wishlist Successful !!!')
                location.href='index.php?action=wishlist'
                </script>";
                } else {
                    echo "<script>
                alert('Add to Wishlist Failed !!!')
                location.href='index.php?action=product&act=detail&id=$id'
                </script>";
                    break;
                }
            }
        }
        include "View/pages/wishlist.php";
        break;
    case 'delete':
        if (isset($_GET['id'])) {
            $idx = $_GET['id'];
            $wishlist = new wishlist();
            $check = $wishlist->deleteItem($idx);
            if ($check !== false) {
                echo '<script>alert("Delete Item Successful")
                location.href="index.php?action=wishlist"
                </script>';
            } else {
                echo '<script>alert("Delete Item Failed")
                location.href="index.php?action=wishlist"
                </script>';
            }
        }
        break;
}
