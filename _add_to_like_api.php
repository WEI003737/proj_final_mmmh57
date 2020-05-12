<?php
require __DIR__. '/__connect_db.php';

$output = [
    'success' => false,
    'getData' => $_GET
];

$a_likeProSid = isset($_GET['a_likeProSid']) ? intval($_GET['a_likeProSid']) : 0;


$checkLikeSql = "SELECT `pro_sid` FROM `like_box` WHERE `pro_sid`= ".$a_likeProSid ;
$checkLikeStmt = $pdo-> query($checkLikeSql);
$checkLikeStmt -> fetchAll();

if(!$checkLikeStmt -> rowCount() == 1) {
    $addToLikeSql = "INSERT INTO `like_box`(`mem_sid`, `pro_sid`, `created_at`) 
    VALUES (?, ?, NOW())";
    $addToLikestmt = $pdo->prepare($addToLikeSql);
    $addToLikestmt->execute([
        $_SESSION['sid'],
        $a_likeProSid,
    ]);

    if ($addToLikestmt->rowCount() == 1) {
        $output['success'] = true;
    };
};
header('Content-Type: application/json');
echo json_encode($output);
//echo json_encode($_GET);