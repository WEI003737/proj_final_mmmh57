<?php

session_start();


$output=[
    "loginUser" => false,
    "cart" => false,
    "customized" => false,
];

$loginUser = isset($_SESSION["loginUser"])? $_SESSION["loginUser"] : "";
$cart = isset($_SESSION["cart"]) ? $_SESSION["cart"] : "";
$customized = isset($_SESSION["customized"]) ? $_SESSION["customized"] : "";

if(!empty($loginUser)){
    $output["loginUser"] = true;
};
if(!empty($cart)){
    $output["cart"] = true;
};
if(!empty($customized)){
    $output["customized"] = true;
};
header('Content-Type: application/json');
echo json_encode($output);

?>





