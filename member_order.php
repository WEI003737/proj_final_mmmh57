<?php
require __DIR__. '/__connect_db.php';

//歷史訂單
$rows = [];
$sql_o = "SELECT * FROM members LEFT JOIN orders ON members.sid = orders.mem_sid = 1";
$stmt = $pdo->query($sql_o);
$rows = $stmt->fetchAll();

//訂單細節 order_details
$rows2 = [];
if(isset($_GET['order_num'])){
    
    $sql_o_d = "SELECT * FROM orders JOIN order_details ON orders.sid = order_details.order_sid where orders.mem_sid= 1 " ;
    if( isset($_GET['order_num']) ){
        $sql_o_d .= " AND order_num = '".$_GET['order_num']."'";
    }
    $stmt2 = $pdo->query($sql_o_d);
    $rows2 = $stmt2->fetchAll();
}

echo json_encode($rows2);

//加入照片 order_details_picture
$i=0;
foreach($rows2 as $r2){
    $sql_o_d_p = "SELECT `sid`,`pro_pic` FROM `color` WHERE `sid`= ". $r2['color_sid'];
    $o_d_p_stmt = $pdo -> query($sql_o_d_p);
    $o_d_p_row = $o_d_p_stmt -> fetch();
    $rows2[$i]['pro_pic'] = $o_d_p_row;
 
    $i++;
};

//echo json_encode($rows2);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>member_order</title>
</head>
<?php include __DIR__ . '/parts/h_f_css.php'; ?>
<?php include __DIR__ . '/parts/h_f_link.php'; ?>


<style>

* {box-sizing: border-box;
   font-family:sans-serif;}

.container{
    max-width: 1440px;
    margin: 0 auto;
} 

@media screen and (max-width: 700px){
    table {font-size:12px}
}


/* 上標題  */
.j_eng_title{
    font-size: 36px;
    padding-right:30px;
    font-family:sans-serif;
}

.j_chinese_title
{font-size: 36px;}

.j_dashline{
border-bottom-style:dashed;
border-bottom-color:#272838;
border-width: 1px;
}


/* 左側標 */
.member_left_list li{
    list-style: none;
    padding-top: 10px;
    padding-bottom: 50px;
}

@media screen and (max-width: 700px){
    .member_left_list{display:none}  
    .j_eng_title{font-size: 15px;}
    .j_chinese_title,.j_eng_title2{font-size: 12px;}
    .j_mobile_noshow{display:none}
}


.j_padb_100{padding-bottom: 100px;}
.j_padb_200{padding-bottom: 200px;}
.j_padt_100{padding-top:100px}

@media screen and (max-width: 700px){
    .j_padb_100{padding-bottom: 25px;}
    .j_padb_200{padding-bottom: 50px;}
    .j_padt_100{padding-top:25px}
}


/* 內容 */
th,td{
padding: 20px;
text-align: left;
}

.j_cancel_btn{
    width: 100px;
    height: 30px;
    background-color:#CA054D;
    color:white;
    text-align:center;
    border-style: hidden;   
}

.j_cancel_btn_mobile{
    width: 50px;
    height: 25px;
    background-color:#CA054D;
    color:white;
    text-align:center;
    border-style: hidden;  
    display:none;
}

@media screen and (max-width: 700px){
    .j_cancel_btn{display:none} 
    .j_cancel_btn_mobile{display:block}
}

.leftlist_circle:hover{
    list-style-type: disc;
    color:#CA054D; 
}

.j_desk_noshow{display:none}

.j_ordernum_title{color: #CA054D }
.j_productpic{width:135px; height:120px } 
                      
@media screen and (max-width: 700px){
    .j_ordernum_title{font-size:16px}
    .j_productpic{width:90px; height:100px }
    .j_desk_noshow{display:block}
}



</style>
<body>

    <?php include __DIR__ . '/parts/header.php'; ?>

    <div class="container">

        <div class="member_top_title"> 
            <div class="d-flex align-items-center justify-content-center j_padt_100 ">
                <p class="j_eng_title">My Order</p>
                <p class="j_chinese_title ">我的訂單</p>
            </div>
            <P class="j_dashline"></P>
            <p class="d-flex justify-content-center j_eng_title2 j_padb_100">Those are what I adore </p>
        </div>  

         <div class="d-flex justify-content-center j_padb_200"> 
                <div class="member_left_list col-lg-2">
                    <ul>
                        <li class="leftlist_circle"><a href="member_information.php">會員資料修改</a></li>
                        <li class="leftlist_circle"><a href="member_wishlist.php">我的收藏</a></li>
                        <li class="leftlist_circle"><a href="member_order.php" style="color:#CA054D;">訂單查詢</a></li>
                        <li class="leftlist_circle"><a>我的優惠卷</a></li>
                    </ul>
                </div>


                <div class="col-lg-10">

                    <table class="table table-striped ">
                        <thead>
                        <tr>
                            <th scope="col">訂購日期</th>
                            <th scope="col">訂單編號</th>
                            <th class="j_mobile_noshow" scope="col">應付金額</th>
                            <th class="j_mobile_noshow" scope="col">付款方式</th>
                            <th scope="col">處理進度</th>
                            <th class="" scope="col">取消訂單</th>
                        </tr>
                        </thead>
                        <tbody>
                    
                        <!-- <tr>
                            <td>2020/04/08</td>
                            <td>A88925-321-01</td>
                            <td>100</td>
                            <td>轉帳</td>
                            <td>未付款</td>
                            <td><button class="j_cancel_btn">取消訂單</button></td>
                        </tr> -->

                        <?php foreach($rows as $r): ?>
                        <tr>
                            <td><?= $r['created_date'] ?></td>  
                            <td  id="j_href_order_num"><a  href="?order_num=<?= $r['order_num'] ?>"><?= $r['order_num'] ?></a></td>
                            <td class="j_mobile_noshow" ><?= $r['amount'] ?></td>
                            <td class="j_mobile_noshow"><?= $r['payment'] ?></td>
                            <td id="j_status"><?= $r['order_status']?></td>
                            <td class="j_mobile_noshow" ><button data-status="<?= $r['order_status']?>" class="j_cancel_btn">取消訂單</button></td>
                            <td><button class="j_cancel_btn_mobile ">取消</button></td>

                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table> 


                    <!-- 訂單細節 桌機 -->
                    <?php if($rows2!=[]){ ?>
                    <div class="j_mobile_noshow">
                   
                    <p class="j_ordernum_title">訂單編號:<?= $_GET['order_num'] ?></p>
                    <table class="table" id="">
                        
                        <thead>
                             <tr>
                                <th scope="col">商品</th>
                                <th scope="col">商品名稱</th>
                                <th scope="col">顏色</th>
                                <th scope="col">尺寸</th>
                                <th scope="col">金額</th>
                                <th scope="col">數量</th>
                                <th scope="col">小計</th>
                            </tr>
                        </thead>
                        <?php foreach($rows2 as $r2): 
                             $picArr = json_decode($r2["pro_pic"]["pro_pic"], JSON_UNESCAPED_UNICODE); ?>
                        <tbody>
                            <tr>         
                                <td>
                                    <img src="./images-2020/images/<?= $picArr[0]?>.png" alt="商品圖" class="j_productpic"  >
                                </td> 
                                <td><?= $r2['name'] ?></td>
                                <td><?=  $r2['color'] ?></td>
                                <td><?=  $r2['size'] ?></td>
                                <td><?=  $r2['price'] ?></td>
                                <td><?=  $r2['gty'] ?></td>
                                <td><?= $r2['gty']* $r2['price'] ?></td>
                            </tr>
                        </tbody>
                        <?php endforeach;?>
                    
                    </table> 
                    <p class="d-flex justify-content-end" style="font-weight:bold;">合計 NT:<?=  $r2['amount'] ?></p>
                    </div>
                        <?php } ?>

                </div>
                <!-- 訂單細節 手機板-->
                <div class="j_desk_noshow ">    
                   
                   <p class="j_ordernum_title">訂單編號:<?= $_GET['order_num'] ?></p>
                   <table class="table">
                       <thead>
                            <tr>
                               <th scope="col">訂購商品</th>
                               <th scope="col"></th>
                           </tr>
                       </thead>

                       <?php foreach($rows2 as $r2): 
                            $picArr = json_decode($r2["pro_pic"]["pro_pic"], JSON_UNESCAPED_UNICODE); ?>
                       <tbody>
                           <tr>         
                               <td>
                                   <img src="./images-2020/images/<?= $picArr[0]?>.png" alt="商品圖" class="j_productpic"  >
                               </td>

                               <td>
                                        <div>
                                            <?= $r2['name'] ?>
                                        </div>

                                        <div>
                                            <?=  $r2['color'] ?> &nbsp
                                            <?=  $r2['size'] ?>
                                        </div>

                                        <div>
                                            NT.<?=  $r2['price'] ?>&nbsp&nbsp
                                            <?=  $r2['gty'] ?>件
                                        </div>
                               </td>
                           </tr>
                       </tbody>
                       <?php endforeach;?>
                      
                   </table> 
                   <p class="d-flex justify-content-end" style="font-weight:bold;">合計 NT:<?=  $r2['amount'] ?></p>
                   </div>

        </div>
    </div>
 <?php include __DIR__ . '/parts/footer.php'; ?>    
</body>
</html> 
<?php include __DIR__ . '/parts/h_f_script.php'; ?>
<script>



$(".j_cancel_btn").click(function() {

    console.log($(this).data('status'))
    // return;
    if ( $(this).data('status')=="處理中未出貨") {
       $(this).css("background-color","gray");
       $(this).text("訂單已取消")
       

    } else {

        
   
    } 
  
});


</script>



