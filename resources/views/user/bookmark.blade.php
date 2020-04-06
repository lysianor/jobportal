@extends('layouts.homeuser')

@section('content')
<div class="image_sec" style="background: url(../images/profile_banner.png">
    <div class="container">
    <div class="row">
          
        <div class="col-lg-12">
            <div class="profile_img">
                <img src="/uploads/avatar/{{ Auth::user()->avatar }}" alt="Profile Picture"/>            
            </div>

            <div class="profilie_right">
                <em>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</em>
            </div>
        </div>
        </div>
    </div>    
 </div>
    <div class="account_cntn">
        <div class="container">
            <div class="my_acc">
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
@include ('dashboard.dashboarduser')                 
        <div class="col-xs-12 col-sm-3 col-md-9 col-lg-9">
                    <div class="info_dv">

                        <div class="heads"><i class="fa fa-heart">&nbsp;Bookmark Jobs</i>                          
                            <div class="job" style="float:right !important;">
                            </div>
                        </div>

                        <div class="information_cntn">
                            <div style="width:100%;"></div>    
               @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success')}}
                    </div>
                @endif
                @if(session('warning'))
                    <div class="alert alert-warning">
                        {{ session('warning')}}
                    </div>
                @endif

                            <div class="listing_page">
@if(count($jobs) > 0)    
                                <div class="job_scroll">
                                    <div id="loaderID" style="display:none;position:absolute;margin-left:100px;margin-top:250px"><img src="/img/loader_large_blue.gif" alt=""/></div>
                                    <div id='listID'>

                    {{-- Search --}}
{{--                     <form action="/admin/tag/search" method="GET"> --}}
                        <div class="rght_srch">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" title="Search" placeholder="Search" id="searchtextField" name="search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" id="searchButton" title="Search" type="submit" disabled>Search</button>
                                </div>
                            </div>
                        </div>
{{--                     </form> --}}
                                        <div class="over_flow_auto_sigr">
                        <div id="dynamic0" class="dynamiccc">
    <div class="job_content" >
        
        <ul class="job_heading">
            <li>Job Title</li>
            <li>Job Type</li>
            <li>Applied Date</li>
            <li>Action</li>

        </ul>
        @foreach($jobs as $row)
        <ul class="job_list">
            <li>{{ ucwords($row->title)}}</li>
            <li>{{ ucwords($row->work_type)}}</li>
            <li>{{ Carbon\Carbon::parse($row->created_at)->toFormattedDateString()}}</li>
            <li><a href="/jobseeker/jobs/{{$row->id}}-{{Str::slug($row->title)}}" style="font-size: 20px;color: #1E90FF;" class="fa fa-eye" title="View"></a>&nbsp;

            <form id="delete-form-{{$row->id}}" method="post" action="{{ route('bookmark.destroy', $row->id) }}" style="display: none;">
                    @csrf
                    {{ method_field('DELETE')}}
            </form> 


                <a href="" style="font-size: 20px;color:red;" title="Delete" class="fa fa-trash"  onclick="
                    if(confirm('Are you sure you want to Delete ?'))
                        {
                            event.preventDefault();
                            document.getElementById('delete-form-{{ $row->id}}').submit();

                        }else{
                            event.preventDefault();}"></a>                
            </li>

            </li>
        </ul>
        @endforeach
                </div>

</div>
@else
    <div class="listing_page">
        <div class="job_scroll">
            <div id="loaderID" style="display:none;position:absolute;margin-left:0px;margin-top:250px"></div>
            <div id="listID">
                <div class="no_found">No record found.</div>
            </div>
        </div>
    </div>
@endif
    
                                    </div>

                                </div>
                            </div>
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var searchButton = document.getElementById("searchButton");
    var searchtextField = document.getElementById("searchtextField");

    searchtextField.onkeyup = function(){
        if (searchtextField.value == "") {
            searchButton.disabled = true;
        } else {
            searchButton.disabled = false;
        }
    }
</script>
@endsection 