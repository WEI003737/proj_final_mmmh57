<?php

session_start();


$output=[
    "loginUser" => false,
    "cart" => false,
    "customized" => false,
    "proListSid" => false,
];

$loginUser = isset($_SESSION["loginUser"])? $_SESSION["loginUser"] : "";
$cart = isset($_SESSION["cart"]) ? $_SESSION["cart"] : "";
$customized = isset($_SESSION["customized"]) ? $_SESSION["customized"] : "";
$proListSid = isset($_SESSION["proListSid"]) ? $_SESSION["proListSid"] : "";

if(!empty($loginUser)){
    $output["loginUser"] = true;
};
if(!empty($cart)){
    $output["cart"] = true;
};
if(!empty($customized)){
    $output["customized"] = true;
};
if(!empty($proListSid)){
    $output["proListSid"] = true;
};

header('Content-Type: application/json');
echo json_encode($output);

?>





