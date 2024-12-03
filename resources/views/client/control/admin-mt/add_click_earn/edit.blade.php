@extends('client/control/admin-mt/inc/app')
@section('title')
Edit Add Post-MT
@endsection
@section('content')
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="container">
            <h3 class="text-center">Edit Work Post</h3>
            <!-- Edit Form -->
            <form action="{{ route('add_click_earn.update', $addClickEarn->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $addClickEarn->title) }}" required>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" required>{{ old('description', $addClickEarn->description) }}</textarea>
                </div>

                <!-- Work Vacancy -->
                <div class="form-group">
                    <label>Work Vacancy</label>
                    <input type="number" name="work_vacancy" class="form-control" value="{{ old('work_vacancy', $addClickEarn->work_vacancy) }}" required>
                </div>

                <!-- Work Price -->
                <div class="form-group">
                    <label>Work Price</label>
                    <input type="number" name="work_price" class="form-control" value="{{ old('work_price', $addClickEarn->work_price) }}" required>
                </div>

                <!-- Current Image Display -->
                @if($addClickEarn->work_img)
                <div class="form-group">
                    <label>Current Image</label>
                    <img id="show_input_img" src="{{ asset('storage/app/public/' . $addClickEarn->work_img) }}" alt="Current Image" width="100">
                </div>
                @endif

                <!-- Work Image Upload -->
                <div class="form-group">
                    <label>Work Image</label>
                    <input type="file" id="input_img" name="work_img" class="form-control">
                </div>
                <!-- Work Link -->
                <div class="form-group">
                    <label>Work Link</label>
                    <input type="url" name="work_link" class="form-control" value="{{ old('work_link', $addClickEarn->work_link) }}">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success">Update Work</button>

                <!-- Back Button -->
                <a href="{{ route('add_click_earn.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
