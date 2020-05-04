<?php
require __DIR__. '/__connect_db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
<!--  公版:link  -->
    <?php include __DIR__. '/parts/h_f_link.php';?>
<!--  公版:css  -->
    <?php include __DIR__. '/parts/h_f_css.php';?>
<!--  index:css (Cindy)  -->
    <?php include __DIR__. '/css/cin_normalize_css.php';?>

</head>


<body>
<?php include __DIR__. '/parts/header.php';?>
<?php include __DIR__ . '/parts/h_f_script.php'; ?>

    <!----------------------   主視覺  -------------------------->
    <!-- 推出 header 空間-->
    <div class="a_push_place"></div>
    <div class="position-relative" id="sportCover">
        <div class="cin_film">
            <img src="./img/Index_mask.svg" alt="">
            <video loop="true" autoplay="autoplay" muted="true">
                <source type="video/mp4" src="./img/Index_video.mp4">
                </source>
            </video>
            <h1 id="" class="position-absolute coverTitle">Sport Pro<br>Fashion More</h1>`
            <svg class="position-absolute cover-title">
                <defs>
                    <mask id="titleMask">
                        <rect x="0" y="0" width="100%" height="100%" fill="white" />
                        <rect x="520" y="360" width="400" height="220" fill="black" />   
                    </mask>
                </defs> 
                
                <defs>    
                    <mask id="titleMask_mobile">
                        <rect x="0" y="0" width="100%" height="100%" fill="white" />
                        <rect x="15" y="270" width="310px" height="100px" fill="black" />   
                    </mask>
                </defs> 
                     
                <line class="show_desktop" id="desktopSlash" mask="url(#titleMask)" stroke-width="2" stroke="#c8104f">
                </line>
                    
                <line class="show_mobile" id="mobileSlash" mask="url(#titleMask_mobile)" stroke-width="2" stroke="#c8104f">
                </line>
               
            </svg>
        </div>
    </div>

    <!----------------------   商品類別  -------------------------->
    <section class="cin_items text-center">
        <h1>All Women's</h1>
        <h2>商品類別</h2>
        <div class="cin_items_wrapper">
            <ul class="cin_items_list d-flex">
                <li><a href="">
                        <div class="cin_test">
                            <img src="./img/abdtf-jo5ip.jpg" alt="">
                            <div class="cin_items_cover">
                            <h1>BRAS</h1>
                            </div>

                        </div>
                    </a>
                </li>

                <li>
                    <a href="">
                        <div class="cin_test">
                        <img src="./img/leggings_025_bk_1 copy.png" alt="">
                        <div class="cin_items_cover">
                        <h1>BOTTOMS</h1>
                        </div>
                    </div>
                    </a>
                </li>

                <li>
                    <a href="">
                        <div class="cin_test">
                        <img src="./img/sweatshirts_000_bl_1.jpg" alt="">
                        <div class="cin_items_cover">
                        <h1>TOPS</h1>
                        </div>
                    </div>
                    </a>
                </li>

                <li>
                    <a href="">
                        <div class="cin_test">
                        <img src="./img/yoga_009_pk_0.jpg" alt="">
                        <div class="cin_items_cover">
                        <h1>ACCESSORIES</h1>
                        </div>
                    </div>
                    </a>
                </li>
            </ul>
            <div class="cin_items_rec"></div>
        </div>
    </section>
    <!----------------------   客製化  -------------------------->
    <!-- <section class="cin_index_cust">
        <div class="container text-center">
            <div class="cin_index_custBox">
                <img src="./img/REDCORE-illustration.jpg" alt="">
                <div class="cin_index_custBtn">客製化商品</div>
            </div>
        </div>
    </section> -->
    <!----------------------   關於我們  -------------------------->
    <section class="cin_index_about">
        <div class="cin_index_about_wrapper">
            <div class="cin_yellowbox">
                <div class="cin_yellow_text">
                    <img src="./img/index_about_Logo.png" style="max-width:120px;margin-bottom: 10px;" alt="">
                    <p>「動」是一種生活的態度；是一種精神享受!「動」可以使人更自信、樂觀、生活更精彩！
                        希望能讓更多人在這個繁華的時代，享受到「動」的快樂！<br>
                        本品牌的服飾、周邊融入各式時尚元素，期望能吸引到更多人發現「運動」是件很Fashion的事情。
                        並以舒適、日常好穿搭為主要訴求。讓運動能夠融入日常生活當中，讓運動成為習慣成為「日常」！<br>RedCore，讓每個女孩由內而外，爆發出自信迷人的光彩!
                    </p>
                    <hr class="cin_index_hr">
                    <h1 class="cin_about_title">Eco Collectino</h1>
                    <p>我們對回收進行處理，塑料PET瓶會進行分類，清洗，消毒，然後分解成顆粒。接著將來自透明塑料瓶的顆粒熔化，並製成非常細的線，同時將不同顏色的塑料瓶顆粒進行分類，運於其他再循環使用。來自透明塑料瓶的線，最終會被編織成環保織物，不僅對環境減輕負擔，還包括運用最先進排汗技術和抗氣味控制，成效卓越。
                    </p>
                    <div class="cin_index_icon">
                        <img src="./img/index_icons.png" alt="">
                    </div>
                </div>
            </div>
            <div class="cin_index_about_pic">
                <img src="./img/Index_about.jpg" alt="">
            </div>

        </div>
    <?php include __DIR__. '/parts/footer.php';?>
    </section>


    <?php include __DIR__. '/parts/h_f_script.php';?>
    <script>
    
        // let newLine = document.createElementNS('http://www.w3.org/2000/svg','line');
        /////////////電腦版Slash
        let desktopLine = $("#desktopSlash");
        let coverWidth = $("#sportCover").width();
        let coverHeight = $("#sportCover").height();
        let lineNum = Math.sqrt(Math.pow(coverWidth,2)+Math.pow(coverHeight,2));
        // console.log(lineNum)
        $("#desktopSlash").css("stroke-dasharray",lineNum).css("stroke-dashoffset",lineNum) 
        
        ////////////手機板Slash
        let mobileLine = $("#mobileSlash");
        // console.log(lineNum)
        $("#mobileSlash").css("stroke-dasharray",lineNum).css("stroke-dashoffset",lineNum) 
        
        /////////////電腦版Slash
        desktopLine.attr('x1', '20');
        desktopLine.attr('y1', '100');
        desktopLine.attr('x2', coverWidth - 20);
        desktopLine.attr('y2', coverHeight - 50);
        
        ////////////手機板Slash
        mobileLine.attr('x1', '10');
        mobileLine.attr('y1', '100');
        mobileLine.attr('x2', coverWidth - 20);
        mobileLine.attr('y2', coverHeight - 50);

        //  console.log(coverHeight);
        // newLine.setAttribute('id','slash');
        
        // $(".cover-title").append(newLine);
    </script>

</body>

</html>