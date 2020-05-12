<style>
/*============================= 共用 =================================*/
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
.space-center{
    justify-content: center;
}
.text-center{
    text-align: center;
}
.align-end{
    align-items: flex-end;
}
.cin_h4{
    color: #ca054d;
    margin: 15px 0;
    font-size:26px;
}
.cin_h2{
    color: #ca054d;
    font-size:35px;
}
.cin_h6{
    font-size:15px;
}
p{
    margin-bottom: 15px;
}
a{
    color: #4e4e4e;
}
a:hover{
    text-decoration: none;
    color: #ca054d;
}
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
/*============================= 內文 =================================*/
.cin_article_innertext_wrap{
    max-width: 900px;
    margin: 0 auto;
    padding:15px;
    background: #fff;
}
.cin_article_innertext_wrap a{
    margin: 0 5px 0 0;
}
.cin_article_titleDash{
    padding-left: 5px;
    border-left: #ca054d 3px solid;
    margin: 20px 0 10px;
}
@media screen and (max-width: 360px){
    .cin_article_titleDash{
    margin: 0px 0 10px;
    }
}
.cin_article_innertext_title{
    margin-bottom: 20px;
}
.cin_zoomImage{
    max-width:870px;;
    object-fit: cover;
    overflow:hidden;
    background-position: center center;
    background-repeat: no-repeat;
    margin-bottom: 40px;
    }
.cin_zoomImage img{
    width:100%;
}
/*============================= 返回頂部 =================================*/
#topBtn{
        position: fixed;
        top:90vh;
        width: 60px;
        height: 60px;    
        background: transparent;
        border: none;
        color:#ca054d;
        transform: translateX(900px);
        outline: none;
        z-index: 1000;
        right: 5%;
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
/*============================= 相關閱讀 =================================*/
#cin_article_innertext hr{
    margin: 50px auto 40px;
    border: 1.5px solid #ca054d;
    max-width: 1100px;
}
@media screen and (max-width: 360px){
    #cin_article_innertext hr{
    margin: 10px auto 20px;
    }
}
.cin_morearticle-wrap{
    max-width: 1200px;
    height: 350px;
    margin: 0 auto;
    padding: 0;
}
@media screen and (max-width: 360px){
    .cin_morearticle-wrap{
    height: 150vh;
    }
}
.cin_morearticle{
    max-width: 940px;
    margin: 20px auto;
}
.cin_morearticle_img{
    max-width: 300px;
    object-fit: cover;
    overflow:hidden;
    background-position: center center;
    background-repeat: no-repeat;
    margin: 10px;
}
.cin_morearticle_img img{
    width:100%;
    transition: .7s;
    filter: grayscale(90%);
}
@media screen and (max-width: 360px){
    .cin_morearticle_img img{
    filter:none;
    max-width: none;
    }
} 
figure:hover img{
    transform: scale(1.1);
    filter: grayscale(0%);
}
@media screen and (max-width: 360px){
    .cin_morearticle_img{
    max-width: none;
    }
}
</style>
