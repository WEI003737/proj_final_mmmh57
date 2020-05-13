<?php
require __DIR__. '/__connect_db.php';

$memSid = isset($_SESSION["sid"]) ? intval($_SESSION["sid"]) : '';
//歷史訂單
$rows_o = [];                                   
//$sql_o = "SELECT * FROM members JOIN orders ON members.sid = orders.mem_sid = 1";
$sql_o = "SELECT * FROM members JOIN orders ON members.sid = orders.mem_sid AND orders.mem_sid=".$_SESSION["sid"];                                                                        
$stmt = $pdo->query($sql_o);
$rows_o = $stmt->fetchAll();

//echo json_encode($sql_o);
//echo json_encode($rows_o);

//訂單細節 order_details
//$rows2 = [];
//if(isset($_GET['order_num'])){

//    $sql_o_d = "SELECT * FROM orders JOIN order_details ON orders.sid = order_details.order_sid where orders.mem_sid= ". $_SESSION['sid'] ;
//    if( isset($_GET['order_num']) ){
//        $sql_o_d .= " AND order_num = '".$_GET['order_num']."'";
//    }
//    $stmt2 = $pdo->query($sql_o_d);
//    $rows2 = $stmt2->fetchAll();


//echo json_encode($rows2);

////加入照片 order_details_picture
//$i=0;
//foreach($rows2 as $r2){
//    $sql_o_d_p = "SELECT `sid`,`pro_pic` FROM `color` WHERE `sid`= ". $r2['color_sid'];
//    $o_d_p_stmt = $pdo -> query($sql_o_d_p);
//    $o_d_p_row = $o_d_p_stmt -> fetch();
//    $rows2[$i]['pro_pic'] = $o_d_p_row;
//
//    $i++;
//};
//}
//echo json_encode($rows2);

$totalItems = 0;
$totalProductItems = 0;
$totalCustomizedItems = 0;
$orderProductsSid = [];
$orderCustomizedSid = [];


if(isset($_GET['order_num'])) {

        $a_orderNum = isset($_GET['order_num']) ? intval($_GET['order_num']) : 0;

        $i = 0;

        //訂單資訊
        $orderSql = "SELECT * FROM `orders` WHERE `order_num`= $a_orderNum";
        $orderRow = $pdo->query($orderSql)->fetchAll()[0];

        $a_orderSid = $orderRow["sid"];


        //訂單明細:普通商品
//        $orderProductsSql = "SELECT * FROM `order_details` WHERE `order_sid` = $lastOrderSid AND `is_cus` = '0'";
//        $orderProductsRows = $pdo->query($orderProductsSql)->fetchAll();



        //訂單明細:客製化
//        $orderCustomizedSql = "SELECT * FROM `order_details` WHERE `order_sid` = $lastOrderSid AND `is_cus` = '1'";
//        $orderCustomizedRows = $pdo->query($orderCustomizedSql)->fetchAll();
//
//        if ($orderCustomizedRows) {
//            $i = 0;
//            foreach ($orderCustomizedRows as $oc) {
//                $orderCustomizedSid[$i] = $oc["pro_sid"];
//                $i++;
//            }
//
//            foreach ($orderCustomizedSid as $ocSid) {
//                $orderCustomizedPicSql = sprintf("SELECT `pro_pic` FROM `customize` WHERE `sid` IN(%s)", implode(',', $orderCustomizedSid));
//                $orderCustomizedPicRows = $pdo->query($orderCustomizedPicSql)->fetchAll();
//            }
//
//            $j = 0;
//            foreach ($orderCustomizedRows as $oc) {
//                $orderCustomizedRows[$j]["pro_pic"] = $orderCustomizedPicRows[0];
//                $j++;
//
//            }
//
//            //數量
//            for ($k = 0; $k < count($orderCustomizedRows); $k++) {
//                $totalCustomizedItems += $orderCustomizedRows[$k]["gty"];
//            }
//        }

}
//    $numItems = count($orderProductsRows) + count($orderCustomizedRows);
//    $totalItems = $totalProductItems + $totalCustomizedItems;

echo json_encode($a_orderSid);
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

    tr.a_order_details td{
        vertical-align:middle;
    }

    @media screen and (max-width: 700px){
        table {font-size:12px}
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
    .j_productpic{width:120px; height:155px }
    .j_line{
        border-top:1.5px #CCC solid;
        height:10px;
        padding:10px;
    }

    @media screen and (max-width: 700px){
        .j_ordernum_title{font-size:16px}
        .j_productpic{width:90px; height:100px }
        .j_desk_noshow{display:block}
        .j_mobile_noshow{display:none;}
        .table{table-layout: fixed}
        a{word-break: break-all}
    }

  


</style>
<body>
<?php include __DIR__. '/parts/header.php';?>

<!-- 推出 header 空間-->
<div class="a_push_place"></div>
<div class="container">

    <!-- 手機 (左側標換到上方) -->
    <div id="member_left_list_totop" >
        <ul class="member_left_list_totop d-flex justify-content-between">
            <li class="leftlist_underline"><a href="member_information_card_noflipnew.php">會員資料修改</a></li>
            <li class="leftlist_underline"><i class="fas fa-key"></i><a href="member_changepw.php" >密碼修改</a></li>
            <li class="leftlist_underline"><a href="member_wishlist.php" >我的收藏</a></li>
            <li class="leftlist_underline"><a href="member_order.php" style="color:#CA054D;" >訂單查詢</a></li>
            <li class="leftlist_underline"><a href="member_coupon.php" >我的優惠卷</a></li>
        </ul>
    </div>  


    <div class="member_top_title">
        <div class="d-flex align-items-center justify-content-center j_padt_50">
            <p class="j_eng_title">My Order</p>
            <p class="j_chinese_title ">我的訂單</p>
        </div>
        <P class="j_dashline"></P>
        <p class="d-flex justify-content-center j_eng_title2 j_padb_100">Those are what I adore </p>
    </div>

    <div class="d-flex justify-content-center j_padb_200">

        <div class="member_left_list col-lg-2">
                <div class="leftlist_underline "><a href="member_information_card_noflipnew.php">會員資料修改</a></div>
                <div class="leftlist_underline"><i class="fas fa-key"></i><a href="member_changepw.php" >密碼修改</a></div>
                <div class="leftlist_underline"><a href="member_wishlist.php" >我的收藏</a></div>
                <div class="leftlist_underline"><a style="color:#CA054D;" >訂單查詢</a></div>
                <div class="leftlist_underline"><a href="member_coupon.php" >我的優惠卷</a></div>
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
                    <!-- <th class="" scope="col">取消訂單</th> -->
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
                <?php foreach($rows_o as $r): ?>
                    <tr>
                        <td><?= $r['created_date'] ?></td>
                        <td  id="j_href_order_num"><a  href="?order_num=<?= $r['order_num'] ?>"><?= $r['order_num'] ?></a></td>
                        <td class="j_mobile_noshow" ><?= $r['amount'] ?></td>
                        <td class="j_mobile_noshow"><?= $r['payment'] ?></td>
                        <td id="j_status"><?= $r['order_status']?></td>
                        <!-- <td class="j_mobile_noshow" ><button data-status="<?= $r['order_status']?>" class="j_cancel_btn">取消訂單</button></td>
                        <td><button class="j_cancel_btn_mobile ">取消</button></td> -->
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

            <div class="j_padb_50"></div>
            <!-- 訂單細節 桌機 -->
            <?php if($rows2!=[]){ ?>
                <div class="j_mobile_noshow">

                    <p class="j_ordernum_title">訂單編號:<?= $_GET['order_num'] ?></p>
                    <table class="table " id="">

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

                        <!-- ========================= 普通商品 ============================ -->

                        <?php foreach($rows2 as $r2):
                            $picArr = json_decode($r2["pro_pic"]["pro_pic"], JSON_UNESCAPED_UNICODE); ?>
                            <tbody>
                            <tr class="a_order_details">
                                <td>
                                    <img src="./product_images/<?= $picArr[0]?>.png" alt="商品圖" class="j_productpic"  >
                                </td>
                                <td><?= $r2['name'] ?></td>
                                <td>
                                    <div style="color: <?=  $r2['color'] ?>" >
                                        <i class="fas fa-circle t_color_size_between"></i>
                                    </div>
                                </td>
                                <td><?=  $r2['size'] ?></td>
                                <td>$ <?=  $r2['price'] ?></td>
                                <td><?=  $r2['gty'] ?></td>
                                <td>$ <?= $r2['gty']* $r2['price'] ?></td>
                            </tr>
                            </tbody>
                        <?php endforeach;?>
                    <!-- ========================= 客製化 ============================ -->
                        <tbody>
                        <tr class="a_order_details">
                            <td>
                                <img src="./product_images/<?= $picArr[0]?>.png" alt="商品圖" class="j_productpic"  >
                            </td>
                            <td><?= $r2['name'] ?></td>
                            <td>
                                <div style="color: <?=  $r2['color'] ?>" >
                                    <i class="fas fa-circle t_color_size_between"></i>
                                </div>
                            </td>
                            <td><?=  $r2['size'] ?></td>
                            <td>$ <?=  $r2['price'] ?></td>
                            <td><?=  $r2['gty'] ?></td>
                            <td>$ <?= $r2['gty']* $r2['price'] ?></td>
                        </tr>
                        </tbody>

                    </table>
                    <div class="j_line">
                    <p class="d-flex justify-content-end" style="font-weight:bold;">合計 NT:<?=  $r2['amount'] ?></p>
                    </div>
                </div>
            <?php } ?>


            <!-- 訂單細節 手機板-->
            <?php if($rows2!=[]){ ?>
            <div class="j_desk_noshow ">

                <p class="j_ordernum_title">訂單編號:<?= $_GET['order_num'] ?></p>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">訂購商品</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>


                    <!-- ========================= 普通商品 手機版 ============================ -->

                    <?php foreach($rows2 as $r2):
                        $picArr = json_decode($r2["pro_pic"]["pro_pic"], JSON_UNESCAPED_UNICODE); ?>
                        <tbody>
                        <tr>
                            <td>
                                <img src="./product_images/<?= $picArr[0]?>.png" alt="商品圖" class="j_productpic"  >
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

                    <!-- ========================= 客製化 手機版 ============================ -->


                </table>
                <div class="j_line  ">
                <p class="d-flex justify-content-end " style="font-weight:bold;">合計 NT:<?=  $r2['amount'] ?></p>
                </div>
            </div>
            <?php } ?>

        </div>

    </div>
    </div>

</body>
</html>

<?php include __DIR__ . '/parts/footer.php'; ?>
<?php include __DIR__ . '/parts/h_f_script.php'; ?>
<script>

//取消訂單 再點其他訂單時又會變回紅色

    $(".j_cancel_btn").click(function() {

        console.log($(this).data('status'))
        // return;
        if ( $(this).data('status')=="處理中") {
            $(this).css("background-color","gray");
            $(this).text("訂單已取消")


        } else {

        }

    });


    $(".j_cancel_btn_mobile").click(function() {

        console.log($(this).data('status'))
        // return;
        if ( $(this).data('status')=="處理中未出貨") {
            $(this).css("background-color","gray");
            $(this).text("訂單已取消")

} else {

}

});

</script>



