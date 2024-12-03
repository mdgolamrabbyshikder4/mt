<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title>
    <!-- Optionally, you can specify different sizes of favicons for different devices -->
    <link rel="icon" sizes="16x16" href="{{url('/public/client')}}/images/icon/logo.png">
    <link rel="icon" sizes="32x32" href="{{url('/public/client')}}/images/icon/logo.png">
    <link rel="icon" sizes="96x96" href="{{url('/public/client')}}/images/icon/logo.png">
    <!-- Fontfaces CSS-->
    <link href="{{url('/public/admin')}}/css/font-face.css" rel="stylesheet" media="all">
    <link href="{{url('/public/admin')}}/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="{{url('/public/admin')}}/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="{{url('/public/admin')}}/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{url('/public/admin')}}/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{url('/public/admin')}}/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="{{url('/public/admin')}}/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="{{url('/public/admin')}}/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="{{url('/public/admin')}}/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="{{url('/public/admin')}}/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="{{url('/public/admin')}}/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="{{url('/public/admin')}}/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css" />
  
    <!-- Main CSS-->
    <link href="{{url('/public/admin')}}/css/theme.css" rel="stylesheet" media="all">

    <style>
   .logo img{
        height: 50px !important;
   }
   .service_img{
    height: 30px;
   }
   #partner_img{
    height: 100px  !important;
   }

    </style>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="{{url('/profile')}}">
                            <img class="mlogo" src="{{url('/public/client')}}/images/icon/logo.png" alt="MT MARKET PLACE" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile msg_hidden">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="/">
                                <i class="fas fa-tachometer-alt"></i>{{ Auth::user()->name }}</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{url('/profile')}}">Dashboard</a>
                                </li>
                                <li>
                                    <a href="{{ route('job-posts.create') }}">Create Job Post</a>
                                </li>
                                
                                <li>
                                    <a href="{{ route('job-posts.index') }}">Job Post List</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{url('client/update/profile')}}">
                                <i class="fas fa-chart-bar"></i>Profile Update</a>
                        </li>
                        <li>
                            <a href="{{url('/client/deposit')}}">
                                <i class="fas fa-chart-bar"></i>Deposit</a>
                        </li>

                        <li>
                        <a href="{{url('/client/withdroad')}}"><i class="fas fa-table"></i>Withdroaw</a>
                        </li>

                        
                        <li class="has-sub">
                            <a class="js-arrow" href="{{url('/client/deposit')}}">
                                <i class="fas fa-copy"></i>Transection</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">

                               
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>Balance</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                               <li>
                                    <a href="{{url('/client/deposit')}}">Recharge Histry</a>
                                </li>
                               <li>
                                    <a href="{{url('/client/withdroad')}}">Withdroad Histry</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block msg_hidden">
            <div class="logo">
                <a class="logo" href="{{url('/profile')}}">
                <img  src="{{url('/public/client')}}/images/icon/logo.png" alt="MT MARKET PLACE" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="{{url('/profile')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{url('client/update/profile')}}">
                                <i class="fas fa-chart-bar"></i>Profile Update</a>
                        </li>
                        <li>
                            <a href="{{url('/client/deposit')}}">
                                <i class="fas fa-chart-bar"></i>Deposit</a>
                        </li>
                        <li>
                            <a href="{{url('/client/withdroad')}}">
                                <i class="fas fa-table"></i>Withdroaw</a>
                        </li>
                        <li>
                            <a href="{{url('/client/service')}}">
                                <i class="far fa-check-square"></i>Service Create</a>
                        </li>

                        <li>
                            <a href="{{url('/client/service/list')}}">
                                <i class="far fa-check-square"></i>Service List</a>
                        </li>
                        <li>
                            <a href="{{url('client/order/list')}}">
                                <i class="far fa-check-square"></i>Order</a>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                
                                <li>
                                    <a href="{{ route('job-posts.create') }}">Create Job Post</a>
                                </li>

                                <li>
                                    <a href="{{ route('job-posts.index') }}">Job Post List</a>
                                </li>  

                                <li>
                                    <a href="{{ route('products.index') }}">All Product</a>
                                </li>

                                <li>
                                    <a href="{{ route('products.create') }}">Add Product</a>
                                </li>
                                <li>
                                    <a href="{{ route('find_partner.index') }}">All Partner Post</a>
                                </li>
                                <li>
                                    <a href="{{ route('find_partner.create') }}">Add Partner Post</a>
                                </li>
                                <li>
                                    <a href="{{ route('add_click_earn.index') }}">All Add Post</a>
                                </li>
                                <li>
                                    <a href="{{ route('add_click_earn.create') }}">Create Add Post</a>
                                </li>
                                <li>
                                    <a href="{{ route('home-made-food-sell.index') }}">All Home Made Food</a>
                                </li>
                                <li>                                    
                                    <a href="{{ route('home-made-food-sell.create') }}">Add Home Made Food</a>
                                </li>
                                
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                               
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

                <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                       
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        
                                            <span id="notif_order" class="quantity">
                                            </span>
                                            
                                            @if(auth()->check())
                                                                                    
                                             @foreach($shear_order_list as $order_list)
                                             @if($order_list->frid == auth()->id())
                                              <a href="{{url('client/order/single/')}}/{{$order_list->id}}">
                                            <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>Price: {{$order_list->orderprice}}</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="content">
                                           
                                                    <p>Detalse: {{$order_list->discription}}</p>
                                                    <span class="time">{{$order_list->order_date}}</span>
                                            
                                                </div>
                                            </div>

                                            <div class="mess__footer">
                                            </div>
                                        </div>
                                    </a>
                                        @endif
                                    @endforeach
                                    @endif
                                    </div>

                                    <!-- <a href="{{url('client/order/list')}}"></a> -->

                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">3</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p></p>
                                            </div>

                                            <a href="{{url('/inbox/single')}}/10">

                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            </a>

                                            <div class="email__footer">
                                                <a href="{{url('/inbox/0')}}">All Message</a>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p> </p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>

                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="{{url('public/images')}}/{{ Auth::user()->img }}" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{ Auth::user()->name }} {{ Auth::user()->balance }} BDT</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="content">
                                                    <span class="email">{{ Auth::user()->email }}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{url('client/update/profile')}}">
                                                        <i class="zmdi zmdi-settings"></i>Change Password</a>
                                                </div>
                                            </div>

                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{url('client/update/profile')}}">
                                                        <i class="zmdi zmdi-settings"></i>Profile</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="zmdi zmdi-power"></i>{{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

                       <div class="main-content">
                
                        <div class="row">
                            <div class="col-sm-12">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                    </div>
                </div>