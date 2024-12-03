@extends('client/control/admin-mt/inc/app')
@section('title')
Create Add Post-MT
@endsection
@section('content')
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <form action="{{ route('add_click_earn.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="work_vacancy">Work Vacancy</label>
                <input type="number" name="work_vacancy" class="form-control" value="{{ old('work_vacancy') }}" required>
            </div>

            <div class="form-group">
                <label for="work_price">Work Price</label>
                <input type="number" step="0.01" name="work_price" class="form-control" value="{{ old('work_price') }}" required>
            </div>

            <div class="form-group">
                <label for="work_img">Work Image</label>
                <input type="file" name="work_img" class="form-control">
            </div>

            <div class="form-group">
                <label for="work_link">Work Link</label>
                <input type="url" name="work_link" class="form-control" value="{{ old('work_link') }}" required>
            </div>

            <button type="submit" class="btn btn-success">Save Work</button>
        </form>
    </div>
</div>
@endsection
