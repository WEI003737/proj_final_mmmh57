<?php
require __DIR__. '/__connect_db.php';

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

$sql = "SELECT `sid`,`email`, `selffie` FROM `members` WHERE `email`=? AND `password`=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email, $password]);

if($stmt->rowCount()){
    $row = $stmt->fetch();
    $_SESSION['loginUser'] = $email; 
    $_SESSION['sid'] = $row['sid'];
    $_SESSION['selffie'] = $row['selffie'];
    $output['success'] = true;
    $output['data'] = $row;  
}
header('Content-Type: application/json');
echo json_encode($output);