<?php
$act = 'statistics';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'statistics':
        include "View/admin/statistics.php";
        break;
}
