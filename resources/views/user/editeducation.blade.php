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
                        <div class="heads"><i class="fa fa-graduation-cap">&nbsp;Education</i></div>
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
                    <form action="{{ route('education.update', $education->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf  
                            <div id="educationElement"  class="educationElement">
                               
                    <div class="colify-title">Please add your two highest education qualifications</div>
                        <div id="dynamic0" class="dynamiccc">
                        <input type="hidden" name="data[Education][0][id]" value="59" id="Education0Id"/>
                        <div id="specilyListBasic0">
                        <div id="spical0">
                    <div class="form_lst">
                        <label>School/College/University<span class="star_red">*</span></label>
                        <span class="rltv">
                            <input id="school" type="text" placeholder="Name of the Institution your are studying at/studied" class="form-control required @error('school') is-invalid @enderror" name="school" value="{{ $education['school']}}" required autocomplete="school">
                            @error('school')
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
                        <label>Completion Year<div class="star_red">*</div></label>
                        <div id="locDiv" class="rltv">
                            <div class="dty">
                                <select name="month" class="form-control @error('month') is-invalid @enderror" id="month" required autocomplete="month">
                                    <option value="">Month</option>
                                    <option value="January" {{ $education->month == 'January' ? 'selected' : ''}}>January</option>
                                    <option value="Febuary" {{ $education->month == 'Febuary' ? 'selected' : ''}}>Febuary</option>
                                    <option value="March" {{ $education->month ==  'March' ? 'selected' : ''}}>March</option>
                                    <option value="April" {{ $education->month == 'April' ? 'selected' : ''}}>April</option>
                                    <option value="May" {{ $education->month == 'May' ? 'selected' : ''}}>May</option>
                                    <option value="June" {{ $education->month == 'June' ? 'selected' : ''}}>June</option>
                                    <option value="July" {{ $education->month == 'July' ? 'selected' : ''}}>July</option>
                                    <option value="August" {{ $education->month == 'August' ? 'selected' : ''}}>August</option>
                                    <option value="September" {{ $education->month == 'September' ? 'selected' : ''}}>September</option>
                                    <option value="October" {{ $education->month == 'October' ? 'selected' : ''}}>October</option>
                                    <option value="November" {{ $education->month == 'November' ? 'selected' : ''}}>November</option>
                                    <option value="December" {{ $education->month == 'December' ? 'selected' : ''}}>December</option>
                                </select>

                            </div>
                            
                                
                            <div class="dty">                        
                                <select name="year" class="form-control  @error('year') is-invalid @enderror" value="{{ $education['year']}} " id="year" required autocomplete="year">
                                    <option value="{{ $education ['year']}}">Year</option>
                                        @for ($year = 1900; $year <= 2020; $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor                 
                                </select>            
                                @error('year')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div> 

                        </div>
                    </div>

                    <div class="form_lst">
                        <label>Qualification<span class="star_red">*</span></label>
                        <span class="rltv">
                            <select name="qualification" class="form-control @error('qualification') is-invalid @enderror" id="qualification" required autocomplete="qualification">

                                <option value="">Select Qualification</option>
                                <option value="High School Diploma" {{ $education->qualification == 'High School Diploma' ? 'selected' : '' }} >High School Diploma</option>
                                <option value="Vocational Diploma / Short Course Cerficate"  {{ $education->qualification == 'Vocational Diploma / Short Course Cerficate' ? 'selected' : ''}}>Vocational Diploma / Short Course Cerficate</option>
                                <option value="Bachelor's / College Degree" {{ $education->qualification == 'Bachelors / College Degree' ? 'selected' : ''}}>Bachelor's / College Degree</option>
                                <option value="Post Graduate Diploma / Master's Degree" {{ $education->qualification == 'Post Graduate Diploma / Masters Degree' ? 'selected' : ''}}>Post Graduate Diploma / Master's Degree</option>
                                <option value="Professional License (Passed Board/Bar/Professional License Exam)" {{$education->qualification ==  'Professional License (Passed Board/Bar/Professional License Exam)' ? 'selected' : ''}}>Professional License (Passed Board/Bar/Professional License Exam)</option>
                                <option value="Doctorate Degree" {{ $education->qualification == 'Doctorate Degree' ? 'selected' : ''}}>Doctorate Degree</option>
                                    @if($education->qualification)
                                     <option value="{{$education->qualification}}" selected>{{$education->qualification}}</option>
                                    @endif
                            </select>
                            @error('qualification')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror  
                        </span>
                    </div>

                    <div class="form_lst">
                        <label>Field Study<span class="star_red">*</span></label>
                        <span class="rltv">
                            <select name="field_study" class="form-control validname @error('field_study') is-invalid @enderror" id="field_study" required autocomplete="field_study">
                                <option value="">Select Field Study</option>
                                <option value="Advertising/Media">Advertising/Media</option>
                                <option value="Agriculture/Aquaculture/Forestry">Agriculture/Aquaculture/Forestry</option>
                                <option value="Airline Operation/Airport Management">Airline Operation/Airport Management</option>
                                <option value="Architecture">Architecture</option>
                                <option value="Art/Design/Creative Multimedia">Art/Design/Creative Multimedia</option>
                                <option value="Biology">Biology</option>
                                <option value="BioTechnology">BioTechnology</option>
                                <option value="Business Studies/Administration/Management">Business Studies/Administration/Management</option>
                                <option value="Chemistry">Chemistry</option>
                                <option value="Commerce">Commerce</option>
                                <option value="Computer Science/Information Technology">Computer Science/Information Technology</option>
                                <option value="Dentistry">Dentistry</option>
                                <option value="Economics">Economics</option>
                                <option value="Education/Teaching/Training">Education/Teaching/Training</option>
                                <option value="Engineering (Aviation/Aeronautics/Astronautics)">Engineering (Aviation/Aeronautics/Astronautics)</option>
                                <option value="Engineering (Bioengineering/Biomedical)">Engineering (Bioengineering/Biomedical)</option>
                                <option value="Engineering (Chemical)">Engineering (Chemical)</option>
                                <option value="Engineering (Civil)">Engineering (Civil)</option>
                                <option value="Engineering (Computer/Telecommunication)">Engineering (Computer/Telecommunication)</option>
                                <option value="Engineering (Electrical/Electronic)">Engineering (Electrical/Electronic)</option>
                                <option value="Engineering (Environmental/Health/Safety)">Engineering (Environmental/Health/Safety)</option>
                                <option value="Engineering (Industrial)">Engineering (Industrial)</option>
                                <option value="Engineering (Marine)">Engineering (Marine)</option>
                                <option value="Engineering (Material Science)">Engineering (Material Science)</option>
                                <option value="Engineering (Mechanical)">Engineering (Mechanical)</option>
                                <option value="Engineering (Mechatronic/Electromechanical)">Engineering (Mechatronic/Electromechanical)</option>
                                <option value="Engineering (Metal Fabrication/Tool & Die/Welding)">Engineering (Metal Fabrication/Tool &amp; Die/Welding)</option>
                                <option value="Engineering (Mining/Mineral)">Engineering (Mining/Mineral)</option>
                                <option value="Engineering (Others)">Engineering (Others)</option>
                                <option value="Engineering (Petroleum/Oil/Gas)">Engineering (Petroleum/Oil/Gas)</option>
                                <option value="Finance/Accountancy/Banking">Finance/Accountancy/Banking</option>
                                <option value="Food & Beverage Services Management">Food &amp; Beverage Services Management</option>
                                <option value="Food Technology/Nutrition/Dietetics">Food Technology/Nutrition/Dietetics</option>
                                <option value="11">Geographical Science</option>
                                <option value="Geology/Geophysics">Geology/Geophysics</option>
                                <option value="History">History</option>
                                <option value="Hospitality/Tourism/Hotel Management">Hospitality/Tourism/Hotel Management</option>
                                <option value="Human Resource Management">Human Resource Management</option>
                                <option value="Humanities/Liberal Arts">Humanities/Liberal Arts</option>
                                <option value="Journalism">Journalism</option>
                                <option value="Law">Law</option>
                                <option value="Library Management">Library Management</option>
                                <option value="Linguistics/Languages">Linguistics/Languages</option>
                                <option value="Logistic/Transportation">Logistic/Transportation</option>
                                <option value="Maritime Studies">Maritime Studies</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Mass Communications">Mass Communications</option>
                                <option value="Mathematics">Mathematics</option>
                                <option value="Medical Science">Medical Science</option>
                                <option value="Medicine">Medicine</option>
                                <option value="Music/Performing Arts Studies">Music/Performing Arts Studies</option>
                                <option value="Nursing">Nursing</option>
                                <option value="Optometry">Optometry</option>
                                <option value="Personal Services">Personal Services</option>
                                <option value="Pharmacy/Pharmacology">Pharmacy/Pharmacology</option>
                                <option value="Philosophy">Philosophy</option>
                                <option value="Physical Therapy/Physiotherapy">Physical Therapy/Physiotherapy</option>
                                <option value="Physics">Physics</option>
                                <option value="Political Science">Political Science</option>
                                <option value="Property Development/Real Estate Management">Property Development/Real Estate Management</option>
                                <option value="Protective Services & Management">Protective Services &amp; Management</option>
                                <option value="Psychology">Psychology</option>
                                <option value="Quantity Survey">Quantity Survey</option>
                                <option value="Science & Technology">Science &amp; Technology</option>
                                <option value="Secretarial">Secretarial</option>
                                <option value="Social Science/Sociology">Social Science/Sociology</option>
                                <option value="Sports Science & Management">Sports Science &amp; Management</option>
                                <option value="Textile/Fashion Design">Textile/Fashion Design</option>
                                <option value="Urban Studies/Town Planning">Urban Studies/Town Planning</option>
                                <option value="Veterinary">Veterinary</option>
                                <option value="Others">Others</option>
                                @if($education->field_study)
                                     <option value="{{$education->field_study}}"selected>{{$education->field_study}}</option>
                                    @endif
                            </select>
                            @error('field_study')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror  
                        </span>
                    </div>

                    <div class="form_lst">
                        <label>Major</label>
                        <span class="rltv">
                            <input id="major" type="text" placeholder="Major" class="form-control required @error('major') is-invalid @enderror" name="major" value="{{ $education['major']}}">
                            @error('major')
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
                               <a href="{{route('user.education')}}" class="input_btn rigjt" rel="nofollow">Cancel</a>
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
@endsection