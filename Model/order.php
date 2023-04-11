<?php
class order
{
    function insertOrder($user_id, $date, $total)
    {
        $db = new connect();
        $query = "INSERT INTO `orders`(`user_id`, `date`, `total`) VALUES ($user_id,'$date',$total)";
        $db->exec($query);
    }
    public function insertCustomerOrder($cus_id, $date, $total) {
        $db = new connect();
        $query = "INSERT INTO `orders`(`customer_id`, `date`, `total`) VALUES ($cus_id,'$date',$total)";
        $db->exec($query);
    }
    function getNewOrder()
    {
        $db = new Connect();
        $select = "SELECT * FROM orders ORDER BY id DESC LIMIT 1";
        return $db->getSingle($select);
    }
    function getOrderById($id) {
        $db = new connect();
        $select = "SELECT * FROM orders WHERE id = $id";
        return $db->getSingle($select);
    }
}
