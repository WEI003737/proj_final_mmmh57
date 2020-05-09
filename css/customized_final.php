@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
<style>
.container {
    max-width: 1400px;
    padding: 20px;
}

h2.nac {
    font-size: 4.5rem;
    padding: 0px;
    font-weight: 300;
}

h3.nac {
    font-size: 24px;
    font-weight: 300;
    margin-bottom: 5px;
}

h4.nac {
    font-size: 18px;
    font-weight: 300;
    margin-bottom: 5px;
}

h6.nac {
    font-size: .8rem;
    font-weight: 300;
    color: #adadad;
    padding: 0px;
}

p.nac {
    font-size: 15px;
    line-height: 2rem;
}

.nac_menu_reserve {
    height: 150px;
}

button:focus {
    outline: 1px solid rgb(230, 1, 85);
    transition: .5s;
}

/* 瞄點定位偏移 */

.nac_target_fix {
    position: relative;
    top: -160px;
    display: block;
    height: 0;
    overflow: hidden;
}

.nac_width100 {
    width: 100%;
}

/* 導航列預留 */

.nac_menu_reserve {
    height: 80px;
    margin-bottom: 15px;
}

@media all and (max-width: 768px) {
    .nac_menu_reserve {
        height: 120px;
    }
    .nac_onlymobile {
        display: block;
    }
    .nac_onlypc {
        display: none;
    }
}

@media all and (max-width: 360px) {
    .nac_menu_reserve {
        height: 60px;
    }
}

@media all and (min-width: 768px) {
    .nac_onlymobile {
        display: none;
    }
    .nac_onlypc {
        display: block;
    }
}

/*================================分隔線========================================*/

.nac_partingline {
    margin: 100px auto;
    height: 3px;
    max-width: 100px;
    background: rgb(202, 5, 77);
}

/* ========================主視覺(PC))========================================================================================= */

.nac_banner {
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Roboto', 'Noto Sans TC', sans-serif;
    position: relative;
    width: 100%;
    height: calc(100vh - 80px);
    /* background: rgb(238, 238, 238); */
    overflow: hidden;
    margin-bottom: 150px;
}

.nac_banner .nac_Colorblock {
    position: absolute;
    top: -150vh;
    right: 62vw;
    background: rgb(202, 5, 77);
    height: 300vh;
    width: 1920px;
    transform: rotate(25deg);
    transition: .5s;
    opacity: 0;
}

.nac_banner figure {
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: -1;
}

.nac_banner figure img {
    object-fit: cover;
    object-position: 70% top;
    width: 100%;
    height: 100%;
}

.nac_banner article {
    display: flex;
    color: #fff;
    justify-self: center;
    flex-direction: column;
    width: 1320px;
    margin: 60px;
    z-index: 1;
}

.nac_banner article h3 {
    font-size: 1.3rem;
    font-weight: 300;
    margin-bottom: 10px;
    opacity: 0;
}

.nac_banner article h2 {
    color: rgb(255, 255, 255, 0);
    font-size: 5rem;
    font-weight: bold;
    margin: 0px;
    overflow: hidden;
    position: relative;
}

.nac_banner_h2cover_box {
    position: absolute;
    overflow: hidden;
    top: 0px;
    left: 0px;
    width: 400px;
    height: 100%;
}

.nac_banner_h2cover {
    position: absolute;
    top: 0px;
    left: 0px;
    width: 400px;
    height: 100%;
    background-color: rgb(255, 255, 255, 0);
}

.nac_banner article p {
    font-size: 1.125rem;
    font-weight: 200;
    line-height: 2rem;
    opacity: 0;
}

.nac_go_customized_box {
    width: 150px;
    display: flex;
    flex-direction: column;
    align-items: center;
    opacity: 0;
}

.nac_customized_title_box {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-bottom: 90px;
    text-align: center;
    opacity: 0;
}

.nac_customized_title_box h2.nac {
    font-size: 36px;
    color: #272838;
}

a.nac_go_customized {
    font-size: 1.3rem;
    border-radius: 999px;
    border: 1px solid rgb(255, 255, 255, 1);
    color: rgb(255, 255, 255);
    background: rgb(202, 5, 77);
    width: 150px;
    margin-top: 40px;
    text-align: center;
    transition: .5s;
    padding: 15px 0px;
}

a.nac_go_customized:hover {
    color: rgb(202, 5, 77);
    background: #fff;
    box-shadow: 0px 5px 3px rgb(134, 10, 56);
    transform: translate(0px, -5px);
}

.nac_howtouse {
    opacity: .6;
    font-size: .9rem;
    transition: .5s;
    margin: 15px 5px
}

.nac_howtouse:hover {
    opacity: 1;
}

a.nac_btn {
    text-decoration: none;
}

a.nac_btn:hover {
    cursor: pointer;
}

/* ========================主視覺(mobile)================================================================================================================================================== */

@media all and (max-width: 768px) {
    .nac_banner {
        min-height: calc(100vh - 60px);
    }
    .nac_banner article {
        top: 5vh;
    }
    .nac_banner article h2 {
        font-size: 3rem;
    }
}

/* 主視覺(mobile)animation========================================================================================================================================================================== */

/* ========================MENU列表(PC)====================================================================================================================== */

.nac_customized_menu {
    transition: .5s;
}

.nac_customized_menu.nac_customized_menu_normal ul {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    transition: .5s;
}

.nac_customized_menu.nac_customized_menu_normal ul li {
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
}

.nac_customized_menu.nac_customized_menu_normal ul li a {
    /* line-height: 55px; */
    color: #272838;
    text-decoration-line: none;
    padding: 10px 30px;
    background: rgb(255, 255, 255);
    border-radius: 9999px;
    transition: .5s;
}

.nac_customized_menu.nac_customized_menu_normal ul li:nth-child(0):after, .nac_customized_menu.nac_customized_menu_normal ul li:nth-child(1):after, .nac_customized_menu.nac_customized_menu_normal ul li:nth-child(3):after, .nac_customized_menu.nac_customized_menu_normal ul li:nth-child(2):after {
    content: "/";
    padding: 0px 10px;
}

.nac_customized_menu.nac_customized_menu_normal ul li a:hover, .nac_customized_menu.nac_customized_menu_normal ul li a.active {
    background: #fff;
    color: rgb(202, 5, 77);
    cursor: pointer;
    box-shadow: rgb(202, 5, 77, .3) 0px 3px 5px;
    transform: translateY(-5px);
}

/* ---------------浮動MENU--------------------- */

.nac_customized_menu_fixeduse_outsidebox {
    position: fixed;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    bottom: -300px;
    width: 100%;
    z-index: 9999;
    transition: 1.5s;
    opacity: 0;
    padding: 1.5vw 2.5vw;
}

.nac_customized_menu_fixeduse_outsidebox.nac_scrolldown_menu {
    bottom: 15px;
    opacity: 1;
    transition: 1.5s;
}

/* --------------浮動MENU的頭------------------- */

.nac_customized_menu_fixeduse_head_box {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    font-weight: 600;
    font-size: .8rem;
    margin: 0px 0px 0px 15px;
    transition: .5s;
}

.nac_customized_menu_fixeduse_head_box:hover {
    cursor: pointer;
}

.nac_fixeduse_head_txt {
    width: 100%;
    border: 2px solid rgb(255, 255, 255, 0);
    text-align: center;
    border-radius: 0px;
    padding: 3px 10px;
    transition: .5s;
}

.nac_fixeduse_head_txt.nac_over_the_footer {
    background-color: #fff;
    border: 2px solid rgb(202, 5, 77);
    border-radius: 999px;
    transition: .5s;
}

.nac_customized_menu_fixeduse_head_box.nac_menu_open .nac_fixeduse_head_txt {
    color: rgb(202, 5, 77);
    transition: .5s;
}

.nac_customized_menu_fixeduse_head_icon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    height: 45px;
    width: 45px;
    background: rgb(202, 5, 77);
    border-radius: 50%;
    margin: 5px 0px;
    box-shadow: 0px 3px 4px#27283834;
    border: 2px solid #ffff;
    transition: .5s;
}

.nac_customized_menu_fixeduse_head_box.nac_menu_open .nac_customized_menu_fixeduse_head_icon {
    transform: translateY(7px) scale(.8);
    background: rgb(255, 255, 255);
    border: 3px solid rgb(202, 5, 77);
    box-shadow: 0px 0px 0px#27283800;
}

.nac_fixeduse_head_icon_menubar {
    height: 4px;
    width: 20px;
    margin: 2px 0px;
    border-radius: 999px;
    background: #ffff;
    transition: .5s;
}

.nac_fixeduse_head_icon_menubar:nth-child(1) {
    transform: translate(3.5px, 3.5px) rotate(225deg);
    width: 13px;
}

.nac_customized_menu_fixeduse_head_box.nac_menu_open .nac_fixeduse_head_icon_menubar:nth-child(1) {
    background-color: rgb(202, 5, 77);
    transform: translate(-.3px, 6.4px) rotate(45deg);
    width: 20px;
    height: 3px;
}

.nac_fixeduse_head_icon_menubar:nth-child(2) {
    transform: translate(-3.5px, -4.5px) rotate(-225deg);
    width: 13px;
    opacity: 1;
}

.nac_customized_menu_fixeduse_head_box.nac_menu_open .nac_fixeduse_head_icon_menubar:nth-child(2) {
    background-color: rgb(202, 5, 77);
    transform: translate(0px, 0px) rotate(45deg);
    width: 20px;
    height: 3px;
    opacity: 0;
}

.nac_fixeduse_head_icon_menubar:nth-child(3) {
    transform: translate(-.4px, -6.5px) rotate(270deg);
    width: 16px;
}

.nac_customized_menu_fixeduse_head_box.nac_menu_open .nac_fixeduse_head_icon_menubar:nth-child(3) {
    background-color: rgb(202, 5, 77);
    transform: translate(0px, -8px) rotate(-45deg);
    width: 20px;
    height: 3px;
}

/* ----------------浮動MENU的身體----------------- */

.nac_customized_menu.nac_customized_menu_fixeduse_body_box {
    overflow: hidden;
    transform: scalex(0);
    transform-origin: right;
}

.nac_customized_menu.nac_customized_menu_fixeduse_body_box.nac_menu_open {
    width: auto;
    border-radius: 9999px;
    background-color: #fff;
    box-shadow: 0px 1px 3px#27283873;
    padding: 3px 20px;
    transform: scaleY(1);
    transition: .5s;
}

.nac_customized_menu.nac_customized_menu_fixeduse_body_box ul {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    transition: .5s;
}

.nac_customized_menu.nac_customized_menu_fixeduse_body_box ul li a {
    color: #27283800;
    transition: .5s;
}

.nac_customized_menu.nac_customized_menu_fixeduse_body_box.nac_menu_open ul li a {
    border-bottom: 3px solid rgb(255, 255, 255);
    line-height: 55px;
    color: #272838;
    text-decoration-line: none;
    transform: translateY(-3px);
    padding: 3px 0px;
    margin: 0px 20px;
    transition: .5s;
}

.nac_customized_menu.nac_customized_menu_fixeduse_body_box.nac_menu_open ul li a.active {
    border-bottom: 3px solid rgb(202, 5, 77);
    color: rgb(202, 5, 77);
}

.nac_customized_menu.nac_customized_menu_fixeduse_body_box.nac_menu_open ul li a:hover {
    border-bottom: 3px solid rgb(202, 5, 77);
    color: rgb(202, 5, 77);
    cursor: pointer;
}

/* ========================MENU列表(mobile)================================================================================================= */

@media all and (max-width: 768px) {
    .nac_customized_menu ul li::after {
        content: "";
        padding: 0px 0px;
    }
}

/* ========================模板列表(PC)====================================================================================================================== */

.nac_customized_item h3.nac img {
    max-width: 30px;
    transform: translateY(-2px);
    margin-right: 5px;
}

.nac_customized_item div.nac_customized_item_area:last-child {
    border-bottom: .5px solid rgb(200, 200, 200);
}

.nac_customized_item_area {
    display: flex;
    border-top: .5px solid rgb(200, 200, 200);
    padding: 110px 0px 80px 0px;
    justify-content: center;
    opacity: 0;
}

/* 模板列表敘述 */

.nac_customized_item_description {
    display: flex;
    flex-direction: column;
    flex: 0.8 1 0;
    margin: 0px 100px 0px 0px;
}

.nac_customized_item_description p {
    padding: 20px 0px;
}

/* 商品部分 */

.nac_customized_item_box_outside {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    /* background-color: rgb(134, 10, 56, .5); */
    flex: 2 1 0;
}

.nac_customized_item_box_outside.customized_listus li {
    max-width: 33.333333%;
}

.nac_customized_item_box_outside.customized_detail li {
    max-width: 25%;
}

.nac_customized_item_box_outside a {
    /* max-height: 500px; */
    color: #272838;
    text-decoration: none;
}

.nac_customized_item_box {
    padding: 0px 20px;
    position: relative;
    transition: .5s;
}

.nac_customized_item_box_tg {
    position: absolute;
    top: 20px;
    left: -2px;
    color: #fff;
    background: rgb(202, 5, 77);
    z-index: 2;
    padding: 3px 6px;
    font-size: .5rem;
}

.nac_customized_item_box_outside figure {
    position: relative;
    overflow: hidden;
}

.nac_customized_item_box_outside figure img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: .8s;
    transform: scale(1);
    margin: 0px;
}

.nac_customized_item_box_cover {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    background: rgb(39, 40, 56, .7);
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: 1;
    transition: .5s;
    opacity: 0;
    color: #fff;
}

h6.customized_item_money {
    color: rgb(202, 5, 77);
}

.nac_customized_item_box_outside a:hover .nac_customized_item_box {
    /* transform: scale(1.1); */
    transform: translateY(-10px);
    z-index: 3;
}

.nac_customized_item_box_outside a:hover img {
    transform: scale(1.2);
    object-fit: cover;
}

.nac_customized_item_box_cover h6.nac {
    text-align: center;
}

.nac_customized_item_box_outside a:hover .nac_customized_item_box_cover {
    opacity: 1;
}

/* ========================模板列表(mobile)=========================== */

@media all and (max-width: 768px) {
    .nac_customized_title_box {
        margin: 0px 0px 50px 0px;
    }
    .nac_customized_item {
        margin-bottom: 0px;
    }
    .nac_customized_item_area {
        flex-direction: column;
    }
    .nac_customized_item_description {
        margin-right: 0px;
    }
    .nac_customized_item_description h3 {
        width: 100%;
    }
    .nac_customized_item_box_outside.customized_listus li, .nac_customized_item_box_outside.customized_detail li {
        max-width: 50%;
    }
    .nac_customized_item_box {
        padding: 3px;
        margin-bottom: 20px;
    }
    .nac_customized_item_bo_tg {
        display: none;
    }
    .nac_customized_item_box_outside a {
        display: inline;
    }
}

/* ========================流程_PC==================================================================================================================================== */

.nac_customized_help_info {
    padding-bottom: 0px;
}

.nac_customized_help {
    margin: 150px 0px 0px 0px;
    background-color: #fff;
    opacity: 0;
}

.nac_step {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 30px 0px;
    padding: 50px 0px;
}

.nac_customized_help_outbox div.nac_step:nth-child(even) {
    background: #f1f1f1;
}

.nac_step_number h2.nac {
    font-size: 180px;
    font-weight: 700;
    padding: 0px;
    margin: 0px;
    transform: translateY(-3px);
}

.nac_step_info {
    flex: 1 1 0;
    max-width: 400px;
    padding: 0px 40px;
}

.nac_step_info h2.nac {
    font-weight: 500;
    font-size: 4rem;
}

.nac_step figure {
    flex: 1 1 0;
    padding: 0px 60px;
}

.nac_step figure img {
    width: 100%;
}

/* ========================流程_mobile==================================================================================================================================== */

@media all and (max-width: 768px) {
    .nac_step {
        flex-direction: column;
    }
    .nac_step_number h2.nac {
        font-size: 160px;
    }
}

/*=====選單===================================================*/

.nac_customized_detail_menu {
    display: flex;
    color: #adadad;
    align-items: center;
}

.nac_customized_detail_menu img {
    max-width: 22px;
    transform: translateY(-1px);
}

.nac_customized_detail_menu a {
    text-decoration: none;
    color: rgb(202, 5, 77);
    align-items: center;
    justify-content: center;
    text-align: center;
}

.nac_customized_detail_menu li:first-child:after {
    content: "";
    margin: 0px 5px 0px 20px;
}

.nac_customized_detail_menu li::after {
    content: "/";
    margin: 0px 20px;
}

.nac_customized_detail_menu li:last-child {
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
    flex: 1 1 0;
}

.nac_customized_detail_menu li:last-child:after {
    content: "";
    margin: 0px 20px;
}

@media all and (max-width: 768px) {
    .nac_customized_detail_menu {
        width: 100%;
    }
    .nac_customized_detail_menu li::after {
        content: "/";
        margin: 0px 5px;
    }
}

/*=====最大外框===================================================*/

.customized_detail_desi {
    display: flex;
    margin-top: 0px;
    padding-top: 0px;
    /* margin-bottom: 100px; */
}

@media all and (max-width: 768px) {
    .customized_detail_desi {
        flex-direction: column;
        align-items: center;
    }
}

/*=====圖===================================================*/

.customized_detail_picture_outbox {
    flex: 1 1 0;
}

.customized_detail_picture {
    position: relative;
    width: 100%;
    align-items: center;
    border-radius: 15px;
    overflow: hidden;
}

.customized_detail_picture svg {
    position: absolute;
    width: 100%;
    left: 0px;
    top: 0px;
    transition: fill .5s;
}

.customized_detail_picture img {
    width: 100%;
}

#nac_item_pic_blend {
    position: absolute;
    width: 100%;
    left: 0px;
    top: 0px;
    mix-blend-mode: multiply;
    pointer-events: none;
}

#nac_item_pic_screen {
    position: absolute;
    width: 100%;
    left: 0px;
    top: 0px;
    mix-blend-mode: screen;
    pointer-events: none;
}

@media all and (max-width: 768px) {
    .customized_detail_picture {
        align-items: center;
        justify-content: center;
        width: 100%;
        margin-bottom: 30px;
        height: 100%;
    }
}

/*===========圖上的色盤================*/

.color-panel {
    /* background: #fff; */
    padding: 10px;
    border-radius: 10px;
    z-index: 11;
    display: none;
}

/* svg path:hover {
    fill-opacity: .8;
} */

path:hover {
    cursor: pointer;
    fill-opacity: .8;
}

.color_panel_pigment {
    position: absolute;
    border-radius: 50%;
    color: #fff;
    line-height: 40px;
    text-align: center;
    box-shadow: 0px 2px 4px #27283838;
    border: 2px solid #ffffff8c;
    transition: .5s;
}
.color_panel_pigment:hover{
    cursor: pointer;
    /* filter: contrast(150%); */
    border: 2px solid #fff;
    box-shadow: 0px 6px 4px #27283838;
    transform: translateY(-5px);
}

/*=====內容框===================================================*/

.customized_detail_main {
    flex: 1 1 0;
    padding: 0px 30px;
    display: flex;
    flex-direction: column;
    align-content: space-between;
    width: 100%;
}

/*=====標題===================================================*/

.customized_detail_itemtitle {
    border-left: 10px solid rgb(202, 5, 77);
    padding-left: 10px;
}

h2.nac.detail_itemtitle {
    font-size: 2.2rem;
    flex: 15 1 0;
    font-weight: 400;
    margin: 0px;
}

/*=====錢===================================================*/

.customized_detail_main h3.mony {
    color: rgb(202, 5, 77);
    font-weight: 500;
}

/*=====客製化顏色===================================================*/

.nac_chose_color {
    margin-top: 15px;
    align-items: center;
    justify-content: center;
}

.nac_chose_color_area {
    background: #fafafa;
    border-radius: 15px;
    padding: 10px;
    display: flex;
    margin-bottom: 15px;
    flex-wrap: wrap;
}

.nac_chose_color_area .nac_chose_color_btn {
    display: block;
    padding: 15px;
    border-radius: 50%;
    margin: 10px;
    border: 3px solid rgb(202, 5, 77, 0);
    transition: .5s;
}

.nac_chose_color_area .nac_chose_color_btn:hover {
    opacity: .8;
    cursor: pointer;
}

.nac_chose_color_btn_flot {
    display: block;
    padding: 15px;
    margin: 10px;
    border: 3px solid rgb(202, 5, 77, 0);
    transition: .5s;
}

.nac_chose_color_btn.active {
    border: 3px solid rgb(202, 5, 77);
    box-shadow: 0px 2px 3px rgba(85, 85, 85, 0.5);
}

/*=====選尺寸===================================================*/

.nac_chose_size {
    margin-top: 15px;
}

a.nac_sizechart:hover h6.nac_sizechart {
    cursor: pointer;
    font-size: .9rem;
}

h6.nac_sizechart {
    color: rgb(202, 5, 77);
    margin: 5px 0px;
    transition: .5s;
}

.nac_chose_size_box {
    display: flex;
}

.nac_chose_size_box li {
    padding: 5px 0px;
}

input.nac_size_btn {
    padding: 5px 25px;
    margin-right: 10px;
    background: #fff;
    text-align: center;
    border: 1px solid rgb(202, 5, 77);
    transition: .5s;
    text-decoration: none;
    color: rgb(202, 5, 77);
}

input.nac_size_btn:focus {
    outline: 1px solid rgb(230, 1, 85);
    transition: .5s;
}

input.nac_size_btn.active, input.nac_size_btn:hover {
    background: rgb(202, 5, 77);
    border: 1px solid rgb(202, 5, 77);
    color: #FFF;
}

/*=====選數量===================================================*/

.nac_chose_pieces {
    margin-top: 15px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.nac_chose_pieces_btn {
    background-color: rgb(202, 5, 77);
    border-radius: 0px;
    border: 0px solid;
    color: #fff;
    width: 40px;
    padding: 5px 0px;
}

.nac_chose_pieces_count {
    width: 100px;
    background-color: white;
    border: 0px solid;
}

/*=====購買按鈕===================================================*/

.nac_buynow {
    margin-top: 20px;
    display: flex;
}

.nac_chose_pieces_num {
    border: 1px solid rgb(202, 5, 77);
    ;
}

.nac_buynow button {
    background-color: rgb(202, 5, 77);
    color: #FFF;
    flex: 1 1 0;
    min-height: 55px;
    border: 0px;
}

.nac_buynow button:last-of-type {
    content: "";
    margin-left: 10px;
}

@media all and (max-width: 768px) {
    .customized_detail_main {
        padding: 0px;
    }
}

/*=====推薦商品===================================================*/

.customized_detail_more {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-bottom: 150px;
}

.customized_detail_more_title_box {
    text-align: center;
    margin-bottom: 60px;
}

/*================ 動畫=========================================================================================== */

.nac_go_customized_box_move {
    animation: nac_go_customized_box_move;
    animation-timing-function: cubic-bezier(.26, .26, .42, 1.01);
    animation-fill-mode: forwards;
    animation-duration: .8s;
    opacity: 0;
}

@keyframes nac_go_customized_box_move {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(-5px);
    }
}

a.nac_go_customized.nac_go_customized_lineAnimation {
    animation: nac_go_customized_lineAnimation;
    box-shadow: 0px 7px 6px rgba(92, 8, 39, .3);
    animation-iteration-count: infinite;
    animation-timing-function: ease-in-out;
    animation-duration: 4s;
}

@keyframes nac_go_customized_lineAnimation {
    0% {
        border: 1px solid rgb(255, 255, 255, .5);
        transform: translateY(-9px);
    }
    50% {
        border: 1px solid rgb(255, 255, 255, 1);
        transform: translateY(-3px);
    }
    100% {
        border: 1px solid rgb(255, 255, 255, .5);
        transform: translateY(-9px);
    }
}

.customized_title_movein {
    animation: customized_title_movein;
    animation-timing-function: cubic-bezier(.67, 0, 0, 1);
    animation-duration: 1s;
    animation-iteration-count: initial;
    animation-fill-mode: forwards;
}

@keyframes customized_title_movein {
    0% {
        transform: translate(-50px, 0px);
        opacity: 0;
    }
    100% {
        transform: translate(0px, 0px);
        opacity: 1;
    }
}

.nac_banner h2.nac.customized_title_changebacktow {
    animation: customized_title_changebacktow;
    color: rgb(202, 5, 77, 0);
    animation-timing-function: cubic-bezier(.55, 0, .31, 1.01);
    animation-duration: .5s;
    animation-iteration-count: initial;
    animation-fill-mode: forwards;
}

@keyframes customized_title_changebacktow {
    0% {
        color: rgb(202, 5, 77, 0);
    }
    50% {
        color: rgb(202, 5, 77, 0);
    }
    60% {
        color: rgb(202, 5, 77, .8);
    }
    100% {
        color: rgb(255, 255, 255, 1);
    }
}

.nac_banner_h2cover_move {
    transform-origin: left;
    animation: nac_banner_h2cover_move;
    animation-timing-function: cubic-bezier(.55, 0, .31, 1.01);
    animation-duration: .6s;
    animation-iteration-count: initial;
    animation-fill-mode: forwards;
}

@keyframes nac_banner_h2cover_move {
    0% {
        background-color: rgb(202, 5, 77, 1);
        transform: translateX(400px);
    }
    100% {
        background-color: rgb(202, 5, 77, 1);
        transform: translateX(-400px);
    }
}

/*banner色塊*/

.nac_banner .nac_Colorblock.nac_block_B {
    animation: nac_Color_block_animation_B;
    animation-timing-function: ease-in-out;
    animation-duration: 1s;
    animation-fill-mode: forwards;
}

@keyframes nac_Color_block_animation_B {
    0% {
        opacity: 0;
    }
    100% {
        /* right: 62vw; */
        opacity: .75;
    }
}

/*menu出現*/

.nac_customized_title_box.nac_customized_flotup_cansee, .nac_customized_menu ul li.nac_customized_flotup_cansee, .nac_customized_item_area.nac_customized_flotup_cansee, .nac_customized_help.nac_customized_flotup_cansee {
    animation: nac_customized_flotup_cansee;
    animation-duration: .8s;
    /* animation-fill-mode: forwards; */
}

.nac_customized_title_box.nac_animation_is_run, .nac_customized_menu ul li.nac_animation_is_run, .nac_customized_item_area.nac_animation_is_run, .nac_customized_help.nac_animation_is_run {
    opacity: 1;
}

@keyframes nac_customized_flotup_cansee {
    0% {
        transform: translateY(30px);
        opacity: 0;
    }
    100% {
        transform: translateY(0px);
        opacity: 1;
    }
}
</style>