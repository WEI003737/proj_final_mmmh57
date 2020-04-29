<style>
        *{
            box-sizing: border-box;
        }
        body{
            font-family: 'Noto Sans TC', sans-serif;
        }
/* --------------font-face 英文字形自己放在要用的地方--------------
        https://www.cufonfonts.com/font/lucida-sans

        1.放字形檔案
        2.font-face語法已經寫好
        3.將font-family放在要下的地方
        ex.
        .header{ font-family: 'Lucida Sans Italic'; } 
        
        */
        @font-face {
            font-family: 'Lucida Sans Italic';
            font-style: normal;
            font-weight: normal;
            src: local('Lucida Sans Italic'), url('/font/LSANSD.TTF') format('woff');
        }
        @font-face {
            font-family: 'Lucida Sans Demibold Roman';
            font-style: normal;
            font-weight: normal;
            src: local('Lucida Sans Demibold Roman'), url('/font/LSANSDI.TTF') format('woff');
        }
/* --------------字體大小-------------- */
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
/* -------------- 去掉列表的圖案 -------------- */
        dl,ol,ul,li{
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .header a,
        .header img,
        .footer a,
        .foot img{
            cursor: pointer;
        }
        .a_transition{
            transition:all .5s;
            -webkit-transition: all .5s;
        }
        .a_wrapper{
            max-width: 1440px;
            margin: 0 auto;
        }
        .a_object_fit{
            width: 100%;
            height: 100%;
            object-fit: cover;
            overflow: hidden;
        }
        .a_push_place{
            height: 120px;
        }
    /* ----------- header ----------- */
        .header{
            box-shadow: 0 0 5px #ccc;
            background: #fff;
            font-size: 20px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            margin: 0 auto;
            z-index: 999;
        }
        .header .a_nav{
            /* header 高度 */
            height: 120px;
            display: flex;
            justify-content: space-between;
        }
        .header_nav_left{
            display: flex;
            align-items: center;
        }
        .header .a_logo {
            padding: 0 40px;
        }
        .header .a_logo_top {
            padding-left: 10px;
        }
        .header_nav_left>li{
            margin: 0 2vw;
        }
        .header_nav_left>li a:hover{
            color: #CA054D;
        }
        .header_nav_right{
            display: flex;
            align-items: center;
        }
        .header_nav_right img{
            margin: 0 20px;
        }
        .header_nav_right>li img:hover{
            transform: translateY(-3px);
        }
/* ----------- header 搜尋欄 ----------- */
        .a_input_search{
            margin:0;
            padding-top: 6px;
            display: flex;
        }
        .a_input_search:hover .a_form_search{
            max-width: 150px;
            border: 2px solid #CA054D;
            padding: 3px 10px;
        }
        .a_form_search{
            max-width: 0;
            border: 0;
            border-radius: 20px;
        }
        .a_input_search_img{
            background-color: rgba(255, 255, 255, 0);
            border: 0;
            padding: 0;
        }
        .header .a_menu{
            display: none;
        }
        .header .a_bar{
            width: 30px;
            height: 4px;
            background: rgb(58, 58, 58);
            margin: 5px 0 0 30px;
            border-radius: 2px;
        }
        .header_nav_right li:hover .a_sub_nav{
            max-height: 300px;
        }
        .header nav ul li a:hover{
            background: #FFE07C;
        }
        .header .a_sub_nav{
            position: absolute;
            background: rgb(255, 255, 255);
            top: 77px;
            width: 132px;
            max-height: 0;
            overflow: hidden;
        }
        .header .a_sub_nav a{
            padding:8px 20px;
            display: block;
        }
        .header .a_rwd_sub_nav{
            display: none;
        }
        .a_cart_count{
            color: #fff;
        }
        @media all and (max-width: 360px) {
            .a_wrapper{
                /* 360px - 30px(左右邊框) */
                width: 330px;
            }
            .header .a_nav{
                height: 60px;
            }
            .header .a_logo{
                padding: 0;
            }
            .header .a_logo img{
                width: 40px;
            }
            .header_nav_left li{
                display: none;
            }
            .header_nav_right img{
                width: 15px;
                margin: 0 10px;
            }
            .header .a_sub_nav{
                display: none;
            }
            .header .active .a_rwd_sub_nav{
                max-height: 300px;                
            }
            .header .a_rwd_sub_nav{
                display: block;
                position: absolute;
                background: rgb(255, 255, 255);
                font-size: 15px;
                top: 60px;
                right: 0;
                width: 132px;
                max-height: 0;
                overflow: hidden;
                /* z-index: -1; */
            }
            .header .a_rwd_sub_nav a{
                padding:8px 20px;
                display: block;
            }
            /* 漢堡選單 */
            .header .a_menu{
                display: block;                
            }
            .header .a_bar{
                width: 20px;
                height: 3px;
                margin: 4px 0 0 20px;
            }            
            .active .a_bar1{
                -webkit-transform: rotate(-45deg) translate(-5px, 5px) ;
                transform: rotate(-45deg) translate(-5px, 5px) ;
            }
            .active .a_bar2{
                opacity: 0;
            }
            .active .a_bar3{
                -webkit-transform: rotate(45deg) translate(-5px, -5px) ;
                transform: rotate(45deg) translate(-5px, -5px) ;
            }
        }

    /* ----------- footer ----------- */
        .footer{
            height: 415px;
            padding-top: 60px;
            background: #CA054D;
            color: #fff;
            font-size: 20px;
        }
        .footer .a_block_1{
            display: flex;
            justify-content: space-between;
        }        
        .footer .a_title{
            /* 蓋過 footer 裡的 font-size */
            font-size: 25px;
            padding-bottom: 25px;
        }
        .footer .a_block_1_1 li,
        .footer .a_block_1_2 li{
            padding-bottom: 10px;
        }
        .footer hr{
            width: 100%;
            border: 1px solid #fff;
            color: #fff;
            margin: 50px auto 25px ;
        }
        .footer .a_map{
            height: 200px;
            width: 500px;
            background: #fff;
        }
        .footer .a_block_2{
            display: flex;
        }
        .footer .a_block_2 img{
            margin-right: 50px;
        }
        .footer .a_rwd_map{
            display: none;
        }
        @media all and (max-width: 360px) {
            .a_wrapper{
                width: 300px;
            }
            .footer{
                height: 550px;
                padding-top: 20px;
                background: #CA054D;
                color: #fff;
                font-size: 15px;
            }
            .footer div:first-child{
                display: block;
            }
            .footer .a_title{
                /* 蓋過 footer 裡的 font-size */
                font-size: 20px;
                padding: 15px 0;
            }       
            .footer .a_block_1_1 li,
            .footer .a_block_1_2 li{
                padding-bottom: 10px;
            }
            .footer .a_block_1_2 img{
                margin-right: 5px;
            }
            .footer .a_block_2{
                display: block;
            }
            .footer .a_block_2 div:first-child img{
                margin-right: 20px;
                height: 20px;
            }
            .footer .a_block_2 img{
                margin-right: 0;
            }
            .footer .a_block_1_3{
                display: none;
            }
            .footer hr{
                width: 80%;
                margin: 25px 15px 20px ;
            }
            .footer .a_rwd_map{
                width: 100%;
                display: block;
                margin: 10px 0;
            }
        }
    </style>