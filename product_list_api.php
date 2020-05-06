<?php
require __DIR__.'/__connect_db.php';
//一頁顯示的數量
$showNum = 16;
// 目前頁碼，若無指定則顯示第一頁
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// 總筆數
$totalRows = $pdo -> query("SELECT COUNT(1) FROM `products`")
                  -> fetch(PDO::FETCH_NUM)[0];
// echo $totalRows;
// 算總頁數
$totalPages = ceil($totalRows / $showNum);

($page < 1) ? ($page = 1) : false;
($page > $totalPages) ? ($page = $totalPages) : false;

$rowsSql = sprintf("SELECT * FROM`products` ORDER BY`sid` ASC LIMIT %s,%s",($page-1)*$showNum,$showNum);
$rowsStmt = $pdo -> query($rowsSql);
$rows = $rowsStmt->fetchAll();

$rowsColor = [];
foreach($rows as $r){
    $rowsColor[] = $pdo -> query("SELECT * FROM `color` WHERE pro_sid=". $r["sid"]) ->fetchAll();
}

// echo json_encode($rowColor, JSON_UNESCAPED_UNICODE);
$output = [
    'page' => $page,
    'showNum' =>$showNum,
    'totalRows' =>$totalRows,
    'totalPages' =>$totalPages,
    'rows' =>$rows,
    'rowsColor' =>$rowsColor,
];
header('Content-Type:application/json');
echo json_encode($output, JSON_UNESCAPED_UNICODE);

?>