@extends('layouts.homeadmin')

@section('content')
<div id="toTop">Top</div>                     
<style type="text/css">
    .top_bt_action ul li{display: inline-block; vertical-align: middle;}
    .top_bt_action ul li .back_bt_ini{margin-left: 5px;}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<div class="inner_page_top_bg_null"></div>
<div class="clear"></div>
<div class="iner_pages_formate_box">
    <div class="wrapper">
        <br>
        <div style="width:100%;">
    </div>        
    <div class="iner_form_bg_box">

        <div class="newcleft">
        <div class="inr_firm_roq_left inr_firm_roq_nabws_left">
            <div class="areal_img_box">
                <img src="/uploads/avatar/{{$user->avatar}}" width="100%" alt=""/>                
            </div>
        </div>

        <div class="inr_firm_roq inr_firm_roq_nabws">
            <div class="top_page_name_box">
                <div class="page_name_boox page_name_boox_small ffd">
                    <span>{{$user->last_name}} {{$user->first_name}}</span>
                </div>
           <div class="top_bt_action">
                    <ul>
                        <li>
                            <div class="back_bt_ini">
                                <a href="{{ redirect()->getUrlGenerator()->previous() }}" class="back_navy fa fa-reply" title="Back"></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="clear"></div>

                <div class="ful_row_ddta">
                    <span class="blue">Email Address:</span>
                    <span class="grey">{{$user->email}}</span>
                </div>
                
                <div class="ful_row_ddta">
                    <span class="blue">Gender:</span>
                    <span class="grey">{{$user->gender}}</span>
                </div>

                <div class="ful_row_ddta">
                    <span class="blue">Contact Number:</span>
                    <span class="grey">{{$user->contact_number}}</span>
                </div>

                <div class="ful_row_ddta">
                    <span class="blue">Date of Birth:<pre>(yy/mm/dd)</pre></span>
                    <span class="grey">{{ $user->birthday}}
</span>
                </div>

                <div class="ful_row_ddta">
                        <span class="blue">Address:</span>
                        <span class="grey">{{$user->address}}</span>
                </div>
                
                <div class="ful_row_ddta">
                        <span class="blue">Interest Category:</span>
                        <span class="grey">{{$user->interest}}</span>
                </div>

        </div>



            <div class="clear"></div>

@if(count($user->education) > 0) 
            <div class="ekdiv">
                <div class="noft">Education</div>
                <div style="overflow: auto;  clear: both; float: left; width: 100%;">
                    <div class="job_content" >
                        <ul class="job_heading">
                            <li>Qualification</li>
                            <li>Course Name</li>
                            <li>University/Institute</li>
                            <li>Passed</li>
                        </ul>
                        @foreach($user->education as $educations)
                        <ul class="job_list">
                            <li>{{ucwords($educations->qualification)}}</li>
                            <li>{{ucwords($educations->field_study)}}</li>
                            <li>{{ucwords($educations->school)}}</li>                
                            <li>{{ucwords($educations->month)}} {{ucwords($educations->year)}}</li>
                                  
                        </ul>
                        @endforeach
                    </div>
                </div>
            </div>
@endif

            
@if(count($user->experience) > 0)              
            <div class="ekdiv">
                <div class="noft">Experience </div>
                <div style="overflow: auto;  clear: both; float: left; width: 100%;">
                    <div class="job_content" >
                        <ul class="job_heading">
                            <li>Duration From</li>
                            <li>Duration To</li>
                            <li>Company</li>
                            <li>Position</li>
                            <li>Specialization</li>
                            <li>Role</li>
                        </ul>
                        
                        @foreach($user->experience as $experiences)
                        <ul class="job_list">
                            <li>{{ ucwords($experiences->from_month)}} {{$experiences->from_year}}</li>
                            <li>{{ ucwords($experiences->to_month)}} {{$experiences->to_year}}</li>
                            <li>{{ ucwords($experiences->company)}}</li>
                            <li>{{ ucwords($experiences->position)}}</li>
                            <li>{{ ucwords($experiences->specialization)}}</li>
                            <li>{{ ucwords($experiences->role)}}</li>
                                  
                        </ul>
                        @endforeach  
                    </div>
                </div>
            </div>
@endif

@if(count($user->language) > 0)
            <div class="ekdiv">
                <div class="noft">Language </div>
                <div style="overflow: auto;  clear: both; float: left; width: 100%;">
                    <div class="job_content" >
                        <ul class="job_heading">
                            <li>Language</li>
                            <li>Read</li>
                            <li>Write</li>
                            <li>Speak</li>
                        </ul>
                        
                        @foreach($user->language as $languages)
                        <ul class="job_list">
                            <li>{{ ucwords($languages->name)}}</li>
                            <li>{{$languages->read}}</li>
                            <li>{{$languages->write}}</li>
                            <li>{{$languages->speak}}</li>                                  
                        </ul>
                        @endforeach  
                    </div>
                </div>
            </div>
@endif

            
            <div class="clear"></div>

            <div class="ekdiv">
            <div class="noft">CV Document</div>
            <div class="clear"></div>
                <div class="data_row_ful_skil_content">
                    <div class="all-uploaded-images">
                        <div id="doc-557156923620341215" alt="" class="doc_fukll_name">
                            <span class="temp-image-section">
                                <i class="fa fa-file-pdf-o pdfDoc" aria-hidden="true"></i>
                                    <a href="/uploads/resume/{{$user->resume}}">{{$user->resume}}</a>    
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="clear"></div>
            <div class="clear"></div>
        </div>
                <div class="newcright">
@if(count($user->skill) > 0)
                    <div id="similertalentprofile" class="y-hd item-box seven">
                        <div class="mediumlightgray fn-bold" >
                            Skills
                        </div>
                        @foreach($user->skill as $skills)
                        <ul class="list-unstyled" >
                                <div class="media">
                                    <div class="media-body">
                                        <h7 class="media-heading darkgrayfont profName color-333 box-title">
                                            {{ ucwords($skills->name)}}
                                        </h7>
                                        <span class="lightgrayfont color-7f">{{$skills->score}}</span>
                                    </div>
                                </div>
                        </ul>
                        @endforeach
                    </div>
@endif

                    <div id="similertalentprofile" class="y-hd item-box seven">
                        <div class="mediumlightgray fn-bold" >
                            About Self
                        </div>
                            <div class="media-body">
                                <span style="text-align: justify;"class="lightgrayfont color-7f">{{$user->description}}</span>
                            </div>
                    </div>

@if(count($user->experience) > 0)
                    <div id="similertalentprofile" class="y-hd item-box seven">
                        <div class="mediumlightgray fn-bold" >
                            Experience
                        </div>
                        @foreach($user->experience as $experiences)
                        <ul class="list-unstyled" >
                            <li>
                                <div class="media">
                                    <div class="media-body">
                                        <h7 class="media-heading darkgrayfont profName color-333 box-title">
                                            {{ ucwords($experiences->company)}}
                                        </h7>
                                        <span class="lightgrayfont color-7f">{{$experiences->experience_description}}</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        @endforeach
                    </div>
@endif
                </div>
        </div>
    </div>
</div>
@endsection  