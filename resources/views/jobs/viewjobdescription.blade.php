@extends('layouts.home')

@section('content')
<div class="clear"></div>
<section class="slider_abouts">
    <div class="breadcrumb-container">
        <nav class="breadcrumbs page-width breadcrumbs-empty">
            <h3 class="head-title">{{ucwords($jobs->title)}}</h3>
            <a href="/">Home</a>            
            <span class="divider">/</span>
            <span>Job Details </span>
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
                        <img src="/uploads/avatar/admin/{{$jobs->company->company_logo}}" rel="nofollow" alt="">                    
                    </div>
                    <div class="job-meta">
                        <div class="title">
                            <h4>
                                @auth('web')
                                <a href="/jobseeker/company/{{ $jobs->company->id}}-{{Str::slug($jobs->company->name)}}">{{$jobs->company->name}}</a>    
                                @endauth

                                @guest
                                <a href="/company/{{ $jobs->company->id}}-{{Str::slug($jobs->company->name)}}">{{$jobs->company->name}}</a>    
                                @endauth
                                
                            </h4>
                        </div>
                        <div class="meta-info d-flex">
                            <p><i class="fa fa-briefcase" aria-hidden="true"></i>{{$jobs->experience}}</p>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i>{{$jobs->location}}</p>
                            <p><i class="fa fa-calendar" aria-hidden="true"></i>{{$jobs->created_at->diffForHumans()}}</p>
                            <p><div class="fb-share-button" data-href="/jobs/{{ $jobs->id}}-{{Str::slug($jobs->title)}}" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div></p>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
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
                        
                    <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0"></script> 

                </div>
            </div>
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
                            <h3>Job Description</h3>
                            <div class="clear"></div>
                                <div class="det_imv">   
                                    {!! $jobs->description !!}                                  
                                </div>

                            <div class="clear"></div><br/>
                            
                            <h3>Job Function</h3>
                            @if(count($jobs->tags) > 0)
                            <div class="show_skills_sc">
                                @foreach($jobs->tags as $tag)
                                <span class="label label-primary">{{ucwords($tag->tag)}}</span>
                                @endforeach   
                            </div>
                            @else
                            <h6>N/A</h6>
                            @endif
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

                        <div class="sidebar-widget mb-4">
                            <div class="sidebar-title">
                                <h3>Job Overview</h3>
                            </div>
                            <div class="sidebar-details">
                                <div class="single-overview">
                                    <div class="icon"><i class="fa fa-calendar"></i></div>
                                    <div class="meta-overview">
                                        <p>Date Posted: <span>{{ Carbon\Carbon::parse($jobs->created_at)->diffForHumans()}}</span></p>
                                    </div>
                                </div>
                               
                                <div class="single-overview ">
                                    <div class="icon"><i class="fa fa-sitemap"></i></div>
                                    <div class="meta-overview">
                                        <p>Category: <span>{{$jobs->jobcategory->jobcategory}}</span></p>
                                    </div>
                                </div>
                                
                                <div class="single-overview ">
                                    <div class="icon"><i class="fa fa-clock-o"></i></div>
                                    <div class="meta-overview">
                                        <p>Job Type: <span>{{$jobs->work_type}}</span></p>
                                    </div>
                                </div>
                                <div class="single-overview">
                                    <div class="icon"><i class="fa fa-dollar"></i></div>
                                    <div class="meta-overview">
                                        <p>Salary: <span>{{$jobs->salary}}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>

{{--                         <div class="sidebar-widget mb-4">
                            <div class="sidebar-title">
                                <h3>Contact info</h3>
                            </div>
                            <div class="sidebar-details">
                                <div class="contact-details">
                                    <div class="icon"><i class="fa fa-users"></i></div>
                                    <div class="contact-info">
                                        <p>Company Name: <span>Lorenzo Brokerage Services</span></p>
                                    </div>
                                </div>
                                <div class="contact-details">
                                    <div class="icon"><i class="fa fa-user"></i></div>
                                    <div class="contact-info">
                                        <p>Recruiter Name: <span>Gabriel Lorenzo</span></p>
                                    </div>
                                </div>
                                <div class="contact-details">
                                    <div class="icon"><i class="fa fa-phone"></i></div>
                                    <div class="contact-info">
                                        <p>Contact Company: <span>768-456-8841</span></p>
                                    </div>
                                </div>
                                <div class="contact-details">
                                    <div class="icon"><i class="fa fa-share"></i></div>
                                    <div class="contact-info">
                                        <p>Website: <span>lorenzobrokerage.com</span></p>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>  
</section>
@endsection   