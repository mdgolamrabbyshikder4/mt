
@extends('/admin-mt/app')
@section('title')
Catagory
@endsection
@section('admin-content')


            <!-- MAIN CONTENT-->
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <!-- form area start -->
                              <div class="row">
                                    <div class="col-sm-12">
                                        <h3 class="text-success text-center">Catagory Form</h3>
                                      <form action="{{ url('/admin-mt-134/catagory/update')}}/{{$catagory->id}}" method="POST">
                                        @csrf
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="number">Catagory Name</label>
                                  <input type="text" value="{{ $catagory->name }}" name="name" class="form-control" id="number" placeholder="Catagory Name">
                                </div>
                              </div>
                              <div class="form-row">
                                    <div class="form-group col-md-12">
                                      <label for="inputState">Type</label>
                                      <select name="type" id="inputState" class="form-control">
                                        <option 
                                        @if($catagory->type==1) 
                                        selected 
                                        @endif
                                        value="1" >
                                        Working
                                        </option>
                                        <option @if($catagory->type==2)
                                        selected 
                                        @endif 
                                        value="2">
                                        Sell
                                        </option>
                                        <option @if($catagory->type==3)
                                        selected 
                                        @endif 
                                        value="3">
                                        Job
                                        </option>
                                        <option @if($catagory->type==4)
                                        selected 
                                        @endif 
                                        value="4">
                                        Marage
                                        </option>
                                        <option @if($catagory->type==5)
                                        selected 
                                        @endif 
                                        value="5">
                                        GFBF
                                        </option>
                                      </select>
                                    </div>

                              </div>
                              <input type="submit" class="btn btn-primary" value="Submit">
                            </form>
                            </div>
                            </div>
                    <!-- form area end -->
 
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->

    </div>

   @endsection