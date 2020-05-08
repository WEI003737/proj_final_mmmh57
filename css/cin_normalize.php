<style>
/*============================= 共用 =================================*/
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.container{
    max-width: 1440px;
    margin: 0 auto;
}  
@media screen and (max-width: 360px){
.container{
    max-width: 350px;
}
}
.text-center{
    text-align: center;
}
.d-flex{
    display: flex;
}
h1{
    color: #ca054d;
    font-size: 90px;
    font-family:Lucida Sans;
    font-style: italic;
    font-weight: 600;
    margin:0px;
}
@media screen and (max-width: 360px){
h1{
   font-size: 45px;
}
}
@font-face{
    font-family: 'Lucida Sans';
    src:url(../font/Lucida\ Sans);
    font-style: italic;
}
h2{
    color: #272838;
    font-size: 50px;    
    margin: 10px auto; 
}
@media screen and (max-width: 360px){
h2{
   font-size: 40px;
   margin: 0px auto; 
}
}
/*============================= 主視覺 =================================*/
.coverTitle{
    top:50%;
    transform: translateY(-50%);
    position: absolute;
    left: 300px;
    animation: title 3s forwards;
}
@media screen and (max-width: 360px){
.coverTitle{
    left:15px;
    top:50%;
}
}
.cin_film{
    min-height: 100vh ;
    max-width: 1920px;
    position: relative;
    overflow: hidden; 
}
.cin_film img{
    display: block;
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    z-index: 1;
    mix-blend-mode:lighten;
    object-fit: cover;
    animation: mask 4s ease 2s forwards;
}
.cin_film video{
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    object-fit: cover;
}
#coverTitle{
    left: 150px;
    top:50%;
}
/*=====文字遮罩=====*/
.show_mobile{
    display: none !important;
        }

@media screen and (max-width: 360px){
    .show_desktop{
         display:none!important;
    }
    .show_mobile{
        display:block!important;
    }
}
svg.cover-title{
    left:0;
    top:0;
    width: 100%;
    height: 100%;
}
 line#desktopSlash {
    /* stroke-dasharray: 2000; */
    /* stroke-dashoffset: 2000; */
    animation: dash 2s 3s linear forwards;
}

line#mobileSlash {
    /* stroke-dasharray: 2000; */
    /* stroke-dashoffset: 2000; */
    animation: dash_mobile 2s 3s linear forwards;
}
@keyframes dash {
    to {
        stroke-dashoffset: 0;
    }
}
@keyframes dash_mobile {
    to {
        stroke-dashoffset: 0;
    }
}
@keyframes mask{
    0%{
        opacity: 1;
        transform: scale(1);
    }
    50%{
        opacity: 0;
        transform: scale(1.5);

    }
    100%{
        opacity: 0;
        transform: scale(1.5);
    }
}
@keyframes title{
    0%{
        opacity: 0;
    }
    70%{
        opacity: 0;
    }
    100%{
        opacity: 1;
    }
}
/*============================= 商品類 =================================*/
.cin_items{
    padding: 150px 0;
}
@media screen and (max-width: 650px){
    .cin_items{
        padding: 0;
    }
    }
@media screen and (max-width: 360px){
.cin_items{
    padding: 80px 0;
}
}
.cin_items_wrapper{
    position: relative;
}
@media screen and (max-width: 850px){
.cin_items_list{
    flex-wrap: wrap;
}
}
.cin_items ul{
    justify-content: center;
    margin-top: 50px;
}
@media screen and (max-width: 360px){
    .cin_items ul{
        margin-top: 20px;
    }
}
/* .cin_items_wrapper li{
    display: block;
    overflow: hidden;
} */
.cin_items li{
    max-width: 300px ; 
    list-style: none;
    position: relative;
    padding:10px; 
    cursor: pointer;
}
@media screen and (max-width: 360px){
    .cin_items li{
    max-width: 160px ; 
    padding:5px; 
    }
}
.cin_items_wrapper a{
    display: block;
    overflow: hidden;
}

.cin_test{
    position: relative;
    transition: .5s;
}
.cin_items li img{
    width: 100%; 
}
.cin_items_cover{
    position: absolute;
    top: 0px;
    left: 0px;
    background-color: rgb(255,255,255,.5);
    width: 100%;
    height: 100%;
}
.cin_items_wrapper a:hover .cin_test{
    transform: scale(1.1);
}
.cin_items li h1{
    position: absolute;
    font-size: 1.5rem;
    color: #ca054d;
    left: 50%;
    top:50%;
    transform: translate(-50%, -50%);
    z-index: 2;
}
@media screen and (max-width: 360px){
.cin_items li h1{
    font-size: 1rem;
}
}
.cin_items_rec{
    background: #ca054d;
    height: 50%;
    width: 100%;
    position: absolute;
    /* top: 13rem; */
    z-index: -1;
    bottom:0;
}
@media screen and (max-width: 360px){
    .cin_items_rec{
        bottom:25%;
        margin: 0;
    }
}
/*============================= 客製化 =================================*/
.cin_index_cust{
margin: 50px auto 200px;
max-height: 900px;
}
@media screen and (max-width: 360px){
    .cin_index_cust{
    margin: 0;
    max-height: 350px;
    }
}
.cin_index_custBox{
    position: relative;
    object-fit: cover;
    overflow: hidden;
    max-width: 750px;
    height: 1070px;
    margin: 0 auto;
}
@media screen and (max-width: 650px){
    .cin_index_custBox{
        height: 800px;
    }
}
@media screen and (max-width: 360px){
    .cin_index_custBox{
        height: 470px;
    }
}
.cin_index_custBox svg{
    width: 100%;
}

#yellow{
    animation: diversemove 5s ease-in-out infinite alternate;
    transform-origin: 54% center;
    transform-box: fill-box;
}
#red{
    animation: diversemove 3s ease-in-out infinite alternate;
    transform-origin: 54% center;
    transform-box: fill-box;
}
#pink{
    animation: pinkmove 3s ease-in-out infinite alternate;
}
#blue{
    animation: bluemove 4s infinite linear;
    transform-origin: 40% center;
    transform-box: fill-box;
}
@keyframes bluemove{
    100%{
        transform: rotate(-360deg);
    }
}
@keyframes pinkmove{
    from {
        transform: rotateX(0deg) rotateZ(0deg);
    }
    to {
        transform: rotateX(20deg) rotateZ(10deg);
    }
}
@keyframes diversemove{
    from {
        transform: rotate(0deg) rotateY(0deg);
    }
    to {
        transform: rotate(100deg) rotateY(40deg);
    }
}
#clothes, #bottomm{
    transition: .5s;
}
.cin_index_custBox a{
    text-decoration: none;
    color: #fff;
    background: #ca054d;
    padding: 15px 40px; 
    font-size: 18px;
}
@media screen and (max-width: 360px){
    .cin_index_custBox a{
        padding: 10px 25px; 
        font-size: 14px;
    }
}

/*============================= 關於我們 =================================*/
.cin_index_about{
    margin: 180px auto 0px;
}
.cin_index_about_wrapper{
    position: relative;
    width: 100%;
    height: 1000px;
}
.cin_yellowbox{
    position: absolute;
    width: 60%;
    height: 900px;
    background: #FFE07C;
    top:0;
    right: 0;
    z-index: -1;
}
@media screen and (max-width: 1224px){
.cin_yellowbox{
    height: 1100px;
}
}
@media screen and (max-width: 850px){
    .cin_yellowbox{
        height: 1000px;
        width: 100%;
    }
}
.cin_logo{
    max-width:120px;
    margin-bottom: 10px;
}
@media screen and (max-width: 360px){
    .cin_logo{
        max-width:90px;
        margin-bottom: 10px;    
    }
}
.cin_yellow_text{
    position: absolute;
    padding: 50px 0 0 0;
    width: 55%;
    height: 900px;
    right: 100px;
}
@media screen and (max-width: 850px){
    .cin_yellow_text{
        width: 70%;
        right: 100px;
    }
}
@media screen and (max-width: 360px){
    .cin_yellow_text{
        width: 80%;
        padding:0;
        right:10%;
        padding: 50px 0;
    }
}
.cin_yellow_text p{
    line-height: 28px;
    text-align: justify;
    margin-bottom: 40px;
}
.cin_index_hr{
    border: 0;
    height: 3px;
    background:#272838;
}
.cin_about_title{
    font-size: 3.5rem;
    color: #ca054d;
    font-family:Lucida Sans;
    font-style: italic;
    font-weight: 600;
    margin:20px 0;
}
@media screen and (max-width: 360px){
.cin_about_title{
    font-size: 2.5rem;
}
}
.cin_index_icon{
    max-width:500px;
}
.cin_index_icon img{
    width: 100%; 
    object-fit: cover;
}
.cin_index_about_pic{
    position: absolute;
    left: 0;
    bottom: 0;
    max-width: 53%;
    max-height: 700px;
}
@media screen and (max-width: 850px){
    .cin_index_about_pic{
        display: none;
    }
}
.cin_index_about_pic img{
    width: 100%;
    border:#fff solid 1.2rem;
    object-fit: cover;
}
</style>
