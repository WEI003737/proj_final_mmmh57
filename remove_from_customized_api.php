<?php
require __DIR__. '/__connect_db.php';



$cart_sid = isset($_GET['cart_sid']) ? intval($_GET['cart_sid']) : 0;


unset($_SESSION['customized'][$cart_sid]);


header('Content-Type: application/json');
echo json_encode($_SESSION['cart']); //送關聯式陣列回來

