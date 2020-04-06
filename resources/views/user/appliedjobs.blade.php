@extends('layouts.homeuser')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

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

                        <div class="heads"><i class="fa fa-briefcase">&nbsp;Applied Jobs</i>                          
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
        <div class="over_flow_auto_sigr">
<div id="dynamic0" class="dynamiccc">
    <div class="job_content" >
        <table id="appliedjobs" class="display" style="width:100%">
            <thead>
                <tr class="job_heading">
                    <th>Job Title</th>
                    <th>Job Type</th>
                    <th>Applied Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                <tr class="job_list">
                    <td>{{ ucwords($job->title)}}</td>
                    <td>{{ ucwords($job->work_type)}}</td>
                    <td>{{ Carbon\Carbon::parse($job->created_at)->toFormattedDateString()}}</td>
                    <td>
                        @if ($job->status === 'Pending')
                            <span class="label label-default">Pending</span>
                        @elseif ($job->status === 'Shortlist')
                            <span class="label label-primary">Shortlist</span>
                        @elseif ($job->status === 'Interview')
                            <span class = "label label-info">Interview</span>
                        @elseif ($job->status === 'Approved')
                            <span class="label label-success">Approved</span>
                        @elseif ($job->status === 'Decline')
                            <span class="label label-danger">Decline</span>
                        @endif
                    </td>
                    <td>
                        <a href="/jobseeker/jobs/{{$job->id}}-{{Str::slug($job->title)}}" style="font-size: 20px;color: #1E90FF;" class="fa fa-eye" title="View"></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
    $(document).ready(function() {
    $('#appliedjobs').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "columnDefs": [{"className": "dt-center", "targets": "_all"}]
    });
} );
</script>
@endsection 