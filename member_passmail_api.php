<?php
require __DIR__. '/__connect_db.php';


if(isset($_POST['email'])){

}
$row_findUser= [];  
$sql_findUser = "SELECT * FROM members WHERE email ='". $_POST['email']."'";
$stmt = $pdo->query($sql_findUser);
$row_findUser = $stmt->fetchAll()[0];

//echo json_encode($row_findUser, JSON_UNESCAPED_UNICODE);
// echo json_encode($row_findUser['email'], JSON_UNESCAPED_UNICODE);


//產生新密碼
//$newpasswd = MakePass(10);
$newpasswd = uniqid();           
$mpass = password_hash($newpasswd, PASSWORD_DEFAULT);
$query_update_newpasswd = "UPDATE members SET password = ?  WHERE email= ? ";

$stmt = $pdo->prepare($query_update_newpasswd);
$stmt->execute([
  
    $mpass,                   
    $row_findUser['email'], 

]);


//寄信
mb_internal_encoding("utf-8");
$to=$row_findUser['email'];
$subject=mb_encode_mimeheader("RED CORE 密碼更新","utf-8");
$message="親愛的RED CORE會員您好!<br>您的暫時密碼為:<br>{$mpass}<br>請於登入後請至會員中心進行密碼修改";
$headers="MIME-Version: 1.0\r\n";
$headers.="Content-type: text/html; charset=utf-8\r\n";
$headers.="From:".mb_encode_mimeheader("RedCore Company","utf-8")."<red.core.taiwan@gmail.com>\r\n";
mail($to,$subject,$message,$headers);









      
