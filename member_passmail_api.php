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
//$message="親愛的RED CORE會員您好!<br>您的暫時密碼為:<br>{$mpass}<br>請於登入後請至會員中心進行密碼修改";
$message="<html>
<head>
 
</head>
<body>
<p style=\"color:red\"> 此信件為系統發出信件，請勿直接回覆，感謝您的配合。謝謝！</p>
  
<div style=\"border: outset 2px #CA054D;background:#FEF5EF;width:700px;height:500px\">
    <div style='margin: 0 auto;padding:30px'>


    <p style='font-family:Microsoft JhengHei;'>親愛的RED CORE會員您好!</p>

    <br>
   
    <p style='font-family:Microsoft JhengHei;'>您的暫時密碼為:</p>


    <P> {$mpass} </p>

    <p style='font-family:Microsoft JhengHei;'>請於登入後請至會員中心進行密碼修改</p>

    <br>
    <br>
    <br>

    <div style='display:flex;background:white;border-radius:5px;width:400px;padding-top:5px'>
        <img src='https://i.imgur.com/sankD7k.png' style='right:0%' alt='ccc'  width='100' height='100'>
        
        <div style='padding-left:10px;'>
            <p style='font-weight:bold' > calling 02-6631-6666 / 0966-666-666</p>
            <p style='font-weight:bold'>105 臺北市大安區復興南路一段390號2樓</p>
            <p style='font-weight:bold' >service@redcore.com</p>
        </div>


     </div>
    
    <div style='width:400px;height:3px;background:#CA054D'></div>
    <div>

    
    
</div>
</body>
</html>
";

$headers="MIME-Version: 1.0\r\n";
$headers.="Content-type: text/html; charset=utf-8\r\n";
$headers.="From:".mb_encode_mimeheader("RedCore Company","utf-8")."<red.core.taiwan@gmail.com>\r\n";
mail($to,$subject,$message,$headers);









      
