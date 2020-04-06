@extends('layouts.home')

@section('content')

<section class="slider_abouts">
    <div class="breadcrumb-container">
        <nav class="breadcrumbs page-width breadcrumbs-empty">
            <h3 class="head-title">Jobseeker Sign In</h3>
            <a href="./" title="Back to the frontpage">Home</a>
            <span class="divider">/</span>
            <span> Login </span>
        </nav>
    </div>
</section>
<section class="login">
    <div class="login-form-area pb-100 pt-100">
        <div class="container">
            <div class="use">
                <div class="content login_cnter">   
                    <div class="login_form_container">
                        <div style="width:100%;"></div>  
                        <div class="login-form form-bg">
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
                            <h3>Login</h3>
                            <form method="POST" action="{{ route('login') }}">
                            @csrf 
                            <div class="form_contnrd">
                                <div class="form_lst">
                                    <div class="rltv">
                                        <div class="info-field">
                                            <input id="email" type="email" maxlength="30" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror                                        
                                        </div>
                                    </div>
                                </div>

                                <div class="form_lst">
                                    <div class="rltv">
                                        <div class="info-field">
                                            <input id="password" type="password" minleght="8" maxlength="30" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror                                       
                                        </div>
                                    </div>
                                </div>
                                   
                                <div class="form_lst dotno">
                                    <span class="rmmr_me">
                                        <div class="checkbox2">
                                            <input class="css-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="checkboxG1" >Remember me</label>
                                        </div> 
                                    </span>

                                    <span class="fg_lk" data-toggle="modal">
                                        @if (Route::has('password.request'))
                                            <a rel="nofollow" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </span>
                                </div>
                                <div class="form_lst dotno">
                                    <div class="btn-green  buttonfx curtainup mb-1 mt-2">                                        
                                        <input class="btn_same" type="submit" value="Login"/>                                    
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
</section>
@endsection