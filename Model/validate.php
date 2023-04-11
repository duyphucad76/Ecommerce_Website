<?php
    class validate {
        function check_name($str) {
            $str = str_split($str);
            return (count($str) >= 2 && count($str) <=30) ? false : true;
        }

        function check_address($str) {
            $str = str_split($str);
            return (count($str) >= 10 && count($str) <=50) ? false : true;
        }
        
        function check_phone($str) {
            return preg_match('/^[0-9]{10}+$/', $str) ? false : true;
        }

        function check_username($str) {
            $str = str_split($str);
            return (count($str) > 8) ? false : true;
        }

        function check_email($str) {
            return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? true : false;
        }

        function minLenPass($pass)
        {
            return count(str_split($pass)) >= 8 ? false : true;
        }

        function confPass($pass, $confPass)
        {
            return $pass === $confPass ? false : true;
        }
        function minPrice($price) {
            return $price <= 0 ? false : true;
        }
    }
?>