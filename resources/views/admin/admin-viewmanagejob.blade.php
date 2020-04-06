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
          
        <div class="heads">{{ucwords($jobs->title)}}                        
            <div class="job links_bbosks">
                <a href="{{route('admin.admin-editjob', $jobs->id)}}" title="Edit" rel="nofollow"><i class="fa fa-edit"></i></a>
                <form id="delete-form-{{$jobs->id}}" method="post" action="{{ url('admin/manage/job', $jobs->id) }}" style="display: none;">
                    @csrf
                    {{ method_field('DELETE')}}
            </form> 
                        
                <a href="" title="Delete"   onclick="
                    if(confirm('Are you sure you want to Delete ?'))
                        {
                            event.preventDefault();
                            document.getElementById('delete-form-{{ $jobs->id}}').submit();

                        }else{
                            event.preventDefault();}"><i class="fa fa-trash"></i></a>
                <a href="/jobs/{{ $jobs->id}}-{{Str::slug($jobs->title)}}" title="View" rel="nofollow"><i class="fa fa-eye"></i></a>                               
        

            </div>
        
        </div>

                                                
        <div class="information_cntn">
            <div style="width:100%;"></div>    

        <div class="listing_page">

            <div class="wow_div"><br>

            
                <div class="leftin_wow"> 
{{--                     <div class="stst_img">
                        <a href="/jobs/deactive/data-encoder-civil-registry" rel="nofollow" onclick="if (confirm(&quot;Are you sure you want to deactivate this job? &quot;)) { return true; } return false;"><img src="/img/front/toggle_active.png" alt=""/></a>                                        
                    </div> --}}
                    <div class="gitust">
                        <div><i>Created</i><em>{{$jobs->created_at->toFormattedDateString()}}</em></div>
                        {{-- <input type="text" name="visitCount" value="{{$jobs->visit_count}}" id="postVisitCount"> --}}
                    </div> 
                </div><br><br><br><br>

                {{-- <div class="righting_wow">

                    <div class="calcultn">
                        <div class="left_side_calu">
                            <i class="fa fa-search icon_calcultn"></i>
                        </div>
                        <div class="right_side_calu">
                            <i>49</i>
                            <div class="clr"></div>
                            <em>Search Views</em>
                        </div>
                    </div>

                    <div class="calcultn">
                        <div class="left_side_calu">
                            <i class="fa fa-suitcase icon_calcultn"></i>
                        </div>
                        <div class="right_side_calu">
                            <i>51</i>
                            <div class="clr"></div>
                            <em>Job Views</em>
                        </div>
                    </div>
                    <div class="calcultn">
                        <div class="left_side_calu">
                            <i class="fa fa-clock-o icon_calcultn"></i>
                        </div>
                        <div class="right_side_calu">
                            <i>1</i>
                            <div class="clr"></div>
                            <em>Applications</em>
                        </div>
                    </div> --}}
                </div>

            </div>

            <div class="wow_tab">
                <ul>
                    <li id="jobtab1" class="ttt active"><a href="javascript:void(0);" onclick="changeTab(1)">Jobseekers</a></li>
                    <li id="jobtab2" class="ttt"><a href="javascript:void(0);" onclick="changeTab(2)">Job Details</a></li> 
                </ul>
            </div>
            
            <div class="jjj" id="job1" style="display: none1;">

                <div class="detl_scroll">
                    {{-- <div class="search_full"> --}}
                         @if(count($applicants) > 0)
                        <div class="left_dbv">
                            {{-- <ul>
                                <li id="activebu" class="awei">
                                    <i>Active</i>
                                    <div class="clr"></div>
                                    <a href="javascript:void(0);" class="search_by_status" status=""><span class="numbvering"  onclick="getactive('activebu')">0</span></a>
                                </li>

                                <li id="Shortlist" class="awei">
                                    <i>Shortlist</i>
                                    <div class="clr"></div>
                                    <a href="javascript:void(0);" class="search_by_status" status="short_list"><span class="numbvering"  onclick="getactive('Shortlist')">0</span> </a>
                                </li>

                                <li id="Interview" class="awei">
                                    <i>Interview</i>
                                    <div class="clr"></div>
                                    <a href="javascript:void(0);" class="search_by_status" status="interview"><span class="numbvering"  onclick="getactive('Interview')">0</span> </a>
                                </li>

                                <li id="Offer" class="awei">
                                    <i>Offer</i>
                                    <div class="clr"></div>
                                    <a href="javascript:void(0);" class="search_by_status" status="offer"> <span class="numbvering"  onclick="getactive('Offer')">0</span> </a>
                                </li>

                                <li id="Accept" class="awei">
                                    <i>Accept</i>
                                    <div class="clr"></div>
                                    <a href="javascript:void(0);" class="search_by_status" status="accept"><span class="numbvering"  onclick="getactive('Accept')">0</span> </a>
                                </li>

                                <li id="Notsuitable" class="awei">
                                    <i>Not suitable</i>
                                    <div class="clr"></div>
                                    <a href="javascript:void(0);" class="search_by_status" status="not_suitable"><span class="numbvering"  onclick="getactive('Notsuitable')">1</span> </a>
                                </li>
                                <li id="Total" class="awei">
                                    <i>Total</i>
                                    <div class="clr"></div>
                                    <a href="javascript:void(0);" class="search_by_status" status=""><span class="numbvering"  onclick="getactive('Total')">1</span> </a>
                                </li>
                                <li class="awei newda">
                                    <i>New</i>
                                    <div class="clr"></div>
                                    <span class="numbvering" id="New" onclick="getactive('New')">0</span> 
                                </li>

                            </ul>
                        </div>
                        <form action="/jobs/accdetail" method="post" name="searchApplyCandidate" enctype="multipart/form-data" id="searchApplyCandidate" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/>
                        </div>                                            

                        <div class="rght_srch">
                            <div class="srch_iputwa">
                                <input name="data[JobApply][keyword]" maxlength="255" label="" class="" autocomplete="off" placeholder="Search" id="searchcc" type="text"/>                                                
                            </div>
                   
                        </div>
                        </form>

 --}}
                    </div>

                    <div id="listID">
                        <script type="text/javascript" src="/js/listing.js"></script>
                        <script type="text/javascript" src="/js/facebox.js"></script>
                        <link rel="stylesheet" type="text/css" href="/css/facebox.css"/>

    <div id="listingJS" style="display: none;" class="alert alert-success alert-block fade in"></div>
    <div id="loaderID" style="display:none;width: 50%;position:absolute;text-align: center;margin-top:191px"><img src="https://job-board-portal-script.logicspice.com/app/webroot/img/loading.gif" alt=""/></div>

    <div class="table_over_auto_div">
        {{-- <div class="detl_content">

            <ul class="detl_heading">

                <li>
                    <input name="chkRecordId" value="0" onClick="checkAll(this.form)" type='checkbox' class="checkall" />
                </li>
                <li>Name</li>
                <li>Gender</li>
                <li>Contact no.</li>
                <li>Status</li> 
            </ul>
        @foreach($applicants->sortByDesc('created_at') as $applicant )
                <ul class="detl_list">

                    <li class="new_tested">
                        <input type="checkbox" id="listemail" onclick="javascript:isAllSelect(this.form);" name="chkRecordId" value="" />
                    </li>
                    <li>
                        <div class="candi_dtl">
                            <div class="candi_namer">
                                <a href="/admin/jobseeker/view/{{ $applicant->user_id}}-{{Str::slug($applicant->last_name)}}">{{ $applicant->status }} {{ $applicant->first_name }}</a> 
                            </div>
                           
                            <div class="candi_dte">
                                <i class="fa fa-calendar" ></i>
                                <em>{{ Carbon\Carbon::parse($applicant->created_at)->toFormattedDateString()}}</em></div>
                            <div class="candi_options"></div>
                        </div>
                    </li>

                    <li>{{ $applicant->gender }}</li>

                    <li>{{ $applicant->contact_number }}</li>
                    
                    <li>
                        <div class="status_select">
                            <div id="loaderIDAct157" style="display:none;position:absolute;margin:0px 0 0 4px;z-index: 9999;"><img src="https://job-board-portal-script.logicspice.com/app/webroot/img/loading.gif" alt=""/></div>
                                <select name="data[JobApply][apply_status]" class="required" onchange="location = this.value;" candidate_id="157" id="JobApplyApplyStatus">
                                    <option value="">Select Status</option>
                                    <option value="/admin/manage/job/proposal/{{ $jobs->id }}/{{$applicant->user_id}}/shortlistt" {{ $applicant->status == 'Shortlist' ? 'selected' : ''}}>Shortlist</option>
                                    <option value="/admin/manage/job/proposal/{{ $jobs->id }}/{{$applicant->user_id}}/interview" {{ $applicant->status == 'Interview' ? 'selected' : ''}}>Interview</option>
                                    <option value="/admin/manage/job/proposal/{{ $jobs->id }}/{{$applicant->user_id}}/approved" {{ $applicant->status == 'Approved' ? 'selected' : ''}}>Approved</option>
                                    <option value="/admin/manage/job/proposal/{{ $jobs->id }}/{{$applicant->user_id}}/decline" {{ $applicant->status == 'Decline' ? 'selected' : ''}}>Decline</option>
                                </select>
                        </div> 
                    </li>
                </ul>
                @endforeach
                
            
        </div> --}}
    <form action="{{url('admin/tag/deleteall/')}}" method="POST">
        @csrf
         <table id="jobcategorytable" class="display" style="width:100%">
            <thead>
                <tr class="job_heading">
                    <th><input name="selallid[]" type="checkbox" class="selectall"></th>
                    <th>Status</th>
                    <th>Name</th>
                    <th>Applied Date</th>
                    <th>Gender</th>
                    <th>Contact Number</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
               @foreach($applicants->sortByDesc('created_at') as $applicant )
                <tr class="job_list">
                    <th><input name="selallid[]" value="{{$applicant->id}}"  type="checkbox" id="{{$applicant->id}}"  class="selectbox"></th>
                    <th>
                        @if ($applicant->status === 'Pending')
                            <span class="label label-default">Pending</span>
                        @elseif ($applicant->status === 'Shortlist')
                            <span class="label label-primary">Shortlist</span>
                        @elseif ($applicant->status === 'Interview')
                            <span class = "label label-info">Interview</span>
                        @elseif ($applicant->status === 'Approved')
                            <span class="label label-success">Approved</span>
                        @elseif ($applicant->status === 'Decline')
                            <span class="label label-danger">Decline</span>
                        @endif
                    </th>
                    <td><a href="/admin/jobseeker/view/{{ $applicant->user_id}}-{{Str::slug($applicant->last_name)}}">{{ $applicant->last_name }} {{ $applicant->first_name }}</a></td>
                    <td>{{ Carbon\Carbon::parse($applicant->created_at)->toFormattedDateString()}}</td>
                   <td>{{ $applicant->gender }}</td>
                   <td>{{ $applicant->contact_number }}</td>
                   <td>
                        <select name="data[JobApply][apply_status]" class="required" onchange="location = this.value;" candidate_id="157" id="JobApplyApplyStatus">
                                    <option value="">Select Status</option>
                                    <option value="/admin/manage/job/proposal/{{ $jobs->id }}/{{$applicant->user_id}}/shortlistt" {{ $applicant->status == 'Shortlist' ? 'selected' : ''}}>Shortlist</option>
                                    <option value="/admin/manage/job/proposal/{{ $jobs->id }}/{{$applicant->user_id}}/interview" {{ $applicant->status == 'Interview' ? 'selected' : ''}}>Interview</option>
                                    <option value="/admin/manage/job/proposal/{{ $jobs->id }}/{{$applicant->user_id}}/approved" {{ $applicant->status == 'Approved' ? 'selected' : ''}}>Approved</option>
                                    <option value="/admin/manage/job/proposal/{{ $jobs->id }}/{{$applicant->user_id}}/decline" {{ $applicant->status == 'Decline' ? 'selected' : ''}}>Decline</option>
                                </select>
                    </td>
                </tr>
        @endforeach
        </form>
        </tbody>
    </table>
    </div>
    <div id="actdiv" class="outside">
        <div class="block-footer mogi">
            {{-- <input name="data[JobApply][idList]" type="hidden" value="" id="idList"/>            <input name="data[JobApply][action]" type="hidden" value="email" id="action"/>            <input update="listID" indicator="loaderID" class="btn btn-success btn-cons" value="Send Email" id="submit753192612" onclick="return false;" type="submit"/><script type="text/javascript">

$("#submit753192612").bind('click', function(){ if (confirm('Are you sure you want to Send Email?')) { if (isAnySelect(this.form)) { setAction('email');; $.ajax({async:true, type:'post', beforeSend:function(request) {$('#loaderID').show();}, complete:function(request, json) {$('#listID').html(request.responseText); showMessage('activated');$('#loaderID').hide()}, url:'/admin/manage/job', data:$(this).parents('form:first').serialize()}); }; } else { return false; } })

</script>  --}}

<!-- Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="selectall" class="btn btn-success btn-cons" {{-- onclick="return confirm('Are you sure you want to Send Email??');" --}} disabled>
  Send Email
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">
        <label class="col-sm-3 control-label">To :</label>
        <div class="col-sm-9">
            <input type="text" class="form-control has-error" id="name" name="email" placeholder="To" value="">
        </div>

        <label class="col-sm-3 control-label">Subject :</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="details" name="email" placeholder="Subject" value="">
        </div>

        <label class="col-sm-3 control-label">Message :</label>
        <div class="col-sm-9">
            <textarea rows="4" cols="50" type="text" class="form-control" id="details" name="email" placeholder="Message" value=""></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Send</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->
             

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

    <div id="info557"
         style="display: none;">
        <!-- Fieldset -->
        <div class="nzwh-wrapper">
            <fieldset class="nzwh">
                <legend class="nzwh">
                    Cover Letter
                </legend>
                <div class="drt">
                    <span></span> 
                    <span></span>   <br/>
                </div>
            </fieldset>
        </div>

    </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="jjj" id="job2" style="display: none;">
                                    <div class="search_full">

                                        <div class="form_lst">
                                            <label>Category</label>
                                            <span class="rltv"><em>
                                                {{ucwords($jobs->jobcategory->jobcategory)}} 
                                                
                                            </em></span>
                                        </div>
                                        
                                        {{-- <div class="form_lst">
                                            <label>Contact Number </label>
                                            <span class="rltv"><em>
                                                {{$jobs->contact_number}} 
                                            </em></span>
                                        </div> --}}

                                        <div class="form_lst">
                                            <label>Location </label>
                                            <span class="rltv"><em>
                                                {{$jobs->location}}  
                                            </em></span>
                                        </div>

                                        <div class="form_lst">
                                            <label>Work Type </label>
                                            <span class="rltv"><em>
                                                {{$jobs->work_type}} 
                                            </em></span>
                                        </div>

                                        <div class="form_lst">
                                            <label>Description </label>
                                            <span class="rltv"><em>
                                                {!! $jobs->description !!}
                                            </em></span>
                                        </div>

                                        <div class="form_lst">
                                            <label>Salary </label>
                                            <span class="rltv"><em>
                                                {{$jobs->salary}}                                                
                                            </em></span>
                                        </div>
                                        <div class="form_lst">
                                            <label>Experience </label>
                                            <span class="rltv"><em>
                                                {{$jobs->experience}}        
                                            </em></span>
                                        </div>

                                        <div class="form_lst">
                                            <label>Company Name </label>
                                            <span class="rltv"><em>
                                                {{ucwords($jobs->company->name)}}
                                            </em></span>
                                        </div>
                                        <div class="form_lst">
                                            <label>Company profile </label>
                                            <span class="rltv"><em>
                                                {!! $jobs->company->description !!}
                                            </em></span>
                                        </div>

                                        <div class="form_lst">
                                            <label>Contact Number </label>
                                            <span class="rltv"><em>
                                                {{$jobs->company->contact_number}} 
                                            </em></span>
                                        </div>

                                        <div class="form_lst">
                                            <label>Website </label>
                                            <span class="rltv"><em>
                                                {{$jobs->company->website}} 
                                            </em></span>
                                        </div>

                                        <div class="form_lst">
                                            <label>Email </label>
                                            <span class="rltv"><em>
                                                {{$jobs->company->email}} 
                                            </em></span>
                                        </div>
                                        
                                        <div class="form_lst">
                                            <label>Tag</label>
                                            <span class="rltv"><em>
                                                @foreach($jobs->tags as $tag)
                                                    {{ucwords($tag->tag)}}
                                                @endforeach                        
                                            </em></span>    
                                        </div>

                                        {{-- <div class="form_lst">
                                            <label>Company Website </label>
                                            <span class="rltv"><em>
                                                <a href='http://google.com' target='_blank'>http://google.com</a> 
                                            </em></span>
                                        </div> --}}

                                        {{-- <div class="form_lst">
                                            <label>Logo </label>
                                            <span class="rltv"><em>
                                                <img src="/img/front/no_image_logo.png" alt=""/>
                                            </em></span>
                                        </div> --}}

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
    function changeTab(id) {
        $('.ttt').removeClass('active');
        $('.jjj').hide('');
        $('#job' + id).show();
        $('#jobtab' + id).addClass('active');
    }

</script>

<script>
    let visitCount = document.getElementById('postVisitCount').value;
    let visitCountPlusOne = parseInt(visitCount) + 1;

    document.getElementById('postVisitCount').value = visitCountPlusOne;
</script>

<script type="text/javascript">
    
        function getactive(id){
          
            $('.awei').removeClass('newda');
            $('#' + id).addClass('newda');
        }
    $(document).ready(function ($) {
        $('.close_image').hide();
        $('a[rel*=facebox]').facebox({
            loadingImage: 'https://job-board-portal-script.logicspice.com/app/webroot/img/loading.gif',
            closeImage: 'https://job-board-portal-script.logicspice.com/app/webroot/img/close.png'
        });



        $('#searchApplyCandidate').submit(function () {
            $.ajax({
                type: 'POST',
                url: "https://job-board-portal-script.logicspice.com/jobs/accdetail/sample",
                                cache: false,
                                data: $('#searchApplyCandidate').serialize(),
                                beforeSend: function () {
                                    $("#loaderID").show();
                                },
                                complete: function () {
                                    $("#loaderID").hide();
                                },
                                success: function (result) {
                                    $('#listID').html(result);
                                }
                            });
                            return false;
                        });

                        $('.search_by_status').click(function () {
                            var status = $(this).attr('status');
                            $.ajax({
                                type: 'POST',
                                url: "https://job-board-portal-script.logicspice.com/jobs/accdetail/sample" + '/' + status,
                                                cache: false,
                                                data: $('#searchApplyCandidate').serialize(),
                                                beforeSend: function () {
                                                    $("#loaderID").show();
                                                },
                                                complete: function () {
                                                    $("#loaderID").hide();
                                                },
                                                success: function (result) {
                                                    $('#listID').html(result);
                                                }
                                            });
                                            return false;
                                        });
                                    });


                                    function updateStatus(data) {
                                        var can_id = $(data).attr('candidate_id');
                                        var status = $(data).val();
                                        if (status == '')
                                        {
                                            status = 'active';
                                        }

                                        $.ajax({
                                            type: 'POST',
                                            url: "https://job-board-portal-script.logicspice.com/jobs/accdetail/sample//page:1 ",
                                            cache: false,
                                            data: {'data[JobApply][keyword]': $('#searchcc').val(), 'data[JobApply][status_change]': status, 'data[JobApply][candidate_id]': can_id},
                                            beforeSend: function () {
                                                $("#loaderID").show();
                                            },
                                            complete: function () {
                                                $("#loaderID").hide();
                                            },
                                            success: function (result) {
//                                                $('#listID').html(result);
                                                window.location.reload();
                                            }
                                        });
                                        return false;

                                    }

                                    function updateStatus11(data) {
                                        var can_id = $(data).attr('candidate_id');
                                        var status = $(data).val();
                                        if (status == '')
                                        {
                                            status = 'active';
                                        }
                                        //$('#loaderIDAct'+can_id).show(); 
                                        window.location.href = "https://job-board-portal-script.logicspice.com/jobApplies/changeCandidateStatus/" + can_id + "/" + status;
//        $.ajax({
//            type : 'POST',
//            url: "/jobApplies/changeCandidateStatus/"+can_id+"/"+status,
//            cache: false,
//            success: function(result) {
//                $('#loaderIDAct'+can_id).hide();
//            }
//        });
                                    }

</script>
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
            $('#select_all').prop('disabled', false);
        }else{
            $('#select_all').prop('disabled', true);
        }  
    });
</script>
<script>
    $( ".selectbox" ).on( "click", function() {
        if($( ".selectbox:checked" ).length > 0)
        {
            $('#select_all').prop('disabled', false);
        }else{
        $('#select_all').prop('disabled', true);
        }  
    });
</script>
<script>
    $(document).ready(function() {
    $('#jobcategorytable').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "columnDefs": [{"className": "dt-center", "targets": "_all"}]
    });
} );
</script>
<script>
$(document).ready(function() {
  $("#selectall").click(function() {
    var select = [];
    $.each($("input[name='selallid']:checked"), function() {
      select.push($(this).val());
    });
    $('#exampleModal').modal('show').on('shown.bs.modal', function() {
      $("#name").html(+ select.join(", "));
    });
  });
});

</script>
@endsection