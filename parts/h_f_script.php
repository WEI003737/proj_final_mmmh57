<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
<!-- gsap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.4/gsap.min.js"></script>


<script>

//行為提示
    $(".alert").hide();

<!-- 提示 (css 在 h_f_script.php 裡) -->
// <div class="alert">
//     <i class="fas fa-shopping-basket fa-lg"></i>
//     <h6><span>已</span>加入購物車</h6>
// </div>
//
// $('.alert').fadeIn();
// setTimeout(function(){
//     $('.alert').fadeOut();
// }, 800);

//購物車若沒有東西會提示 有就轉向
    function haveSession () {
        $.get("isset_session.php", function (data) {
            if(data.cart || data.customized){
                location.href = "cart_step1.php";
            }else {
                $('.alert.a_nothingInCart').fadeIn();
                setTimeout(function(){
                    $('.alert.a_nothingInCart').fadeOut();
                }, 800);
            }
            console.log(data);
        }, "json")
        //     .done(function() {
        //         console.log("success")
        // })
        //     .fail(function(err) {
        //        console.log(er)
        //     });
    }

//讓所有頁面一進來就能讀到購物車內的商品數 (普通商品 + 客製化)

    $.get("add_to_cart_api.php", function(data){
        // console.log(data)
        countCartObj(data);
    }, "json");

    function countCartObj(data){
        // console.log(data)
        let total = 0;
        for(let i in data.cart){
            total += data.cart[i];
        }

        for(let j in data.customized){
            total+=parseInt(data.customized[j].cus_qty);
        }

        $('.a_cart_count').text(total);
    }



</script>
<script>
// logo 動態 ----------------------
    const tl = gsap.timeline({
        defaults: { duration: 0.4, ease: "power2.inOut" }
    });
    tl.from(".a_logo_top", { x: -75, opacity:0  });
    tl.from(".a_logo_top", { rotation: 10 });
    tl.from(".a_logo_bottom", { x: -75, opacity:0 });
    tl.from(".header_nav_left>li, .header_nav_right>li", { x: -20, opacity:0 });

// rwd手機板:menu(漢堡) 下拉選單 & 動態 ----------------------
    $(".header .a_menu").on("click", function(){
        $(this).toggleClass("active")
    })
// rwd手機板:search 動態 ----------------------------------
    $(".a_input_search").click(function(){
        $(".a_input_search_rwd").toggleClass("active");
    })

</script>