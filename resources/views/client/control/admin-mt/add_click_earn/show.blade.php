@extends('client/control/admin-mt/inc/app')
@section('title')
{{ $addClickEarn->title }}-MT
@endsection
@section('content')
<div class="section__content section__content--p30">
    <div class="container-fluid">
       <div class="container">
            <h3 class="text-center">Work Post Details</h3>

            <div class="card">
                <div class="card-header">
                    <h4>{{ $addClickEarn->title }}</h4>
                </div>

                <div class="card-body">
                    <!-- Title -->
                    <div class="form-group">
                        <strong>Title:</strong>
                        <p>{{ $addClickEarn->title }}</p>
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <strong>Description:</strong>
                        <p>{{ $addClickEarn->description }}</p>
                    </div>

                    <!-- Work Vacancy -->
                    <div class="form-group">
                        <strong>Work Vacancy:</strong>
                        <p>{{ $addClickEarn->work_vacancy }}</p>
                    </div>

                    <!-- Work Price -->
                    <div class="form-group">
                        <strong>Work Price:</strong>
                        <p>${{ number_format($addClickEarn->work_price, 2) }}</p>
                    </div>

                    <!-- Work Image -->
                    <div class="form-group">
                        <strong>Work Image:</strong>
                        @if($addClickEarn->work_img)
                            <img src="{{ asset('storage/app/public/' . $addClickEarn->work_img) }}" alt="Work Image" width="100">
                        @else
                            <p>No Image Available</p>
                        @endif
                    </div>

                    <!-- Work Approval -->
                    <div class="form-group">
                        <strong>Work Approval:</strong>
                        <p>{{ $addClickEarn->work_approval ? 'Approved' : 'Not Approved' }}</p>
                    </div>

                    <!-- Work Suspended -->
                    <div class="form-group">
                        <strong>Work Suspended:</strong>
                        <p>{{ $addClickEarn->work_suspand ? 'Suspended' : 'Active' }}</p>
                    </div>

                    <!-- Work Link -->
                    <div class="form-group">
                        <strong>Work Link:</strong>
                        @if($addClickEarn->work_link)
                            <a href="{{ $addClickEarn->work_link }}" target="_blank">{{ $addClickEarn->work_link }}</a>
                        @else
                            <p>No Link Provided</p>
                        @endif
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('add_click_earn.edit', $addClickEarn->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('add_click_earn.destroy', $addClickEarn->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this work post?')">Delete</button>
                    </form>
                    <a href="{{ route('add_click_earn.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
