@extends('/client/client')
@section('title')
Add Click Earn-MT
@endsection
@section('client-content')
<style>
    #food-image img {
    height: 200px;
}
</style>
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

    <!-- content area start -->
	<div class="container my-5">
    <h3 class="text-center mb-4 text-success">All Click Earn Jobs</h3>
    <div class="row">
        @foreach ($clickEarns as $clickEarn)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    @if ($clickEarn->work_img)
                        <img src="{{ asset('storage/app/public/' . $clickEarn->work_img) }}" class="card-img-top" alt="{{ $clickEarn->title }}">
                    @else
                        <img src="{{ url('public/images/default.jpg') }}" class="card-img-top" alt="{{ $clickEarn->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $clickEarn->title }}</h5>
                        <p class="card-text">{{ Str::limit($clickEarn->description, 100) }}</p>
                        <p><strong>Vacancies:</strong> {{ $clickEarn->work_vacancy }}</p>
                        <p><strong>Price per Click:</strong>BDT: {{ $clickEarn->work_price }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('click_earn.show', $clickEarn->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $clickEarns->links('pagination::bootstrap-4') }}
    </div>
</div>
    <!-- content area end -->
@endsection
