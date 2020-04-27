<?php
require __DIR__. '/member_connect_db.php';


//SESSION 換到這裡來 
if(!isset($_SESSION)){
    session_start();
}

$output = [
    'success' => false,
    'post' => $_POST,
];

$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
if(empty($email) or empty($password)){
    echo json_encode($output);
    exit;
}

$sql = "SELECT * FROM members WHERE email=? AND password=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email, $password]);

if($stmt->rowCount()){
    $row = $stmt->fetch();
    $_SESSION['loginUser'] = $email;   //?
    $output['success'] = true;
    $output['data'] = $row;  //不一定要顯示出 危險
}
header('Content-Type: application/json');
echo json_encode($output);