<?php
require __DIR__. '/__connect_db.php';


$i=0;
if(!empty($_SESSION["cart"])) {

    $pKeys = array_keys($_SESSION['cart']);

    $data_ar = [];

    if (!empty($pKeys)) {
        $cartProSql = sprintf("SELECT * FROM `size` WHERE `sid` IN(%s)", implode(',', $pKeys));
        $cartProStmt = $pdo->query($cartProSql);
        $cartProRows = $cartProStmt->fetchAll();


        foreach ($cartProRows as $pro) {

            $cartProRows[$i]['quantity'] = $_SESSION['cart'][$pro['sid']];

            $colorSql = "SELECT * FROM `color` WHERE `sid`=" . $pro['color_sid'];
            $colorStmt = $pdo->query($colorSql);
            $colorRows = $colorStmt->fetchAll();
            $cartProRows[$i]['color'] = $colorRows;


            $proSql = "SELECT * FROM `products` WHERE `sid`=" . $pro['pro_sid'];
            $proStmt = $pdo->query($proSql);
            $proRows = $proStmt->fetchAll();

            $cartProRows[$i]['product'] = $proRows;


            $i++;
        };


    }
}
//print_r($cartProRows);
// $rows = []; // 預設值
// $data_ar = []; // dict

// if(!empty($pKeys)) {
//     $sql = sprintf("SELECT * FROM products WHERE sid IN(%s)", implode(',', $pKeys));
//     $rows = $pdo->query($sql)->fetchAll();
    
   
//     foreach($rows as $r){
//         $r['quantity'] = $_SESSION['cart'][$r['sid']];
//         $data_ar[$r['sid']] = $r;
        
//     }
// }


//抓客製化商品資料---------------------------------------------------------------------------------------------------------

if(!empty($_SESSION["customized"])) {

    $a_getcusData = isset($_SESSION["customized"]) ? $_SESSION["customized"] : '';
    $a_cusSid = [];
    $a_cusData = [];
    $j=0;

    foreach ($a_getcusData as $cus) {
        $a_cusData[$j] = $cus;
        $a_cusSid[] = $cus["cus_sid"];
        $j++;
    }

    $cusSql = sprintf("SELECT `sid`,`name`,`price` FROM `customize` WHERE `sid` IN (%s)", implode(',', $a_cusSid));
    $cusRows = $pdo->query($cusSql)->fetchAll();

    $k = 0;
    foreach ($cusRows as $cus) {
        $a_cusData[$k]['name'] = $cus["name"];
        $a_cusData[$k]['price'] = $cus["price"];
        $k++;
    };
}

//echo json_encode($a_cusData, JSON_UNESCAPED_UNICODE);




?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<!--  公版:link  -->
<?php include __DIR__ . '/parts/h_f_link.php'; ?>
<!--  公版:css  -->
<?php include __DIR__ . '/parts/h_f_css.php'; ?>
<?php include __DIR__ . '/parts/main-css.php'; ?>
<!--  公版:header  -->
<?php include __DIR__ . '/parts/header.php'; ?>
    <!-- 推出 header 空間-->
    <div class="a_push_place"></div>
    <div class="t_page_cart">
        <div class="t_wrap">
            <div class="t_step_panel">
                <ul class="d-flex justify-content-center">
                    <li class="t_step1 t_icon_active">1<p>購物車</p></li>
                    <li class="t_step2">2<p>填寫資料</p></li>
                    <li class="t_step3">3<p>訂單確認</p></li>
                </ul>
            </div>
            <div class="t_step_panel_mobile t_web_none">
                <ul class="d-flex justify-content-center">
                    <li class="active">購物車</li>
                    <li class="">填寫資料</li>
                    <li class="">訂單確認</li>
                </ul>
            </div>
            <section>
                <div class="t_main_cart">
                    <h5>購物車(<span class="a_countNum" id="productItem"></span>項，共<span id="totalQty"></span> 件)</h5>
                    <div class="t_grid-container_cart1">
                        <div></div>
                        <div>
                            <h6>商品</h6>
                        </div>
                        <div></div>
                        <div>
                            <h6>顏色</h6>
                        </div>
                        <div>
                            <h6>尺寸</h6>
                        </div>
                        <div>
                            <h6>數量</h6>
                        </div>
                        <div>
                            <h6>小計</h6>
                        </div>
                        <div>
                            <h6>刪除</h6>
                        </div>
                    </div>

                    <!-- ---------------------商品細節web start--------------------- -->
                    <div>
                        <?php if(!empty($_SESSION["cart"])): ?>
                            <?php
                            $j=0;
                            foreach($cartProRows as $r):
                                // $item = $cartProRows[$sid];
                                $colorArr = json_decode($r['color'][0]['pro_pic']);
                                // print_r($colorArr);
                                ?>
                                <div class="t_grid-container_cart1_productinfo p-item" data-sid="<?= $r['sid'] ?>">
                                    <div></div>
                                    <div class="cart_img">
                                        <img src="./product_images/<?= $colorArr[0]?>.png" alt="">
                                    </div>
                                    <div class="t_text_left">
                                        <h6>
                                            <a href=""><?=$r['product'][0]['name'] ?></a>
                                            <br><br>
                                            <label class="price" data-price="<?= $r['product'][0]['price'] ?>"></label>
                                        </h6>
                                    </div>
                                    <div class="t_text_center">
                                        <div style="color: <?= $r['color'][0]['color'] ?>" ><i class="fas fa-circle fa-lg"></i></div>
                                    </div>
                                    <div>
                                        <h6><?= $r['size']; ?></h6>
                                    </div>
                                    <div class="t_wea_product_main_count d-flex align-items-center">
                                        <li><a><div class="minus <?= $r['quantity'] == 1 ? "unckick" : "" ?>">-</div></a></li>
                                        <li><div  data-maxnum="<?= $r['in_stock'] ?>" class="quantity" ><?= $r['quantity'] ?></div></li>
                                        <li><a><div class="plus <?= $r['quantity'] == $r['in_stock'] ? "unckick" : "" ?>">+</div></a></li>
                                    </div>
                                    <div>
                                        <h6 class="sub-total"></h6>
                                    </div>
                                    <div>
                                        <a href="#" onclick="removeProductItem(event)"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </div>

                        <?php
                        $j++;
                        endforeach; ?>
                    <?php endif; ?>

                    <!-- ---------------------------- 客製化商品 (web)------------------------ -->
                    <?php if(!empty($_SESSION["customized"])): ?>
                    <?php foreach($a_cusData as $cus): ?>
                    <div class="t_grid-container_cart1_productinfo p-item" data-sid="<?= $cus['cus_sid'] ?>">
                        <div></div>
                        <div class="cart_img">
                            <img src="./images/customized_sportsbras_01_pro_pic.png" alt="">
                        </div>
                        <div class="t_text_left">
                            <h6>
                                <a href=""><?= $cus['name'] ?></a>
                                <br><br>
                                <label class="price" data-price="<?= $cus['price'] ?>"></label>
                            </h6>
                        </div>
                        <div class="t_text_center">
                            <div style="color: black" ><i class="fas fa-circle fa-lg"></i></div>
                        </div>
                        <div>
                            <h6><?= $cus['cus_size'] ?></h6>
                        </div>
                        <div class="t_wea_product_main_count d-flex align-items-center">
                            <li><a><div class="minus <?= $cus['cus_qty'] == 1 ? "unckick" : "" ?>">-</div></a></li>
                            <li><div data-maxnum="50" class="quantity" ><?= $cus['cus_qty'] ?></div></li>
                            <li><a><div class="plus <?= $cus['cus_qty'] == 50 ? "unckick" : "" ?>">+</div></a></li>
                        </div>
                        <div>
                            <h6 class="sub-total"></h6>
                        </div>
                        <div>
                            <a href="#" onclick="removeProductItem(event)"><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </div>

                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                    <!-- ---------------------商品細節web end--------------------- -->



                    <!-- ---------------------商品細節mobile start--------------------- -->
                    <div>
                        <?php if(!empty($_SESSION["cart"])): ?>
                            <?php
                            $j=0;
                            foreach($cartProRows as $r):
                                // $item = $cartProRows[$sid];
                                $colorArr = json_decode($r['color'][0]['pro_pic']);
                                // print_r($colorArr);
                            ?>

                            <div class="t_grid-container_cart1_productinfo_mobile t_web_none p-item" data-sid="<?= $r['sid'] ?>">
                                <div class="cart_img">
                                    <img src="./product_images/<?= $colorArr[0]?>.png" alt="">
                                </div>
                                <div class="t_text_left">
                                        <a href=""><?=$r['product'][0]['name'] ?></a> 
                                        <br>
                                        <label class="price" data-price="<?= $r['product'][0]['price'] ?>"></label>
                                        <div class="d-flex justify-content-start align-items-baseline">
                                            <div style="color: <?= $r['color'][0]['color'] ?>" >
                                                <i class="fas fa-circle t_color_size_between"></i>
                                            </div>
                                            <p><?= $r['size']; ?></p>
                                        </div>
                                        <div class="t_wea_product_main_count d-flex align-items-center">
                                            <li><a><div class="minus <?= $r['quantity'] == 1 ? "unckick" : "" ?>">-</div></a></li>
                                            <li><div class="quantity" data-maxnum="<?= $r['in_stock'] ?>" ><?= $r['quantity'] ?></div></li>
                                            <li><a><div class="plus <?= $r['quantity'] == $r['in_stock']? "unckick" : "" ?>">+</div></a></li>
                                        </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div>
                                    <a href="#" onclick="removeProductItem(event)"><i class="fas fa-times fa-2x"></i></a>
                                    </div>
                                    <div class="align-self-end">
                                        <h6 class="sub-total"></h6>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $j++;
                            endforeach; ?>
                        <?php endif; ?>
                        <!-- ---------------------------- 客製化商品 (mobile)------------------------ -->

                        <?php if(!empty($_SESSION["customized"])): ?>
                        <?php foreach($a_cusData as $cus): ?>
                            <div class="t_grid-container_cart1_productinfo_mobile t_web_none p-item" data-sid="<?= $cus['cus_sid'] ?>">
                                <div class="cart_img">
                                    <img src="./images/customized_sportsbras_01_pro_pic.png" alt="">
                                </div>
                                <div class="t_text_left">
                                    <a href=""><?=$cus['name'] ?></a>
                                    <br>
                                    <label class="price" data-price="<?= $cus['price'] ?>"></label>
                                    <div class="d-flex justify-content-start align-items-baseline">
                                        <div style="color: <?= $r['color'][0]['color'] ?>" >
                                            <i class="fas fa-circle t_color_size_between"></i>
                                        </div>
                                        <p><?= $cus['cus_size']; ?></p>
                                    </div>
                                    <div class="t_wea_product_main_count d-flex align-items-center">
                                        <li><a><div class="minus <?= $cus['cus_qty'] == 1 ? "unckick" : "" ?>">-</div></a></li>
                                        <li><div class="quantity" data-maxnum="50" ><?= $cus['cus_qty'] ?></div></li>
                                        <li><a><div class="plus <?= $cus['cus_qty'] == 50 ? "unckick" : "" ?>">+</div></a></li>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div>
                                        <a href="#" onclick="removeProductItem(event)"><i class="fas fa-times fa-2x"></i></a>
                                    </div>
                                    <div class="align-self-end">
                                        <h6 class="sub-total"></h6>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $j++;
                            endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <!-- ---------------------商品細節mobile end--------------------- -->
                </div>
                    <hr class="t_separation_line">

                    <section class="d-flex justify-content-end">
                        <div class="t_cart1_subtotal">
                            <h5>訂單金額</h5>
                            <div class="t_grid-container_subtotal">
                                <div>商品總金額</div>
                                <div class="t_text_right" id="totalAmount"></div>
                            </div>
                            <a><div class="t_cart1_checkout_btn">
                                <input value="立即結帳→" class="btn" onclick="a_goCartPageSecond()">
                            </div></a>
                        </div>
                    </section>    
                </div>
                
            </section>
            

        </div>
    </div>
    <!--  公版:footer  -->
    <?php include __DIR__ . '/parts/footer.php'; ?>
    <!--  公版:script  -->
    <?php include __DIR__ . '/parts/h_f_script.php'; ?>



    <!-- jQuery -->
    <script
      src="https://code.jquery.com/jquery-3.5.0.min.js"
      integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
      crossorigin="anonymous"></script>
    <script>

    //數量
    var selectMax ; 
    var selectCountNum ;
    var thisnum ;

    $(".notice").hide();
    
    function countNumState(num,stocknum){

        if(selectCountNum == 1){
                $(num).find("li").eq(0).find("div").addClass("unckick");
            }else{
                $(num).find("li").eq(0).find("div").removeClass("unckick");
            }
            if(selectCountNum == stocknum){
                $(num).find("li").eq(2).find("div").addClass("unckick");
            }else{
                $(num).find("li").eq(2).find("div").removeClass("unckick");
            }

    }
    
    
    // countNumState();    
    $(".plus:visible").click(function(){
        // console.log("plus")
        cart_sid = $(this).closest('.p-item').attr("data-sid");
        thisnum = $(this).closest(".t_wea_product_main_count");
        selectMax = $(this).closest(".t_wea_product_main_count").find("li").eq(1).find("div").attr("data-maxnum");
        // console.log(thisnum );
        if($(this).hasClass("unckick") == false){
            selectCountNum = $(this).closest(".t_wea_product_main_count").find("li").eq(1).find("div").text();
            // console.log(selectCountNum)
            selectCountNum = parseInt(selectCountNum) +1;
            $(this).closest(".t_wea_product_main_count").find("li").eq(1).find("div").text(selectCountNum);
            // countNumState(document.getElementById("countnum").data("stocknum"));
            // console.log(selectMax);
            countNumState(thisnum,selectMax);
            calPrices();
            changeQty(cart_sid);

        }
    })
    $(".minus:visible").click(function(){
        cart_sid = $(this).closest('.p-item').attr("data-sid");
        thisnum = $(this).closest(".t_wea_product_main_count");
        selectMax = $(this).closest(".t_wea_product_main_count").find("li").eq(1).find("div").attr("data-maxnum");
        if($(this).hasClass("unckick") == false){
            selectCountNum = $(this).closest(".t_wea_product_main_count").find("li").eq(1).find("div").text();
            selectCountNum = parseInt(selectCountNum) -1;
            $(this).closest(".t_wea_product_main_count").find("li").eq(1).find("div").text(selectCountNum);
            countNumState(thisnum,selectMax);
            calPrices();
            changeQty(cart_sid);
        }
    })


      const dallorCommas = function(n){
        return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    };

    function removeProductItem(event){
        event.preventDefault(); // 避免 <a> 的連結
        const div = $(event.target).closest('div.p-item')
        const cart_sid = div.attr('data-sid');
        console.log(cart_sid)
        $.get('remove_from_cart_api.php', {cart_sid}, function(data){
            div.remove();
            countCartObj(data);
            calPrices();
        }, 'json')

    }

    function changeQty(cart_sid){
        let cart_qty = selectCountNum;
        console.log(`cart_qty:${cart_qty}`)
        console.log(`cart_sid:${cart_sid}`)

        $.get('add_to_cart_api.php', { cart_sid,cart_qty}, function(data){
            countCartObj(data);
            // calPrices();
        }, 'json');

    }

    function calPrices() {
        const p_items = $('.p-item:visible');
        let total = 0;
        let totalQty=0;
        let productCount=p_items.length;
        $("#productItem").text(productCount);
        // if(! p_items.length){
        //     alert('請先將商品加入購物車');
        //     location.href = 'product-list.php';
        //     return;
        // }


        p_items.each(function(i, el){
            // console.log( $(el).attr('data-sid') );
            // let price = parseInt( $(el).find('.price').attr('data-price') );
            // let price = $(el).find('.price').attr('data-price') * 1;

            const $price = $(el).find('.price'); // 價格的 <td>
            $price.text( '$ ' + dallorCommas($price.attr('data-price')) );
            // console.log($price.attr('data-price'))

            const $qty =  $(el).find('.quantity'); // <select> combo box
            // console.log($qty)

            // 如果有的話才設定
            if($qty.attr('data-qty')){
                $qty.text( $qty.attr('data-qty') );
                
            }
            // console.log("qty:"+$qty.text())
            totalQty+=parseInt($qty.text());
            $qty.removeAttr('data-qty'); // 設定完就移除
            console.log($qty.text())
            const $sub_total = $(el).find('.sub-total');
            $sub_total.text('$ ' + dallorCommas($price.attr('data-price') * $qty.text()));


            total += $price.attr('data-price') * $qty.text();

        });
        $('#totalAmount').text( '$ ' + dallorCommas(total));
        $("#totalQty").text(totalQty)

    }
    calPrices();
    
    
    </script>
    <script>

        function a_goCartPageSecond () {
            location.reload();
            $.get("isset_session.php", function (data) {
                if(data.cart || data.customized){
                    location.href = "cart_step2.php";
                }else {
                    alert("購物車裡沒有東西");
                }
                console.log(data);
            }, "json")
            //     .done(function() {
            //         console.log("success")
            // })
            //     .fail(function(err) {
            //        console.log(er)
            //     });
        }

    </script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>