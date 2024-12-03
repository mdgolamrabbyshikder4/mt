@extends('/client/client')
@section('title')
Deposit-MT
@endsection
@section('client-content')

		<!-- deposit area start -->
		<div class="contante">
			<div class="row">
				<div class="col-sm-12">
					<form action="{{ url('/deposit')}}" method="POST">
            @csrf
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="number">Number</label>
      <input type="number" value="{{ old('number') }}" name="number" class="form-control" id="number" placeholder="number">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Amount</label>
      <input name="amount" value="{{ old('amount') }}" type="number" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Methode</label>
      <select name="methods" value="{{ old('methods') }}" id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option value="Bekas">Bekas</option>
        <option value="Nogod">Nogod</option>
        <option value="Roket">Roket</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="tran">Transection Id</label>
      <input name="trid" value="{{ old('trid') }}" type="text" class="form-control" id="tran">
    </div>
  </div>
  <input type="submit" class="btn btn-primary" value="Deposit">
</form>
				</div>
			</div>
		</div>
		<!-- deposit area end -->

   @endsection