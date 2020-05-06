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
        background: red;
    }
    .orange{
        background: orange;
    }
    .yellow{
        background: yellow;
    }
    .green{
        background: green;
    }
    .blue{
        background: blue;
    }
    .purple{
        background: purple;
    }
    .brown{
        background: brown;
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
        margin: 0 4px 0 8px;
    }
    .wea_product_list_changebar i{
        margin: 0 8px 0 4px;
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
        height:720px;
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
        width: 47.5%;
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
                <ul class="show-desktop wea_product_select_bar">
                    <ul ><a href=""><h5>所有商品</h5></a></a></ul>
                    <ul ><a href="" data-cate=""><h6>運動內衣</h6></a>
                        <li><a href=""><p>有襯墊內衣</p></a></li>
                        <li><a href=""><p>無襯墊內衣</p></a></li>
                    </ul>
                    <ul><a href=""><h6>上身類</h6></a>
                        <li><a href=""><p>短袖上衣</p></a></li>
                        <li><a href=""><p>長袖上衣</p></a></li>
                        <li><a href=""><p>無袖背心</p></a></li>
                        <li><a href=""><p>運動棉衫</p></a></li>
                        <li><a href=""><p>外套罩衫</p></a></li>
                    </ul>
                    <ul><a href=""><h6>下著類</h6></a>
                        <li><a href=""><p>短褲</p></a></li>
                        <li><a href=""><p>長褲</p></a></li>
                        <li><a href=""><p>五分褲</p></a></li>
                        <li><a href=""><p>七/八分褲</p></a></li>
                        <li><a href=""><p>緊身褲</p></a></li>
                    </ul>
                    <ul ><a href=""><h6>配件</h6></a>
                        <li><a href=""><p>水壺</p></a></li>
                        <li><a href=""><p>保養與清潔</p></a></li>
                        <li><a href=""><p>運動襪</p></a></li>
                        <li><a href=""><p>瑜珈</p></a></li>
                    </ul>
                </ul>
            </div>
    <!-- ===================================== 商品列表 ===================================== -->
    <!-- ======================================= 篩選 ====================================== -->
            <div class="col-lg-10">
                <div class="position-relative">
                    <div class="d-flex wea_product_list_header">
                        <h5 class="show-desktop wea_product_list_tital ">所有商品</h5>
                        <div id="wea_product_list_filter" class="wea_product_list_changebar">
                            <span>分類篩選</span><i class="fas fa-chevron-down"></i>
                        </div>
                        <div id="wea_product_list_sort" class="wea_product_list_changebar">
                            <span>排序方式</span><i class="fas fa-chevron-down"></i>
                         </div>
                    </div>
                    <!-- 手機 -->
                    <div class="show-mobile wea_product_list_header_mobile position-absolute">
                        <!-- 展開狀態 -->
                        <div class="position-relative wea_product_list_showall_mobile">
                            <div class="wea_product_list_tital_seclect position-absolute"></div>
                            <ul class="position-absolute wea_product_select_bar show-mobile">
                                <ul><a class="d-flex"><h5>所有商品</h5></a></a></ul>
                                <!-- <ul ><a href=""><h5>所有商品</h5></a></a></ul> -->
                                <ul ><a class="d-flex"><h6>運動內衣</h6></a>
                                    <li><a class="d-flex"><p>有襯墊內衣</p></a></li>
                                    <li><a class="d-flex"><p>無襯墊內衣</p></a></li>
                                </ul>
                                <ul><a class="d-flex"><h6>上身類</h6></a>
                                    <li><a class="d-flex"><p>短袖上衣</p></a></li>
                                    <li><a class="d-flex"><p>長袖上衣</p></a></li>
                                    <li><a class="d-flex"><p>無袖背心</p></a></li>
                                    <li><a class="d-flex"><p>運動棉衫</p></a></li>
                                    <li><a class="d-flex"><p>外套罩衫</p></a></li>
                                </ul>
                                <ul><a class="d-flex"><h6>下著類</h6></a>
                                    <li><a class="d-flex"><p>短褲</p></a></li>
                                    <li><a class="d-flex"><p>長褲</p></a></li>
                                    <li><a class="d-flex"><p>五分褲</p></a></li>
                                    <li><a class="d-flex"><p>七/八分褲</p></a></li>
                                    <li><a class="d-flex"><p>緊身褲</p></a></li>
                                </ul>
                                <ul ><a class="d-flex"><h6>配件</h6></a></ul>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/fontawesome.min.js"></script>
    <!-- 滑動圖片 -->
    <script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>
    <script>
        var index=0;
        var slideWidth=$(".wea_ootd_img").width();
        var slideImages=[ "ootd1.png", "ootd2.jpg","ootd3.jpg","ootd4.png","ootd5.png"];
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
    const ProductList = $('.wea_product_list'),
          ListPage = $('.wea_product_list_page');

    const ListPageTpl = (obj) => {
        //{active:true , page:1}
        return`
            <li class="${obj.active ? 'active' : ''}"><a href="#${obj.page}">${obj.page}</a></li>
        `;
    }
    const ProductListTpl = (obj) => {
        let uptext=`
            <li class="wea_product_list_item position-relative">
                <img src="product_images/${obj.showImg}.png" alt="">
                <i class="far fa-heart position-absolute"></i>
                <i class="fas fa-heart position-absolute display_none"></i>
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

    function getDataByPage(page = 1){
        $.get('product_list_api.php', {page:page}, function(data){
            // let imm = JSON.parse(data.rowsColor[0][0].pro_pic) ;
            // console.log(JSON.parse(data.rowsColor[0][0].pro_pic)[0]);
            //抓頁碼
            let ListPageStr='';
            for(let i=1 ; i<=data.totalPages ; i++){
                ListPageStr += ListPageTpl({
                    active : page===i,
                    page : i,
                })
            }
            ListPage.html(ListPageStr);
            //抓商品
            let ProductListStr='';
            for(let i=0 ; i < data.rows.length  ; i++){
                ProductListStr += ProductListTpl({
                    showImg : JSON.parse(data.rowsColor[i][0].pro_pic)[0],
                    name : data.rows[i].name,
                    price : data.rows[i].price,
                    rowsColor : data.rowsColor[i],
                })
            }
            ProductList.html(ProductListStr);
        },'json');
    }
    getDataByPage();

    function whenHashChange(){
    let hashStr = location.hash.slice(1); //去掉#
    let page = parseInt(hashStr);

    if(page){
        getDataByPage(page);
    } else {
        getDataByPage(1);
    }
}

window.addEventListener('hashchange', whenHashChange);

whenHashChange();

    </script>
    <!-- 商品預覽換圖 -->
    <script>
        $(Document).on("mouseenter",".wea_product_list_item_color",function(){
            console.log("哈囉!");
            var select_recommend_product = $(this).closest("li").find("img").attr("src");
            // console.log(select_recommend_product);
            if(select_recommend_product != $(this).attr("data-hoverimg")){
                select_recommend_product = $(this).attr("data-hoverimg");
                // console.log(select_recommend_product);
                $(this).closest("li").find("img").attr("src",select_recommend_product);
            }
        })
    </script>
    <!-- 手機版的選單 -->
    <script>
        // 宣告＋預設值
        let select_tital ="";
        $(".wea_product_select_bar.show-mobile a:has(h5)").prepend(`<i class="fas fa-chevron-right"></i>`);
        // 變化開始
        $(".wea_product_list_one_mobile").click(function(){
            $(this).addClass("active");
            setTimeout(() => {
            $(".wea_product_list_showall_mobile").addClass("active");
        }, 100);
        })
        $(".wea_product_select_bar.show-mobile a").click(function(){
            select_tital=$(this).text();
            $(".wea_product_select_bar.show-mobile i").remove();
            $(this).prepend(`<i class="fas fa-chevron-right"></i>`);
            $(".wea_product_list_tital_mobile span").text(select_tital);
            $(".wea_product_list_showall_mobile").removeClass("active");
            setTimeout(() => {
            $(".wea_product_list_one_mobile").removeClass("active");
        }, 100);
        })
    </script>
  </body>
</html>