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
<div class="col-lg-9">

                        <div class="info_dv">
                            <div class="heads"><i class="fa fa-pencil">&nbsp;Edit Job Category</div></i>
                            <div class="information_cntn">
                                <div style="width:100%;"></div>


                <form action="{{ route('worktype.update', $worktype->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf   
                    

                <div class="form_lst">
                    <label>Job Category <span class="star_red">*</span></label>
                    <span class="rltv">
                        <input id="name" value="{{ $worktype->name}}" type="text" maxlength="50" placeholder="Work Type" class="form-control validname @error('name') is-invalid @enderror" name="name"  required autocomplete="name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror  
                    </span>
                    
                </div>

                                <div class="form_lst sssss">
                                    <label class="blank_label">&nbsp;</label>
                                    <span class="rltv">
                                        <div class="pro_row_left">
                                              
                                            <input class="input_btn" type="submit" value="Update"/>                                            
                                            <a href="{{route ('admin.admin-worktype')}}" class="input_btn rigjt" rel="nofollow">Cancel</a>
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
</div>
@endsection