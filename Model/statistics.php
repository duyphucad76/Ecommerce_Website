<?php
    class statistics {
        public function getStatistics() {
            $db = new connect();
            $select = "SELECT p.name, SUM(od.quantity) as qty FROM `products` p,`order_detail` od, orders o WHERE p.id = od.product_id and quarter(o.created_at) = 1 and o.id = od.order_id GROUP BY p.name;";
            $result = $db->getList($select);
            return $result;
        }
    }
?>