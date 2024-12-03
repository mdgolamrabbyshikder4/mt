@extends('/client/client')
@section('title')
Home-MT
@endsection
@section('client-content')
		<!-- slider area start -->
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img height="100%" class="d-block w-100" src="{{url('public/client')}}/asset/img/s1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img height="100%" class="d-block w-100" src="{{url('public/client')}}/asset/img/s2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img height="100%" class="d-block w-100" src="{{url('public/client')}}/asset/img/s3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
		<!-- slider area end -->

		<!-- marque area start -->
			<div class="row">
	<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <strong><i class="fa fa-warning"></i> Danger!</strong> <marquee><p style="font-family: width:100%; Impact; font-size: 18pt">Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor!</p></marquee>
</div>
	</div>
		<!-- marque area end -->
		<!-- contante area start -->
		<div class="contante">
			<div class="row">
				<!-- gig area start -->
				@foreach ($all_Service as $all_Servicee)
				<div class="col-sm-3">
					<a href="{{url('/client/single/service/view/')}}/{{$all_Servicee->id}}">
					<div class="banner">
						<img width="300px" height="200px" src="{{url('public/images')}}/{{$all_Servicee->img}}">
					</div>
					<div class="title">
						<h5>{{$all_Servicee->title}}</h5>
					</div>
				</a>
				</div>
				<!-- gig area end --> 
				@endforeach 

        <div class="d-felx justify-content-center">

           {{ $all_Service->links('pagination::bootstrap-4') }}

        </div>
				</div>
			</div>
		</div>
		<!-- contante area end -->
   @endsection
