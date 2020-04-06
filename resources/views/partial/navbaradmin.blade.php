<header>
<div class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-3">
                    <div class="logo">
                        <a href="/" rel="nofollow" class="">
                            <img src="{{asset ('images/banner.png')}}" alt="Gainstrong Manpower Inc" title="Gainstrong Manpower Inc"/>
                        </a>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<script type="text/javascript">
    $(window).scroll(function () {
        if ($(this).scrollTop() > 0) {
            $('#toTop').fadeIn();
        } else {
            $('#toTop').fadeOut();
        }
    });
    $('#toTop').click(function () {
        $('body,html').animate({scrollTop: 0}, 800);
    });
</script>
<script type="text/javascript">
    $(window).scroll(function () {
        if ($(this).scrollTop() > 5) {
            $(".header").addClass("fixed-me");
        } else {
            $(".header").removeClass("fixed-me");
        }
    });
</script>
