<?php
class admin
{
    public function verifyAdmin($email, $password)
    {
        $db = new connect();
        $select = "select * from admin where email = '$email' and password = '$password'";
        return $db->getSingle($select);
    }
    public function updateAdmin($email, $password)
    {
        $db = new connect();
        $query = "UPDATE `admin` SET `password`='$password' WHERE email = '$email'";
        $db->exec($query);
    }
    public function getEmailAdmin($email)
    {
        $db = new connect();
        $select = "SELECT * FROM admin WHERE email = '$email'";
        return $db->getSingle($select);
    }
    public function addNewProduct($name, $brand, $price, $image, $detail, $quantity, $discount, $rating)
    {
        $db = new connect();
        $query = "INSERT INTO `products`(`name`, `brand`, `price`, `discount`, `rating`, `image`, `quantity`, `detail`) 
        VALUES ('$name','$brand',$price,$discount,$rating,'$image',$quantity,'$detail')";
        $db->exec($query);
    }
    public function updateProductById($id, $name, $brand, $price, $image, $detail, $quantity, $discount, $rating)
    {
        $db = new connect();
        $query = "UPDATE `products` 
        SET `name`='$name',`brand`='$brand',`price`=$price,`discount`=$discount,
        `rating`=$rating, `image`='$image',`quantity`=$quantity,`detail`='$detail'
        WHERE id = $id";
        $db->exec($query);
    }

    public function deleteProductById($id)
    {
        $db = new connect();
        $query = "DELETE FROM `products` WHERE id = $id;";
        $db->exec($query);
    }

    public function addNewCategory($categoryName)
    {
        $db = new connect();
        $query = "INSERT INTO `categories`(`name`) VALUES ('$categoryName')";
        $db->exec($query);
    }
    public function deleteCategoryById($id)
    {
        $db = new connect();
        $query = "DELETE FROM `categories` WHERE id = $id;";
        $db->exec($query);
    }
    public function updateCategoryById($id, $name)
    {
        $db = new connect();
        $query = "UPDATE `categories` SET `name` = '$name' WHERE `id` = $id";
        $db->exec($query);
    }
    public function uploadImage()
    {
        //tạo đường dânc chữa hình lấy từ server về
        $target_dir = "Assets/images/products/";
        //B1: lấy tên hình về để vào đường dẫn vừa tạo
        // "Content/imagetourdien/giaycongso.jpg
        $target_file = $target_dir . basename($_FILES['image']['name']);
        // b2: lấy phần mở rộng// .jpg
        $targetFiletype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // b3: kiểm tra xem là hình có thật sự ở trên server hay không
        $uploadhinh = 1;
        if (isset($_POST["update"])) {
            $check = getimagesize($_FILES['image']['tmp_name']);
            if ($check !== false) {

                $uploadhinh = 1;
            } else {
                $uploadhinh = 0;
                echo '<script> alert("Hình ko tồn tại");</script>';
            }
        }
        // kiểm tra hình tồn tại chưa
        if (file_exists($target_file)) {
            $uploadhinh = 0;
            echo '<script> alert("Hình tồn tại rồi");</script>';
        }
        // kiểm tra dung lượng của hình 500KB
        if ($_FILES['image']['size'] > 5000000) {
            $uploadhinh = 0;
            echo '<script> alert("Hình vượt quá dung lượng");</script>';
        }
        // kiểm tra có phải là hình hay không
        if ($targetFiletype != 'jpg' && $targetFiletype != 'png' && $targetFiletype != 'jpng' && $targetFiletype != 'gif') {
            $uploadhinh = 0;
            echo '<script> alert("Ko là hình");</script>';
        }
        if ($uploadhinh == 1) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                echo '<script> alert("upload hình thành công");</script>';
            } else {
                echo '<script> alert("upload hình ko thành công");</script>';
            }
        }
    }
    public function getAllOrders()
    {
        $db = new connect();
        $select = "SELECT * FROM orders";
        $result = $db->getList($select);
        return $result;
    }
    public function updateOrderById($id, $user_id, $date, $total)
    {
        $db = new connect();
        $query = "UPDATE `orders` SET `user_id` = $user_id,`date` = '$date',`total` = $total WHERE id = $id";
        $db->exec($query);
    }
    public function deleteOrderById($id)
    {
        $db = new connect();
        $query = "DELETE FROM `orders` WHERE id = $id;";
        $db->exec($query);
    }
    public function updateOrderDetailsById($id, $order_id, $product_id, $quantity, $color, $size, $total)
    {
        $db = new connect();
        $query = "UPDATE `order_detail` 
        SET `order_id`=$order_id,`product_id`=$product_id,`quantity`=$quantity,`color`='$color',`size`='$size',`total`=$total WHERE id = $id";
        $db->exec($query);
    }
    public function deleteOrderDetailsById($id)
    {
        $db = new connect();
        $query = "DELETE FROM `order_detail` WHERE id = $id";
        $db->exec($query);
    }
    public function updateUserById($id, $name, $password, $email, $address, $phone)
    {
        $db = new connect();
        $query = "UPDATE `users` SET `name`='$name',`password`='$password',`email`='$email',`address`='$address',`phone`='$phone' WHERE id = $id";
        $db->exec($query);
    }
    public function deleteUserById($id)
    {
        $db = new connect();
        $query = "DELETE FROM `users` WHERE id = $id";
        $db->exec($query);
    }
}
