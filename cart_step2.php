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
                    <li class="t_step3">3<p>訂單確認</p></li>
                </ul>
            </div>
            <div class="t_step_panel_mobile t_web_none">
                <ul class="d-flex justify-content-center">
                    <li class="t_step1_mobile">購物車</li>
                    <li class="t_step2_mobile">填寫資料</li>
                    <li class="t_step3_mobile">訂單確認</li>
                </ul>
            </div>
            <section>
                <div class="t_main_cart">
                    <div class="t_top-amount">
                        <div>合計：NT 9999</div>
                        <div>購物車(共2件)</div>
                        <div><i class="fas fa-angle-down fa-fw fa-lg"></i></div>
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
                            <div class="t_grid-container_cart2_productinfo">
                                <div></div>
                                <div class="cart_img">
                                    <img src="./images/paddedbra_046_pk_3.png" alt="">
                                </div>
                                <div class="t_text_left">
                                    <h6>
                                        <a href="">全集中簍空內衣</a> 
                                        <br><br>
                                        <label for="">NT1920</label>
                                    </h6>
                                </div>
                                <div>
                                    <h6>紅色</h6>
                                </div>
                                <div>
                                    <h6>S</h6>
                                </div>
                                <div>
                                    <h6>1</h6>
                                </div>
                                <div>
                                    <h6>NT 1920</h6>
                                </div>
                            </div>
                            <div class="t_grid-container_cart2_productinfo">
                                <div></div>
                                <div class="cart_img">
                                    <img src="./images/paddedbra_046_pk_3.png" alt="">
                                </div>
                                <div class="t_text_left">
                                    <h6>
                                        <a href="">全集中簍空內衣</a> 
                                        <br><br>
                                        <label for="">NT1920</label>
                                    </h6>
                                </div>
                                <div>
                                    <h6>紅色</h6>
                                </div>
                                <div>
                                    <h6>S</h6>
                                </div>
                                <div>
                                    <h6>1</h6>
                                </div>
                                <div>
                                    <h6>NT 1920</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="t_separation_line">
            </section>
            <section class="d-flex t_flex-mobile-wrap">
                <div class="t_cart2_info">
                    <h5>寄件資訊</h5>
                    <form>
                        <div class="form-group">
                            <label for="how_to_deliver">運送方式</label>
                                <select class="form-control" id="chooseDeliver">
                                    <option selected disabled>請選擇運送方式</option>
                                    <option value="0">宅配寄送</option>
                                    <option value="1">超商取貨</option>
                                </select>
                        </div>
                        <div  id="deliverTarget">
                            <div class="form-row align-items-center">
                                <div class="form-group col-md-9">
                                    <label for="receiver_name" id="nameTarget">收件人姓名</label>
                                    <input type="text" class="form-control" id="receiver_name">
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                                        <label class="form-check-label" for="autoSizingCheck">
                                        同會員資料
                                        </label>
                                    </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="receiver_mobile" id="mobileTarget">收件人電話</label>
                                <input type="text" class="form-control" id="receiver_mobile">
                            </div>
                            <div class="form-group">
                                <label for="receiver_address" id="addressTarget">收件人地址</label>
                                <input type="text" class="form-control" id="receiver_address">
                                <select class="form-control" id="chooseStore">
                                    <option selected>請選擇門市</option>
                                    <option>台北市</option>
                                    <option>新北市</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="invoice-info">發票資訊</label>
                                <select class="form-control" id="chooseInvoice">
                                    <option selected disabled>請選擇發票資訊</option>
                                    <option value="0">個人 - 二聯電子發票(手機載具)</option>
                                    <option value="1">公司 - 三聯式發票</option>
                                    <option value="2">捐贈發票</option>
                                    <option value="3">個人 - 二聯電子發票</option>
                                </select>
                        </div>
                        <div class="form-group" id="saveinvoiceTarget">
                            <label for="e-invoice" id="invoiceTarget">手機載具</label>
                            <input type="text" class="form-control">
                        </div>
                        <div id="memberInvoice">
                            <h6>依財政部規定，發票已託管，無需開立紙本發票。</h6>
                        </div>
                    </form>
                    <hr class="t_separation_line_gr_long t_web_none">
                </div>
                
                <div class="t_mobile_none" style="float:left;margin-top: 30px;width: 1px; background: #8F8F8F;"></div> 
                <div></div>
                <div class="t_cart2_info">
                    <h5>付款資訊</h5>
                    <form>
                        <div class="form-group">
                            <label for="coupon">我的優惠券</label>
                                <select class="form-control">
                                    <option selected>請選擇優惠券</option>
                                    <option value="1">新會員折扣</option>
                                    <option value="2">母親節優惠</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="how_to_pay">付款方式</label>
                                <select class="form-control" id="choosePayment">
                                    <option selected disabled>請選擇付款方式</option>
                                    <option value="0">信用卡</option>
                                    <option value="1">貨到付款(超商)</option>
                                    <option value="2">虛擬帳戶轉帳</option>
                                </select>
                        </div>
                        <div id="paymentTarget">
                            <div class="form-group">
                                <label for="credit_number" id="accountTarget">信用卡卡號</label>
                                <input type="text" class="form-control" id="credit_number">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="credit_date" id="dateTarget">有效期限</label>
                                    <input type="text" class="form-control" id="credit_date">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="credit_three" id="threeTarget">末三碼</label>
                                    <input type="text" class="form-control" id="credit_three">
                                </div>
                            </div>
                        </div>
                        <div id="e-account">
                            <h6>付款帳號：875498743215712254</h6>
                        </div>
                    </form>
                </div>
            </section>
            <hr class="t_separation_line_gr_long">
            
            <section class="d-flex justify-content-end">
                <div class="t_cart2_subtotal">
                    <div class="t_grid-container_subtotal">
                        <div>商品總金額</div>
                        <div class="t_text_right">NT 1920</div>
                    </div>
                    <div class="t_grid-container_subtotal">
                        <div>運費</div>
                        <div class="t_text_right">NT  60</div>
                    </div>
                    <div class="t_grid-container_subtotal">
                        <div>優惠券</div>
                        <div class="t_text_right">-NT 60</div>
                    </div>
                    <div class="t_grid-container_subtotal">
                        <div>總金額</div>
                        <div class="t_text_right">NT 1920</div>
                    </div>
                </div>
            </section>
            
            <div class="t_terms_check">
                <div class="form-check t_text_right">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        我同意服務條款與退換貨政策
                    </label>
                </div>
                <div class="form-check t_text_right">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                    <label class="form-check-label" for="defaultCheck2">
                        我想收到最新資訊及優惠方案
                    </label>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="t_cart2_backcart_btn">
                    <input type="submit" value="←返回購物車" class="btn btn-p">
                </div>
                <div class="t_cart2_sendorder_btn">
                    <input type="submit" value="送出訂單" class="btn">
                </div>
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
        })

        $("#deliverTarget").hide();
        $("#chooseDeliver").change(function(){
            $("#deliverTarget").show();
            $("#chooseStore").hide();
            let type=$(this).val();
            switch(type){
                case "0":
                    $content="收件人地址";
                    $("#receiver_address").show();
                    break;
                case "1":
                    $content="";
                    $("#receiver_address").hide();
                    $("#chooseStore").show();
                    break;
                default: 
                    $content="收件人地址";
            }
            $("#addressTarget").text($content);
        })

        $("#saveinvoiceTarget").hide();
        $("#memberInvoice").hide();
        $("#chooseInvoice").change(function(){
            $("#saveinvoiceTarget").show();
            let type=$(this).val();
            $("#mobile_cap").show();
            switch(type){
                case "0":
                    $content="手機載具";
                    $("#memberInvoice").hide();
                    break;
                case "1":
                    $content="統一編號";
                    $("#memberInvoice").hide();
                    break;
                case "2":
                    $content= "";
                    $("#saveinvoiceTarget").hide();
                    $("#memberInvoice").hide();
                    break;
                default: 
                    $content="";
                    $("#saveinvoiceTarget").hide();
                    $("#memberInvoice").show();
            }
            $("#invoiceTarget").text($content);
        })

        $("#paymentTarget").hide();
        $("#e-account").hide();
        $("#choosePayment").change(function(){
            $("#paymentTarget").show();
            let type=$(this).val();
            switch(type){
                case "0":
                    $content="";
                    $("#e-account").hide();
                    break;
                case "1":
                    $content="";
                    $("#paymentTarget").hide();
                    $("#e-account").hide();
                    break;
                case "2":
                $content="";
                $("#paymentTarget").hide();
                $("#e-account").show();
                    break;
                default: 
                    $content="收件人地址";
            }
            $("#addressTarget").text($content);
        })
    </script>


<?php include __DIR__ . '/parts/html-foot.php'; ?>