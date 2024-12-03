
@extends('/admin-mt/app')
@section('title')
Withdroad Edit Form-MT
@endsection
@section('admin-content')

 <!-- Withdroad area start -->
    <div class="contante">
      <div class="row">
        <div class="col-sm-12">
        	<h3 class="text-success text-center">Withdroad Edit Form</h3>
          <form action="{{ url('/admin-mt-134/withdroad/edit/')}}/{{$withdroad->id}}" method="POST">
            @csrf
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="number">Admin Number</label>
      <input type="number" value="{{$withdroad->sendernumber}}" name="sendernumber" class="form-control" id="number" placeholder="number">
    </div>
    <div class="form-group col-md-12">
      <label for="number">Client Number</label>
      <input type="number" value="{{$withdroad->number}}" name="number" class="form-control" id="number" placeholder="number">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputCity">Trid</label>
      <input name="trid" value="{{$withdroad->trid}}" type="text" class="form-control" id="inputCity">
    </div>
  </div>
    <div class="form-group col-md-12">
      <label for="inputState">Methode</label>
      <select name="methods" value="{{ old('methods') }}" id="inputState" class="form-control">
        <option value="{{$withdroad->methods}}">{{$withdroad->methods}}</option>
        <option value="Bekas">Bekas</option>
        <option value="Nogod">Nogod</option>
        <option value="Roket">Roket</option>
      </select>
    </div>
  <input type="submit" class="btn btn-primary" value="Submit">
</form>
        </div>
      </div>
    </div>
    <!-- Withdroad area end -->

   @endsection