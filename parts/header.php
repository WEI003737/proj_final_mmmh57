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