<?php
require __DIR__. '/__connect_db.php';

$output = [
    'success' => false,
    'post' => $_POST
];


$sql_update = "UPDATE `members` SET `password`=? where `email`=?"; 
      
        
            $stmt = $pdo->prepare($sql_update);
            $stmt->execute([
                $_POST['pw1'],
                $_SESSION['loginUser'],
            ]);

            if($stmt->rowCount() == 1){
                $output['success'] = true;
            };
      

            header('Content-Type: application/json');
            echo json_encode($output, JSON_UNESCAPED_UNICODE);
     
         // echo json_encode($_POST);
         
?>

