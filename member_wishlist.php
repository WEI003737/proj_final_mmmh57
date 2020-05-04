<?php
require_once('./checkSession.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>member_wishlist</title>
</head>

    <?php include __DIR__ . '/parts/h_f_css.php'; ?>
    <?php include __DIR__ . '/parts/h_f_link.php'; ?>      
    
<style>

* {box-sizing: border-box;
   font-family:sans-serif;}

.container{
    max-width: 1440px;
    margin: 0 auto;
} 

.member_left_list li{
    list-style: none;
    padding-top: 10px;
    padding-bottom: 50px;
}

.flex
{display: flex;}

.justify-content-cneter
{justify-content: center;}

.space-between
{justify-content:space-evenly}

.align-items-center
{align-items: center;}

 /* .text-align-center
{text-align: center;}  */

/* .text-align-justify
{text-align:justify} */

.flex-wrap
{flex-wrap: wrap;}

.j_eng_title{
    font-size: 36px;
    padding-right:30px;
    font-family:sans-serif;
}

.j_chinese_title{
    font-size: 36px;
}

.j_dashline{
border-bottom-style:dashed;
border-bottom-color:#272838;
border-width: 1px;
}


.j_buy_btn{
        width: 280px;
        height: 40px;
        background-color:#CA054D;
        color:white;
        text-align:center;
        border-style: hidden;
        margin: 30px;
        position: absolute;
        bottom: -12%;
     
    }
         
input{padding:15px 300px 15px 5px; border:2px #CA054D solid;
cursor:pointer; text-align:left;margin:30px auto;}

input:focus,textarea:focus,button:focus{
outline: none;
border: 2px solid #FFE07C;
}

.j_padb_100{padding-bottom: 100px;}
.j_padb_200{padding-bottom: 200px;}
.j_padt_100{padding-top:100px}

.j_wishlist_area{
    background-color:#FEF5EF;
    position: relative;
}

.j_whish_box{
    width: 250px;
    height: 355px;
    background-color: whitesmoke;
    margin: 15px;  
}

.flex_grow_2{
    flex-grow: 1;
}





</style>
<body>

    <?php include __DIR__ . '/parts/header.php'; ?>

    <div class="container">

        <div class="member_top_title "> 
            <div class="flex align-items-center justify-content-cneter j_padt_100">
                <p class="j_eng_title">My Whishlist</p>
                <p class="j_chinese_title ">我的收藏</p>
            </div>
            <P class="j_dashline"></P>
            <p class="flex justify-content-cneter j_padb_100">Trust me,you will love it!</p>
        </div>  

        <div class="flex justify-content-cneter j_padb_200">
                <div class="member_left_list col-md-2">
                    <ul>
                        <li class="leftlist_circle"><a href="member_information.php" >會員資料修改</a></li>
                        <li class="leftlist_circle"><a href="member_wishlist.php" style="color:#CA054D;">我的收藏</a></li>
                        <li class="leftlist_circle"><a href="member_order.php">訂單查詢</a></li>
                        <li class="leftlist_circle"><a>我的優惠卷</a></li>
                    </ul>
                </div>

                <div class="j_wishlist_area col-md-10 flex justify-content-cneter flex-wrap">
                

                    <div> 
                        <div class="j_whish_box"></div>
                        <p>Just perfect 運動內衣</p>
                        <div class="flex">
                            <p class="flex_grow_2">NT$2,280</p>
                            <div>黑</div>
                            <div>白</div>
                            <div>紅</div>
                        </div>
                    </div>

                    <div> 
                        <div class="j_whish_box"></div>
                        <p>Disco 運動內衣</p>
                        <p>NT$2,280</p>
                    </div>

                    <div> 
                        <div class="j_whish_box"></div>
                        <p>Erin 細肩帶運動內衣</p>
                        <p>NT$2,280</p>
                    </div>

                    <div> 
                        <div class="j_whish_box"></div>
                        <p>Veronica V領美背運動內衣</p>
                        <p>NT$2,280</p>
                    </div>

                    <div> 
                        <div class="j_whish_box"></div>
                        <p>Just perfect 運動內衣</p>
                        <p>NT$2,280</p>
                    </div>

                    <div> 
                        <div class="j_whish_box"></div>
                        <p>Just perfect 運動內衣</p>
                        <p>NT$2,280</p>
                    </div>

                    <div> 
                        <div class="j_whish_box"></div>
                        <p>Just perfect 運動內衣</p>
                        <p>NT$2,280</p>
                    </div>


                    <div> 
                        <div class="j_whish_box"></div>
                        <p>Just perfect 運動內衣</p>
                        <p>NT$2,280</p>
                    </div>



            

                    
                


                <button class="j_buy_btn" type="submit" formmethod="post" formaction="">繼續購物</button>  
                
                </div> 
                
        
        </div>    
        
    
        
    </div>








    <?php include __DIR__ . '/parts/footer.php'; ?>   
</body>
</html>
<?php include __DIR__ . '/parts/h_f_script.php'; ?>