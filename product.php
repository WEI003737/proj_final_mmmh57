<?php
require __DIR__ . '/__connect_db.php';
$page_name = 'product';

//-----------------------------商品資料---------------------------------
//商品列表頁取得的編號 -> sid
$weaProductNum = isset($_GET['sid']) ? intval($_GET['sid']) : 1;
//商品sql -> product表
$weaProductSql = sprintf("SELECT * FROM `products` WHERE `sid` = $weaProductNum");
//商品資料陣列
$weaProductStmt = $pdo -> query($weaProductSql);
$weaProduct = $weaProductStmt -> fetch(); 

$prodColors = $pdo -> query("SELECT * FROM `color` WHERE pro_sid=". $weaProductNum)
            ->fetchAll();

$color_sids = [];

foreach($prodColors as $c){
    $color_sids[] = $c['sid'];
}

$size_sql = sprintf("SELECT * FROm `size` WHERE color_sid IN (%s)", implode(',', $color_sids));
$prodSizes = $pdo -> query($size_sql)
            ->fetchAll();

//
////設定size stock給按鈕用陣列
//$a_colorWithSizeForCart = $prodColors;
//$i=0;
//foreach($a_colorWithSizeForCart as $cs){
//    $a_size_sql = "SELECT * FROM `size` WHERE `color_sid` = ".$cs["sid"];
//    $a_prodSizes = $pdo -> query($a_size_sql)
//        ->fetchAll();
//    $a_colorWithSizeForCart[$i]["stock"] = $a_prodSizes;
//    $i++;
//}

//  echo json_encode($a_colorWithSizeForCart, JSON_UNESCAPED_UNICODE);

// $colorArrAll =[];
// foreach($prodColors as $c){
//     $colorArrAll[] = json_decode($c['pro_pic']);
// }
$colorSecondaryImg = json_decode($prodColors[0]['pro_pic']);


// //加入款式的顏色數量
// // foreach($weaProduct as $weaValue){
//     $weaColorLengthSql = $pdo -> query("SELECT *,count(pro_sid) FROM `color` WHERE `pro_sid`= "./*$weaValue["sid"]*/$weaProduct["sid"]." GROUP BY `pro_sid`");
//     $weaColorLength = $weaColorLengthSql -> fetch();
//     $weaProduct["colorLength"] = $weaColorLength['count(pro_sid)'];

//     //加入顏色陣列
//     //加入顏色照片陣列
//     $weaColorArrSql = $pdo -> query("SELECT `color`,`sid` AS `color_sid`,`pro_pic`  FROM `color` WHERE `pro_sid`= ".$weaProduct["sid"]." ORDER BY `sid`");
//     $weaColorArr = $weaColorArrSql -> fetchAll();
//     $weaProduct["colorArr"] = $weaColorArr;

//     //尺寸跟庫存
//     $n=0;
//         foreach($weaProduct["colorArr"] as $weaColor){
//             $weaSizeSql = $pdo->query("SELECT `sid` AS `size_sid`, `size`,`in_stock` FROM `size` WHERE `color_sid`= " . $weaColor["color_sid"]." ORDER BY `sid` ");
//             $weaSizeArr = $weaSizeSql -> fetchAll();
//             $weaProduct["colorArr"][$n]["size"] = $weaSizeArr;
//             $n++;
//         }
// // }

//  echo json_encode($weaProduct, JSON_UNESCAPED_UNICODE);

//-----------------------------推薦商品---------------------------------
//抓取隨機6件推薦商品sql -> product表
$weaRecommendSql = sprintf("SELECT * FROM `products` WHERE `sid` != $weaProductNum && `cate_sid`= ". $weaProduct["cate_sid"] ." order by rand() limit 6");
//推薦商品資料陣列
$weaRecommendStmt = $pdo -> query($weaRecommendSql);
$weaRecommend = $weaRecommendStmt -> fetchAll();
//推薦商品顏色
$weaRecommendColor = [];
//  = $pdo -> query("SELECT * FROM `color` WHERE pro_sid=". $weaRecommend["sid"]) ->fetchAll();
foreach($weaRecommend as $R){
    $weaRecommendColor[] = $pdo -> query("SELECT * FROM `color` WHERE pro_sid=". $R["sid"]) ->fetchAll();
}
// echo json_encode( $weaRecommendColor, JSON_UNESCAPED_UNICODE);

?>

<!doctype html>
<html lang="en">
  <head>
    <title>product</title>
    <!-- Required meta tags -->
    <?php include __DIR__.'/parts/h_f_link.php' ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"> -->
  </head>
  <?php include __DIR__.'/parts/h_f_css.php' ?>
  <style>
    /* * {
        outline: #FA8000 solid 1px;
    } */
    .show-mobile-768{
        display: none;
    }
    @media screen and (max-width: 768px){
        .show-desktop-768{
            display: none;
        }
        .show-mobile-768{
            display: block;
        }
    }
    .wea_wrapper{
        max-width: 1440px;
        margin:0 auto;
    }
    h1,h2,h3,h4,h5,h6,p{
        padding: 0;
        margin: 0;
    }
    ul,li{
        list-style: none;
        padding: 0;
        margin: 0;
    }
    a, a:link{
        color:#272838;
        display: block;
        text-decoration: none;
        font-size: 18px;
    }
    a:hover,a:active{
        color: #CA054D;
    }
    h1{
        font-size: 90px;
    }
    h2{
        font-size: 72px;
    }
    h3{
        font-size: 54px;
    }
    h4{
        font-size: 36px;
    }
    h5{
        font-size: 20px;
    }
    h6{
        font-size: 18px;
    }
    p{
        font-size: 15px;
    }
    .pink{
        background: pink;
    }
    .gray{
        background: #B7B7B7;
    }
    .black{
        background: black;
    }
    .red{
        background: red;
    }
    .orange{
        background: orange;
    }
    .yellow{
        background: yellow;
    }
    .green{
        background: green;
    }
    .blue{
        background: blue;
    }
    .purple{
        background: purple;
    }
    .brown{
        background: brown;
    }
    .white{
        background: #F6F4F4;
    }
    
    /* ================================= 商品主區塊 =================================== */
    .wea_product_main{
        /* background: wheat; */
        margin-top: 40px;
    }
    .wea_product_main_imgarea{
        width: 50%;
    }
    .wea_product_main_imgbar{
        margin-right: 20px;
    }
    .wea_product_main_imgbar li{
        width:12px;
        height: 75px;
        margin-bottom: 15px;
        background: #CA054D;
        opacity: .2;
    }
    .wea_product_main_imgbar li.active{
        opacity: 1;
    }
    .wea_product_main_img_hidden{
        width: 75%;
        height: 720px;
        overflow: hidden;
    }
    .wea_product_main_img{
        height: 100%;
        left: 0;
        transition: .5s;
    }
    .wea_product_main_img li{
        flex: 1 0 0;
    }
    .wea_product_main_img img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: .5s;
    }
    .wea_product_main_wordarea{
        width: 50%;
        padding: 20px 10% 20px 5%;
    }
    .wea_product_main_wordarea_name h4{
        margin-bottom: 4px;
    }
    .wea_product_main_wordarea_name i{
        transform: scale(1.2);
        color: #840032;
        margin:0 8px;
    }
    .wea_product_main_wordarea>div>h5{
        color:#CA054D;
    }
    .wea_product_main_wordarea_line{
        margin-bottom: 15px;
        color: #B7B7B7;
    }
    .wea_product_main_wordarea_sizeform{
        display: none;
        color: #C9044D;
    }
    .wea_product_main_wordarea_sizeform i:first-child{
        margin-right: 4px;
    }
        @media screen and (max-width: 1130px){
            .wea_product_main_wordarea_sizeform{
            display: block;
            }
        }
    .wea_product_main_collapse_tital{
        margin-bottom: 10px;
        padding: 0 8px;
    }
    .wea_product_main_collapse_content{
        padding: 0 8px;
        display: block;
        height: 100%;
        transition: .5s;
    }
    .wea_product_main_selectarea{
        padding: 0 8px;
    }
    .wea_product_main_selectarea ul{
        margin-top:20px;
    }
    .wea_product_main_selectarea ul h6{
        width: 60px;
    }
    .wea_product_main_color div.active{
        border: 2px solid #CA054D;
    }
    .wea_product_main_color div{
        width: 30px;
        height: 30px;
        border-radius: 50%;
        margin-right: 10px;
    }
    .wea_product_main_size div{
        width: 48px;
        height: 30px;
        border: 1px solid #840032;
        color: #840032;
        background: white;
        text-align: center;
        line-height: 30px;
        margin-right: 10px;
        -webkit-user-select:none;
    }
    .wea_product_main_size div.active{
        border: none;
        background: #CA054D;
        color: white;
    }
    .wea_product_main_size div.unckick{
        border: none;
        background: #d8d8d8;
        color: white;
    }
    @media screen and (max-width: 1130px){
        .wea_product_main_size_form{
        display: none;
        }
    }
    .wea_product_main_size i{
        margin-left: 4px;
        color: #CA054D;
    }
    .wea_product_main_size i span{
        margin-left: 2px;
    }
    .wea_product_main_count div{
        width: 30px;
        height: 30px;
        border: 1px solid #CA054D;
        background: #CA054D;
        color: white;
        text-align: center;
        line-height: 30px;
        -webkit-user-select:none;
    }
    .wea_product_main_count div.unckick{
        border: 1px solid #d8d8d8;
        background: #d8d8d8;
        color: white;
    }
    .wea_product_main_count #countnum{
        width: 90px;
        background: white;
        color: #CA054D;
    }
    .wea_product_main_checkout a{
        width: 48%;
    }
    .wea_product_main_checkout div{
        margin-top: 30px;
        width: 100%;
        height: 45px;
        background: #CA054D;
        color: white;
        line-height: 45px;
        text-align: center;
        -webkit-user-select:none;
    }
    @media screen and (max-width:768px){
        
        .wea_product_main{
            flex-direction: column;
        margin-top: 0px;

        }
        .wea_product_main_imgarea{
            width: 100%;
        }
        .wea_product_main_imgbar{
            display: none;
        }
        .wea_product_main_img_hidden{
        width: 100%;
        height: 480px;
        object-fit: cover;
    }
        .wea_product_main_wordarea{
        width: 100%;
        padding: 20px 5% 60px 5%;
    }
    }
    @media screen and (max-width: 468px){
        .wea_product_main_wordarea_name h4{
            font-size: 24px;
        }
        .wea_product_main_wordarea_name h6{
            font-size: 18px;    
        }
        
    .wea_product_main_selectarea ul{
        margin-top:18px;
    }
    .wea_product_main_selectarea ul h6{
        width: 54px;
    }
    .wea_product_main_checkout div{
        margin-top: 20px;
    }
    }
    /* ================================= 商品介紹區 =================================== */
    .wea_product_secondary{
        width: 100%;
        height: 2100px;
        overflow: hidden;
    }
    .wea_product_secondary_img{
        height: 1500px;
        /* border: 1px solid violet; */
    }
    .wea_product_secondary_img.one{
        width: 40%;
        /* background: url("img/pk_1.png"); */
        background-position: center;
        background-size: cover;
    }
    .wea_product_secondary_img.three{
        width: 40%;
        /* background: url("img/pk_3.png"); */
        background-position: center;
        background-size: cover;
    }
    .wea_product_secondary_img.four{
        width: 60%;
        /* background: url("img/pk_4.png"); */
        background-position: center;
        background-size: cover;
    }
    .wea_product_secondary_img_two_area{
        width: 60%;
    }
    .wea_product_secondary_img.two{
        width: 100%;
        height: 800px;
        /* background: url("img/pk_2.png"); */
        background-position: center;
        background-size: cover;
    }
    /* .wea_product_secondary_img.two>div{
        width: 100%;
        height: 320px;
        left: 0;
        bottom: 0;
        background: white;
    } */
    .wea_product_secondary_imgarea_down{
        top: -240px;
        left: 0;
    }
    .wea_product_secondary_img_direction{
        width: 100%;
        height: 240px;
        padding: 50px 5% 50px 10%;
        padding-left: 10%;
        background:linear-gradient(to left,#CA054D 30%,rgba(132, 0, 50,.2) 100%);
        color: white;
    }
    .wea_product_secondary_img_direction h4{
        margin-bottom: 12px;
    }
    .wea_product_secondary_img_direction h6{
        font-weight: normal;
        line-height: 120%;
    }
    .wea_product_secondary_whitebar{
        top:-312px;
        right: 0;
        width: 60%;
        height: 72px;
        background: white;
    }
    .wea_product_secondary_material{
        top: -850px;
        left:calc( -420px + 5%);
        width: 1000px;
        height: 180px;
        text-align: end;
        /* background-color: aqua; */
        transform: rotate(90deg);
        color: white;
        text-shadow: 0 0 5px #CA054D;
    }
    .wea_product_secondary_img_colortext{
        margin:15px 0 0 30px;
        color:#CA054D;
    }
    .wea_product_secondary_mask{
        /* overflow: hidden; */
        top: 4px;
        left: -4px;
        width: 100vw;
        height: 105vw;
        background: white;
        transform-origin: top left;
        transform: rotate(-72deg);
    }
    .wea_product_secondary_mask>div:first-child{
        width: 100%;
        height: 100%;
        border-left:3px solid #CA054D;
    }
    .wea_product_mask_unlinearea{
        bottom: 5%;
        left: -1px;
        width: 200px;
        height: 450px;
        background: white;
    }
    .wea_product_secondary_tital{
        left: 50%;
        transform-origin: top left;
        transform: rotate(72deg);
        /* padding: 20px; */
        text-align: right;
        line-height: 98%;
        color: #CA054D;
    }
    /* 手機板 */
    /* .wea_product_secondary_img_mobile{
        height: 600px;
    } */
    .wea_product_secondary_img_mobile.one{
        width: 100%;
        height: 650px;
        /* background: url("img/pk_1.png"); */
        background-position: center;
        background-size: cover;
    }
    .wea_product_secondary_img_direction_mobile{
        bottom: 0;
        left: -5%;
        width: 100%;
        height: 150px;
        padding: 20px 5% 20px 10%;
        padding-left: 10%;
        background:linear-gradient(to left,#CA054D 0%,rgba(132, 0, 50,.2) 100%);
        color: white;
    }
    .wea_product_secondary_img_direction_mobile h4{
        margin-bottom: 12px;
        font-size: 24px;
    }
    .wea_product_secondary_img_direction_mobile h6{
        font-weight: normal;
        line-height: 120%;
        font-size: 15px;
    }
    .wea_product_secondary_material_mobile{
        top: -620px;
        left:calc( -530px + 5%);
        width: 1000px;
        height: 180px;
        text-align: end;
        /* background-color: aqua; */
        transform: rotate(90deg);
        color: white;
        text-shadow: 0 0 5px #CA054D;
    }
    .wea_product_secondary_material_mobile h2{
        font-size: 36px;
    }
    .wea_product_secondary_img_mobile.four{
        width: 60%;
        height: 300px;
        /* background: url("img/pk_4.png"); */
        background-position: center;
        background-size: cover;
    }
    .wea_product_secondary_img_mobile_twoarea{
        width: 40%;
    }
    .wea_product_secondary_img_mobile.two{
        width: 100%;
        height: 150px;
        /* background: url("img/pk_2.png"); */
        background-position: center;
        background-size: cover;
    }
    .wea_product_secondary_img_colortext_mobile{
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        height: 150px;
        margin-left: 10px;
        color: #C9044D;
    }
    .wea_product_secondary_img_colortext_mobile h4:last-child{
       margin-bottom: 4px;
    }
    .wea_product_secondary_img_mobile.three{
        width: 100%;
        height: 700px;
        /* background: url("img/pk_3.png"); */
        background-position: center;
        background-size: cover;
    }
    @media screen and (max-width:768px){
        .wea_product_secondary{
        height: 1400px;
    }
    
        .wea_product_mask_unlinearea{
        bottom: 5%;
        left: -1px;
        width: 200px;
        height: 350px;
        background: white;
    }
    .wea_product_secondary_tital{
            font-size: 72px;
            left: 30%;
        }
    }
    @media screen and (max-width:468px){
        .wea_product_secondary{
        height: 1150px;
    }
        .wea_product_mask_unlinearea{
       
        width: 200px;
        height: 220px;
    
    }
        .wea_product_secondary_tital{
            font-size: 40px;
            left: 20%;
            margin-top: 5%;
        }
        .wea_product_secondary_img_mobile.one{
        height: 550px;
    }
    .wea_product_secondary_img_direction_mobile{
        bottom: 0;
        left: -5%;
        width: 100%;
        height: 120px;
        padding: 15px 5% 15px 10%;
    }
    .wea_product_secondary_img_direction_mobile h4{
        font-size: 20px;
        margin-bottom: 8px;
    }
    .wea_product_secondary_img_direction_mobile h6{
        font-size: 15px;
    }
        .wea_product_secondary_material_mobile{
        top: -620px;
        left:calc( -540px + 5%);
        width: 1000px;
        height: 180px;
    }
    .wea_product_secondary_material_mobile h2{
        font-size: 30px;
    }
    .wea_product_secondary_img_mobile.four{
        height: 200px;
    }
    .wea_product_secondary_img_mobile.two{
        height: 100px;
    }
    .wea_product_secondary_img_colortext_mobile{
        height: 100px;
    }
    .wea_product_secondary_img_colortext_mobile h4{
        font-size: 24px;
    }
    .wea_product_secondary_img_mobile.three{
        width: 100%;
        height: 400px;
    }
    }
    /* ========================================= 推薦區 ========================================= */
    .wea_zoning_line{
        width: 120px;   
        margin: 120px auto;
        border-bottom: 5px solid #CA054D;
    }
    .wea_product_third>h2{
        text-align: center;
        color: #CA054D;
    }
    .wea_product_third>h4{
        text-align: center;
        margin-bottom: 72px;
    }
    .wea_recommend_area_hidden{
        width: 98%;
        height: 500px;
        padding: 0 20px;
        margin:0 auto 144px;
        overflow: hidden;
    }
    .wea_recommend_area{
        position: absolute;
        width: 150%;
        top : 0;
        left: -25%; 
        transition: .5s;        
    }
    @media screen and (max-width:1440px){
        .wea_recommend_area_hidden{
            height: 40vw;
            margin:0 auto 60px;
        }
    }
    @media screen and (max-width:768px){
        .wea_zoning_line{
        width: 40px;   
        margin: 60px auto 40px;
        border-bottom: 3px solid #CA054D;
    }
    .wea_product_third>h2{
        font-size: 36px;
    }
    .wea_product_third>h4{
        font-size: 24px;
        margin-bottom: 40px;
    }
    .wea_recommend_area_hidden{
        width: 100%;
        height: 100%;
        padding: 0;
        overflow: visible;
    }
    .wea_recommend_area{
        position: static;
        width: 100%;       
    }
    }
    @media screen and (max-width:432px){
        .wea_zoning_line{
        width: 40px;   
        margin: 60px auto 40px;
        border-bottom: 3px solid #CA054D;
    }
    .wea_product_third>h2{
        font-size: 30px;
    }
    .wea_product_third>h4{
        font-size: 18px;
        margin-bottom: 30px;
    }
    }
    /* ======================================= 商品 ======================================= */
    .wea_recommend_area li{
        width: 24%;
        margin:0 0.5%;
    }
    .wea_recommend_item{
        /* flex-grow: 1; */
        margin-bottom: 30px;
    }
    .wea_recommend_item img{
        width: 100%;
    }
    .wea_recommend_item i{
        right: 0;
        top: 0;
        margin: 20px;
        transform: scale(1.5);
        color: #C9044D;
    }
    .wea_recommend_item>p{
        margin-top: 4px;
    }
    .wea_recommend_item_price{
        color: #C9044D;
        flex-grow: 1;
    }
    .wea_recommend_item_color{
        width: 20px;
        height: 20px;
        border-radius: 50%;
        margin-left: 8px;
    }
    /* .wea_recommend_item_color.pink{
        background: #ffb6b6;
    }
    .wea_recommend_item_color.gray{
        background: #bebebe;
    } */
    @media screen and (max-width:768px){
        .wea_recommend_area{
            flex-wrap: wrap;
            padding: 0 5%;
            margin-bottom: 40px;
        }
        .wea_recommend_area li{
        width: 48%;
         margin-bottom: 24px;
    }
    .wea_recommend_item{
        margin-bottom: 20px;
    }
    .wea_recommend_item i{
        right: 0;
        top: 0;
        margin: 5%;
        transform: scale(1.2);
        color: #C9044D;
    }
    }
    /* 左切換圖片按鈕 */
    .wea_recommend_item_leftarrow{
        top: 0;
        left:0;
        width: 3%  !important;
        height: 60%;
        margin-left: 20px;
        padding-top: 12%;
    }
    .wea_recommend_item_leftarrow_show{
        display: flex ;
        border-radius: 10px 0 0 10px;
        width: 100%;
        height: 50%;
        transition: .5s;
    }
    .wea_recommend_item_leftarrow_show i{
        margin: auto;
        transform-origin: top left;
        color: white;
    }
    .wea_recommend_item_leftarrow:hover .wea_recommend_item_leftarrow_show{
        transform: translateX(-15px);
        background: #C9044D;
    }
    /*  右切換圖片按鈕 */
    .wea_recommend_item_rightarrow{
        top: 0;
        right:0;
        width: 3%  !important;
        height:60%;
        margin-right: 20px;
        padding-top: 12%;
    }
    .wea_recommend_item_rightarrow_show{
        display: flex ;
        border-radius:0 10px 10px 0;
        width: 100%;
        height: 50%;
        transition: .5s;
    }
    .wea_recommend_item_rightarrow_show i{
        margin: auto;
        transform-origin: top right;
        color: white;
    }
    .wea_recommend_item_rightarrow:hover .wea_recommend_item_rightarrow_show{
        transform: translateX(15px);
        background: #C9044D;
    }
    /* ================================= 消失物件 display:none =================================== */
    .display_none{
        display: none;
    }
  </style>
  <body>
  <?php include __DIR__.'/parts/header.php' ?>
    <!-- =============================== 商品主區塊 ===================================  -->


      <!-- 推出 header 空間-->
      <div class="a_push_place"></div>

    <div class="wea_wrapper wea_product_main d-flex ">
        <div class="wea_product_main_imgarea d-flex justify-content-end">
            <ul class="wea_product_main_imgbar">
                <!-- <li></li> -->
                
            </ul>
            <div class="wea_product_main_img_hidden position-relative">
                <ul class="wea_product_main_img d-flex position-absolute">
                    <!-- <li><img src="img/0.png" alt=""></li> -->
                </ul>
            </div>
            
            <!-- <img class="wea_product_main_img" src="img/0.png"> -->
        </div>
        <div class="wea_product_main_wordarea d-flex flex-column justify-content-between">
            <!-- 上方說明區域 -->
            <div>
                <div class="wea_product_main_wordarea_name d-flex align-items-center justify-content-between" >
                    <h4><?=$weaProduct['name']?></h4>
                    <?php if(isset($_SESSION["loginUser"])): ?>
                        <!-- <i class="far fa-heart"></i> -->
                        <i class="a_add_to_like_unactive far fa-heart a_product_like " data-sid="<?=$weaProduct['sid']?>"></i>
                        <i class="a_add_to_like_active fas fa-heart display_none a_product_like" data-sid="<?=$weaProduct['sid']?>"></i>
                    <?php endif; ?>
                </div>
                
                <h5>NT$ <?=$weaProduct['price']?></h5>
                <hr class="wea_product_main_wordarea_line">
                <div>
                    <div class="d-flex justify-content-between wea_product_main_collapse_tital">
                        <h6>商品特色</h6>
                        <i class="fas fa-chevron-up"></i>
                    </div>
                    <p class="wea_product_main_collapse_content"><?=$weaProduct['intro']?></p>
                    <hr class="wea_product_main_wordarea_line">
                </div>
                <div>
                    <div class="d-flex justify-content-between wea_product_main_collapse_tital">
                        <h6>商品材質</h6>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <p class="display_none wea_product_main_collapse_content"><?=$weaProduct['material']?></p>
                    <hr class="wea_product_main_wordarea_line">
                </div>
                <div>
                    <div class="d-flex justify-content-between wea_product_main_collapse_tital">
                        <h6>保養方式</h6>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <p class="display_none wea_product_main_collapse_content"><?=$weaProduct['take_care']?></p>
                    <hr class="wea_product_main_wordarea_line">
                </div>
                <div class="wea_product_main_wordarea_sizeform">
                    <div class="d-flex justify-content-between wea_product_main_collapse_tital">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-question-circle"></i>
                            <h6>尺寸表</h6>
                        </div>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <hr class="wea_product_main_wordarea_line">
                </div>
            </div>
            <!-- 下方訂購區 -->
            <div class="wea_product_main_selectarea">
                <ul class="wea_product_main_color d-flex align-items-center">
                    <li><h6>顏色</h6></li>
                    <!-- <li><a><div class="pink active"></div></a></li>
                    <li><a><div class="gray"></div></a></li> -->
                    <?php foreach($prodColors as $row) : ?>
                        <li><a><div class="<?= $row['color']?>" data-color="<?= $row['color']?>" data-colorsid="<?= $row['sid']?>"></div></a></li>
                    <?php endforeach;?>
                </ul>
                <ul class="wea_product_main_size d-flex align-items-center">
                    <li><h6>尺寸</h6></li>
                    <li><a><div data-size="XS" data-stock="" data-sizenum="" class="clothesSize active">XS</div></a></li>
                    <li><a><div data-size="S" data-stock="" data-sizenum="" class="clothesSize">S</div></a></li>
                    <li><a><div data-size="M" data-stock="" data-sizenum="" class="clothesSize">M</div></a></li>
                    <li><a><div data-size="L" data-stock="" data-sizenum="" class="clothesSize">L</div></a></li>
                    <li class="wea_product_main_size_form"><a><i class="fas fa-question-circle"><span>尺寸表</span></i></a></li>
                </ul>
                <ul class="wea_product_main_count d-flex align-items-center">
                    <li><h6>數量</h6></li>
                    <li><a><div id="minus" >-</div></a></li>
                    <li><div id="countnum">1</div></li>
                    <li><a><div id="plus">+</div></a></li>
                </ul>
                <div class="wea_product_main_checkout d-flex align-items-center justify-content-between">
                    <a><div id="checkout" onclick="proGoToCart(event)">立即購買</div></a>
                    <a><div id="add_to_car" onclick="proAddToCart(event)">加入購物車</div></a>
                </div>
            </div>
        </div>
    </div>
    <!-- =============================== 商品介紹區 ===================================  -->
    <div class="wea_product_secondary position-relative">
        <div class="show-desktop-768 wea_product_secondary_imgarea">
            <div class="d-flex">
                <div style="background: url('product_images/<?= $colorSecondaryImg[1]?>.png');background-position: center;
        background-size: cover;" class="wea_product_secondary_img one"></div>
                <div style="background: url('product_images/<?= $colorSecondaryImg[count($colorSecondaryImg)-1]?>.png');background-position: center;
        background-size: cover;" class="wea_product_secondary_img four">
                    <!-- <div class="position-absolute"></div> -->
                </div>
            </div>
            <div class="position-relative">
                <div class="position-absolute wea_product_secondary_imgarea_down">
                    <div class="d-flex">
                        <div class="wea_product_secondary_img_two_area">
                            <div class="wea_product_secondary_img_direction">        
                                <h4>#舒適 ＃清透 ＃性感</h4>
                                <h6>無論是瑜珈、戶外慢跑，都可以讓你舒適享受！夏天給你感受不一樣的涼感體驗！布料選擇透氣的某材質，吸水性強、風乾快，伴隨您運動的好夥伴！無論是瑜珈、戶外慢跑，都可以讓你舒適享受！夏天給你感受不一樣的涼感體驗！</h6>    
                            </div>
                            <div style="background: url('product_images/<?= $colorSecondaryImg[count($colorSecondaryImg)-2]?>.png');background-position: center;
        background-size: cover;" class="wea_product_secondary_img two"></div>
                        </div>
                        <div style="background: url('product_images/<?= $colorSecondaryImg[0]?>.png');background-position: center;
        background-size: cover;" class="wea_product_secondary_img three">
                            <div class="wea_product_secondary_img_colortext">
                                <!-- <h3>ROSEPINK</h3>
                                <h3>GRAY</h3> -->
                                <?php foreach($prodColors as $row) : ?>
                                <h3><?= $row['color']?></h3>
                                <?php endforeach;?>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="position-absolute wea_product_secondary_whitebar"></div>
                <div class="position-absolute wea_product_secondary_material">
                    <h2>COTTON 80%</h2>
                    <h2>POLYESTER FIBER 20%</h2>
                </div>
            </div>
        </div>
        <!-- 手機板 -->
        <div class="show-mobile-768 wea_product_secondary_imgarea_mobile">
            <div style="background: url('product_images/<?= $colorSecondaryImg[1]?>.png');background-position: center;
        background-size: cover;" class="wea_product_secondary_img_mobile one position-relative">
                <div class="wea_product_secondary_img_direction_mobile position-absolute"> 
                    <div class="position-relative">
                        <div class="position-absolute wea_product_secondary_material_mobile">
                            <h2>COTTON 80%</h2>
                            <h2>POLYESTER FIBER 20%</h2>
                        </div>
                    </div>       
                    <h4>#舒適 ＃清透 ＃性感</h4>
                    <h6>無論是瑜珈、戶外慢跑，都可以讓你舒適享受！夏天給你感受不一樣的涼感體驗！夏天給你感受不一樣的涼感體驗！</h6>    
                </div>
            </div>
            <div class="d-flex">
                <div style="background: url('product_images/<?= $colorSecondaryImg[count($colorSecondaryImg)-1]?>.png');background-position: center;
        background-size: cover;" class="wea_product_secondary_img_mobile four"></div>
                <div class="wea_product_secondary_img_mobile_twoarea">
                    <div style="background: url('product_images/<?= $colorSecondaryImg[count($colorSecondaryImg)-2]?>.png');background-position: center;
        background-size: cover;" class="wea_product_secondary_img_mobile two"></div>
                    <div class="wea_product_secondary_img_colortext_mobile">
                        <?php foreach($prodColors as $row) : ?>
                            <h4><?= $row['color']?></h4>
                        <?php endforeach;?>
                    </div> 
                </div>
            </div>
            <div style="background: url('product_images/<?= $colorSecondaryImg[0]?>.png');background-position: center;
        background-size: cover;" class="wea_product_secondary_img_mobile three"></div>
        </div>
        <!-- 斜線遮罩 -->
        <div class="wea_product_secondary_mask position-absolute">
            <div></div>
            <div class="wea_product_mask_unlinearea position-absolute">
                <div class="position-relative">
                    <h1 class="wea_product_secondary_tital position-absolute">burnning<br>plainet<br>bar</h1>
                </div>
            </div>
        </div>  
    </div>
    <!-- ====================================== 推薦區 =======================================  -->
    <div class="wea_wrapper wea_product_third">
        <div class="wea_zoning_line"></div>
        <h2>YOU MAY ALSO LIKE</h2>
        <h4>時尚新趨勢</h4>
        <div class="position-relative">
            <div class="wea_recommend_area_hidden position-relative">
                <ul class="wea_recommend_area d-flex justify-content-between">
                    <?php $i=0; foreach($weaRecommend as $R) : ?>
                        <li class="wea_recommend_item position-relative desktop">
                        <?php $recommendMainImg = json_decode($weaRecommendColor[$i][0]["pro_pic"]);?>
                            <a href="./product.php?sid=<?= $R["sid"] ?>">
                                <img src="product_images/<?=$recommendMainImg[0]?>.png" alt="">
                            </a>
                        <!-- $colorSecondaryImg = json_decode($prodColors[0]['pro_pic']); -->
                        <?php if(isset($_SESSION["loginUser"])): ?>
                        <i class="a_add_to_like_unactive far fa-heart position-absolute" data-sid="<?=$R['sid']?>"></i>
                        <i class="a_add_to_like_active fas fa-heart position-absolute display_none" data-sid="<?=$R['sid']?>"></i>
                        <?php endif; ?>
                        <p><?=$R["name"]?></p>
                        <div class="d-flex justify-content-between">
                            <p class="wea_recommend_item_price">NT$ <?=$R["price"]?></p>
                            <?php foreach($weaRecommendColor[$i] as $RC) :
                                $hoverImg = json_decode($RC["pro_pic"]);?>
                                <div data-hoverimg='product_images/<?= $hoverImg[0]?>.png' class="wea_recommend_item_color <?= $RC['color']?>"></div>
                            <?php endforeach;?>
                            <!-- <div class="wea_recommend_item_color pink"></div>
                            <div class="wea_recommend_item_color gray"></div> -->
                        </div>
                    </li>
                    <?php $i++; endforeach;?>
                    <!-- <li class="wea_recommend_item position-relative desktop">
                        <img src="img/0.png" alt="">
                        <i class="far fa-heart position-absolute"></i>
                        <i class="fas fa-heart position-absolute display_none"></i>
                        <p>後綁帶短袖上衣</p>
                        <div class="d-flex justify-content-between">
                            <p class="wea_recommend_item_price">NT1340</p>
                            <div class="wea_recommend_item_color pink"></div>
                            <div class="wea_recommend_item_color gray"></div>
                        </div>
                    </li> -->
                    
                </ul>
            </div>
            <div class="show-desktop-768 position-absolute wea_recommend_item_leftarrow">
                <div class="wea_recommend_item_leftarrow_show">
                    <i class="fas fa-chevron-left"></i>
                </div>   
            </div>
            <div class="show-desktop-768 position-absolute wea_recommend_item_rightarrow">
                <div class="wea_recommend_item_rightarrow_show">
                    <i class="fas fa-chevron-right"></i>
                </div>   
            </div>
        </div>
    </div>
    <?php include __DIR__.'/parts/footer.php' ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <?php include __DIR__.'/parts/h_f_script.php' ?>
    <!-- 滑動圖片 -->
    <script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>
    

    <script>
    var weaProduct = <?= json_encode($weaProduct) ?>;
    var prodColors = <?= json_encode($prodColors) ?>;
    var prodSizes = <?= json_encode($prodSizes) ?>;
    //目前選取的顏色
    var selectColorSid;
    var selectColorData;
    //目前選取的顏色圖片
    var selectColorimg = [];
    //目前選取的顏色size資料
    var selectColorSizes;
    var selectSizeSid;
    //目前選取的顏色size庫存
    var stockNum = 0; 
    //目前選取的數量
    var selectCountNum = document.getElementById("countnum").innerHTML;

    //載入預設值
    const firstLoadColor = $(".wea_product_main_color li").has("div").eq(0);
    const firstColorSid = firstLoadColor.find("div").data('colorsid');
    // console.log(firstColorSid)
     selectColorSizes = prodSizes.filter(prodSizes => prodSizes.color_sid == firstColorSid);
    // 存取圖片資料
    selectColorData = prodColors.find(prodColors => prodColors.color == firstLoadColor.find("div").data('color'));
    // selectColorimg = selectColorData.pro_pic.split(",");
    selectColorimg = JSON.parse(selectColorData.pro_pic);
    //  console.log(selectColorSizes);
    //  console.log(selectColorData);

    //將size sid 及 庫存藏入按鈕
    for(let $i=0; $i<selectColorSizes.length; $i++) {
        $(".wea_product_main_size").find("li").eq($i+1).find("div").attr("data-sizenum", selectColorSizes[$i]["sid"]);
        $(".wea_product_main_size").find("li").eq($i+1).find("div").attr("data-stock", selectColorSizes[$i]["in_stock"]);
    }

    firstLoadColor.find("div").addClass("active");
    let $Active=false;
    for(let $i=0; $i<selectColorSizes.length; $i++){
        $(".clothesSize").eq($i).removeClass("unckick active");
        if(selectColorSizes[$i]["in_stock"]==0){
             $(".clothesSize").eq($i).addClass("unckick");
        }else{
            if(!$Active){
                $(".clothesSize").eq($i).addClass("active");
                stockNum=selectColorSizes[$i]["in_stock"];
                // console.log(StockNum);
                $Active=true;
            }
        }
    }
    
    // 顏色控制抓取
    $(".wea_product_main_color li").has("div").click(function(){
        if($(this).find("div").hasClass("active") == false){
            selectColorSid = $(this).find("div").data('colorsid');
            selectColorSizes = prodSizes.filter(prodSizes => prodSizes.color_sid == selectColorSid); 
            $(this).find("div").addClass("active");
            $(this).siblings().find("div").removeClass("active");
            // 讀取該顏色的尺寸可否購買
            let $i=0;
            $active=false;
            for(let $i=0; $i<selectColorSizes.length; $i++){
                $(".clothesSize").eq($i).removeClass("unckick active");
                if(selectColorSizes[$i]["in_stock"]==0){
                    $(".clothesSize").eq($i).addClass("unckick");
                }else{
                    if(!$active){
                        $(".clothesSize").eq($i).addClass("active");
                        stockNum=selectColorSizes[$i]["in_stock"];
                        // console.log(StockNum);
                        $active=true;
                        selectCountNum = 1;
                        document.getElementById("countnum").innerHTML = parseInt(selectCountNum);
                        countNumState();
                        selectColorData = prodColors.find(prodColors => prodColors.color == $(this).find("div").data('color'));
                        // selectColorimg = selectColorData.pro_pic.split(",");
                        selectColorimg = [];
                        selectColorimg = JSON.parse(selectColorData.pro_pic);
                        console.log(selectColorimg);
                        slidereset();
                    }
                }
            }
        }
    })
    //尺寸按鈕
    $(".wea_product_main_size li").has("div").click(function(){
        if($(this).find("div").hasClass("unckick") == false){
            if($(this).find("div").hasClass("active") == false){
                selectSizeSid= $(this).find("div").data('sizenum');
                // parseInt(selectSizeSid);
                // console.log(selectSizeSid);
                stockNum = $(this).find("div").data('stock');
                // console.log(stockNum);
                $(this).find("div").addClass("active");
                $(this).siblings().find("div").removeClass("active");
                selectCountNum = 1;
                document.getElementById("countnum").innerHTML = parseInt(selectCountNum);
                countNumState();
            }
        }
    })
    //console.log(AAAA)
    //數量
    
    countNumState();
    function countNumState(){
        if(selectCountNum == 1){
            $("#minus").addClass("unckick");
        }else{
            $("#minus").removeClass("unckick");
        }
        if(selectCountNum == stockNum){
            $("#plus").addClass("unckick");
        }else{
            $("#plus").removeClass("unckick");
        }
    }
    
    $("#plus").click(function(){
        if($("#plus").hasClass("unckick") == false){
            selectCountNum = parseInt(selectCountNum) +1;
            document.getElementById("countnum").innerHTML = parseInt(selectCountNum);
            countNumState();
        }
    })
    $("#minus").click(function(){
        if($("#minus").hasClass("unckick") == false){
            selectCountNum = parseInt(selectCountNum) -1;
            document.getElementById("countnum").innerHTML = parseInt(selectCountNum);
            countNumState();
        }
    })

    //圖片slider
    var productIndex;
    var productSlideWidth=$(".wea_product_main_img_hidden").width();
    // 以下用selectColorimg
    // var productSlideImages=[ "ootd1.png", "ootd2.jpg","ootd3.jpg","ootd4.png","ootd5.png"];
    var productSlideCount=selectColorimg.length;
    var productSlideImagesContent="";
    var productSlidePoint="";
    // console.log(productSlideCount);
    // slider初始化新增元件
    slidereset();
    function slidereset(){
        //清空
        productIndex=0;
        productSlideImagesContent="";
        productSlidePoint="";
        productSlideCount=selectColorimg.length;
        $(".wea_product_main_img").find("li").remove();
        $(".wea_product_main_imgbar").find("li").remove();
        // 做事
        for(let i=0; i<productSlideCount; i++){
            productSlideImagesContent=productSlideImagesContent+`<li><img src="product_images/`+selectColorimg[i]+`.png" alt=""></li>`;
            productSlidePoint=productSlidePoint+"<li></li>"
        }
        $(".wea_product_main_img").append(productSlideImagesContent);
        $(".wea_product_main_imgbar").append(productSlidePoint);
        //slider起始值
        $(".wea_product_main_imgbar li").eq(0).addClass("active")
        $(".wea_product_main_img").css("width", productSlideCount*productSlideWidth)
        //slider滑鼠觸碰點點  
        $(".wea_product_main_imgbar li").mouseenter(function(){
            //li物件從0開始
            productIndex=$(this).index();
            goTo();
        })
    }
        
        function goTo(){
            var slideMove=0-productIndex*productSlideWidth;
            $(".wea_product_main_img").css("left", slideMove )
            $(".wea_product_main_imgbar li").eq(productIndex).addClass("active")
            .siblings().removeClass("active")
        }
        $(window).resize(function(){
            productSlideWidth=$(".wea_product_main_img_hidden").width()
            $(".wea_product_main_img").css("width", productSlideCount*productSlideWidth)
            goTo()
        })
        //slider手指滑動切圖
        $(".wea_product_main_img_hidden").swipe({
            threshold: 0,
            swipe:function(event, direction, distance, duration, fingerCount, fingerData, currentDirection) {
            // console.log([event, direction, distance, duration, fingerCount, fingerData, currentDirection]);
            if(direction == 'right'){
                productIndex--;
                if(productIndex<0){
                    productIndex=productSlideCount-1;
                }
                goTo();
            }else if(direction == 'left'){
                productIndex++;
                if(productIndex>=productSlideCount){
                    productIndex=0;
            } 
                goTo();
            }
        }
        })
        $(".wea_ootd_img").swipe( {fingers:1} );

    //商品說明
        $(".wea_product_main_collapse_tital").click(function(){
            
            $(".wea_product_main_collapse_tital").find("i").removeClass("fa-chevron-up").addClass("fa-chevron-down");
            $(this).parents().find("p").addClass("display_none");
            $(this).find("i").removeClass("fa-chevron-down").addClass("fa-chevron-up");
            $(this).parent().find("p").removeClass("display_none");
            

        })
    //推薦商品
        var recommend_position = -25 ;
        $(".wea_recommend_item_leftarrow").click(function(){
            if(recommend_position == 0){
                recommend_position = -50;
                $(".wea_recommend_area").css("left",`${recommend_position}%`);
                console.log(recommend_position);
            }else{
                recommend_position = recommend_position + 25;
                $(".wea_recommend_area").css("left",`${recommend_position}%`);
            }
            
        })
        $(".wea_recommend_item_rightarrow").click(function(){
            if(recommend_position == -50){
                recommend_position = 0;
                $(".wea_recommend_area").css("left",`${recommend_position}%`);
                console.log(recommend_position);
            }else{
                recommend_position = recommend_position - 25;
                $(".wea_recommend_area").css("left",`${recommend_position}%`);
            }
            
        })
        //推薦商品換圖
        $(".wea_recommend_item_color").mouseenter(function(){
            var select_recommend_product = $(this).closest("li").find("img").attr("src");
            // console.log(select_recommend_product);
            if(select_recommend_product != $(this).attr("data-hoverimg")){
                select_recommend_product = $(this).attr("data-hoverimg");
                // console.log(select_recommend_product);
                $(this).closest("li").find("img").attr("src",select_recommend_product);
            }
        })
    </script>

  <script>

      //加入購物車時 拿到 size_sid 跟 數量------------------------------------------------------
      function proAddToCart(event){
          //抓取size_sid
          cart_sid = $(event.target).closest(".wea_product_main_selectarea").find(".wea_product_main_size").find(".active").attr("data-sizenum");
          //抓取數量
          cart_qty = $("#countnum").text();
          // console.log(`cart_sid: ${cart_sid}, cart_qty: ${cart_qty}`)

          // 傳送資料給後端 ->  數量加總丟進購物車數量裡 (寫在parts 的 script裡)
          // 讓所有頁面一進來就能讀到購物車內的商品數
          $.get("add_to_cart_api.php", {cart_sid,cart_qty}, function(data){
              if(data) {
                  countCartObj(data)
                  $('.a_alert.a_addToCart').fadeIn();
                  setTimeout(function(){
                      $('.a_alert.a_addToCart').fadeOut();
                  }, 800);
              }
          },"json");

      };

      function proGoToCart(event){
          //抓取size_sid
          cart_sid = $(event.target).closest(".wea_product_main_selectarea").find(".wea_product_main_size").find(".active").attr("data-sizenum");
          //抓取數量
          cart_qty = $("#countnum").text();
          // console.log(`cart_sid: ${cart_sid}, cart_qty: ${cart_qty}`)

          // 傳送資料給後端
          // countCartObj(data) 讓所有頁面一進來就能讀到購物車內的商品數 (寫在parts 的 script裡)
          $.get("add_to_cart_api.php", {cart_sid,cart_qty}, function(data){
              console.log(data);
              if(data.success){
                  countCartObj(data)
                  location.href = "cart_step1.php";
              }
          },"json");

      };


      //加入最愛-----------------------------

      $(document).on("click", ".a_add_to_like_unactive", function(){

          //加入最愛圖示
          $(event.target).siblings(".a_add_to_like_active").removeClass("display_none");
          //處理主商品的愛心位置問題
          if($(event.target).hasClass("a_product_like")){
              $(event.target).addClass("display_none")
          }
          //傳送 colorSid 給後端
          const a_likeProSid = $(event.target).attr("data-sid");

          $.get('_add_to_like_api.php', {a_likeProSid}, function (data) {
              if (data.success) {
                  $('.a_alert.a_addToLike').fadeIn();
                  setTimeout(function(){
                      $('.a_alert.a_addToLike').fadeOut();
                  }, 800);
              }else {
                  $('.a_alert.a_addToLike').fadeIn();
                  setTimeout(function(){
                      $('.a_alert.a_addToLike').fadeOut();
                  }, 800);
              }
          }, 'json')
              // .done(function(){
              //     console.log("success")
              // })
              // .fail(function(er){
              //     console.log(er);
              // })
      });

      //移除最愛-----------------------------
      $(document).on("click", ".a_add_to_like_active", function(){

          //移除最愛圖示
          $(event.target).addClass("display_none");
          //處理主商品的愛心位置問題
          if($(event.target).hasClass("a_product_like")){
              $(event.target).siblings(".a_add_to_like_unactive").removeClass("display_none");
          }
          //傳送 colorSid 給後端
          const a_likeProSid = $(event.target).attr("data-sid");

          $.get('_remove_from_like_api.php', {a_likeProSid}, function (data) {
              if (data.success) {
                  $('.a_alert.a_removeFromLike').fadeIn();
                  setTimeout(function(){
                      $('.a_alert.a_removeFromLike').fadeOut();
                  }, 800);
              }

          }, 'json')

          // .done(function(){
          //     console.log("success")
          // })
          // .fail(function(er){
          //     console.log(er);
          // })
      })

      //最愛登入時要顯示-----------------------------

      // $.get("product_list_api.php", function(data){
      //     window.product_list_api_data = data
      // }, "json");
      //
      // var likes = window.product_list_api_data.likes || [];
      // if(likes.indexOf(obj.sid) >= 0){
      //     isNotLike = '';
      // }

  </script>
  </body>
</html>