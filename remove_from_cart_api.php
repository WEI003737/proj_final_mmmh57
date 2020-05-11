<?php
require __DIR__. '/__connect_db.php';


if(!isset($_SESSION['cart'])){

    $_SESSION['cart'] = [];
};

if(!isset($_SESSION['customized'])){

    $_SESSION['customized'] = [];
};

$cart_sid = isset($_GET['cart_sid']) ? intval($_GET['cart_sid']) : 0;
$cart_cus_sid = isset($_GET['cart_cus_sid']) ? intval($_GET['cart_cus_sid']) : 0;

if($cart_sid) {
    unset($_SESSION['cart'][$cart_sid]);
}
if($cart_cus_sid) {
    unset($_SESSION['customized'][$cart_cus_sid]);
}

//移除後重抓一次$_SESSION
//要跟公版 countCartObj()的 data 格式一樣才有辦法計算
$data["cart"]=$_SESSION['cart'];
$data["customized"]=$_SESSION['customized'];

header('Content-Type: application/json');
echo json_encode($data); //送關聯式陣列回來