@extends('layouts.home')

@section('content')
<section class="slider_abouts">
    <div class="breadcrumb-container">
        <nav class="breadcrumbs page-width breadcrumbs-empty">
            <h3 class="head-title">Jobseeker Sign up</h3>
            <a href="./" title="Back to the frontpage">Home</a>
            <span class="divider">/</span>
            <span> Sign up </span>
        </nav>
    </div>
</section>
<section class="login">
    <div class="login-form-area pb-100 pt-100">
        <div class="container">
            <div class="use">

                <div class="content login_cnter">
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
                    <div class="login_form_container">

                        <form method="POST" action="{{ route('register') }}">
                        @csrf     
                        <div class="login-form form-bg">
                            <h3>Create An Account</h3>
                            <div class="form_contnrd">
                                <div style="width:100%;"></div>                                

                                <div class="form_lst">
                                    <div class="rltv">
                                        <div class="info-field">
                                            <div class="form_lst_row">
                                                <input id="first_name" type="text" maxlength="30" placeholder="First Name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                                    @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror         
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form_lst">
                                    <div class="rltv">
                                        <div class="info-field">
                                            <div class="form_lst_row">
                                                <input id="last_name" type="text" maxlength="30" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                                    @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror 
                                            </div>
                                        </div>
                                    </div>                    
                                </div>
                                <div class="form_lst">
                                    <div class="rltv">
                                        <div class="info-field">
                                            <div class="form_lst_row">
                                                <input id="email" type="email" maxlength="30" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form_lst">
                                    <div class="rltv">
                                        <div class="info-field">
                                            <div class="form_lst_row">
                                                <input id="password" type="password" minlength="8" maxlength="30" placeholder="Password "  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                            </div>
                                        </div>       
                                    </div>
                                </div>
                                <div class="form_lst">
                                    <div class="rltv">
                                        <div class="info-field">
                                            <div class="form_lst_row">
                                                <input id="password-confirm" minlength="8" maxlength="30" type="password" placeholder="Confirm Password"  class="form-control" name="password_confirmation" required autocomplete="new-password">       
                                            </div>
                                        </div>
                                    </div>       
                                </div>
                                <div class="form_lst dotno">
                                <div class="btn-green  buttonfx curtainup">
                                    <input class="btn_same" type="submit" value="Submit"/>&nbsp;
                                    <input id="reset" type="reset" value="Reset">
                                </div>
                                </div>
                                <div class="row_defaultt">
                                    <div class="col_devide_full reun_takine">
                                        By signing up, you agree to Gainstrong Manpower Inc. 
                                    <a href="javascript:void(0);" onclick="window.open('{{route ('termsandconditions')}}', 'term', 'width=900,height=400,scrollbars=1')" class="term_cond link_color" id="errorterms"> Terms and Conditions</a>
                                                
                                    </div>
                                </div>
                                <div class="row_defaultt">
                                    <div class="col_devide_full reun_takine">Already a member?
                                        <a href="{{ route('login') }}" class="">Sign In Here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
