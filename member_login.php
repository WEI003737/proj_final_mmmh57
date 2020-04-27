<?php
require __DIR__. '/member_connect_db.php';  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>member_login</title>
</head>

  <?php include __DIR__ . '/parts/h_f_css.php'; ?>
  <?php include __DIR__ . '/parts/h_f_link.php'; ?>
 
<style>

    * {box-sizing: border-box;}

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
    .j_padt_100{padding-top:100px}
    .j_padt_50{padding-top:50px}


    /* 本頁的 */

    .login-register_1:hover
     {border-bottom:5px #CA054D solid; padding:3px;transition:0.5S}
 
    .login-register_2:hover
      {border-bottom:5px #CA054D solid; padding:3px;transition:0.5S}

    .login-register_1,.login-register_2
    {padding: 10px;}

    .j_dashline{
    border-bottom-style:dashed;
    border-bottom-color:#272838;
    border-width: 1px;
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
    
   
    .inputcss{padding:10px 300px 10px 5px; border:2px #CA054D solid;
    cursor:pointer; text-align:left;margin:30px auto; }
/* 
    .j_checkbox{
    height:30px;
    } */

    input:focus,textarea:focus,button:focus{
    outline: none;
    border: 2px solid #FFE07C;
    }

    #info-bar,#info-bar2
    {background-color:#FFE07C;
     width:480px;
     border-radius:5px;
    }


    #name_help,#mobile_help,#password_help,#checkbox_help
    
    /* .j_run_img{
        height: 40vh; 
        position: absolute;
        bottom: 0px;
    } */
  
</style>



<body>
  <?php include __DIR__ . '/parts/header.php'; ?>
    
    
    <div class="container">

        <div class="login-register-tab">
            <div class="login-register_1">會員登入</div>
            <div class="login-register_2">註冊成會員</div>
        </div>

   
        <P class="j_dashline"></P>


            <div id="login-area" class="flex justify-content-cneter ">
                
                    <form name="form1" method="post" onsubmit="return checkForm()">
                                <div>
                                    <input class="inputcss"  type="text" id="" name="email" placeholder="Email " value="" />
                                </div>

                                <div>
                                    <input class="inputcss" type="password" id="login_pw" name="password" placeholder="密碼" value="" />
                                    <a href="">忘記密碼？</a>
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
                                      <input class="inputcss" type="text" id="register_name" name="register_name" placeholder="姓名 " value=""  required/>
                                      <small id="name_help" class="form-text"></small>
                                </div>

                                <div>
                                     <input class="inputcss" type="text" id="register_email" name="register_email" placeholder="Email" value="" required />
                                     <small id="email_help" class="form-text"></small>
                                </div>
                                
                                <div>
                                    <input class="inputcss" type="text" id="register_mobile" name="register_mobile" placeholder="手機" value="" required />
                                    <small id="mobile_help" class="form-text"></small>
                                </div>

                                <div>
                                    <input class="inputcss" type="password" id="register_pw" name="register_pw" placeholder="密碼" value="" required />
                                    <small id="password_help" class="form-text"></small>
                                </div>
                                

                                <div id="info-bar2" class="alert alert-info" role="alert" style="style= display:none">
                                </div>

                                <!-- <img src="./icon/logo.png" alt="">  -->

                                <div class="check_btn">

                                       
                    

                                        <!-- 無法勾起 因直接對input下樣式 增加class可解決 -->
                                        <div class="j_checkbox">
                                            <input type="checkbox" id="check_must" value="">
                                            <label for="">我同意RED CORE的<a href="">使用條款</a></label>  
                                            <br><br><p id="checkbox_help" class="form-text"></p> 
                                        </div>
                                            
                                                
                                        <div class="j_checkbox">
                                            <input type="checkbox" id="" value="">
                                            <label for="">註冊後接收來自RED CORE的相關產品.服務.優惠資訊</label>
                                        </div>
            
                                        <div class="j_padt_50">
                                        <button class="login_btn_2" type="submit" formmethod="post" formaction="">建立帳號</button>
                                        </div>


                                </div>

                               
                        </form>
                        
                     
                            
             </div>   
             
       <!-- <img class="j_run_img" src="https://images.unsplash.com/photo-1502904550040-7534597429ae?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2149&q=80" alt=""> -->

      
    </div>

 
 <?php include __DIR__ . '/parts/footer.php'; ?>
       
</body>

</html>

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
    const email_lo = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const mobile_lo = /^09\d{2}-?\d{3}-?\d{3}$/;


    function checkForm(){
        $.post('members_login-api.php', $(document.form1).serialize(), function(data){
            if(data.success){
                $('#info-bar').show().text('登入成功');
                console.log(data)
                setTimeout(function(){
                                    //首頁檔名
                    location.href = 'member_information.php';
                }, 1000);

            } else {
                $('#info-bar').show().text('帳號或密碼錯誤');
            }
        }, 'json');

        return false;
    }
</script>

<script>
    //  註冊

        const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;

        const $email = $("#register_email"),
            $name = $("#register_name"),
            $mobile = $("#register_mobile"),
            $password = $("#register_pw"),
            $email_help = $("#email_help"),
            $name_help = $("#name_help"),
            $mobile_help = $("#mobile_help"),
            $password_help = $("#password_help"),
            $checkbox_help = $("#checkbox_help");

        function checkForm2(){
            let isPass = true; //有沒有通過檢查
            //回復提示設定
            $("#info-bar2").hide();
            $email.css('border-color', '#ccc');
            $email_help.text('');

            $name.css('border-color', '#ccc');
            $name_help.text('');

            $mobile.css('border-color', '#ccc');
            $mobile_help.text('');

            $password.css('border-color', '#ccc');
            $password_help.text('');


            if($name.val().length < 2){
                $name.css('border-color', 'red');
                $name_help.text('請填寫正確的姓名');
                isPass = false;
            }

            if($email.val().length == 0){
                $email.css('border-color', 'red');
                $email_help.text('請填寫email');

                if(! email_re.test($email.val())){
                    $email.css('border-color', 'red');
                    $email_help.text('請填寫正確的 Email 格式');
                    isPass = false;
                }
            }

            if(! mobile_re.test($mobile.val())){
                $mobile.css('border-color', 'red');
                $mobile_help.text('請填寫正確的手機號碼');
                isPass = false;
            }

            if($password.val().length < 6){
                $password.css('border-color', 'red');
                $password_help.text('密碼必須大於6個英數字');
                isPass = false;
            }

            if(!check_must.checked){
                $checkbox_help.text('請閱讀使用條款並確認勾選');
                isPass = false;
            }


            if(isPass){
                $.post('register_api.php', $(document.form2).serialize(), function (data){
                    if(data.success){
                        $('#info-bar2').show().text('註冊成功 You are a part of Red Core Now!');
                        setTimeout(function(){ //要導到商品列表或首頁
                            location.href = 'member_wishlist.php '; 
                        }, 1000);
                    } else {
                        $('#info-bar2').show().text(data.error);
                    }
                }, 'json');
            }

            return false;
        }

    </script>




