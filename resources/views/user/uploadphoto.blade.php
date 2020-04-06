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
<div class="col-xs-12 col-sm-3 col-md-9 col-lg-9">

                    <div class="info_dv">
                        <div class="heads"><i class="fa fa-camera">&nbsp;Change Profile Picture</div></i>
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

                           <form action="{{ route('uploadphoto') }}" method="POST" enctype="multipart/form-data">
                                @csrf                            
                            <div class="form_lst">

                                <label>Current Image <span class="star_red"></span></label>
                                <span class="rltv">
                                    <div class="user_img_box">
                                     {{--  @foreach ($errors as $file)  
                                     <form id="delete-form-{{$avatar->id}}" method="post" action="{{ route('uploadphoto.destroy', $avatar->id) }}" style="display: none;">
                                                    @csrf
                                                    {{ method_field('DELETE')}}
                                            </form> 
                                            
                                        <div class="showchange showmede2 delete_icon" id="photo22">
                                            <a href="" class="fa fa-trash-o" onclick="
                                                    if(confirm('Are you sure you want to Delete ?'))
                                                        {
                                                            event.preventDefault();
                                                            document.getElementById('').submit();

                                                        }else{
                                                            event.preventDefault();}"></a>
                                            
                                         
                                        </div>
                                        @endforeach   --}}
                                             <img src="/uploads/avatar/{{ Auth::user()->avatar }}" rel="nofollow" alt=""/>
                                        </div>    
                                </span>
                            </div>


                            <div class="form_lst">
                                <label>New Image <span class="star_red">*</span></label>
                                <span class="rltv">
                                         <input type="file" name="avatar" class="form-control" id="avatar"/>
                                    <div class="supported-types"><p>- Supported file types: jpg, jpeg, png (Max. 1 MB)
                                        <br> - Maximum file size 350 X 350 pixels</p>
                                    </div>
                                </span>
                            </div>

                            <div class="form_lst sssss">
                                <label class="blank_label">&nbsp;</label>
                                <span class="rltv">
                                    <div class="pro_row_left">
                                     <input class="input_btn" type="submit" value="Upload"/>
                                        <a href="{{route ('myprofile')}}" class="input_btn rigjt" rel="nofollow">{{ __('Cancel') }}</a>                
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
</div>{{-- <script>
    function in_array(needle, haystack) {
        for (var i = 0, j = haystack.length; i < j; i++) {
            if (needle == haystack[i])
                return true;
        }
        return false;
    }

    function getExt(filename) {
        var dot_pos = filename.lastIndexOf(".");
        if (dot_pos == -1)
            return;
        return filename.substr(dot_pos + 1).toLowerCase();
    }


    function imageValidation() {

        var filename = document.getElementById("UserProfileImage").value;
        var filetype = ['jpg', 'jpeg', 'png', 'gif'];
        if (filename != '') {
            var ext = getExt(filename);
            ext = ext.toLowerCase();
            var checktype = in_array(ext, filetype);
            if (!checktype) {
                alert(ext + " file not allowed for image.");
                document.getElementById("UserProfileImage").value = '';
                return false;
            } else {
                var fi = document.getElementById('UserProfileImage');
                var filesize = fi.files[0].size;//check uploaded file size
                var over_max_size = 10 * 1048576;
                if (filesize > over_max_size) {
                    alert('Maximum 10 MB file size allowed for image.');
                    document.getElementById("UserProfileImage").value = '';
                    return false;
                }
            }
        }
    }

</script> --}}
@endsection    