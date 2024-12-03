
@extends('/admin-mt/app')
@section('title')
Catagory
@endsection
@section('admin-content')


            <!-- MAIN CONTENT-->
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                              <div class="row">
                                    <div class="col-sm-12">
                                        <h3 class="text-success text-center">Catagory Form</h3>
                                      <form action="{{ url('/admin-mt-134/catagory')}}" method="POST">
                                        @csrf
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="number">Catagory Name</label>
                                  <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="number" placeholder="Catagory Name">
                                </div>
                              </div>
                              <div class="form-row">
                                    <div class="form-group col-md-12">
                                      <label for="inputState">Type</label>
                                      <select name="type" value="{{ old('type') }}" id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        <option value="1">Working</option>
                                        <option value="2">Sell</option>
                                        <option value="3">Job</option>
                                        <option value="4">Marage</option>
                                        <option value="5">GFBF</option>
                                      </select>
                                    </div>

                              </div>
                              <input type="submit" class="btn btn-primary" value="Submit">
                            </form>
                                    </div>
                            </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <table id="myTable" class="display">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($catagory as $catagory)        
                                        <tr>
                                            <td>{{ $catagory->id }}</td>
                                            <td>{{ $catagory->name }}</td>
                                            <td>{{ $catagory->type }}</td>
                                            <td>
                                                <a href="{{ url('/admin-mt-134/catagory/delete')}}/{{ $catagory->id }}" class="btn btn-danger">Delete</a>
                                                <a href="{{ url('/admin-mt-134/catagory/edit')}}/{{ $catagory->id }}" class="btn btn-success">Edit</a>
                                            </td>
                                        </tr>
                                           @endforeach                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->

    </div>

   @endsection