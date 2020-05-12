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
body{
    font-family: 'Noto Sans TC', sans-serif;
}
.header a{
    color:#333;
}
a, a:hover{
    text-decoration: none;
}
.j_gray{
    Width:100%;
    height:100%;
    background-color:rgba(105,105,105,.75);
    Z-index:2; 
    position:absolute;
}


.j_coupon_container{
    Width:400px;
    position:relative;   
}

.j_used{
    position:absolute;
    top:40%;
    left:40%;
    font-size:25px;
    font-weight:bold;
    color:white;
    border-radius:5px;
    Z-index:3; 
    padding:2px;
}

.j_bigcoupon_pic{
    width:400px;
    display: none; 
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

 .j_smallcoupon_pic{
    width:100px;
    position:absolute;
    top:15%;
    right:20%;
    animation-name:animation;
    animation-fill-mode:forwards;
    animation-duration: 1s;
    animation-delay: 0.5s;
    display:none;  
} 

@keyframes animation {
	0%{transform: rotate(-15deg);}
	10%{transform: rotate(-25deg);}
    20%{transform: rotate(-20deg);}
    30%{transform: rotate(-25deg);}
    40%{transform: rotate(-25deg)  scale(1);}
    50%{transform: rotate(0deg) translateX(100px) translateY(-50px) scale(1.5);}
    60%{transform: rotate(-25deg) translateY(-100px) scale(2);}   
    70%{transform: rotate(-20deg) translateY(-50px) translateX(-100px) scale(3);}   
    80%{transform: rotate(-15deg) translateY(50px) translateX(-200px)scale(3.5) ;}   
    90%{transform:rotate(-10deg)  translateY(100px) translateX(-250px) scale(3);}   
    95%{transform:translateY(150px) translateX(-300px) scale(3);}     
    100%{transform:translateY(150px) translateX(-300px) scale(4);}     
} 


@media screen and (max-width: 700px){
  .j_bigcoupon_pic{width:150px;}  
  .j_coupon_container{width:150px; margin: 0 auto;}
  .j_used{font-size:15px;top:20%;left:35%}
  #j_gift{ width:60px;height:40px;right:10%}
  .j_smallcoupon_pic{ width:40px;;right:10%}
  .j_push{padding-bottom:15vh}

  @keyframes animation{
    0%{transform: rotate(-15deg);}
	10%{transform: rotate(-25deg);}
    20%{transform: rotate(-20deg);}
    30%{transform: rotate(-25deg);}
    40%{transform: rotate(-25deg)  scale(1);}
    50%{transform: rotate(0deg) translateX(50px) translateY(-50px) scale(1.5);}
    60%{transform: rotate(-25deg) translateY(-50px) scale(2);}   
    70%{transform: rotate(-20deg) translateY(-100px) translateX(-40px) scale(3);}   
    80%{transform: rotate(-15deg) translateY(0px) translateX(-100px)scale(3.5) ;}   
    90%{transform:rotate(-10deg)  translateY(50px) translateX(-125px) scale(3);}   
    95%{transform:translateY(100px) translateX(-90px) scale(3);}     
    100%{transform:translateY(100px) translateX(-100px) scale(4);}     
  }

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
            <li class="leftlist_underline"><i class="fas fa-key"></i><a href="member_changepw.php" >密碼修改</a></li>
            <li class="leftlist_underline"><a href="member_wishlist.php" >我的收藏</a></li>
            <li class="leftlist_underline"><a href="member_order.php" >訂單查詢</a></li>
            <li class="leftlist_underline"><a href="member_coupon.php" style="color:#CA054D;" >我的優惠卷</a></li>
        </ul>
</div>

<!-- 查看coupon狀態 -->
<!-- <p class="j_gray" style=" width:15px ;height:15px"><?= $coupon_used['is_use']?></p> -->


    <div class="member_top_title"> 
        <div class="d-flex align-items-center justify-content-center j_padt_50 ">
            <p class="j_eng_title">My Coupon</p>
            <p class="j_chinese_title ">我的優惠卷</p>
        </div>
        <P class="j_dashline"></P>
        
        <div class="j_padb_100  j_relative">
        <p class="d-flex justify-content-center j_eng_title2 ">Red Core , Save  your money</p>
        <!-- <div class="j_gift_container"> -->
            <img src="./images/newmember_coupon.jpg" class="j_smallcoupon_pic" alt="">
            <img id="j_gift" src="./images/giftbox.svg" alt="">
        <!-- </div> -->
        </div>
            
        
    </div>  
    

  
    <div class="d-flex justify-content-center j_padb_200"> 
            <div class="member_left_list col-lg-2 ">
            <ul >
                <li class="leftlist_underline"><a href="member_information_card_noflipnew.php">會員資料修改</a></li>
                <li class="leftlist_underline"><i class="fas fa-key"></i><a href="member_changepw.php" >密碼修改</a></li>
                <li class="leftlist_underline"><a href="member_wishlist.php" >我的收藏</a></li>
                <li class="leftlist_underline"><a href="member_order.php" >訂單查詢</a></li>
                <li class="leftlist_underline"><a style="color:#CA054D;">我的優惠卷</a></li>
            </ul>
            </div>

      
           
           
            <div class="col-lg-10">
                <div class="j_coupon_container">
                    <div style="display:none"  class="j_used">已使用</div>

                    <div id="j_addgray" class=""></div>
                    <img src="./images/newmember_coupon.jpg" class="j_bigcoupon_pic" alt="">
                </div>  
            </div>
    </div>


<div class="j_push"></div>
</div>
</body>
</html> 


<?php include __DIR__ . '/parts/footer.php'; ?>    
<?php include __DIR__ . '/parts/h_f_script.php'; ?>
<script>
//設is_use 0未使用 1表示已使用

let is_use = <?= $coupon_used['is_use']?>;

 if(is_use == 1 ){
     //console.log($("#j_addgray"));
    $("#j_addgray").addClass("j_gray");
    $(".j_used").show();
    $(".j_bigcoupon_pic").show();
    
 }else{
    $(".j_smallcoupon_pic").show();
 }

</script>



