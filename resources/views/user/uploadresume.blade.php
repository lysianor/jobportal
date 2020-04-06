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
                        <div class="heads"><i class="fa fa-file">&nbsp;Upload Resume</div></i>
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

                           <form action="{{ route('uploadresume') }}" method="POST" enctype="multipart/form-data">
                                @csrf                            


                            <div class="form_lst">
                                <label>File <span class="star_red">*</span></label>
                                <span class="rltv">
                                        <input type="file" name="resume[]" class="form-control">
                                    <div class="supported-types"><p>- Supported file types: doc, docx, pdf.
                                        <br> - Maximum file size of 3MB.</p>
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
</div>
@endsection    