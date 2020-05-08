<?php
require __DIR__ . '/__connect_db.php';

$page_name = 'member_wishlist';
$wishListProSid = [];

if(isset($_SESSION["loginUser"])){
    $userSid = "1";
    $wishListSql = "SELECT * FROM `like_box` WHERE `mem_sid` = 1";
    $wishRows = $pdo -> query($wishListSql) -> fetchAll();

    $i=0;
    foreach($wishRows as $w){
        $wishListProSid[$i] = $w["pro_sid"];
        $i++;
    };

    $wishProSql = sprintf("SELECT * FROM `products` WHERE `sid` IN(%s)", implode(',', $wishListProSid));
    $wishProRows = $pdo -> query($wishProSql) -> fetchAll();
//
//    $j=0;
//    foreach($wishProRows as $p){
//
//        $wishColor
//        $j++;
//    };
    
}

$output = [
    "wishListProSid" => $wishListProSid
];
header('Content-Type:application/json');
echo json_encode($output, JSON_UNESCAPED_UNICODE);


//    $totalProducts = $pdo -> query($totalProductSql) ->fetchAll();

//
//$cart = isset($_SESSION["cart"]) ? $_SESSION["cart"] : "";
//$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
//$pKeys = array_keys($cart);
//$perPage = 12;
//
////取得總筆數
//$totalRows = count($pKeys);
//
////算總頁數
//$totalPages = ceil($totalRows / $perPage);
//
//($page < 1) ? ($page = 1) : false;
//($page > $totalPages) ? ($page = $totalPages) : false;
//
////-----------------------------總商品資料---------------------------------
//
//if($totalRows>0){
//
////商品資料
//    $totalProductSql = sprintf("SELECT * FROM `products` WHERE `sid` IN(%s)", implode(',', $pKeys));
//    $totalProducts = $pdo -> query($totalProductSql) ->fetchAll();
//
//    $i=0;
//    foreach($totalProducts as $pro){
//        //加入每個款式的顏色數量
//        $colorLengthSql = "SELECT count(pro_sid) FROM `color` WHERE `pro_sid`= ".$pro["sid"]." GROUP BY `pro_sid`";
//        $colorLength = $pdo -> query($colorLengthSql) -> fetch();
//        $totalProducts[$i]["colorLength"] = $colorLength['count(pro_sid)'];
//
//        //加入顏色陣列
//        //加入顏色照片陣列
////        $colorArrSql = $pdo->query("SELECT `color`,`sid` AS `color_sid`,`pro_pic`  FROM `color` WHERE `pro_sid`= " . $pro["sid"] . " ORDER BY `sid`");
////        $colorArr = $colorArrSql->fetchAll();
////        $totalProducts[$i]["colorArr"] = $colorArr;
//
//        $i++;
//    };
//
//};

//echo json_encode($colorArr, JSON_UNESCAPED_UNICODE);
//echo json_encode($totalProducts, JSON_UNESCAPED_UNICODE);

?>
