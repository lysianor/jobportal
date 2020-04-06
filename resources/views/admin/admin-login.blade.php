<!DOCTYPE html>
<html>
<head>
    <title>Gainstrong Manpower Inc. - Admin Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset ('images/logo.png')}}">
    <link rel="stylesheet" type="text/css" href="{{asset ('css/front/bootstrap.css')}}"/> 

</head>
<body>

<style>
.invalid-feedback {
    font-size: 80%;
    color: 
    #dc3545;
}
    .login-page {
      width: 360px;
      padding: 8% 0 0;
      margin: auto;
    }
    .form {
      position: relative;
      z-index: 1;
      background: #FFFFFF;
      max-width: 360px;
      margin: 0 auto 100px;
      padding: 45px;
      text-align: center;
      box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }
    .form input {
      font-family: "Roboto", sans-serif;
      outline: 0;
      background: #f2f2f2;
      width: 100%;
      border: 0;
      margin: 0 0 15px;
      padding: 15px;
      box-sizing: border-box;
      font-size: 14px;
    }
    .form button {
      font-family: "Roboto", sans-serif;
      text-transform: uppercase;
      outline: 0;
      background: #3c8dbc;
      width: 100%;
      border: 0;
      padding: 15px;
      color: #FFFFFF;
      font-size: 14px;
      -webkit-transition: all 0.3 ease;
      transition: all 0.3 ease;
      cursor: pointer;
    }
    .form button:hover,.form button:active,.form button:focus {
      background: #367fa9;
    }
    .form .message {
      margin: 15px 0 0;
      color: #b3b3b3;
      font-size: 12px;
    }
    .form .message a {
      color: #4CAF50;
      text-decoration: none;
    }
    .form .register-form {
      display: none;
    }
    .container {
      position: relative;
      z-index: 1;
      max-width: 300px;
      margin: 0 auto;
    }
    .container:before, .container:after {
      content: "";
      display: block;
      clear: both;
    }
    .container .info {
      margin: 50px auto;
      text-align: center;
    }
    .container .info h1 {
      margin: 0 0 15px;
      padding: 0;
      font-size: 36px;
      font-weight: 300;
      color: #1a1a1a;
    }
    .container .info span {
      color: #4d4d4d;
      font-size: 12px;
    }
    .container .info span a {
      color: #000000;
      text-decoration: none;
    }
    .container .info span .fa {
      color: #EF3B3A;
    }

    body {
      background: #76b252; /* fallback for old browsers */
      background: -webkit-linear-gradient(right, #76b852, #8DC26F);
      background: -moz-linear-gradient(right, #76b852, #8DC26F);
      background: -o-linear-gradient(right, #76b852, #8DC26F);
      background: linear-gradient(to left, #d2d6de, #d2d6de);
      font-family: "Roboto", sans-serif;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;      
    }
</style>

<div class="login-page">
  <div class="form">
    
    <div class="login_form">
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
        <img src="../images/banner.png" alt="Gainstrong Manpower Inc." title="Gainstrong Manpower Inc."/>
    <p style="font-family: Arial; font-size: larger;">Admin Login</p>
    <form class="login-form" method="POST" action="{{ route('admin.admin-login') }}">
        @csrf                        

            <input id="email" type="email" maxlength="30" placeholder="Email Address" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
<br>
            <input id="password" type="password" minleght="8" maxlength="30" placeholder="Password" class="form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            
            <button type="submit" class="input_btn">
                {{ __('Login') }}
            </button>   
    </form>
  
  </div>
</div>
</div>
</body>
</html>