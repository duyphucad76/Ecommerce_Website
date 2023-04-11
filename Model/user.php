<?php
class user
{
    public function __construct()
    {
    }
    function verifyUser($email, $password)
    {
        $db = new connect();
        $select = "SELECT * FROM users where email = '$email' and password = '$password'";
        return $db->getSingle($select);
    }
    function checkUserEmail($email)
    {
        $db = new connect();
        $select = "SELECT * FROM users WHERE email = '$email'";
        return $db->getSingle($select);
    }

    function addUser($name, $address, $telNo, $email, $password)
    {
        $db = new connect();
        $query = "INSERT INTO users(`name`, `password`, `email`, `address`, `phone`) 
        VALUES ('$name', '$password','$email','$address', '$telNo')";
        $db->exec($query);
        return $this->checkUserEmail($email);
    }
    function getUserById($id)
    {
        $db = new connect();
        $select = "SELECT * FROM users WHERE id = $id";
        return $db->getSingle($select);
    }
    public function getAllUsers()
    {
        $db = new connect();
        $select = "SELECT * FROM users";
        $result = $db->getList($select);
        return $result;
    }
    public function updateUserPassword($email, $password)
    {
        $db = new connect();
        $query = "UPDATE `users` SET `password`='$password' WHERE `email` = '$email'";
        $db->exec($query);
    }

    public function updateUserInformation($id, $fullname, $gender, $birthday, $email, $address, $mobile_number) {
        $db = new connect();
        $query = "UPDATE `users` SET `name`='$fullname',`email`='$email',`address`='$address',`phone`='$mobile_number' WHERE `id` = $id";
        $db->exec($query);
    }
}
