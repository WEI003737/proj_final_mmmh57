<?php

if(! isset($_SESSION)){
    session_start();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>product list</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
      <!--  公版:link  -->
      <?php include __DIR__. '/parts/h_f_link.php';?>
      <!--  公版:css  -->
      <?php include __DIR__. '/parts/h_f_css.php';?>
  </head>
  <style>
    /* * {
        outline: #FA8000 solid 1px;
    } */
    .show-mobile{
            display: none;
    }
    @media screen and (max-width: 992px){
        .show-desktop{
            display: none;
        }
        .show-mobile{
            display: block;
        }
    }
    
    .wea_wrapper{
        max-width: 1440px;
        margin:0 auto;
    }
    h1,h2,h3,h4,h5,h6,p{
        padding: 0;
        margin: 0;
    }
    ul,li{
        list-style: none;
        padding: 0;
        margin: 0;
    }
    a, a:link{
        color:#272838;
        display: block;
        text-decoration: none;
        font-size: 18px;
    }
    a:hover,a:active{
        color: #C9044D;
    }
    h1{
        font-size: 90px;
    }
    h2{
        font-size: 72px;
    }
    h3{
        font-size: 54px;
    }
    h4{
        font-size: 36px;
    }
    h5{
        font-size: 20px;
    }
    h6{
        font-size: 18px;
    }
    p{
        font-size: 15px;
    }
    .pink{
        background: pink;
    }
    .gray{
        background: #B7B7B7;
    }
    .black{
        background: black;
    }
    .red{
        background: rgb(246, 105, 105);
    }
    .orange{
        background: #ffb265;
    }
    .yellow{
        background: #ffed37;
    }
    .green{
        background: #5ede94;
    }
    .blue{
        background: #66b6ff;
    }
    .purple{
        background: #ce87e4;
    }
    .brown{
        background: #bb7878;
    }
    .white{
        background: #F6F4F4;
    }
    /* ================================== #ootd ============================== */
    .wea_ootd{
        width: 100%;
    }
    .wea_ootd_img{
        width: 100%;
        height: 460px;
        overflow: hidden;
        background: #FEF5EF;
    }
    .wea_ootd_slider_img{
        height: 100%;
        transition: .5s;
        left:0;
    }
    .wea_ootd_slider_img li{
        flex: 1 0 0;
    }
    .wea_ootd_slider_img img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .wea_ootd_img>div{
        padding-top:30px;
    }
    .wea_ootd_dec{
        max-width: 1500px;
        height: 400px;
        margin: auto;
    }
    .wea_ootd_dec div:first-child{
        width: 210px;
        height: 90px;
        right: 30px;
        top: 0px;
        border-top:4px solid #C9044D;
        border-right:4px solid #C9044D;;
    }
    .wea_ootd_dec div:last-child{
        width: 90px;
        height: 210px;
        left: 30px;
        bottom: 0pt;
        border-left:4px solid #C9044D;
        border-bottom:4px solid #C9044D;;
    }
    .wea_ootd_dec h1{
        left: 120px;
        bottom: 0px;
        color: #C9044D;
    }
    .wea_slider_point{
        margin: 18px 0 60px;
    }
    .wea_slider_point li{
        background-color: #C9044D;
        opacity: .2;
        height: 10px;
        width: 48px;
        margin: 0 4px;
    }
    .wea_slider_point li.active{
        background-color: #C9044D;
        opacity: 1;
    }
    @media screen and (max-width: 992px){
    .wea_ootd_img{
        height: 200px;
    }
    .wea_ootd_img>div{
        padding-top:20px;
    }
    .wea_ootd_dec{
        height: 160px;
    }
    .wea_ootd_dec div:first-child{
        width: 120px;
        height: 60px;
        right: 20px;
        top: 0px;
        border-top:2px solid #C9044D;
        border-right:2px solid #C9044D;;
    }
    .wea_ootd_dec div:last-child{
        width: 60px;
        height: 120px;
        left: 20px;
        bottom: 0pt;
        border-left:2px solid #C9044D;
        border-bottom:2px solid #C9044D;;
    }
    .wea_ootd_dec h1{
        left: 80px;
        font-size: 54px;
    }
    .wea_slider_point{
        margin: 18px 0 30px;
    }
    .wea_slider_point{
        margin: 10px 0 40px;
    }
    .wea_slider_point li{
        height: 5px;
        width:35px;
        margin: 0 4px;
    }
    }
    @media screen and (max-width: 625px){
        .wea_ootd_dec h1{
        font-size: 36px;
    }
    }
    /* ===================================== 商品選單 ===================================== */
    .wea_product_select_bar{
        padding: 0 30px;
    }
    .wea_product_select_bar.show-desktop a.active h5,.wea_product_select_bar.show-desktop a.active h6,.wea_product_select_bar.show-desktop a.active p{
        color: #C9044D
    }
    .wea_product_select_bar ul{
        margin-bottom: 20px;
    }
    .wea_product_select_bar h5{
        margin-bottom: 30px;
    }
    .wea_product_select_bar h6{
        margin-bottom: 15px;
    }
    .wea_product_select_bar p{
        margin-bottom: 12px;
    }
    .wea_product_select_bar ul>li:last-child{
        margin-bottom:30px;
    }
    /* ===================================== 商品列表 ===================================== */
    /* ======================================= 篩選 ======================================= */
    .wea_product_list_header{
        justify-content:space-between;
    }
    .wea_product_list_tital{
        padding-top: 4px;
        flex-grow: 1;
    }
    .wea_product_list_changebar{
        border-bottom: 1px solid #272838;
        margin-left: 20px;
        padding-bottom: 4px;
    }
    .wea_product_list_changebar:last-child{
        margin-right: 30px;
    }
    .wea_product_list_changebar span{
        -webkit-user-select:none;
        margin: 0 4px 0 8px;
    }
    .wea_product_list_changebar i{
        margin: 0 8px 0 4px;
    }
    /* #wea_filter_btn.active{
        color: #CA054D;
    }
    .wea_filter_hidearea{
        overflow: hidden;
        right: 0;
        top:28px;
        width: 305px;
        height: 0px;
        background: white;
        box-shadow: 0px 0px 5px #ccc;
        z-index: 2;
        transition: .5s;
    }
    .wea_filter_hidearea.active{
        height: 100px;
        transition: .5s;
    }
    .wea_filter_hidearea ul{
        width: 100%;
        height: 100%;
        padding: 15px;
    }
    .wea_filter_colorbar{
        width: 30px;
        height: 30px;
        border-radius: 50%;
        margin:0 8px 8px 0;
    }
    .wea_filter_colorbar.active{
        border: 2px solid #CA054D;
    } */
    /* .wea_filter_hidearea>div:nth-child(1){
        padding: 15px 15px 0 15px;
    }
    .wea_filter_hidearea>div:nth-child(2){
        padding: 15px;
    }
    .wea_filter_hidearea>div>h6{
        margin-bottom: 10px;
    }
    .wea_filter_color{
        padding-bottom: 10px;
        border-bottom: 1px solid #ccc;
    }
    .wea_filter_colorbar{
        width: 30px;
        height: 30px;
        border-radius: 50%;
        margin:0 8px 8px 0;
    }
    .wea_filter_price input{
        width: 120px
    } */
    #wea_sort_btn.active{
        color: #CA054D;
    }
    .wea_sort_hidearea{
        overflow: hidden;
        right: 0;
        top:28px;
        width: 105px;
        height: 0px;
        background: white;
        box-shadow: 0px 0px 5px #ccc;
        z-index: 2;
        transition: .5s;
    }
    .wea_sort_hidearea.active{
        height: 150px;
        transition: .5s;
    }
    .wea_sort_hidearea ul{
        padding: 15px 15px 7px 15px;
    }
    .wea_sort_bar{
        margin-bottom: 8px ;
        -webkit-user-select:none;
    }
    .wea_sort_bar.active{
       color: #CA054D;
    }
    /* 手機 */
    /* 展開 */
    .wea_product_list_showall_mobile{
        left: -220px;
        transition: .3s;
    }
    .wea_product_list_showall_mobile.active{
        left: 0px;
    }
    .wea_product_list_tital_seclect{
        width: 220px;
        height:780px;
        top: 3px;
        left: -20px;
        transform: rotate(-2deg);
        background: #C9044D;
        transition: .5s;
    }
    .wea_product_select_bar.show-mobile{
        width: 150px;
        margin:30px 8px 0 0px;
        padding: 0 0 0 20px;
    }
    .wea_product_select_bar.show-mobile h5{
        margin-bottom: 12px;
    }
    .wea_product_select_bar.show-mobile h6,.wea_product_select_bar.show-mobile h5,.wea_product_select_bar.show-mobile p{
        color: white;
    }
    .wea_product_select_bar.show-mobile i{
        margin:2px 8px 0 0;
        color: white;
    }
    .wea_product_list_header_mobile{
        z-index: 2;
        width: 150px;
        height: 60px;
        left: 0;
        top: -20px;
        /* border:1px solid #991212; */
    }
    /* 收起狀態 */
    .wea_product_list_one_mobile{
        left: 0;
        transition: .3s;
    }
    .wea_product_list_one_mobile.active{
        left: -170px;
    }
    .wea_product_list_titalbox_mobile{
        width: 170px;
        height: 50px;
        top: 3px;
        left: -25px;
        transform: rotate(-2deg);
        background: #C9044D;
        transition: .5s;
    }
    .wea_product_list_tital_mobile{
        top: 3px;
        left: -25px;
    }
    .wea_product_list_tital_mobile i{
        margin:18px 8px 0 45px;
        transform: scale(1.2);
        color: white;
    }
    .wea_product_list_tital_mobile span{
        font-size: 18px;
        color: white;
    }
    @media screen and (max-width: 992px){
        .wea_product_list_header{
        justify-content:flex-end;
    }
        .wea_product_list_tital{
        margin-left: 20px;
    }
    .wea_product_list_changebar:last-child{
        margin-right: 20px;
    }
    }
    @media screen and (max-width: 625px){
        .wea_product_list_changebar{
        margin-left: 10px;
        padding-bottom: 0px;
    }    
        .wea_product_list_changebar span{
        font-size: 15px;
        margin: 0 2px 0 4px;
    }
    .wea_product_list_changebar i{
        margin: 0 4px 0 2px;
    }
    .wea_sort_hidearea{
        top:24px;
    }
    }
    /* ======================================= 商品 ======================================= */
    .wea_product_list{
        margin-top: 20px;
        margin-right: calc(30px - 0.5%);
        margin-left: -0.5%;
    }
    .wea_product_list_item{
        /* flex-grow: 1; */
        width: 24%;
        margin: 0.5%;
        margin-bottom: 30px;
    }
    .wea_product_list_item img{
        width: 100%;
    }
    .wea_product_list_item i{
        right: 0;
        top: 0;
        margin: 20px;
        transform: scale(1.5);
        color: #C9044D;
    }
    .wea_product_list_item>p{
        margin-top: 4px;
        display : inline-block;
        overflow : hidden;
        text-overflow : ellipsis;
        white-space : nowrap;
        width: 100%
    }
    /* .wea_product_list_item_img{
        width: 285px;
        height: 350px;
        background: url('/img/0.png') no-repeat;
        background-size: cover;
    } */
    .wea_product_list_item_price{
        color: #C9044D;
        flex-grow: 1;
    }
    .wea_product_list_item_color{
        width: 20px;
        height: 20px;
        border-radius: 50%;
        margin-left: 8px;
    }
    
    @media screen and (max-width: 992px){
        .wea_product_list{
        margin-left: 20px;
        margin-right: 20px;
        }
    }
    @media screen and (max-width: 625px){
        .wea_product_list_item{
        width: 47%;
        margin: 1.5%;

    }
        .wea_product_list_item img{
        width: 100%;
    }
    }
    /* ======================================= 頁碼 ======================================= */
    .wea_product_list_page{
        margin: 30px 30px 90px 0;
        justify-content: flex-end;
    }
    .wea_product_list_page a{
        margin-left: 20px;
    }
    .wea_product_list_page li.active a{
        color: #C9044D;
    }
    @media screen and (max-width: 625px){
        .wea_product_list_page{
        margin: 30px 0px 90px 0;
        justify-content: center;
    }
    }
    /* ================================= 消失物件 display:none =================================== */
    .display_none{
        display: none;
    }
  </style>
  <body>
      <!--  公版:header  -->
      <?php include __DIR__. '/parts/header.php';?>
    <!-- =================================== #ootd =================================== -->

    <!-- 推出 header 空間-->
    <div class="a_push_place"></div>
    <div class="wea_ootd">
        <div class="wea_ootd_img position-relative">
            <ul class="list-unstyled wea_ootd_slider_img d-flex position-absolute">
                <!-- <li><img src="img/ootd1.png" alt=""></li> -->
            </ul>
            <div>
                <div class="wea_ootd_dec position-relative">
                    <div class="position-absolute"></div>
                    <h1 class="position-absolute"> #OOTD</h1>
                    <div class="position-absolute"></div>
                </div>
            </div>
        </div>
        <ul class="list-unstyled wea_slider_point d-flex justify-content-center">
            <!-- <li class="active"></li> -->
        </ul>
    </div>
    <!-- =================================== 選單 =================================== -->
    <div id="#" class="wea_wrapper">
        <div class="row no-gutters">
            <div class="col-sm-2">
                <ul id="categoriesInput" class="show-desktop wea_product_select_bar" data-categories="">
                <ul><a data-categories=""><h5>所有商品</h5></a></a></ul>
                    <ul ><a data-categories="`cate_sid` IN(1,2)"><h6>運動內衣</h6></a>
                        <li><a data-categories="`cate_sid` = 1"><p>有襯墊內衣</p></a></li>
                        <li><a data-categories="`cate_sid` = 2"><p>無襯墊內衣</p></a></li>
                    </ul>
                    <ul><a data-categories="`cate_sid` BETWEEN 3 AND 7"><h6>上身類</h6></a>
                        <li><a data-categories="`cate_sid` = 3"><p>短袖上衣</p></a></li>
                        <li><a data-categories="`cate_sid` = 4"><p>無袖背心</p></a></li>
                        <li><a data-categories="`cate_sid` = 5"><p>長袖上衣</p></a></li>
                        <li><a data-categories="`cate_sid` = 6"><p>運動棉衫</p></a></li>
                        <li><a data-categories="`cate_sid` = 7"><p>外套罩衫</p></a></li>
                    </ul>
                    <ul><a data-categories="`cate_sid` BETWEEN 8 AND 13"><h6>下著類</h6></a>
                        <li><a data-categories="`cate_sid` = 8"><p>緊身褲</p></a></li>
                        <li><a data-categories="`cate_sid` = 9"><p>運動褲</p></a></li>
                        <li><a data-categories="`cate_sid` = 10"><p>短褲</p></a></li>
                        <li><a data-categories="`cate_sid` = 11"><p>五分褲</p></a></li>
                        <li><a data-categories="`cate_sid` = 12"><p>七/八分褲</p></a></li>
                        <li><a data-categories="`cate_sid` = 13"><p>長褲</p></a></li>
                    </ul>
                    <ul ><a class="d-flex" data-categories="`cate_sid` = 14"><h6>配件</h6></a></ul>
                </ul>
            </div>
    <!-- ===================================== 商品列表 ===================================== -->
    <!-- ======================================= 篩選 ====================================== -->
            <div class="col-lg-10">
                <div class="position-relative">
                    <div class="d-flex wea_product_list_header">
                        <h5 class="show-desktop wea_product_list_tital ">所有商品</h5>
                        <div id="wea_product_list_filter" class="wea_product_list_changebar position-relative display_none">
                            <div id="wea_filter_btn">
                                <span>顏色篩選</span><i class="fas fa-chevron-down"></i>
                            </div>    
                            <div class="wea_filter_hidearea position-absolute">
                                <div>
                                    <ul class="d-flex flex-wrap wea_filter_color ">
                                        <li class="wea_filter_colorbar pink"></li>
                                        <li class="wea_filter_colorbar red"></li>
                                        <li class="wea_filter_colorbar orange"></li>
                                        <li class="wea_filter_colorbar yellow"></li>
                                        <li class="wea_filter_colorbar green"></li>
                                        <li class="wea_filter_colorbar blue"></li>
                                        <li class="wea_filter_colorbar purple"></li>
                                        <li class="wea_filter_colorbar brown"></li>
                                        <li class="wea_filter_colorbar white"></li>
                                        <li class="wea_filter_colorbar gray"></li>
                                        <li class="wea_filter_colorbar black"></li>
                                    </ul>
                                </div>
                                <!--<div>
                                    <h6>顏色篩選</h6>
                                    <ul class="d-flex flex-wrap wea_filter_color ">
                                        <li class="wea_filter_colorbar pink"></li>
                                        <li class="wea_filter_colorbar red"></li>
                                        <li class="wea_filter_colorbar orange"></li>
                                        <li class="wea_filter_colorbar yellow"></li>
                                        <li class="wea_filter_colorbar green"></li>
                                        <li class="wea_filter_colorbar blue"></li>
                                        <li class="wea_filter_colorbar purple"></li>
                                        <li class="wea_filter_colorbar brown"></li>
                                        <li class="wea_filter_colorbar white"></li>
                                        <li class="wea_filter_colorbar gray"></li>
                                        <li class="wea_filter_colorbar black"></li>
                                    </ul>
                                </div>
                                <div>
                                    <h6>價格範圍篩選</h6>
                                    <div class="d-flex flex-wrap wea_filter_price justify-content-between">
                                        <input type="text" placeholder="請輸入最低價格">
                                        <p> - </p>
                                        <input type="text" placeholder="請輸入最高價格">
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div id="wea_product_list_sort" class="wea_product_list_changebar position-relative">
                            <div id="wea_sort_btn" data-ordertype="" data-orderway="">
                                <span>排序方式</span><i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="wea_sort_hidearea position-absolute">
                                <ul>
                                    <li class="wea_sort_bar" data-ordertype="`created_date`" data-orderway="DESC">由新到舊</li>
                                    <li class="wea_sort_bar" data-ordertype="`created_date`" data-orderway="ASC">由舊到新</li>
                                    <li class="wea_sort_bar" data-ordertype="`price`" data-orderway="ASC">價低到高</li>
                                    <li class="wea_sort_bar" data-ordertype="`price`" data-orderway="DESC">價高到低</li>
                                </ul>
                            </div>
                         </div>
                    </div>
                    <!-- 手機 -->
                    <div class="show-mobile wea_product_list_header_mobile position-absolute">
                        <!-- 展開狀態 -->
                        <div class="position-relative wea_product_list_showall_mobile">
                            <div class="wea_product_list_tital_seclect position-absolute"></div>
                            <ul class="position-absolute wea_product_select_bar show-mobile">
                                <ul><a class="d-flex" data-categories=""><h5>所有商品</h5></a></a></ul>
                                <ul ><a class="d-flex" data-categories="`cate_sid` IN(1,2)"><h6>運動內衣</h6></a>
                                    <li><a class="d-flex" data-categories="`cate_sid` = 1"><p>有襯墊內衣</p></a></li>
                                    <li><a class="d-flex" data-categories="`cate_sid` = 2"><p>無襯墊內衣</p></a></li>
                                </ul>
                                <ul><a class="d-flex" data-categories="`cate_sid` BETWEEN 3 AND 7"><h6>上身類</h6></a>
                                    <li><a class="d-flex" data-categories="`cate_sid` = 3"><p>短袖上衣</p></a></li>
                                    <li><a class="d-flex" data-categories="`cate_sid` = 4"><p>無袖背心</p></a></li>
                                    <li><a class="d-flex" data-categories="`cate_sid` = 5"><p>長袖上衣</p></a></li>
                                    <li><a class="d-flex" data-categories="`cate_sid` = 6"><p>運動棉衫</p></a></li>
                                    <li><a class="d-flex" data-categories="`cate_sid` = 7"><p>外套罩衫</p></a></li>
                                </ul>
                                <ul><a class="d-flex" data-categories="`cate_sid` BETWEEN 8 AND 13"><h6>下著類</h6></a>
                                    <li><a class="d-flex" data-categories="`cate_sid` = 8"><p>緊身褲</p></a></li>
                                    <li><a class="d-flex" data-categories="`cate_sid` = 9"><p>運動褲</p></a></li>
                                    <li><a class="d-flex" data-categories="`cate_sid` = 10"><p>短褲</p></a></li>
                                    <li><a class="d-flex" data-categories="`cate_sid` = 11"><p>五分褲</p></a></li>
                                    <li><a class="d-flex" data-categories="`cate_sid` = 12"><p>七/八分褲</p></a></li>
                                    <li><a class="d-flex" data-categories="`cate_sid` = 13"><p>長褲</p></a></li>
                                </ul>
                                <ul ><a class="d-flex" data-categories="`cate_sid` = 14"><h6>配件</h6></a></ul>
                            </ul>
                        </div>
                        <!-- 收起狀態 -->
                        <div class="position-relative wea_product_list_one_mobile">
                            <div class="wea_product_list_titalbox_mobile position-absolute"></div>
                            <div class="wea_product_list_tital_mobile position-absolute">
                                <i class="fas fa-chevron-left"></i><span>所有商品</span>
                            </div>
                        </div>
                    </div>
                </div>
    <!-- ======================================= 商品 ====================================== -->
                <ul class="wea_product_list d-flex  flex-wrap">
                    <!-- <li class="wea_product_list_item position-relative">
                        <img src="img/0.png" alt="">
                        <i class="far fa-heart position-absolute"></i>
                        <i class="fas fa-heart position-absolute display_none"></i>
                        <p>後綁帶短袖上衣</p>
                        <div class="d-flex justify-content-between">
                            <p class="wea_product_list_item_price">NT1340</p>
                            <div class="wea_product_list_item_color pink"></div>
                            <div class="wea_product_list_item_color gray"></div>
                        </div>
                    </li> -->
                    
                </ul>
    <!-- ======================================= 頁碼 ====================================== -->
                <ul class="wea_product_list_page d-flex">
                    <!-- <li><a href=""><i class="fas fa-chevron-left"></i></a></li>
                    <li class="active"><a href="">1</a></li>
                    <li><a href="">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href="">4</a></li>
                    <li><a href="">5</a></li>
                    <li><a href=""><i class="fas fa-chevron-right"></i></a></li> -->
                </ul>
            </div> 
        </div>
    </div>
      <!--  公版:footer  -->
      <?php include __DIR__. '/parts/footer.php';?>
      <!--  公版:script  -->
      <?php include __DIR__ . '/parts/h_f_script.php'; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/fontawesome.min.js"></script>
    <!-- 滑動圖片 -->
    <script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>

    <script>
        var index=0;
        var slideWidth=$(".wea_ootd_img").width();
        var slideImages=[ "ootd1.jpg", "ootd2.png","ootd3.png","ootd4.jpg","ootd5.jpg"];
        var slideCount=slideImages.length;
        var slideImagesContent="";
        var slidePoint="";
        //#ootd slider初始化新增元件
        for(let i=0; i<slideCount; i++){
            slideImagesContent=slideImagesContent+`<li><img src="img/${slideImages[i]}" alt=""></li>`;
            slidePoint=slidePoint+"<li></li>"
        }
        $(".wea_ootd_slider_img").append(slideImagesContent);
        $(".wea_slider_point").append(slidePoint);
        //#ootd slider起始值
        $(".wea_slider_point li").eq(0).addClass("active")
        $(".wea_ootd_slider_img").css("width", slideCount*slideWidth)
        //#ootd slider滑鼠觸碰點點      
        $(".wea_slider_point li").mouseenter(function(){
            //li物件從0開始
            index=$(this).index();
            goTo()
        })
        //#ootd slider自動播放
        var ootd_slider_auto = window.setInterval(function(){
            index++;
                if(index>=slideCount){
                index=0;
            } 
                goTo();
        },3000)
        //#ootd slider手指滑動切圖
        $(".wea_ootd_img").swipe({
            threshold: 0,
            swipe:function(event, direction, distance, duration, fingerCount, fingerData, currentDirection) {
            // console.log([event, direction, distance, duration, fingerCount, fingerData, currentDirection]);
            if(direction == 'right'){
                index--;
                if(index<0){
                    index=slideCount-1;
                }
                goTo();
            }else if(direction == 'left'){
                index++;
                if(index>=slideCount){
                index=0;
            } 
                goTo();
            }
        }
        })
        $(".wea_ootd_img").swipe( {fingers:1} );
        //#ootd slider函式>圖片滑動、點點顯示改變
        function goTo(){
            var slideMove=0-index*slideWidth;
            $(".wea_ootd_slider_img").css("left", slideMove )
            $(".wea_slider_point li").eq(index).addClass("active")
            .siblings().removeClass("active")
        }
        // #ootd slider螢幕尺寸改變時圖片大小變動
        $(window).resize(function(){
            slideWidth=$(".wea_ootd_img").width()
            $(".wea_ootd_slider_img").css("width", slideCount*slideWidth)
            goTo()
        })
    </script>
    <!-- 生成資料 -->
    <script>
    /*
        運作的流程 steps
        1. 取得資料 (包成 function
        2. 生頁碼列的按鈕
        3. 生資料表格

    */
    var totalpage ;
    var prepagenum = 1; 
    var nextpagenum = 1;
    const ProductList = $('.wea_product_list'),
          ListPage = $('.wea_product_list_page');

    const ListPageTpl = (obj) => {
        //{active:true , page:1}
        return`
            <li class="${obj.active ? 'active' : ''}"><a href="javascript:goPage(${obj.page})">${obj.page}</a></li>
        `;
    }
    const ProductListTpl = (obj) => {
        let uptext=`
            <li class="wea_product_list_item position-relative" data-sid="${obj.sid}">
                <a href="./product.php?sid=${obj.sid}"><img src="product_images/${obj.showImg}.png" alt=""></a>
                <?php if(isset($_SESSION['loginUser'])): ?>
                <i class="a_add_to_like_unactive far fa-heart position-absolute" data-sid="${obj.sid}"></i>
                <i class="a_add_to_like_active fas fa-heart position-absolute display_none" data-sid="${obj.sid}"></i>
                 <?php endif; ?>
                <p>${obj.name}</p>
                <div class="d-flex justify-content-between">
                    <p class="wea_product_list_item_price">NT$ ${obj.price}</p>`

        let colortext="";
        let rowColor = obj.rowsColor;
        for(let i =0;i<rowColor.length;i++){
        colortext+= `<div data-hoverimg='product_images/`+JSON.parse(rowColor[i].pro_pic)[0]+`.png' class="wea_product_list_item_color `+rowColor[i].color+`"></div>`
        }
        let downtext=`
                </div>
            </li>`;
        return uptext+colortext+downtext;
    }

    function getDataByPage(pageapi = 1,cateapi = "",ordertypeapi = "",orderwayapi=""){
        // console.log("getDataByPage收到的orderwayapi:"+orderwayapi);
        // return;
        $.get('product_list_api.php', {page:pageapi,categories:cateapi,ordertype:ordertypeapi,orderway:orderwayapi}, function(data){
            // let imm = JSON.parse(data.rowsColor[0][0].pro_pic) ;
            // console.log(JSON.parse(data.rowsColor[0][0].pro_pic)[0]);
            // console.log(data);

            //抓頁碼
            let ListPageStr='';
            totalpage = data.totalPages;
            if(data.totalPages>1){
                ListPageStr += '<li><a  href="javascript:goPage(prepagenum)"><i class="fas fa-chevron-left"></i></a></li>';
                for(let i=1 ; i<=data.totalPages ; i++){
                ListPageStr += ListPageTpl({
                    active : pageapi === i,
                    page : i,
                    })
                }
            ListPageStr += '<li><a  href="javascript:goPage(nextpagenum)"><i class="fas fa-chevron-right"></i></a></li>';
            }
            
            ListPage.html(ListPageStr);
            //抓商品
            let ProductListStr='';
            for(let i=0 ; i < data.rows.length  ; i++){
                ProductListStr += ProductListTpl({
                    showImg : JSON.parse(data.rowsColor[i][0].pro_pic)[0],
                    name : data.rows[i].name,
                    price : data.rows[i].price,
                    sid : data.rows[i].sid,
                    rowsColor : data.rowsColor[i],
                })
            }
            ProductList.html(ProductListStr);
        },'json')
        // .done(function(){
        //     alert("success");
        // })
        // .fail(function(){
        //     alert("fail");
        // })
    }
    // getDataByPage();

    function whenHashChange(){
        let hashStr = location.hash.slice(1); //去掉#
        // console.log('hashStr:', hashStr);
        // console.log('hashStr2:', decodeURIComponent(hashStr));
        hashStr = decodeURIComponent(hashStr); // url decode
        let obj = {};
        // console.log( hashStr);

        try{
            obj = JSON.parse(hashStr);
        } catch(ex){
            console.log(ex);
        }

        // console.log('obj:', obj.categories);
        let page = obj.page;
        const categories = obj.categories;
        const ordertype = obj.ordertype;
        const orderway = obj.orderway;

        // // 由 hash 設定到搜尋欄
        if(categories !== $('#categoriesInput').attr("data-categories")){
            $('#categoriesInput').attr("data-categories",categories);
            for(i=0;i<18;i++){
                if(categories == $(".wea_product_select_bar.show-desktop a").eq(i).attr("data-categories")){
                    $(".wea_product_select_bar.show-desktop a").eq(i).addClass("active");
                    $(".wea_product_select_bar.show-mobile a").eq(i).prepend(`<i class="fas fa-chevron-right"></i>`);
                    $(".show-desktop.wea_product_list_tital").text($(".wea_product_select_bar.show-desktop a").eq(i).text());
                    $(".wea_product_list_tital_mobile span").text($(".wea_product_select_bar.show-desktop a").eq(i).text());
                }
            }
        // comsole.log($('#categoriesInput').attr("data-categories"));
        }
        if(ordertype !== $("#wea_sort_btn").attr("data-ordertype")){
            $("#wea_sort_btn").attr("data-ordertype",ordertype);
            $("#wea_sort_btn").attr("data-orderway",orderway);
            for(i=0 ; i<4 ; i++ ){
                if(ordertype == $(".wea_sort_bar").eq(i).attr("data-ordertype") && orderway == $(".wea_sort_bar").eq(i).attr("data-orderway")){
                    $(".wea_sort_bar").eq(i).addClass("active");
                    $("#wea_sort_btn span").text($(".wea_sort_bar").eq(i).text());
                }
            }
        }
        // // let page = parseInt(hashStr);
        prepagenum = page - 1;
        if(prepagenum < 1){
            prepagenum =  1;
        }
        nextpagenum = page + 1;
        if(nextpagenum > totalpage){
            nextpagenum = totalpage;
        }    
        
        if(page){
            getDataByPage(page,categories,ordertype,orderway);
            console.log("page 執行 getDataByPage");
        } else {
            getDataByPage(1,categories,ordertype,orderway);
            console.log("1 執行 getDataByPage");
        }
    }

    window.addEventListener('hashchange', whenHashChange);

    whenHashChange();
    
    function goPage(pagenum = 1){
            location.href = '#' + JSON.stringify({
            page: pagenum,
            categories: $('#categoriesInput').attr("data-categories"),
            ordertype: $("#wea_sort_btn").attr("data-ordertype"),
            orderway: $("#wea_sort_btn").attr("data-orderway")
            });
    }
    </script>
    <!-- 商品預覽換圖 -->
    <script>
        $(Document).on("mouseenter",".wea_product_list_item_color",function(){
            // console.log("哈囉!");
            var select_recommend_product = $(this).closest("li").find("img").attr("src");
            // console.log(select_recommend_product);
            if(select_recommend_product != $(this).attr("data-hoverimg")){
                select_recommend_product = $(this).attr("data-hoverimg");
                // console.log(select_recommend_product);
                $(this).closest("li").find("img").attr("src",select_recommend_product);
            }
        })
    </script>
    <!-- 選單 -->
    <script>
        // 宣告+預設值
        let select_tital =$(".wea_product_select_bar.show-desktop a").find("h5").text();
        
        if($(".wea_product_select_bar.show-desktop a").hasClass("active") == false){
            $(".wea_product_select_bar.show-desktop a:has(h5)").addClass("active");
            $(".wea_product_select_bar.show-mobile a:has(h5)").prepend(`<i class="fas fa-chevron-right"></i>`);
        }
        // $(".wea_product_select_bar.show-desktop a:has(h5)").addClass("active");
        // $(".wea_product_select_bar.show-mobile a:has(h5)").prepend(`<i class="fas fa-chevron-right"></i>`);
        // 變化開始
        // 點桌機板
        $(".wea_product_select_bar.show-desktop a").click(function(){
            console.log($(this).text());
            if(select_tital != $(this).text()){
                select_tital=$(this).text();
                $('#categoriesInput').attr("data-categories",$(this).attr("data-categories"));
                // desktop
                $(".show-desktop.wea_product_list_tital").text(select_tital);
                $(".wea_product_select_bar.show-desktop a").removeClass("active");
                $(this).addClass("active");
                //mobile
                $(".wea_product_select_bar.show-mobile i").remove();
                let datatext = $(this).attr("data-categories");
                for(i=0;i<18;i++){
                    if(datatext == $(".wea_product_select_bar.show-mobile a").eq(i).attr("data-categories")){
                        $(".wea_product_select_bar.show-mobile a").eq(i).prepend(`<i class="fas fa-chevron-right"></i>`);
                    }
                }
                $(".wea_product_list_tital_mobile span").text(select_tital);
                $(".wea_product_list_showall_mobile").removeClass("active");
                setTimeout(() => {
                    $(".wea_product_list_one_mobile").removeClass("active");
                }, 100);
                //呼叫
                goPage(1);
            }
        })
        // 點手機版
        $(".wea_product_list_one_mobile").click(function(){
            $(this).addClass("active");
            setTimeout(() => {
            $(".wea_product_list_showall_mobile").addClass("active");
        }, 100);
        })
        $(".wea_product_select_bar.show-mobile a").click(function(){
            select_tital=$(this).text();
            $('#categoriesInput').attr("data-categories",$(this).attr("data-categories"));
            // desktop
            let datatext = $(this).attr("data-categories");
            $(".show-desktop.wea_product_list_tital").text(select_tital);
            $(".wea_product_select_bar.show-desktop a").removeClass("active");
            for(i=0;i<18;i++){
                if(datatext == $(".wea_product_select_bar.show-desktop a").eq(i).attr("data-categories")){
                    $(".wea_product_select_bar.show-desktop a").eq(i).addClass("active");
                }
            }
            // mobile
            $(".wea_product_select_bar.show-mobile i").remove();
            $(this).prepend(`<i class="fas fa-chevron-right"></i>`);
            $(".wea_product_list_tital_mobile span").text(select_tital);
            $(".wea_product_list_showall_mobile").removeClass("active");
            setTimeout(() => {
                $(".wea_product_list_one_mobile").removeClass("active");
            }, 100);
            //呼叫
            goPage(1);
        })

        $("#wea_filter_btn").click(function(){
            $(".wea_filter_hidearea").toggleClass("active");
            $("#wea_filter_btn").toggleClass("active");
            if($("#wea_filter_btn i").hasClass("fa-chevron-down")){
                $("#wea_filter_btn i").removeClass("fa-chevron-down").addClass("fa-chevron-up");
            }else{
                $("#wea_filter_btn i").removeClass("fa-chevron-up").addClass("fa-chevron-down");
            }
        })
        $("#wea_sort_btn").click(function(){
            $(".wea_sort_hidearea").toggleClass("active");
            $("#wea_sort_btn").toggleClass("active");
            if($("#wea_sort_btn i").hasClass("fa-chevron-down")){
                $("#wea_sort_btn i").removeClass("fa-chevron-down").addClass("fa-chevron-up");
            }else{
                $("#wea_sort_btn i").removeClass("fa-chevron-up").addClass("fa-chevron-down");
            }
        })
        $(".wea_sort_bar").click(function(){
            if($(this).hasClass("active") == false){
                //網頁上看的到的效果
                $(".wea_sort_bar").removeClass("active");
                $(this).addClass("active");
                $("#wea_sort_btn span").text($(this).text());
                $(".wea_sort_hidearea").toggleClass("active");
                $("#wea_sort_btn").toggleClass("active");
                //存值
                $("#wea_sort_btn").attr("data-ordertype",$(this).attr("data-ordertype"))
                                  .attr("data-orderway",$(this).attr("data-orderway"));
                // 抓資料
                goPage(1);
            }
        })

        //頁碼
        // $("#previous_page").click(function(){
        //         nowpagenum-=1;
        //         console.log(nowpagenum);
        //         goPage(nowpagenum);
        // })
    </script>


      <script>

          //加入最愛-----------------------------
          //登入才顯示愛心

          $(document).on("click", ".a_add_to_like_unactive", function(){
              //加入最愛圖示
              $(event.target).siblings(".a_add_to_like_active").removeClass("display_none");
              //傳送 colorSid 給後端
              const a_likeProSid = $(event.target).attr("data-sid");

              $.get('_add_to_like_api.php', {a_likeProSid}, function (data) {
                  if (data.success) {
                        $('.a_alert.a_addToLike').fadeIn();
                        setTimeout(function(){
                            $('.a_alert.a_addToLike').fadeOut();
                        }, 800);
                  }else {
                      $('.a_alert.a_addToLike').fadeIn();
                      setTimeout(function(){
                          $('.a_alert.a_addToLike').fadeOut();
                      }, 800);
                  }
              }, 'json')
          });

          //移除最愛-----------------------------
          $(document).on("click", ".a_add_to_like_active", function(){

              //移除最愛圖示
              $(event.target).addClass("display_none");
              //傳送 colorSid 給後端
              const a_likeProSid = $(event.target).attr("data-sid");

              $.get('_remove_from_like_api.php', {a_likeProSid}, function (data) {
                  if (data.success) {
                      $('.a_alert.a_removeFromLike').fadeIn();
                      setTimeout(function(){
                          $('.a_alert.a_removeFromLike').fadeOut();
                      }, 800);
                  }

              }, 'json')

              // .done(function(){
              //     console.log("success")
              // })
              // .fail(function(er){
              //     console.log(er);
              // })
          })

          //有登入就顯示已加入收藏的商品----------------------------- (還沒寫完)
          // function showWishList() {
          //     $.get("member_wishlist_api.php", function (data) {
          //         console.log(data)
          //     }, "json")
          //
          //         .fail(function (err){
          //             console.log(err)
          //         })
          //         .done(function (){
          //             console.log("success")
          //         })
              //let arr = <?//= json_encode([1, 2, 3, 4, 6, 14]) ?>//;
              //for (let val of arr) {
              //    $('li.wea_product_list_item i[data-sid="' + val + '"]').click();
          // }


          // showWishList();
      </script>
  </body>
</html>