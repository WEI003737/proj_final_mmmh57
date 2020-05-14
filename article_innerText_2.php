<?php
require __DIR__. '/__connect_db.php';
$page_name = 'article_innerText_2';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"-->
<!--        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
<!--    <link rel="stylesheet" href="cin_css/article_innerText_2.css">-->
<!--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"-->
<!--        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">-->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
<!--    -->
    <!--  公版:link  -->
    <?php include __DIR__. '/parts/h_f_link.php';?>
    <!--  公版:css  -->
    <?php include __DIR__. '/parts/h_f_css.php';?>
    <?php include __DIR__. '/css/article_innerText_2.php';?>

    <style>
        * {
            /* outline: #FA8000 solid 1px; */
        }
    </style>
</head>

<body>
    <?php include __DIR__. '/parts/header.php';?>
    <!-- 推出 header 空間-->
    <div class="a_push_place"></div>
    <section id="cin_article_innertext">
        <div class="cin_article_innertext_wrap">
            <div class="d-flex">
                <a href="article_category-healthyfood.php">
                    <h6 class="cin_h6">健康飲食&nbsp&nbsp></h6>
                </a>
                <a href="">
                    <h6 class="cin_h6">女性健身者專用 健康飲食法</h6>
                </a>
            </div>
            <div class="cin_article_titleDash">
                <h5>健康食物</h5>
            </div>
            <div class="show_desktop cin_article_innertext_title d-flex space-between align-end">
                <h2 class="cin_h2">女性健身者專用 健康飲食法</h2>
                <div class="d-flex">
                    <h6 class="cin_h6">2020/04/28</h6>&nbsp &nbsp &nbsp &nbsp<h6 class="cin_h6">Sharon - Mellow</h6>
                </div>
            </div>
            <!----------------  手機  ---------------->
            <div class="show_mobile cin_article_innertext_title">
                <h2 class="cin_h2">女性健身者專用 健康飲食法</h2>
                <div class="d-flex">
                    <h6 class="cin_h6">2020/04/28</h6>&nbsp &nbsp &nbsp<h6 class="cin_h6">Sharon - Mellow</h6>
                </div>
            </div>
            <!-------------------------------->
            <div class="cin_zoomImage">
                <img src="./img/article_innerText_2a.jpeg" alt="">
            </div>
            <p>想要達到減重的目標，吃的控制絕對比訓練還要重要，正所謂七分靠飲食，三分靠運動。
                近日，健身界有一個非常流行的飲食方式叫做：Meal Prep，是meal prepare for a week的簡稱，也就是去一趟大賣場應有盡有，
                一次準備好一週的食物，泛指3天或是5天都OK。而且不只適用於健身，也適合健康養身以及一般的上班族，甚至是一堆不想煮的懶人(笑)。</p>

            <div class="cin_zoomImage">
                <img src="./img/article_innerText_2b.jpeg" alt="">
            </div>

            <h4 class="cin_h4">何謂Meal Prep？</h4>
            <p>Meal Prep可以在週末悠閒地把下週3-5天的份量都先準備好，放置冰箱保存，需要食用時只需要加熱一下，讓你每天下班後可以不用煩惱進廚房這件事情。
                節省時間、方便、又健康，你可以自行調配每項營養素，搭配蛋白質、碳水化合物、維生素的攝取，提早計算好熱量，不只有助於減重的目標達成，也能免於外食油膩營養不均危害到身體的健康。</p>
            <div class="cin_zoomImage">
                <img src="./img/article_innerText_2c.png" alt="">
            </div>
            <h4 class="cin_h4">Meal Prep的5個保鮮要點</h4>
            <p>不過很多人都有一個迷思，就是隔夜菜不好，這樣一次做一週的份量食物還會新鮮嗎?以下幾點需要特別留意：</p>
            <p>● 做好的食物分裝在保鮮盒中時不要翻動。</p>
            <p>● 做好的食物即時冷藏或是冷凍，只要在食物不燙手的溫度就可以了，3天以下放冷藏，3天以上放冷凍。</p>
            <p>● 從冰箱取出要食用前，需要徹底加熱，建議超過85度才能殺死致病的微生物。</p>
            <p>● 食物經過烹煮、冷藏冷凍、二次加熱，對於維生素的流失會比較大，蛋白質與礦物質會影響較小，建議採用Meal Prep的朋友們可以多補充新鮮水果，獲得較為豐富的營養。</p>
            <p>● 亞硝酸鹽含量，雖然冷藏後會上升，不過是在安全範圍裡(10mg/kg以下)，也就是說要吃下200mg時會有中毒風險，那你就是要吃20kg的隔夜菜，這難度很高的嘛。
            </p>
            <div class="cin_zoomImage">
                <img src="./img/article_innerText_2d.png" alt="">
            </div>
            <p>Meal Prep 的建議搭配方式：</p>
            <p>● 建議以西餐的方式烹煮，因為中餐的料理方式不適合較長天數的保存</p>
            <p>● 主食：以健康粗糧即可，像是紅薯、藜麥、糙米、山藥、燕麥、全麥麵包等</p>
            <p>● 肉類：建議高蛋白低脂肪的肉類，像是魚肉、雞肉、蝦肉，建議可以用煎烤水煮的做法，牛肉因為再次加熱會對口感影響較大</p>
            <p>● 蔬菜：西蘭花、蘆筍、彩椒、蘑菇、黃瓜、胡蘿蔔等</p>
            <p>● 水果：莓果、蘋果、奇異果、香蕉、火龍果等</p>
            <p>● 飲品：檸檬水</p>
            <div class="cin_zoomImage">
                <img src="./img/article_innerText_2e.png" alt="">
            </div>
            <p>Meal Prep 該準備哪些器具，關鍵就在於食物的保鮮：</p>
            <p>● 保鮮袋，適用於蔬果的分裝，或是真空袋也可以(只要搭配家用的真空機即可)</p>
            <p>● 保鮮盒，材質環保天然能夠耐熱加溫的即可</p>
            <p>● 密封罐，像是國外大家常用的梅森罐(Ball Mason Jars)就是不錯的選擇</p>
            <p>維持健康或是想要減重這條路從來不是簡單的事情，Meal Prep確實是個很好的方式，不過你得面對的就是每天基本上都是一樣的菜色，吃久了都會膩吧！不過你連這小小的妥協都不願意，那你又怎麼能向健康更靠近呢？不妨多參考大家的菜單，還是能夠在平凡之中有些許變化的！</p>
            <p>不過，雖然這是近日流行的飲食控制方式，但每個人的狀況不同，建議下定決心食用前，還是可以諮詢專業的營養師喔！</p>


        </div>
        <!----------------  回到頂部  ---------------->
        <div class="show_desktop container">
            <button id="topBtn">
                <i class="fas fa-chevron-circle-up fa-3x" type="button" id="BackTop"></i>
            </button>
        </div>
        <hr>
        <!----------------  相關閱讀  ---------------->
        <div class="cin_morearticle-wrap text-center">
            <h2 class="cin_h2">關聯閱讀</h2>
            <div class="show_desktop cin_morearticle d-flex ">
                <figure><a href="">
                    <div class="cin_morearticle_img">
                    <img src="./img/article_innerText_2g.png" alt="">
                    </div>
                    <h5>抗癌療效食譜：香蕉蘋果豆奶</h5>
                </a></figure>

                <figure><a href="">
                    <div class="cin_morearticle_img">
                    <img src="./img/article_innerText_2f.png" alt="">
                    </div>
                    <h5>不發胖的爆漿甜點！</br>無油熔岩巧克力</h5>
                </a></figure>

                <figure><a href="">
                    <div class="cin_morearticle_img">
                    <img src="./img/article_innerText_2h.png" alt="">
                    </div>
                    <h5>素食正夯！</br>但吃素抗癌真的有用嗎？</h5>
                </a></figure>

                </div>
            <!----------------  手機  ---------------->
                <div class="show_mobile cin_morearticle">
                    <figure><a href="">
                        <div class="cin_morearticle_img">
                        <img src="./img/article_innerText_2g.png" alt="">
                        </div>
                        <h5>抗癌療效食譜：香蕉蘋果豆奶</h5>
                    </a></figure>
    
                    <figure><a href="">
                        <div class="cin_morearticle_img">
                        <img src="./img/article_innerText_2f.png" alt="">
                        </div>
                        <h5>不發胖的爆漿甜點！</br>無油熔岩巧克力</h5>
                    </a></figure>
    
                    <figure><a href="">
                        <div class="cin_morearticle_img">
                        <img src="./img/article_innerText_2h.png" alt="">
                        </div>
                        <h5>素食正夯！</br>但吃素抗癌真的有用嗎？</h5>
                    </a></figure>
    
                    </div>
            <!----------------  手機回到頂部  ---------------->
                    <div class="show_mobile container">
                        <button id="topBtn_M">
                            <i class="fas fa-chevron-circle-up fa-3x" type="button" id="BackTop"></i>
                        </button>
                    </div>
            </div>
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
            if (scrollTop > 500) {
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