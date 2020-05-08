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
       $_SESSION['sid'] = $pdo->lastInsertId();
        // $_SESSION['login'] = [
        //     'sid' => $pdo->lastInsertId,
        //     'email' => $email
        // ]

        // ===== 註冊成功 送出優惠卷=====
        $sql_coupon_new = "INSERT INTO `coupon`(`mem_sid`, `name`, `description`, `discount`, `is_use`, `expire_date`) 
        VALUES (?,'會員註冊禮卷','購物即可折抵100元','100','0', NOW())";
        //設is_use 0未使用 1表示已使用

        $stmt = $pdo->prepare( $sql_coupon_new);
        $stmt->execute([
            $_SESSION['sid'],
        ]);
       // ===== 註冊成功 送出優惠卷=====

        $output['success'] = true;
    }else {
        $output['error'] = '資料無法新增';
    };
}


echo json_encode($output, JSON_UNESCAPED_UNICODE);