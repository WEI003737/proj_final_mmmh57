<style>

.container{
    max-width: 1440px;
    margin: 0 auto;
} 


/* 上標題  */
.j_eng_title{
    font-size: 36px;
    padding-right:30px;
    font-family:sans-serif;
}

.j_chinese_title
{font-size: 36px;}

.j_dashline{
border-bottom-style:dashed;
border-bottom-color:#ccc;
border-width: 3px;
}

/* .mh13 {
color: rgba(255,255,255,1);
transition: all 0.5s;
position: relative;
border: 1px solid rgba(255,255,255,0.5);
overflow: hidden;
}

.mh13:before, .mh13:after{
content: '';
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
z-index: 1;
background-color: rgba(255,255,255,0.25);
transition: all 0.3s;
transform: translate(0,-100%);
transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
}
.mh13:after{
transition-delay: 0.2s;
}
.mh13:hover:before, .mh13:hover:after{
transform: translate(0,0);
} */


/* 分頁通用 */
.member_left_list,.member_left_list_totop{
    margin:30px;
    text-align:center;
}

.leftlist_underline{
    margin-bottom: 30px;
}

/* 桌機左標 */

.leftlist_underline:hover{
    border-left: #CA054D solid 5px ;
    color:#CA054D; 
    transition:0.3S;
}

 .member_left_list a{
    color:black;
    text-decoration:none;
}

.member_left_list a:hover{
    color:#CA054D;
    text-decoration:none;  
}

/* 手機上標 */

.member_left_list_totop a{
    color:black;
    text-decoration:none;
}

.member_left_list_totop a:hover{
    color:#CA054D;
    text-decoration:none;  
}

#member_left_list_totop{
    display: none;
    font-size:11px;}

/* {border-bottom:5px #CA054D solid; padding:3px;transition:0.5S} */

@media screen and (max-width: 700px){
    .j_eng_title{font-size: 18px;}
    .j_chinese_title,.j_eng_title2{font-size: 16px;}
    .j_dashline{border-width: 2px;}
    .member_left_list{display:none;}
    #member_left_list_totop{ display:block;}
}


/* padding */
.j_padb_100{padding-bottom: 100px;}
.j_padb_200{padding-bottom: 200px;}
.j_padb_50{padding-bottom: 50px;}
.j_padt_100{padding-top:100px;}
.j_padt_25{padding-top:25px;}
.j_padr_22{padding-right:22px;}
.j_padr_100{padding-right:100px;}

@media screen and (max-width: 700px){
    .j_padb_100{padding-bottom: 25px;}
    .j_padb_200{padding-bottom: 50px;}
    .j_padt_100{padding-top:25px}
}



</style>