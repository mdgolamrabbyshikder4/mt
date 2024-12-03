@extends('client/control/admin-mt/inc/app')
@section('title')
Create Job Post-MT
@endsection
@section('content')
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <h3 class="text-success text-center">Edit Job Post</h3>
                            <div class="col-sm-12">
                       
								<div class="container">
								    <h1>Edit Job Post</h1>
								    <form action="{{ route('job-posts.update', $jobPost) }}" method="POST">
								        @csrf
								        @method('PUT')
								        <div class="form-group">
								            <label>Company Name</label>
								            <input type="text" name="company_name" class="form-control" value="{{ $jobPost->company_name }}" required>
								        </div>
								        <div class="form-group">
								            <label>Job Title</label>
								            <input type="text" name="job_title" class="form-control" value="{{ $jobPost->job_title }}" required>
								        </div>
								        <div class="form-group">
								            <label>Description</label>
								            <textarea name="description" class="form-control" required>{{ $jobPost->description }}</textarea>
								        </div>
								        <div class="form-group">
								            <label>Designation</label>
								            <input type="text" name="designation" class="form-control" value="{{ $jobPost->designation }}" required>
								        </div>
								        <div class="form-group">
								            <label>Salary</label>
								            <input type="number" name="salary" class="form-control" value="{{ $jobPost->salary }}" required>
								        </div>
								        <div class="form-group">
								            <label>Last Date to Apply</label>
								            <input type="date" name="last_date_apply" class="form-control" value="{{ $jobPost->last_date_apply }}" required>
								        </div>
								        <div class="form-group">
								            <label>Publish Date</label>
								            <input type="date" name="publish_date" class="form-control"required>
								        </div>
								        <button type="submit" class="btn btn-success">Create</button>
								    </form>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->

    </div>

@endsection