<?php
require __DIR__. '/member_connect_db.php';

$output = [
    'success' => false,
    'post' => $_POST
];


$sql_update = "UPDATE `members` SET
        `mobile`=?, `name`=?, `receiver`=?,`receiver_mobile`=?, `address`=? where `email`=?"; 

SELECT * FROM 
members
LEFT JOIN
orders
ON
members.sid = orders.mem_sidSELECT * FROM `members` WHERE 1
      
        
            $stmt = $pdo->prepare($sql_update);
            $stmt->execute([
                //$_POST['email_new'],
                // $_POST['pw_new'],
                $_POST['mobile_new'],
                $_POST['name_new'],
                $_POST['receiver'],
                $_POST['receiver_mobile'],
                $_POST['receiver_address'],
                $_SESSION['loginUser'],
            ]);

            if($stmt->rowCount() == 1){
                $output['success'] = true;
            };
      

            header('Content-Type: application/json');
            echo json_encode($output, JSON_UNESCAPED_UNICODE);
     
         // echo json_encode($_POST);
         
?>
