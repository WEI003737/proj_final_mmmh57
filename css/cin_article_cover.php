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
.text-center{
    text-align: center;
}
.d-flex{
    display: flex;
}
.cin_articleCover_titlewrap h1{
    color: #ca054d;
    font-size: 80px;
    font-family:Lucida Sans;
    font-style: italic;
    font-weight: 600;
    margin:0px;
    text-decoration:underline #FEE07C;
}
@media screen and (max-width: 1000px){
    .cin_articleCover_titlewrap h1{
   font-size: 70px;
}
}
@media screen and (max-width: 640px){
    .cin_articleCover_titlewrap h1{
   font-size: 50px;
}
}
@media screen and (max-width: 360px){
    .cin_articleCover_titlewrap h1{
   font-size: 45px;
}
}
@font-face{
    font-family: 'Lucida Sans';
    src:url(../font/Lucida\ Sans);
    font-style: italic;
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

/*============================= 主視覺 =================================*/
.cin_articleCover{
    width:100%;
    height:110vh;
    background: #FDF4ED;
}
@media screen and (max-width: 360px){
    .cin_articleCover{
    height:100vh;
}
}
.coverTitle{
    top:30%;
    left: 37%;
    position: absolute;
}
@media screen and (max-width: 1000px){
    .coverTitle{
        top:33%;
        z-index: 3;
    }
    }
@media screen and (max-width: 360px){
.coverTitle{
    left:20%;
    top:37%;
}
}
.cin_articleCover_titlewrap a{
    color: #ca054d;
    border: 3px solid #ca054d;
    padding: 10px 30px;
    border-radius: 30px 30px 30px 30px;
    top:58%;
    left: 51%;
    position: absolute;
    margin: 20px 0px;
    text-decoration: none;
    transition: .5s;
}
.cin_articleCover_titlewrap a:hover{
    background: #ca054d;
    color: #FDF4ED;
}
@media screen and (max-width: 640px){
    .cin_articleCover_titlewrap a{
        top:50%;
    }
} 
@media screen and (max-width: 360px){
    .cin_articleCover_titlewrap a{
        top:60%;
        left: 60%;
        padding: 10px 20px;
    }
    .cin_articleCover_titlewrap h6{
        font-size: 12px;
        margin: 0;
    }
} 
.cin_zoomImage_a{
    max-width:400px;
    object-fit: cover;
    overflow:hidden;
    background-position: center center;
    background-repeat: no-repeat;
    position: absolute;
    left: 75%;
    top:5%;
}
@media screen and (max-width: 360px){
    .cin_zoomImage_a{
    max-width:150px;
    left: 58%;
    }
} 
.cin_zoomImage_a img{
    width: 100%;
    transition: .5s;
}
.cin_articleCover a:hover img{
    transform: scale(1.1);
}
.cin_items_cover h1{
    position: absolute;
    font-size: 1.5rem;
    color: #ca054d;
    left: 50%;
    top:50%;
    transform: translate(-50%, -50%);
    z-index: -1;
}
.cin_articleCover .cin_items_cover:hover h1{
    z-index: 2;
}
.cin_articleCover a:hover .cin_items_cover{
    position: absolute;
    top: 0px;
    left: 0px;
    background-color: rgb(255,255,255,.5);
    width: 100%;
    height: 100%;
}   

.cin_zoomImage_b{
    max-width:350px;
    object-fit: cover;
    overflow:hidden;
    background-position: center center;
    background-repeat: no-repeat;
    position: absolute;
    left: 5%;
    top:15%;
}
@media screen and (max-width: 1200px){
    .cin_zoomImage_b{
    max-width:300px;
    }
    }
@media screen and (max-width: 1000px){
    .cin_zoomImage_b{
    max-width:270px;
    top:8%;
    }
    }
@media screen and (max-width: 640px){
    .cin_zoomImage_b{
    max-width:220px;
    top:4%;
    }
    }   
@media screen and (max-width: 360px){
    .cin_zoomImage_b{
    max-width:130px;
    top:12%;
        }
        }              
.cin_zoomImage_b img{
    width: 100%;
    transition: .5s;
}
.cin_zoomImage_b:hover .cin_items_cover{
    position: absolute;
    top: 0px;
    left: 0px;
    background-color: rgb(255,255,255,.5);
    width: 100%;
    height: 100%;
}   
.cin_zoomImage_b:hover .cin_items_cover h1{
    z-index: 2;
}
.cin_zoomImage_c{
    max-width:450px;
    max-height: 280px;
    object-fit: cover;
    overflow:hidden;
    background-position: center center;
    background-repeat: no-repeat;
    position: absolute;
    left: 58%;
    top:68%;
}
@media screen and (max-width: 360px){
    .cin_zoomImage_c{
    left: 48%;
    top:75%;
        }
        }  
.cin_zoomImage_c img{
    width: 100%;
    transition: .5s;
}
.cin_articlecover_hash{
    width: 100px;
    position: absolute;
    left: 65%;
    top:10%;
}
.cin_articlecover_hash a:hover{
    text-decoration:underline #FEE07C;
}
.cin_articlecover_hash h5{
    color: #ca054d;
    line-height: 30px;
}
.cin_article_hashB{
    width: 200px;
    position: absolute;
    left: 27%;
    top:72%;
}
@media screen and (max-width: 640px){
    .cin_article_hashB{
        top:60%;
        left: 23%;
    }
}  
@media screen and (max-width: 360px){
    .cin_article_hashB{
        top:70%;
        left: 13%;
    }
}    
.cin_article_hashB h5{
    color: #ca054d;
    line-height: 30px;
    font-family:Lucida Sans;
    font-style: italic;
}
@media screen and (max-width: 360px){
    .cin_article_hashB h5{
        font-size: 12px;
        line-height: 13px;
    }
}
/*=====文字遮罩=====*/
svg.cover-title{
    left:0;
    top:0;
    width: 100%;
    height: 100%;
}
 line#desktopSlash {
    stroke-dasharray: 1000;
    stroke-dashoffset: 1000;
    animation: dash 1s 1s linear forwards;
}
@media screen and (max-width: 1200px){
    line#desktopSlash{
    display: none;
    }
    }
line#mobileSlash {
    stroke-dasharray: 2000;
    stroke-dashoffset: 2000;
    animation: dash_mobile .5s 1s linear forwards;
}
@keyframes dash {
    to {
        stroke-dashoffset: 1;
    }
}
@keyframes dash_mobile {
    to {
        stroke-dashoffset: 0;
    }
}
</style>

