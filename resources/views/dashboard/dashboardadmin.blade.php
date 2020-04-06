    <div class="left_lnks">
        <div class="my_hd mobile_sh">Dashboard</div>    
        <div class="my_hd quickbx2"><span>Dashboard</span></div>
       <ul class="quickdiv2">
            <li class="{{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                <a href="{{route ('admin.admin-dashboard')}}" class="" rel="nofollow"><i class="fa fa-home"></i>{{ __('Dashboard') }}</a></li>
            <li class="{{ (request()->is('admin/createjob')) ? 'active' : '' }}">
                <a href="{{route ('admin.admin-createjob')}}" class="" rel="nofollow"><i class="fa fa-plus"></i>{{ __('Create Job') }}</a></li>
            <li class="{{ (request()->is('admin/manage/job')) ? 'active' : '' }}">
                <a href="{{route ('admin.admin-managejob')}}" class="" rel="nofollow"><i class="fa fa-id-card"></i>{{ __('Manage Jobs') }}</a></li> 
            <li class="{{ (request()->is('admin/company', 'admin/company/create')) ? 'active' : '' }}">
                <a href="{{route ('admin.admin-company')}}" class="" rel="nofollow"><i class="fa fa-building"></i>{{ __('Company') }}</a></li>
            <li class="{{ (request()->is('admin/job-category', 'admin/job-category/create')) ? 'active' : '' }}">
                <a href="{{route ('admin.admin-jobcategory')}}" class="" rel="nofollow"><i class="fa fa-list"></i>{{ __('Job Categories') }}</a></li>
            <li class="{{ (request()->is('admin/tag', 'admin/tag/create')) ? 'active' : '' }}">
                <a href="{{route ('admin.admin-tag')}}" class="" rel="nofollow"><i class="fa fa-tag"></i>{{ __('Tag') }}</a></li>
            <li class="{{ (request()->is('admin/jobseeker/view')) ? 'active' : '' }}">
                <a href="{{route ('admin.admin-viewjobseeker')}}" class="" rel="nofollow"><i class="fa fa-id-card"></i>{{ __('View Jobseeker') }}</a></li>    
        </ul>
    </div>
    <div class="left_lnks">
        <div class="my_hd mobile_sh">Quick links</div>    
        <div class="my_hd dashboardsbx"><span>Quick links</span></div>
        <ul class="dashboardsdiv">
            <li class="{{ (request()->is('admin/myprofile')) ? 'active' : '' }}">
                <a href="{{route ('admin.admin-myprofile')}}" class="" rel="nofollow"><i class="fa fa-user"></i>{{ __('My Profile') }}</a></li> 
            <li class="{{ (request()->is('admin/editprofile')) ? 'active' : '' }}">
                <a href="{{url ('admin/editprofile')}}" class="" rel="nofollow"><i class="fa fa-pencil"></i>{{ __('Edit Profile') }}</a> </li> 
            <li class="{{ (request()->is('admin/changepassword')) ? 'active' : '' }}">
                <a href="{{url ('admin/changepassword')}}" class="" rel="nofollow"><i class="fa fa-key"></i>{{ __('Change Password') }}</a></li>
            <li class="{{ (request()->is('admin/changelogo')) ? 'active' : '' }}">
                <a href="{{route ('admin.admin-changelogo')}}" class="" rel="nofollow"><i class="fa fa-camera"></i>{{ __('Change Logo') }}</a></li>
            <li class="">
                <a href="{{route ('admin.logout')}}" class="" rel="nofollow"><i class="fa fa-sign-out"></i>{{ __('Logout') }}</a></li>
                
        </ul>
    </div>
</div>
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