<?php
require __DIR__. '/__connect_db.php';


$totalItems = 0;
$totalProductItems = 0;
$totalCustomizedItems = 0;

//將存進session的最新訂單編號拿出
if(!empty($_SESSION["lastOrderSid"])){

    $lastOrderSid = $_SESSION["lastOrderSid"];
    $i=0;

    //訂單資訊
    $orderSql = "SELECT * FROM `orders` WHERE `sid`= $lastOrderSid";
    $orderRow = $pdo -> query($orderSql) -> fetchAll()[0];

    //訂單明細:普通商品
    $orderProductsSid = [];
    $orderProductsSql = "SELECT * FROM `order_details` WHERE `order_sid` = $lastOrderSid AND `is_cus` = '0'";
    $orderProductsRows = $pdo -> query($orderProductsSql) -> fetchAll();

    foreach($orderProductsRows as $op){

        //拿到color_sid 撈照片用
        $orderProductsSid[$i] = $op["color_sid"];

        $orderProductsPicSql = sprintf("SELECT `pro_pic` FROM `color` WHERE `sid` IN (%s)", implode(',',$orderProductsSid));
        $orderProductsPicRows = $pdo -> query($orderProductsPicSql) -> fetchAll();

        //撈出照片
        $j=0;
        foreach($orderProductsPicRows as $p) {
            $orderProductsRows[$j]["picture"] = $p;
            $j++;
        };

        //數量
        $totalProductItems += $orderProductsRows[$i]['gty'];

        $i++;
    };


    //訂單明細:客製化
    $orderCustomizedSql = "SELECT * FROM `order_details` WHERE `order_sid` = $lastOrderSid AND `is_cus` = '1'";
    $orderCustomizedRows = $pdo -> query($orderCustomizedSql) -> fetchAll();

    foreach($orderCustomizedRows as $oc){
        $orderCustomizedSid
    }

    //數量
    for($k = 0; $k < count($orderCustomizedRows); $k++){
        $totalCustomizedItems += $orderCustomizedRows[$k]["gty"];
    }


};

$numItems = count($orderProductsRows) + count($orderCustomizedRows);
$totalItems = $totalProductItems + $totalCustomizedItems;

echo json_encode($orderCustomizedRows)

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
                    <li class="t_step1">1<p>購物車</p></li>
                    <li class="t_step2">2<p>填寫資料</p></li>
                    <li class="t_step3 t_icon_active">3<p>訂單確認</p></li>
                </ul>
            </div>
            <div class="t_step_panel_mobile t_web_none">
                <ul class="d-flex justify-content-center">
                    <li class="">購物車</li>
                    <li class="">填寫資料</li>
                    <li class="active">訂單確認</li>
                </ul>
            </div>
            <hr class="t_separation_line t_mobile_none">
            <div class="t_cart3_orderfinish t_mobile_none">
                <div class="d-flex t_justify_align_center check_img">
                    <img src="./icon/check123.gif">
                    <!-- <div><i class="far fa-check-circle fa-fw fa-5x"></i></div> -->
                    <h5>感謝您！您的訂單已成立！<br><br>
                    訂單編號：<span class="t_color_ca054d"><?= $orderRow["order_num"] ?></span></h5>
                </div>
            </div>
            <div class="t_cart3_orderfinish_mobile t_web_none">
                <div class="check_img"><img src="./icon/check123.gif"></div>
                <!-- <div><i class="far fa-check-circle fa-fw fa-5x"></i></div> -->
                <h5>感謝您！您的訂單已成立！<br>
                訂單編號：<span class="t_color_ca054d"><?= $orderRow["order_num"] ?></span></h5>
            </div>
            <div class="t_main_cart"><hr class="t_separation_line_gr_long"></div>
            <section>
                <div class="t_cart3_orderdetail t_mobile_none">
                    <div class="t_grid-container_orderdetail">
                        <div class="t_text_center">訂單資訊</div>
                        <div class="t_orderdetail_info">
                            <p>訂單日期 : <?= $orderRow["created_date"] ?></p>
                            <p>訂單狀態 :  <span class="t_color_ca054d"><?= $orderRow["order_status"] ?></span></p>
                        </div>
                    </div>
                    <div class="t_grid-container_orderdetail">
                        <div class="t_text_center">付款資訊</div>
                        <div class="t_orderdetail_info">
                            <p>付款方式 : <?= $orderRow["payment"]?></p>
                            <p>優惠券折扣 : <?= $orderRow["coupon"]?></p>
                            <p>付款狀態 : <span class="t_color_ca054d">確認款項中</span></p>
                        </div>
                    </div>
                    <div class="t_grid-container_orderdetail">
                        <div class="t_text_center">寄送資訊</div>
                        <div class="t_orderdetail_info">
                            <p>收件人姓名 : <?= $orderRow["receiver"] ?></p>
                            <p>收件人電話 : <?= $orderRow["receiver_mobile"] ?></p>
                            <p>寄送方式 : 宅配寄送</p>
                            <p>地址 : <?= $orderRow["address"] ?></p>
                        </div>
                        <div class="t_justify_align_end">
                            <hr class="t_separation_line">
                            <div class="t_cart3_subtotal">
                                <h5>總金額：<span id="totalAmount" class="t_color_ca054d">NT <?= number_format($orderRow["amount"]) ?></span></h5>
                                <div class="d-flex">
                                    <i class="fas fa-angle-down fa-fw fa-2x"></i>
                                    <h5>購物車(<?= $numItems ?>項，共<?= $totalItems ?>件)</h5>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="t_unfold">
                        <div class="t_main_cart">
                            <div class="t_grid-container_cart3">
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
                            </div>
                            <!-- ---------------------商品細節web start--------------------- -->
                            <div>
                                <?php if(count($orderProductsRows)): ?>
                                    <?php
                                    $j=0;
                                    foreach($orderProductsRows as $op):
                                    $picArr = json_decode($op["picture"]["pro_pic"]); ?>
                                        <div class="t_grid-container_cart3_productinfo p-item" data-sizeSid="<?= $op['size_sid'] ?>">
                                            <div></div>
                                            <div class="cart_img">
                                                <img src="./product_images/<?= $picArr[0] ?>.png" alt="">
                                            </div>
                                            <div class="t_text_left">
                                                <h6>
                                                    <a href=""><?=$op['name'] ?></a>
                                                    <br><br>
                                                    <label class="price" data-price="<?= $op['price'] ?>"></label>
                                                </h6>
                                            </div>
                                            <div class="t_text_center">
                                                <div style="color: <?= $op['color'] ?>" ><i class="fas fa-circle fa-lg"></i></div>
                                            </div>
                                            <div>
                                                <h6><?= $op['size']; ?></h6>
                                            </div>
                                            <div>
                                                <div class="quantity" data-qty="<?= $op['gty'] ?>"></div>
                                            </div>
                                            <div>
                                                <h6 class="sub-total t_color_ca054d"></h6>
                                            </div>
                                        </div>
                                    <?php
                                    $j++;
                                    endforeach; ?>
                                <?php endif; ?>

                                <!-- --------------------------- 客製化 web ------------------------------ -->

                                <?php if(count($orderCustomizedRows)): ?>

                                    <?php
                                    $j=0;
                                    foreach($orderCustomizedRows as $oc):
                                    $colorArr = json_decode($oc["cus_color"]); ?>

                                    <div class="t_grid-container_cart3_productinfo p-item" data-proSid="<?= $oc['pro_sid'] ?>">
                                        <div></div>
                                        <div class="cart_img">
                                            <img src="./images/customized_sportsbras_01_pro_pic.png" alt="">
                                        </div>
                                        <div class="t_text_left">
                                            <h6>
                                                <a href=""><?=$oc['name'] ?></a>
                                                <br><br>
                                                <label class="price" data-price="<?= $oc['price'] ?>"></label>
                                            </h6>
                                        </div>
                                        <div class="t_text_center">
                                            <?php for($i=0 ; $i < count($colorArr) ;$i++): ?>
                                            <div style="color: <?= $colorArr[$i] ?>" ><i class="fas fa-circle fa-lg"></i></div>
                                            <?php endfor; ?>
                                        </div>
                                        <div>
                                            <h6><?= $oc['size']; ?></h6>
                                        </div>
                                        <div>
                                            <div class="quantity" data-qty="<?= $oc['gty'] ?>"></div>
                                        </div>
                                        <div>
                                            <h6 class="sub-total t_color_ca054d"></h6>
                                        </div>
                                    </div>
                                    <?php

                                    $j++;
                                    endforeach; ?>
                                <?php endif; ?>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="t_cart3_orderdetail_mobile t_web_none">
                    <div class="t_grid-container_orderdetail_mobile">
                        <div class="t_text_center">訂單資訊</div>
                        <div class="t_orderdetail_info">
                            <p>訂單日期 : <?= $orderRow["created_date"] ?></p>
                            <p>訂單狀態 : <span class="t_color_ca054d"><?= $orderRow["order_status"] ?></span></p>
                        </div>
                    </div>
                    <div class="t_grid-container_orderdetail_mobile">
                        <div class="t_text_center">付款資訊</div>
                        <div class="t_orderdetail_info">
                            <p>付款方式 : <?= $orderRow["payment"]?></p>
                            <p>優惠券折扣 : <?= $orderRow["coupon"]?></p>
                            <p>付款狀態 : <span class="t_color_ca054d">確認款項中</span></p>
                        </div>
                    </div>
                    <div class="t_grid-container_orderdetail_mobile">
                        <div class="t_text_center">寄送資訊</div>
                        <div class="t_orderdetail_info">
                            <p>收件人姓名 : <?= $orderRow["receiver"] ?></p>
                            <p>收件人電話 : <?= $orderRow["receiver_mobile"] ?></p>
                            <p>寄送方式 : 宅配寄送</p>
                            <p>地址 : <?= $orderRow["address"] ?></p>
                        </div>
                    </div>
                    <div>
                        <hr class="t_separation_line">
                        <div class="t_cart3_subtotal">
                            <h5>總金額：<span id="mobileTotalAmount" class="t_color_ca054d">$ <?= number_format($orderRow["amount"]) ?></span></h5>
                            <div class="d-flex t_justify_align_center">
                                <i class="fas fa-angle-down fa-fw fa-2x"></i>
                                <h5>購物車(<?= $numItems ?>項，共<?= $totalItems ?>件)</h5>
                            </div>
                        </div>
                    </div> 
                     <!-- ---------------------商品細節mobile start--------------------- -->
                    <div class="t_unfold">
                        <div class="t_main_cart">
                            <div>
                            <?php if(count($orderProductsRows)): ?>
                                <?php
                                $j=0;
                                foreach($orderProductsRows as $op):
                                $picArr = json_decode($op["picture"]["pro_pic"]); ?>
                                    <div class="t_grid-container_cart3_productinfo_mobile t_web_none p-item" data-sizeSid="<?= $op['size_sid'] ?>">
                                        <div class="cart_img">
                                            <img src="./product_images/<?= $picArr[0] ?>.png" alt="">
                                        </div>
                                        <div class="t_text_left">
                                                <a href=""><?=$op['name'] ?></a>
                                                <br>
                                                <label class="price" data-price="<?= $op['price'] ?>"></label>
                                                <div class="d-flex justify-content-start align-items-baseline">
                                                    <div style="color: <?= $op['color'] ?>" >
                                                        <i class="fas fa-circle t_color_size_between"></i>
                                                    </div>
                                                    <p><?= $op['size']; ?></p>
                                                </div>
                                                <div>
                                                    <div class="quantity" data-qty="<?= $op['gty'] ?>"></div>
                                                </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <div class="align-self-end">
                                                <h6 class="sub-total t_color_ca054d"></h6>
                                            </div>
                                        </div>
                                    </div>
                                <?php 
                                $j++;
                                endforeach; ?>
                            <?php endif; ?>

                                <!-- --------------------------- 客製化 mobile ------------------------------ -->

                            <?php if(count($orderCustomizedRows)): ?>
                                <?php
                                $j=0;
                                foreach($orderCustomizedRows as $oc):
                                $colorArr = json_decode($oc["cus_color"]); ?>

                                    <div class="t_grid-container_cart3_productinfo_mobile t_web_none p-item" data-proSid="<?= $oc['pro_sid'] ?>">
                                        <div class="cart_img">
                                            <img src="./images/customized_sportsbras_01_pro_pic.png" alt="">
                                        </div>
                                        <div class="t_text_left">
                                            <a href=""><?=$oc['name'] ?></a>
                                            <br>
                                            <label class="price" data-price="<?= $oc['price'] ?>"></label>
                                            <div class="d-flex justify-content-start align-items-baseline">
                                                <?php for($i=0 ; $i < count($colorArr) ;$i++): ?>
                                                <div style="color: <?= $colorArr[$i] ?>" >
                                                    <i class="fas fa-circle t_color_size_between"></i>
                                                </div>
                                                <?php endfor; ?>
                                                <p><?= $oc['size']; ?></p>
                                            </div>
                                            <div>
                                                <div class="quantity" data-qty="<?= $oc['gty'] ?>"></div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <div class="align-self-end">
                                                <h6 class="sub-total t_color_ca054d"></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $j++;
                                endforeach; ?>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                        <!-- ---------------------商品細節mobile end--------------------- -->
            </div>
            </section>
            <div class="d-flex justify-content-center">
                <a href="member_order.php">
                    <div class="t_cart3_orderpage_btn">
                        <input type="submit" value="至訂單中心" class="btn btn-p">
                    </div>
                </a>
                <a href="product_list.php">
                    <div class="t_cart3_goshop_btn">
                        <input type="submit" value="繼續購物" class="btn">
                    </div>
                </a>

            </div> 
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
        $(".fa-angle-down").click(function(){
            $(".t_unfold").slideToggle("active");
            calPrices();
        })



        const dallorCommas = function(n){
        return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        };
        
        function calPrices() {
        const p_items = $('.p-item:visible');
        let total = 0;
        let totalQty=0;
        let productCount=p_items.length;
        console.log
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
            $price.text( '$ ' + $price.attr('data-price') );
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

            const $sub_total = $(el).find('.sub-total');
            $sub_total.text('NT ' + dallorCommas($price.attr('data-price') * $qty.text()));
            total += $price.attr('data-price') * $qty.text();
        });
        
        // $('#totalAmount').text( '$ ' + dallorCommas(total));
        // $('#mobileTotalAmount').text( '$ ' + dallorCommas(total));
        $("#totalQty").text(totalQty)

        }
        calPrices();

    </script>


<?php include __DIR__ . '/parts/html-foot.php'; ?>