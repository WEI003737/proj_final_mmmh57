<?php
require __DIR__. '/__connect_db.php';

$wishListProSid = [];

if(isset($_SESSION["sid"])) {
    //取出會員收藏
    $userSid = $_SESSION["sid"];
    $wishListSql = "SELECT * FROM `like_box` WHERE `mem_sid` = $userSid";
    $wishRows = $pdo->query($wishListSql)->fetchAll();

    //拿到收藏 sid 陣列
    $i = 0;
    foreach ($wishRows as $w) {
        $wishListProSid[$i] = $w["pro_sid"];
        $i++;
    };

    //拿到收藏商品資訊
    $wishListProSql = sprintf("SELECT * FROM `products` WHERE `sid` IN(%s)",implode(',',$wishListProSid));
    $wishListProRows = $pdo -> query($wishListProSql) -> fetchAll();

    //拿到收藏顏色資訊
    $i=0;
    foreach($wishListProRows as $w) {
        $wishListColorSql = "SELECT * FROM `color` WHERE pro_sid=". $w["sid"];
        $wishListColorRows[$i] = $pdo -> query($wishListColorSql) -> fetchAll();
        $i++;
    }
}


//-----------------------------推薦商品---------------------------------
//抓取隨機6件推薦商品sql -> product表
//$weaRecommendSql = sprintf("SELECT * FROM `products` order by rand() limit 6");
//推薦商品資料陣列
//$weaRecommendStmt = $pdo -> query($weaRecommendSql);
//$weaRecommend = $weaRecommendStmt -> fetchAll();
//推薦商品顏色
//$weaRecommendColor = [];
//  = $pdo -> query("SELECT * FROM `color` WHERE pro_sid=". $weaRecommend["sid"]) ->fetchAll();
//foreach($weaRecommend as $R){
//    $weaRecommendColor[] = $pdo -> query("SELECT * FROM `color` WHERE pro_sid=". $R["sid"]) ->fetchAll();
//}
// echo json_encode( $weaRecommendColor, JSON_UNESCAPED_UNICODE);


?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>member_wishlist</title>
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
        .flex-wrap
        {flex-wrap: wrap;}

        .j_buy_btn{
            width: 280px;
            height: 40px;
            background-color:#CA054D;
            color:white;
            text-align:center;
            border-style: hidden;
            margin: 30px;
            position: absolute;
            bottom: -12%;
        }

     
        .j_wishlist_area{
            position: relative;
        }

        .j_whish_box{
            width: 250px;
            height: 355px;
            background-color: whitesmoke;
            margin: 15px;
        }

        /* ========================================= 推薦區 ========================================= */
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

    <?php include __DIR__ . '/parts/header.php'; ?>
    <!-- 推出 header 空間-->
    <div class="a_push_place"></div>
    <div class="container">

        <!-- 手機 (左側標換到上方) -->
        <div id="member_left_list_totop" >
            <ul class="member_left_list_totop d-flex justify-content-between">
                    <li class="leftlist_underline"><a href="member_information_card_noflipnew.php">會員資料修改</a></li>
                    <li class="leftlist_underline"><a href="member_wishlist.php" style="color:#CA054D;">我的收藏</a></li>
                    <li class="leftlist_underline"><a href="member_order.php" >訂單查詢</a></li>
                    <li class="leftlist_underline"><a href="member_coupon.php" >我的優惠卷</a></li>
                </ul>
        </div>


    
        <div class="member_top_title ">
            <div class="d-flex align-items-center justify-content-center j_padt_100">
                <p class="j_eng_title">My Whishlist</p>
                <p class="j_chinese_title ">我的收藏</p>
            </div>
            <P class="j_dashline"></P>
            <p class="d-flex  justify-content-center  j_padb_100">Trust me,you will love it!</p>
        </div>




        <div class="d-flex justify-content-cneter j_padb_200">
            
            <!-- 桌機 左側標 -->
            <div class="member_left_list col-lg-2">
                <ul >
                    <li class="leftlist_underline"><a href="member_information_card_noflipnew.php">會員資料修改</a></li>
                    <li class="leftlist_underline"><a style="color:#CA054D;" >我的收藏</a></li>
                    <li class="leftlist_underline"><a href="member_order.php" >訂單查詢</a></li>
                    <li class="leftlist_underline"><a href="member_coupon.php">我的優惠卷</a></li>
                </ul>
            </div>

            <!-- 主文 -->
            <div class="j_wishlist_area col-lg-10 d-flex justify-content-cneter flex-wrap">

                <div class="wea_recommend_area_hidden position-relative">
                    <ul class="wea_recommend_area d-flex justify-content-between">
                        <?php $i=0; foreach($wishListProRows as $R) : ?>
                            <li class="wea_recommend_item position-relative desktop">
                                <?php $wishListImg = json_decode($wishListColorRows[$i][0]["pro_pic"]);?>
                                <a href="./product.php?sid=<?= $R["sid"] ?>">
                                    <img src="product_images/<?=$wishListImg[0]?>.png" alt="">
                                </a>
                                <!-- $colorSecondaryImg = json_decode($prodColors[0]['pro_pic']); -->
                                <?php if(isset($_SESSION["loginUser"])): ?>
                                    <i class="a_add_to_like_unactive far fa-heart position-absolute" data-sid="<?=$R['sid']?>"></i>
                                    <i class="a_add_to_like_active fas fa-heart position-absolute" data-sid="<?=$R['sid']?>"></i>
                                <?php endif; ?>
                                <p><?=$R["name"]?></p>
                                <div class="d-flex justify-content-between">
                                    <p class="wea_recommend_item_price">NT$ <?=$R["price"]?></p>
                                    <?php foreach($wishListColorRows[$i] as $RC) :
                                        $hoverImg = json_decode($RC["pro_pic"]);?>
                                        <div data-hoverimg='product_images/<?= $hoverImg[0]?>.png' class="wea_recommend_item_color <?= $RC['color']?>"></div>
                                    <?php endforeach;?>
                                    <!-- <div class="wea_recommend_item_color pink"></div>
                                    <div class="wea_recommend_item_color gray"></div> -->
                                </div>
                            </li>
                            <?php $i++; endforeach;?>
                    </ul>
                </div>
                <button class="j_buy_btn" type="submit" formmethod="post" formaction="">繼續購物</button>

            </div>


        </div>



    </div>

<?php include __DIR__ . '/parts/footer.php'; ?>
<?php include __DIR__ . '/parts/h_f_script.php'; ?>
    <script>
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
                    location.reload();
                }

            }, 'json')

            // .done(function(){
            //     console.log("success")
            // })
            // .fail(function(er){
            //     console.log(er);
            // })
        })

    </script>

    </body>
</html>
