<?php
require __DIR__ . '/__connect_db.php';
$page_name = 'product_list';

//-----------------------------頁數---------------------------------

$perPage = 8;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$cate = isset($_GET['cate']) ? intval($_GET['cate']) : 0;
$pageBtn = [];

//-----------------------------點商品類別 列出該類別商品---------------------------------
$where = " WHERE 1 ";
if(!empty($cate)){
    $where .= " AND cate_sid = $cate ";
    $pageBtn['cate'] = $cate;
}

//取得總筆數
$totalRows = $pdo->query("SELECT COUNT(1) FROM products $where")
    ->fetch(PDO::FETCH_NUM)[0];

//算總頁數
$totalPages = ceil($totalRows / $perPage);

($page < 1) ? ($page = 1) : false;
($page > $totalPages) ? ($page = $totalPages) : false;

//-----------------------------總商品資料 + 商品圖---------------------------------
//如果有資料
if($totalRows>0){
    //總商品sql
    $totalProductSql = sprintf("SELECT * FROM products $where LIMIT %s, %s", ($page-1)*$perPage, $perPage);
    //總商品資料
    $totalProductStmt = $pdo -> query($totalProductSql);
    $totalProduct = $totalProductStmt -> fetchAll();
    //商品資料最後，塞入從 color 資料表拿出的，該商品的其中一種顏色的圖片(陣列)
    $i=0;
    foreach($totalProduct as $value){
        //加入照片陣列
        //LIMIT 限制筆數
        $productPics = $pdo -> query("SELECT `pro_pic` FROM `color` WHERE `pro_sid`= ".$value["sid"]." LIMIT 1");
        $totalProductPics = $productPics -> fetch();
        $totalProduct[$i]["pictures"]=$totalProductPics;

        //加入每個款式的顏色數量
        $colorLengthSql = $pdo -> query("SELECT *,count(pro_sid) FROM `color` WHERE `pro_sid`= ".$value["sid"]." GROUP BY `pro_sid`");
        $colorLength = $colorLengthSql -> fetch();
        $totalProduct[$i]["colorLength"] = $colorLength['count(pro_sid)'];

        //加入顏色陣列
        $colorArrSql = $pdo -> query("SELECT `color` FROM `color` WHERE `pro_sid`= ".$value["sid"]." ORDER BY `sid`");
        $colorArr = $colorArrSql -> fetchAll();
        $totalProduct[$i]["colorArr"] = $colorArr;


        $i++;
    }
};

//echo json_encode($totalProduct, JSON_UNESCAPED_UNICODE);


//-----------------------------商品選單---------------------------------

$categoriesStmt = $pdo -> query("SELECT * FROM `categories`");
$categoriesRow = $categoriesStmt -> fetchAll();
//echo json_encode($categoriesRow);

?>

<!doctype html>
<html lang="en">
  <head>
    <title>product list</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  </head>
  <style>
    /* * {
        outline: #FA8000 solid 1px;
    } */
    @media screen and (max-width: 992px){
        .show-desktop{
            display: none !important;
        }
        .show-mobile{
            display: block !important;
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
        color: #C9044D;
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
    /* ================================== #ootd ============================== */
    .wea_ootd{
        width: 100%;
    }
    .wea_ootd_img{
        width: 100%;
        height: 460px;
        overflow: hidden;
        background: #FEF5EF;
    }
    .wea_ootd_slider_img{
        height: 100%;
        transition: .5s;
        left:0;
    }
    .wea_ootd_slider_img li{
        flex: 1 0 0;
    }
    .wea_ootd_slider_img img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .wea_ootd_img>div{
        padding-top:30px;
    }
    .wea_ootd_dec{
        max-width: 1500px;
        height: 400px;
        margin: auto;
    }
    .wea_ootd_dec div:first-child{
        width: 210px;
        height: 90px;
        right: 30px;
        top: 0px;
        border-top:4px solid #C9044D;
        border-right:4px solid #C9044D;;
    }
    .wea_ootd_dec div:last-child{
        width: 90px;
        height: 210px;
        left: 30px;
        bottom: 0pt;
        border-left:4px solid #C9044D;
        border-bottom:4px solid #C9044D;;
    }
    .wea_ootd_dec h1{
        left: 120px;
        bottom: 0px;
        color: #C9044D;
    }
    .wea_slider_point{
        margin: 18px 0 60px;
    }
    .wea_slider_point li{
        background-color: #C9044D;
        opacity: .2;
        height: 10px;
        width: 48px;
        margin: 0 4px;
    }
    .wea_slider_point li.active{
        background-color: #C9044D;
        opacity: 1;
    }
    @media screen and (max-width: 992px){
    .wea_ootd_img{
        height: 200px;
    }
    .wea_ootd_img>div{
        padding-top:20px;
    }
    .wea_ootd_dec{
        height: 160px;
    }
    .wea_ootd_dec div:first-child{
        width: 120px;
        height: 60px;
        right: 20px;
        top: 0px;
        border-top:2px solid #C9044D;
        border-right:2px solid #C9044D;;
    }
    .wea_ootd_dec div:last-child{
        width: 60px;
        height: 120px;
        left: 20px;
        bottom: 0pt;
        border-left:2px solid #C9044D;
        border-bottom:2px solid #C9044D;;
    }
    .wea_ootd_dec h1{
        left: 80px;
        font-size: 54px;
    }
    .wea_slider_point{
        margin: 18px 0 30px;
    }
    }
    @media screen and (max-width: 992px){
        .wea_ootd_dec h1{
        font-size: 36px;
    }
    }
    /* ===================================== 商品選單 ===================================== */
    .wea_product_select_bar{
        padding: 0 30px;
    }
    .wea_product_select_bar ul{
        margin-bottom: 20px;
    }
    .wea_product_select_bar h5{
        margin-bottom: 30px;
    }
    .wea_product_select_bar h6{
        margin-bottom: 15px;
    }
    .wea_product_select_bar p{
        margin-bottom: 12px;
    }
    .wea_product_select_bar ul>li:last-child{
        margin-bottom:30px;
    }
    /* ===================================== 商品列表 ===================================== */
    /* ======================================= 篩選 ======================================= */
    .wea_product_list_tital{
        padding-top: 4px;
        flex-grow: 1;
    }
    .wea_product_list_changebar{
        border-bottom: 1px solid #272838;
        margin-left: 20px;
        padding-bottom: 4px;
    }
    .wea_product_list_changebar:last-child{
        margin-right: 30px;
    }
    .wea_product_list_changebar span{
        margin: 0 4px 0 8px;
    }
    .wea_product_list_changebar i{
        margin: 0 8px 0 4px;
    }
    @media screen and (max-width: 992px){
        .wea_product_list_tital{
        margin-left: 20px;
    }
    .wea_product_list_changebar:last-child{
        margin-right: 20px;
    }
    }
    @media screen and (max-width: 625px){
        .wea_product_list_changebar{
        margin-left: 10px;
        padding-bottom: 0px;
    }    
        .wea_product_list_changebar span{
        font-size: 15px;
        margin: 0 2px 0 4px;
    }
    .wea_product_list_changebar i{
        margin: 0 4px 0 2px;
    }
    }
    /* ======================================= 商品 ======================================= */
    .wea_product_list{
        margin-top: 20px;
        margin-right: 30px;
    }
    .wea_product_list_item{
        /* flex-grow: 1; */
        margin-bottom: 30px;
    }
    .wea_product_list_item img{
        width: 275px;
    }
    .wea_product_list_item>p{
        margin-top: 4px;
    }
    /* .wea_product_list_item_img{
        width: 285px;
        height: 350px;
        background: url('/img/0.png') no-repeat;
        background-size: cover;
    } */
    .wea_product_list_item_price{
        color: #C9044D;
        flex-grow: 1;
    }
    .wea_product_list_item_color{
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: 1px solid #ccc;
        margin-left: 8px;
        background: #272838;
    }
    .wea_product_list_item_color.pink{
        background: #ffb6b6;
    }
    .wea_product_list_item_color.gray{
        background: #bebebe;
    }
    @media screen and (max-width: 992px){
        .wea_product_list{
        margin-left: 20px;
        margin-right: 20px;
        }
    }
    @media screen and (max-width: 625px){
        .wea_product_list_item{
        width: 47.5%;
    }
        .wea_product_list_item img{
        width: 100%;
    }
    }
    /* ======================================= 頁碼 ======================================= */
    .wea_product_list_page{
        margin: 30px 30px 90px 0;
        justify-content: flex-end;
    }
    .wea_product_list_page a{
        margin-left: 20px;
    }
    @media screen and (max-width: 625px){
        .wea_product_list_page{
        margin: 30px 0px 90px 0;
        justify-content: center;
    }
    }
  </style>
  <body>
    <!-- =================================== #ootd =================================== -->
    <div class="wea_ootd">
        <div class="wea_ootd_img position-relative">
            <ul class="list-unstyled wea_ootd_slider_img d-flex position-absolute">
                <!-- <li><img src="img/ootd1.png" alt=""></li> -->
            </ul>
            <div>
                <div class="wea_ootd_dec position-relative">
                    <div class="position-absolute"></div>
                    <h1 class="position-absolute"> #OOTD</h1>
                    <div class="position-absolute"></div>
                </div>
            </div>
        </div>
        <ul class="list-unstyled wea_slider_point d-flex justify-content-center">
            <!-- <li class="active"></li> -->
        </ul>
    </div>
    <!-- =================================== 選單 =================================== -->
    <div class="wea_wrapper">
        <div class="row no-gutters">
            <div class="col-sm-2">
                <ul class="show-desktop wea_product_select_bar">
                    <ul ><a href="?"><h5>所有商品</h5></a></a></ul>
<!--                    <ul ><a href=""><h6>運動內衣</h6></a></ul>-->
                    <?php foreach($categoriesRow as $nav):  ?>
                        <ul><a href="?cate=<?= $nav['sid'] ?>"><h6><?= $nav['parent'] ?></h6></a></ul>
                        <li><a href="?cate=<?= $nav['sid'] ?>"><p><?= $nav['name'] ?></p></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
    <!-- ===================================== 商品列表 ===================================== -->
    <!-- ======================================= 篩選 ====================================== -->
            <div class="col-lg-10">
                <div class="d-flex justify-content-between">
                    <h5 class="wea_product_list_tital">所有商品</h5>
                    <div id="wea_product_list_filter" class="wea_product_list_changebar">
                        <span>分類篩選</span><i class="fas fa-chevron-down"></i>
                    </div>
                    <div id="wea_product_list_sort" class="wea_product_list_changebar">
                        <span>排序方式</span><i class="fas fa-chevron-down"></i>
                     </div>
                </div>
    <!-- ======================================= 商品 ====================================== -->

                <ul class="wea_product_list d-flex justify-content-between flex-wrap">
                    <?php foreach($totalProduct as $t):
                        $pictureArr = json_decode($t['pictures']['pro_pic']); //把字串變陣列
                        // var_dump(json_decode($t["pictures"]["pro_pic"], true));
                        ?>
                    <li class="wea_product_list_item">
                        <img src="./images/<?=$pictureArr[0]?>.png" alt="">
                        <p><?= $t['name']; ?></p>
                        <div class="d-flex justify-content-between">
                            <p class="wea_product_list_item_price">$<?= $t['price']; ?></p>
                            <?php for($i=1; $i<=$t['colorLength']; $i++): ?>
                            <div class="wea_product_list_item_color" style="background: <?= $t['colorArr'][$i-1]['color'] ?>"></div>
                            <?php endfor; ?>
<!--                            <div class="wea_product_list_item_color gray"></div>-->
                        </div>
                    </li>
                    <?php endforeach; ?>

                </ul>
    <!-- ======================================= 頁碼 ====================================== -->
                <div class="wea_product_list_page d-flex">
                    <a href="?<?=
                    $pageBtn['page']=$page-1;
                    echo http_build_query($pageBtn)?>">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                       <?php for($i = 1; $i <= $totalPages; $i++):
                           $pageBtn['page']=$i;?>
                            <a href="?<?= http_build_query($pageBtn); ?>"><?= $i ?></a>
                       <?php endfor; ?>
                    <a href="?<?=
                    $pageBtn['page']=$page+1;
                    echo http_build_query($pageBtn)?>"><i class="fas fa-chevron-right"></i></a>
                </div>
            </div> 
        </div>
    </div>
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/fontawesome.min.js"></script>
    <script>

        var index=0;
        var slideWidth=$(".wea_ootd_img").width();
        var slideImages=[ "ootd1.png", "ootd2.jpg","ootd3.jpg","ootd4.png","ootd5.png"];
        var slideCount=slideImages.length;
        var slideImagesContent="";
        var slidePoint="";
        for(let i=0; i<slideCount; i++){
            slideImagesContent=slideImagesContent+`<li><img src="img/${slideImages[i]}" alt=""></li>`;
            slidePoint=slidePoint+"<li></li>"
        }
        $(".wea_ootd_slider_img").append(slideImagesContent);
        $(".wea_slider_point").append(slidePoint);

        $(".wea_slider_point li").eq(0).addClass("active")
        $(".wea_ootd_slider_img").css("width", slideCount*slideWidth)

        $(".wea_slider_point li").mouseenter(function(){
            // console.log($(this).index())
            index=$(this).index();
            goTo()
        })
        function goTo(){
            var slideMove=0-index*slideWidth;
            $(".wea_ootd_slider_img").css("left", slideMove )
            // $(".slider-point li").eq(index).css("background", "#fff")
            // .siblings().css("background", "none")
            $(".wea_slider_point li").eq(index).addClass("active")
            .siblings().removeClass("active")
        }

        $(window).resize(function(){
            slideWidth=$(".wea_ootd_img").width()
            $(".wea_ootd_slider_img").css("width", slideCount*slideWidth)
            goTo()
        })

    </script>
  </body>
</html>