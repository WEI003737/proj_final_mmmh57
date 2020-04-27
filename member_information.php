<?php
require __DIR__. '/member_connect_db.php';

session_start();
//$_SESSION['loginUser']='CCC@Gmail.com';
//$stmt = $pdo->query("SELECT * FROM `members` where `email`="$_SESSION['loginUser']"")
$rows = [];
$sql = "SELECT * FROM members where email='" . $_SESSION['loginUser'] . "'";
$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll();

// echo json_encode($_SESSION['loginUser'])
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>member_information</title>
</head>

<?php include __DIR__ . '/parts/h_f_css.php'; ?>
<?php include __DIR__ . '/parts/h_f_link.php'; ?>
   
<style>

* {box-sizing: border-box;}

.container{
    max-width: 1440px;
    margin: 0 auto;
} 

.flex
{display: flex;}

.justify-content-cneter
{justify-content: center;}

.space-between
{justify-content:space-evenly}

.align-items-center
{align-items: center;}

 .text-align-center
{text-align: center;} 

/* .text-align-justify
{text-align:justify} */

.j_padb_100{padding-bottom: 100px;}
.j_padb_200{padding-bottom: 200px;}
.j_padt_100{padding-top:100px}
.j_padb_45{padding-bottom:45px}

.j_eng_title{
    font-size: 36px;
    padding-right:30px;
    font-family:sans-serif;
}

.j_chinese_title
{font-size: 36px;}

.j_dashline{
border-bottom-style:dashed;
border-bottom-color:#272838;
border-width: 1px;
}


.login_btn{
width: 280px;
height: 40px;
background-color:#CA054D;
color:white;
text-align:center;
border-style: hidden;
}
         
input{padding:15px 300px 15px 5px; border:2px #CA054D solid;
cursor:pointer; text-align:left;margin:30px auto;}

input:focus,textarea:focus,button:focus{
    outline: none;
    border: 2px solid #FFE07C;
}

.member_left_list li{
    list-style: none;
    padding-top: 10px;
    padding-bottom: 50px;
}

.leftlist_circle:hover{
    list-style-type: disc;
    color:#CA054D; 
}

.j_email_bg{
    border-radius:5px;
    background-color:#FFE07C;
    width:200px;
    height:25px; 
    font-size:20px;
    margin-right:50px;
}

.j_locksize{
    width:50px;
    height:50px;   
}

/* 對話框出不來 */
.bubble{
 background-image:url(./images/bubble.png);

}

</style>
<body>


<?php include __DIR__ . '/parts/header.php'; ?>

    <div class="container">

    <!-- <div class="bubble"></div> -->

        <div class="member_top_title j_padt_100"> 
            <div class="d-flex align-items-center justify-content-cneter ">
                <p class="j_eng_title">My information</p>
                <p class="j_chinese_title ">我的資料修改</p>
            </div>
            <P class="j_dashline"></P>
            <p class="flex justify-content-cneter j_padb_100">Add more details</p>
        </div>  

        <div class="flex justify-content-cneter j_padb_200">
                <div class="member_left_list col-lg-3">
                    <ul>
                        <li class="leftlist_circle"><a style="color:#CA054D;">會員資料修改</a></li>
                        <li class="leftlist_circle"><a>我的收藏</a></li>
                        <li class="leftlist_circle"><a>訂單查詢</a></li>
                        <li class="leftlist_circle"><a>我的優惠卷</a></li>
                    </ul>
                </div>


                <form class="col-lg-9" name="form3" method="post"  onsubmit="return checkForm3()" >
                    <?php foreach($rows as $r): ?>
                    
                       <P>基本資料</p>

                       <div class="d-flex align-items-center">
                            <div class="d-felx text-align-center j_email_bg"><?=$r['email'] ?></div>
                            <div>
                                <img class="j_locksize" src="images/iconlock.svg" alt="">
                                <a href="mailto:camillemilky@gmail.com">更改密碼</a>
                            </div>
                       </div>

                        <div>姓名&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" id="name_new" name="name_new" placeholder="" value="<?= $r['name'] ?>" /></div>
                        <small id="name_help" class="form-text"></small>

                        <div>電話&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" id="mobile_new" name="mobile_new" placeholder="" value="<?= $r['mobile'] ?>" /></div>
                        <small id="mobile_help" class="form-text"></small>
                    
                        <br>
                        <br>
                    <p>常用設定</p>
                        <div>收件人&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" id="receiver_name" name="receiver" placeholder=" " value="<?= $r['receiver'] ?>" /></div>
                        <small id="receiver_name_help" class="form-text"></small>
 
                        <div>收件人手機&nbsp<input type="text" id="receiver_mobile" name="receiver_mobile" placeholder="" value="<?= $r['receiver_mobile'] ?>" /></div>
                        <small id="receiver_mobile_help" class="form-text"></small>
                
                        <div>收件人地址&nbsp<input type="text" id="receiver_address" name="receiver_address" placeholder="" value="<?= $r['address'] ?>" /></div>

                        <!-- <input type="" id="" name="" placeholder="常用便利商店" value=""  />  -->


                        <div id="info-bar3" class="alert alert-info bubble" role="alert" style="display: none"></div>
                   

                        <div><button class="login_btn" type="submit" >儲存變更</button></div>
                        
                         
                    <?php endforeach;?>
                 
                </form> 
               
       </div>    
        



     </div>

  
</body>
</html>

<?php include __DIR__ . '/parts/footer.php'; ?>
<?php include __DIR__ . '/parts/h_f_script.php'; ?>

<script>

       const email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
       const mobile = /^09\d{2}-?\d{3}-?\d{3}$/;

       const $name_new = $("#name_new"),
             $name_help = $("#name_help"),

             $mobile = $("#mobile_new"),
             $mobile_help = $("#mobile_help"),

             $receiver = $("#receiver_name"),
             $receiver_name_help = $("#receiver_name_help"),

             $receiver_mobile = $("#receiver_mobile"),
             $receiver_mobile_help = $("#receiver_mobile_help"),

             $receiver_address = $('#receiver_address');
            
        function checkForm3(){
            let isPass = true; 
        
            $("#info-bar3").hide();
            $name_new.css('border-color', '#ccc');
             $name_help.text('');

            $mobile.css('border-color', '#ccc');
            $mobile_help.text('');

            $receiver.css('border-color', '#ccc');
            $receiver_name_help.text('');

            $receiver_mobile.css('border-color', '#ccc');
            $receiver_mobile_help .text('');

            $receiver_address.css('border-color', '#ccc');


            if($name_new.val().length < 2){
                $name_new.css('border-color', 'blue');
                $name_help.text('請填寫正確的姓名');
                isPass = false;
            }

            if(! mobile.test($mobile.val())){
                $mobile.css('border-color', 'blue');
                $mobile_help.text('請填寫符合格式的手機號碼 範例: 0933-666-333');
                isPass = false;
            }

            if($receiver.val().length == 1){
                $receiver.css('border-color', 'blue');
                $receiver_name_help.text('請填寫正確的姓名');
                isPass = false;
            }
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            if($receiver_mobile.val().length > 0){
                if(! mobile.test($receiver_mobile.val())){
                    $receiver_mobile.css('border-color', 'blue');
                    $receiver_mobile_help.text('請填寫符合格式的手機號碼 範例: 0933-666-333');
                    isPass = false;
                }
                
            }else{
                    isPass = true;
            }

            if(isPass){
                $.post('member_information_update_api.php', $(document.form3).serialize(), function (data){
                    if(data.success){
                        $('#info-bar3').show().text('資料更新成功');
                        console.log(data)
                    } else {
                        $('#info-bar3').show().text('資料格式有誤');
                    }
                }, 'json');
            }
            return false;
        }


</script>
