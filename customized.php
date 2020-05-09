<!-- nac_header_test{}測試用記得刪除 -->
<!-- container的命名我沒有加名稱，為了使用BT的預設屬性我只改了寬max-width:1440 -->

<?php
require __DIR__ . '/__connect_db.php';
$page_name = 'Customized客製化 - Redcore';

//$stmt 
$customized_bars = $pdo->query("SELECT * FROM `customize` WHERE `cate_sid`=1");
$customized_tops = $pdo->query("SELECT * FROM `customize` WHERE `cate_sid`=2");
$customized_bottoms = $pdo->query("SELECT * FROM `customize` WHERE `cate_sid`=3");

$customized_bars_each = $customized_bars->fetchAll(); //倒內衣資料
$customized_tops_each = $customized_tops->fetchAll(); //倒上衣資料
$customized_bottoms_each = $customized_bottoms->fetchAll(); //倒褲子資料



?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include __DIR__ . '/parts/h_f_link.php' ?>
    <?php include __DIR__ . '/parts/h_f_css.php' ?>
    <title></title>


    <link rel="stylesheet" href="./fontawesome-free-5.13.0-web/css/all.min.css">
<!--    <link rel="stylesheet" href="./css/customized_final.css">-->
    <?php include __DIR__ . '/css/customized_final.php' ?>

    <style>
        /* * {
            outline: #FA8000 solid 1px;
        } */
    </style>
</head>

<body>

    <section class="customized_startanimation_customized">
        <div class="customized_startanimation_w"></div>
    </section>


    <?php include __DIR__ . './parts/header.php' ?>
    <!-- 推出 header 空間-->
    <div class="a_push_place"></div>

    <section class="nac_banner" id="nac_banner">
        <article>
            <h3 class="nac">REDCORE客製化</h3>
            <h2 class="nac">WEAR THE
                <div class="nac_banner_h2cover_box">
                    <div class="nac_banner_h2cover"></div>
                </div>
            </h2>
            <h2 class="nac">DESIGN BY
                <div class="nac_banner_h2cover_box">
                    <div class="nac_banner_h2cover"></div>
                </div>
            </h2>
            <h2 class="nac">YOURSELF. <div class="nac_banner_h2cover_box">
                    <div class="nac_banner_h2cover"></div>
                </div>
            </h2>
            <p class="nac">挑選、配色、下單！簡單3步驟，跟別人不一樣！</br>
                客製化出屬於您的個人風格</p>
            <div class="nac_go_customized_box">
                <a class="nac_btn nac_go_customized" data-goto="#nac_customized_main">
                    立即體驗
                </a>
                <a class="nac_btn nac_howtouse" data-goto="#nac_customized_help"><i class="fas fa-question-circle"></i> 如何使用</a>
            </div>
        </article>
        <figure>
            <img src="./images/BannerBg_Nancy_Customized_Redcore.jpg" alt="">
        </figure>
        <div class="nac_Colorblock"></div>
    </section>



    <div class="nac_target_fix" id="nac_customized_main"></div>
    <section class="nac_customized_main">

        <div class="nac_customized_title_box">
            <h2 class="nac">
                <span style="font-weight: 800;">REDCORE</span>
                客製化</h2>
            <h6 class="nac">WEAR THE DESIGN BY YOURSELF.</h6>
        </div>
        <nav class="container nac_customized_menu nac_customized_menu_normal">
            <ul>
                <li><a class="nac_customized_menu_btn active" data-goto="#customized_bars">內衣</a></li>
                <li><a class="nac_customized_menu_btn" data-goto="#customized_top">上衣</a></li>
                <li><a class="nac_customized_menu_btn" data-goto="#customized_bottoms">下著</a></li>
                <li><a class="nac_customized_menu_btn" data-goto="#nac_customized_help"><i class="fas fa-question-circle"></i> 客製化流程</a></li>
            </ul>
        </nav>

        <!------------------------------------- 浮動選單 ------------------------------------->
        <div class="nac_customized_menu_fixeduse_outsidebox">

            <!-- 身體 -->
            <nav class="nac_customized_menu nac_customized_menu_fixeduse_body_box nac_menu_open">

                <ul>
                    <li class=""><a class="nac_customized_menu_btn active" data-goto="#customized_bars">內衣</a></li>
                    <li class=""><a class="nac_customized_menu_btn" data-goto="#customized_top">上衣</a></li>
                    <li class=""><a class="nac_customized_menu_btn" data-goto="#customized_bottoms">下著</a></li>
                    <li class=""><a class="nac_customized_menu_btn" data-goto="#nac_customized_help"><i class="fas fa-question-circle"></i> 客製化流程</a></li>
                </ul>

            </nav>
            <!-- 頭 -->
            <div class="nac_customized_menu_fixeduse_head_box nac_menu_open">
                <div class="nac_customized_menu_fixeduse_head_icon nac_menu_open">
                    <div class="nac_fixeduse_head_icon_menubar"></div>
                    <div class="nac_fixeduse_head_icon_menubar"></div>
                    <div class="nac_fixeduse_head_icon_menubar"></div>
                </div>
                <div class="nac_fixeduse_head_txt">Close</div>

            </div>
        </div>

        <!------------------------------------- 商品分類 ------------------------------------->

        <article class="container nac_customized_item">

            <div class="nac_target_fix" id="customized_bars"></div>

            <div class="nac_customized_item_area">

                <div class="nac_customized_item_description">
                    <h3 class="nac"><img src="./images/customized_icon.svg" alt="">運動內衣 客製化</h3>
                    <h6 class="nac">CUSTOMIZED SPORTS BRAS</h6>
                    <p class="nac">撞色拼接作為設計，採用機能性面料，不僅舒適親膚，絕佳彈性及透氣感讓妳能夠大膽嘗試任何運動，展現妳最青春的健康活力！</p>
                </div>

                <ul class="nac_customized_item_box_outside customized_listus">

                    <?php foreach ($customized_bars_each as $row) : ?>
                        <li>
                            <a href="./customized_detail.php?sid=<?= $row['sid'] ?>" data-sid="<?= $row['sid'] ?>">

                                <div class="nac_customized_item_box">

                                    <div class="nac_customized_item_box_tg">DESIGN</div>

                                    <figure>
                                        <div class="nac_customized_item_box_cover">
                                            <h3 class="nac">開始設計</h3>
                                            <h6 class="nac">DESIGN BY YOURSELF.</h6>
                                        </div>
                                        <img src="./images/<?= $row['pro_pic'] ?>.png" alt="">
                                    </figure>

                                    <h6 class="customized_item_title"><?= $row['name'] ?></h6>
                                    <h6 class="customized_item_money">NT<?= $row['price'] ?></h6>

                                </div>

                            </a>
                        </li>
                    <?php endforeach; ?>

                </ul>
            </div>
            <div class="nac_target_fix" id="customized_top"></div>




            <div class="nac_customized_item_area">
                <div class="nac_customized_item_description">
                    <h3 class="nac"><img src="./images/customized_icon.svg" alt="">運動上衣 客製化</h3>
                    <h6 class="nac">CUSTOMIZED SPORTS TOPS</h6>
                    <p class="nac">腰身設計到整體版型剪裁，多處精緻細節打造妳的個人特色！輕鬆打造休閒時尚風！</p>
                </div>
                <ul class="nac_customized_item_box_outside customized_listus">
                    <?php foreach ($customized_tops_each as $row) : ?>

                        <li>
                            <a href="./customized_detail.php?sid=<?= $row['sid'] ?>" data-sid="<?= $row['sid'] ?>">
                                <div class="nac_customized_item_box">
                                    <div class="nac_customized_item_box_tg">DESIGN</div>
                                    <figure>
                                        <div class="nac_customized_item_box_cover">
                                            <h3 class="nac">開始設計</h3>
                                            <h6 class="nac">DESIGN BY YOURSELF.</h6>
                                        </div>
                                        <img src="./images/<?= $row['pro_pic'] ?>.png" alt="">
                                    </figure>
                                    <h6 class="customized_item_title"><?= $row['name'] ?></h6>
                                    <h6 class="customized_item_money">NT<?= $row['price'] ?></h6>
                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="nac_target_fix" id="customized_bottoms"></div>

            <div class="nac_customized_item_area">
                <div class="nac_customized_item_description">
                    <h3 class="nac"><img src="./images/customized_icon.svg" alt="">運動下著 客製化</h3>
                    <h6 class="nac">CUSTOMIZED SPORTS BRAS</h6>
                    <p class="nac">採用舒適的機能性面料，高腰版型搭配撞色拼接設計提升包覆支撐力，側邊綁帶設計，具有女人味不失俏麗，是妳不可或缺的時髦單品！</p>
                </div>


                <ul class="nac_customized_item_box_outside customized_listus">
                    <?php foreach ($customized_bottoms_each as $row) : ?>

                        <li>
                            <a href="./customized_detail.php?sid=<?= $row['sid'] ?>" data-sid="<?= $row['sid'] ?>">
                                <div class="nac_customized_item_box">
                                    <div class="nac_customized_item_box_tg">DESIGN</div>
                                    <figure>
                                        <div class="nac_customized_item_box_cover">
                                            <h3 class="nac">開始設計</h3>
                                            <h6 class="nac">DESIGN BY YOURSELF.</h6>
                                        </div>
                                        <img src="./images/<?= $row['pro_pic'] ?>.png" alt="">
                                    </figure>
                                    <h6 class="customized_item_title"><?= $row['name'] ?></h6>
                                    <h6 class="customized_item_money">NT<?= $row['price'] ?></h6>
                                </div>

                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </article>

        <article class="nac_customized_help" id="nac_customized_help">
            <div class="nac_customized_help_outbox">
                <div class="container nac_customized_help_info">
                    <div class="nac_customized_title_box">
                        <h2 class="nac"><span style="color: rgb(202, 5, 77);font-weight:700;">SOP.</span>客製化流程</h2>
                        <h6 class="nac">WEAR THE DESIGN BY YOURSELF.</h6>
                    </div>
                </div>
                <div class="nac_step">
                    <div class="nac_step_number">
                        <h2 class="nac">1</h2>
                    </div>
                    <div class="nac_step_info">
                        <h6 class="nac">STEP01</h6>
                        <h2 class="nac">選擇版型</h2>
                        <p>REDCORE提供了共9總的設計版型，供挑選。皆是REDCORE設計師精心設計的樣板。</p>
                    </div>
                    <div>
                        <figure><img src="./images/sop01.svg" alt=""></figure>
                    </div>
                </div>
                <div class="nac_step">
                    <div class="nac_step_number">
                        <h2 class="nac">2</h2>
                    </div>
                    <div class="nac_step_info">
                        <h6 class="nac">STEP02</h6>
                        <h2 class="nac">選擇配色</h2>
                        <p>選擇您想更改顏色的部位，並點選喜歡的顏色。輕輕鬆鬆設計出自己的風格!</p>
                    </div>
                    <div>
                        <figure><img src="./images/sop02.svg" alt=""></figure>
                    </div>
                </div>
                <div class="nac_step">
                    <div class="nac_step_number">
                        <h2 class="nac">3</h2>
                    </div>
                    <div class="nac_step_info">
                        <h6 class="nac">STEP03</h6>
                        <h2 class="nac">下單付款</h2>
                        <p>完成設計後，點選立即購買，並完成付款程序!REDCORE在收到您的款項後即刻開始製作。</p>
                    </div>
                    <div>
                        <figure><img src="./images/sop03.svg" alt=""></figure>
                    </div>
                </div>
                <div class="nac_step">
                    <div class="nac_step_number">
                        <h2 class="nac">4</h2>
                    </div>
                    <div class="nac_step_info">
                        <h6 class="nac">STEP04</h6>
                        <h2 class="nac">寄送到府</h2>
                        <p>製作流程約需7-10個工作天，製作完成後就會寄送發貨啦!</p>
                    </div>
                    <div>
                        <figure><img src="./images/sop04.svg" alt=""></figure>
                    </div>
                </div>

        </article>

    </section>

    <?php include __DIR__ . './parts/footer.php'
    ?>
    <script defer src="./fontawesome-free-5.13.0-web/js/all.js"></script>

    <?php include __DIR__ . './parts/h_f_script.php' ?>
    <script>
        var nac_windw_width = $(window).width();
        var nac_scroll_revise = '';

        $("a").click(function() {
            let id = $(this).attr("data-goto");
            $("html,body").animate({
                scrollTop: $(`${id}`).offset().top - nac_scroll_revise
            }, 800, 'swing');
        });




        //卷軸滾動物件上浮動畫
        $(window).scroll(function() {
            let nac_windw_height = ($(window).height());
            let nac_scrollTop = $(window).scrollTop();
            let nac_scrollTop_bottom = $(window).scrollTop() + nac_windw_height;
            let area_one_bar = $(".nac_customized_main").offset().top + nac_windw_height / 5;
            let area_two_top = $(".nac_customized_item_area").eq(1).offset().top;
            let area_three_bottom = $(".nac_customized_item_area").eq(2).offset().top;
            let area_sop = $(".nac_customized_help_outbox").offset().top - nac_windw_height / 4;
            let area_footer = $(".footer").offset().top;
            let area_customized_menu_top = $(".nac_customized_title_box").offset().top + nac_windw_height / 5;

            //懸浮MENU出現
            if (nac_scrollTop < area_customized_menu_top - nac_windw_height / 3) {
                $(".nac_customized_menu_fixeduse_outsidebox").removeClass("nac_scrolldown_menu");
            } else {
                $(".nac_customized_menu_fixeduse_outsidebox").addClass("nac_scrolldown_menu");
            }

            //內衣上衣下著區域顯示
            if (nac_scrollTop_bottom > area_one_bar) {

                // 標題動畫控制
                if (!$(".nac_customized_title_box").is('.nac_animation_is_run')) {
                    $(".nac_customized_title_box").addClass("nac_customized_flotup_cansee");
                    setTimeout(function() {
                        $(".nac_customized_title_box").addClass("nac_animation_is_run");
                        $(".nac_customized_title_box").removeClass("nac_customized_flotup_cansee");
                    }, 500);
                }


                // MENU根據區域變換(內衣)
                $(".nac_customized_menu ul li").eq(0).find("a").addClass("active")
                $(".nac_customized_menu ul li").eq(0).siblings().find("a").removeClass("active")
                $(".nac_customized_menu.nac_customized_menu_fixeduse_body_box li").eq(0).find("a").addClass("active")
                $(".nac_customized_menu.nac_customized_menu_fixeduse_body_box li").eq(0).siblings().find("a").removeClass("active")


                /*上衣_出現+menu動畫控制*/
                if (!$(".nac_customized_menu.nac_customized_menu_normal").is(".nac_animation_is_run")) {
                    $(".nac_customized_menu.nac_customized_menu_normal").addClass("nac_animation_is_run")
                    setTimeout(function() {
                        $(".nac_customized_item_area").eq(0).addClass("nac_animation_is_run");
                        $(".nac_customized_menu ul li").eq(0).addClass("nac_animation_is_run");
                        $(".nac_customized_item_area").eq(0).addClass("nac_customized_flotup_cansee");
                        $(".nac_customized_menu ul li").eq(0).addClass("nac_customized_flotup_cansee");
                    }, 300);
                    setTimeout(function() {
                        $(".nac_customized_menu ul li").eq(1).addClass("nac_animation_is_run");
                        $(".nac_customized_menu ul li").eq(1).addClass("nac_customized_flotup_cansee");
                    }, 400);
                    setTimeout(function() {
                        $(".nac_customized_menu ul li").eq(2).addClass("nac_animation_is_run");
                        $(".nac_customized_menu ul li").eq(2).addClass("nac_customized_flotup_cansee");
                    }, 500);
                    setTimeout(function() {
                        $(".nac_customized_menu ul li").eq(3).addClass("nac_animation_is_run");
                        $(".nac_customized_menu ul li").eq(3).addClass("nac_customized_flotup_cansee");
                    }, 600);

                    setTimeout(function() {
                        $(".nac_customized_item_area").eq(0).removeClass("nac_customized_flotup_cansee");
                        $(".nac_customized_menu ul li").removeClass("nac_customized_flotup_cansee");
                    }, 1100);

                }

            }
            /*上衣_出現*/
            if (nac_scrollTop_bottom > area_two_top && !$(".nac_customized_item_area").eq(1).is(".nac_animation_is_run")) {
                $(".nac_customized_item_area").eq(1).addClass("nac_animation_is_run");
                $(".nac_customized_item_area").eq(1).addClass("nac_customized_flotup_cansee");
                setTimeout(function() {
                    $(".nac_customized_item_area").eq(1).removeClass("nac_customized_flotup_cansee");
                }, 500);

            }
            /*上衣_影響menu*/
            if (nac_scrollTop_bottom > area_two_top + nac_windw_height / 2) {
                $(".nac_customized_menu ul li").eq(1).find("a").addClass("active")
                $(".nac_customized_menu ul li").eq(1).siblings().find("a").removeClass("active")
                $(".nac_customized_menu.nac_customized_menu_fixeduse_body_box li").eq(1).find("a").addClass("active")
                $(".nac_customized_menu.nac_customized_menu_fixeduse_body_box li").eq(1).siblings().find("a").removeClass("active")
            }


            /*下著_出現*/
            if (nac_scrollTop_bottom > area_three_bottom && !$(".nac_customized_item_area").eq(2).is(".nac_animation_is_run")) {
                $(".nac_customized_item_area").eq(2).addClass("nac_animation_is_run");
                $(".nac_customized_item_area").eq(2).addClass("nac_customized_flotup_cansee");
                setTimeout(function() {
                    $(".nac_customized_item_area").eq(2).removeClass("nac_customized_flotup_cansee");
                }, 500);
            }
            /*下著_影響menu*/
            if (nac_scrollTop_bottom > area_three_bottom + nac_windw_height / 2) {
                $(".nac_customized_menu ul li").eq(2).find("a").addClass("active")
                $(".nac_customized_menu ul li").eq(2).siblings().find("a").removeClass("active")
                $(".nac_customized_menu.nac_customized_menu_fixeduse_body_box li").eq(2).find("a").addClass("active")
                $(".nac_customized_menu.nac_customized_menu_fixeduse_body_box li").eq(2).siblings().find("a").removeClass("active")
            }

            /*sop_出現u*/
            if (nac_scrollTop_bottom > (area_sop + nac_windw_height / 3) && !$(".nac_customized_help").is(".nac_animation_is_run")) {
                $(".nac_customized_help").addClass("nac_animation_is_run");
                $(".nac_customized_help").addClass("nac_customized_flotup_cansee");

                setTimeout(function() {
                    $(".nac_customized_help").removeClass("nac_customized_flotup_cansee");
                }, 500);
            }

            /*sop_影響menu*/
            if (nac_scrollTop_bottom > area_sop + nac_windw_height / 3) {
                $(".nac_customized_menu ul li").eq(3).find("a").addClass("active")
                $(".nac_customized_menu ul li").eq(3).siblings().find("a").removeClass("active")
                $(".nac_customized_menu.nac_customized_menu_fixeduse_body_box li").eq(3).find("a").addClass("active")
                $(".nac_customized_menu.nac_customized_menu_fixeduse_body_box li").eq(3).siblings().find("a").removeClass("active")
            }

            if (nac_scrollTop_bottom > area_footer) {
                $(".nac_fixeduse_head_txt").addClass("nac_over_the_footer")
            } else {
                $(".nac_fixeduse_head_txt").removeClass("nac_over_the_footer")
            }

        })





        $(".nac_customized_menu ul li").click(function() {
            let li_index = $(this).index(); //是第幾個(index順序)
            //console.log(li_index)
            $(".nac_customized_menu ul li").eq(li_index).find("a").addClass("active")
            $(".nac_customized_menu ul li").eq(li_index).siblings().find("a").removeClass("active")
            $(".nac_customized_menu.nac_customized_menu_fixeduse ul li").eq(li_index).find("a").addClass("active")
            $(".nac_customized_menu.nac_customized_menu_fixeduse ul li").eq(li_index).siblings().find("a").removeClass("active")
        })





        // 懸浮MENU
        $(".nac_customized_menu_fixeduse_head_box").click(function() {
            $(this).toggleClass("nac_menu_open")

            $(".nac_customized_menu.nac_customized_menu_fixeduse_body_box").toggleClass("nac_menu_open")
            if ($(".nac_fixeduse_head_txt").text() == "Others") {
                $(".nac_fixeduse_head_txt").text("close")
            } else {
                $(".nac_fixeduse_head_txt").text("Others")
            }
        })





        // 動畫

        setTimeout(function() {
            $(".nac_banner_h2cover").eq(0).addClass("nac_banner_h2cover_move");
            $(".nac_banner h2.nac").eq(0).addClass("customized_title_changebacktow");
        }, 350);
        setTimeout(function() {
            $(".nac_banner_h2cover").eq(1).addClass("nac_banner_h2cover_move");
            $(".nac_banner h2.nac").eq(1).addClass("customized_title_changebacktow");
        }, 550);
        setTimeout(function() {
            $(".nac_banner_h2cover").eq(2).addClass("nac_banner_h2cover_move")
            $(".nac_banner h2.nac").addClass("customized_title_changebacktow");
            $(".nac_banner article h3.nac").addClass("customized_title_movein");
            $(".nac_banner article p.nac").addClass("customized_title_movein");
        }, 750);
        setTimeout(function() {
            $(".nac_Colorblock").addClass("nac_block_B");
        }, 850);
        setTimeout(function() {

            $("a.nac_go_customized").addClass("nac_go_customized_lineAnimation");
            $(".nac_banner h2.nac").addClass("customized_title_changebacktow");
            $(".nac_go_customized_box").addClass("nac_go_customized_box_move");
        }, 1000);
    </script>
    <script>

        const dallorCommas = function(n){
            return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        };

    </script>
</body>

</html>