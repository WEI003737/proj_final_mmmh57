<?php
require __DIR__. '/__connect_db.php';

if(!isset($_SESSION['customized'])){

    $_SESSION['customized'] = [];
};

$cus_sid = isset($_GET['cus_sid']) ? intval($_GET['cus_sid']) : 0;
$cus_qty = isset($_GET['cus_qty']) ? intval($_GET['cus_qty']) : 0;
$cus_size = isset($_GET['cus_size']) ? $_GET['cus_size'] : "";


if(!empty($cus_sid) and !empty($cus_qty) and !empty($cus_size)) {
    $_SESSION['customized']["cus_sid"] = $cus_sid;
    $_SESSION['customized']["cus_qty"] = $cus_qty;
    $_SESSION['customized']["cus_size"] = $cus_size;
}

header('Content-Type: application/json');
echo json_encode($_SESSION['customized']); //送關聯式陣列回來