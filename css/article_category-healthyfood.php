<style>
/*============================= 共用 =================================*/
.cin_articleCategory_body{
    max-width: 100%;
    height: 190vh;
}
@media screen and (max-width: 1112px){
    .cin_articleCategory_body{
    height: 370vh;
}
}
@media screen and (max-width: 750px){
    .cin_articleCategory_body{
    height: 440vh;
}
}
@media screen and (max-width: 360px){
    .cin_articleCategory_body{
    height: 490vh;
}
}
.container{
    max-width: 1440px;
    margin: 0 auto;
    padding: 0;
} 
.d-flex{
    display: flex;
}
.space-between{
    justify-content: space-between;
}
h5{
    font-size: 1.2rem;
}
.text-align{
    text-align: center;
}
h5, .cin_h1{
    margin-bottom: 0;
}
.cin_h1{
    color:#ca054d;
    font-size:40px;
}
a{
    color: #4D4D4D;
}
a:hover{
    text-decoration: none;
}
.show_mobile{
    display: none !important;
        }
.show_750{
    display: none !important;
}
@media screen and (max-width: 360px){
    .show_desktop{
    display:none!important;
   }  
   .show_desktop_1{
    display:none!important;
   }
   .show_mobile{
    display:block!important;
}
}
@media screen and (max-width: 750px){
    .show_desktop{
        display:none!important;
   }  
    .show_750{
        display: block !important;
    }
}

/*============================= 分類標籤 =================================*/
.cin_articleCategory_head{
    max-width: 100%;
    background: #fff;
    align-items: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    display: flex;
}
@media screen and (max-width: 360px){
    .cin_articleCategory_head{
    max-width: 360px;
    }
}
.cin_p_w{
    margin: 10px;
    padding: 0;
}
@media screen and (max-width: 360px){
    .cin_p_w{
        margin: 10px 45px;
    }
}
.cin_p_w a{
    text-decoration: none;
    text-transform: uppercase;
    color: #ca054d;
    border: 2px solid #ca054d;
    padding: 10px 20px; 
    box-sizing: border-box;
    overflow: hidden;
    position: relative;
    margin: 10px;
}
@media screen and (max-width: 360px){
    .cin_p_w a{
    padding: 5px;
    margin: 5px;
    font-size: 12px;
    
    }
}
 .cin_p_w a::before{
    content: attr(data-title);
    position: absolute;
    top:100%;
    left:0;
    background: #ca054d;
    color: #fff;
    padding: 10px 20px;
    box-sizing: border-box;
    transition: .3s;
}
@media screen and (max-width: 360px){
    .cin_p_w a::before{
    padding: 0px;
    }
}
.cin_p_w a::after {
    content: attr(data-title);
    position: absolute;
    top:0;
    left:0;
    background: #fff;
    color: #ca054d;
    padding: 10px 20px;
    box-sizing: border-box;
    transition: .3s;
}
@media screen and (max-width: 360px){
    .cin_p_w a::after{
    padding: 0px;
    }
}
.cin_p_w a:hover::before{
    top:0;  
}
.cin_p_w a:hover::after{
    top:-100%;  
}  
 
/*============================= 文章列表 =================================*/
.cin_articleCategory_bread{
    max-width: 1920px;
    height: 60px;
    align-items: center;
    display: flex;
}
.cin_articleCategory_bread p{
    margin-top: 10px;
    margin-left: 10px;
}
.cin_articleCategory_main_L{
    width: 1100px;
    height: 180vh;
    display: flex;
    flex-wrap: wrap;
}
@media screen and (max-width: 1112px){
    .cin_articleCategory_main_L{
    width: 800px;
    }
}
@media screen and (max-width: 360px){
    .cin_articleCategory_main_L{
    height: 380vh;
    width: 360px;
    }
}
.cin_article_card{
    max-width: 480px;
    height: 470px;
    border:1.5px solid #d1d1d1;
    margin: 30px 20px;
    margin-bottom: 30px;
    padding: 10px;
    position: relative;
}
@media screen and (max-width: 1416px){
    .cin_article_card{
    max-width: 440px;
    height: 430px;
    }
    } 
@media screen and (max-width: 1308px){
    .cin_article_card{
    max-width: 380px;
    height: 400px;
    margin: 30px 15px;
    }
    } 
@media screen and (max-width: 1120px){
    .cin_article_card{
    max-width: 340px;
    height: 400px;
    margin: 30px 15px;
    }
    }   
    @media screen and (max-width: 1112px){
    .cin_article_card{
    max-width: 480px;
    height: 470px;
    margin: 30px 15px;
    }
    }
    @media screen and (max-width: 360px){
        .cin_article_card{
        max-width: 320px;
        height: 360px;
        margin: 10px 15px;
        }
        }               

.cin_article_card_img{
    max-width: 480px;
    position: relative;
}
.cin_article_card_img img {  
    max-width: 100%; 
}
.cin_article_card_titleDash{
    max-width: 430px;
    height: 24px;
    margin: 30px auto 10px;
    padding-left: 5px;
    border-left: #ca054d 3px solid;
}
.cin_article_card_parag{
    max-width: 430px;
    height: 50px;
    margin: 10px auto 25px;
}
.cin_article_card_date{
    max-width: 430px;
    height: 20px; 
    margin: 0 auto;
}
@media screen and (max-width: 360px){
    .cin_article_card h5{
    font-size: 1rem;
    }
    }
/*============================= hover效果 =================================*/
.cin_article_card a{
    color: #4D4D4D;
}
.cin_article_card a:hover{
    text-decoration: none;
    color: #4D4D4D;
}
.cin_article_card:hover{
    box-shadow: 5px 5px 5px rgba(117, 117, 117, 0.5);
    transition: .3s;
    animation:cin_article_card_animate;
    animation-duration: 2s;
    animation-iteration-count: infinite;
    animation-timing-function: ease-in-out;
}
@keyframes cin_article_card_animate {
        0% {
            transform: translateY(-0px);
        }

        50% {
            transform: translateY(-3px);
        }

        100% {
            transform: translateY(-0px);
        }
    }
/*============================= 人氣文章 =================================*/
.cin_articleCategory_main_R{
    width:380px;
    max-height: 660px;
    background: #FDF4ED;
    margin-top: 30px;
}
@media screen and (max-width: 1112px){
    .cin_articleCategory_main_R{
    width:500px;
    }
    }  
@media screen and (max-width: 750px){
    .cin_articleCategory_main_R{
    margin-top: 175vh;
    height: 700px;
    }
    }
@media screen and (max-width: 360px){
    .cin_articleCategory_main_R{
    margin-top: 0vh;
    width: 360px;
    }
    }    
.cin_articleCategory_main_R_wrap{
    padding: 50px 25px;
    height: 170vh;
}
@media screen and (max-width: 750px){
    .cin_articleCategory_main_R_wrap{
    height: 80vh;
    }
}
@media screen and (max-width: 360px){
    .cin_articleCategory_main_R_wrap{
        padding: 10px;
        height: 100vh;
        width:360px;
    }
}
.cin_articleCategory_main_R_text{
    margin: 40px 0 0;
    align-items: center;
}
hr{
    margin: 10px;
    border: 1px solid #818181;
}
.cin_articleCategory_main_R a:hover h5{
    color: #ca054d;
}
.cin_articleCategory_main_R .show_mobile .cin_hotarticle{
    color: #ca054d;  
}
.cin_hotarticle p{
    color: #ca054d;  
    font-size: 40px;
    text-align: center;
}
/*============================= 頁碼 =================================*/
.cin_product_list_page{
    margin: 30px 30px 90px 0;
    justify-content: center;
}
@media screen and (max-width: 750px){
    .cin_product_list_page{
    margin: 0px 0px 0px 270px;
}
}
@media screen and (max-width: 360px){
    .cin_product_list_page{
    margin: 0px 0px 0px 90px;
}
}
.cin_product_list_page a{
    margin-left: 20px;
}
/*============================= 返回頂部 =================================*/
#topBtn{
    position: fixed;
    top:70vh;
    width: 60px;
    height: 60px;    
    background: transparent;
    border: none;
    color:#ca054d;
    transform: translateX(800px);
    outline: none;
    z-index: 1000;
    right:100px;
}
#topBtn i{
    background: #fff;
    border-radius: 50%;
}
#topBtn_M{
    color:#ca054d;
    margin-left: 80%;
    margin-bottom: -10%;
    background: transparent;
    border: none;
    outline: none;

}
</style>