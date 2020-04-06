@extends('layouts.homeuser')

@section('content')
<div class="image_sec" style="background: url(/images/profile_banner.png">
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
<div class="col-xs-12 col-sm-6 col-md-9 col-lg-9">

                    <div class="info_dv info_dv_esdit_pre">
                        <div class="heads"><i class="fa fa-black-tie">&nbsp;Experience</i></div>
                        <div class="information_cntn" style="position:inherit !important;">
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

                    <form action="{{ route('experience.update', $experience->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf  
                            <div id="educationElement"  class="educationElement">
                               
                    {{-- <div class="colify-title">Please add your two highest education qualifications</div> --}}
                        <div id="dynamic0" class="dynamiccc">
                        <input type="hidden" name="users" value="" id="users"/>
                        <div id="specilyListBasic0">
                        <div id="spical0">

                    <div class="form_lst">
                        <label>Position Title<span class="star_red">*</span></label>
                        <span class="rltv">
                            <input id="position" value="{{ $experience->position}}" type="text" placeholder="Position Title" class="form-control required @error('position') is-invalid @enderror" name="position" required autocomplete="position">
                            @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            Please do not use abbreviations or short-forms
                        </span>
                    </div>


                    <div class="form_lst">
                        <label>Company Name<span class="star_red">*</span></label>
                        <span class="rltv">
                            <input id="company" value="{{ $experience->company}}" type="text" placeholder="Company Name" class="form-control required @error('company') is-invalid @enderror" name="company" required autocomplete="company">
                            @error('company')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            Please do not use abbreviations or short-forms
                        </span>
                    </div>
                    
                    <div class="form_lst">
                        <label>Duration<span class="star_red">*</span></label>
                        <span id="duration0" class="rltv rltv1 expDuration">  
                            <div class="row">
                            <div class="col-sm-6 col-xs-12">                                      
                                <select name="from_month" id="fromMonth0" class="required not_chosen" onchange="removeError(0)">
                                    <option value="">Month</option>
                                    <option value="January" {{ $experience->from_month == 'January' ? 'selected' : ''}}>January</option>
                                    <option value="Febuary" {{ $experience->from_month == 'Febuary' ? 'selected' : ''}}>Febuary</option>
                                    <option value="March" {{ $experience->from_month ==  'March' ? 'selected' : ''}}>March</option>
                                    <option value="April" {{ $experience->from_month == 'April' ? 'selected' : ''}}>April</option>
                                    <option value="May" {{ $experience->from_month == 'May' ? 'selected' : ''}}>May</option>
                                    <option value="June" {{ $experience->from_month == 'June' ? 'selected' : ''}}>June</option>
                                    <option value="July" {{ $experience->from_month == 'July' ? 'selected' : ''}}>July</option>
                                    <option value="August" {{ $experience->from_month == 'August' ? 'selected' : ''}}>August</option>
                                    <option value="September" {{ $experience->from_month == 'September' ? 'selected' : ''}}>September</option>
                                    <option value="October" {{ $experience->from_month == 'October' ? 'selected' : ''}}>October</option>
                                    <option value="November" {{ $experience->from_month == 'November' ? 'selected' : ''}}>November</option>
                                    <option value="December" {{ $experience->from_month == 'December' ? 'selected' : ''}}>December</option>
                                </select>                                                  
                            </div>

                            <div class="col-sm-6 col-xs-12">    
                                <select name="from_year" data-value="0" class="upperyear required not_chosen" onchange="removeError(0)" id="from_year">
                                    <option value="{{ $experience->from_year}}">Year</option>
                                        @for ($year = 1900; $year <= 2020; $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor                 
                                </select>            
                                @error('from_year')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror                                                 
                            </div>

                            <div class="col-sm-12 col-xs-12 text-center">    
                                <b>TO</b>
                            </div>

                            <div class="col-sm-6 col-xs-12">    
                                <select name="to_month" id="to_month" class="required not_chosen" onchange="removeError(0)">
                                    <option value="">Month</option>
                                    <option value="January" {{ $experience->to_month == 'January' ? 'selected' : ''}}>January</option>
                                    <option value="Febuary" {{ $experience->to_month == 'Febuary' ? 'selected' : ''}}>Febuary</option>
                                    <option value="March" {{ $experience->to_month ==  'March' ? 'selected' : ''}}>March</option>
                                    <option value="April" {{ $experience->to_month == 'April' ? 'selected' : ''}}>April</option>
                                    <option value="May" {{ $experience->to_month == 'May' ? 'selected' : ''}}>May</option>
                                    <option value="June" {{ $experience->to_month == 'June' ? 'selected' : ''}}>June</option>
                                    <option value="July" {{ $experience->to_month == 'July' ? 'selected' : ''}}>July</option>
                                    <option value="August" {{ $experience->to_month == 'August' ? 'selected' : ''}}>August</option>
                                    <option value="September" {{ $experience->to_month == 'September' ? 'selected' : ''}}>September</option>
                                    <option value="October" {{ $experience->to_month == 'October' ? 'selected' : ''}}>October</option>
                                    <option value="November" {{ $experience->to_month == 'November' ? 'selected' : ''}}>November</option>
                                    <option value="December" {{ $experience->to_month == 'December' ? 'selected' : ''}}>December</option>
                                </select>                                                     
                            </div>
                            
                            <div class="col-sm-6 col-xs-12 loweryeardiv">    
                                <select name="to_year" data-value="0" class="loweryear0 required not_chosen" onchange="removeError(0)" id="to_year">
                                    <option value="{{ $experience->to_year}}">Year</option>
                                        @for ($year = 1900; $year <= 2020; $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor                 
                                </select>            
                                @error('to_year')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror                                                   
                            </div>
                                           
                            <div id="durError0" class="col-sm-12 col-xs-12" style="color:#f3665c;">    
                            
                        </div>
                    </div>
                </span>
            </div>


                    <div class="form_lst">
                        <label>Specialization<span class="star_red">*</span></label>
                        <span class="rltv">
                            <input id="specialization" value="{{ $experience->specialization}}" type="text" placeholder="Specialization" class="form-control required @error('specialization') is-invalid @enderror" name="specialization" required autocomplete="specialization">
                            @error('specialization')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            Please do not use abbreviations or short-forms
                        </span>
                    </div>

                    <div class="form_lst">
                        <label>Role<span class="star_red">*</span></label>
                        <span class="rltv">
                            <input id="role" type="text" value="{{ $experience->role}}"  placeholder="Role" class="form-control required @error('role') is-invalid @enderror" name="role" required autocomplete="role">
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            Please do not use abbreviations or short-forms
                        </span>
                    </div>

                    <div class="form_lst">
                        <label>Industry<span class="star_red">*</span></label>
                        <span class="rltv">
                            <input id="industry" type="text" value="{{ $experience->industry}}"placeholder="Industry" class="form-control required @error('industry') is-invalid @enderror" name="industry" required autocomplete="industry">
                            @error('industry')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            Please do not use abbreviations or short-forms
                        </span>
                    </div>



                        <div id="error_messagebasic_course_id0"></div>
                        </div>

                    <div class="form_lst">
                        <label>Position Level<span class="star_red">*</span></label>
                        <span class="rltv">
                            <select name="position_level" class="form-control @error('position_level') is-invalid @enderror" id="position_level" required autocomplete="position_level">
                                <option value="">Select Position Level</option>
                                <option value="CEO / SVP / AVP / VP / Director" {{ $experience->position_level ==  '"CEO / SVP / AVP / VP / Director' ? 'selected' : ''}}> CEO / SVP / AVP / VP / Director </option>
                                <option value="Assistant Manager / Manager" {{ $experience->position_level ==  'Assistant Manager / Manager' ? 'selected' : ''}}> Assistant Manager / Manager </option>
                                <option value="Supervisor / 5 Years &amp; Up Experienced Employee" {{ $experience->position_level ==  'Supervisor / 5 Years &amp; Up Experienced Employee' ? 'selected' : ''}}> Supervisor / 5 Years &amp; Up Experienced Employee </option>
                                <option value="1-4 Years Experienced Employee" {{ $experience->position_level ==  '1-4 Years Experienced Employee' ? 'selected' : ''}}> 1-4 Years Experienced Employee </option>
                                <option value="Fresh Grad / < 1 Year Experienced Employee" {{ $experience->position_level ==  'Fresh Grad / < 1 Year Experienced Employee' ? 'selected' : ''}}> Fresh Grad / &lt; 1 Year Experienced Employee </option>
                                <option value="Non-Executive" {{ $experience->position_level ==  'Non-Executive' ? 'selected' : ''}}> Non-Executive </option>
                            </select>
                            
                            @error('position_level')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror  
                        </span>
                    </div>


                    <div class="form_lst">
                        <label>Experience Description<span class="star_red">*</span></label>
                        <span class="rltv">
                            <textarea name="description"  class="" value="{{ $experience->description}}" placeholder="Mention in brief about your work experience, skills, achievements, awards, projects and goals" id="description">{{ $experience->description}}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 
                        </span>
                    </div>

                    </div>
                </div>         
                    </div>


                    <div class="form_lst sssss">
                        <label class="blank_label">&nbsp;</label>
                        <span class="rltv">
                            <div class="pro_row_left">
                               <input class="input_btn" type="submit" value="Save"/>                                        
                               <a href="{{route('user.experience')}}" class="input_btn rigjt" rel="nofollow">Cancel</a>
                           </div> 
                        </span>
                    </div>
                </div></div>

                            </form> 
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function () {

        $("#addexperience").click(function () {
            var cc = ($('#experiencecounter').val() * 1) + 1;
            $('#experiencecounter').val(cc);
            $("#loader1").show();
            $.ajax({
                type: "POST",
                url: "https://job-board-portal-script.logicspice.com/candidates/openexperience/" + cc,
                cache: false,
                success: function (responseText) {
                    $("#loader1").hide();
                    $('#experienceElement').append(responseText);
                    $("#loader1").hide();
                }
            });
        });

    });

    function removeCC(cc, id) {
        if (id) {
            $("#loader1").show();
            $.ajax({
                type: "POST",
                url: "https://job-board-portal-script.logicspice.com/candidates/deleteexperience/" + id,
                cache: false,
                success: function (responseText) {
                    $('#dynamic' + cc).remove();
                    $("#loader1").hide();

                    window.location.href = "https://job-board-portal-script.logicspice.com/candidates/editExperience";
                }
            });
        } else {
            $('#dynamic' + cc).remove();
        }
    }

    $(document).on("change", ".upperyear", function (e) {
        var opt = '';
        var i = '';
        var upperValue = $(this).val();
        var count = $(this).attr("data-value");
        var currentYear = new Date().getFullYear();
        if (upperValue == currentYear) {
            var date_cur = new Date();
            var current_month = date_cur.getMonth();
            var from_month = $("#from_month" + count).val();
            if (current_month < from_month) {
                $("#from_month" + count).val(current_month);
                $("#to_month" + count).val(current_month);
            }
            $("#from_month" + count+" > option").each(function () {
                var new_str1 = $(this).val();     
                if (parseInt(new_str1) > parseInt(current_month)) {
                    $(this).prop("disabled", true);
                }
            })
            $("#to_month" + count+" > option").each(function () {
                var new_str1 = $(this).val();     
                if (parseInt(new_str1) > parseInt(current_month)) {
                    $(this).prop("disabled", true);
                }
            })
            
        }else{
            $("#from_month" + count+" > option").removeProp('disabled');
            $("#to_month" + count+" > option").removeProp('disabled');
        }
        //alert(upperValue);
        //alert(count);
        $(".loweryear" + count).empty();

        if (upperValue !== '') {
            for (i = upperValue; i <= currentYear; i++)
            {
                opt += '<option value="' + i + '">' + i + '</option>';
            }

            //console.log(opt);
            $(".loweryear" + count).removeAttr('disabled');
            $(".loweryear" + count).append(opt);
        } else {
            opt += '<option value=""> Select Year </option>';
            $(".loweryear" + count).prop('disabled', 'disabled');
            $(".loweryear" + count).append(opt);
        }

    });

    $(document).on("change", ".loweryear_cmn", function (e) {
        var opt = '';
        var i = '';
        var upperValue = $(this).val();
        var count = $(this).attr("data-value");
        var currentYear = new Date().getFullYear();
        if (upperValue == currentYear) {
            var date_cur = new Date();
            var current_month = date_cur.getMonth();
            var from_month = $("#to_month" + count).val();
            if (current_month < from_month) {
                $("#to_month" + count).val(current_month);
            }
          
            $("#to_month" + count+" > option").each(function () {
                var new_str1 = $(this).val();     
                if (parseInt(new_str1) > parseInt(current_month)) {
                    $(this).prop("disabled", true);
                }
            })
            
        }else{
            $("#to_month" + count+" > option").removeProp('disabled');
        }

    });

    $(document).ready(function () {
        //$("#editExperience").onsubmit(function (e) {
        $("#editExperience").on("submit", function (e) {


            var durationData = $('.expDuration').length;
            //alert(durationData);
            for (i = 0; i < durationData; i++) {
                //  var divId = $('#expDuration'+ i).html();
                //alert(durationData);
                var from_month = $('#duration' + i).find('#from_month' + i).val();
                var fromYear = $('#duration' + i).find('#Experience' + i + 'FromYear').val();
                var to_month = $('#duration' + i).find('#to_month' + i).val();
                var toYear = $('#duration' + i).find('#Experience' + i + 'ToYear').val();

                //alert(fromMonth);
                //alert(fromYear);
                //alert(toMonth);
                //alert(toYear);



                var currentYear = new Date().getFullYear()
                var currentMonth = (new Date).getMonth() + 1;

                // if (fromYear == toYear) {
                if ((parseInt(from_month) > parseInt(to_month)) && ((fromYear > toYear) || (fromYear == toYear))) {

                    $('#durError' + i).text("From month should be less than to month");

                    $('#from_month' + i).addClass('error');
                    $('#Experience' + i + 'FromYear').addClass('error');
                    $('#to_month' + i).addClass('error');
                    $('#Experience' + i + 'ToYear').addClass('error');

                    e.preventDefault();
                } else if ((parseInt(from_month) == parseInt(to_month)) && ((parseInt(fromYear) > parseInt(toYear)))) {

                    $('#durError' + i).text("From month should be less than to month");

                    $('#from_month' + i).addClass('error');
                    $('#Experience' + i + 'FromYear').addClass('error');
                    $('#to_month' + i).addClass('error');
                    $('#Experience' + i + 'ToYear').addClass('error');

                    e.preventDefault();
                } else if ((parseInt(fromYear) == parseInt(currentYear)) && (parseInt(toYear) == parseInt(currentYear))) {

                    if ((parseInt(from_month) > parseInt(currentMonth)) || (parseInt(to_month) > parseInt(currentMonth))) {
                        $('#durError' + i).text("Please check months, it should be less than or equal to current month if you choose current year.");

                        $('#from_month' + i).addClass('error');
                        $('#Experience' + i + 'FromYear').addClass('error');
                        $('#to_month' + i).addClass('error');
                        $('#Experience' + i + 'ToYear').addClass('error');

                        e.preventDefault();
                    } else {
                        $('#durError' + i).empty();
                        $('#from_month' + i).removeClass('error');
                        $('#Experience' + i + 'FromYear').removeClass('error');
                        $('#to_month' + i).removeClass('error');
                        $('#Experience' + i + 'ToYear').removeClass('error');
                    }

                } else if ((parseInt(from_month) > parseInt(currentMonth) && parseInt(fromYear) >= parseInt(currentYear)) && (parseInt(to_month) > parseInt(currentMonth) && parseInt(toYear) <= parseInt(currentYear))) {


                    $('#durError' + i).text("Please check months, it should be less than or equal to current month if you choose current year.");

                    $('#from_month' + i).addClass('error');
                    $('#Experience' + i + 'FromYear').addClass('error');
                    $('#to_month' + i).addClass('error');
                    $('#Experience' + i + 'ToYear').addClass('error');

                    e.preventDefault();


                } else {
                    $('#durError' + i).empty();
                    $('#from_month' + i).removeClass('error');
                    $('#Experience' + i + 'FromYear').removeClass('error');
                    $('#to_month' + i).removeClass('error');
                    $('#Experience' + i + 'ToYear').removeClass('error');
                }
                //}

            }

        });

    });

    function removeError(count) {
        $('#durError' + count).text('');
        $('#from_month' + count).removeClass('error');
        $('#Experience' + count + 'FromYear').removeClass('error');
        $('#to_month' + count).removeClass('error');
        $('#Experience' + count + 'ToYear').removeClass('error');
    }

//    function checkyearmonth(){
//        var cc = ($('#experiencecounter').val() * 1) + 1;
//        var todayDate = new Date();
//        for(var i=0; i < cc; i++){
//            if($('#toMonth0').val() !='' && $('#Experience0ToYear').val() !=''){
//                var inputDateText = 
//                alert($('#Experience0ToYear').val());
//            }
//        }
//        alert('f');
//        return false;
//     
//    }
</script
@endsection