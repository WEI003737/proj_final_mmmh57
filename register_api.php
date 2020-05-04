<?php
require  __DIR__ . '/__connect_db.php';


//回應的資料型態為JSON
header('Content-Type: application/json');

$output = [
    'success' => false,
    'error' => '資料欄位不足',
    'code' => 0,
    'postData' => $_POST
];

$email = isset($_POST['register_email']) ? $_POST['register_email'] : '';

if(isset($_POST['register_email']) and isset($_POST['register_name']) and isset($_POST['register_mobile']) and isset($_POST['register_pw'])){
    // TODO: 欄位資料檢查


    //檢查email有沒有重複
    $e_sql = "SELECT 1 FROM members WHERE email=?";
    $e_stmt = $pdo->prepare($e_sql);
    $e_stmt->execute([$_POST['register_email']]);

    if($e_stmt->rowCount() > 0){
        $output['error'] = 'email 重複了';
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    };

    $sql_register = "INSERT INTO `members`(`email`, `password`, `mobile`, `name`, `created_date`, `receiver`, `receiver_mobile`, `address`) 
    VALUES (?,?,?,?, NOW(),'','','')";

    $stmt_register = $pdo->prepare( $sql_register);

    $stmt_register->execute([
        $_POST['register_email'],
        $_POST['register_pw'],
        $_POST['register_mobile'],
        $_POST['register_name'],
    ]);


    if($stmt_register->rowCount() == 1){
        $_SESSION['loginUser'] =  $email;
        $output['success'] = true;
    }else {
        $output['error'] = '資料無法新增';
    };
}


echo json_encode($output, JSON_UNESCAPED_UNICODE);