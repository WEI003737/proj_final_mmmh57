<?php
require __DIR__. '/__connect_db.php';

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
};

//sid 是 size 的 sid 才能判斷庫存
$cart_sid = isset($_GET['cart_sid']) ? intval($_GET['cart_sid']) : 0;
$cart_qty = isset($_GET['cart_qty']) ? intval($_GET['cart_qty']) : 0;
$cart_color = isset($_GET['cart_color']) ? intval($_GET['cart_color']) : '';

if(! empty($cart_sid)){

//判斷有沒有該樣商品 & 商品有沒有貨???????????????????????????????????????????????
    if(!empty($cart_qty))
    $_SESSION['cart'][$cart_sid] = $cart_qty;
}else {
    unset($_SESSION['cart'][$cart_sid]);
};

header('Content-Type: application/json');
echo json_encode($_SESSION['cart']);