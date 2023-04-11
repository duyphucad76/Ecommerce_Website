<?php
class reviews
{
    public function addNewReview($user_id, $product_id, $comment, $rating)
    {
        $db = new connect();
        $query = "INSERT INTO `reviews`(`user_id`, `product_id`, `comment`, `rating`) VALUES ($user_id,$product_id,'$comment',$rating)";
        $db->exec($query);
    }
    public function getAllReviewsByProductId($id) {
        $db = new connect();
        $select = "SELECT * FROM `reviews` WHERE product_id = $id";
        $result = $db->getList($select);
        return $result;
    }
    public function getAllRating($id_product) {
        $db = new connect();
        $select = "SELECT * FROM `reviews` WHERE product_id = $id_product";
        $result = $db->getList($select);
        return $result;
    }
}
