<?php
require __DIR__. '/__connect_db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <!--  公版:link  -->
    <?php include __DIR__. '/parts/h_f_link.php';?>
    <!--  公版:css  -->
    <?php include __DIR__. '/parts/h_f_css.php';?>
    <?php include __DIR__. '/css/cin_article_cover.php';?>
    <style>
    * {
        /* outline: #FA8000 solid 1px; */
    }
</style>
</head>
<body>
    <?php include __DIR__. '/parts/header.php';?>

    <!----------------------   主視覺  -------------------------->
    <!-- 推出 header 空間-->
    <div class="a_push_place"></div>
    <div class="position-relative" id="sportCover">
        <svg class="position-absolute cover-title">
            <defs>
                <mask id="titleMask">
                    <rect x="0" y="0" width="100%" height="100%" fill="white" />
                    <rect x="630" y="330" width="580" height="300" fill="black" />      
                </mask>
            </defs>  
            <defs>    
                <mask id="titleMask_mobile">
                    <rect x="0" y="0" width="100%" height="100%" fill="white" />
                    <rect x="100" y="250" width="200px" height="150px" fill="black" /> 
                </mask>
            </defs> 
           
                 
            <line class="show_desktop" id="desktopSlash" mask="url(#titleMask)" stroke-width="4" stroke="#c8104f">
            </line>      
            <line class="show_mobile" id="mobileSlash" mask="url(#titleMask_mobile)" stroke-width="2" stroke="#c8104f">
            </line>
           
        </svg>
        
        <div class="cin_articleCover">
            <div class="cin_articleCover_titlewrap">
            <h1 id="" class="text-center position-absolute coverTitle">EAT CLEAN<br>GET FIT<br>BE HAPPY</h1>
            <a href="article_category.php">
                <h6 class="cin_h6">閱讀文章</h6>
            </a>
            </div>
           
            <a href="article_category-spiritual.php"><div class="cin_zoomImage_a" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                <img src="./img/article_cover4.jpg" alt="">
                <div class="cin_items_cover">
                <h1># 心靈成長</h1>
                </div>
            </div></a>

            <a href="article_category-healthyfood.php"><div class="cin_zoomImage_b" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                <img src="./img/article_cover2.jpg" alt="">
                <div class="cin_items_cover">
                <h1># 健康食譜</h1>
                </div>
            </div></a>

            <a href="article_category-exercise.php"><div class="cin_zoomImage_c" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1500">
                <img src="./img/article_cover3.jpg" alt="">
                <div class="cin_items_cover">
                <h1># 運動知識</h1>
                </div>
            </div></a>

            
            <div class="show_desktop cin_articlecover_hash">
                <a href=""><h5>＃運動知識</h5></a>
                <a href=""><h5>＃健康食譜</h5></a>
                <a href=""><h5>＃心靈成長</h5></a>
            </div>

            <div class="cin_article_hashB">
                <h5>Be a girl</h5>
                <h5>With adventure</h5>
                <h5>A lady</h5>
                <h5>And a women</h5>
                <h5>With courage</h5>
                <h5>With confidence</h5>    
            </div>

        </div>

    </div>

    <?php include __DIR__. '/parts/footer.php';?>
    <?php include __DIR__. '/parts/h_f_script.php';?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"-->
<!--        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"-->
<!--        crossorigin="anonymous"></script>-->
 <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
</script>

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
        desktopLine.attr('x1', '1980');
        desktopLine.attr('y1', '-10');
        desktopLine.attr('x2', coverWidth - 1980);
        desktopLine.attr('y2', coverHeight - 10);
        
        ////////////手機板Slash
        mobileLine.attr('x1', '500');
        mobileLine.attr('y1', '0');
        mobileLine.attr('x2', coverWidth - 500);
        mobileLine.attr('y2', coverHeight - 0);

        //  console.log(coverHeight);
        // newLine.setAttribute('id','slash');
        
        // $(".cover-title").append(newLine);
    </script>

</body>

</html>