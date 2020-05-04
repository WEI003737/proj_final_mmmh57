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
    <?php include __DIR__ . './parts/h_f_link.php' ?>
    <?php include __DIR__ . './parts/h_f_link.php' ?>
    <?php include __DIR__ . './parts/h_f_css.php' ?>
    <title></title>


    <link rel="stylesheet" href="./fontawesome-free-5.13.0-web/css/all.min.css">
    <link rel="stylesheet" href="./css/customized_final.css">
    <style>
        /* * {
            outline: #FA8000 solid 1px;
        } */
    </style>
</head>

<body>
    <?php include __DIR__ . './parts/header.php' ?>
    <!-- 推出 header 空間-->
    <div class="a_push_place"></div>
    <section class="nac_banner" id="nac_banner">
        <article>
            <h3 class="nac">REDCORE客製化</h3>
            <h2 class="nac">WEAR THE</br>
                DESIGN BY</br>
                YOURSELF.</h2>
            <p class="nac">挑選、配色、下單！簡單3步驟，跟別人不一樣！</br>
                客製化出屬於您的個人風格</p>
            <div class="nac_go_customized_box">
                <a class="nac_btn nac_go_customized" data-goto="#nac_customized_main">
                    立即體驗
                </a>
                <a class="nac_btn nac_howtouse" style="margin: 10px 5px" data-goto="#nac_customized_help"><i class="fas fa-question-circle"></i> 如何使用</a>
            </div>
        </article>
        <figure>
            <img src="./images/BannerBg_Nancy_Customized_Redcore.jpg" alt="">
        </figure>
        <div class="nac_Color_block"></div>
    </section>



    <div class="nac_target_fix" id="nac_customized_main"></div>

    <section class="nac_customized_main">

        <div class="nac_customized_title_box">
            <h2 class="nac">REDCORE 客製化</h2>
            <h6 class="nac">WEAR THE DESIGN BY YOURSELF.</h6>
        </div>
        <nav class="container nac_customized_menu">
            <ul>
                <li><a class="nac_customized_menu_btn active" data-goto="#customized_bars">內衣</a></li>
                <li><a class="nac_customized_menu_btn" data-goto="#customized_top">上衣</a></li>
                <li><a class="nac_customized_menu_btn" data-goto="#customized_bottoms">下著</a></li>
                <li><a class="nac_customized_menu_btn" data-goto="#nac_customized_help"><i class="fas fa-question-circle"></i> 客製化流程</a></li>
            </ul>
        </nav>
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
                <div class="nac_customized_help_info">
                    <div class="nac_customized_title_box">
                        <h2 class="nac"><span style="color: rgb(202, 5, 77);font-weight:700;">How.Sop</span>客製化流程</h2>
                        <h6 class="nac">WEAR THE DESIGN BY YOURSELF.</h6>
                    </div>
                </div>
                <div class="nac_step">
                    <div class="nac_step_number">
                        <h2 class="nac">1</h2>
                    </div>
                    <div class="nac_step_info">
                        <h6 class="nac">STEP01</h6>
                        <h2>選擇版型</h2>
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
                        <h2>選擇配色</h2>
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
                        <h2>下單付款</h2>
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
                        <h2>寄送到府</h2>
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
        $(".nac_customized_menu ul li").click(function() {
            $(this).find("a").addClass("active")
            $(this).siblings().find("a").removeClass("active")
        })

        var nac_windw_width = $(window).width();
        var nac_scroll_revise = '';



        $("a").click(function() {

            let id = $(this).attr("data-goto");
            $("html,body").animate({
                scrollTop: $(`${id}`).offset().top - nac_scroll_revise
            }, 800, 'swing');
        });
    </script>
</body>

</html>