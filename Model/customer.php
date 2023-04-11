<?php
class customer
{
    public function checkCustomerEmail($email)
    {
        $db = new connect();
        $select = "SELECT * FROM customers WHERE email = '$email'";
        $result = $db->getSingle($select);
        return $result;
    }
    public function addNewCustomer($name, $email, $address, $phone)
    {
        $db = new connect();
        $query = "INSERT INTO `customers`(`name`, `email`, `address`, `phone`) VALUES ('$name','$email','$address','$phone')";
        $db->exec($query);
    }
}
