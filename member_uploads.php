<?php
require __DIR__. '/__connect_db.php';

$uploads = __DIR__. '/uploads/';

$output = [
    'newname' => '',
    'name' => '',
    'error' => '沒有上傳檔案'
];

if(!isset($_FILES['myfiles']) or !isset($_FILES['myfiles']['name'])){
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$ext = '';
switch($_FILES['myfiles']['type']){
    case 'image/jpeg':
        $ext = '.jpg';
        break;
    case 'image/png':
        $ext = '.png';
}

if(empty($ext)){
    $output['error'] = '檔案格式不符';
} else {
    $filename = md5(uniqid(). $_FILES['myfiles']['name']);
    $filename .= $ext;
    $output['newname'] = $filename;
    $output['name'] = $_FILES['myfiles']['name'];
    $output['error'] = "更新成功";
    // 搬移檔案
    move_uploaded_file($_FILES['myfiles']['tmp_name'], $uploads. $filename );

    
//===== 照片檔名 存入會員中======
   
//  $sql_selffie = "INSERT INTO `members`(`selffie`) 
//  VALUES (?)";

//  $stmt = $pdo->prepare($sql_selffie);
//  $stmt->execute([
//      $output['newname']  
//  ]);


 }


$sql = "UPDATE `members`  SET `selffie` = ? WHERE email= ?" ;
$stmt = $pdo -> prepare($sql);
$rows = $stmt->execute([
    $output['newname'],
    $_SESSION['loginUser']
]);

$_SESSION['selffie']=$output['newname'];

echo json_encode($output, JSON_UNESCAPED_UNICODE);