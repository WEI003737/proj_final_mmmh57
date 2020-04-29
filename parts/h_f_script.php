<!-- jQuery -->
<script
  src="https://code.jquery.com/jquery-3.5.0.min.js"
  integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
  crossorigin="anonymous"></script>
<!-- gsap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.4/gsap.min.js"></script>
<script>
    $.get('add_to_cart_api.php', function(data){
        countCartObj(data);
    }, 'json');

    function countCartObj(data){
        let total = 0;
        for(let i in data){
            total += data[i];
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
</script>