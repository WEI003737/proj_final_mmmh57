<?php
require __DIR__. '/__connect_db.php';

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
//    $_SESSION['cart']['success'] = false;

};

//sid 是 size 的 sid 才能判斷庫存
$cart_sid = isset($_GET['cart_sid']) ? intval($_GET['cart_sid']) : 0;
$cart_qty = isset($_GET['cart_qty']) ? intval($_GET['cart_qty']) : 0;


//先判斷有無此商品
if(! empty($cart_sid)){
    $sizeSidSql = $pdo -> query("SELECT * FROM `size` WHERE `sid`= ".$cart_sid);
    $haveSizeSid = $sizeSidSql -> fetch(); //設fetchAll不會動

    if($sizeSidSql -> rowCount() == 1){
//判斷有無足夠庫存
        if(!empty($cart_qty) and $cart_qty <= $haveSizeSid['in_stock']) {
            $_SESSION['cart'][$cart_sid] = $cart_qty;
//             $_SESSION['cart']['success'] = true;
        }
    }

}else {
    unset($_SESSION['cart'][$cart_sid]);
};

header('Content-Type: application/json');
echo json_encode($_SESSION['cart']); //送關聯式陣列回來