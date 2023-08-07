<!DOCTYPE html>
<html  class="no-js">

<head>
 <meta charset="">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<title> Tandoor House</title>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- Stylesheets -->
<link href="{{url('web-resources/css/bootstrap.css')}}" rel="stylesheet" async>
<link href="{{url('web-resources/css/style.css')}}" rel="stylesheet" async>
<link rel="shortcut icon" href="" type="image/x-icon">
<link rel="icon" href="" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="{{url('web-resources/css/responsive.css')}}" rel="stylesheet" async>
<link href="{{url('web-resources/css/mystyle.css')}}" rel="stylesheet" async>

<script src="{{url('web-resources/js/jquery.js')}}" ></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</head>

<body>
  <div class="page-wrapper pattern1" style="background:#FFEB3B"> 

    
    <!-- Main Header-->
    <header class="main-header header-down">
        <div class="header-top">
            <div class="auto-container">
                <div class="inner clearfix">
                    <div class="top-left clearfix">
                        <ul class="top-info clearfix">
                                                    <li>
                                <i class="icon far fa-map-marker-alt"></i> Rasapunja More, Kolkata - 7001041

                            </li>
                                                        <!-- <li><i class="icon far fa-clock"></i> Daily : 8.00 am to 10.00 pm</li> -->
                        </ul>
                    </div>
                    <div class="top-right clearfix">
                        <ul class="top-info clearfix">
                           
                                                        <li>
                                <a href="tel:+917980667658"><i class="con far fa-phone"></i>  +91 7980667658 </a>
                            </li>
                                                                                    <li>
                                <a href="mailto:enquiry@tandoormahal.in"><i class="icon far fa-envelope"></i> enquiry@tandoormahal.in </a>
                            </li>
                                                    </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Upper -->
        <div class="header-upper">        
            <div class="auto-container">
                <!-- Main Box -->
                <div class="main-box clearfix">
                    <!--Logo-->
                    <div class="logo-box">
                         <div class="logo"><a href="<?=URL::to('/');?>"><img src="<?=URL::to('/');?>/web-resources/images/logo.png" alt=""></a></div>
                    </div>

                    <div class="nav-box clearfix">
                        <!--Nav Outer-->
                        <div class="nav-outer clearfix">         
                            <nav class="main-menu">
                                <ul class="navigation clearfix">
                                <li class="current"><a href="<?=URL::to('/');?>">Home</a></li>
                                <li><a href="about.html">About Us</a></li>
                                </ul> 

                            </nav>
                            <!-- Main Menu End-->
                        
                        </div>
                        <!--Nav Outer End-->

                        <div class="links-box clearfix">
                         
                        <form method="get" id="search_form" action="<?=URL::to('/');?>/menu">
                        <div class="form-group" style="text-align: left;">
                            
                            <a href="{{route('/cart')}}" class="cart-icon search-mob-btn mr-3">
                                <span class="btn-wrap">
                                    <span class="text-one">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span class="badge badge-danger cart-badge">1</span>
                                    </span>
                                </span>
                            </a>
                            <a href="{{route('/cart')}}" class="cart-icon search-mob-btn mr-3">
                                <span class="btn-wrap">
                                    <span class="text-one">
                                        <i class="fa fa-bell"></i>
                                        <span class="badge badge-danger cart-badge">1</span>
                                    </span>
                                </span>
                            </a>
                        </div>
                    </form>
                        </div>

                        <!-- Hidden Nav Toggler -->
                        <!-- <div class="nav-toggler">
                            <button class="hidden-bar-opener">
                                <span class="hamburger">
                                    <span class="top-bun"></span>
                                    <span class="meat"></span>
                                    <span class="bottom-bun"></span>
                                </span>
                            </button>
                        </div> -->

                    </div>

                </div>
            </div>
        </div>
    </header>
    <!--End Main Header -->
    
    <!--Menu Backdrop-->
    <div class="menu-backdrop"></div>

    <!-- Hidden Navigation Bar -->
    <section class="hidden-bar">
        <!-- Hidden Bar Wrapper -->
        <div class="inner-box">
            <div class="cross-icon hidden-bar-closer"><span class="far fa-close"></span></div>
            <div class="logo-box"><a href="<?=URL::to('/');?>" ><img src="<?=URL::to('/');?>/web-resources/images/logo.png" alt="" ></a></div>
            
            <!-- .Side-menu -->
            <div class="side-menu">
                <ul class="navigation clearfix">
                    <li class="current"><a href="index.html">Home</a></li>
                    <li><a href="about.html">About Us</a></li>

                </ul>
            </div><!-- /.Side-menu -->
            
           
        </div><!-- / Hidden Bar Wrapper -->
    </section>
    <!-- / Hidden Bar -->

    <!--Info Back Drop-->
    <div class="info-back-drop"></div>
    
    <!-- Hidden Bar -->
    <section class="info-bar">
        <div class="inner-box">
            <div class="cross-icon"><span class="far fa-close"></span></div>
            <div class="logo-box"><a href="<?=URL::to('/');?>" ><img src="<?=URL::to('/');?>/web-resources/images/logo.png" alt="" ></a></div>
            <div class="image-box"><img src="<?=URL::to('/');?>/web-resources/images/logo.png" alt="" title=""></div>

            <h2>Visit Us</h2>
            <ul class="info">
                <li>Rasapunja  <br>Kolkata 700104, WB</li>
                <li><a href="mailto:booking@domainame.com">booking@domainame.com</a></li>
            </ul>
            <div class="separator"><span></span></div>
            <div class="booking-info">
                <div class="bk-title">Booking request</div>
                <div class="bk-no"><a href="tel:+91 7980667658">+91 7980667658</a></div>
            </div>
        </div>
    </section>
    <!--End Hidden Bar -->

    <!-- Banner Section -->