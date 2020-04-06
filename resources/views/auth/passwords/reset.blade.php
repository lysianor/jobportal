@extends('layouts.home')

@section('content')
<div class="main_container">
    <div class="wrapper">
        <div class="content login_cnter login_cnter_forgot">
            <div class="forgot_cnter">
                 <div class="upper_hd_dv"> <span class="login_bhgy">Reset your password</span> </div>
            <div class="login_form">
                <div class="lefty_dv_fo">

                    <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                        <input type="hidden" name="token" value="{{ $token }}">                    
                        <div class="form_contnr">
                        <div style="width:100%;"></div>    
                        <input type="hidden" name="_method" value="POST"/>
                        <div class="form_lst">
                            <span class="rltv">
                                <input id="email" type="email" name="email"  value="{{ $email ?? old('email') }}" hidden> 
                            </span>
                        </div>
                                 
                        <div class="form_lst">
                            <label>New Password</label>
                            <span class="rltv">
                                <input id="password" type="password" minlength="8" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </span>
                        </div>

                        <div class="form_lst">
                            <label>Confirm Password</label>
                            <span class="rltv">
                                <input id="password-confirm" type="password" class="form-control" equalTo="#password" name="password_confirmation" required autocomplete="new-password">
                            </span>
                        </div>
                        <div class="form_lst dotno">
                            <label>&nbsp;</label>
                            <div class="kg_sb rltv">
                                <input class="input_btn" type="submit" value="Reset Password"/>                            
                            </div>
                        </div>
                    </div>      
                 </form>                
             </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection