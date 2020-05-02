<?php
require __DIR__ . '/__connect_db.php';

$totalProductSql = sprintf("SELECT * FROM products $where $orderBy LIMIT %s, %s  ", ($page-1)*$perPage, $perPage);
//總商品資料
$totalProductStmt = $pdo -> query($totalProductSql);
$totalProducts = $totalProductStmt -> fetchAll();

$i=0;
foreach($totalProducts as $value){

    //加入每個款式的顏色數量
    $colorLengthSql = $pdo -> query("SELECT *,count(pro_sid) FROM `color` WHERE `pro_sid`= ".$value["sid"]." GROUP BY `pro_sid`");
    $colorLength = $colorLengthSql -> fetch();
    $totalProducts[$i]["colorLength"] = $colorLength['count(pro_sid)'];

    //加入顏色陣列
    //加入顏色照片陣列
    $colorArrSql = $pdo -> query("SELECT `color`,`sid` AS `color_sid`,`pro_pic`  FROM `color` WHERE `pro_sid`= ".$value["sid"]." ORDER BY `sid`");
    $colorArr = $colorArrSql -> fetchAll();
    $totalProducts[$i]["colorArr"] = $colorArr;

    $j=0;
    foreach($totalProducts[$i]["colorArr"] as $color){
        $sizeSql = $pdo->query("SELECT `sid` AS `size_sid`, `size`,`in_stock` FROM `size` WHERE `color_sid`= " . $color["color_sid"]." ORDER BY `sid` ");
        $sizeArr = $sizeSql -> fetchAll();
        $totalProducts[$i]["colorArr"][$j]["size"] = $sizeArr;
        $j++;
    }

    $i++;
}