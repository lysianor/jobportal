@extends('layouts.homeadmin')

@section('content')
<div class="image_sec" style="background-image: url(https://job-board-portal-script.logicspice.com/app/webroot/img/front/profile_banner.png)">
    <div class="container">
    <div class="row">
          
        <div class="col-lg-12">
            <div class="profile_img">
                <img src="/uploads/avatar/{{ Auth::user()->logo }}" alt=""/></div>

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
<div class="col-xs-12 col-sm-3 col-md-9 col-lg-9">

                    <div class="info_dv">
                        <div class="heads"><i class="fa fa-camera">&nbsp;Change Logo</div></i>
                        <div class="information_cntn">

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
                        
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input, Please try again.
                                <br>
                            <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                            </ul>
                            </div>
                        @endif                           
                        <div style="width:100%;"></div>

                           <form action="{{ url('admin/changelogo') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form_lst">
                                <label>Current Image <span class="star_red"></span></label>
                                <span class="rltv">
                                    <div class="user_img_box">
                                        
                                       {{--  <div class="showchange showmede2 delete_icon" id="photo22">
                                            <a class="edit_profilepicture" href="/uploads/avatar/{{ Auth::user()->avatar }}" onClick="return confirm('Are you sure you want to Delete ?');">
                                                        <i class="fa fa-trash-o"></i> <span class="edit_profilepicture_icon"></span>
                                            </a>
                                        </div> --}}
                                             <img src="/uploads/avatar/{{ Auth::user()->logo }}" rel="nofollow" alt=""/>
                                        </div>    
                                </span>
                            </div>

                                 <div class="form_lst">
                                <label>New Logo <span class="star_red">*</span></label>
                                <span class="rltv">
                                         <input type="file" name="logo" class="form-control" id="logo"/>
                                    <div class="supported-types"><p>- Supported file types: jpg, jpeg, png (Max. 1 MB)
                                        <br> - Maximum file size 350 X 350 pixels</p>
                                    </div>
                                </span>
                            </div>
                                

                                <div class="form_lst sssss">
                                <label class="blank_label">&nbsp;</label>
                                <span class="rltv">
                                    <div class="pro_row_left">
                                     <input class="input_btn" onclick="return imageValidation();" type="submit" value="Upload"/>
                                        <a href="{{route ('admin.admin-myprofile')}}" class="input_btn rigjt" rel="nofollow">{{ __('Cancel') }}</a>                
                                    </div> 
                                </span>
                            </div>
                            </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection