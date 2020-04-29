<?php
require __DIR__. '/__connect_db.php';

$pKeys = array_keys($_SESSION['cart']);

$a_cartItem = []; // 預設值
$proSid = [];

if(!empty($pKeys)) {
    $a_totalCartItemSql = sprintf("SELECT * FROM `color`
    WHERE `sid`
    IN(%s)", implode(',', $pKeys));
    $a_totalCartItemRows = $pdo ->query($a_totalCartItemSql) -> fetchAll();

    foreach($a_totalCartItemRows as $cart){
        $a_cartItem[ $cart['sid']] = $cart;
        $proSid[] = $cart['pro_sid'];
    }

    $a_totalCartItemDataSql = sprintf("SELECT * FROM `products` WHERE `sid` IN (%s)", implode(',', $proSid));
    $a_totalCartItemDataStmt = $pdo -> query($a_totalCartItemDataSql);
    $a_totalCartItemDataRows = $a_totalCartItemDataStmt -> fetchAll();

    $i=0;
    foreach($a_totalCartItemDataRows as $cartData){
        $a_cartItem[$i]['productData'] = $cartData;
        $i++;
    }

//    $sql = sprintf("SELECT * FROM products WHERE sid IN(%s)", implode(',', $pKeys));
//    $rows = $pdo->query($sql)->fetchAll();

//    foreach($rows as $r){
//        $r['quantity'] = $_SESSION['cart'][$r['sid']];
//        $data_ar[$r['sid']] = $r;
//    }
}
print_r($a_cartItem);
print_r($colorSid);

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
                        <div class="t_grid-container_cart1_productinfo p-item" data-sid="">
                            <div></div>
                            <div class="cart_img">
                                <img src="./images/paddedbra_000_bk_1.png" alt="">
                            </div>
                            <div class="t_text_left">
                                <h6>
                                    <a href=""></a>
                                    <br><br>
                                    <label class="price" data-price=""></label>
                                </h6>
                            </div>
                            <div>
                                <h6>紅色</h6>
                            </div>
                            <div>
                                <h6>S</h6>
                            </div>
                            <div>
                                <select class="form-control quantity" data-qty="" onchange="">
                                    <?php for($i=1; $i<=10; $i++): ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div>
                                <h6>NT 1920</h6>
                            </div>
                            <div> 
                            <a href="#" onclick=""><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- ---------------------商品細節end--------------------- -->
                    <!-- <div class="t_grid-container_cart1_productinfo_mobile web_none">
                        <div class="cart_img">
                            <img src="./images/paddedbra_046_pk_3.png" alt="">
                        </div>
                        <div class="t_text_left">
                            <p>
                                <a href="">全集中簍空內衣</a>
                                <br>
                                <label for="">NT1920</label>
                                <br>
                                紅色 S
                            </p>
                            <select class="form-control  form-control-sm">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="">
                                <i class="fas fa-times fa-2x"></i>
                            </div>
                            <div class="align-self-end">
                                <p>NT 1920</p>
                            </div>
                        </div>
                    </div>
                    <div class="t_grid-container_cart1_productinfo_mobile web_none">
                        <div class="cart_img">
                            <img src="./images/paddedbra_046_pk_3.png" alt="">
                        </div>
                        <div class="t_text_left">
                            <p>
                                <a href="">全集中簍空內衣</a>
                                <br>
                                <label for="">NT1920</label>
                                <br>
                                紅色 S
                            </p>
                            <select class="form-control  form-control-sm">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="">
                                <i class="fas fa-times fa-2x"></i>
                            </div>
                            <div class="align-self-end">
                                <p>NT 1920</p>
                            </div>
                        </div>
                    </div> -->
                    
                </div>
                <hr class="t_separation_line">
            </section>
            <section class="d-flex justify-content-end">
                <div class="t_cart1_subtotal">
                    <h5>訂單金額</h5>
                    <div class="t_grid-container_subtotal">
                        <div>商品總金額</div>
                        <div class="text_right">NT 1920</div>
                    </div>
                    <div class="t_cart1_checkout_btn">
                        <input type="submit" value="立即結帳→" class="btn">
                    </div>
                </div>
            </section>

        </div>
    </div>
<?php include __DIR__ . '/parts/footer.php'; ?>

    
    <!-- jQuery -->
<!--    <script-->
<!--      src="https://code.jquery.com/jquery-3.5.0.min.js"-->
<!--      integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="-->
<!--      crossorigin="anonymous"></script>-->

<!-- 公版: script -->
<?php include __DIR__ . '/parts/h_f_script.php'; ?>

    <script>
      const dallorCommas = function(n){
        return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    };

    function removeProductItem(event){
        event.preventDefault(); // 避免 <a> 的連結
        const tr = $(event.target).closest('tr.p-item')
        const sid = tr.attr('data-sid');

        $.get('add-to-cart-api.php', {sid}, function(data){
            tr.remove();
            countCartObj(data);
            calPrices();
        }, 'json');
    }

    function changeQty(event){
        let qty = $(event.target).val();
        let tr = $(event.target).closest('tr');
        let sid = tr.attr('data-sid');

        $.get('add-to-cart-api.php', {sid, qty}, function(data){
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
            console.log( $(el).attr('data-sid') );
            // let price = parseInt( $(el).find('.price').attr('data-price') );
            // let price = $(el).find('.price').attr('data-price') * 1;

            const $price = $(el).find('.price'); // 價格的 <td>
            $price.text( '$ ' + $price.attr('data-price') );

            const $qty =  $(el).find('.quantity'); // <select> combo box
            // 如果有的話才設定
            if($qty.attr('data-qty')){
                $qty.val( $qty.attr('data-qty') );
            }
            $qty.removeAttr('data-qty'); // 設定完就移除

            const $sub_total = $(el).find('.sub-total');

            $sub_total.text('$ ' + dallorCommas($price.attr('data-price') * $qty.val()));
            total += $price.attr('data-price') * $qty.val();
        });

        $('#totalAmount').text( '$ ' + dallorCommas(total));

    }
    calPrices();
    
    
    </script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>