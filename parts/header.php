<!-- 提示 (css 在 h_f_script.php 裡) -->

<div class="a_alert a_addToLike">
    <i class="fab fa-gratipay fa-lg"></i>
    <h6><span>已</span>加入收藏</h6>
</div>

<div class="a_alert a_removeFromLike">
    <i class="fas fa-hand-holding-heart fa-lg"></i>
    <h6><span>已</span>從收藏移除</h6>
</div>

<div class="a_alert a_nothingInCart">
    <i class="fas fa-exclamation-circle fa-lg"></i>
    <h6><span>購</span>物車裡沒有東西</h6>
</div>

<div class="a_alert a_addToCart">
    <i class="fas fa-shopping-basket fa-lg"></i>
    <h6><span>已</span>加入購物車</h6>
</div>

<div class="a_alert a_editData">
    <i class="fas fa-pencil-alt fa-lg"></i>
    <h6><span>資</span>料更新成功</h6>
</div>

<div class="a_alert a_editDataErr">
    <i class="fas fa-pencil-alt fa-lg"></i>
    <h6><span>記</span>得更改資訊欄喔</h6>
</div>

<div class="a_alert a_uploadPic">
    <i class="fas fa-image fa-lg"></i>
    <h6><span>照</span>片更新成功</h6>
</div>

<div class="a_alert a_login">
    <i class="fas fa-smile fa-lg"></i>
    <h6><span>登</span>入成功</h6>
</div>

<div class="a_alert a_loginErr">
    <i class="fas fa-exclamation-triangle fa-lg"></i>
    <h6><span>帳</span>號或密碼錯誤</h6>
</div>

<div class="a_alert a_registrationErr">
    <i class="fas fa-exclamation fa-lg""></i>
    <h6><span>請</span>檢查輸入資料有無錯誤</h6>
</div>

<div class="a_alert a_registration">
    <i class="fas fa-ticket-alt fa-lg"></i>
    <h6><span>註</span>冊成功<br>恭喜您得到一張新會員優惠卷</h6>
</div>

<div class="a_alert a_removeFromCart">
    <i class="fas fa-trash-alt fa-lg"></i>
    <h6><span>已</span>移除商品</h6>
</div>

<!-- 提示 (css 在 h_f_script.php 裡) -->


<div class="header">
    <div class="a_wrapper">
        <nav class="a_nav">
            <div class="header_nav_left">
                <div class="a_logo">
                    <a href="_index.php">
                        <div class="a_logo_top">
                            <img src="./icon/logo_top.png" alt="">
                        </div>
                        <div class="a_logo_bottom">
                            <img src="./icon/logo_bottom.png" alt="">
                        </div>
                    </a>
                </div>
                <li><a href="cin_about.php">關於我們</a></li>
                <li><a href="product_list.php">商品</a></li>
                <li><a href="customized.php">商品客製</a></li>
                <li><a href="article_cover.php">健康小教室</a></li>
            </div>
            <div class="header_nav_right">
                <li>
                    <div class="a_input_search">
                        <input type="text" class="a_form_search a_transition" placeholder="找商品">
                        <div>
                            <span class="a_input_search_img"><img src="./icon/search.png"></span>
                        </div>
                    </div>
                </li>
                <li class="position-relative">
                    <?php if(isset($_SESSION['loginUser'])): ?>
                    <?php if(empty($_SESSION['selffie'])): ?>
                    <a href="member_information.php">
                        <img class="a_log_in" src="./icon/log_in.png">
                    </a>
                    <?php else: ?>
                    <a href="member_information_card_noflipnew.php">
                        <img style="width:30px;height:30px;border-radius:50%;background:pink"  id="jimg" src="./uploads/<?= $_SESSION['selffie'] ?>"   alt="">
                    </a>
                    <?php endif ?>
                    <ul class="a_sub_nav a_transition">
                        <li><a class="a_transition" href="member_information_card_noflipnew.php">會員中心</a></li>
                        <li><a class="a_transition" href="member_order.php">訂單查詢</a></li>
                        <li><a  class="a_transition" href="member_logout_api.php">登出</a></li>
                    </ul>
                    <?php else: ?>
                    <a href="member_login.php"><img class="a_log_in" src="./icon/log_in.png"></a>
                    <?php endif; ?>
                </li>

                <li class="position-relative" onclick="haveSession(event)">
                    <a><img src="./icon/cart.png"></a>
                    <span class="badge badge-pill badge-warning a_cart_count"></span>
                </li>
                <li class="a_menu">
                    <!-- bar1.2.3 上動畫用 -->
                    <div class="a_bar a_bar1 a_transition"></div>
                    <div class="a_bar a_bar2 a_transition"></div>
                    <div class="a_bar a_bar3 a_transition"></div>
                    <ul class="a_rwd_sub_nav a_transition">
                        <li><a href="cin_about.php">關於我們</a></li>
                        <li><a href="product_list.php">商品</a></li>
                        <li><a href="customized.php">商品客製</a></li>
                        <li><a href="article_cover.php">健康小教室</a></li>
                        <?php if(isset($_SESSION['loginUser'])): ?>
                        <li><a href="member_logout_api.php">登出</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            </div>
        </nav>
    </div>
</div>
<div class="a_input_search_rwd a_transition">
    <div class="a_wrapper">
        <div class="d-flex">
            <input type="text" class="a_form_search_rwd" placeholder="找商品">
        </div>
    </div>
</div>