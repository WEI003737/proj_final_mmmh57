<?php
require __DIR__. '/__connect_db.php';

//$_SESSION['loginUser']='CCC@Gmail.com';
//$stmt = $pdo->query("SELECT * FROM `members` where `email`="$_SESSION['loginUser']"")
$rows = [];
$sql = "SELECT * FROM members where email='" . $_SESSION['loginUser'] . "'";
$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll();
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

    .j_padb_100{padding-bottom: 100px;}
    .j_padb_200{padding-bottom: 200px;}
    .j_padt_100{padding-top:100px}
    .j_padb_45{padding-bottom:45px}


    /* 上標題 */
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


    /* 左標題 */
    .member_left_list li{
        list-style: none;
        padding-top: 10px;
        padding-bottom: 50px;
    }

    .leftlist_circle:hover{
        list-style-type: disc;
        color:#CA054D;
    }

    @media screen and (max-width: 700px){
        .member_left_list{display:none}
        .j_eng_title{font-size: 15px;}
        .j_chinese_title,.j_eng_title2{font-size: 12px;}
        /* .j_mobile_noshow{display:none} */
    }



    .inputcss{padding:15px 300px 15px 5px; border:1px white solid;
        cursor:pointer; text-align:left;margin:30px auto;}

    input:focus,textarea:focus,button:focus{
        outline: none;
        border: 2px solid #FFE07C;
    }

    .login_btn{
        width: 280px;
        height: 40px;
        background-color:#CA054D;
        color:white;
        text-align:center;
        border-style: hidden;
    }



    .j_email_bg{
        border-radius:5px;
        background-color:#FFE07C;
        width:200px;
        height:25px;
        font-size:20px;
        margin-right:50px;
    }

    .j_keysize{
        width:25px;
        height:25px;
    }

    /* 忘記密碼出不來 */
    .jkeysize:hover .j_changepw a{
        display:block;
    }

    /* 對話框出不來 */
    .bubble{
        background-image:url(./images/bubble.png);

    }


    /* 黃色背景 */
    .j-bg{
        border-radius:10px;
        background: linear-gradient(322deg, #ffe07c, #fef5ef);
        animation: AnimationName 15s ease infinite;
    }


    .j-bg2{
        border-radius:10px;
        background: linear-gradient(126deg, #ffe07c, #fef5ef);
        animation: AnimationName 15s ease infinite;
    }


    @keyframes AnimationName {
        0%{background-position:0% 76%}
        50%{background-position:100% 25%}
        100%{background-position:0% 76%}
    }

</style>
<?php include __DIR__. '/parts/header.php';?>

<!-- 推出 header 空間-->
<div class="a_push_place"></div>
<div class="container">

    <!-- <div class="bubble"></div> -->

    <div class="d-flex justify-content-between  ">
        <div style="color:#CA054D;"><a>會員資料修改</a></div>
        <div>我的收藏</div>
        <div>訂單查詢</div>
        <div>我的優惠卷</div>
    </div>



    <div class="member_top_title j_padt_100">
        <div class="d-flex align-items-center justify-content-center ">
            <p class="j_eng_title">My information</p>
            <p class="j_chinese_title ">我的資料修改</p>
        </div>
        <P class="j_dashline"></P>
        <p class="d-flex justify-content-center j_padb_100">Add more details</p>
    </div>

    <div class="d-flex justify-content-center j_padb_200">
        <div class="member_left_list col-lg-3">
            <ul>
                <li class="leftlist_circle"><a  href="member_information.php" style="color:#CA054D;">會員資料修改</a></li>
                <li class="leftlist_circle"><a href="member_wishlist.php">我的收藏</a></li>
                <li class="leftlist_circle"><a href="member_order.php">訂單查詢</a></li>
                <li class="leftlist_circle"><a href="">我的優惠卷</a></li>
            </ul>
        </div>


        <form class="col-lg-9" name="form3" method="post"  onsubmit="return checkForm3()" >

            <?php foreach($rows as $r): ?>
            <div class="j-bg">
                <P>基本資料</p>

                <div class="d-flex align-items-center">
                    <div class="d-felx text-align-center j_email_bg"><?=$r['email'] ?></div>
                    <div>
                        <img class="j_keysize" src="images/key-solid.svg" alt="">
                        <a class="j_changepw" style="" href="mailto:camillemilky@gmail.com">更改密碼</a>
                    </div>
                </div>

                <div>姓名&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input class="inputcss" type="text" id="name_new" name="name_new" placeholder="" value="<?= $r['name'] ?>"  required minlength="2"   /></div>
                <div>電話&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input class="inputcss" type="text" id="mobile_new" name="mobile_new" placeholder="" value="<?= $r['mobile'] ?>" required  minlength="10"  /></div>
                <br>
                <br>
            </div>


            <div class="j-bg2">
                <p>常用設定</p>
                <div>收件人&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input class="inputcss" type="text" id="receiver_name" name="receiver" placeholder=" " value="<?= $r['receiver'] ?>" /></div>

                <div>收件人手機&nbsp<input class="inputcss" type="text" id="receiver_mobile" name="receiver_mobile" placeholder="" value="<?= $r['receiver_mobile'] ?>" /></div>

                <div>收件人地址&nbsp<input class="inputcss" type="text" id="receiver_address" name="receiver_address" placeholder="" value="<?= $r['address'] ?>" /></div>

                <!-- <input type="" id="" name="" placeholder="常用便利商店" value=""  />  -->


                <div id="info-bar3" class="alert alert-info bubble" role="alert" style="display:none"></div>


                <div><button class="login_btn" type="submit" >儲存變更</button></div>


                <?php endforeach;?>
            </div>
        </form>

    </div>




</div>


</body>
</html>

<?php include __DIR__ . '/parts/footer.php'; ?>
<?php include __DIR__ . '/parts/h_f_script.php'; ?>

<script>
    function checkForm3(){

        if($("form")[0].checkValidity()) {
            // console.log($(document.form3).serialize())

            $.post('member_information_update_api.php', $(document.form3).serialize(), function (data){
                if(data.success){
                    $('#info-bar3').show().text('資料更新成功');
                    // console.log(data)
                } else {
                    $('#info-bar3').show().text('資料格式有誤');
                }

            }, 'json');
        }


        return false;
    }

</script>
