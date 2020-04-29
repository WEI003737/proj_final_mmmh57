<?php
require __DIR__. '/__connect_db.php';

$output = [
    'success' => false,
    'getData' => $_GET
];

$a_likeProSid = isset($_GET['a_likeProSid']) ? intval($_GET['a_likeProSid']) : '';


    $removeFromLikeSql = "DELETE FROM `like_box` WHERE `pro_sid`=?";
    $removeFromLikeStmt = $pdo->prepare($removeFromLikeSql);
    $removeFromLikeStmt->execute([$a_likeProSid]);

    if($removeFromLikeStmt->rowCount()==1){
        $output['success'] = true;
    };



header('Content-Type: application/json');
echo json_encode($output);
//echo json_encode($_GET);