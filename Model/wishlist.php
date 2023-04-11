<?php
class wishlist{
    public function addToWishlist($id)
    {
        $item = new product();
        $pros = $item->getProductById($id);
        $name = $pros['name'];
        $image = $pros['image'];
        $brand = $pros['brand'];
        $price = $pros['price'];
        $detail = $pros['detail'];
        $arr = array(
            'id' => $id,
            'name' => $name,
            'image' => $image,
            'brand' => $brand,
            'price' => $price,
            'detail' => $detail
        );
        array_unshift($_SESSION['wishlist'], $arr);
    }
    public function deleteItem($idx) {
        unset($_SESSION['wishlist'][$idx]);
    }
}
