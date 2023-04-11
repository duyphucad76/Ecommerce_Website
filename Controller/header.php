<?php
if (isset($_GET['action']) && ($_GET['action'] == 'admin' || $_GET['action'] == 'statistics')) {
    if (isset($_SESSION['admin'])) {
        include "View/admin/header.php";
        exit;
    }
} else {
    include 'View/components/header.php';
}
