
@extends('/admin-mt/app')
@section('title')
Withdroad Update Form-MT
@endsection
@section('admin-content')

 <!-- Withdroad area start -->
    <div class="contante">
      <div class="row">
        <div class="col-sm-12">
        	<h3 class="text-success text-center">Withdroad Update Form</h3>
          <form action="{{ url('/admin-mt-134/withdroad/approval/')}}/{{$withdroad->id}}" method="POST">
            @csrf
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="number">Number</label>
      <input type="number" value="{{ old('number') }}" name="number" class="form-control" id="number" placeholder="number">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputCity">Trid</label>
      <input name="trid" value="{{ old('trid') }}" type="text" class="form-control" id="inputCity">
    </div>
  </div>
  <input type="submit" class="btn btn-primary" value="Submit">
</form>
        </div>
      </div>
    </div>
    <!-- Withdroad area end -->

   @endsection