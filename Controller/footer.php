<?php
if (isset($_GET['action']) && $_GET['action'] == 'admin') {
    if (isset($_SESSION['admin'])) {
        include "View/admin/footer.php";
        exit;
    }
} else {
    include 'View/components/footer.php';
}
