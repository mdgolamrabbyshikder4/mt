
@extends('/admin-mt/app')
@section('title')
{{ $our_service->title }}-MT
@endsection
@section('admin-content')
            <!-- MAIN CONTENT-->
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                              <h3>Service Details</h3>
                                <div class="card mt-4">
                                    <div class="card-header">
                                        <h4>{{ $our_service->title }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <!-- Image -->
                                        @if ($our_service->image)
                                            <div class="mb-3 text-center">
                                                <img src="{{ asset('storage/app/public/' . $our_service->image) }}" alt="{{ $our_service->title }}" style="max-width: 200px;" class="img-thumbnail">
                                            </div>
                                        @endif

                                        <!-- Title -->
                                        <div class="mb-3">
                                            <strong>Title:</strong>
                                            <p>{{ $our_service->title }}</p>
                                        </div>

                                        <!-- Description -->
                                        <div class="mb-3">
                                            <strong>Description:</strong>
                                            <p>{{ $our_service->description }}</p>
                                        </div>

                                        <!-- Price -->
                                        <div class="mb-3">
                                            <strong>Price:</strong>
                                            <p>${{ $our_service->price }}</p>
                                        </div>

                                        <!-- Processing Time -->
                                        <div class="mb-3">
                                            <strong>Processing Time:</strong>
                                            <p>{{ $our_service->processing_time }} days</p>
                                        </div>

                                        <!-- Coupon Code -->
                                        @if ($our_service->cupon_code)
                                            <div class="mb-3">
                                                <strong>Coupon Code:</strong>
                                                <p>{{ $our_service->cupon_code }}</p>
                                            </div>
                                        @endif

                                        <!-- Coupon Discount -->
                                        @if ($our_service->cupon_discount > 0)
                                            <div class="mb-3">
                                                <strong>Coupon Discount:</strong>
                                                <p>{{ $our_service->cupon_discount }}%</p>
                                            </div>
                                        @endif

                                        <!-- Demo Link -->
                                        @if ($our_service->demo_link)
                                            <div class="mb-3">
                                                <strong>Demo Link:</strong>
                                                <p><a class="btn btn-secondary" href="{{ $our_service->demo_link }}" target="_blank">Go TO</a></p>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Back Button -->
                                    <div class="card-footer text-right">
                                        <a href="{{ route('our_services.index') }}" class="btn btn-secondary">Back to List</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->

    </div>

   @endsection