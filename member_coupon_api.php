<?php
require  __DIR__ . '/member_connect_db.php';

if(!isset($_SESSION)){
    session_start();
}


//回應的資料型態為JSON
header('Content-Type: application/json');

$output = [
  'getcoupon' => false,
  'postData' => $_GET
];

echo $_SESSION['loginUser'];

$sql_coupon = "SELECT * FROM `members` WHERE `email`= '" .$_SESSION['loginUser'] ."'";
$stmt_coupon = $pdo -> query($sql_coupon);
$dataArray = $stmt_coupon -> fetchAll();  
$rowCount = count($dataArray);

if($rowCount==1){
    foreach ( $dataArray as $data)
    {
        $_SESSION['sid'] = $data['sid'];
    }
    //$_SESSION['loginUser']['sid'] = $stmt_coupon['sid'];  
    //$_SESSION['sid'] = $stmt_coupon['sid'];
    $output['getcoupon'] = true;
    
    // $output['data'] = $row_coupon;  
}
    $sql_coupon_new = "INSERT INTO `coupon`(`mem_sid`, `name`, `description`, `discount`, `is_use`, `expire_date`) 
    VALUES (?,'會員註冊禮卷','購物即可折抵100元','100','0', NOW())";
    //設is_use 0未使用 1表示已使用

    $stmt = $pdo->prepare( $sql_coupon_new);
    $stmt->execute([
        $_SESSION['sid'],
        ]);

  

echo json_encode($output, JSON_UNESCAPED_UNICODE);


