@extends('layouts.homeuser')

@section('content')
<div class="image_sec" style="background: url(../images/profile_banner.png">
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
<script type="text/javascript">
    $(document).ready(function () {

        $('.quickbx2').click(function () {

            if ($('.quickbx2').hasClass('quicklinkopen2')) {
                $('.quickbx2').removeClass('quicklinkopen2');
            } else {
                $('.quickbx2').addClass('quicklinkopen2');
            }
            $(".quickdiv2").slideToggle();
        });

        $('.dashboardsbx').click(function () {

            if ($('.dashboardsbx').hasClass('dashboardsopen')) {
                $('.dashboardsbx').removeClass('dashboardsopen');
            } else {
                $('.dashboardsbx').addClass('dashboardsopen');
            }

            $(".dashboardsdiv").slideToggle();
        });

    });
</script>          
        	<div class="col-xs-12 col-sm-6 col-md-9 col-lg-9">
                <div class="info_dv">
                    <div class="heads"><i class="fa fa-user">&nbsp;My Profile</div></i>
                        <div class="information_cntn">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                                
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
                            <div style="width:100%;"></div> 
                               
                        <div class="form_lst">
                            <label>Email Address</label>
                            	<span class="rltv"><em>
                            	@auth
                            		{{Auth::user()->email}}
                            	@endauth
                                </em></span>
                        </div>
                            
                        <div class="form_lst">
                            <label>First Name</label>
                                <span class="rltv"><em>
                                @auth
                                    {{ucwords(Auth::user()->first_name)}}
                                @endauth
                                </em></span>
                        </div>

                        <div class="form_lst">
                            <label>Middle Name</label>
                                <span class="rltv"><em>
                                @auth
                                    {{ucwords(Auth::user()->middle_name)}}
                                @endauth
                            </em></span>
                        </div>

	                    <div class="form_lst">
	                        <label>Last Name</label>
	                        	<span class="rltv"><em>
                                @auth
                                    {{ucwords(Auth::user()->last_name)}}
                                @endauth
                            </em></span>
	                    </div>

                        <div class="form_lst">
                            <label>Nationality</label>
                                <span class="rltv"><em>                                
                                @auth
                                    {{ucwords(Auth::user()->nationality)}}
                                @endauth 
                            </em></span>
                        </div>
	                    
	                    <div class="form_lst">
	                        <label>Address</label>
	                        	<span class="rltv"><em>                                
                                @auth
                                    {{ucwords(Auth::user()->address)}}
                                @endauth 
                            </em></span>
	                    </div>
	                    
	                    <div class="form_lst">
	                        <label>Gender</label>
	                        	<span class="rltv"><em>                                
                                @auth
                                    {{Auth::user()->gender}}
                                @endauth 
                            </em></span>
	                    </div>

                        <div class="form_lst">
                            <label>Date of Birth<pre>(yy/mm/dd)</pre></label>
                                <span class="rltv"><em>                                
                                @auth
                                    {{Auth::user()->birthday}}
                                @endauth
                                

                            </em></span>
                        </div>
	                    
	                    <div class="form_lst">
	                        <label>Contact Number</label>
	                        	<span class="rltv"><em>                                
                                @auth
                                    {{Auth::user()->contact_number}}
                                @endauth 
                            </em></span>
	                    </div>
	                                                
	                    <div class="form_lst">
	                       <label>Interest Category</label>
                                <span class="rltv"><em>                                
                                @auth
                                    {{ ucfirst(Auth::user()->interest)}}
                                @endauth 
                            </em></span>
	                    </div>                 
	                                                
						<div class="form_lst">
	                        <label>Tell something about yourself</label>
	                            <span class="rltv"><em>                                
                                @auth
                                    {{ucfirst(Auth::user()->description)}}
                                @endauth 
                            </em></span>
	                    </div>
                                                        
                       	<div class="form_lst">
                            <label>CV Document </label>
                                <span class="rltv"><em>
                                    <a href="/uploads/resume/{{Auth::user()->resume}}" >{{Auth::user()->resume}}</a>
                                  </em></span>
                        </div>
                            <div style="float: right;">
                                <a href="{{route ('user.editprofile')}}" class="input_btn rigjt" rel="nofollow">{{ __('Edit Profile') }}</a>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection