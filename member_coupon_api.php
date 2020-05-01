<?php
require  __DIR__ . '/__connect_db.php';

//回應的資料型態為JSON
header('Content-Type: application/json');

$output = [
  'getcoupon' => false,
  'postData' => $_GET
];

    //$sql = "INSERT INTO `members`(`email`, `password`, `mobile`, `name`, `created_date`, `receiver`, `receiver_mobile`, `address`) 
    //VALUES (?,?,?,?, NOW(),'','','')";

//     $sql_coupon = "INSERT INTO `coupon`(`mem_sid`, `name`, `description`, `discount`, `is_use`, `expire_date`) 
//     VALUES (?,'會員註冊禮卷','購物即可折抵100元','100','0', NOW()+30)";
//     //設is_use 0未使用 1表示已使用

//     $stmt = $pdo->prepare($sql_coupon);
//     $stmt->execute([
//         $_POST['$sid'], 
//     ]);

//     if($stmt->rowCount() == 1){
//         $output['getcoupon'] = true;
//     };
// }



$sql_coupon = "SELECT * FROM `members` WHERE `sid`=36";
$stmt_coupon = $pdo -> query($sql_coupon);
$stmt_coupon -> fetchAll();  

if($stmt_coupon->rowCount()==1){
    $_SESSION['sid'] = $stmt_coupon['sid'];   
    $output['getcoupon'] = true;
    
    // $output['data'] = $row_coupon;  
}

   
    
//     $sql_coupon_new = "INSERT INTO `coupon`(`mem_sid`, `name`, `description`, `discount`, `is_use`, `expire_date`) 
//     VALUES (?,'會員註冊禮卷','購物即可折抵100元','100','0', NOW())";
//     //設is_use 0未使用 1表示已使用

//     $stmt = $pdo->prepare( $sql_coupon_new);
//     $stmt->execute([
//         $_SESSION['sid'],
//         ]);

echo json_encode($output, JSON_UNESCAPED_UNICODE);