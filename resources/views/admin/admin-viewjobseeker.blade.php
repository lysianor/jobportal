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
        <div class="col-xs-12 col-sm-3 col-md-9 col-lg-9">
                    <div class="info_dv">

                        <div class="heads"><i class="fa fa-id-card">&nbsp;View Jobseeker</i>                         
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
                        <div class="job_scroll">
                            <div id="loaderID" style="display:none;position:absolute;margin-left:100px;margin-top:250px"><img src="/img/loader_large_blue.gif" alt=""/></div>
                            <div id='listID'>
                                <div class="over_flow_auto_sigr">
@if(count($user) > 0)


    <div class="job_content" >
        <div class="input-group mb-3">
            <a href="{{ url('/admin/jobseeker/export-users') }}" title="Export User" class="btn btn-primary btn-sm">Export</a>
        </div>
    <table id="viewjobseekertable" class="display" style="width:100%">
            <thead>
                <tr class="job_heading">
                    <th>Status</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user as $users)
                <tr class="job_list">
                    <td>
                        @if($users->verified == 1)
                            <span class="label label-success">Active</span>
                        @else
                            <span class="label label-danger">Inactive</span>
                        @endif  
                    </td>
                    <td>{{ ucwords($users->first_name)}} {{ ucwords($users->last_name)}}</td>
                    <td>{{ $users->email}}</td>
                    <td>{{ $users->gender}}</td>
                    <td>{{ $users->contact_number}}</td>
                    <td>
                        <a style="font-size: 20px;color:#1E90FF;" class="fa fa-eye" title="View" href="view/{{ $users->id}}-{{Str::slug($users->last_name)}}" role="button"></a>
                    </td>
                    @endforeach
                </tr>
        </tbody>
    </table>
    </form>
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
    $('#viewjobseekertable').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "columnDefs": [{"className": "dt-center", "targets": "_all"}]
    });
} );
</script>
@endsection 