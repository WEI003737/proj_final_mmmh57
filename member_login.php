<?php
require __DIR__. '/__connect_db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>member_login</title>
</head>
<?php include __DIR__ . '/parts/h_f_link.php'; ?>
<?php include __DIR__ . '/css/member_css.php'; ?>
<?php include __DIR__ . '/parts/h_f_css.php'; ?>

 
<style>
    body{
        font-family: 'Noto Sans TC', sans-serif;
    }
    /* ----------- alert ----------- */
    /*.a_alert{*/
    /*    width: 280px;*/
    /*    height: 100px;*/
    /*    text-align: center;*/
    /*    background: #ffffff;*/
    /*    color: #C9044D;*/
    /*    border: 1px solid #C9044D;*/
    /*    border-radius: 5px;*/
    /*    position: fixed;*/
    /*    right: 0;*/
    /*    left: 0;*/
    /*    margin: 0 auto;*/
    /*    display: flex;*/
    /*    flex-direction: column;*/
    /*    justify-content: center;*/
    /*    top: 30%;*/
    /*    z-index: 997;*/
    /*}*/
    /*.a_alert span{*/
    /*    font-size: 24px;*/
    /*}*/
    /*.a_alert i{*/
    /*    margin-bottom: 5px;*/
    /*}*/
    /*.a_alert .svg-inline--fa.fa-w-18{*/
    /*    width: 100%;*/
    /*}*/
    /*.a_display_none{*/
    /*    display: none;*/
    /*}*/
    /* ----------- alert ----------- */
    .header a{
        color:#333;
    }
    a{
        cursor: pointer;
    }
    a, a:hover{
        text-decoration: none;
    }
    .container{
        max-width: 1440px;
        min-height:100vh;
        margin: 20px auto 50px auto;
    }
    .flex
    {display: flex;}

    .justify-content-cneter
    {justify-content: center;}

    .login-register-tab{
        display: flex;
        justify-content:flex-start;
        font-size:30px;
        padding: 20px;
    }


    .login-register_1:hover
    {border-bottom:5px #CA054D solid; padding:3px;transition:0.5S}

    .login-register_2:hover
    {border-bottom:5px #CA054D solid; padding:3px;transition:0.5S}

    .login-register_1,.login-register_2
    {padding: 10px;}

    .j_dashline{
        border-bottom-style:dashed;
        border-bottom-color:#ccc;
        border-width: 3px;
    }

    .login_btn,.login_btn_2{
        width: 280px;
        height: 40px;
        background-color:#CA054D;
        color:white;
        text-align:center;
        border-style: hidden;
        border-radius: .25rem
    }

    .check_btn{
        left:10%;
        position:absolute;
    }

    #register-area{display:none;left:30%;position:relative};

    #checkbox_help{
    font-size:20px;
    /*color:#CA054D;*/
    }

    .login_inputcss{padding:10px 300px 10px 5px; border:2px #CA054D solid;
        cursor:pointer; text-align:left;margin:20px auto;}

    input:focus,textarea:focus,button:focus{
        outline: none;
        border: 2px solid #FFE07C;
    }
    
    #info-bar,#info-bar2
    {background-color:#FFE07C;
        width:480px;
        border-radius:5px;
    }

    .small_p{font-size:12px;}
    #j_check_p{display:none}
    .j_nextline{display:none}

    #j_forgetpw{
        color: #CA054D;
    }



    @media screen and (max-width: 700px){
    .j_dashline{margin-bottom:10px}
    .login_inputcss{padding:5px 60px 5px 5px;margin:10px auto;}
    .login_btn,.login_btn_2{width: 200px;height: 40px;}
    .login-register_1, .login-register_2 {font-size:16px}
    .login_btn{width:180px;margin:20px auto; }
    .login-register-tab{padding:5px}
    .small_p{word-wrap:break-all;font-size:10px;width:300px}
    #register-area{display:none;left:5%}
    #j_check_p,.j_nextline{display:block}
    #j_check_p_desk{display:none}
    #j_forgetpw{font-size:12px}
    }

 

</style>



<body>

<?php include __DIR__ . '/parts/header.php'; ?>

<?echo json_encode($sql_findUser);?>

<!-- 提示 (css 在 h_f_script.php 裡) -->
<!---->
<!--<div class="a_alert a_login a_display_none">-->
<!--    <i class="fas fa-smile fa-lg"></i>-->
<!--    <h6><span>登</span>入成功</h6>-->
<!--</div>-->
<!---->
<!--<div class="a_alert a_loginErr a_display_none">-->
<!--    <i class="fas fa-exclamation-triangle fa-lg"></i>-->
<!--    <h6><span>帳</span>號或密碼錯誤</h6>-->
<!--</div>-->
<!---->
<!--<div class="a_alert a_registrationErr a_display_none">-->
<!--    <i class="fas fa-exclamation fa-lg"></i>-->
<!--    <h6><span>請</span>檢查輸入資料有無錯誤</h6>-->
<!--</div>-->
<!---->
<!--<div class="a_alert a_registration a_display_none">-->
<!--    <i class="fas fa-ticket-alt fa-lg"></i>-->
<!--    <h6><span>註</span>冊成功<br>恭喜您得到一張新會員優惠卷</h6>-->
<!--</div>-->
<!---->
<!--<div class="a_alert a_changePassword a_display_none">-->
<!--    <i class="fas fa-envelope fa-lg"></i>-->
<!--    <h6><span>請</span>至註冊信箱<br>取得臨時密碼登入</h6>-->
<!--</div>-->


<!-- 推出 header 空間-->
<div class="a_push_place"></div>
<div class="container">

    <div class="login-register-tab">
        <div class="login-register_1">會員登入</div>
        <div class="login-register_2">註冊成會員</div>
    </div>

 
    <P class="j_dashline"></P>


    <div id="login-area" class="flex justify-content-cneter ">

        <form name="form1" method="post" onsubmit="return checkForm()">
            <div>
                <input class="login_inputcss"  type="text" id="login_email" name="email" placeholder="Email " value=""  required  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" />
            </div>

            <div>
                <input class="login_inputcss" type="password" id="login_pw" name="password" placeholder="密碼" value=""   />
                 <div class="j_nextline"></div>
                <a id="j_forgetpw" ><i class="fas fa-question-circle"></i>忘記密碼</a>
            </div>
          

            <div id="info-bar" class="alert alert-info" role="alert" style="display:none">
            </div>

          
            <div class="j_padt_25 ">
                <button class="login_btn " type="submit" formaction="">確認登入</button>
            </div>

        </form>

        <!-- <form name="form3"  method="post"  action="">
         請輸入註冊電話
        <input type="text" id="checkphone" name="">
        </form> -->

    </div>

    <div id="register-area" class="" >

        <form name="form2" method="post" onsubmit="return checkForm2()">


            <div>
                <input class="login_inputcss" type="text" id="register_name" name="register_name" placeholder="姓名 " value=""  required  minlength="2"/>
            </div>

            <div>
                <input class="login_inputcss" type="email" id="register_email" name="register_email" placeholder="Email" value="" required  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" />

            </div>

            <div>
                <input class="login_inputcss" type="text" id="register_mobile" name="register_mobile" placeholder="手機" value=""  required length="10" />
                <!-- <失敗的格式    pattern="[0-9]{2}-[0-9]{3}-[0-9]{3}"    pattern="/^09\d{2}-?\d{3}-?\d{3}$/"  pattern="09\d{8}"        -->
            </div>

            <div>
                <input class="login_inputcss" type="password" id="register_pw" name="register_pw" placeholder="密碼" value="" style="margin-bottom:0px;" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}"
                />
            </div>

          
            <div class="small_p">*必須包含5個或更多字符，至少包含一個數字，以及一個大寫和小寫字母 </div>
           


            <div id="info-bar2" class="alert alert-info" role="alert" style="display:none">
                <img src="./icon/logo.png" alt="">註冊成功,獲得新會員優惠卷一張! 
            </div>

            
            <div id="info-bar3" class="alert alert-info" role="alert" style="display:none">
            </div>

          
            <div class="check_btn j_padt_50 ">
                    <label class="j_checkbox_container">
                        <p> 我同意RED CORE的<a href="member_rules.php" target="_blank">使用條款</a></p>
                        <p id="checkbox_help" class="form-text"></p> 
                        <!-- <input  type="checkbox" checked="checked" required name="terms" > -->
                        <input id="check_must"  type="checkbox" checked="checked" >
                        <span class="checkmark"></span>
                    </label>

                    <label class="j_checkbox_container">
                        <p id="j_check_p_desk">註冊後接收來自RED CORE的相關產品.服務.優惠資訊</p>
                        <p id="j_check_p">註冊後接收來自RED CORE的<br>相關產品.服務.優惠資訊</p>
                        <input  type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                    </label>


                    <div class="j_padt_25 ">
                    <button class="login_btn_2 " type="submit">建立帳號</button>
                    </div>
            </div>

        </form>

    </div>

    
</div>

</body>

<div class="j_push"></div>
</html>

<?php include __DIR__ . '/parts/footer.php'; ?>  
<?php include __DIR__ . '/parts/h_f_script.php'; ?>
<script>

    $(".login-register_1").click(function(){
        $("#login-area").show();
        $("#register-area").hide();
    });

    $(".login-register_2").click(function(){
        $("#login-area").hide();
        $("#register-area").show();
    });
</script>
<script>
    // 登入
   //const email_lo = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
   // const mobile_lo = /^09\d{2}-?\d{3}-?\d{3}$/;


    function checkForm(){
        $.post('members_login_api.php', $(document.form1).serialize(), function(data){
        
            if(data.success){
                $('.a_alert.a_login').fadeIn();
                setTimeout(function(){
                    $('.a_alert.a_login').fadeOut();
                }, 800);
                setTimeout(function(){
                    //首頁檔名
                    location.href ='member_information_card_noflipnew.php';
                }, 1000);

            } else {
                console.log(data)
                $('.a_alert.a_loginErr').fadeIn();
                setTimeout(function(){
                    $('.a_alert.a_loginErr').fadeOut();
                }, 800);
            }
        }, 'json');

        return false;
    }
</script>

<script>
     //  註冊
     function checkForm2(){
        let isPass = true; //有沒有通過檢查
        $("#register_email").css('border-color', '#ccc');
        $("#register_name").css('border-color', '#ccc');
        $("#register_mobile").css('border-color', '#ccc');
        $("#register_pw").css('border-color', '#ccc');

        // if(!check_must.checked){
        //     $checkbox_help.text('請閱讀使用條款並確認勾選');
        //     isPass = false;
        // }

    
        if(!$('input#check_must').prop('checked')){
            $('p#checkbox_help').text('請閱讀使用條款並確認勾選').show();
            isPass = false;
            //alert('請閱讀使用條款並確認勾選');
        } else {
            $('p#checkbox_help').text('').hide();
        }

        if(isPass){
            $.post('register_api.php', $(document.form2).serialize(), function (data){
                if(data.success){
                    //註冊成功
                    //得到優惠卷
                    $('.a_alert.a_registration').fadeIn();
                    setTimeout(function(){
                        $('.a_alert.a_registration').fadeOut();
                    }, 1600);
                    setTimeout(function(){
                        location.href ='member_information_card_noflipnew.php';
                    }, 2400);
                } else {
                    $('.a_alert.a_registrationErr').fadeIn();
                    setTimeout(function(){
                        $('.a_alert.a_registrationErr').fadeOut();
                    }, 800);
                }
            }, 'json');
        //會造成非同步狀態    
        //     $.get('member_coupon_api.php', function (data){
               
        //         if(data.getcoupon){

        //             $('#info-bar3').show().text('得到優惠卷!');

        //         }
        //         else {
        //             $('#info-bar3').show().text('不成功');
        //         }
        //     }, 'json');
            return false;
        }
        return false;
    }


</script>

<script>

$("#j_forgetpw").click(function() {

    $("#login_email").val();
    // alert("true : "+$("#login_email").val());  

    $.post('member_passmail_api.php', {'email': $("#login_email").val()}, function(data){
        console.log(data);

        //請至註冊信箱 取得臨時密碼登入

    }, 'html');

    $('.a_alert.a_changePassword').fadeIn();
    setTimeout(function(){
        $('.a_alert.a_changePassword').fadeOut();
    }, 1600);
                   
});


</script>








