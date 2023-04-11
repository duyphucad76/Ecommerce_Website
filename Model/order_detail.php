<?php
class order_detail {
    function insertOrderDetail($order_id, $product_id, $quantity, $color, $size, $subtotal) {
        $db = new connect();
        $query = "INSERT INTO `order_detail`(`order_id`, `product_id`, `quantity`, `color`, `size`, `total`) 
        VALUES ($order_id, $product_id, $quantity, '$color', $size, $subtotal)";
        $db->exec($query);
    }
    function getAllOrderDetails() {
        $db = new connect();
        $select = "SELECT * FROM `order_detail`";
        $result = $db->getList($select);
        return $result;
    }
    function getOrderDetailById($id) {
        $db = new connect();
        $select = "SELECT * FROM `order_detail` WHERE `id` = $id";
        return $db->getSingle($select);
    }
}
