@extends('client/control/admin-mt/inc/app')
@section('title')
Second Package Order-MT
@endsection
@section('content')




                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="{{ url('client/order/first/')}}/{{$id}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                              <label for="order_discripton">Order Discription</label>
                                              <textarea name="order_discripton" class="form-control" id="order_discripton" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                              <label for="order_date">Order Time</label>
                                              <input type="date" class="form-control" name="order_date" id="order_date" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                              <label for="order_img">Image</label>
                                              <input type="file" class="form-control" name="order_img" id="order_img" required>
                                            </div>
                                        </div>

                                      <input type="submit" class="btn btn-primary" value="Place Order">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->

    </div>

@endsection