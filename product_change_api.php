<?php
session_start();

//點商品轉頁
if(!isset($_SESSION['proListSid'])){

    $_SESSION['proListSid'] = [];
};

$proListSid = isset($_GET["proListSid"]) ? intval($_GET["proListSid"]) : "";

if(!empty($proListSid)){
    $_SESSION['proListSid'] = $proListSid;
};

header('Content-Type:application/json');
echo json_encode($_SESSION['proListSid']);

?>