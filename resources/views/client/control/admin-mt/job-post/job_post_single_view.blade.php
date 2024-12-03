@extends('client/control/admin-mt/inc/app')
@section('title')
Create Job Post-MT
@endsection
@section('content')
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <h3 class="text-success text-center">My Job Post</h3>
                            <div class="col-sm-12">
                       
								<div class="container">
							    <h1>{{ $jobPost->job_title }}</h1>
							    <h3>Company: {{ $jobPost->company_name }}</h3>
							    <p><strong>Description:</strong> {{ $jobPost->description }}</p>
							    <p><strong>Designation:</strong> {{ $jobPost->designation }}</p>
							    <p><strong>Salary:</strong> ${{ number_format($jobPost->salary, 2) }}</p>
							    <p><strong>Last Date to Apply:</strong> {{ \Carbon\Carbon::parse($jobPost->last_date_apply)->format('d-m-Y') }}</p>
							    <p><strong>Publish Date:</strong> {{ \Carbon\Carbon::parse($jobPost->publish_date)->format('d-m-Y') }}</p>
							    <p><strong>Posted By:</strong> {{ $jobPost->user->name }}</p>

							    <a href="{{ route('job-posts.index') }}" class="btn btn-primary">Back to Job Posts</a>
							    <a href="{{ route('job-posts.edit', $jobPost) }}" class="btn btn-warning">Edit</a>

							    <form action="{{ route('job-posts.destroy', $jobPost) }}" method="POST" style="display:inline;">
							        @csrf
							        @method('DELETE')
							        <button type="submit" class="btn btn-danger">Delete</button>
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