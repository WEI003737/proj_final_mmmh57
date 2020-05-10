<?php
require __DIR__. '/__connect_db.php';

$output = [
    "addCartSuccess" => false,
    "addCusSuccess" => false,
];

// print_r($_POST);
// exit();

//商品資訊---------------------------------------------------
$pKeys = array_keys($_SESSION['cart']);

$data_ar = []; // dict
$i=0;

$totalPrice = 0;
$totalPriceOfProducts = 0;
$totalPriceOfCustomized = 0;
$numItems = count($_SESSION['cart']) + count($_SESSION['customized']);
$totalItems = 0;
$totalProductItems = 0;
$totalCustomizedItems = 0;

    if (!empty($pKeys)) {
        $cartProSql = sprintf("SELECT * FROM `size` WHERE `sid` IN(%s)", implode(',', $pKeys));
        $cartProStmt = $pdo->query($cartProSql);
        $cartProRows = $cartProStmt->fetchAll();

        foreach ($cartProRows as $pro) {

            $cartProRows[$i]['quantity'] = $_SESSION['cart'][$pro['sid']];

            $colorSql = "SELECT * FROM `color` WHERE `sid`=" . $pro['color_sid'];
            $colorStmt = $pdo->query($colorSql);
            $colorRows = $colorStmt->fetchAll();
            $cartProRows[$i]['color'] = $colorRows;


            $proSql = "SELECT * FROM `products` WHERE `sid`=" . $pro['pro_sid'];
            $proStmt = $pdo->query($proSql);
            $proRows = $proStmt->fetchAll();

            $cartProRows[$i]['product'] = $proRows;

            $i++;
        }
    }

//客製化資訊---------------------------------------------------


    if (!empty($_SESSION["customized"])) {

        $a_getcusData = isset($_SESSION["customized"]) ? $_SESSION["customized"] : '';
        $a_cusSid = [];
        $a_cusData = [];
        $j = 0;

        foreach ($a_getcusData as $cus) {
            $a_cusData[$j] = $cus;
            $a_cusSid[] = $cus["cus_sid"];
            $j++;
        }

        $a_cusSql = sprintf("SELECT `sid`,`name`,`price` FROM `customize` WHERE `sid` IN (%s)", implode(',', $a_cusSid));
        $a_cusRows = $pdo->query($a_cusSql)->fetchAll();

        $k = 0;
        foreach ($a_cusRows as $cus) {
            $a_cusData[$k]['name'] = $cus["name"];
            $a_cusData[$k]['price'] = $cus["price"];
            $k++;
        };

        //算普通商品價錢
        //算普通商品數量
        for ($k = 0; $k < count($a_cusSid); $k++) {
            $totalPriceOfCustomized += $a_cusData[$k]["price"] * $a_cusData[$k]["cus_qty"];
            $totalCustomizedItems += $a_cusData[$k]["cus_qty"];
        }


    };

//產生order編號
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = 'ET';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$a_orderNum = generateRandomString();

$o_sql = "INSERT INTO `orders`(`mem_sid`, `order_num`, `coupon`, `amount`, `shipping`, `receiver`, `receiver_mobile`, `address`, `payment`, `receipt`, `order_status`, `created_date`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
$o_stmt = $pdo->prepare($o_sql);
$o_stmt->execute([
    $_SESSION["sid"],
    $a_orderNum,
    "會員註冊禮卷",
    $_POST["amount"],
    $_POST["shipping"],
    $_POST["receiver_name"],
    $_POST["receiver_mobile"],
    $_POST["receiver_address"],    
    $_POST["payment"],   
    $_POST["receipt"],
    "處理中",
]);

$order_sid = $pdo->lastInsertId(); // 最近新增資料的 PK

if($o_stmt -> rowCount() ==1){

    //訂單細節:普通商品
    $od_sql = "INSERT INTO `order_details`(`order_sid`, `pro_sid`, `color_sid`, `size_sid`, `name`, `color`, `size`, `price`, `gty`, `is_cus`) 
    VALUES (?, ?, ?, ? ,?, ?, ?, ? , ?, ?)";
    $od_stmt = $pdo->prepare($od_sql);

    foreach($cartProRows as $c){
        $od_stmt->execute([
            $order_sid,
            $c['pro_sid'],
            $c['color_sid'],
            $c['sid'],
            $c['product'][0]['name'],
            $c['color'][0]['color'],
            $c['size'],
            $c['product'][0]['price'],
            $c['quantity'],
            "0",
        ]);
    }

    if($od_stmt -> rowCount() ==1){
        $output["addCartSuccess"] = true;

    }

    //訂單細節:客製化
    $cus_sql = "INSERT INTO `order_details`(`order_sid`, `pro_sid`, `name`, `size`, `price`, `gty`,`is_cus`,`cus_color`) 
    VALUES (?, ?, ?, ? ,?, ?, ?,?)";
    $cus_stmt = $pdo->prepare($cus_sql);

    foreach($a_cusData as $cus){
        $cus_stmt->execute([
            $order_sid,
            $cus['cus_sid'],
            $cus['name'],
            $cus['cus_size'],
            $cus['price'],
            $cus['cus_qty'],
            "1",
            json_encode($cus['cus_color']),
        ]);
    }

    if($cus_stmt -> rowCount() ==1){
        $output["addCusSuccess"] = true;

    }

}

if(!isset($_SESSION['lastOrderSid'])){

    $_SESSION['lastOrderSid'] = [];
};

$_SESSION['lastOrderSid'] = $order_sid;


if($output["addCartSuccess"] &&  $output["addCusSuccess"]){
    unset($_SESSION['cart']); // 清除購物車內容
    unset($_SESSION['customized']); // 清除購物車內容

}


header('Content-Type: application/json');
echo json_encode($output);