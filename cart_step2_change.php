<?php
require __DIR__. '/__connect_db.php';

$pKeys = array_keys($_SESSION['cart']);

$data_ar = [];
$i=0;

$totalPrice = 0;
$totalPriceOfProducts = 0;
$totalPriceOfCustomized = 0;
$numItems = count($_SESSION['cart']) + count($_SESSION['customized']);
$totalItems = 0;
$totalProductItems = 0;
$totalCustomizedItems = 0;

//抓普通商品資料---------------------------------------------------------------------------------------------------------
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

        //算普通商品價錢
        for($k = 0; $k < count($proRows); $k++){
            $totalPriceOfProducts += $proRows[$k]['price'] * $_SESSION['cart'][$pro['sid']];
        }
        //算普通商品數量
        $totalProductItems += $_SESSION['cart'][$pro['sid']];
       


        $i++;
    };


}

//print_r($cartProRows);


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

    $a_cusSql = sprintf("SELECT * FROM `customize` WHERE `sid` IN (%s)", implode(',', $a_cusSid));
    $a_cusRows = $pdo->query($a_cusSql)->fetchAll();

    $k = 0;
    foreach ($a_cusRows as $cus) {
        $a_cusData[$k]['name'] = $cus["name"];
        $a_cusData[$k]['price'] = $cus["price"];
        $a_cusData[$k]['pro_pic'] = $cus["pro_pic"];
        $k++;
    };

    //算普通商品價錢
    //算普通商品數量
    for($k = 0; $k < count($a_cusSid); $k++){
        $totalPriceOfCustomized += $a_cusData[$k]["price"] * $a_cusData[$k]["cus_qty"];
        $totalCustomizedItems += $a_cusData[$k]["cus_qty"];
    }



};


$totalPrice = $totalPriceOfProducts + $totalPriceOfCustomized;
$totalItems = $totalProductItems + $totalCustomizedItems;

//echo json_encode($totalPrice, JSON_UNESCAPED_UNICODE);


//同會員資料功能----------------------------------------------------------------------------------------------------------
$asMemDataSql = "SELECT * FROM members where email='" . $_SESSION['loginUser'] . "'";
$asMemDataRow = $pdo -> query($asMemDataSql) -> fetchAll();

//echo json_encode($asMemDataRow, JSON_UNESCAPED_UNICODE);


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
                    <li class="t_step2 t_icon_active">2<p>填寫資料</p></li>
                    <li class="t_step3">3<p>訂單確認</p></li>
                </ul>
            </div>
            <div class="t_step_panel_mobile t_web_none">
                <ul class="d-flex justify-content-center">
                    <li class="">購物車</li>
                    <li class="active">填寫資料</li>
                    <li class="">訂單確認</li>
                </ul>
            </div>
            <section>
                <div class="t_main_cart">
                    <div class="t_top-amount">
                        <div>合計：<span id="totalAmount">NT <?= number_format($totalPrice) ?></span></div>
                        <div>購物車(<span class="a_countNum" id="productItem"><?= $numItems ?></span>項，共<span id="totalQty"><?= $totalItems ?></span> 件)</div>
                        <div><i class="fas fa-angle-down fa-fw fa-lg"></i></div>
                    </div>
                        <div class="t_unfold">
                            <div class="t_grid-container_cart2">
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
                                <?php if(!empty($_SESSION["cart"])): ?>
                                <?php
                                $j=0;
                                    foreach($cartProRows as $r): 
                                        // $item = $cartProRows[$sid]; 
                                        $colorArr = json_decode($r['color'][0]['pro_pic']);
                                        // print_r($colorArr);
                                        ?>
                                        <div class="t_grid-container_cart2_productinfo p-item" data-sid="<?= $r['sid'] ?>">
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
                                            <div>
                                                <div id="countnum<?= $j?>" data-maxnum="<?= $r['in_stock'] ?>" class="quantity" onchange="changeQty(event)"><?= $r['quantity'] ?></div>
                                            </div>
                                            <div>
                                                <h6 class="sub-total"></h6>
                                            </div>
                                            </div>
                                <?php 
                            
                                $j++;
                                endforeach; ?>
                                <?php endif; ?>
                                        <!-- </div>  -->
                                <!-- ---------------------------- 客製化商品 (web)------------------------ -->
                                <?php if(!empty($_SESSION["customized"])): ?>
                                <?php foreach($a_cusData as $cus): ?>
                                <div class="t_grid-container_cart1_productinfo p-item" data-sid="<?= $cus['cus_sid'] ?>">
                                    <div></div>
                                    <div class="cart_img">
                                        <img src="./images/<?= $cus['pro_pic'] ?>_auto.png" alt="">
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
                                    <div>
                                        <li><div id="countnum<?= $j?>" data-maxnum="50" class="quantity" ><?= $cus['cus_qty'] ?></div></li>
                                    </div>
                                    <div>
                                        <h6 class="sub-total"></h6>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </div>
                        </div>
                         <!-- ---------------------商品細節web end--------------------- -->


                        <!-- ---------------------商品細節mobile start--------------------- -->
                        <div class="t_unfold">
                            <div>
                                <?php if(!empty($_SESSION["cart"])): ?>
                                <?php
                                $j=0;
                                    foreach($cartProRows as $r): 
                                        // $item = $cartProRows[$sid]; 
                                        $colorArr = json_decode($r['color'][0]['pro_pic']);
                                        // print_r($colorArr);
                                        ?>
                                    <div class="t_grid-container_cart2_productinfo_mobile t_web_none p-item" data-sid="<?= $r['sid'] ?>">
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
                                                <div>
                                                    <div id="countnum<?= $j?>" class="quantity" data-maxnum="<?= $r['in_stock'] ?>" ><?= $r['quantity'] ?></div>
                                                </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
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
                                                <img src="./images/<?= $cus['pro_pic'] ?>_auto.png" alt="">
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
                                                <div>
                                                    <li><div id="countnum<?= $j?>" class="quantity" data-maxnum="50" ><?= $cus['cus_qty'] ?></div></li>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end">
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
                        </div>
                        <!-- ---------------------商品細節mobile end--------------------- -->

                        
                        <div style="margin: 50px 0;"><hr class="t_separation_line"></div>
            </section>
            <form name="form1" method="post" onsubmit="return checkForm()">
            <section class="d-flex t_flex-mobile-wrap">
                <div class="t_cart2_info">
                    <h5>寄件資訊</h5>
                    <!-- <form name="form" method="post" onsubmit="return false;"> -->
                        <div class="form-group">
                            <label for="how_to_deliver" required>運送方式</label>
                                <select class="form-control a_shipping" id="chooseDeliver" name="shipping">
                                    <option value="宅配寄送">宅配寄送</option>
                                    <option value="超商取貨">超商取貨</option>
                                </select>
                        </div>
                        <div  id="deliverTarget">
                            <div class="form-row align-items-center">
                                <div class="form-group col-md-9">
                                    <label for="receiver_name" id="nameTarget">收件人姓名</label>
                                    <input type="text" class="form-control" id="receiver_name" name="receiver_name" required>
                                    <small id="receivernameHelp" class="form-text"></small>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input a_asNumData" type="checkbox" id="autoSizingCheck">
                                        <label class="form-check-label " for="autoSizingCheck">
                                        同會員資料
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="receiver_mobile" id="mobileTarget">收件人電話</label>
                                <input type="text" class="form-control" id="receiver_mobile" name="receiver_mobile" pattern="09\d{2}-?\d{3}-?\d{3}" required>
                                <small id="receivermobileHelp" class="form-text"></small>
                            </div>
                            <div class="form-group">
                                <label for="receiver_address" id="addressTarget">收件人地址</label>
                                <textarea class="form-control" name="receiver_address" id="receiver_address" cols="30" rows="1" required></textarea>
                                <small id="receiveraddressHelp" class="form-text"></small>
                                <select class="form-control" id="chooseStore">
                                    <option selected>請選擇門市</option>
                                    <option>台北市</option>
                                    <option>新北市</option>
                                </select>
                            </div>
                        </div>
                        <hr class="t_separation_line_gr_long">
                        <div class="form-group">
                            <label for="invoice-info">發票資訊</label>
                                <select class="form-control" id="chooseInvoice" name="receipt">
                                    <option value="個人 - 二聯電子發票">個人 - 二聯電子發票</option>
                                    <option value="個人 - 二聯電子發票(手機載具)">個人 - 二聯電子發票(手機載具)</option>
                                    <option value="公司 - 三聯式發票">公司 - 三聯式發票</option>
                                    <option value="捐贈發票">捐贈發票</option>
                                </select>
                        </div>
                        <div class="form-group" id="saveinvoiceTarget">
                            <label for="e-invoice" id="invoiceTarget">手機載具</label>
                            <input type="text" class="form-control" id="invoice">
                            <small id="invoiceHelp" class="form-text"></small>
                        </div>
                        <div id="memberInvoice">
                            <h6>依財政部規定，發票已託管，無需開立紙本發票。</h6>
                        </div>
                    <!-- </form> -->
                
                </div>
                
                <div class="t_mobile_none" style="float:left;margin-top: 30px;width: 1px; background: #8F8F8F;"></div> 
                <div></div>
                <div class="t_cart2_info">
                <hr class="t_separation_line_gr_long t_web_none t_cart3_orderfinish_mobile">
                    <h5>付款資訊</h5>
                    <!-- <form onsubmit="return false;"> -->
                        <div class="form-group">
                            <label for="coupon">我的優惠券</label>
                                <select class="form-control a_coupon" name="coupon">
                                    <option selected>請選擇優惠券</option>
                                    <option value="新會員折扣">新會員折扣</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="how_to_pay">付款方式</label>
                                <select class="form-control" id="choosePayment" name="payment">
                                    <option value="信用卡" >信用卡</option>
                                    <option value="貨到付款" >貨到付款</option>
                                    <option value="虛擬帳戶轉帳" >虛擬帳戶轉帳</option>
                                </select>
                        </div>
                        <div id="paymentTarget">
                            <div class="form-row form-group">
                                <label for="credit_number" id="accountTarget">信用卡卡號</label>
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="col">
                                                <input type="text" class="form-control card-input t_text_center" id="credit_number1" maxlength="4">
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control card-input t_text_center" id="credit_number2" maxlength="4">
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control card-input t_text_center" id="credit_number3" maxlength="4">
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control card-input t_text_center" id="credit_number4" maxlength="4">
                                            </div>
                                        </div>
                                    </div>
                                <!-- <input type="text" class="form-control" id="credit_number"> -->
                                <small id="credit_numberHelp" class="form-text"></small>
                            </div>
                
                            <div class="form-row form-group">
                                <div class="form-group col-md-8">
                                    <label for="credit_date" id="dateTarget">有效期限</label>
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="col">
                                                    <input type="text" class="form-control card-input t_text_center" id="credit_date1" maxlength="2" placeholder="MM">
                                                </div>
                                            
                                                <div class="col">
                                                    <input type="text" class="form-control card-input t_text_center" id="credit_date2" maxlength="2" placeholder="YY">
                                                </div>
                                            </div>
                                        </div>
                                    <!-- <input type="text" class="form-control" id="credit_date"> -->
                                    <small id="credit_dateHelp" class="form-text"></small>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="col-md-12 ">
                                        <label for="credit_three" id="threeTarget">末三碼</label>
                                        <div class="d-flex justify-content-between">
                                            <input type="text" class="form-control t_text_center" id="credit_three" maxlength="3">
                                            <i class="fas fa-credit-card fa-fw fa-2x"></i>
                                        </div>
                                        <small id="credit_threeHelp" class="form-text"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="e-account">
                            <h6>付款帳號：875498743215712254</h6>
                            <h6>**將於收到款項後發貨</h6>
                        </div>
                    <!-- </form> -->
                    <hr class="t_separation_line_gr_long">
                <section class="d-flex justify-content-end">
                    <div class="t_cart2_subtotal">
                        <div class="t_grid-container_subtotal">
                            <div>商品總金額</div>
                            <div class="t_text_right"><span id="totalAmount">NT <span class="a_Amount"><?= number_format($totalPrice) ?></span></span></div>
                        </div>
                        <div class="t_grid-container_subtotal">
                            <div>運費</div>
                            <div class="t_text_right">NT  <span class="a_shippingPrice">100</span></div>
                            <input type="hidden" name="shipping_price" id="shipping_price" value="0">
                        </div>
                        <div class="t_grid-container_subtotal">
                            <div>優惠券</div>
                            <div class="t_text_right">-NT <span class="a_couponDiscount">0</span></div>
                            <input type="hidden" name="coupon_price" id="coupon_price" value="0">
                        </div>
                        <div class="t_grid-container_subtotal">
                            <div>總金額</div>
                            <div class="t_text_right">NT <span class="a_totalAmount">0</span></div>
                            <input type="hidden" name="amount" id="total_amount" value="0">
                        </div>
                    </div>
                </section>
                <div class="t_terms_check">
                    <div class="form-check t_text_right">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            我同意<a href="member_rules.php">服務條款與退換貨政策</a>
                        </label>
                    </div>
                    <div class="form-check t_text_right">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" checked>
                        <label class="form-check-label" for="defaultCheck2">
                            我想收到最新資訊及優惠方案
                        </label>
                    </div>
                </div>
                </div>
            </section>
            </form>


            <div class="t_main_cart">
                <hr class="t_separation_line_gr_long t_mobile_none">
            </div>
            
            
            
            <div class="d-flex justify-content-center">
                <a href="cart_step1_change.php">
                    <div class="t_cart2_backcart_btn">
                        <input type="submit" value="←返回購物車" class="btn btn-p">
                    </div>
                </a>
                <?php if(!empty($_SESSION["loginUser"])): ?>

                <a>
                    <div class="t_cart2_sendorder_btn">
                        <input type="button" value="送出訂單" class="btn" onclick="checkForm()">
                    </div>
                </a>

                <?php else: ?>
                    <a href="member_login.php">
                        <div class="t_cart2_sendorder_btn">
                            <input type="button" value="請先登入會員" class="btn">
                        </div>
                    </a>
                <?php endif; ?>
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
            $('#totalAmount').text( 'NT ' + dallorCommas(total));
            $("#totalQty").text(totalQty)
        }

        $("#chooseStore").hide();
        $("#chooseDeliver").change(function(){
            $("#deliverTarget").show();
            $("#chooseStore").hide();
            let type=$(this).val();
            switch(type){
                case "宅配寄送":
                    $content="收件人地址";
                    $("#receiver_address").show();
                    $("#receiveraddressHelp").show();
                    break;
                case "超商取貨":
                    $content="收件門市";
                    $("#receiver_address").hide();
                    $("#receiveraddressHelp").hide();
                    $("#chooseStore").show();
                    break;
                default: 
                    $content="";
            }
            $("#addressTarget").text($content);
        })

        $("#saveinvoiceTarget").hide();
        $("#chooseInvoice").change(function(){
            $("#saveinvoiceTarget").show();
            let type=$(this).val();
            $("#mobile_cap").show();
            switch(type){
                case "個人 - 二聯電子發票":
                    $content="";
                    $("#saveinvoiceTarget").hide();
                    $("#memberInvoice").show();
                    break;
                case "個人 - 二聯電子發票(手機載具)":
                    $content="手機載具";
                    $("#memberInvoice").hide();
                    break;
                case "公司 - 三聯式發票":
                    $content="統一編號";
                    $("#memberInvoice").hide();
                    break;
                default: 
                    $content= "";
                    $("#saveinvoiceTarget").hide();
                    $("#memberInvoice").hide();
                    
            }
            $("#invoiceTarget").text($content);
        })
        $("#e-account").hide();
        $("#choosePayment").change(function(){
            let type=$(this).val();
            // console.log(type)
            switch(type){
                case "信用卡":
                    $content="";
                    $("#e-account").hide();
                    $("#paymentTarget").show();
                    break;
                case "貨到付款":
                    $content="";
                    $("#paymentTarget").hide();
                    $("#e-account").hide();
                    break;
                case "虛擬帳戶轉帳":
                    $content="";
                    $("#paymentTarget").hide();
                    $("#e-account").show();
                    break;
                default: 
                    $content="";
            }
            // $("#paymentTarget").text($content);
        })

        // let $coupon_price = $("#coupon_price").val();

        // if($totalPrice < 1000){
        //     $coupon_price = 80;
        // } else {
        //     $coupon_price = 0;
        // };
        
        $(".card-input").keyup(function(){
            let maxLength=$(this).attr("maxlength")
            let currentLength=$(this).val().length
            // console.log(maxLength+", "+currentLength)
            if(maxLength==currentLength){
                $(this).parent().next().find(":input").focus()
                // console.log("hi")
            }
        })


        const receiver_mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;

        const $receiver_name = $('#receiver_name'),
            $receiver_mobile = $('#receiver_mobile'),
            $receiver_address = $('#receiver_address'),
            $chooseInvoice = $('#chooseInvoice'),
            $invoice = $('#invoice'),
            $choosePayment = $('#choosePayment'),
            $credit_number1 = $('#credit_number1'),
            $credit_number2 = $('#credit_number2'),
            $credit_number3 = $('#credit_number3'),
            $credit_number4 = $('#credit_number4'),
            $credit_date1 = $('#credit_date1'),
            $credit_date2 = $('#credit_date2'),
            $credit_three = $('#credit_three'),
            $receivernameHelp = $('#receivernameHelp'),
            $receivermobileHelp = $('#receivermobileHelp'),
            $receiveraddressHelp = $('#receiveraddressHelp'),
            $invoiceHelp = $('#invoiceHelp'),
            $credit_numberHelp = $('#credit_numberHelp'),
            $credit_dateHelp = $('#credit_dateHelp'),
            $credit_threeHelp = $('#credit_threeHelp'),
            $info = $('#info-bar')

        function checkForm(){
            let isPass = true; //有沒有通過檢查
            //恢復提示設定
            // $('#info-bar').hide();
            $receiver_name.css('border-color', '#ced4da');
            $receivernameHelp.text('');

            $receiver_mobile.css('border-color', '#ced4da');
            $receivermobileHelp.text('');

            $receiver_address.css('border-color', '#ced4da');
            $receiveraddressHelp.text('');

            $invoice.css('border-color', '#ced4da');
            $invoiceHelp.text('');

            $credit_number1.css('border-color', '#ced4da');
            $credit_number2.css('border-color', '#ced4da');
            $credit_number3.css('border-color', '#ced4da');
            $credit_number4.css('border-color', '#ced4da');
            $credit_numberHelp.text('');

            $credit_date1.css('border-color', '#ced4da');
            $credit_date2.css('border-color', '#ced4da');
            $credit_dateHelp.text('');

            $credit_three.css('border-color', '#ced4da');
            $credit_threeHelp.text('');

            
            if($receiver_name.val().length < 2){
                $receiver_name.css('border-color', 'red');
                $receivernameHelp.text('請輸入姓名');
                isPass = false;
            }

            if(! receiver_mobile_re.test($receiver_mobile.val())){
                $receiver_mobile.css('border-color', 'red');
                $receivermobileHelp.text('請輸入手機號碼');
                isPass = false;
            }

            if($receiver_address.val().length < 5){
                $receiver_address.css('border-color', 'red');
                $receiveraddressHelp.text('請輸入地址');
                isPass = false;
            }

            if($chooseInvoice.val() == "個人 - 二聯電子發票(手機載具)" || $chooseInvoice.val() == "公司 - 三聯式發票"){

                if($invoice.val().length < 8){
                $invoice.css('border-color', 'red');
                $invoiceHelp.text('請輸入載具');
                isPass = false;
                }
            }
            
            if($choosePayment.val() == "信用卡"){

                if($credit_number1.val().length < 4 || $credit_number2.val().length < 4 ||$credit_number3.val().length < 4 || $credit_number4.val().length < 4){
                $credit_number1.css('border-color', 'red');
                $credit_number2.css('border-color', 'red');
                $credit_number3.css('border-color', 'red');
                $credit_number4.css('border-color', 'red');
                $credit_numberHelp.text('請輸入卡號');
                isPass = false;
                }

                if($credit_date1.val().length < 2 || $credit_date2.val().length < 2){
                    $credit_date1.css('border-color', 'red');
                    $credit_date2.css('border-color', 'red');
                    $credit_dateHelp.text('請輸入有效期');
                    isPass = false;
                }

                if($credit_three.val().length < 3 ){
                    $credit_three.css('border-color', 'red');
                    $credit_threeHelp.text('請輸入末三碼');
                    isPass = false;
                }
            
            }
            

            // amount = $()    
            // console.log(isPass)
            if(isPass){
                // console.log($(document.form1).serialize());
                // return false;
                $.post('cart_step2_api.php', $(document.form1).serialize(), function(data){

                    if(data.addCartSuccess || data.addCusSuccess){
                        $('.a_alert.a_sandOrder').fadeIn();
                        setTimeout(function(){
                            $('.a_alert.a_sandOrder').fadeOut();
                        }, 800);
                        setTimeout(function(){
                            //首頁檔名
                            location.href ='cart_step3.php';
                        }, 1000);

                    } else {
                        $('.a_alert.a_sandOrderErr').fadeIn();
                        setTimeout(function(){
                            $('.a_alert.a_sandOrderErr').fadeOut();
                        }, 800);
                    }
                }, 'JSON')
                .done(function(){
                    console.log("success")
                    console.log(data);
                })
                .fail(function(err){
                    console.log(err)
                })
            }
            return false;
        }

        

    </script>

    <script>
        //預設值
        var a_Amount = <?= $totalPrice ?>;
        var a_shippingPrice = $(".a_shippingPrice").text();
        var a_couponDiscount = $(".a_couponDiscount").text();

        //選擇運送方式設定運費
        $(".a_shipping").change(function(){
            var wayOfShipping = $(this).val();
            // console.log(wayOfShipping)
            if(wayOfShipping == "宅配寄送"){
                $(".a_shippingPrice").text("100")
                a_shippingPrice = $(".a_shippingPrice").text();
            }else if(wayOfShipping == "超商取貨"){
                $(".a_shippingPrice").text("60")
                a_shippingPrice = $(".a_shippingPrice").text();
            }
            // console.log(a_shippingPrice)
            countAmount();

        })
        //選擇優惠卷設定金額
        $(".a_coupon").change(function(){
            var whichCoupon = $(this).val();
            // console.log(whichCoupon)
            if(whichCoupon == "新會員折扣"){
                $(".a_couponDiscount").text("100")
                a_couponDiscount = $(".a_couponDiscount").text();
            }else if(whichCoupon == "母親節優惠"){
                $(".a_couponDiscount").text("100")
                a_couponDiscount = $(".a_couponDiscount").text();
            }
            // console.log(a_couponDiscount)
            countAmount();
        })

        function countAmount(){
            //計算總金額
            var a_totalAmount = parseInt(a_Amount) + parseInt(a_shippingPrice) - parseInt(a_couponDiscount);
            $(".a_totalAmount").text(dallorCommas(a_totalAmount));
            $("#total_amount").val(a_totalAmount);
            // console.log(a_totalAmount)
        }
        countAmount();

    </script>
    <script>
        //同會員資料----------------------------------------------
        memDataJson = <?= json_encode($asMemDataRow[0], JSON_UNESCAPED_UNICODE) ?>;
        memReceiver = memDataJson.receiver;
        memReceiverMobile = memDataJson.receiver_mobile;
        memAddress = memDataJson.address;
        // console.log(memReceiver)
        // console.log(memDataJson)

        //如果沒有設定
        if(!memReceiver){
            memReceiver = "無預設收件人";
        };
        if(!memReceiverMobile){
            memReceiverMobile = "無預設收件人電話";
        };
        if(!memAddress){
            memAddress = "無預設收件地址";
        };

        $(".a_asNumData").click(function(){

            if($(".a_asNumData").prop("checked")){

                    $("#receiver_name").val(memReceiver);
                    $("#receiver_mobile").val(memReceiverMobile);
                    $("#receiver_address").val(memAddress);

            }
        })

    </script>

<?php include __DIR__ . '/parts/html-foot.php'; ?>