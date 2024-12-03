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
    <title>
        @section('title')
        @show
    </title>
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
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="{{url('/admin-mt-134')}}">
                                <i class="fas fa-tachometer-alt"></i>Name</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{url('/profile')}}">Dashboard</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('/admin-mt-134/user') }}">
                                <i class="fas fa-chart-bar"></i>User List</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin-mt-134/deposit') }}">
                                <i class="fas fa-chart-bar"></i>Deposit</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin-mt-134/withdroad') }}">
                                <i class="fas fa-chart-bar"></i>Withdroad</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin-mt-134/order/list') }}">
                                <i class="fas fa-chart-bar"></i>Order List</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin-mt-134/catagory') }}">
                                <i class="fas fa-chart-bar"></i>Catagory</a>
                        </li>
                        <li>
                            <a href="{{ route('our_services.index') }}">
                                <i class="fas fa-chart-bar"></i>Our All Services</a>
                        </li>                        
                        <li>
                            <a href="{{ route('our_services.create') }}">
                                <i class="fas fa-chart-bar"></i>Our Services Create</a>
                        </li>

                        
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>Balance</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                               <li>
                                    <a href="forget-pass.html">Recharge Histry</a>
                                </li>
                               <li>
                                    <a href="forget-pass.html">Withdroad Histry</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="{{url('/admin-mt-134')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ url('/admin-mt-134') }}">Dashboard</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('/admin-mt-134/user') }}">
                                <i class="fas fa-chart-bar"></i>User List</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin-mt-134/deposit') }}">
                                <i class="fas fa-chart-bar"></i>Deposit</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin-mt-134/withdroad') }}">
                                <i class="fas fa-chart-bar"></i>Withdroad</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin-mt-134/order/list') }}">
                                <i class="fas fa-chart-bar"></i>Order List</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin-mt-134/catagory') }}">
                                <i class="fas fa-chart-bar"></i>Catagory</a>
                        </li>
                        <li>
                            <a href="{{ route('our_services.index') }}">
                                <i class="fas fa-chart-bar"></i>Our All Services</a>
                        </li>                        
                        <li>
                            <a href="{{ route('our_services.create') }}">
                                <i class="fas fa-chart-bar"></i>Our Services Create</a>
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
                <!--  <div class="notification">
                    <div class="alert alert-success">
                        ok ok ok
                    </div>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                </div>   -->
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
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>

                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
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
                                            <a class="js-acc-btn" href="#">{{ auth()->user()->name }}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{ auth()->user()->name }}</a>
                                                    </h5>
                                                    <span class="email">{{ auth()->user()->email }}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                    <i class="zmdi zmdi-power"></i>
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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
            <!-- MAIN CONTENT-->
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
            

           