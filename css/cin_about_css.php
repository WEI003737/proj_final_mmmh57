<style>
/*============================= 共用 =================================*/

            body{
                margin: 0;
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
            .text-center{
                text-align: center;
            }
            .justify_between{
                justify-content: space-between;
            }
            h1{
                color: #ca054d;
                font-size: 60px;
                font-family:Lucida Sans Demibold Roman;
                font-style: Demibold Roman;
                font-weight: 600;
                margin:0px;
            }
            @media screen and (max-width: 360px){
            h1{
               font-size: 32px;
            }
            }
            @font-face{
                font-family: 'Lucida Sans Demibold Roman';
                src:url(../font/Lucida\ Sans);
                /* font-style:Demibold; */
            }
            h2{
                color: #272838;
                font-size: 40px;  
                margin: 0;
            }
            h3{
                color: #ca054d;
                font-size: 25px;  
            }
            @media screen and (max-width: 360px){
                h3{
                font-size: 18px;  
                }
            }
            p{
                color: #840032;
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

           .icon_show_mobile{
            display: none !important;
           }
           @media screen and (max-width: 936px){
                .icon_show_desktop{
                     display:none!important;
                }
                .icon_show_mobile{
                    display:block!important;
                }
            }

/*============================= 主視覺 =================================*/
        .cin_aboutBanner{
            height: 100vh;
            background: url(./img/aboutBanner.png);
            background-size: cover;
            position:relative;
        }
        .cin_aboutBanner_mobile{
            height: 100vh;
            background: url(./img/aboutBanner_mobile.png);
            background-size: cover;
            position:relative;
        }
        .cin_boxR{
            border-right:2px solid #ca054d;
            border-top:2px solid #ca054d;
            width: 475px;
            height: 140px;
            position: absolute;
            right: 0;
            margin: 50px 50px 0 0 ;
        }
        @media screen and (max-width: 360px){
            .cin_boxR{
                width: 170px;
                height: 30px; 
                margin: 25px 25px 0 0 ;
            }
        }
        .cin_boxL{
            border-left:2px solid #ca054d;
            border-bottom:2px solid #ca054d;
            width: 475px;
            height: 140px;
            position: absolute;
            left: 0;
            bottom: 0;
            margin: 0 0 50px 50px ;
        }
        @media screen and (max-width: 360px){
            .cin_boxL{
                width: 170px;
                height: 30px;
                margin: 0 0 25px 25px ;
            }
        }
        .cin_about_rightsideText{
            font-size: 2.5rem;
            /* -webkit-text-stroke:1.3px #ca054d; */
            text-shadow: 0 0 2px red, 0 0 5px purple;
            color:#eee;
            position: absolute;
            right: 0;
            top:52%;
            right: -130px;
            transform: rotate(90deg);
            margin: 10px;
        }
        @media screen and (max-width: 360px){
            .cin_about_rightsideText{
                -webkit-text-stroke:1px #ca054d;
                font-size: 2rem;
                top:30%;
                right: -116px;
            }
        }
        .cin_aboutTextWrapper p{
            padding: 10px;
        }
        .cin_aboutLogo img{
            width: 160px;
            padding: 10px;
            margin-right: 15px;
        }
        @media screen and (max-width: 1010px){
            .cin_aboutLogo img{
                width: 130px;
                padding: 5px;
            }
        }
        @media screen and (max-width: 725px){
            .cin_aboutLogo img{
               display: none;
            }
        }
        @media screen and (max-width: 360px){
            .cin_aboutLogo img{
               display: block;
               width: 80px;
               margin: 10px auto;
            }
        }
        .cin_aboutTextWrapper{
            position: absolute;
            width: 55%;
            top: 40%;
            left: 25%;
        }
        @media screen and (max-width: 1010px){
            .cin_aboutTextWrapper{
                position: absolute;
                width: 70%;
                top: 35%;
                left: 15%;
            }
        }
        @media screen and (max-width: 825px){
            .cin_aboutTextWrapper{
                position: absolute;
                width: 75%;
                top: 35%;
                left: 15%;
            }
        } @media screen and (max-width: 360px){
            .cin_aboutTextWrapper{
                /* position: absolute; */
                width: 64%;
                top: 10%;
                left: 20%;
            }
        }
        .cin_aboutTextWrapper p{
            margin: 0;
        }
/*============================= 理念 =================================*/
.cin_sustain{
    height: 125vh;
    position: relative;
    max-width: 1920px;
}
@media screen and (max-width: 1300px){
    .cin_sustain{
        height: 110vh;
}
}
@media screen and (max-width: 970px){
    .cin_sustain{
        height: 100vh;
}
}
@media screen and (max-width: 800px){
    .cin_sustain{
        height: 86vh;
}
}@media screen and (max-width: 360px){
    .cin_sustain{
        height: 130vh;
}
}
.cin_sustain_wrapperA{
    height: 900px;
    position: relative;
    margin-top:200px;
}
@media screen and (max-width: 970px){
    .cin_sustain_wrapperA{
    margin-top:100px;
}
}
@media screen and (max-width: 360px){
    .cin_sustain_wrapperA{
    margin-top:0;
}
}
.cin_sustain_rec{
   width: 100%;
   top:57%;
   position: absolute;
}
@media screen and (max-width: 970px){
.cin_sustain_rec{
    height: 250px;
}
}
@media screen and (max-width: 800px){
.cin_sustain_rec{
    height: 300px;
    top:47%;
}
}
@media screen and (max-width: 360px){
.cin_sustain_rec{
    top:37%;
    height: 50%;
}
}
.cin_sustainTitle{
    top:54%;
    position: absolute;
    margin-left: 20%;
}
@media screen and (max-width: 996px){
    .cin_sustainTitle{
        margin-left: 0;
    }
}
@media screen and (max-width: 800px){
    .cin_sustainTitle{
        top:43%;
    }
}
.cin_sustainTitle h1{
    line-height: 40px;
}
@media screen and (max-width: 800px){
    .cin_sustainTitle h1{
        font-size:50px;
    }
}
@media screen and (max-width: 360px){
    .cin_sustainTitle{
        top:35%;
    }
}
.cin_sustain_wrapperB{
    max-width: 1100px;
    margin: 100px auto;
}
@media screen and (max-width: 1300px){
    .cin_sustain_wrapperB{
    max-width: 1000px;
    }
}
@media screen and (max-width: 970px){
    .cin_sustain_wrapperB{
    max-width: 900px;
    }
}
@media screen and (max-width: 360px){
    .cin_sustain_wrapperB{
        margin: 40px auto;
    }
}
.cin_sustain .cin_sustain_wrapperB img{
    max-width: 500px;
    max-height: 650px;
}
@media screen and (max-width: 1300px){
    .cin_sustain .cin_sustain_wrapperB img{
    max-width: 400px;
    max-height: 550px;
}
}
@media screen and (max-width: 970px){
    .cin_sustain .cin_sustain_wrapperB img{
    max-width: 300px;
    max-height: 450px;
}
}
@media screen and (max-width: 800px){
    .cin_sustain .cin_sustain_wrapperB img{
    max-width: 200px;
    max-height: 350px;
    object-fit:cover;
}
}
@media screen and (max-width: 360px){
    .cin_sustain .cin_sustain_wrapperB img{
        max-width: 100px;
        max-height: 350px;
        object-fit:cover;
    }
}
.cin_sustain_mind{
    max-width:500px;
    margin: 15% 0;
    z-index: 1;
}
@media screen and (max-width: 800px){
    .cin_sustain_mind{
        margin: 10% 0;
    }
}
@media screen and (max-width: 360px){
    .cin_sustain_mind{
        max-width:200px;
        margin: 0 10px;
    }
}
.cin_sustain_wrapperC{
    max-width: 1100px;
    margin: -570px auto;
}

.cin_sustain .cin_sustain_wrapperC img{
    max-height: 700px;
    z-index: 100;
}
@media screen and (max-width: 1300px){
    .cin_sustain .cin_sustain_wrapperC img{
        max-height: 600px;
    }
}
@media screen and (max-width: 970px){
    .cin_sustain .cin_sustain_wrapperC img{
        max-height: 500px;
    }
}
@media screen and (max-width: 800px){
    .cin_sustain .cin_sustain_wrapperC img{
        display:none;
    }
}
.cin_sustain_wrapperC .cin_sustain_mind p{
color:#eee;
margin-top: 100px;
}
@media screen and (max-width: 360px){
    .cin_sustain_wrapperC .cin_sustain_mind p{
        width: 300px;
        margin: 120px 30px;
    }
}
/*============================= 團隊 =================================*/
.cin_team{
    height: 140vh;
}
.cin_teamTitles{
    margin: 70px auto;
}
@media screen and (max-width: 360px){
    .cin_teamTitles{
        margin: 30px auto;
    }
}
.cin_hLine{
    width: 100px;
    height: 4px;
    background: #ca054d;
    margin: 30px auto;
}
.cin_team_box{
    max-width: 1440px;
    height:480px;
    background: #FDF4ED;
    padding: 80px;
    margin-bottom:200px;
}
@media screen and (max-width: 740px){
    .cin_team_box{
        height:580px;
    }
}
@media screen and (max-width: 580px){
    .cin_team_box{
        height:680px;
    }
}
@media screen and (max-width: 360px){
    .cin_team_box{
        padding: 30px;
        height:110vh;
        margin-bottom:60px;
    }
}
.cin_teamPara{
    max-width: 1100px;
    margin-bottom:100px;
}
@media screen and (max-width: 936px){
    .cin_teamPara{
        margin-bottom:0px;
}
}
@media screen and (max-width: 360px){
    .cin_teamPara{
    margin-bottom:60px;
}
}
@media screen and (max-width: 360px){
    .cin_team_box .cin_teamPara p{
        width: 280px;
        margin: 0 auto;
    }
}
.cin_team_box li{
    list-style: none;
    margin-bottom: 10px;
}
.cin_team_icons a{
    margin:5px;
}
</style>