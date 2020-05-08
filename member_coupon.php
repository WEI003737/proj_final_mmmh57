<?php
require __DIR__. '/__connect_db.php';


$coupon_used=[];
$sql_coupon_used = "SELECT * FROM `coupon` WHERE `mem_sid`=".  $_SESSION['sid'];
$stmt_coupon_used = $pdo -> query($sql_coupon_used);
$coupon_used = $stmt_coupon_used -> fetch();  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>member_order</title>
</head>
<?php include __DIR__ . '/parts/h_f_css.php'; ?>
<?php include __DIR__ . '/css/member_css.php'; ?>
<?php include __DIR__ . '/parts/h_f_link.php'; ?>

<style>

.j_gray{
    Width:100%;
    height:100%;
    background-color:rgba(105,105,105,.75);
    Z-index:2; 
    position:absolute;
}


.j_coupon_container{
    Width:500px;
    position:relative;
   
}
.j_used{
    position:absolute;
    top:40%;
    left:25%;
    font-size:25px;
    font-weight:bold;
    color:#CA054D;
    background:white;
    border-radius:5px;
    Z-index:3; 
    padding:2px;
}

.j_bigcoupon_pic{
    width:500px;
}

.j_relative{
    position:relative;
}

#j_gift{
    width:150px;
    height:100px;
    position:absolute;
    right:20%;
    top:0%;
}
@media screen and (max-width: 700px){
  .j_bigcoupon_pic{width:300px;}  
}



</style>
<body>
<?php include __DIR__ . '/parts/header.php'; ?>  
<!-- 推出 header 空間-->
<div class="a_push_place"></div>

 
<div class="container">


<!-- 手機 (左側標換到上方) -->
<div id="member_left_list_totop" >
       <ul class="member_left_list_totop d-flex justify-content-between">
            <li class="leftlist_underline"><a href="member_information_card_noflipnew.php">會員資料修改</a></li>
            <li class="leftlist_underline"><a href="member_wishlist.php" >我的收藏</a></li>
            <li class="leftlist_underline"><a href="member_order.php" >訂單查詢</a></li>
            <li class="leftlist_underline"><a href="member_coupon.php" style="color:#CA054D;" >我的優惠卷</a></li>
        </ul>
</div>

<!-- 查看coupon狀態 -->
<!-- <p class="j_gray" style=" width:15px ;height:15px"><?= $coupon_used['is_use']?></p> -->


    <div class="member_top_title"> 
        <div class="d-flex align-items-center justify-content-center j_padt_100 ">
            <p class="j_eng_title">My Coupon</p>
            <p class="j_chinese_title ">我的優惠卷</p>
        </div>
        <P class="j_dashline"></P>
        
        <div class="j_padb_100  j_relative">
        <p class="d-flex justify-content-center j_eng_title2">Red Core , Save  your money</p>
        <img id="j_gift" src="./images/giftbox.svg" alt="">
        </div>
            
        
    </div>  
    

  
    <div class="d-flex justify-content-center j_padb_200"> 
            <div class="member_left_list col-lg-2 ">
            <ul >
                <li class="leftlist_underline"><a href="member_information_card_noflipnew.php">會員資料修改</a></li>
                <li class="leftlist_underline"><a href="member_wishlist.php" >我的收藏</a></li>
                <li class="leftlist_underline"><a href="member_order.php" >訂單查詢</a></li>
                <li class="leftlist_underline"><a style="color:#CA054D;">我的優惠卷</a></li>
            </ul>
            </div>

      
           
           
            <div class="col-lg-10">
                <div class="j_coupon_container">
                    <div  class="j_used" style="display:none"  ><i class="fas fa-bullhorn"></i>&ensp;已經使用過囉!</div>
                    <div id="j_addgray" class=""></div>
                     <img src="./images/newmember_coupon.jpg" class="j_bigcoupon_pic" alt="">
                </div>  
            </div>
    </div>



</div>
</body>
</html> 


<?php include __DIR__ . '/parts/footer.php'; ?>    
<?php include __DIR__ . '/parts/h_f_script.php'; ?>
<script>
//設is_use 0未使用 1表示已使用

let is_use = <?= $coupon_used['is_use']?>;
 if(is_use == 1){
     console.log($("#j_addgray"));
    $("#j_addgray").addClass("j_gray");
    $(".j_used").show();
 }
</script>



