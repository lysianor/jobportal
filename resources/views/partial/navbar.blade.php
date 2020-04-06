<div id="page_full">       
<header>
    <div class="header header-inner">
          <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-3">
                    <div class="logo">
                        <a href="/" rel="nofollow" class="">
                            <img src="{{asset ('images/banner.png')}}" alt="Gainstrong Manpower Inc" title="Gainstrong Manpower Inc"/>
                        </a>                    
                    </div>
                </div>

                <div class="col-lg-9 col-sm-9">
                        <nav role="navigation" class="navbar navbar-expand-lg navbar-light bg-light">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <div class="toggle position-relative">
                                        <div class="line top position-absolute"></div>
                                        <div class="line middle cross1 position-absolute"></div>
                                        <div class="line middle cross2 position-absolute"></div>
                                        <div class="line bottom position-absolute"></div>
                                    </div>
                                </button>
                            </div>
                            <!-- Collection of nav links and other content for toggling -->
                            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                                <ul class="navbar-nav ml-auto mr-6">

                                @guest
                                    <li class="nav-item"> 
                                        <a href="/" class="nav-link "><i class="fa fa-home"></i> Home</a>                         
                                    </li>

                                     <li class="nav-item">
                                        <a href="{{ url('about_us') }}" rel="nofollow" class="nav-link "><i class="fa fa-info-circle"></i>About</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ url('contact_us') }}" rel="nofollow" class="nav-link "><i class="fa fa-phone"></i> Contact us</a>
                                    </li>                                                            
                                  
                                    <li class="nav-item ">
                                        <a href="{{ url('findjob') }}" class="nav-link "><i class="fa fa-search"></i>Search Jobs</a>
                                    </li>

                                    <li class="nav-item " >
                                        <a href="{{ route('login') }}" class="nav-link ">Login</a>
                                    </li>  

                                    <li class="nav-item ">
                                        <a href="{{ route('register') }}" class="nav-link ">Register</a>
                                    </li>
                                @endguest

                                @auth
                                    <li class="nav-item"> 
                                        <a href="/" class="nav-link "><i class="fa fa-home"></i> Home</a>                         
                                    </li>
                                    
                                    @auth('web')
                                    <li class="nav-item">
                                        <a href="{{ url('jobseeker/about_us') }}" rel="nofollow" class="nav-link "><i class="fa fa-info-circle"></i>About</a>
                                    </li>
                                    @endauth

                                    @auth('web')
                                    <li class="nav-item">
                                        <a href="{{ url('contact_us') }}" rel="nofollow" class="nav-link "><i class="fa fa-phone"></i> Contact us</a>
                                    </li>
                                    @endauth                                             
                                    
                                    @auth('web') 
                                    <li class="nav-item">
                                        <a href="{{ url('jobseeker/findjob') }}" class="nav-link "><i class="fa fa-search"></i>Search Jobs</a>
                                    </li>
                                    @endauth

                                    @auth('web')                            
                                    <li class="nav-item">
                                        <a href="{{ url('jobseeker/dashboard') }}" class="nav-link "><i class="fa fa-user-circle-o"></i>{{ ucwords(Auth::user()->last_name) }}</a>
                                    </li>
                                    @endauth
                                    
                                    @auth('web')
                                    <li class="nav-item">
                                        <a href="{{ route('user.logout') }}" class="nav-link "><i class="fa fa-sign-out"></i>Logout</a>
                                    </li>
                                    @endauth
                                @endauth

                                </ul>

                            </div>
                        </nav>
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
