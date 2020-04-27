<?php
require __DIR__. '/member_connect_db.php';

session_start();

$output = [
    'success' => false,
    'post' => $_POST
];


$sql_update = "UPDATE `members` SET
        `mobile`=?, `name`=?, `receiver`=?,`receiver_mobile`=?, `address`=? where `email`=?"; 
      
        
            $stmt = $pdo->prepare($sql_update);
            $stmt->execute([
                
                $_POST['mobile_new'],
                $_POST['name_new'],
                $_POST['receiver'],
                $_POST['receiver_mobile'],
                $_POST['receiver_address'],
                $_SESSION['loginUser'],
            ]);
        
      
       header('Content-Type: application/json');
       echo json_encode($output, JSON_UNESCAPED_UNICODE);



?>

