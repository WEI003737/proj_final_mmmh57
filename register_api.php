<?php
require  __DIR__ . '/member_connect_db.php';


//回應的資料型態為JSON
header('Content-Type: application/json');

$output = [
  'success' => false,
  'error' => '資料欄位不足',
  'code' => 0,
  'postData' => $_POST
];


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

    //檢查手機格式
     $mobile_re = " /^09\d{2}-?\d{3}-?\d{3}$/";
    if(empty(preg_grep($mobile_re, [$_POST['register_mobile']]))){
        $output['error'] = '手機號碼格式不符';      //會顯示在哪??
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    };

    //全部選項都要有?
    $sql = "INSERT INTO `members`(`email`, `password`, `mobile`, `name`, `created-date`, `receiver`, `receiver-mobile`, `address`) 
    VALUES (?,?,?,?, NOW(),'','','')";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $_POST['register_email'],
        $_POST['register_pw'],
        $_POST['register_mobile'],
        $_POST['register_name'],


    ]);

    if($stmt->rowCount() == 1){
        $output['success'] = true;
        $output['error'] = '';
    }else {
        $output['error'] = '資料無法新增';
    };
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);