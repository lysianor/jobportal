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

                        <div class="heads"><i class="fa fa-tag">&nbsp;Tag</i>                           
                            <div class="job" style="float:right !important;">

                                <i class="fa fa-plus"><a href="{{route ('admin.admin-createtag')}}" title="Add Tag">&nbsp;Add</a></i>
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

@if(count($tag) > 0)
<div class="job_content" >
        <div class="input-group mb-3">
            {{-- <form action="{{url('admin/tag/deleteall/')}}" method="POST">
                @csrf
            <button name="submit" id="delete_all"  class="btn btn-danger btn-sm" title="Delete Selected" type="submit" disabled>Delete Selected</button> --}}
        </div>
        <table id="tagtable" class="display" style="width:100%">
            <thead>
                <tr class="job_heading">
                    {{-- <th><input name="delallid[]" type="checkbox" class="selectall"></th> --}}
                    <th>Tag</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tag as $row)
                <tr class="job_list">
                    {{-- <td><input name="delallid[]" value="{{$row->id}}"  type="checkbox"  class="selectbox"></td> --}}
                    <td>{{ ucwords($row->tag)}}</td>
                    <td>{{ Carbon\Carbon::parse($row->created_at)->toFormattedDateString()}}</td>
                    <td>{{ Carbon\Carbon::parse($row->updated_at)->diffForHumans()}}</td>
                    <td>
                        <a class="label label-primary" title="Edit" href="{{route('admin.admin-edittag', $row->id)}}" role="button">EDIT</a>&nbsp;
                        <a href="{{url("admin/tag/delete/{$row->id}")}}" title="Delete" class="label label-danger" onclick="return confirm('Are you sure you want to delete this item?');">DELETE</a> 
                    </td>
                </tr>
        @endforeach
        
        </tbody>
    </table>
    </form>
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
    $('.selectall').click(function(){
        $('.selectbox').prop('checked', $(this).prop('checked'));
        $('.selectall2').prop('checked', $(this).prop('checked'));
    })
    $('.selectall2').click(function(){
        $('.selectbox').prop('checked', $(this).prop('checked'));
        $('.selectall').prop('checked', $(this).prop('checked'));
    })
    $('.selectbox').change(function(){
        var total = $('.selectbox').length;
        var number = $('.selectbox:checked').length;
        if(total == number){
            $('.selectall').prop('checked', true);
            $('.selectall2').prop('checked', true);
        } else{
            $('.selectall').prop('checked', false);
            $('.selectall2').prop('checked', false);            
        }
    })
</script>

<script>
    $( ".selectall" ).on( "click", function() {
        if($( ".selectall:checked" ).length > 0)
        {
            $('#delete_all').prop('disabled', false);
        }else{
            $('#delete_all').prop('disabled', true);
        }  
    });
</script>

<script>
    $( ".selectbox" ).on( "click", function() {
        if($( ".selectbox:checked" ).length > 0)
        {
            $('#delete_all').prop('disabled', false);
        }else{
        $('#delete_all').prop('disabled', true);
        }  
    });
</script>
<script>
    $(document).ready(function() {
    $('#tagtable').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "columnDefs": [{"className": "dt-center", "targets": "_all"}]
    });
} );
</script>
@endsection 