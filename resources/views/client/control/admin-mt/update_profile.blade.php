@extends('client/control/admin-mt/inc/app')
@section('title')
Profile Update-MT
@endsection
@section('content')



                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <h3 class="text-success text-center">Update Profile</h3>
                            <div class="col-sm-12">
                                <form action="{{ url('client/update/profile')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                      <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="name">Name</label>
                                          <input type="text" value="{{ Auth::user()->name }}" name="name" class="form-control" id="name" placeholder="name">
                                        </div>
                                        <div class="form-group col-md-12">
                                          <label for="email">E-mail</label>
                                          <input type="text" value="{{ Auth::user()->email }}" name="email" class="form-control" id="email" placeholder="email" disabled>
                                        </div>
                                        <div class="form-group col-md-12">
                                          <label for="location">Location</label>
                                          <input type="text" value="{{ Auth::user()->location }}" name="location" class="form-control" id="location" placeholder="location">
                                        </div>
                                        <div class="form-group col-md-12">
                                          <label for="number">Mobile Number</label>
                                          <input type="number" value="{{ Auth::user()->mobile }}" name="number" class="form-control" id="number" placeholder="number">
                                        </div>
                                        <div class="form-group col-md-12">
                                          <label for="nid">Nid Number</label>
                                          <input type="number" value="{{ Auth::user()->nid }}" name="nid" class="form-control" id="nid" placeholder="nid">
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="discription">Discription About You</label>
                                         <textarea name="discription" id="discription" class="form-control">{{ Auth::user()->discription }}</textarea>
                                        </div>
                                      </div>
                                        <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="upload">Profile Picture</label><br>
                                          <img id="profile-img" height="200px" width="100px" src="{{url('/public/images')}}/{{Auth::user()->img}}" alt="{{Auth::user()->name}}">
                                          <input type="file" name="img" class="form-control" id="upload" >
                                        </div>
                                        </div>

                                        <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="nid_img">Nid</label>
                                          <br>
                                          <img id="nid-image" height="200px" width="100px" src="{{url('/public/images')}}/{{Auth::user()->nid_img}}" alt="NID">
                                          <input type="file" name="nid_img" class="form-control" id="nid_img" >
                                        </div>
                                        </div>
                                      <input type="submit" class="btn btn-primary" value="Update">
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