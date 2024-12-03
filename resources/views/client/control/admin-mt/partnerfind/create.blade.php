@extends('client/control/admin-mt/inc/app')
@section('title')
Add Partner Post-MT
@endsection
@section('content')
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <h3 class="text-success text-center">Add New Partner</h3>

        <form action="{{ route('find_partner.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label>Father's Name</label>
                <input type="text" name="fathers_name" class="form-control" value="{{ old('fathers_name') }}" required>
            </div>
            <div class="form-group">
                <label>Mother's Name</label>
                <input type="text" name="mothers_name" class="form-control" value="{{ old('mothers_name') }}" required>
            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="number" name="age" class="form-control" value="{{ old('age') }}" required>
            </div>
            <div class="form-group">
                <label>Profession</label>
                <input type="text" name="profession" class="form-control" value="{{ old('profession') }}" required>
            </div>
            <!-- Marital Status Select Field -->
            <div class="form-group">
                <label>Marital Status</label>
                <select name="marital_status" class="form-control" required>
                    <option value="">-- Select Marital Status --</option>
                    <option value="Married" {{ old('marital_status') == 'Married' ? 'selected' : '' }}>Married</option>
                    <option value="Unmarried" {{ old('marital_status') == 'Unmarried' ? 'selected' : '' }}>Unmarried</option>
                    <option value="Divorced" {{ old('marital_status') == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                </select>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea id="description" name="description" class="form-control" required>{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label>Contact Number</label>
                <input type="text" name="contact_number" class="form-control" value="{{ old('contact_number') }}" required>
            </div>

            <div class="form-group">
                <img src="" id="show_input_img" height="50px;"  style="display:none;" alt="">
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" id="input_img" name="image" class="form-control">
            </div>

            <div class="form-group">
                <label>Bio Data (PDF or Image)</label>
                <input type="file" name="bio_data" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Save Partner</button>
        </form>
    </div>
</div>
@endsection
