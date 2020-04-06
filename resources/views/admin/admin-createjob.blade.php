@extends('layouts.homeadmin')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset ('css/front/select2.min.css')}}"/> 
<script type="text/javascript" src="{{asset ('js/front/select2.min.js')}}"></script> 
<script src="//cdn.ckeditor.com/4.10.1/basic/ckeditor.js"></script>


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
            <div class="heads"><i class="fa fa-plus">&nbsp;Create Job</i></div>
                <div class="information_cntn">
                    <div style="width:100%;"></div>

                <form action="{{ url('admin/createjob') }}" method="POST" enctype="multipart/form-data">
                    @csrf   
                
                    <div class="form_lst">
                        <label>Job Title <span class="star_red">*</span></label>
                        <span class="rltv education_profile">

                            <input id="title" type="text" maxlength="50" placeholder="Job Title" class="form-control  @error('title') is-invalid @enderror" name="title"  required autocomplete="title">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </span>
                    </div>

                    <div class="form_lst">
                        <label>Category<span class="star_red">*</span></label>
                            <div id="locDiv" class="rltv">
                                <select name="jobcategory_id" class="form-control @error('jobcategory_id') is-invalid @enderror" id="jobcategory_id" required autocomplete="jobcategory_id">
                                    <option value="" class="opt-indent">Select Category</option>
                                    @foreach ($jobcategories as $jobcategories)
                                    <option value="{{$jobcategories->id}}">{{ucwords($jobcategories->jobcategory)}}</option>
                                    @endforeach
                                </select>
                         @error('jobcategory_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>  
                    </div>


                    <div class="form_lst">
                        <label>Tag</label>
                        <span class="rltv">
                            <select id="tag" placeholder="Tag" multiple="multiple" class="select2-multi" name="tags[]">
                                @foreach($tags as $tags)
                                <option value="{{$tags->id}}">{{$tags->tag}}</option>
                                @endforeach
                            </select>
                        </span>
                    </div>
                
                           
                    <div class="form_lst">
                        <label>Job Description<span class="star_red">*</span></label>
                        <span class="rltv">
                            <textarea id="description" placeholder="Job Description"  class="form-control  @error('description') is-invalid @enderror" name="description" required autocomplete="description"></textarea>  
                        </span>
                        @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                                <script>
                                    CKEDITOR.replace( 'description', {
                                        removePlugins: 'image, save, new page, preview, print, templates, iframe, smiley, language, maximize, about, flash, Table, insert',
                                            uiColor: '#9AB8F3',
                                            

                                    } );
                                </script>
                    </div>

                    {{-- <div class="form_lst">
                        <label>Company Name<span class="star_red">*</span></label>
                        <span class="rltv">
                            <input id="company_name" type="text" maxlength="50" placeholder="Company Name" class="form-control  @error('company_name') is-invalid @enderror" name="company_name"  required autocomplete="company_name">
                            @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                        
                    </div>
                
                    <div class="form_lst">
                        <label>Company Profile<span class="star_red">*</span></label>
                        <span class="rltv">
                            <textarea id="company_profile" placeholder="Company Profile"  class="form-control @error('company_profile') is-invalid @enderror" name="company_profile" required autocomplete="company_profile"></textarea>  
                        </span>
                        @error('company_profile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                                <script>
                                    CKEDITOR.replace( 'company_profile', {
                                        removePlugins: 'image, save, new page, preview, print, templates, iframe, smiley, language, maximize, about, flash, Table, insert',
                                            uiColor: '#9AB8F3',
                                            

                                    } );
                                </script>
                    </div> --}}



                    {{-- <div class="form_lst">
                        <label>Work Type<span class="star_red">*</span></label>
                            <div id="locDiv" class="rltv">
                                <select name="worktype_id" class="form-control @error('worktype_id') is-invalid @enderror" id="worktype_id" required autocomplete="worktype_id">
                                    <option value="" class="opt-indent">Select Work Type</option>
                                    @foreach ($worktype as $worktype)
                                    <option value="{{$worktype->id}}">{{ucwords($worktype->name)}}</option>
                                    @endforeach
                                </select>
                         @error('worktype_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>  
                    </div>
 --}}
                    <div class="form_lst">
                        <label>Company<span class="star_red">*</span></label>
                            <div id="locDiv" class="rltv">
                                <select name="company_id" class="form-control @error('company_id') is-invalid @enderror" id="company_id" required autocomplete="company_id">
                                    <option value="" class="opt-indent">Select Company</option>
                                    @foreach ($companies as $company)
                                    <option value="{{$company->id}}">{{ucwords($company->name)}}</option>
                                    @endforeach
                                </select>
                         @error('company_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>  
                    </div>

                    <div class="form_lst">
                        <label>Work Type<span class="star_red">*</span></label>
                        <span class="rltv" id="subcat">
                            <select name="work_type" class="form-control @error('work_type') is-invalid @enderror" id="work_type" required autocomplete="work_type">
                                <option value="">Select Work Type</option>
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Casual">Casual</option>
                                <option value="Seasonal">Seasonal</option>
                                <option value="Fixed Term">Fixed Term</option>
                            </select>
                        @error('work_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </span>     
                    </div>

{{--                     <div class="form_lst">
                        <label>Contact Name <span class="star_red">*</span></label>
                        <span class="rltv">
                            <input name="data[Job][contact_name]" class="required nameofuser" placeholder="Contact Name" type="text" id="JobContactName"/>
                        </span>
                    </div> --}}

                            
                   {{--  <div class="form_lst">
                        <label>Contact Number<span class="star_red">*</span> &nbsp;<span class="help-tip"><p>8 Digit Landline number with area code or 11 digit phone number</p></span></label>
                        <span class="rltv">
                            <input id="contact_number" type="text" maxlength="11" placeholder="Contact Number" class="form-control  @error('contact_number') is-invalid @enderror" name="contact_number"  required autocomplete="contact_number">
                            @error('contact_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                        </span>
                    </div>

                    <div class="form_lst">
                        <label>Email<span class="star_red"></span></label>
                        <span class="rltv">
                            <input name="email" value="" placeholder="Email Address" type="text" id="email"/>
                        </span>
                    </div>

                    <div class="form_lst">
                        <label>Company Website<span class="star_red"></span></label>
                        <span class="rltv">
                            <input name="website" class="url" value="" placeholder="Company Website" type="text" id="website"/>
                            Eg.: google.com
                        </span>
                    </div> --}}

                        <div class="form_lst">
                            <label>Location<div class="star_red">*</div></label>
                            <div id="cust_idd" class="rltv rel_Location">
                                <input id="location" type="text" maxlength="50" placeholder="Location" class="form-control  @error('location') is-invalid @enderror" name="location"  required autocomplete="location">
                                    @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                            
                        <div class="form_lst">
                            <label>Experience (In Years)<div class="star_red">*</div></label>
                            <div class="rltv">
                                <div class="row">
                                <div class="col-lg-12 col-sm-12 col-xs-12">
                                    <div class="input select">
                                        <select name="experience" class="form-control @error('experience') is-invalid @enderror" id="experience" required autocomplete="experience">
                                            <option value="">Select Total Experience</option>
                                            <option value="None">None</option>
                                            <option value="Exprerience Fresher">Exprerience Fresher</option>
                                            <option value="Experience 0 - 1 Years">Experience 0 - 1 Years</option>
                                            <option value="Exprerience 1 Year">Exprerience 1 Year</option>
                                            <option value="Exprerience 1 - 2 Years">Exprerience 1 - 2 Years</option>
                                            <option value="Exprerience 2 Years">Exprerience 2 Years</option>
                                            <option value="Exprerience 2 - 3 Years">Exprerience 2 - 3 Years</option>
                                            <option value="Exprerience 3 Years">Exprerience 3 Years</option>
                                            <option value="4 Years">Exprerience 4 Years</option>
                                            <option value="5 Years">Exprerience 5 Years</option>
                                            <option value="6 Years">Exprerience 6 Years</option>
                                            <option value="7 Years">Exprerience 7 Years</option>
                                            <option value="8 Years">Exprerience 8 Years</option>
                                            <option value="9 Years">Exprerience 9 Years</option>
                                            <option value="10+ Years">Exprerience 10+ Years</option>
                                            <option value="15+ Years">Exprerience 15+ Years</option>
                                        </select>
                                        @error('experience')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>        
                                </div>                                                                        
                                </div>
                            </div>
                        </div>
                        
                            <div class="form_lst">
                                <label>Salary<div class="star_red">*</div></label>
                                <div class="rltv">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-xs-12">
                                            <div class="input select">
                                            <select name="salary" class="form-control @error('salary') is-invalid @enderror" id="salary" required autocomplete="salary">
                                                <option value="">Select Salary</option>
                                                <option value="Above expected salary">Above Expected Salary</option>
                                                <option value="₱ 1,000.00 To ₱3,000.00">₱ 1,000.00 To ₱3,000.00</option>
                                                <option value="₱ 1,000.00 To ₱5,000.00">₱ 1,000.00 To ₱5,000.00</option>
                                                <option value="₱ 5,000.00 To ₱8,000.00">₱ 5,000.00 To ₱8,000.00</option>
                                                <option value="₱ 5,000.00 To ₱10,000.00">₱ 5,000.00 To ₱10,000.00</option>
                                                <option value="₱ 10,000.00 To ₱15,000.00">₱ 10,000.00 To ₱15,000.00</option>
                                                <option value="₱ 15,000.00 To 20,000.00">₱ 15,000.00 To 20,000.00</option>
                                                <option value="₱ 20,000.00 To 25,000.00">₱ 20,000.00 To 25,000.00</option>
                                                <option value="₱ 25,000.00 To 30,000.00">₱ 25,000.00 To 30,000.00</option>
                                            </select>
                                                @error('salary')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>        
                                        </div>

                                    </div>
                                </div>
                            </div>
                            
                            {{-- <div class="form_lst">
                                <label>Company Logo<span class="star_red">*</span></label>
                                <span class="rltv">
                                    <input type="file" name="company_logo" class="default" onchange="imageValidation()" id="company_logo"/><br>
                                    Supported File Types: jpg, jpeg, png (Max. 5MB).
                                </span>
                            </div> --}}

                                {{-- <div class="form_lst">

                                    <div class="or_det_devide"><span>Or</span></div>

                                </div>

                                <div class="form_lst">
                                    <label>Use Profile Logo</label>
                                    <span class="rltv rltv_check_boco">

                                        <span>
                                            <div class="input checkbox"><input type="hidden" name="data[Job][job_logo_check]" id="JobJobLogoCheck_" value="0"/><input type="checkbox" name="data[Job][job_logo_check]" value="1" id="JobJobLogoCheck"/><label for="JobJobLogoCheck"></label></div>                                        </span>
                                    </span>

                                </div>   --}}
                            




                            <div class="">
                                <label>&nbsp;</label>
                                <span class="rltv">
                                    <div class="pro_row_left">
                                        <input class="input_btn" id="saveCreateButton" type="submit" value="Create"/>
                                        <a href="{{route ('admin.admin-managejob')}}" class="input_btn rigjt" rel="nofollow">{{ __('Cancel') }}</a>
                                    </div> 
                                </span>
                            </div>
                            </form> 
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>












<div id="infoDetails" style="display: none;">
    <!-- Fieldset -->
    <div class="nzwh-wrapper">
        <fieldset class="nzwh">

            <div class="iner_form_bg_box">

                <div class="iner_sec_top_row_view">
                    <div class="inr_firm_roq_left">
                        <div class="areal_img_box" id="dvPreview" style="display:none;">
                                                    </div>
                    </div>
                    <div class="inr_firm_roq">
                        <div class="top_page_name_box">
                            <div class="page_name_boox page_name_boox_small"><span id="facebox_job_title"></span></div>
                        </div>
                        <div class="clear"></div>
                        <div class="list_bot_boox_table_bbox">
                            <div class="list_bot_boox_table">
                                <div class="list_bot_boox_row">

                                    <div class="list_bot_boox_col">

                                        <img src="/img/front/full_time_icon.png" alt="icon"/>                                        
                                        <span id="facebox_work_type1"></span>

                                    </div>
                                    <div class="list_bot_boox_col">
                                        <img src="/img/front/location_icon.png" alt="icon"/>                                        
                                        <span id="facebox_city_name"> </span>
                                        <span id="facebox_state_name"></span>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>

                <div class="full_row_div">
                    <div class="ful_row_ddta">
                        <div class="ful_row_ddta">
                            <span class="blue">Company Name: </span><span class="grey" id="facebox_company_name"></span>
                        </div>
                        <span class="blue">Company Website: </span><span class="grey" id="facebox_company_website"></span>
                    </div>
                                        <div class="ful_row_ddta">
                        <span class="blue">Job Type:</span><span class="grey" id="facebox_work_type">

                        </span>
                    </div>
                    <div class="ful_row_ddta">
                        <span class="blue">Category:</span><span class="grey" id="facebox_job_category">

                        </span>
                    </div>
                    <div class="ful_row_ddta">
                        <span class="blue">Experience:</span><span class="grey" id="facebox_job_experience">  

                        </span>
                    </div>
                    <div class="ful_row_ddta">
                        <span class="blue">Anunal Salary:</span><span class="grey" id="facebox_salary">  

                        </span>
                    </div>
                    <div class="ful_row_ddta">
                        <span class="blue">Skills:</span><span class="grey" id="facebox_skill">  

                        </span>
                    </div>
                    <div class="ful_row_ddta">
                        <span class="blue">Designation:</span><span class="grey" id="facebox_designation">  

                        </span>
                    </div>



                </div>

                <div class="clear"></div>



                <div class="clear"></div>

                <div class="data_row_ful_skil">
                    <div class="data_row_ful_skil_header">Job Description</div>
                    <div class="clear">asdsadsa</div>
asdsadsa
                    <div class="data_row_ful_skil_content2" id="facebox_job_description">
                    </div>

                </div>

                <div class="clear"></div>


            </div>
        </fieldset>
    </div>

</div>
<script type="text/javascript">
    $('.select2-multi').select2();
</script>
@endsection