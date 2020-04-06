@extends('layouts.homeadmin')

@section('content')
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
<div class="col-lg-9">

                        <div class="info_dv">
                            <div class="heads">Create Company Profile</div>
                            <div class="information_cntn">
                                <div style="width:100%;"></div>


                <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf   
                

                <div class="form_lst">
                    <label>Company Name <span class="star_red">*</span></label>
                    <span class="rltv">
                        <input id="name" type="text" maxlength="50" placeholder="Company Name" class="form-control  @error('name') is-invalid @enderror" name="name"  required autocomplete="name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror  
                    </span>
                </div>

                    <div class="form_lst">
                        <label>Description<span class="star_red">*</span></label>
                        <span class="rltv">
                            <textarea id="description" placeholder="Description"  class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description"></textarea>  
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
                        <label>Industry <span class="star_red">*</span></label>
                        <span class="rltv">
                            <input id="industry" type="text" maxlength="50" placeholder="Industry" class="form-control  @error('industry') is-invalid @enderror" name="industry"  required autocomplete="industry">
                                @error('industry')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                        </span>
                    </div>

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
                        <label>Website<span class="star_red"></span></label>
                        <span class="rltv">
                            <input name="website" class="url" value="" placeholder="Website" type="text" id="website"/>
                            Eg.: google.com
                        </span>
                    </div>

                    <div class="form_lst">
                                <label>Logo<span class="star_red">*</span></label>
                                <span class="rltv">
                                    <input type="file" name="company_logo" class="default" onchange="imageValidation()" id="company_logo"/><br>
                                    Supported File Types: jpg, jpeg, png (Max. 5MB).
                                </span>
                    </div>



                                <div class="form_lst sssss">
                                    <label class="blank_label">&nbsp;</label>
                                    <span class="rltv">
                                        <div class="pro_row_left">
                                              
                                            <input class="input_btn" type="submit" value="Create"/>                                            
                                            <a href="{{route ('admin.admin-company')}}" class="input_btn rigjt" rel="nofollow">Cancel</a>
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
</div>
@endsection