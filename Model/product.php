<?php
class product
{
    public function __construct()
    {
    }
    public function getProductNew()
    {
        $db = new connect();
        $select = "SELECT * FROM products ORDER BY ID DESC LIMIT 8";
        $result = $db->getList($select);
        return $result;
    }
    public function getAllProduct($sort_by, $category_id, $search_input)
    {
        $db = new connect();
        if (empty($sort_by) && empty($category_id) && empty($search_input)) {
            $select = "SELECT * FROM products";
        } else if (empty($category_id) && empty($search_input)) {
            $select = "SELECT * FROM products ORDER BY price $sort_by";
        } else if (empty($sort_by) && empty($search_input)) {
            $select = "SELECT * FROM products WHERE category_id = $category_id";
        } else {
            $select = "SELECT * FROM `products` WHERE category_id = $category_id ORDER by price $sort_by;";
        }
        $result = $db->getList($select);
        return $result;
    }
    public function getProductById($id)
    {
        $db = new connect();
        $select = "SELECT * FROM products WHERE id = $id";
        $result = $db->getSingle($select);
        return $result;
    }
    public function getTableData($table)
    {
        $db = new connect();
        $select = "SELECT * FROM $table";
        $result = $db->getList($select);
        return $result;
    }
    public function getSingleDataById($table, $id)
    {
        $db = new connect();
        $select = "SELECT * FROM $table WHERE id = $id";
        $result = $db->getSingle($select);
        return $result;
    }
    public function updateRatingProductById($product_id, $rating)
    {
        $db = new connect();
        $query = "UPDATE `products` SET `rating`='$rating' WHERE id = $product_id";
        $db->exec($query);
    }
}
