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
                            <div class="heads">Edit Tag</div>
                            <div class="information_cntn">
                                <div style="width:100%;"></div>
{{--                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success')}}
                    </div>
                @endif
                @if(session('warning'))
                    <div class="alert alert-warning">
                        {{ session('warning')}}
                    </div>
                @endif --}}


                <form action="{{ route('tag.update', $tag->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf   
                    

                <div class="form_lst">
                    <label>Tag<span class="star_red">*</span></label>
                    <span class="rltv">
                        <input id="tag" value="{{ $tag->tag}}" type="text" maxlength="50" placeholder="Job Category" class="form-control @error('tag') is-invalid @enderror" name="tag"  required autocomplete="tag">
                            @error('tag')
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
                                            <a href="{{route ('admin.admin-tag')}}" class="input_btn rigjt" rel="nofollow">Cancel</a>
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