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
<script>
    $(document).ready(function () {

        $('.quickbx2').click(function () {

            if ($('.quickbx2').hasClass('quicklinkopen2')) {
                $('.quickbx2').removeClass('quicklinkopen2');
            } else {
                $('.quickbx2').addClass('quicklinkopen2');
            }
            $(".quickdiv2").slideToggle();
        });

        $('.dashboardsbx').click(function () {

            if ($('.dashboardsbx').hasClass('dashboardsopen')) {
                $('.dashboardsbx').removeClass('dashboardsopen');
            } else {
                $('.dashboardsbx').addClass('dashboardsopen');
            }

            $(".dashboardsdiv").slideToggle();
        });

    });
</script>                
<div class="col-sm-9 col-lg-9 col-xs-12">
        <div class="info_dv">
            <div class="heads"><i class="fa fa-pencil">&nbsp;Edit Job</div></i>
                <div class="information_cntn">
                    <div style="width:100%;"></div>

                <form action="{{ route('job.update', $jobs->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf   
                    
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

                    @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input, Please try again.
                                <br>
                            <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                            </ul>
                            </div>
                        @endif        

                    <div class="form_lst">
                        <label>Job Title <span class="star_red">*</span></label>
                        <span class="rltv education_profile">
                            <input id="title" type="text" value="{{ $jobs->title}}" maxlength="50" placeholder="Job Title" class="form-control  @error('title') is-invalid @enderror" name="title"  required autocomplete="title">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </span>
                    </div>

                    <div class="form_lst">
                        <label>Category <span class="star_red">*</span></label>
                            <div id="locDiv" class="rltv">
                                <select name="jobcategory_id" class="form-control @error('jobcategory_id') is-invalid @enderror" id="jobcategory_id" required autocomplete="jobcategory_id">
                            <option value="" class="opt-indent">Select Category</option>
                        @foreach ($jobcategories as $jobcategories)
                            <option value="{{$jobcategories->id}}" {{ $jobcategories->id == old('jobcategory_id', $jobs->jobcategory_id) ? 'selected' : '' }}>{{ucwords($jobcategories->jobcategory)}}</option>
                            @endforeach

                        </select>
                         @error('jobcategory')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror  
                    </div>
                </div>


                    <div class="form_lst">
                        <label>Tag</label>
                        <span class="rltv education_profile">
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
                            <textarea id="description" placeholder="Job Description"  class="form-control  @error('description') is-invalid @enderror" name="description" required autocomplete="description">{!! Request::old('description', $jobs->description) !!}</textarea>  
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

                     <div class="form_lst">
                        <label>Company<span class="star_red">*</span></label>
                            <div id="locDiv" class="rltv">
                                <select name="company_id" class="form-control @error('company_id') is-invalid @enderror" id="company_id" required autocomplete="company_id">
                                    <option value="" class="opt-indent">Select Company</option>
                                    @foreach ($companies as $company)
                                    <option value="{{$company->id}}" {{ $company->id == old('company_id', $jobs->company_id) ? 'selected' : '' }}>{{ucwords($company->name)}}</option>
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
                        <label>Work Type <span class="star_red">*</span></label>
                        <span class="rltv" id="subcat">
                            <select name="work_type" class="form-control @error('work_type') is-invalid @enderror" id="work_type" required autocomplete="work_type">
                                <option value="">Select Work Type</option>
                                <option value="Full Time" {{  'Full Time' ? 'selected' : ''}}>Full Time</option>
                                <option value="Part Time" {{  'Part Time' ? 'selected' : ''}}>Part Time</option>
                                <option value="Casual" {{  'Casual' ? 'selected' : ''}}>Casual</option>
                                <option value="Seasonal" {{  'Seasonal' ? 'selected' : ''}}>Seasonal</option>
                                <option value="Fixed Term" {{  'Fixed Term' ? 'selected' : ''}}>Fixed Term</option>
                            </select>
                            
                            @error('work_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </span>     
                    </div>

                    {{--  <div class="form_lst">
                        <label>Work Type<span class="star_red">*</span></label>
                            <div id="locDiv" class="rltv">
                                <select name="worktype_id" class="form-control @error('worktype_id') is-invalid @enderror" id="worktype_id" required autocomplete="worktype_id">
                                    <option value="" class="opt-indent">Select Work Type</option>
                                    @foreach ($worktype as $worktype)
                                    <option value="{{$worktype->id}}" {{ $worktype->id == old('worktype_id', $jobs->worktype_id) ? 'selected' : '' }}>{{ucwords($worktype->name)}}</option>
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



{{--                     <div class="form_lst">
                        <label>Contact Name <span class="star_red">*</span></label>
                        <span class="rltv">
                            <input name="data[Job][contact_name]" class="required nameofuser" placeholder="Contact Name" type="text" id="JobContactName"/>
                        </span>
                    </div> --}}

                            
                    {{-- <div class="form_lst">
                        <label>Contact Number<span class="star_red">*</span></label>
                        <span class="rltv">
                            <input id="contact_number" value="{{ $jobs->contact_number}}" type="text" maxlength="11" placeholder="Contact No" class="form-control  @error('contact_number') is-invalid @enderror" name="contact_number"  required autocomplete="contact_number">
                            @error('contact_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                        </span>
                    </div>

                    <div class="form_lst">
                        <label>Email</label>
                        <span class="rltv">
                            <input name="email" value="{{$jobs->email}}" class="url" value="" placeholder="Email Address" type="text" id="email"/>
                        </span>
                    </div>

                   <div class="form_lst">
                        <label>Company Website</label>
                        <span class="rltv">
                            <input name="website" value="{{$jobs->website}}" class="url" value="" placeholder="Company Website" type="text" id="website"/>
                            Eg.: google.com
                        </span>
                    </div> --}}
 
                        <div class="form_lst">
                            <label>Location <div class="star_red">*</div></label>
                            <div id="cust_idd" class="rltv rel_Location">
                                <input id="location" value="{{ $jobs->location}}" type="text" maxlength="50" placeholder="Location" class="form-control  @error('location') is-invalid @enderror" name="location"  required autocomplete="location">
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
                                        <select name="experience" class="form-control validname @error('experience') is-invalid @enderror" id="experience" required autocomplete="experience">
                                            <option value="">Select Total Experience</option>
                                            <option value="None" {{   'None' ? 'selected' : ''}}>None</option>
                                            <option value="Less than 1 Year" {{   'Less than 1 Year' ? 'selected' : ''}}>Less than 1 Year</option>
                                            <option value=" Experience 1 Year" {{  'Experience 1 Year' ? 'selected' : ''}}>Experience 1 Year</option>
                                            <option value="2 Years" {{   '2 Years' ? 'selected' : ''}}>2 Years</option>
                                            <option value="3 Years" {{   '3 Years' ? 'selected' : ''}}>3 Years</option>
                                            <option value="4 Years" {{   '4 Years' ? 'selected' : ''}}>4 Years</option>
                                            <option value="5 Years" {{   '5 Years' ? 'selected' : ''}}>5 Years</option>
                                            <option value="6 Years" {{   '6 Years' ? 'selected' : ''}}>6 Years</option>
                                            <option value="7 Years" {{   '7 Years' ? 'selected' : ''}}>7 Years</option>
                                            <option value="8 Years" {{  '8 Years' ? 'selected' : ''}}>8 Years</option>
                                            <option value="9 Years" {{  '2 Years' ? 'selected' : ''}}>9 Years</option>
                                            <option value="10+ Years" {{  '10+ Years' ? 'selected' : ''}}>10+ Years</option>
                                            <option value="15+ Years" {{  '15+ Years' ? 'selected' : ''}}>15+ Years</option>
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
                                <label>Salary <div class="star_red">*</div></label>
                                <div class="rltv">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-xs-12">
                                            <div class="input select">
                                            <select name="salary" class="form-control @error('salary') is-invalid @enderror" id="salary" required autocomplete="salary">
                                                <option value="">Select Salary</option>
                                                <option value="Above Expected Salary" {{  'Above Expected Salary' ? 'selected' : ''}}>Above Expected Salary</option>
                                                <option value="₱ 1,000.00 To ₱3,000.00" {{  '₱ 1,000.00 To ₱3,000.00' ? 'selected' : ''}}>₱ 1,000.00 To ₱3,000.00</option>
                                                <option value="₱ 1,000.00 To ₱5,000.00" {{  '₱ 1,000.00 To ₱5,000.00' ? 'selected' : ''}}>₱ 1,000.00 To ₱5,000.00</option>
                                                <option value="₱ 5,000.00 To ₱8,000.00" {{  '₱ 5,000.00 To ₱8,000.00' ? 'selected' : ''}}>₱ 5,000.00 To ₱8,000.00</option>
                                                <option value="₱ 5,000.00 To ₱10,000.00" {{  '₱ 5,000.00 To ₱10,000.00' ? 'selected' : ''}}>₱ 5,000.00 To ₱10,000.00</option>
                                                <option value="5000-7000">$ 5000 To $7000</option>
                                                <option value="7000-10000">$ 7000 To $10000</option>
                                                <option value="10000-12000">$ 10000 To $12000</option>
                                                <option value="12000-15000">$ 12000 To $15000</option>
                                                <option value="15000-20000">$ 15000 To $20000</option>
                                                <option value="20000-25000">$ 20000 To $25000</option>
                                                <option value="25000-30000">$ 25000 To $30000</option>
                                                <option value="30000-1000000">&gt;$ 30000</option>
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

                            
                            {{--     <div class="form_lst">
                                    <label>Company Logo <span class="star_red">*</span></label>
                                    <span class="rltv">
                                        <input type="file" class="form-control" name="company_logo" value="{{$jobs->company_logo}}" id="company_logo" class="default" onchange="imageValidation()" id="company_logo"/><br>
                                        <input type="hidden" name="current_image" value="{{$jobs->company_logo}}">
                                        Supported File Types: jpg, jpeg, png (Max. 5MB).
                                    </span>
                                </div>

                                <div class="form_lst">
                                    <label>Current Image <span class="star_red"></span></label>
                                    <span class="rltv">
                                        <div class="user_img_box">
                                            <img src="/uploads/avatar/admin/{{$jobs->company_logo}}">
                                        </div>    
                                    </span>
                                </div> --}}


                            <div class="">
                                <label>&nbsp;</label>
                                <span class="rltv">
                                    <div class="pro_row_left">
                                        <input class="input_btn" id="saveCreateButton" type="submit" value="Update"/>
                                        <a href="{{route ('admin.admin-managejob')}}" class="input_btn rigjt" rel="nofollow">{{ __('Cancel') }}</a>
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
<script type="text/javascript">
    $('.select2-multi').select2();
    $('.select2-multi').select2().val({!! json_encode ($jobs->tags()->allRelatedIds()) !!}).trigger('change');
</script>
@endsection