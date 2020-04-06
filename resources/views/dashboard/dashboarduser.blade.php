    <div class="left_lnks">
        <div class="my_hd mobile_sh">My Profile</div>    
        <div class="my_hd profilebx"><span>My Profile</span></div>
        <ul class="profilediv">
            <li class="{{Request::path() === 'jobseeker/dashboard' ? 'active' : '' }}">
                <a href="{{route ('dashboard')}}" class="" rel="nofollow"><i class="fa fa-home"></i>{{ __('Dashboard') }}</a> </li>
            <li class="{{Request::path() === 'jobseeker/myprofile' ? 'active' : '' }}">
            	<a href="{{route ('myprofile')}}" class="" rel="nofollow"><i class="fa fa-user"></i>{{ __('My Profile') }}</a> </li> 
            <li class="{{Request::path() === 'jobseeker/editprofile' ? 'active' : '' }}">
            	<a href="{{route ('user.editprofile')}}" class="" rel="nofollow"><i class="fa fa-pencil"></i>{{ __('Edit Profile') }}</a></li> 
            <li class="{{Request::path() === 'jobseeker/education' ? 'active' : '' }}">
            	<a href="{{route ('user.education')}}" class="" rel="nofollow"><i class="fa fa-graduation-cap"></i>{{ __('Education') }}</a> </li> 
            <li class="{{Request::path() === 'jobseeker/experience' ? 'active' : '' }}">
            	<a href="{{route ('user.experience')}}" class="" rel="nofollow"><i class="fa fa-black-tie"></i>{{ __('Experience') }}</a> </li>
            <li class="{{Request::path() === 'jobseeker/skill' ? 'active' : '' }}">
                <a href="{{route ('user.skill')}}" class="" rel="nofollow"><i class="fa fa-vine"></i>{{ __('Skill') }}</a> </li>
            <li class="{{Request::path() === 'jobseeker/language' ? 'active' : '' }}">
                <a href="{{route ('user.language')}}" class="" rel="nofollow"><i class="fa fa-language"></i>{{ __('Language') }}</a> </li>    
            <li class="{{Request::path() === 'jobseeker/uploadresume' ? 'active' : '' }}">
                <a href="{{route ('uploadresume')}}" class="" rel="nofollow"><i class="fa fa-file"></i>{{ __('Upload Resume') }}</a> </li> 
        </ul>
    </div>

    <div class="left_lnks">
        <div class="my_hd mobile_sh">Quick links</div>
        <div class="my_hd quickbx"><span>Quick links</span></div>
        <ul class="quickdiv">
          <li class="{{Request::path() === 'jobseeker/bookmark' ? 'active' : '' }}">
            	<a href="{{url ('jobseeker/bookmark')}}" class="" rel="nofollow"><i class="fa fa-heart"></i>{{ __('Bookmark') }}</a></li>
            <li class="{{Request::path() === 'jobseeker/applied' ? 'active' : '' }}">
            	<a href="{{route ('user.appliedjobs')}}" class="" rel="nofollow"><i class="fa fa-briefcase"></i>Applied Jobs</a></li>
            <li>
            	<a href="{{ url('jobseeker/findjob') }}" class="" rel="nofollow"><i class="fa fa-search"></i>Search Jobs</a></li>
        </ul>
    </div>

    <div class="left_lnks">
        <div class="my_hd mobile_sh">Settings</div>    
        <div class="my_hd sattingbx"><span>Settings</span></div>
        <ul class="sattingsdiv">
           <li class="{{Request::path() === 'jobseeker/changepassword' ? 'active' : '' }}">
            	<a href="{{route ('user.changepassword')}}" class="" rel="nofollow"><i class="fa fa-key"></i>{{ __('Change Password') }}</a></li>
            <li class="{{Request::path() === 'jobseeker/uploadphoto' ? 'active' : '' }}">
            	<a href="{{route ('uploadphoto')}}" class="" rel="nofollow"><i class="fa fa-camera"></i>{{ __('Change Photo') }}</a></li>
            <li class="">
            	<a href="{{route ('user.logout')}}" class="" rel="nofollow"><i class="fa fa-sign-out"></i>{{ __('Logout') }}</a></li>
        </ul>
    </div>
</div>
<script type="text/javascript">
            $(document).ready(function () {
                $('.profilebx').click(function () {
                    if ($('.profilebx').hasClass('profileopen')) {
                        $('.profilebx').removeClass('profileopen');
                    } else {
                        $('.profilebx').addClass('profileopen');
                    }
                    $(".profilediv").slideToggle();
                });

                $('.quickbx').click(function () {

                    if ($('.quickbx').hasClass('quicklinkopen')) {
                        $('.quickbx').removeClass('quicklinkopen');
                    } else {
                        $('.quickbx').addClass('quicklinkopen');
                    }
                    $(".quickdiv").slideToggle();
                });

                $('.sattingbx').click(function () {

                    if ($('.sattingbx').hasClass('sattingsopen')) {
                        $('.sattingbx').removeClass('sattingsopen');
                    } else {
                        $('.sattingbx').addClass('sattingsopen');
                    }

                    $(".sattingsdiv").slideToggle();
                });

            });
        </script>