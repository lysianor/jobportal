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
                        <div class="heads"><i class="fa fa-language">&nbsp;Language</i></div>  
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

                    <form action="{{ route('language.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf  
                            <div id="educationElement"  class="educationElement">
                               
                        <div id="dynamic0" class="dynamiccc">
                        <div id="specilyListBasic0">
                        <div id="spical0"
                        >
                    <div class="form_lst">
                        <label>Language<span class="star_red">*</span></label>
                        <span class="rltv">
                            <input id="name" type="text" placeholder="Ex. English, Tagalog etc." class="form-control required @error('name') is-invalid @enderror" name="name" required autocomplete="name">
                            @error('name')
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
                        <label>Read<div class="star_red">*</div></label>
                        <div id="locDiv" class="rltv">
                            <div class="dty">
                                <select name="read" class="form-control validname @error('read') is-invalid @enderror" id="read" required autocomplete="read">
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                    @error('read')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form_lst">
                        <label>Write<div class="star_red">*</div></label>
                        <div id="locDiv" class="rltv">
                            <div class="dty">
                                <select name="write" class="form-control validname @error('write') is-invalid @enderror" id="write" required autocomplete="write">
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                    @error('write')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                        </div>
                    </div>

                    <div class="form_lst">
                        <label>Speak<div class="star_red">*</div></label>
                        <div id="locDiv" class="rltv">
                            <div class="dty">
                                <select name="speak" class="form-control validname @error('speak') is-invalid @enderror" id="speak" required autocomplete="speak">
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                    @error('speak')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                        </div>
                    </div>


                    </div>
                </div>         
                    </div>


                    <div class="form_lst sssss">
                        <label class="blank_label">&nbsp;</label>
                        <span class="rltv">
                            <div class="pro_row_left">
                               <input class="input_btn" type="submit" value="Save"/>                                        
                               <a href="{{route('user.language')}}" class="input_btn rigjt" rel="nofollow">Cancel</a>
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