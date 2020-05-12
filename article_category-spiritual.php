<?php
require __DIR__. '/__connect_db.php';
$page_name = "article_category-spiritual";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>article_category-spiritual</title>
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"-->
<!--        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
<!--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"-->
<!--        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!--  公版:link  -->
    <?php include __DIR__. '/parts/h_f_link.php';?>
    <!--  公版:css  -->
    <?php include __DIR__. '/parts/h_f_css.php';?>
    <?php include __DIR__. '/css/article_category-spiritural.php';?>

    <style>
        /* * {
            outline: #FA8000 solid 1px;
        } */
    </style>
</head>

<body>
    <?php include __DIR__. '/parts/header.php';?>
    <!-- 推出 header 空間-->
    <div class="a_push_place"></div>
    <section class="cin_articleCategory_body">
        <!----------------------   分類標籤  -------------------------->
        <div class="cin_articleCategory_head">
            <div class="container">  
                <div class="cin_p_w d-flex show_desktop_1">
                    <a href="article_category-healthyfood.php" data-title="# 健康食物"># 健康食物</a>
                    <a href="article_category-spiritual.php" data-title="# 心靈成長"># 心靈成長</a>
                    <a href="article_category-exercise.php" data-title="# 運動知識"># 運動知識</a>
                </div>

                <div class="cin_p_w d-flex show_mobile">
                    <a href="article_category-healthyfood.php"># 健康食物</a>
                    <a href="article_category-spiritual.php"># 心靈成長</a>
                    <a href="article_category-exercise.php"># 運動知識</a>
                </div>
            </div>
        </div>
        <!----------------------   文章列表  -------------------------->
        <section class="cin_articleCategory_main">
            <div class="container">
                <!-- <div class="cin_articleCategory_bread">
                    <p>首頁</p>
                </div> -->
                <div class="d-flex space-between">
                    <div class="cin_articleCategory_main_L">

                        <div class="cin_article_card"><a href="article_innerText_3.php">
                                <div class="cin_article_card_img">
                                    <img src="./img/articleCategory-spiritural1.png" alt="">
                                </div>
                                <div class="cin_article_card_titleDash">
                                    <h5>心靈成長</h5>
                                </div>
                                <div class="cin_article_card_parag">
                                    <h5>瑜伽老師 Stacy：「過度耗能的時代，你更該保有覺察身體的好奇心」</h5>
                                </div>
                                <div class="cin_article_card_date d-flex space-between">
                                    <h5>2020/04/30</h5>
                                    <h5>By Charming BrandTalks</h5>
                                </div>
                            </a></div>

                        <div class="cin_article_card"><a href="">
                                <div class="cin_article_card_img">
                                    <img src="./img/articleCategory-spiritural2.png" alt="">
                                </div>
                                <div class="cin_article_card_titleDash">
                                    <h5>心靈成長</h5>
                                </div>
                                <div class="cin_article_card_parag">
                                    <h5>「總是三分鐘熱度」自律心理學：因為你還不知道自己想成為什麼樣的人
                                    </h5>
                                </div>
                                <div class="cin_article_card_date d-flex space-between">
                                    <h5>2020/05/03</h5>
                                    <h5>By Sharon - Mellow</h5>
                                </div>
                            </a></div>

                        <div class="cin_article_card"><a href="">
                                <div class="cin_article_card_img">
                                    <img src="./img/articleCategory-spiritural3.jpg" alt="">
                                </div>
                                <div class="cin_article_card_titleDash">
                                    <h5>心靈成長</h5>
                                </div>
                                <div class="cin_article_card_parag">
                                    <h5>當我們必須宅在家　6個活動讓你心緒寧靜、享受獨處</h5>
                                </div>
                                <div class="cin_article_card_date d-flex space-between">
                                    <h5>2020/05/01</h5>
                                    <h5>By 周慕姿</h5>
                                </div>
                            </a></div>

                        <div class="cin_article_card"><a href="">
                                <div class="cin_article_card_img">
                                    <img src="./img/articleCategory-spiritural4.png" alt="">
                                </div>
                                <div class="cin_article_card_titleDash">
                                    <h5>心靈成長</h5>
                                </div>
                                <div class="cin_article_card_parag">
                                    <h5>首頁看文章養生保健保健
                                        韓國斥資發展「森林療癒」走進大自然提升身心質量</h5>
                                </div>
                                <div class="cin_article_card_date d-flex space-between">
                                    <h5>2020/04/30</h5>
                                    <h5>By Web only</h5>
                                </div>
                            </a></div>

                        <div class="cin_article_card"><a href="">
                                <div class="cin_article_card_img">
                                    <img src="./img/articleCategory-spiritural5.jpg" alt="">
                                </div>
                                <div class="cin_article_card_titleDash">
                                    <h5>心靈成長</h5>
                                </div>
                                <div class="cin_article_card_parag">
                                    <h5>一個人旅行　與自己好好相處的全新起點</h5>
                                </div>
                                <div class="cin_article_card_date d-flex space-between">
                                    <h5>2020/04/29</h5>
                                    <h5>By Audrey Ko</h5>
                                </div>
                            </a></div>

                        <div class="cin_article_card"><a href="">
                                <div class="cin_article_card_img">
                                    <img src="./img/articleCategory-spiritural6.jpg" alt="">
                                </div>
                                <div class="cin_article_card_titleDash">
                                    <h5>心靈成長</h5>
                                </div>
                                <div class="cin_article_card_parag">
                                    <h5>葡萄酒沒有標準味道　你的人生也一樣</h5>
                                </div>
                                <div class="cin_article_card_date d-flex space-between">
                                    <h5>2020/04/20</h5>
                                    <h5>By 蔡康永</h5>
                                </div>
                            </a></div>
                        <!----------------------   頁碼  -------------------------->
                        <div class="cin_product_list_page d-flex ">
                            <a href=""><i class="fas fa-chevron-left"></i></a>
                            <a href="">1</a>
                            <a href="">2</a>
                            <a href=""><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>

                    <!----------------------   人氣文章(電腦)  -------------------------->
                    <div class="cin_articleCategory_main_R show_desktop">
                        <a href="article_innerText_1.php">
                            <div class="cin_articleCategory_main_R_wrap">
                                <h1 class="cin_h1">人氣文章</h1>
                                <div class="cin_articleCategory_main_R_text d-flex">
                                    <h1 class="cin_h1">1&nbsp&nbsp</h1>
                                    <h5>10種運動最燃脂 專家建議這樣做</h5>
                                </div>
                        </a>
                        <hr>

                        <a href="article_innerText_2.php">
                            <div class="cin_articleCategory_main_R_text d-flex">
                                <h1 class="cin_h1">2&nbsp&nbsp</h1>
                                <h5>女性健身者專用 快速Meal Prep健康飲食法</h5>
                            </div>
                        </a>
                        <hr>

                        <a href="article_innerText_3.php">
                            <div class="cin_articleCategory_main_R_text d-flex">
                                <h1 class="cin_h1">3&nbsp&nbsp</h1>
                                <h5>瑜伽老師 Stacy：「過度耗能的時代，你更該保有覺察身體的好奇心」</h5>
                            </div>
                        </a>
                        <hr>

                        <a href="">
                            <div class="cin_articleCategory_main_R_text d-flex">
                                <h1 class="cin_h1">4&nbsp&nbsp</h1>
                                <h5>想練肌力，先培養活動力</h5>
                            </div>
                        </a>
                        <hr>

                        <a href="">
                            <div class="cin_articleCategory_main_R_text d-flex">
                                <h1 class="cin_h1">5&nbsp&nbsp</h1>
                                <h5>旅行 與自己好好相處的全新起點</h5>
                            </div>
                        </a>
                        <hr>
                        <button id="topBtn">
                            <i class="fas fa-chevron-circle-up fa-3x" type="button" id="BackTop"></i>
                        </button>

                    </div>

                </div>    
            </div>
            </div>
        </section>
        <!----------------------   人氣文章(縮小)  -------------------------->
        <div class="cin_articleCategory_main_R show_750">
            <a href="article_innerText_1.php">
                <div class="cin_articleCategory_main_R_wrap">
                    <div class="cin_hotarticle"><p>人氣文章<p></div>
                    <div class="cin_articleCategory_main_R_text d-flex">
                        <h1 class="cin_h1">1&nbsp&nbsp</h1>
                        <h5>10種運動最燃脂 專家建議這樣做</h5>
                    </div>
            </a>
            <hr>

            <a href="article_innerText_2.php">
                <div class="cin_articleCategory_main_R_text d-flex">
                    <h1 class="cin_h1">2&nbsp&nbsp</h1>
                    <h5>女性健身者專用 快速Meal Prep健康飲食法</h5>
                </div>
            </a>
            <hr>

            <a href="article_innerText_3.php">
                <div class="cin_articleCategory_main_R_text d-flex">
                    <h1 class="cin_h1">3&nbsp&nbsp</h1>
                    <h5>瑜伽老師 Stacy：「過度耗能的時代，你更該保有覺察身體的好奇心」</h5>
                </div>
            </a>
            <hr>

            <a href="">
                <div class="cin_articleCategory_main_R_text d-flex">
                    <h1 class="cin_h1">4&nbsp&nbsp</h1>
                    <h5>想練肌力，先培養活動力</h5>
                </div>
            </a>
            <hr>

            <a href="">
                <div class="cin_articleCategory_main_R_text d-flex">
                    <h1 class="cin_h1">5&nbsp&nbsp</h1>
                    <h5>旅行 與自己好好相處的全新起點</h5>
                </div>
            </a>
            <hr>
            <button id="topBtn_M">
                <i class="fas fa-chevron-circle-up fa-3x" type="button" id="BackTop"></i>
            </button>
        </div>
   
    </section>

    <?php include __DIR__. '/parts/footer.php';?>
    <?php include __DIR__. '/parts/h_f_script.php';?>

<!--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"-->
<!--        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"-->
<!--        crossorigin="anonymous"></script>-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script>
        $(window).scroll(function () {
            let scrollTop = $(this).scrollTop();
            if (scrollTop > 250) {
                $('#topBtn').fadeIn();
                $('#topBtn').css("transform", "translateX(0)")
            } else {
                $('#topBtn').hide();
            }
        });
        $("#topBtn").click(function () {
            $('html ,body').animate({ scrollTop: 0 }, 800);
        });
       ///////////     手機版按鈕    ///////////   
        $(window).scroll(function () {
            let scrollTop = $(this).scrollTop();
            if (scrollTop > 40) {
                $('#topBtn_M').fadeIn();
                $('#topBtn_M').css("transform", "translateX(0)")
            } else {
                $('#topBtn_M').hide();
            }
        });
        $("#topBtn_M").click(function () {
            $('html ,body').animate({ scrollTop: 0 }, 800);
        });
    </script>
</body>

</html>