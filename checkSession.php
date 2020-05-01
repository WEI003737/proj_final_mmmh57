<?php
session_start();
if( !isset($_SESSION['loginUser']) ){
    header('refresh: 3; url=./member_login.php');
    echo "";
    exit();
}