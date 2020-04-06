@extends('layouts.home')

@section('content')
<div class="clear"></div>
<section class="slider_abouts">
    <div class="breadcrumb-container">
        <nav class="breadcrumbs page-width breadcrumbs-empty">
            <h3 class="head-title">{{ucwords($companies->name)}}</h3>
            <a href="/">Home</a>            
            <span class="divider">/</span>
            <span>Company Details </span>
        </nav>
    </div>
</section>
<section class="job-div_button">
    <div class="container">
        <div class="row pt-100 ">
            <div class="col-md-7">
                <div style="width:100%;"></div>                
                <div class="single-job mb-4 d-md-flex">
                    <div class="logo">
                        <img src="/uploads/avatar/admin/{{$companies->company_logo}}" rel="nofollow" alt="">                    
                    </div>
                    <div class="job-meta">
                        <div class="title">
                            <h4>{{$companies->name}}</h4>
                        </div>
                        <div class="meta-info d-flex">
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i>{{$companies->location}}</p>
                            <div id="fb-root"></div>
                            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0"></script>
                            {{-- <p><div class="fb-share-button" data-href="/company/{{ $companies->id}}-{{Str::slug($companies->title)}}" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div></p> --}}
                        </div>
                    </div>
                </div>
            </div>

 {{--            <div class="col-md-5">
                <div class="job_button_p">

                        @auth('web')
                        <form id="save-form-{{$jobs->id}}" method="post" action="{{ route('bookmark.store', $jobs->id) }}" style="display: none;">
                        @csrf
                            <input type="" value="{{$jobs->id}}" name="job">
                        </form> 
                        @if(auth()->user()->id)
                        @if ($resultt == 'exist')
                        <a id="applybtn5" class="save active" rel="nofollow"><i class="fa fa-heart"></i>&nbsp;Already Saved</a>
                        @else
                            <a href="" class="save active" onclick="
                            if(confirm('Are you sure do you want to apply this job?')) {
                                    event.preventDefault();
                                    document.getElementById('save-form-{{ $jobs->id}}').submit();
                                }else{
                                    event.preventDefault();}"><i class="fa fa-heart"></i>&nbsp;Save Job</a> 
                            @endif
                            @endif
                            
                        <form id="apply-form-{{$jobs->id}}" method="post" action="{{ route('applicant.store', $jobs->id) }}" style="display: none;">
                            @csrf
                            <input type="hidden" value="{{$jobs->id}}" name="job">
                        </form> 
                        @if(auth()->user()->id)
                        @if ($result == 'exist')
                        <a id="applybtn5" class="Apply active" rel="nofollow"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;Already Applied</a>
                        @else
                            <a href="" class="Apply active" onclick="
                            if(confirm('Are you sure do you want to apply this job?')) {
                                    event.preventDefault();
                                    document.getElementById('apply-form-{{ $jobs->id}}').submit();
                                }else{
                                    event.preventDefault();}"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;Apply Now</a> 
                            @endauth
                            @endif
                            @endif
                            @guest
                            <a href="{{ url ('/register')}}" class="save active" rel="nofollow"><i class="fa fa-heart"></i>&nbsp; Save Job</a>
                            &nbsp;&nbsp;
                            <a id="applybtn5" onclick="jobApply(5)" href="{{ url ('/register')}}" class="Apply active"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;Apply Now</a>
                            @endauth
                        
                    <div class="share_icons"> 
                        <a href="#" title="Share"><i class="fa fa-share-alt addthis_button"></i></a>
                    </div> 
                </div>
            </div> --}}
        </div>
</section>

<section class="job_listing">
    <div class="job-post-details-area pb-100">
        <div class="container">
            <!-- New formate detail page -->
            <div class="row">
                <div class="col-md-8">
                    <div class="job-post-wrapper">
                        <div class="entry-content">
                            <h3>About us</h3>
                            <div class="clear"></div>
                                <div class="det_imv">   
                                    {!! $companies->description !!}                                  
                                </div>
                            <div class="clear"></div><br/>
                        </div>
                    </div>

{{--                     <div class="job-post-list">
                        <div class="sidebar-title inner-section ">
                            <h3>Related Jobs</h3>
                        </div>
                            <h6>No record found</h6>
                    </div> --}}
                </div>

            <!-- Job overview page -->
                <div class="col-md-4">
                    <div class="right-sidebar">

                        {{-- <div class="sidebar-widget mb-4">
                            <div class="sidebar-title">
                                <h3>Company Overview</h3>
                            </div>
                            <div class="sidebar-details">
                                <div class="single-overview">
                                    <div class="icon"><i class="fa fa-calendar"></i></div>
                                    <div class="meta-overview">
                                        <p>Date Posted: <span></span></p>
                                    </div>
                                </div>
                               
                                <div class="single-overview ">
                                    <div class="icon"><i class="fa fa-sitemap"></i></div>
                                    <div class="meta-overview">
                                        <p>Category: <span></span></p>
                                    </div>
                                </div>
                                
                                <div class="single-overview ">
                                    <div class="icon"><i class="fa fa-clock-o"></i></div>
                                    <div class="meta-overview">
                                        <p>Job Type: <span></span></p>
                                    </div>
                                </div>
                                <div class="single-overview">
                                    <div class="icon"><i class="fa fa-dollar"></i></div>
                                    <div class="meta-overview">
                                        <p>Salary: <span></span></p>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="sidebar-widget mb-4">
                            <div class="sidebar-title">
                                <h3>Company Overview</h3>
                            </div>
                            <div class="sidebar-details">
                                <div class="contact-details">
                                    <div class="icon"><i class="fa fa-phone"></i></div>
                                    <div class="contact-info">
                                        <p>Contact: <span>{{$companies->contact_number}}</span></p>
                                    </div>
                                </div>
                                <div class="contact-details">
                                    <div class="icon"><i class="fa fa-globe"></i></div>
                                    <div class="contact-info">
                                        <p>Website: <span>{{$companies->website}}</span></p>
                                    </div>
                                </div>
                                <div class="contact-details">
                                    <div class="icon"><i class="fa fa-envelope"></i></div>
                                    <div class="contact-info">
                                        <p>Email: <span>{{$companies->email}}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</section>
@endsection   