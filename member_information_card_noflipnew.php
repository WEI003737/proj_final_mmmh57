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
.inputcss_information{padding:0px 100px 0px 5px; border:1px white solid;
cursor:pointer; text-align:left;margin:0px auto 10px}

 input:focus,textarea:focus,button:focus{
    outline: none;
    /* border: 2px solid #FFE07C; */
    border: 2px solid #CA054D
} 


/* 卡片   圖片區 */
.j_card {
  box-shadow:4px 4px 6px 7px #cccccc;
  max-width: 500px;
  margin: 0 auto;
  padding:20px;
}

.j_red_background{
    background:#CA054D; 
    height:250px;
    position:relative;
}

#jimg{
        width: 100%;
        height:100%;
        /* position: absolute; */
}

.avatar{
  width:100%;
  height: 100%;
  object-fit:cover;
}

.j_circle{
        border-radius:50%;
        height:200px;
        width:200px;
        background:white;
        background-image: url( './images/woman.svg') ;
        background-repeat:no-repeat;
        overflow: hidden;
        position: relative;
        margin:auto ;      
}

.j_circle:hover  .semi-circle{
    display: flex;
    align-items: center;
    justify-content: center;
}

.semi-circle {
	border-radius:0px 0px 100px  100px;
	height: 100px;
    background:black;
    opacity:0.7;
    z-index:5;
    top:100px;
    transform:translateY(100px);
    display:none;
}

.fa-camera{
    color:white;
    font-size:35px;}

.j_camera_center{
    text-align:center;
    align-items:center;  
}

.j_pencil{
    weight:20px;
    height:25px;
    position:absolute;
    right:18%;
    z-index:2;   
}

.j_storage_btn{
    font-family:sans-serif;
    font-size:18px;
    color:white;
    background: #CA054D;
    width:100px;
    height:33px;
    border-radius:15px;
    margin:5px; 
    text-align:center;
    border-style: hidden;
}

.upright{
  writing-mode: vertical-lr;
  text-orientation: upright;
  top:5%;
  position:absolute; 
}

.j_email_reveal{
    position:absolute; 
    Z-index:2;
    right:3%;
    bottom:3%;
    color:white;
    }

/* .j_more_btn{
    font-family:sans-serif;
    font-size:20px;
    color:#CA054D;
    border: 2px solid #CA054D;
    width:100px;
    border-radius:20px;
    margin:5px;
    } */

.j_wea_ootd_dec_down{
    width: 100px;
    height: 70px;
    /* left: 10px;
    bottom: 10px; */
    border-left: 3px solid #C9044D;
    border-bottom: 3px solid #C9044D;
    /* position:absolute; */
 
}

.j_wea_ootd_dec_up{
    width: 70px;
    height: 100px;
    /* right: 10px;
    top: 10px; */
    border-top: 3px solid #CA054D;
    border-right: 3px solid #CA054D;
    /* position:absolute; */
}

/* .j_position_to_right{
    left:20%;
    position:absolute;
} */

.alert-info{
    color: black;
    border: 1px dot #CA054D;
    height: 100px;
    width:100px;  
    border-radius:50%;  
}



</style>
<body>


<?php include __DIR__ . '/parts/header.php'; ?>

<!-- 提示 (css 在 h_f_script.php 裡) -->
<div class="alert a_editData">
    <i class="fas fa-pencil-alt fa-lg"></i>
    <h6><span>資</span>料更新成功</h6>
</div>

<div class="alert a_editDataErr">
    <i class="fas fa-pencil-alt fa-lg"></i>
    <h6><span>記</span>得更改資訊欄喔</h6>
</div>

<div class="alert uploadPic">
    <i class="fas fa-image fa-lg"></i>
    <h6><span>照</span>片更新成功</h6>
</div>

<div class="container">
<!-- 推出 header 空間-->
<div class="a_push_place"></div>

<!-- 手機 (左側標換到上方) -->
<div id="member_left_list_totop" >
       <ul class="member_left_list_totop d-flex justify-content-between">
            <li class="leftlist_underline"><a href="member_information_card_noflipnew.php" style="color:#CA054D;">會員資料修改</a></li>
            <li class="leftlist_underline"><a href="member_wishlist.php">我的收藏</a></li>
            <li class="leftlist_underline"><a href="member_order.php" >訂單查詢</a></li>
            <li class="leftlist_underline"><a href="member_coupon.php" >我的優惠卷</a></li>
        </ul>
</div>

<!-- <div class=" member_left_list d-flex justify-content-center">
            <div class="leftlist_underline"><a style="color:#CA054D;">會員資料修改</a></div>
            <div class="leftlist_underline"><a href="member_wishlist.php" >我的收藏</a></div>
            <div class="leftlist_underline"><a href="member_order.php" >訂單查詢</div>
            <div class="leftlist_underline"><a href="member_coupon.php" >我的優惠卷</div>
</div> -->
 

<div class="member_top_title j_padt_100"> 
    <div class="d-flex align-items-center justify-content-center ">
        <p class="j_eng_title">My information</p>
        <p class="j_chinese_title ">我的資料修改</p>
    </div>
    <P class="j_dashline"></P>
    <p class="d-flex justify-content-center j_padb_100">Add more details</p>
</div>  





<div class="row j_padb_200 ">
        
        <!-- 桌機 左側標 -->
        <div class="member_left_list col-lg-2 ">
                <div class="leftlist_underline"><a style="color:#CA054D;">會員資料修改</a></div>
                <div class="leftlist_underline"><a href="member_wishlist.php" >我的收藏</a></div>
                <div class="leftlist_underline"><a href="member_order.php" >訂單查詢</div>
                <div class="leftlist_underline"><a href="member_coupon.php" >我的優惠卷</div>
        </div>
     

        <div class="col-lg-9 j_card">
             <div class="j_red_background">
                    <!-- <div class="j_wea_ootd_dec_up"></div>  -->
                    <!-- ========照片上傳========= -->
                    <input type="file" id="picFile" onchange="previewFile()" name="myfiles" accept="image/*" style="display: none"><br>
                        <div class="j_circle ">
                            <!-- <img id="jimg" src=""   alt="">   -->
                            <img class="avatar position-absolute" id="jimg-big" src="./uploads/<?= $rowss[0]['selffie'] ?>"   alt="">  
                            <div class="semi-circle">
                                <div class="j_camera_center">
                                    <div><a class="fas fa-camera" onclick="document.querySelector('input[type=file]').click()" style="cursor: pointer; color:white;" ></a></div>
                                    <!-- <input type="submit" id="fileUploadSubmit">  -->
                                    <div id="fileUploadSubmit" style="color:white">更新</div>
                                </div>
                            </div> 
                        
                        </div>
                    <!-- ========照片上傳 end========= -->
                    <!-- 會員email顯示右下 -->
                    <?php foreach($rowss as $r): ?>
                            <div class="j_padt_25 j_email_reveal"><?=$r['email'] ?>  </div> 
                    <?php endforeach;?>  
                    <p style="color:white" class="upright" ># Red Core Member</p> 
             </div>
             <div id='info_bar_selffie' style="display:none">更新成功</div>


            <form  name="form3" method="post"  onsubmit="return checkForm3()" >
                <?php foreach($rowss as $r): ?>
                <!-- <div class="j_wea_ootd_dec_up"></div>  -->
                        <br>
                        <div class="row">
                            <p class="col-3" >姓名</p> 
                            <input class=" col-9 inputcss_information inputpen" type="text" id="name_new" name="name_new" placeholder="" value="<?= $r['name'] ?>"  required minlength="2"   />
                        </div>
                    
                        <div class="row">
                            <p class="col-3"> 電話</p> 
                            <input class=" col-9 inputcss_information" type="text" id="mobile_new" name="mobile_new" placeholder="" value="<?= $r['mobile'] ?>" required  />
                        </div>


                        <div class="row">
                            <p class="col-3">收件人</p>
                            <input class=" col-9 inputcss_information" type="text" id="receiver_name" name="receiver" placeholder=" " value="<?= $r['receiver'] ?>" required  minlength="2"  />
                            <img class="j_pencil" src="images/pencil-alt-solid.svg" alt="">
                        </div>

                        <div class="row" >
                              <p class="col-3">收件人手機</p>
                              <input class=" col-9 inputcss_information" type="text" id="receiver_mobile" name="receiver_mobile" placeholder="" value="<?= $r['receiver_mobile'] ?>" required length="10"   >
                            <img class="j_pencil" src="images/pencil-alt-solid.svg" alt="">  
                        </div>
                    

                        <div class="row" >
                             <p class="col-3">收件人地址</p>
                            <textarea style="width:80%" class="col-9 inputcss_information" type="text" id="receiver_address" name="receiver_address" placeholder="" value="<?= $r['address'] ?>"required></textarea>
                            <img class="j_pencil" src="images/pencil-alt-solid.svg" alt="">
                        </div>
                  
                     <!-- <div class="j_wea_ootd_dec_down"></div>  -->
                       
                        <div class="d-flex justify-content-end"><button class="j_storage_btn" type="submit" >儲存變更</button></div>
                        <div id="info-bar3"   role="alert" style="display:none" ><i class="far fa-thumbs-up"></i>資料更新成功!!!</div>
                        <div id="info-bar4"   role="alert" style="display:none" >資料與之前相同 未有更新!!!</div>
                    <?php endforeach;?> 
            </form> 
             
          
        

       
</div>

   <!-- <div class="j_wea_ootd_dec_up"></div> 
   <div class="j_wea_ootd_dec_down"></div>  -->
    <!-- <div id="more" class="j_more_btn d-flex justify-content-center ">more+</div> -->
</div>      
</div>
</body>
</html>

<?php include __DIR__ . '/parts/footer.php'; ?> 
<?php include __DIR__ . '/parts/h_f_script.php'; ?>

<script>
//<!-- ====表單傳送確認==== -->
        function checkForm3(){
            event.preventDefault();
            if($("form")[0].checkValidity()) {
              
                //console.log($(document.form3).serialize())
                
                $.post('member_information_update_api.php', $(document.form3).serialize(), function (data){
                    if(data.success){
                        $('.alert.a_editData').fadeIn();
                        setTimeout(function(){
                            $('.alert.a_editData').fadeOut();
                        }, 800);
                        // $('#info-bar3').show();
                        // $('#info-bar4').hide();
                        //console.log(data)
                    } else {
                        $('.alert.a_editDataErr').fadeIn();
                        setTimeout(function(){
                            $('.alert.a_editDataErr').fadeOut();
                        }, 800);
                        // $('#info-bar4').show();
                        // $('#info-bar3').hide();
                    }
                    
                }, 'json')

            } 
            return false;
        }

</script>
<script>
//<!-- ====pre-view 照片==== -->
  function previewFile() {
  const preview = document.querySelector('#jimg-big');
  const file = document.querySelector('input[type=file]').files[0];
  const reader = new FileReader();

  reader.addEventListener("load", function () {
    // convert image file to base64 string
    preview.src = reader.result;
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
}


//<!-- ====照片 傳至uploads==== -->
 $('#fileUploadSubmit').on('click', function() {
            event.preventDefault();

            var file_data = $('#picFile').prop('files')[0];   //取得上傳檔案屬性
            var form_data = new FormData();  //建構new FormData()
            form_data.append('myfiles', file_data);  //吧物件加到file後面
                                    
            $.ajax({
                        url: 'member_uploads.php',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,     //data只能指定單一物件                 
                        type: 'post',
                    success: function(data){
                            //  console.log(data);
                            location.reload();
                            $("#jimg").attr("src", "./upload/"+data.newname)
                            $("#jimg-big").attr("src", "./upload/"+data.newname)
                            // alert("更新成功");
                            // $('.alert.uploadPic').fadeIn();
                            // setTimeout(function(){
                            //     $('.alert.uploadPic').fadeOut();
                            // }, 800);
                        }
            })
                .fail(function(err){
                    console.log(err)
                })
                .done(function(){
                    console.log("success")
                })
            });

</script>


