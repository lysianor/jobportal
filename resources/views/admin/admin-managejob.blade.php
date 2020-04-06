@extends('layouts.homeadmin')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<div class="image_sec" style="background-image: url(https://job-board-portal-script.logicspice.com/app/webroot/img/front/profile_banner.png)">
    <div class="container">
    <div class="row">
          
        <div class="col-lg-12">
            <div class="profile_img">
                <img src="/uploads/avatar/{{ Auth::user()->logo }}" alt=""/></div>

            <div class="profilie_right">
                <em>{{ Auth::user()->company }}</em>
                <b>(Administrator)</b>
            </div>
        </div>
        </div>
    </div>    
</div>

    <div class="account_cntn">
        <div class="container">
            <div class="row">
                <div class="my_acc">
                    <div class="col-lg-3 col-sm-3"> 
@include('dashboard.dashboardadmin') 

<div class="col-sm-9 col-lg-9 col-xs-12">
    <div class="info_dv">
        <div class="heads"><i class="fa fa-id-card">&nbsp;Manage Jobs</i>                            
            <div class="job" style="float:right !important;">
                <i class="fa fa-plus"><a href="{{route('admin.admin-createjob')}}" title="Add Job">&nbsp;Add Job</a></i>
            </div>
        </div>
        <div class="information_cntn">

            <div style="width:100%;"></div>
            @if (Session::has('success'))
                <div class="alert alert-success">{!! Session::get('success') !!}</div>
            @endif
            @if (Session::has('failure'))
                <div class="alert alert-danger">{!! Session::get('failure') !!}</div>
            @endif
                                   

            <div class="listing_page">
@if(count($jobs) > 0)                                                    
    <div class="job_scroll">
        <div id="loaderID" style="display:none;position:absolute;margin-left:0;">
            <img src="/img/loader_large_blue.gif" alt=""/></div>
        <div id='listID'>
            <link rel="stylesheet" type="text/css" href="/css/front/sweetalert.css"/>
            <script type="text/javascript" src="/js/front/sweetalert.min.js"></script>
            <script type="text/javascript" src="/js/front/sweetalert-dev.js"></script>
<div class="right_child_sec_over">
    <table id="managejobtable" class="display" style="width:100%">
        <thead>
            <tr class="job_heading">
                {{-- <th>Status</th> --}}
                <th>Job Title</th>
                <th>Work Type</th>
                <th>Posted On</th>
                <th>Updated Date</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($jobs as $job)
            <tr class="job_list">
                {{-- <td><a href="/jobs/deactive/data-encoder-civil-registry" rel="nofollow" onclick="if (confirm(&quot;&#039;Are you sure you want to deactivate this job&#039;?&quot;)) { return true; } return false;"><img src="/img/front/toggle_active.png" alt=""/></a>
                </td> --}}
                <td><a href="job/{{ $job->id}}">{{$job->title}}</a></td>
               
                <td>{{$job->work_type}}</td>
                
                <td>{{ Carbon\Carbon::parse($job->created_at)->toFormattedDateString()}}</td>
                <td>{{ Carbon\Carbon::parse($job->updated_at)->diffForHumans()}}</td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
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
    $(document).ready(function() {
    $('#managejobtable').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "columnDefs": [{"className": "dt-center", "targets": "_all"}]
    });
} );
</script>
@endsection