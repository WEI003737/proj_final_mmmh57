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
<?php include __DIR__ . '/parts/h_f_css.php'; ?>

 
<style>
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

    .j_padb_100{padding-bottom: 100px;}
    .j_padb_200{padding-bottom: 200px;}
    .j_padt_100{padding-top:100px;}
    .j_padt_50{padding-top:50px;}
    .j_padt_25{padding-top:25px;}

    /* 本頁的 */

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
    }

    .check_btn{
        right:30%;
        position:absolute;
    }

    #register-area{
        position:relative;
    }


    .login_inputcss{padding:10px 300px 10px 5px; border:2px #CA054D solid;
        cursor:pointer; text-align:left;margin:30px auto;}


    input:focus,textarea:focus,button:focus{
        outline: none;
        border: 2px solid #FFE07C;
    }
    
    #info-bar,#info-bar2
    {background-color:#FFE07C;
        width:480px;
        border-radius:5px;
    }

    @media screen and (max-width: 700px){
    .login_inputcss{width:200px;margin:10px auto;}
    .login_btn,.login_btn_2{width: 200px;height: 40px;}
    .login-register_1, .login-register_2 {font-size:16px}
 }


    /* Customize the label (the container) */
.j_checkbox_container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.j_checkbox_container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color:#CA054D ;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

#checkbox_help{
    font-size:20px;
    color:#CA054D;
}

    /* .j_run_img{
        height: 40vh;
        position: absolute;
        bottom: 0px;
    } */

</style>



<body>

<?php include __DIR__ . '/parts/header.php'; ?>  
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
                <input class="login_inputcss"  type="text" id="" name="email" placeholder="Email " value=""  required  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" />
            </div>

            <div>
                <input class="login_inputcss" type="password" id="login_pw" name="password" placeholder="密碼" value=""  required  />
                <!-- <a href="">忘記密碼？</a> -->
            </div>

            <div id="info-bar" class="alert alert-info" role="alert" style="display:none">
            </div>


            <div class="login-remember">
                <button class="login_btn" type="submit" formaction="">確認登入</button>
            </div>

        </form>

    </div>

    <div id="register-area" class="flex justify-content-cneter" style="display:none">

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

            <div>
                <small>必須包含5個或更多字符，至少包含一個數字，以及一個大寫和小寫字母 </small>
            </div>


            <div id="info-bar2" class="alert alert-info" role="alert" style="display:none">
                <img src="./icon/logo.png" alt="">註冊成功,獲得新會員優惠卷一張! 
            </div>

            
            <div id="info-bar3" class="alert alert-info" role="alert" style="display:none">
            </div>


            <!-- <img src="./icon/logo.png" alt="">  -->
           
            <div class="check_btn j_padt_50 ">
                    <label class="j_checkbox_container">
                        <p> 我同意RED CORE的<a href="">使用條款</a></p>
                        <p id="checkbox_help" class="form-text"></p> 
                        <!-- <input  type="checkbox" checked="checked" required name="terms" > -->
                        <input id="check_must"  type="checkbox" checked="checked" >
                        <span class="checkmark"></span>
                    </label>

                    <label class="j_checkbox_container">
                        <p>註冊後接收來自RED CORE的相關產品.服務.優惠資訊</p>
                        <input  type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                    </label>


                    <div class="j_padt_25 ">
                    <button class="login_btn_2 " type="submit">建立帳號</button>
                    </div>
            </div>

        </form>

       

    </div>

    <!-- <img class="j_run_img" src="https://images.unsplash.com/photo-1502904550040-7534597429ae?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2149&q=80" alt=""> -->


</div>

</body>


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
                $('#info-bar').show().text('登入成功');
                // console.log(data)
                setTimeout(function(){
                    //首頁檔名
                    location.href ='member_information_card_noflipnew.php';
                }, 1000);

            } else {
                // console.log(data)
                $('#info-bar').show().text('帳號或密碼錯誤');
            }
        }, 'json')
        .fail(function(err){
            console.log(err)
        })
        .done(function(){
            console.log("success")
        })

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

        if($('input#check_must').prop('checked')){
            $('p#checkbox_help').text('請閱讀使用條款並確認勾選');
            isPass = false;
            //alert('請閱讀使用條款並確認勾選');
        }

        if(isPass){
            $.post('register_api.php', $(document.form2).serialize(), function (data){
                if(data.success){
                    $('#info-bar2').show();
                    // setTimeout(function(){ //要導到商品列表或首頁
                    //     $('#info-bar2').hide();
                    // }, 1000);
                } else {
                    $('#info-bar3').show().text(data.error);
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




