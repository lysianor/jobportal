@extends('layouts.home')

@section('content')
<div id="content"></div>

<section class="slider">
    <div class="slider-area clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider-wrapper">
                        <div class="row">
                            <div class="col-md-68 mx-auto">
                                <div class="slider-text text-center">
                                    <div class="slide-title">
                                        <div class="typed-strings">
                                            <p>Gainstrong is dedicated to providing service and employment for the Filipino people and we take pride in our humble contribution in lowering the unemployment rate in the country. We aim to bridge the gap between employers and employees by providing reliable and professional workforce for businesses and generating abundant employment opportunities for job-seeking individuals.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="job-search-bar">
            <div class="search-bar text-center">
                <div class="container">
                    <div class="section-title text-left">
                        <h2>Finding your next job or career</h2>
                        <div class="line"></div>
                    </div>
                    <form action="/findjob/search" method="GET">                    
                        <div class="form-row">

                        <div class="col-md-10">
                            <input name="search" maxlength="255" autocomplete="off" data-suggesstion="homekeyword-box" data-search="Search" label="" class="keyword-box form-control" placeholder="Search here job, worktype, companies..." value="" type="text" id="JobKeyword"/> 
                            <div id="homekeyword-box" style="display: none"></div>
                        </div>
                        <div class="col-md-2">
                            <div class="search_button">
                                <input class="search" type="submit" value="Search"/>                            
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>

    <section class="Find-job">
        <div class="job-categories-area  pt-100 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="section-title text-left">
                            <h2>Explore Categories</h2>
                            <div class="line"></div>
                        </div>
                    </div>
{{--                     <div class="col-md-6">
                        <div class="expore_btn text-right">
                            <a href="#" rel="nofollow" class="btn_same">Explore All Categories</a>               
                        </div>
                    </div> --}}
                </div>

                <div class="cat-list-items">
                    <div class="row">
                         @foreach($jobcategories as $jobcategory)
                        <div class="col-md-6 col-sm-6 col-lg-3">

                            <div class="single-category text-center " data-aos="flip-up">

                                <div class="single-category-zoom"></div>
                                
                                <div class="single-category-main">
                                <div class="cat-icon">
                                    <a href="#" rel="nofollow">
                                        {{-- <img src="https://job-board-portal-script.logicspice.com/app/webroot/files/categoryimages/small/bfcc4_drugs.png" alt=""/> --}}
                                    </a>                                    
                                </div>
                                
                                <div class="cat-details">
                                    <h4>
                                        <a href="#">{{$jobcategory->jobcategory}}</a>
                                    </h4>
                                </div>
                                    </div>
                            </div>
                        </div>
                        @endforeach
                                                    
                         
                        <div class="expore_btn btn_centre">
                            <a href="/categories/allcategories" rel="nofollow" class="btn_same">Explore All Categories</a>       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 

<section class="how_it_work">
    <div class="job-categories-area  pt-100  clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-left">
                        <h2>How it works</h2>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="cat-list-items">
                <div class="row">
                    <div class="col-md-4 text-center " data-aos="flip-up">
                        <div class="thumbnail-bx">
                            <div class="thumbnail-inder">
                                <div class="cat-icon"><img src="/images/sign-up.png" alt=""/></div>
                                <div class="cat-details">
                                    <h3>1. Create an account</h3>
                                    {{-- <p>Mauris est leo, porttitor eu elementum quis, suscipit quis metus. Nam rhoncus augue magna, tincidunt lacinia sapien malesuad.</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center " data-aos="flip-up">
                        <div class="thumbnail-bx">
                            <div class="thumbnail-inder">
                                <div class="cat-icon"><img src="/images/job.png" alt=""/></div>
                                <div class="cat-details">
                                    <h3>2. Search desired job</h3>
                                    {{-- <p>Mauris est leo, porttitor eu elementum quis, suscipit quis metus. Nam rhoncus augue magna, tincidunt lacinia sapien malesuada ac.</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center " data-aos="flip-up">
                        <div class="thumbnail-bx">
                            <div class="thumbnail-inder">
                                <div class="cat-icon"><img src="/images/smartphone.png" alt=""/></div>
                                <div class="cat-details">
                                    <h3>3. Send your resume</h3>
                                    {{-- <p>Aliquam nec eros tempus, euismod nisl nec, venenatis mi. Nulla facilisi. Pellentesque eu erat sit amet sapien lacinia lacinia.</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<section class="Featured_Jobs">
    <div class="job-post-area pt-100 bg-color2 pb-100 minus-15 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-left">
                        <h2>Featured Jobs</h2>
                        <div class="line"></div>
                    </div>
                </div>
            </div>

            <div class="owl-carousel owl-theme" id="fetured-jobs">
                    @foreach($jobs as $jobs)
                    <div class="single-job d-md-flex" data-aos="fade-left">
                        <div class="logo">                   
                                <img src="/uploads/avatar/admin/{{$jobs->company->company_logo}}" alt="No Image">                      
                            </a>
                        </div>
                        
                        <div class="job-meta">
                            <div class="title">
                                <h4>
                                    @auth('web')
                                        <a href="/jobseeker/jobs/{{ $jobs->id}}-{{Str::slug($jobs->title)}}">{{ucwords($jobs->title)}}</a>
                                    @endauth

                                    @guest
                                        <a href="/jobs/{{ $jobs->id}}-{{Str::slug($jobs->title)}}">{{ucwords($jobs->title)}}</a>
                                    @endguest
                                </h4>
                            </div>
                            <div class="meta-info d-flex">
                                <p><i class="fa fa-building" aria-hidden="true"></i>{{$jobs->company->name}}</p>
                                <p><i class="fa fa-map-marker" aria-hidden="true"></i>{{$jobs->location}}</p>
                                <p><i class="fa fa-calendar" aria-hidden="true"></i>{{ Carbon\Carbon::parse($jobs->created_at)->diffForHumans()}}</p>
                            </div>
                        </div>

                        <div class="timing ml-auto">
                            <spam class="time-btn1 time-btn">{{$jobs->work_type}}</span>
                        </div>
                    </div>
                    @endforeach 
            </div>
        </div>
    </div>
</section>


<section class="second_slider">
    <div class="job-browse-area pt-100 pb-100 clearfix" style="background-image:url(img/front/home/bg-2.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="details-text text-center " data-aos="flip-up">
                        <div class="title pb-3">
                            <div class="heading-two mb-2">
                                <h2>Browse Our </span>Latest Jobs</h2>
                            </div>
                            <p>Get your best job in here</p>
                        </div>
                        <div class="btn-trasparent-white buttonfx curtainup">
                                @guest 
                                    <li class="nav-item">
                                        <a href="{{ url('/findjob') }}" class="nav-link "><i class="fa fa-search"></i>  Search Jobs</a>
                                    </li>
                                @endguest

                                @auth('web') 
                                    <li class="nav-item">
                                        <a href="{{ url('jobseeker/findjob') }}" class="nav-link "><i class="fa fa-search"></i> Search Jobs</a>
                                    </li>
                                @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



    <section class="Purchase-Membership">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-left">
                        <h2>Accreditations and Affiliations</h2>
                        <div class="line"></div>
                    </div>
                </div>
            </div>

            <div class="owl-carousel owl-theme">
        
                    <div class="item_owl">
                        <div class="cat-icon">
                            <div class="logo">
                                <img src="{{asset ('images/dole.png')}}" alt="No Image">
                            </div>
                        </div>
                    </div>

                    <div class="item_owl">
                        <div class="cat-icon">
                            <div class="logo">
                                <img src="{{asset ('images/ecop.png')}}" alt="No Image">
                            </div>
                        </div>
                    </div>

                    <div class="item_owl">
                        <div class="cat-icon">
                            <div class="logo">
                                <img src="{{asset ('images/pmap.png')}}" alt="No Image">
                            </div>
                        </div>
                    </div>   
     
                    <div class="item_owl">
                        <div class="cat-icon">
                            <div class="logo">
                                <img src="{{asset ('images/palscon.png')}}" alt="No Image">
                            </div>
                        </div>
                    </div> 
            </div>
        </div>
    </section>




{{-- <section class="Download_our">
    <div class="apps-download-area pt-100 pb-100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="apps-details-content">
                        <div class="section-title text-left">
                            <h2>Download our app <br>
and find your dream job                            </h2>
                            <div class="line"></div>
                        </div>
                        <p><b> Connect to opportunities and show your professional potential to the world with us. We make us easy to view, find and apply on the latest jobs in the market. </b> </p>
                        <p> Find jobs with your skills, save and apply on jobs easily. We allow candidates to update their Experience, Education, Skills and other professional details which will make you visible to companies easily.</p>
                        <div class="apps-btn d-md-flex">
                            <a href="https://play.google.com/store/apps/details?id=ls.lsjobseeker" target="_blank">
<img src="/img/front/home/Google-Play.png" alt=""/>                            </a>
                            <a href="https://itunes.apple.com/us/app/ls-job-seeker-candidate/id1403773426?ls=1&mt=8">
<img src="/img/front/home/App-Store.png" alt=""/>                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 d-flex align-items-center themeix-h">
                    <div class="mobile themeix-h " data-aos="fade-up-left">
<img src="/img/front/home/mobile-img.png" alt=""/>                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 --}}


{{-- <section class="logo_section_l">
    <div class="section_logo_pt pt-100 pb-100">
        <div class="container">
            <div class="col-md-12">
                <div class="section-title text-left">
                    <h2>Top Employers</h2>
                    <div class="line"></div>
                </div>
            </div>
        </div>
        <div class="client-area  clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <ul class="client-logo-bx">
                            
                                                                        <li><div class="client-logo">
                                                <a href="/profile/miriam-reeves" rel="nofollow"><img src="https://job-board-portal-script.logicspice.com/app/webroot/php/timthumb.php?src=https://job-board-portal-script.logicspice.com/app/webroot/files/user/full/b7b75_profile5.jpg&w=220&h=120&zc=2&q=100" rel="nofollow" alt="logo | jobsitescript.com"/></a>                                            </div>  </li>
                                                                                <li><div class="client-logo">
                                                <a href="/profile/praveen" rel="nofollow"><img src="https://job-board-portal-script.logicspice.com/app/webroot/php/timthumb.php?src=https://job-board-portal-script.logicspice.com/app/webroot/files/user/full/x08k2hfxjj.jpg&w=220&h=120&zc=2&q=100" rel="nofollow" alt="logo | jobsitescript.com"/></a>                                            </div>  </li>
                                                                                <li><div class="client-logo">
                                                <a href="/profile/customer-service" rel="nofollow"><img src="https://job-board-portal-script.logicspice.com/app/webroot/php/timthumb.php?src=https://job-board-portal-script.logicspice.com/app/webroot/files/user/full/5q8h5c8gc3.jpg&w=220&h=120&zc=2&q=100" rel="nofollow" alt="logo | jobsitescript.com"/></a>                                            </div>  </li>
                                                                                <li><div class="client-logo">
                                                <a href="/profile/riri" rel="nofollow"><img src="https://job-board-portal-script.logicspice.com/app/webroot/php/timthumb.php?src=https://job-board-portal-script.logicspice.com/app/webroot/files/user/full/yxn5duje8i.jpg&w=220&h=120&zc=2&q=100" rel="nofollow" alt="logo | jobsitescript.com"/></a>                                            </div>  </li>
                                                                                <li><div class="client-logo">
                                                <a href="/profile/julie-johnson" rel="nofollow"><img src="https://job-board-portal-script.logicspice.com/app/webroot/php/timthumb.php?src=https://job-board-portal-script.logicspice.com/app/webroot/files/user/full/f7c35_01FA0A3A-CBBA-44B3-B04D-D809FD92764C.jpeg&w=220&h=120&zc=2&q=100" rel="nofollow" alt="logo | jobsitescript.com"/></a>                                            </div>  </li>
                                        
                        </ul>
                    </div>
                    <div class="col-lg-4 d-flex align-items-center justify-content-center">
                        <div class="client-content">
                            <h5> See Why Over </h5>
                            <h3 class="client-big">10,00258+</h3>
                            <p>Companies have already used </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
  
<script type="text/javascript">
    $('input[type="text"]').blur(function () {
        $(window).scrollTop(0, 0);
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#fetured-jobs').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
// autoplay: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {items: 1, nav: true},
                600: {items: 1, nav: false},
                1000: {items: 2, nav: true, loop: true, margin: 20
                }
            }
        })
    })
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {items: 1, nav: true},
                600: {items: 2, nav: false},
                1000: {items: 3, nav: true, loop: true, margin: 20
                }
            }
        })
    })
</script>
@endsection