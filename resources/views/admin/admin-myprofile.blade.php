@extends('layouts.homeadmin')

@section('content')
<div class="image_sec" style="background-image: url(https://job-board-portal-script.logicspice.com/app/webroot/img/front/profile_banner.png)">
    <div class="container">
    <div class="row">
          
        <div class="col-lg-12">
            <div class="profile_img">
                <img src="/uploads/avatar/{{ Auth::user()->logo }}" alt="Logo"/></div>

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
            <div class="col-lg-9 col-sm-9">
                        <div class="info_dv">
                            <div class="heads"><i class="fa fa-user">&nbsp;My Profile</div></i>
                            <div class="information_cntn">
                                <div style="width:100%;"></div>
                            @if (Session::has('success'))
                                    <div class="alert alert-success">{!! Session::get('success') !!}</div>
                                @endif
                                @if (Session::has('failure'))
                                    <div class="alert alert-danger">{!! Session::get('failure') !!}</div>
                                @endif
                                <div class="form_lst">
                                    <label>Email Address</label>
                                    <span class="rltv"><em>
                                        @auth
                                            {{Auth::user()->email}}
                                        @endauth
                                    </em></span>
                                </div>

                                <div class="form_lst">
                                    <label>Company Name</label>
                                    <span class="rltv"><em>
                                        @auth
                                            {{Auth::user()->company}}
                                        @endauth
                                    </em></span>
                                </div>
        
                            </div>        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection