@extends('layouts.home')

@section('content')
<section class="slider_abouts">
    <div class="breadcrumb-container">
        <nav class="breadcrumbs page-width breadcrumbs-empty">
            <h3 class="head-title">Forgot Password</h3>
            <a href="./" title="Back to the frontpage">Home</a>
            <span class="divider">/</span>
            <span>Forgot Password</span>
        </nav>
    </div>
</section>
<section class="login">
    <div class="login-form-area pb-100 pt-100">
        <div class="container">
            <div class="use">
        <div class="content login_cnter">
            <div class="login_form_container">
            <div class="login-form form-bg">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <h3>Forgot Password</h3>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf                   
                        <div class="form_contnrd">
                        <div style="width:100%;"></div>
                        <div class="entro">Enter the e-mail address associated with your account. Click submit to have your password e-mailed to you.</div>

                        <div class="form_lst">
                            <div class="rltv">
                                <div class="info-field">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror                                
                                </div>

                                <span class="fg_lk fulliwasd">
                                    <li data-toggle="modal">
                                        Oops, I just remembered it! Take me back to the <a href="/users/login" class="">Login</a>
                                    </li>
                                </span>

                            </div>
                        </div>

                        <div class="form_lst dotno">
                            <div class="btn-green  buttonfx">
                                <input class="btn_same" type="submit" value="Submit"/>                            
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