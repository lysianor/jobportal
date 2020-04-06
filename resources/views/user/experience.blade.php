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

                        <div class="heads"><i class="fa fa-black-tie">&nbsp;Experience</i>                          
                            <div class="job" style="float:right !important;">

                                <i class="fa fa-plus-circle" aria-hidden="true" title="Add Experience"><a href="{{route ('user.createexperience')}}">&nbsp;Add</a></i>
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
@if(count($experience) > 0)
                                <div class="job_scroll">
                                    <div id="loaderID" style="display:none;position:absolute;margin-left:100px;margin-top:250px"><img src="/img/loader_large_blue.gif" alt=""/></div>
                                    <div id='listID'>
                                        <div class="over_flow_auto_sigr">
                        <div id="dynamic0" class="dynamiccc">
    <div class="job_content" >
        <table id="experiencetable" class="display" style="width:100%">
            <thead>
                <tr class="job_heading">
                    <th>Duration From</th>
                    <th>Duration To</th>
                    <th>Company</th>
                    <th>Position</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($experience as $experiences)
                <tr class="job_list">
                    <td>{{ ucwords($experiences->from_month)}} {{$experiences->from_year}}</td>
                    <td>{{ ucwords($experiences->to_month)}} {{$experiences->to_year}}</td>
                    <td>{{ ucwords($experiences->company)}}</td>
                    <td>{{ ucwords($experiences->position)}}</td>
                    <td>
                        <a class="label label-primary" title="Edit" href="{{route('user.editexperience', $experiences->id)}}" role="button">EDIT</a>&nbsp;
                        <form id="delete-form-{{$experiences->id}}" method="post" action="{{ route('experience.destroy', $experiences->id) }}" style="display: none;">
                            @csrf
                            {{ method_field('DELETE')}}
                        </form> 
                        <a href="" title="Delete" class="label label-danger" onclick="
                            if(confirm('Are you sure you want to Delete ?'))
                                {
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $experiences->id}}').submit();

                                }else{
                                    event.preventDefault();}">DELETE</a> 
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
    $('#experiencetable').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "columnDefs": [{"className": "dt-center", "targets": "_all"}]
    });
} );
</script>
@endsection 