<!-- nac_header_test{}測試用記得刪除 -->
<!-- container的命名我沒有加名稱，為了使用BT的預設屬性我只改了寬max-width:1440 -->
<?php
require __DIR__ . '/__connect_db.php';
$page_name = 'Customized客製化 - Redcore';


$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
$rows = $pdo->query("SELECT * FROM `customize`")->fetchAll();
$row = $pdo->query("SELECT * FROM `customize` WHERE `sid`=" . $sid)->fetch();
$cate_sid = isset($row['cate_sid']) ? intval($row['cate_sid']) : 0;
$rows_itemcount = count($rows);
$can_cus_color = json_decode($row['can_cus_color']);
$can_cus_color_count = count($can_cus_color);


$customized_bars = $pdo->query("SELECT * FROM `customize` WHERE `cate_sid`=1");
$customized_tops = $pdo->query("SELECT * FROM `customize` WHERE `cate_sid`=2");
$customized_bottoms = $pdo->query("SELECT * FROM `customize` WHERE `cate_sid`=3");




$customized_bars_each = $customized_bars->fetchAll(); //倒內衣資料
$customized_tops_each = $customized_tops->fetchAll(); //倒上衣資料
$customized_bottoms_each = $customized_bottoms->fetchAll(); //倒褲子資料


//print_r($customized_recommend);
//var_dump($a_color);
//print_r($can_cus_color_count);


if ($sid < 1 || $sid > $rows_itemcount) {
    header("location:./customized.php");
    exit();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include __DIR__ . './parts/h_f_link.php' ?>
    <?php include __DIR__ . './parts/h_f_css.php' ?>
    <title>Customized_Redcore</title>


    <link rel="stylesheet" href="./fontawesome-free-5.13.0-web/css/all.min.css">
    <!--    <link rel="stylesheet" href="./css/customized_final.css">-->
    <?php include __DIR__ . '/css/customized_final.php' ?>


    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        /* * {
            outline: #FA8000 solid 1px;
        } */
    </style>
</head>

<body>
    <?php include __DIR__ . './parts/header.php'
    ?>

    <div class="container nac_menu_reserve"></div>
    <!-- 導航列 -->
    <div class="container">
        <nav>
            <ul class="nac_customized_detail_menu">
                <li><img src="./images/customized_icon.svg" alt=""></li>
                <li><a href="./customized.php">客製化</a></li>
                <li><a class="nac_cate" href=""></a></li>
                <li><?= $row['name'] ?></li>
            </ul>
        </nav>
    </div>
    <section class="container customized_detail_desi" data-sid="<?= $sid ?>">
        <!-- 成品展示區 -->
        <div class="customized_detail_picture_outbox">
            <div class="customized_detail_picture" id="clothes">
                <!-- 預設顯示圖片 -->
                <img src="./images/<?= $row['pro_pic'] ?>_auto.png" alt="" id="nac_item_pic_auto">
                <!-- 控制區/色塊區 -->
                <?= $row['cus_area_svg'] ?>
                <!-- 混和層 -->
                <img src="./images/<?= $row['pro_pic'] ?>_blend.png" alt="" id="nac_item_pic_blend">
                <img src="./images/<?= $row['pro_pic'] ?>_screen.png" alt="" id="nac_item_pic_screen">
                <!-- 即時色盤 -->
                <div class="color-panel position-absolute" id="colorPanel">
                    <ul class="nax_panel_color_outsidebox">
                    </ul>
                </div>
            </div>
        </div>
        <!-- 訂製內容點選區 -->
        <form class="customized_detail_main" method="post" action="">

            <div class="customized_detail_itemtitle">
                <!-- 商品名 -->
                <h2 class="nac detail_itemtitle"><?= $row['name'] ?></h2>
                <!-- 價碼 -->
                <h3 class="nac mony">$NT<?= $row['price'] ?></h3>
            </div>


            <!-- 右邊調色盤 -->
            <div class="nac_chose_color">
                <?php for ($i = 0; $i < $can_cus_color_count; $i++) : ?>
                    <h4 class="nac"><?= $can_cus_color[$i] ?></h4>
                    <h6 class="nac">Color 0<?= $i + 1 ?></h6>
                    <ul class="nac_chose_color_area" data-clothes_area="Clothes_area<?= $i + 1 ?>" id="clothesPick<?= $i + 1 ?>">
                    </ul>
                <?php endfor; ?>
            </div>
            <!-- 尺寸 -->
            <div class="nac_chose_size">
                <h4 class="nac">尺寸</h4>
                <h6 class="nac">Size</h6>
                <ul class="nac_chose_size_box">
                    <li>
                        <input type="button" class="nac_size_btn" date-sizeChose="S" value="S"></input>
                    </li>
                    <li>
                        <input type="button" class="nac_size_btn active" date-sizeChose="M" value="M"></input>
                    </li>
                    <li>
                        <input type="button" class="nac_size_btn" date-sizeChose="L" value="L"></input>
                    </li>
                    <li>
                        <input type="button" class="nac_size_btn" date-sizeChose="XL" value="XL"></input>
                    </li>
                </ul>
                <!-- 尺寸參考表 -->
                <a class="nac_sizechart wea_sizelist" href="#open">
                    <h6 class="nac nac_sizechart"><i class="fas fa-question-circle"></i> 尺寸表參考</h6>
                </a>
            </div>
            <!-- 數量 -->
            <div class="nac_chose_pieces">

                <h4 class="nac">數量</h4>
                <h6 class="nac">Pieces</h6>
                <div class="nac_chose_pieces_num">
                    <button type="button" class="nac_chose_pieces_btn nac_plus" onclick="dec()">-</button>
                    <button type="button" class="nac_chose_pieces_count" disabled="disabled" id="pieces_count">1</button>
                    <button type="button" class="nac_chose_pieces_btn nac_minus" onclick="insc()">+</button>
                </div>
            </div>



            <div class="nac_buynow">
                <button id="add_to_cart" onclick="goToCart(event)">立即購買</button>
                <button onclick="addToCart(event)">加入購物車</button>
            </div>

    </section>
    <div class="nac_partingline"></div>

    <section class="customized_detail_more">

        <div class="container">
            <div class="customized_detail_more_title_box">
                <h2 class="nac detail_itemtitle">設計更多屬於你的STYLE!</h2>
                <h4 class="nac">DESIGN MORE BY YOURSELF</h4>
            </div>
            <ul class="nac_customized_item_box_outside customized_detail">
                <?php
                $customized_recommend = $pdo->query("SELECT * FROM `customize` WHERE `sid`!=$sid ORDER BY RAND() LIMIT 4")->fetchAll();
                foreach ($customized_recommend as $row) : ?>
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
        <div class="wea_imgbox_base fixed-bottom">
            <a href="#close">
                <div class="wea_imgbox_background position-relative">
                    <img class="position-absolute" src="img/size.png" alt="">
                </div>
            </a>
        </div>
    </section>


    <?php include __DIR__ . './parts/footer.php'
    ?>
    <script defer src="./fontawesome-free-5.13.0-web/js/all.js"></script>
    <?php include __DIR__ . './parts/h_f_script.php' ?>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        var sizeChose = "M";
        var nac_chose_pieces = "1";
        let cate_sid = <?= $cate_sid ?>;

        /*亂數*/
        function getRandom(x) {
            return Math.floor(Math.random() * x) + 1;
        };

        //MENU判斷
        switch (cate_sid) {
            case 1:
                $("a.nac_cate").attr("href", "./customized.php#nac_customized_main").text("內衣")
                break;
            case 2:
                $("a.nac_cate").attr("href", "./customized.php#customized_top").text("上衣")
                break;
            case 3:
                $("a.nac_cate").attr("href", "./customized.php#customized_bottoms").text("下著")
                break;
        }


        /*選擇顏色*/
        let can_cus_color = <?= $can_cus_color_count ?>;
        let colors = ["#FFFFFF", "#505050", "#ca054d", "#ff9900", "#ffbe33", "#1eccbd", "#1d6be0", "#7226b1"];
        let pickId = "Clothes_area1";
        let clothes_area = "";
        let colorPick = "";
        let colorPick_nac = "";

        //預設顏色
        $('svg path').css("fill", colors[0])

        // 生成色盤
        colors.forEach(
            function(color) {
                colorPick_nac += `
            <li class="nac_chose_color_btn" date-colorChoseOne="color1_nac_${color}" style="background: ${color}" data-color="${color}"></li>`
            });

        // 色盤放進網頁
        $(".nac_chose_color_area").append(colorPick_nac);
        // $(".nac_chose_color_area, #colorPanel ul").append(colorPick_nac);
        const nac_colorPanel = $('#colorPanel ul.nax_panel_color_outsidebox')


        var nac_windw_width = $(window).width();
        $(window).resize(function() {
            nac_windw_width = $(window).width();

        })

        let picture_outbox_size = $(".customized_detail_picture_outbox").width()
        let nac_pigment_spacing = picture_outbox_size / 7
        let nac_pigment_move = picture_outbox_size / 5.3
        let nac_pigment_size = picture_outbox_size / 11
        console.log(picture_outbox_size)

        if (nac_windw_width > 768) {
            let b, i, unitRad, ballNum
            ballNum = colors.length
            unitRad = 2 * Math.PI / ballNum
            for (let i = 0; i < ballNum; i++) {
                b = document.createElement('li')
                b.className = 'color_panel_pigment'
                b.style.background = colors[i]
                b.style.width = nac_pigment_size + "px"
                b.style.height = nac_pigment_size + "px"
                b.style.left = nac_pigment_spacing + 'px'
                b.style.top = nac_pigment_spacing + 'px'
                $(nac_colorPanel).append(b)
            }
        } else {
            let b, i, unitRad, ballNum
            ballNum = colors.length
            unitRad = 2 * Math.PI / ballNum
            for (let i = 0; i < ballNum; i++) {
                b = document.createElement('li')
                b.className = 'color_panel_pigment'
                b.style.background = colors[i]
                b.style.width = 45 + "px"
                b.style.height = 45 + "px"
                b.style.left = 75 /*+ 75 * Math.cos(i * unitRad)*/ + 'px'
                b.style.top = 75 /*+ 75 * Math.sin(i * unitRad)*/ + 'px'
                $(nac_colorPanel).append(b)
            }
        }





        //預設ACTIVE
        $("ul.nac_chose_color_area:eq(0) li").eq(0).addClass("active")
        $("ul.nac_chose_color_area:eq(1) li").eq(0).addClass("active")
        $("ul.nac_chose_color_area:eq(2) li").eq(0).addClass("active")

        // console.log($("#Clothes_area1").css("fill"))
        // console.log($("#Clothes_area2").css("fill"))
        // console.log($("#Clothes_area3").css("fill"))


        // 色盤點擊行為
        $("ul.nac_chose_color_area li.nac_chose_color_btn").click(function(e) {
            e.stopPropagation(); //禁止往下(外)傳送行為
            let color = $(this).css("background-color"); //取得選中色碼
            let colorIndex = $(this).index(); //是第幾個色塊(index順序)
            let pick_which_area = $(this).parent().attr("data-clothes_area") //點到的色盤是控制哪個區域的
            let nowcolor = ""
            pickId = pick_which_area //點到的色盤是控制哪個區域,回傳給全域變數
            clothes_area = `#${pick_which_area}` //回傳給全域變數     
            $(clothes_area).css("fill", color) //填色



            $(this).addClass("active").siblings().removeClass("active") //點到哪個提示
            $("#colorPanel").css("opacity", "0");
            setTimeout(function() {
                $("#colorPanel").hide();
            }, 500);
            // console.log(clothes_area)
            // console.log($("#Clothes_area1").css("fill"))
            // console.log($("#Clothes_area2").css("fill"))
            // console.log($("#Clothes_area3").css("fill"))
        })

        // 即時色盤消失
        $("body").click(function() {
            let b, i, unitRad, ballNum
            ballNum = colors.length
            unitRad = 2 * Math.PI / ballNum
            $("#colorPanel").css("opacity", "0");
            for (let i = 0; i < ballNum; i++) {
                console.log(i)
                $('li.color_panel_pigment').css("left", nac_pigment_spacing + 'px')
                $('li.color_panel_pigment').css("top", nac_pigment_spacing + 'px')
            }
            setTimeout(function() {
                $("#colorPanel").hide();
            }, 500);
        });

        // 即時色盤
        $('svg path').click(function(e) { //Default mouse Position 
            e.stopPropagation();
            let elm = $(".customized_detail_picture");
            let xPos = e.pageX - (elm.offset().left);
            let yPos = e.pageY - (elm.offset().top);
            pickId = $(this).attr("id")
            pickClothes = $("#" + pickId)
            $("#colorPanel").show();
            $("#colorPanel").css("opacity", "1");



            let b, i, unitRad, ballNum
            ballNum = colors.length
            unitRad = 2 * Math.PI / ballNum

            if (nac_windw_width > 768) {
                $("#colorPanel").css({
                    left: xPos - nac_pigment_move,
                    top: yPos - nac_pigment_move
                })
                for (let i = 0; i < ballNum; i++) {
                    console.log(i)
                    $('li.color_panel_pigment').eq(i).css("left", nac_pigment_spacing + nac_pigment_spacing * Math.cos(i * unitRad) + 'px')
                    $('li.color_panel_pigment').eq(i).css("top", nac_pigment_spacing + nac_pigment_spacing * Math.sin(i * unitRad) + 'px')
                }
            } else {
                $("#colorPanel").css({
                    left: xPos - 95,
                    top: yPos - 95
                })
                for (let i = 0; i < ballNum; i++) {
                    console.log(i)
                    $('li.color_panel_pigment').eq(i).css("left", 75 + 75 * Math.cos(i * unitRad) + 'px')
                    $('li.color_panel_pigment').eq(i).css("top", 75 + 75 * Math.sin(i * unitRad) + 'px')
                }
            }

        });


        // 即時色盤填塞
        $("#colorPanel li").click(function(e) {
            e.stopPropagation();
            let color = $(this).css("background-color");
            let colorIndex = $(this).index();
            pickClothes.css("fill", color)
            $("#colorPanel").css("opacity", "0");
            setTimeout(function() {
                $("#colorPanel").hide();
            }, 500);

            if (pickId == $("ul.nac_chose_color_area").eq(0).attr("data-clothes_area")) {
                $("ul.nac_chose_color_area:eq(0) li").eq(colorIndex).addClass("active").siblings().removeClass("active")
            } else if (pickId == $("ul.nac_chose_color_area").eq(1).attr("data-clothes_area")) {
                $("ul.nac_chose_color_area:eq(1) li").eq(colorIndex).addClass("active").siblings().removeClass("active")

            } else if (pickId == $("ul.nac_chose_color_area").eq(2).attr("data-clothes_area")) {
                $("ul.nac_chose_color_area:eq(2) li").eq(colorIndex).addClass("active").siblings().removeClass("active")
            }
            let b, i, unitRad, ballNum
            ballNum = colors.length
            unitRad = 2 * Math.PI / ballNum
            $("#colorPanel").css("opacity", "0");
            for (let i = 0; i < ballNum; i++) {
                console.log(i)
                $('li.color_panel_pigment').css("left", nac_pigment_spacing + 'px')
                $('li.color_panel_pigment').css("top", nac_pigment_spacing + 'px')
            }
            setTimeout(function() {
                $("#colorPanel").hide();
            }, 500);
            //console.log(clothes_area)
            console.log($("#Clothes_area1").css("fill"))
            console.log($("#Clothes_area2").css("fill"))
            console.log($("#Clothes_area3").css("fill"))
        })


        /*尺寸選擇*/
        $(".nac_size_btn").click(function() {
            $(this).addClass("active")
            $(this).parents().siblings().find(".nac_size_btn").removeClass("active")
            sizeChose = $(this).attr("date-sizeChose")
            console.log(sizeChose)
        })



        /* 數量加減 */

        if (document.getElementById("pieces_count").innerHTML > 1) {
            $(".nac_plus").css("background-color", "rgb(202, 5, 77)")
            $(".nac_plus").removeAttr('disabled')
        } else {
            $(".nac_plus").css("background-color", "#d8d8d8")
            $(".nac_plus").attr('disabled', 'true')
        }

        $(".nac_chose_pieces_btn").click(function() {
            if (document.getElementById("pieces_count").innerHTML > 1) {
                $(".nac_plus").css("background-color", "rgb(202, 5, 77)")
                $(".nac_plus").removeAttr('disabled')
            } else {
                $(".nac_plus").css("background-color", "#d8d8d8")
                $(".nac_plus").attr('disabled', 'true')
            }
        })

        function insc() {
            var count = document.getElementById("pieces_count").innerHTML;
            document.getElementById("pieces_count").innerHTML = parseInt(count) + 1;
            nac_chose_pieces = document.getElementById("pieces_count").innerHTML = parseInt(count) + 1;
            console.log(nac_chose_pieces)
        }

        function dec() {
            var count = document.getElementById("pieces_count").innerHTML;
            if (parseInt(count) > 1) {
                document.getElementById("pieces_count").innerHTML = parseInt(count) - 1;
                nac_chose_pieces = document.getElementById("pieces_count").innerHTML = parseInt(count) - 1;
            };

            console.log(nac_chose_pieces)
        }
    </script>

    <script>
        //加入購物車
        function addToCart() {
            event.preventDefault();
            //取得商品sid 數量 尺寸
            let cus_sid = $(".customized_detail_desi").attr("data-sid");
            let cus_qty = $(".nac_chose_pieces_count").text();
            let cus_size = $(".nac_size_btn.active").attr("date-sizeChose");
            cus_color = ["#FFFFFF", "FFFFFF", "FFFFFF"]; //預設值


            //取得顏色資訊
            cus_colorFirst = $("ul.nac_chose_color_area:eq(0) li.active").attr("data-color");
            cus_colorSecond = $("ul.nac_chose_color_area:eq(1) li.active").attr("data-color");
            cus_colorThird = $("ul.nac_chose_color_area:eq(2) li.active").attr("data-color");
            cus_color = [cus_colorFirst, cus_colorSecond, cus_colorThird];

            //包裝資料 送進購物車
            let cus_data = {
                cus_sid: cus_sid,
                cus_qty: cus_qty,
                cus_size: cus_size,
                cus_color: cus_color
            };

            // console.log(`cus_sid: ${cus_sid}, cus_qty: ${cus_qty}, cus_size: ${cus_size}`)
            // console.log(`cus_colorFirst: ${cus_colorFirst}, cus_colorSecond: ${cus_colorSecond}, cus_colorThird: ${cus_colorThird}`)
            // console.log(`cus_color: ${cus_color}`)
            console.log(cus_data)


            $.get("add_to_cart_api.php", {
                cus_data: cus_data
            }, function(data) {
                if (data) {
                    countCartObj(data)
                    // alert("已加入購物車")
                    $('.a_alert.a_addToCart').fadeIn();
                    setTimeout(function() {
                        $('.a_alert.a_addToCart').fadeOut();
                    }, 800);
                }
            }, "json");
        }

        function goToCart() {
            //取得商品sid 數量 尺寸
            let cus_sid = $(".customized_detail_desi").attr("data-sid");
            let cus_qty = $(".nac_chose_pieces_count").text();
            let cus_size = $(".nac_size_btn.active").attr("date-sizeChose");
            cus_color = ["#FFFFFF", "FFFFFF", "FFFFFF"]; //預設值


            //取得顏色資訊
            cus_colorFirst = $("ul.nac_chose_color_area:eq(0) li.active").attr("data-color");
            cus_colorSecond = $("ul.nac_chose_color_area:eq(1) li.active").attr("data-color");
            cus_colorThird = $("ul.nac_chose_color_area:eq(2) li.active").attr("data-color");
            cus_color = [cus_colorFirst, cus_colorSecond, cus_colorThird];

            //包裝資料 送進購物車
            let cus_data = {
                cus_sid: cus_sid,
                cus_qty: cus_qty,
                cus_size: cus_size,
                cus_color: cus_color
            };

            // console.log(`cus_sid: ${cus_sid}, cus_qty: ${cus_qty}, cus_size: ${cus_size}`)
            // console.log(`cus_colorFirst: ${cus_colorFirst}, cus_colorSecond: ${cus_colorSecond}, cus_colorThird: ${cus_colorThird}`)
            // console.log(`cus_color: ${cus_color}`)
            // console.log(cus_data)

            // 傳送資料給後端
            // countCartObj(data) 讓所有頁面一進來就能讀到購物車內的商品數 (寫在parts 的 script裡)
            $.get("add_to_cart_api.php", {
                cus_data: cus_data
            }, function(data) {
                console.log(data);
                if (data.success) {
                    countCartObj(data)
                    location.href = "cart_step1.php";
                }
            }, "json");
        }

        $(".wea_sizelist").click(function(){
        $(".wea_imgbox_base").css("display","inline-block");
      })
    $(".wea_imgbox_base a").click(function(){
        $(".wea_imgbox_base").css("display","none");
    })
    </script>
</body>

</html>