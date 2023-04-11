<?php
    class connect{
        //thuoc tinh
        var $db = null;
        //pdo(dsn, user, pass)
        public function __construct(){
            $dsn = 'mysql:host=localhost;dbname=ecommerce_website';
            $user = 'root';
            $pass = '';
            // $dsn = 'mysql:host=localhost;dbname=id20523335_ecommerce_website';
            // $user = 'id20523335_carashoponline';
            // $pass = '>!|k27-!~mJ-&/mN';
            try {
                $this->db = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
            } catch (\Throwable $th) {
                echo "Failed to connect";
                echo $th;
            }
        }
        //Thuc hien cau truy van: query
        //THuc hien cau lenh Insert, update, delete: exec
        public function getList($select) {
            $result = $this->db->query($select);
            return $result;
        }
        
        public function getSingle($select) {
            $result = $this->db->query($select);
            $result = $result->fetch();
            return $result;
        }
        public function exec($query) {
            return $this->db->exec($query);
        }
    }

?>
