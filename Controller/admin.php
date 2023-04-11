<?php
$act = 'login';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'login':
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cdau = "GHT%H";
            $ccuoi = "&TUY9";
            $crypt = md5($cdau . $password . $ccuoi);
            $admin = new admin();
            $check = $admin->verifyAdmin($email, $crypt);
            if ($check !== false) {
                $_SESSION['admin'] = array();
                $_SESSION['admin']['email'] = $email;
                $_SESSION['admin']['password'] = $password;
                $_SESSION['admin']['role'] = $check['role'];
                echo "<script>
                alert('Login successful')
                location.href = 'index.php?action=admin&act=view_products'
                </script>";
            } else {
                echo "<script>alert('Login failed')</script>";
                include "View/admin/login.php";
            }
        }
        include "View/admin/login.php";
        break;
    case 'view_products':
        if (isset($_SESSION['admin'])) {
            include "View/admin/view_products.php";
        } else {
            echo "<script>alert('Vui long dang nhap de tiep tuc !!!')</script>";
            include "View/admin/login.php";
        }
        break;
    case 'view_categories':
        if (isset($_SESSION['admin'])) {
            include "View/admin/view_categories.php";
        } else {
            echo "<script>alert('Vui long dang nhap de tiep tuc !!!')</script>";
            include "View/admin/login.php";
        }
        break;
    case 'view_orders':
        if (isset($_SESSION['admin'])) {
            include 'View/admin/view_orders.php';
        } else {
            include 'View/admin/login.php';
        }
        break;
    case 'view_order_details':
        if (isset($_SESSION['admin'])) {
            include 'View/admin/view_order_details.php';
        } else {
            include 'View/admin/login.php';
        }
        break;
    case 'new_product':
        if (isset($_SESSION['admin'])) {
            if (isset($_POST['submit'])) {
                $val = new Validate();
                $error = array();
                if (!$val->minPrice($_POST['price'])) {
                    $error['price'] = "Gia san pham phai lon hon 0";
                }

                if (count($error) > 0) {
                    include 'View/admin/new_product.php';
                } else {
                    $name = $_POST['name'];
                    $brand = $_POST['brand'];
                    $price = $_POST['price'];
                    $rating = $_POST['rating'];
                    $discount = $_POST['discount'];
                    $image = $_FILES['image']['name'];
                    $detail = $_POST['detail'];
                    $quantity = $_POST['quantity'];
                    $admin = new admin();
                    $check = $admin->addNewProduct($name, $brand, $price, $image, $detail, $quantity, $discount, $rating);
                    if ($check !== false) {
                        $admin->uploadImage();
                        echo "<script>alert('Them san pham thanh cong')</script>";
                        include "View/admin/view_products.php.php";
                    } else {
                        echo "<script>alert('Them san pham k thanh cong')</script>";
                        include "View/admin/new_product.php";
                    }
                }
            }
            include "View/admin/new_product.php";
        } else {
            echo "<script>alert('Vui long dang nhap de tiep tuc !!!')</script>";
            include "View/admin/login.php";
        }
        break;
    case 'delete_product':
        try {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            $admin = new admin();
            $admin->deleteProductById($id);
            echo '<script>alert("Delete successful")</script>';
            include "View/admin/login.php";
        } catch (\Exception $e) {
            return $e;
        }
        break;
    case 'update_product':
        if (isset($_SESSION['admin'])) {
            if (isset($_POST['update'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $brand = $_POST['brand'];
                $price = $_POST['price'];
                $image = $_FILES['image']['name'];
                $detail = $_POST['detail'];
                $quantity = $_POST['quantity'];
                $discount = $_POST['discount'];
                $rating = $_POST['rating'];
                $admin = new admin();
                $check = $admin->updateProductById($id, $name, $brand, $price, $image, $detail, $quantity, $discount, $rating);
                if ($check !== false) {
                    $admin->uploadImage();
                    echo "<script>alert('Update thanh cong')</script>";
                    include "View/admin/view_products.php";
                } else {
                    echo "<script>alert('Update k thanh cong')</script>";
                    include "View/admin/update_product.php";
                }
            }
            include "View/admin/update_product.php";
        } else {
            echo "<script>alert('Vui long dang nhap de tiep tuc !!!')</script>";
            include "View/admin/login.php";
        }
        break;
    case 'new_category':
        if (isset($_SESSION['admin'])) {
            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $admin = new admin();
                $admin->addNewCategory($name);
                echo "
                <script>
                alert('Add new category successful')
                location.href = 'index.php?action=admin&act=view_categories'
                </script>";
            } else if (isset($_POST['submit_file'])) {
                $file = $_FILES["file"]["tmp_name"];
                file_put_contents($file, str_replace("\xEF\xBB\xBF", "", file_get_contents($file)));
                $file_open = fopen($file, "r");
                $admin = new admin();
                while (($csv = fgetcsv($file_open, 1000, ",")) !== false) {
                    $id = $csv[0];
                    $name = $csv[1];
                    $admin->addNewCategory($name);
                }
                echo "<script>alert('Import Successful')
                location.href='index.php?action=admin&act=view_categories'</script>";
            }
            include "View/admin/new_category.php";
        } else {
            echo "<script>alert('Vui long dang nhap de tiep tuc !!!')</script>";
            include "View/admin/login.php";
        }
        break;
    case 'delete_category':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $admin = new admin();
        $check = $admin->deleteCategoryById($id);
        if ($check !== false) {
            echo '<script>alert("Delete successful")
                location.href = "index.php?action=admin&act=view_categories"</script>';
        } else {
            echo '<script>alert("Delete failed")
                    location.href = "index.php?action=admin&act=view_categories"</script>';
        }
        break;
    case 'update_category':
        if (isset($_SESSION['admin'])) {
            if (isset($_POST['update'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $cate = new admin();
                $check = $cate->updateCategoryById($id, $name);
                if ($check !== false) {
                    echo '<script>
                alert("Update Successful")
                location.href = "index.php?action=admin&act=view_categories"
                </script>';
                } else {
                    echo "<script>alert('Update failed')</script>";
                    include "View/admin/update_category.php";
                }
            }
            include "View/admin/update_category.php";
        } else {
            include 'View/admin/login.php';
        }
        break;
    case 'update_order':
        if (isset($_SESSION['admin'])) {
            if (isset($_POST['update'])) {
                $id = $_POST['id'];
                $user_id = $_POST['user_id'];
                $date = $_POST['date'];
                $total = $_POST['total'];
                $update = new admin();
                $check = $update->updateOrderById($id, $user_id, $date, $total);
                if ($check !== false) {
                    echo "<script>
                    alert('Update Successful');
                    location.href = 'index.php?action=admin&act=view_orders'
                    </script>";
                }
            }
            include 'View/admin/update_order.php';
        } else {
            include 'View/admin/login.php';
        }
        break;
    case 'delete_order':
        if (isset($_SESSION['admin'])) {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            $admin = new admin();
            $check = $admin->deleteOrderById($id);
            if ($check !== false) {
                echo '<script>alert("Delete successful")
                    location.href = "index.php?action=admin&act=view_orders"</script>';
            } else {
                echo '<script>alert("Delete failed")
                        location.href = "index.php?action=admin&act=view_orders"</script>';
            }
        } else {
            include 'View/admin/login.php';
        }
        break;
    case 'update_order_details':
        if (isset($_SESSION['admin'])) {
            if (isset($_POST['update'])) {
                $id = $_POST['id'];
                $order_id = $_POST['order_id'];
                $product_id = $_POST['product_id'];
                $quantity = $_POST['quantity'];
                $color = $_POST['color'];
                $size = $_POST['size'];
                $total = $_POST['total'];
                $update = new admin();
                $check = $update->updateOrderDetailsById($id, $order_id, $product_id, $quantity, $color, $size, $total);
                if ($check !== false) {
                    echo "<script>
                    alert('Update Successful');
                    location.href = 'index.php?action=admin&act=view_order_details'
                    </script>";
                }
            }
            include 'View/admin/update_order_details.php';
        } else {
            include 'View/admin/login.php';
        }
        break;
    case 'delete_order_details':
        if (isset($_SESSION['admin'])) {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            $admin = new admin();
            $check = $admin->deleteOrderDetailsById($id);
            if ($check !== false) {
                echo '<script>alert("Delete successful")
                        location.href = "index.php?action=admin&act=view_order_details"</script>';
            } else {
                echo '<script>alert("Delete failed")
                            location.href = "index.php?action=admin&act=view_order_details"</script>';
            }
        } else {
            include 'View/admin/login.php';
        }
        break;
    case 'view_users':
        if (isset($_SESSION['admin'])) {
            include 'View/admin/view_users.php';
        } else {
            include 'View/admin/login.php';
        }
        break;
    case 'update_user':
        if (isset($_SESSION['admin'])) {
            if (isset($_POST['update'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $password = $_POST['password'];
                $cdau = "GHT%H";
                $ccuoi = "&TUY9";
                $crypt = md5($cdau . $password . $ccuoi);
                $email = $_POST['email'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $update = new admin();
                $check = $update->updateUserById($id, $name, $crypt, $email, $address, $phone);
                if ($check !== false) {
                    echo "<script>
                    alert('Update Successful');
                    location.href = 'index.php?action=admin&act=view_users'
                    </script>";
                }
            }
            include 'View/admin/update_user.php';
        } else {
            include 'View/admin/login.php';
        }
        break;
    case 'delete_user':
        if (isset($_SESSION['admin'])) {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            $admin = new admin();
            $check = $admin->deleteUserById($id);
            if ($check !== false) {
                echo '<script>alert("Delete successful")
                        location.href = "index.php?action=admin&act=view_users"</script>';
            } else {
                echo '<script>alert("Delete failed")
                            location.href = "index.php?action=admin&act=view_users"</script>';
            }
        } else {
            include 'View/admin/login.php';
        }
        break;
    case 'logout':
        unset($_SESSION['admin']);
        echo '<script>
        alert("Logout Successful !!!")
        location.href="index.php?action=admin&act=login"
        </script>';
        break;
}
