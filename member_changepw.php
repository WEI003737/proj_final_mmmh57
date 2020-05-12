<?php
require __DIR__. '/__connect_db.php';


$rowss = [];
$sql = "SELECT * FROM members where email='" . $_SESSION['loginUser'] . "'";
$stmt = $pdo->query($sql);
$rowss = $stmt->fetchAll();

//echo json_encode($rows, JSON_UNESCAPED_UNICODE);
//echo json_encode($rows[0]['selffie'], JSON_UNESCAPED_UNICODE)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>member_information</title>
</head>

<?php include __DIR__ . '/parts/h_f_css.php'; ?>
<?php include __DIR__ . '/css/member_css.php'; ?>
<?php include __DIR__ . '/parts/h_f_link.php'; ?>
   
<style>
body{
    font-family: 'Noto Sans TC', sans-serif;
}
.header a{
    color:#333;
}
a, a:hover{
    text-decoration: none;
}
.inputcss_information_changepw{padding:0px 100px 0px 5px; border:2px #CA054D solid;
cursor:pointer; text-align:left;margin:0px auto 10px;}

 input:focus,textarea:focus,button:focus{
    outline: none;
    border: 1.5px solid  #FFE07C;
} 

.form_changepw_position{
   left:20%;
   position:relative;
}

.j_storage_btn_changepw{
    position:absolute;
    left:25%;
    font-size:16px;
    color:white;
    background: #CA054D;
    width:100px;
    height:33px;
    border-radius:15px;
    margin:5px; 
    text-align:center;
    border-style: hidden;
}

.j_storage_btn_changepw:hover {
    color: rgb(202, 5, 77);
    background: #fff;
    box-shadow: 0px 5px 3px rgb(134, 10, 56);
    transform: translate(0px, -2px);
} 

.j_p_font-size{font-size:8px}



@media screen and  (max-width: 780px){
.inputcss_information_changepw{
    padding:0px 55px 0px 5px; 
    margin:0px auto 10px;
    }
.form_changepw_position{left:3%;} 
.j_storage_btn_changepw{left:40% ;}
.j_push{padding-bottom:15vh}
.j_length{width:280px}

}


</style>
<body>


<?php include __DIR__ . '/parts/header.php'; ?>

<div class="container">
<!-- 推出 header 空間-->
<div class="a_push_place"></div>

<!-- 手機 (左側標換到上方) -->
<div id="member_left_list_totop" >
       <ul class="member_left_list_totop d-flex justify-content-between">
            <li class="leftlist_underline"><a href="member_information_card_noflipnew.php" >會員資料修改</a></li>
            <li class="leftlist_underline"><i class="fas fa-key"></i><a style="color:#CA054D;">密碼修改</a></li>
            <li class="leftlist_underline"><a href="member_wishlist.php" >我的收藏</a></li>
            <li class="leftlist_underline"><a href="member_order.php" >訂單查詢</a></li>
            <li class="leftlist_underline"><a href="member_coupon.php" >我的優惠卷</a></li>
        </ul>
</div>


<div class="member_top_title j_padt_50"> 
    <div class="d-flex align-items-center justify-content-center ">
        <p class="j_eng_title">My Password</p>
        <p class="j_chinese_title ">密碼修改</p>
    </div>
    <P class="j_dashline"></P>
</div>  


<div class="d-flex justify-content-center j_padb_100">
        
      
        <ul class="member_left_list col-lg-2 ">
            <li class="leftlist_underline"><a href="member_information_card_noflipnew.php" >會員資料修改</a></li>
            <li class="leftlist_underline"><i class="fas fa-key"></i><a style="color:#CA054D;">密碼修改</a></li>
            <li class="leftlist_underline"><a href="member_wishlist.php" >我的收藏</a></li>
            <li class="leftlist_underline"><a href="member_order.php" >訂單查詢</a></li>
            <li class="leftlist_underline"><a href="member_coupon.php" >我的優惠卷</a></li>
        </ul>
     
        

        <div class=" j_padt_50  col-lg-10  form_changepw_position" >
            <div class="j_formwrap">
            <form class="d-flex flex-column"  name="form_changepw" method="post"  onsubmit="return checkform_changepw()" >
            
                    <div>
                        <input class="inputcss_information_changepw" type="password" id="pw1" name="pw1" placeholder="新密碼" value=""  required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}"   />
                    </div>
                    <div>
                        <input class="inputcss_information_changepw" type="password" id="pw2" name="pw2" placeholder="再輸入一次" value="" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}"  />
                    </div>

                    <p class="j_p_font-size j_length ">*必須包含5個或更多字符，至少包含一個數字，以及一個大寫和小寫字母 </p>
                    <div><button class="j_storage_btn_changepw" type="submit" >儲存變更</button></div>
                
            </form> 
            </div>
        </div>
             
        


</div>

 <div class="j_push"></div> 

     
</div>
</body>
</html>

<?php include __DIR__ . '/parts/footer.php'; ?> 
<?php include __DIR__ . '/parts/h_f_script.php'; ?>

<script>
//<!-- ====表單傳送確認==== -->


        //沒有檢查?
        function checkform_changepw(){
            let pw1 =  $("#pw1").val(),
                  pw2 =  $("#pw2").val();
            console.log(pw1+", "+pw2)
            

            if( pw1  ==  pw2 ){
           
                 //console.log($(document.form_changepw).serialize())
                $.post('member_changepw_api.php', $(document.form_changepw).serialize(), function (data){
                    if(data.success){
                        $('.a_alert.a_editData').fadeIn();
                        setTimeout(function(){
                            $('.a_alert.a_editData').fadeOut();
                        }, 800);
                        //console.log(data)
                    } 
                }, 'json');
                
            }
            else {
                        $('.a_alert.a_registrationErr').fadeIn();
                        setTimeout(function(){
                            $('.a_alert.a_registrationErr').fadeOut();
                        }, 800);
                    } 
           
                    return false;
           }


</script>







