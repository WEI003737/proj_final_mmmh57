<?php
require __DIR__.'/__connect_db.php';
//一頁顯示的數量
$showNum = 16;
// 目前頁碼，若無指定則顯示第一頁
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$categories = isset($_GET['categories']) ? $_GET['categories'] : "";
$ordertype = isset($_GET['ordertype']) ? $_GET['ordertype'] : "";
$orderway = isset($_GET['orderway']) ? $_GET['orderway'] : "";

// echo json_encode($_GET['page']);
// exit;

$where = ' WHERE 1';
if($categories != ""){
// $where .= $pdo->quote("%${categories}%"); // 跳脫;
    $where .= " AND {$categories}"; // 跳脫;

}
$order = '';
if($ordertype != ""){
    $order .= " ORDER BY {$ordertype} {$orderway} ";
    // ordertype="`created_time`"&orderway="ASC"
}else{
    $order .= " ORDER BY `sid`";
}


// 總筆數
$totalRows = $pdo -> query("SELECT COUNT(1) FROM `products` $where")
                  -> fetch(PDO::FETCH_NUM)[0];
// echo $totalRows;
// 算總頁數
$totalPages = ceil($totalRows / $showNum);

($page < 1) ? ($page = 1) : false;
($page > $totalPages) ? ($page = $totalPages) : false;

$rowsSql = sprintf( "SELECT * FROM `products` %s %s LIMIT %s,%s",$where,$order,($page-1)*$showNum,$showNum);
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