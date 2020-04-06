<?php

$current_month = date('M');
$last_month = date('M',strtotime("-1 month"));
$last_to_last_month = date('M',strtotime("-2 month"));
 
$dataPoints = array(
  array("y" => $last_to_last_month_users, "label" => $last_to_last_month),
  array("y" => $last_month_users, "label" => $last_month),
  array("y" => $current_month_users, "label" => $current_month)
);
 
?>
@extends('layouts.homeuser')

@section('content')
<script>
window.onload = function () {
    
var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    
    title:{
        text:"Applied Jobs"
    },
    axisX:{
        interval: 1
    },
    axisY2:{
        // interlacedColor: "rgba(1,77,101,.2)",
        gridColor: "rgba(1,77,101,.1)",
        title: "Number of Applied Jobs"
    },
    data: [{
        type: "column",
        name: "companies",
        axisYType: "secondary",
        color: "#4682B4",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?> 
    }]
});
chart.render();

}
</script>
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
        	<div class="col-xs-12 col-sm-6 col-md-9 col-lg-9">
                <div class="info_dv">
                    <div class="heads"><i class="fa fa-home">&nbsp;Dashboard</div></i>
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
                               
            <div class="row gutters">
                <div class="col-sm-12"></div>          
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                        <a href="{{url('jobseeker/applied')}}">
                            <div class="info-stats4">
                                <div class="icon-type pull-left">
                                    <i class="fa fa-envelope-open"></i>
                                </div>
                                <div class="sale-num">
                                    <h4>{{$appliedjobs->count()}}</h4>
                                    <p>Applied Jobs</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                        <a href="{{url('jobseeker/bookmark')}}">
                            <div class="info-stats4">
                                <div class="icon-type pull-left">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="sale-num">
                                    <h4>{{$bookmarkjobs->count()}}</h4>
                                    <p>Save Jobs</p>
                                </div>
                            </div>
                        </a>
                    </div>

            </div>

            <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                                           
                    </div>

                        <div class="container-fluid">
                        <hr>
                        <div class="row-fluid">
                          <div class="span12">
                            <div class="widget-box">
                              <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                              </div>
                              <div class="widget-content nopadding">
                                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                </div>
            </div>

	                   
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection