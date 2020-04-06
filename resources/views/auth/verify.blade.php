@extends('layouts.home')

@section('content')
<div class="iner_pages_formate_box">
	<div class="wrapper">
    	<div class="iner_form_bg_box">
        	<div class="top_page_name_title">
                    <div class="page_name_boox"><span><h1>
                        Verify Your Email Address</h1></span></div>
            </div>
            <div class="clear"></div>
                <div class="inpfil">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

    				{{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>             
            <div class="clr"></div>
            </div>
        </div>
    </div>
</div>     
@endsection
