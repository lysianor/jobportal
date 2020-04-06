@extends('layouts.home')
@section('content')
 <section class="slider_abouts">
    <div class="breadcrumb-container">
    <nav class="breadcrumbs page-width breadcrumbs-empty">
      
      <h3 class="head-title">Contact Us</h3>
        <a href="./" title="Back to the frontpage">Home</a>
          <span class="divider">/</span>
          <span>Contact Us</span>
    </nav>
</div>
</section>

<section class="contact_us">
    <div class="job-post-details-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <div class="contact-wrapper">
                       
                        <div class="google-maps mb-4">
                            <iframe width="992" height="413" id="gmap_canvas" src="https://maps.google.com/maps?q=Gainstrong%20Manpower%20Marikina&t=&z=15&ie=UTF8&iwloc=&output=embed" style="border:0;width:100%;height:450px;" allowfullscreen=""></iframe>

                        </div>
                        <div class="contact-form">
                            <div class="cont_ac">
<!--                    <div class="con_left">
                       
                                                    <div class="inputs"> 
                                <div class="copmanys copmanys_name"> 
                                    <small><i class="fa fa-institution blubx"></i></small>
                                    <div class="metios"> 
                                        <em>Company Name</em>
                                        <b>
                                            Job Board Portal Script                                        </b>
                                    </div>
                                </div>
                                                                    <div class="copmanys copmanys_address">
                                        <small><i class="fa fa-home blubx"></i></small>
                                        <div class="metios">
                                            <em>Address</em>
                                            <b>
                                                South San Francisco, California, United States                                            </b>
                                        </div>
                                    </div>
                                                                                                    <div class="copmanys copmanys_contace">
                                        <small><i class="fa fa-phone-square blubx"></i></small>
                                        <div class="metios">
                                            <em>Contact</em>
                                            <b>
                                                9856214766                                            </b>
                                        </div>
                                    </div>
                                                                                                    <div class="copmanys copmanys_email">
                                        <small><i class="fa fa-envelope-o blubx"></i></small>
                                        <div class="metios">
                                            <em>Email</em>
                                            <b>
                                                dinesh.dhaker@logicspice.com                                            </b>
                                        </div>
                                    </div>
                                                                <span class="cont"> </span>

                        </div>
                        

                        
                                            </div>-->

                    <div class="rig_con" style="">
                    </div>
                    <div class="clear"></div>

                </div>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-4 col-md-5">
                    <div class="right-sidebar">
                        <div class="sidebar-widget mb-4">
                            <div class="sidebar-title">
                                <h3>Search Jobs</h3>
                            </div>
                            <div class="sidebar-details">
                            <form action="/findjob/search" method="GET">                                           
                                <div class="form-group">
                                    <input name="search" maxlength="255" autocomplete="off" data-suggesstion="homekeyword-box" data-search="Search" label="" class="from-control" placeholder="Keywords" value="" type="text" id="JobKeyword"/>
                                </div>
                                    <button type="submit" class="buttonfx curtainup">Search</button>
                            </form>                            
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <div class="sidebar-title">
                                <h3>Contact info</h3>
                            </div>
                            <div class="sidebar-details">
                                <div class="contact-details  ">
                                    <div class="icon"><i class="fa fa-envelope-o"></i></div>
                                    <div class="contact-info">
                                        <p>Email: <span><a href="mailto:info@gainstrong.com.ph">info@gainstrong.com.ph</a></span></p>
                                    </div>
                                </div>
                                <div class="contact-details">
                                    <div class="icon"><i class="fa fa-phone"></i></div>
                                    <div class="contact-info">
                                        <p>Phone: <span>588-0487</span></p>
                                    </div>
                                    <div class="icon"><i class="fa fa-mobile"></i></div>
                                    <div class="contact-info">
                                        <p>Phone: <span>0917-6242063</span></p>
                                    </div>
                                </div>
                                <div class="contact-details  ">
                                    <div class="icon"><i class="fa fa-map-marker"></i></div>
                                    <div class="contact-info">
                                        <p>Location: <span>2nd Floor SMSI Building Guerilla St. Sto. Nino, Marikina City</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection