<?php
require __DIR__ . '/__connect_db.php';
$page_name = 'Customized客製化 - Redcore';

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include __DIR__ . '/parts/h_f_link.php' ?>
    <?php include __DIR__ . '/parts/h_f_css.php' ?>
    <link rel="stylesheet" href="./css/qa.css">
    <title></title>


    <link rel="stylesheet" href="./fontawesome-free-5.13.0-web/css/all.min.css">
    <!--    <link rel="stylesheet" href="./css/customized_final.css">-->


    <style>
        /* * {
            outline: #FA8000 solid 1px;
        } */
    </style>
</head>

<body>


    <?php include __DIR__ . './parts/header.php' ?>
    <!-- 推出 header 空間-->
    <div class="a_push_place"></div>



    <div class="container qa_title_out">
        <h2 class="nac qa_title">常見問題</h2>
        <h6 class="nac">How can I help you</h6>
    </div>

    <div class="container qa_main_outbox">
        <div class="qa_leftmenu">
            <nav>
                <ul>
                    <li class="qa_open_btn_menu" data-qachoseopen="qa_shop">購物說明</li>
                    <li class="qa_open_btn_menu" data-qachoseopen="qa_send">物流配送</li>
                    <li class="qa_open_btn_menu" data-qachoseopen="qa_chagen">退換貨政策</li>
                    <li class="qa_open_btn_menu" data-qachoseopen="qa_nov">其他常見問題</li>
                </ul>
            </nav>
        </div>
        <div class="qa_main">
            <div class="qa_main_box qa_main_box_chose">
                <h3 class="nac">購物說明</h3>
                <ul>
                    <li class="qa_open_btn nac_qa_info_open">
                        <h4 class="nac">會員購物</h4>
                        <div class="nac_qa_info">
                            <p class="nac">
                                歡迎加入REDCORE會員，方便訂單查詢，並享有最新優惠訊息</br>
                                1. 以個人電郵/手機註冊加入會員。</br>
                                2. REDCORE會員不需重複填寫訂購資料，讓您更有效率的訂購商品。</br>
                                3. 可隨時至『訂單查詢』中查詢訂單狀態、購物紀錄或取消訂單等相關資料。</br>
                                4. 會員可獲得網站最新訊息，参與各項網站活動、專屬優惠與會員福利等服務。</p>
                        </div>
                    </li>
                    <li class="qa_open_btn">
                        <h4 class="nac">信用卡線上刷卡</h6>
                            <div class="nac_qa_info">
                                <p class="nac">
                                    1.REDCORE 使用台新銀行刷卡系統，凡各家銀行的 VISA、MASTER 及 JCB 信用卡皆可使用。
                                    </br>※待您完成付款，REDCORE會於1~3個工作天內為您安排出貨，您將於2~5個工作天收到商品(不含假日)。</p>
                            </div>
                    </li>
                </ul>
            </div>

            <div class="qa_main_box">
                <h3 class="nac">物流配送</h3>
                <ul>
                    <li class="qa_open_btn nac_qa_info_open">
                        <h4 class="nac">配送時間</h4>
                        <div class="nac_qa_info">
                            <p class="nac">
                                1. 國外配送將於完成訂購並成功付款後5日內出貨，出貨後會再次與收件人做確認。</br>
                                2. 國外配送時間：約於付款後5-10個工作日送達。</br>
                                3. 國外配送會依國家不同而影響送達時間，實際將以快遞公司之配送時間為主。</br>
                                4. 以上作業為周一至周五，不含週休假日及台灣國定假日。</p>
                        </div>
                    </li>
                    <li class="qa_open_btn">
                        <h4 class="nac">其他費用</h6>
                            <div class="nac_qa_info">
                                <p class="nac">
                                    1. 如因收件地址、電話資訊有誤或連絡不到收件人等無法投遞之情況，我們會先嘗試聯絡訂購人確認收件資料，其中所產生的物流空跑費，或相關改址增加費用，則需另行向您收取。若仍無法順利聯繫，導致商品必須遣返退回，當中所產生之倉儲、稅金、運輸等因配送所需費用，我們將於收到退回商品後，由付款金額中扣除並進行退刷，敬請留意。</p>
                            </div>
                    </li>
                </ul>
            </div>

            <div class="qa_main_box">
                <h3 class="nac">退換貨政策</h3>
                <ul>
                    <li class="qa_open_btn nac_qa_info_open">
                        <h4 class="nac">七天鑑賞期</h4>
                        <div class="nac_qa_info">
                            <p class="nac">
                                1. 特價出清商品一律不接受退換貨服務，如商品本身為瑕疵，可接受7日內退換貨。</br>
                                2. ASPORT 網站提供商品7天鑑賞期(含例假日)，若商品未經拆封、使用或被汙損，皆可申請退換貨。</br>
                                基於保護消費者個人衛生，貼身衣物如內衣、緊身褲和襪子，恕不接受退換貨；如為商品本身瑕疵，請於7日內申請退換貨。</br>
                                3. 欲申請商品退換貨服務，請於收到商品7日內於官網訂單通訊處留言，等候專人為您處理。 </br>
                                4. 商品退換請保持原商品完整性，並妥善包裝使用原紙箱送回，若商品完整性不齊全或因包裝不妥導致寄回損壞，恕無法辦理退換。 </br>
                                5. 若收到之商品有瑕疵狀況，麻煩請拍照提供給我們，以協助確認為商品本身瑕疵或為運送問題。 </p>
                        </div>
                    </li>
                    <li class="qa_open_btn">
                        <h4 class="nac">換貨說明</h6>
                            <div class="nac_qa_info">
                                <p class="nac">
                                    1.商品於全新無損傷之狀態，將提供「一次」免運費更換服務，換貨後恕無法再辦理退貨，貼身衣物如內衣、緊身褲和襪子除外。 </br>
                                    2.僅提供「更換尺寸」或「同金額商品」的換貨服務。</p>
                            </div>
                    </li>
                    <li class="qa_open_btn">
                        <h4 class="nac">退貨方式</h6>
                            <div class="nac_qa_info">
                                <p class="nac">
                                    僅提供「整筆」訂單退貨，請恕無法單獨退貨部分商品。</p>
                            </div>
                    </li>
                    <li class="qa_open_btn">
                        <h4 class="nac">無法退貨之因素</h6>
                            <div class="nac_qa_info">
                                <p class="nac">
                                    1. 試穿時若衣物上沾有粉妝等等人為瑕疵。</br>
                                    2. 非正常試穿，已有使用過之髒污或味道 (如香水、煙味...等)。</br>
                                    3. 基於衛生原則，貼身衣物如內衣、緊身褲和襪子，恕不接受退換貨。</br>
                                    4. 退回之商品配件不全或吊牌已剪，特殊包裝商品請務必退回所有包裝配件。</br>
                                    5. 已在商品上加工，例如：繡花、裁剪、打印…等非商品原樣。</br>
                                    6. 活動贈品未退回。</br>
                                    7. 超過7天鑑賞期。</p>
                            </div>
                    </li>
                    <li class="qa_open_btn">
                        <h4 class="nac">退款流程</h6>
                            <div class="nac_qa_info">
                                <p class="nac">
                                    寄回退貨商品檢查沒有問題後，將於7~14個工作天內（不包含例假日）內完成刷退/轉帳退款，但因各刷卡行結帳日不同之關係，實際入帳入還請洽詢您的銀行。</p>
                            </div>
                    </li>
                </ul>
            </div>

            <div class="qa_main_box">
                <h3 class="nac">其他常見問題</h3>
                <ul>
                    <li class="qa_open_btn nac_qa_info_open">
                        <h4 class="nac">購物流程說明</h4>
                        <div class="nac_qa_info">
                            <p class="nac">
                                Step1．選購商品：您可以透過網頁引導或搜尋的方式找到您要的商品，再點選加入購物車。
                                </br>
                                Step2．確認身份：如已是會員請輸入帳號及密碼。非會員請先註冊成為ASPORT網站會員(您也可以不須註冊直接下單)。
                                </br>
                                Step3．選擇運送、付款方式：選擇您所需的付款及運送方式並確認各項訂購及出貨資料。
                                </br>
                                Step4．完成結帳：完成訂單結帳流程並詳閱注意事項。</p>
                        </div>
                    </li>
                    <li class="qa_open_btn">
                        <h4 class="nac">目前提供哪些付款方式</h6>
                            <div class="nac_qa_info">
                                <p class="nac">
                                    目前提供「信用卡線上付款」、「銀行轉帳」及「超商取貨付款」結帳方式。</p>
                            </div>
                    </li>
                    <li class="qa_open_btn">
                        <h4 class="nac">瀏覽訂單記錄及狀況</h6>
                            <div class="nac_qa_info">
                                <p class="nac">
                                    請輸入您的帳號及密碼登入會員後，點選「訂單」，即可查詢該訂單的處理狀態。
                                    </br>
                                    處理中：已下單完後，訂單將待出貨人員為您準備發貨。
                                    </br>
                                    已出貨：您所訂購的貨品已交至物流中心，將會送到您所指定的地址。
                                    </br>
                                    已取消：我們已按照您的指示取消訂單。所有被取消的訂單將不會被付運。
                                    </br>


                                    如有其他問題，歡迎來信至客服info@asport.com.tw聯繫，我們將特別為您確認。</p>
                            </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>







    <?php include __DIR__ . './parts/footer.php'
    ?>
    <script defer src="./fontawesome-free-5.13.0-web/js/all.js"></script>

    <?php include __DIR__ . './parts/h_f_script.php' ?>
    <script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>
        $(".qa_open_btn").click(
            function() {
                // console.log()
                $(this).siblings("li").removeClass("nac_qa_info_open")
                $(this).toggleClass("nac_qa_info_open")
            }
        )

        $("li.qa_open_btn_menu").click(
            function() {
                console.log($(this).index())
                let openthearea = $(this).index()
                $(".qa_main_box").eq(openthearea).addClass("qa_main_box_chose")
                $(".qa_main_box").eq(openthearea).siblings().removeClass("qa_main_box_chose")
            }
        )
    </script>
</body>

</html>