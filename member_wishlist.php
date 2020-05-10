<?php
require __DIR__. '/__connect_db.php';

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
            background-color:#FEF5EF;
            position: relative;
        }

        .j_whish_box{
            width: 250px;
            height: 355px;
            background-color: whitesmoke;
            margin: 15px;
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


                <div>
                    <div class="j_whish_box"></div>
                    <p>Just perfect 運動內衣</p>
                    <div class="d-flex">
                        <p class="flex_grow_2">NT$2,280</p>
                        <div>黑</div>
                        <div>白</div>
                        <div>紅</div>
                    </div>
                </div>

                <div>
                    <div class="j_whish_box"></div>
                    <p>Disco 運動內衣</p>
                    <p>NT$2,280</p>
                </div>

                <div>
                    <div class="j_whish_box"></div>
                    <p>Erin 細肩帶運動內衣</p>
                    <p>NT$2,280</p>
                </div>

                <div>
                    <div class="j_whish_box"></div>
                    <p>Veronica V領美背運動內衣</p>
                    <p>NT$2,280</p>
                </div>

                <div>
                    <div class="j_whish_box"></div>
                    <p>Just perfect 運動內衣</p>
                    <p>NT$2,280</p>
                </div>

                <div>
                    <div class="j_whish_box"></div>
                    <p>Just perfect 運動內衣</p>
                    <p>NT$2,280</p>
                </div>

                <div>
                    <div class="j_whish_box"></div>
                    <p>Just perfect 運動內衣</p>
                    <p>NT$2,280</p>
                </div>


                <div>
                    <div class="j_whish_box"></div>
                    <p>Just perfect 運動內衣</p>
                    <p>NT$2,280</p>
                </div>


                <button class="j_buy_btn" type="submit" formmethod="post" formaction="">繼續購物</button>

            </div>


        </div>



    </div>

<?php include __DIR__ . '/parts/footer.php'; ?>
</body>
</html>
<?php include __DIR__ . '/parts/h_f_script.php'; ?>