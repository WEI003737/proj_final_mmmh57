<?php
require __DIR__ . '/__connect_db.php';

$wishListProSid = [];

if(isset($_SESSION["sid"])) {
    //取出會員收藏
    $userSid = $_SESSION["sid"];
    $wishListSql = "SELECT * FROM `like_box` WHERE `mem_sid` = $userSid";
    $wishRows = $pdo->query($wishListSql)->fetchAll();

    //拿到收藏 sid 陣列
    $i = 0;
    foreach ($wishRows as $w) {
        $wishListProSid[$i] = $w["pro_sid"];
        $i++;
    };

    //拿到收藏商品資訊
    $wishListProSql = sprintf("SELECT * FROM `products` WHERE `sid` IN(%s)",implode(',',$wishListProSid));
    $wishListProRows = $pdo -> query($wishListProSql) -> fetchAll();

    //拿到收藏顏色資訊
    $i=0;
    foreach($wishListProRows as $w) {
        $wishListColorSql = "SELECT * FROM `color` WHERE pro_sid=". $w["sid"];
        $wishListColorRows[$i] = $pdo -> query($wishListColorSql) -> fetchAll();
        $i++;
    }
}


$output = [
    "wishListProSid" => $wishListProSid,
    "wishListProRows" => $wishListProRows,
    "wishListColorRows" => $wishListColorRows,

];

header('Content-Type:application/json');
echo json_encode($output, JSON_UNESCAPED_UNICODE);

