@extends('layouts.homeadmin')

@section('content')
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
                        <div class="heads"><i class="fa fa-key">&nbsp;Change your password</div></i>
                        <div class="information_cntn">
                            <div style="width:100%;">
                                @if (Session::has('success'))
                                    <div class="alert alert-success">{!! Session::get('success') !!}</div>
                                @endif
                                @if (Session::has('failure'))
                                    <div class="alert alert-danger">{!! Session::get('failure') !!}</div>
                                @endif 
                            </div>                            
                            <form method="POST" action="{{ route('adminchangepassword.update') }}">
                                @csrf                                 

                            <div class="form_lst">
                                <label>Old Password <span class="star_red">*</span></label>
                                <span class="rltv">
                                    <input id="oldpassword" type="password" placeholder="Old Password" class="form-control @error('old-password') is-invalid @enderror" name="oldpassword" required autocomplete="oldpassword" autofocus>
                                @error('oldpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                                
                                </span>
                            </div>


                            <div class="form_lst">
                                <label>New Password <span class="star_red">*</span></label>
                                <span class="rltv">
                                    <input id="password" type="password" minlength="8" placeholder="New Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" autofocus>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </span>
                            </div>

                            <div class="form_lst">
                                <label>Confirm Password <span class="star_red">*</span></label>
                                <span class="rltv">
                                    <input id="password-confirm" type="password" minlength="8" placeholder="Confirm Password" class="form-control" equalTo="#password" name="password_confirmation" required autocomplete="new-password" autofocus>
                                </span>
                            </div>
                                
                            <div class="form_lst sssss">
                                <label class="blank_label">&nbsp;</label>
                                <span class="rltv">
                                <div class="pro_row_left">
                                    <input class="input_btn" type="submit" value="Update Password"/>                                     
                                        <a href="{{route ('admin.admin-myprofile')}}" class="input_btn rigjt" rel="nofollow">{{ __('Cancel') }}</a>
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