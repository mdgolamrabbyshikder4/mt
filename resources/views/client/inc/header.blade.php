<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="Home" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<!-- Favicon link -->
    <link rel="icon" href="/path/to/your/favicon.ico" type="image/x-icon">
    
    <!-- Optionally, you can specify different sizes of favicons for different devices -->
    <link rel="icon" sizes="16x16" href="{{url('/public/client')}}/images/icon/logo.png">
    <link rel="icon" sizes="32x32" href="{{url('/public/client')}}/images/icon/logo.png">
    <link rel="icon" sizes="96x96" href="{{url('/public/client')}}/images/icon/logo.png">
	<!-- Bootstrap CSS Link -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	<!-- External CSS -->
	<link rel="stylesheet" href="{{url('public/client')}}/style.css">
	
	<!-- Custom Styles -->
	<style>
		.page-item {
	  		background: #0d0c0c !important;
		}
		.page-link {
	  		color: #0b0b0b !important;
		}
		.page-item.active span {
	  		color: #fff !important;
		}
		.card-body img {
	  		margin-left: auto !important;
	  		margin-right: auto !important;
	  		display: block;
		}
		.logo img {
			height: 50px;
		}
		    #product-image img{
            height: 100 px !important;
        }

	</style>
</head>
<body>

	<!-- Navbar area start -->
	<nav class="navbar navbar-expand-lg navbar-info bg-info">
  		<!-- Navbar Toggler for Mobile -->
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon">
				<img height="100%" width="100%" src="{{url('public/client')}}/asset/img/togleicon.png" alt="Menu Icon">
			</span>
    		<i class="fa fa-bars" aria-hidden="true"></i>
  		</button>

  		<!-- Navbar Content -->
		<div class="collapse navbar-collapse" id="navbarToggler">
			<!-- Logo -->
	  		<div class="logo">
				<a class="navbar-brand" href="{{url('/')}}">
					<img src="{{url('/public/client')}}/images/icon/logo.png" alt="MT MARKET PLACE">
				</a>
	  		</div>

			<!-- Navbar Links -->
		    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		      <li class="nav-item active">
		        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
		      </li>
		     <li class="nav-item dropdown">
			    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			        More
			    </a>
			    <div class="dropdown-menu bg-info" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="{{url('/about')}}">About Us</a>
		        <a class="dropdown-item" href="{{url('/jobs')}}">All Job</a>
		        <a class="dropdown-item" href="{{url('/buy-sell')}}">Buy & Sales</a>
		        <a class="dropdown-item" href="{{url('/partners')}}">Find Partner</a>
		        <a class="dropdown-item" href="{{url('/home-made-food')}}">Home Made Food</a>
		        <a class="dropdown-item" href="{{url('/click-earns')}}">Earning Now</a>
		        <a class="dropdown-item" href="{{ route('our_services_client_view.index') }}">Our Services</a>
		        <a class="dropdown-item" href="{{url('/contact')}}">Contact Us</a>
			    </div>
			</li>

		      <!-- Authentication Links -->
              @guest
                  @if (Route::has('login'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                      </li>
                  @endif

                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
              @else
			      <!-- Authenticated User Links -->
				  <li class="nav-item">
			        <a class="nav-link" href="{{url('/withdroad')}}">Withdroad</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="{{url('/deposit')}}">Deposit</a>
			      </li>

			      <!-- Message Dropdown -->
			      <div class="dropdown">
					  <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						  <i class="zmdi zmdi-email"></i>
						  <span class="text-danger">3</span>
						  <img height="30px" src="{{url('public/client/images/icon/message.png')}}" alt="Message Icon">
					  </button>
					  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						  <div class="card">
							  <div class="card-body">
								  <a href="{{url('/inbox/single')}}/10">
									  <div class="email__item">
										  <div class="image img-cir img-40">
											  <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
										  </div>
										  <div class="content text-dark">
											  <p>Meeting about</p>
										  </div>
									  </div>
								  </a>
							  </div>

							  <div class="card-footer">
								  <a class="btn btn-primary" href="{{url('/inbox/0')}}">All Messages</a>
							  </div>
						  </div>
					  </div>
				  </div>

				  <!-- User Dropdown -->
				  <li class="nav-item dropdown">
					  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						  {{ Auth::user()->name }} - {{ Auth::user()->balance }} BDT
					  </a>
					  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							  {{ __('Logout') }}
						  </a>
						  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							  @csrf
						  </form>
					  </div>
				  </li>
              @endguest
		    </ul>

		    <!-- Search Form -->
		    <form action="{{ $searchRoute}}" class="form-inline my-2 my-lg-0" method="post">
		    	@csrf
		      <input class="form-control mr-sm-2" name="search_data" type="search" placeholder="Search" aria-label="Search">
		      <button class="btn btn-secondary btn-outline-success text-white my-2 my-sm-0" type="submit">Search</button>
		    </form>
		</div>
	</nav>
	<!-- Navbar area end -->

	<!-- Message Area -->
	<div class="row">
	    <div class="col-sm-12">
	        @if(session('success'))
	            <div class="alert alert-success alert-dismissible fade show" role="alert">
	                {{ session('success') }}
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	        @endif

	        @if(session('error'))
	            <div class="alert alert-danger alert-dismissible fade show" role="alert">
	                {{ session('error') }}
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	        @endif
	    </div>
	</div>

	
