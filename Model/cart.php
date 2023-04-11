<?php
class cart
{
    public function addToCart($id, $quantity, $color, $size)
    {
        $sl = 0;
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $id && $item['size'] == $size && $item['color'] == $color) {
                $sl = $item['quantity'];
                unset($_SESSION['cart'][$key]);
                break;
            }
        }
        $item = new product();
        $pros = $item->getProductById($id);
        $name = $pros['name'];
        $image = $pros['image'];
        $brand = $pros['brand'];
        $price = $pros['price'];
        $quantity += $sl;
        $subTotal = $quantity * $pros['price'];
        $arr = array(
            'id' => $id,
            'name' => $name,
            'image' => $image,
            'brand' => $brand,
            'price' => $price,
            'quantity' => $quantity,
            'size' => $size,
            'color' => $color,
            'subTotal' => $subTotal,
        );
        array_unshift($_SESSION['cart'], $arr);
    }
    public function deleteItem($idx) {
        unset($_SESSION['cart'][$idx]);
    }
    public function updateItems($idx, $qty) {
        if($qty <= 0) {
            $this->deleteItem($idx);
        } else {
            $_SESSION['cart'][$idx]['quantity'] = $qty;
            $subTotal = $qty * $_SESSION['cart'][$idx]['price'];
            $_SESSION['cart'][$idx]['subTotal'] = $subTotal;
        }
    }
}
