@extends('layouts.home')

@section('content')
<div class=""></div>
<div class="clear"></div>
<section class="slider_abouts">

<div class="search_bar_listing">
    <!--------header search starts------------->
 
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="search-bar-inner text-center">

                    <form action="/findjob/search" method="GET">                      
                        <div class="searh_new_1">
                           <div class="form-row">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" title="Search" placeholder="Search" name="search">  
                                    <div id="jobkeyword-box" class="common-serach-box" style="display: none"></div>
                                </div>
                                <div class="col-md-3">
                                    <select name="category" class="placeholder form-control" id="category">
                                        <option value="0">Any Category</option>
                                        @foreach($jobcategories as $id=>$jobcategories)
                                        <option value="{{$id}}">{{$jobcategories}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <select name="company" class="placeholder form-control" id="company">
                                        <option value="0">Any Company</option>
                                        @foreach($companies as $company)
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <div class="sr_butn">
                                        <input class="form-control btn_submit" id="search" type="submit" value="Search">
                                    </div>
                                </div>
                           </div>
                        </div>
                    </form>                    
                    </div>
                </div>
            </div>
        </div>
    </div>

</section> 

    <!------------------------------filter starts left side------------------------------------------>
    
    <section class="jovb_list-overfellow" id="filterSection">
        <div class="container">
            <div id="listID">

    <!----starts section of founded listed jobs by main search or filter search---->

    <div style="width:100%;"></div>    
    <div class="row">

    @if(count($jobs) > 0)
    <!--right filter Section starts-->
    @foreach($jobs as $row)
            <div class="col-lg-6 col-md-12  ">
                <div class="job-list-wrapper">
                    <div class="job-post-list mt-4">

                        <div class="single-job">
                            <div class="logo">                 
                                    <img src="/uploads/avatar/admin/{{$row->company->company_logo}}" alt="No Image">           
                                </a>
                            </div>

                            <div class="job-meta">
                                <div class="title">
                                    <h4>
                                        @auth('web')
                                        <a href="/jobseeker/jobs/{{ $row->id}}-{{Str::slug($row->title)}}">{{ucwords($row->title)}}</a>
                                        @endauth

                                        @guest
                                        <a href="/jobs/{{ $row->id}}-{{Str::slug($row->title)}}">{{ucwords($row->title)}}</a>
                                        @endguest
                                    </h4>
                                </div> 
                                <div class="meta-info d-flex">
                                    <p><i class="fa fa-building" aria-hidden="true"></i>{{$row->company->name}}</p>
                                    <p><i class="fa fa-map-marker" aria-hidden="true"></i>{{$row->location}}</p>
                                    <p><i class="fa fa-calendar" aria-hidden="true"></i>{{ Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</p>
                                </div>
                            </div>

                            <div class="timing ml-auto">
                                <span class="time-btn1 time-btn">{{$row->work_type}}</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
@endforeach
    </div>
</div>

@else
    <div class="listing_box_full">
        <div class="listing_full_row listing_full_row_bg">
            <div class="nomatching"> 
                <h1>There are no jobs matching for your search criteria.</h1>
                <h3>Please searched with other options.</h3>
            </div>
        </div>
    </div>
@endif      
    <div class="paging pagingsrt"  style="width:100%;">
        <div class="paging" style="width:100%;">
            <div class="noofproduct">
                No. Records {{ $jobs->firstItem() }} - {{ $jobs->lastItem() }}
                of {{$jobs->total()}}
            </div>

            <div class="paginations">
                 {{ $jobs->appends(request()->except('page'))->links() }}
            </div>  
        </div>
    </div>
                  </div>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection   
