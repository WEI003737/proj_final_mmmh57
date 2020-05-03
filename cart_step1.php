<?php
require __DIR__. '/__connect_db.php';

$pKeys = array_keys($_SESSION['cart']);

$data_ar = [];
$i=0;

if(!empty($pKeys)) {
    $cartProSql = sprintf("SELECT * FROM `size` WHERE `sid` IN(%s)", implode(',', $pKeys));
    $cartProStmt = $pdo -> query($cartProSql);
    $cartProRows = $cartProStmt -> fetchAll();

    foreach($cartProRows as $pro){

        $cartProRows[$i]['quantity'] = $_SESSION['cart'][$pro['sid']];

        $colorSql = "SELECT * FROM `color` WHERE `sid`=".$pro['color_sid'];
        $colorStmt = $pdo -> query($colorSql);
        $colorRows = $colorStmt -> fetchAll();
        $cartProRows[$i]['color'] = $colorRows;


        $proSql = "SELECT * FROM `products` WHERE `sid`=".$pro['pro_sid'];
        $proStmt = $pdo -> query($proSql);
        $proRows = $proStmt -> fetchAll();

        $cartProRows[$i]['product'] = $proRows;


        $i++;
    };


}

print_r($cartProRows);

?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<!-- 公版: link -->
<?php include __DIR__ . '/parts/h_f_link.php'; ?>
<!-- 公版: css -->
<?php include __DIR__ . '/parts/h_f_css.php'; ?>
<?php include __DIR__ . '/parts/main-css.php'; ?>

<!-- 公版: header -->
<?php include __DIR__ . '/parts/header.php' ?>
    <div class="a_push_place"></div>
    <div class="t_page_cart">
        <div class="t_wrap">
            <div class="t_step_panel">
                <ul class="d-flex justify-content-center">
                    <li class="t_step1">1<p>購物車</p></li>
                    <li class="t_step2">2<p>填寫資料</p></li>
                    <li class="t_step3">3<p>訂單確認</p></li>
                </ul>
            </div>
            <div class="t_step_panel_mobile">
                <ul class="d-flex justify-content-center">
                    <li class="t_step1_mobile">購物車</li>
                    <li class="t_step2_mobile">填寫資料</li>
                    <li class="t_step3_mobile">訂單確認</li>
                </ul>
            </div>
            <section>
                <div class="t_main_cart">
                    <h5>購物車(共2件)</h5>
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
                    <!-- ---------------------商品細節start--------------------- -->
                    <div>
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
                                    <li><a><div id="minus<?= $j?>" class="minus" onclick="changeQty(event)">-</div></a></li>
                                    <li><div id="countnum<?= $j?>" data-qty="<?= $r['quantity'] ?>" data-maxnum="<?= $r['in_stock'] ?>" class="quantity" ></div></li>
                                    <li><a><div id="plus<?= $j?> " class="plus" onclick="changeQty(event)"  data-stock="<?= $r['in_stock'] ?>">+</div></a></li>
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
                    </div>
                </div>
                <!-- ---------------------商品細節web end--------------------- -->



                <!-- ---------------------商品細節mobile start--------------------- -->
                <div>
                    <?php
                    $j=0;
                    foreach($cartProRows as $r):
                        // $item = $cartProRows[$sid];
                        $colorArr = json_decode($r['color'][0]['pro_pic']);
                        // print_r($colorArr);
                        ?>
                        <div class="t_grid-container_cart1_productinfo_mobile t_web_none p-item" data-sid="<?= $sid ?>">
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
                                    <li><a><div id="minus" >-</div></a></li>
                                    <li><div class="quantity" onchange="changeQty(event)" id="countnum"><?= $r['quantity'] ?></div></li>
                                    <li><a><div id="plus">+</div></a></li>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div>
                                    <i class="fas fa-times fa-2x"></i>
                                </div>
                                <div class="align-self-end">
                                    <h6 class="sub-total"></h6>
                                </div>
                            </div>
                        </div>
                        <?php
                        $j++;
                    endforeach; ?>
                </div>
                <!-- ---------------------商品細節mobile end--------------------- -->

                <hr class="t_separation_line">

                <section class="d-flex justify-content-end">
                    <div class="t_cart1_subtotal">
                        <h5>訂單金額</h5>
                        <div class="t_grid-container_subtotal">
                            <div>商品總金額</div>
                            <div class="t_text_right" id="totalAmount"></div>
                        </div>
                        <div class="t_cart1_checkout_btn">
                            <input type="submit" value="立即結帳→" class="btn">
                        </div>
                    </div>
                </section>
        </div>

        </section>


    </div>
    </div>
<?php include __DIR__ . '/parts/footer.php'; ?>
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

        function countNumState(event){

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
        $(".plus").click(function(){
            thisnum = $(this).closest(".t_wea_product_main_count").find("#countnum").text();
            selectMax = $(this).closest(".t_wea_product_main_count").find("li").eq(1).find("div").attr("data-maxnum");
            console.log(thisnum );
            if($(this).hasClass("unckick") == false){
                selectCountNum = $(this).closest(".t_wea_product_main_count").find("li").eq(1).find("div").text();
                selectCountNum = parseInt(selectCountNum) +1;
                $(this).closest(".t_wea_product_main_count").find("li").eq(1).find("div").text(selectCountNum);
                // countNumState(document.getElementById("countnum").data("stocknum"));
                // console.log(selectMax);
                countNumState(thisnum,selectMax);


            }
        })
        $(".minus").click(function(){
            thisnum = $(this).closest(".t_wea_product_main_count");
            selectMax = $(this).closest(".t_wea_product_main_count").find("li").eq(1).find("div").attr("data-maxnum");
            if($(this).hasClass("unckick") == false){
                selectCountNum = $(this).closest(".t_wea_product_main_count").find("li").eq(1).find("div").text();
                selectCountNum = parseInt(selectCountNum) -1;
                $(this).closest(".t_wea_product_main_count").find("li").eq(1).find("div").text(selectCountNum);
                countNumState(thisnum,selectMax);
            }
        })



        const dallorCommas = function(n){
            return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        };

        function removeProductItem(event){
            event.preventDefault(); // 避免 <a> 的連結
            const p_item = $(event.target).closest('div.p-item')
            const cart_sid = p_item.attr('data-sid');

            $.get('add_to_cart_api.php', {cart_sid}, function(data){
                p_item.remove();
                countCartObj(data);
                calPrices();
            }, 'json');
        }

        function changeQty(event){
            let cart_qty = $(event.target).closest(".t_wea_product_main_count").find("li").eq(1).find("div").text();
            let p_item = $(event.target).closest('div.p-item');
            let cart_sid = p_item.attr('data-sid');
            console.log(cart_qty);
            console.log(cart_sid);

            $.get('add_to_cart_api.php', {cart_sid, cart_qty}, function(data){
                countCartObj(data);
                calPrices();
            }, 'json');

        }

        function calPrices() {
            const p_items = $('.p-item');
            let total = 0;
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
                $price.text( '$ ' + $price.attr('data-price') );

                const $qty =  $(el).find('.quantity'); // <select> combo box
                // 如果有的話才設定
                if($qty.attr('data-qty')){
                    $qty.text( $qty.attr('data-qty') );
                }
                $qty.removeAttr('data-qty'); // 設定完就移除

                const $sub_total = $(el).find('.sub-total');

                $sub_total.text('$ ' + dallorCommas($price.attr('data-price') * $qty.text()));
                total += $price.attr('data-price') * $qty.text();
            });

            $('#totalAmount').text( '$ ' + dallorCommas(total));

        }
        calPrices();


    </script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>