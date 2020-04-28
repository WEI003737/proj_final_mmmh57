<?php
require __DIR__. '/__connect_db.php';

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
    $_SESSION['cart']['success'] = false;

};

//sid 是 size 的 sid 才能判斷庫存
$cart_sid = isset($_GET['cart_sid']) ? intval($_GET['cart_sid']) : 0;
$cart_qty = isset($_GET['cart_qty']) ? intval($_GET['cart_qty']) : 0;


$sql = "INSERT INTO `address_book`(
`name`, `email`, `mobile`, `birthday`, `address`, `created_at`
) VALUES (?, ?, ?, ?, ?, NOW())";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $_POST['name'],
    $_POST['email'],
    $_POST['mobile'],
    $_POST['birthday'],
    $_POST['address'],
]);

if($stmt->rowCount()==1){
    $output['success'] = true;
    $output['error'] = '';
} else {
    $output['error'] = '資料無法新增';
}


header('Content-Type: application/json');
echo json_encode($_SESSION['cart']);