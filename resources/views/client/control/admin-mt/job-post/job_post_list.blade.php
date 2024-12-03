@extends('client/control/admin-mt/inc/app')
@section('title')
Create Job Post-MT
@endsection
@section('content')
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <h3 class="text-success text-center">Job Post List</h3>
                            <div class="col-sm-12">
                                <div class="container">
                                    <a href="{{ route('job-posts.create') }}" class="btn btn-primary">Create Job Post</a>
                                    
                                    <table id="jobPostsTable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>Company Name</th>
                                                <th>Job Title</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jobPosts as $jobPost)
                                            <tr>
                                                <td>{{ $jobPost->user->name }}</td> <!-- Display user's name -->
                                                <td>{{ $jobPost->company_name }}</td>
                                                <td>{{ $jobPost->job_title }}</td>
                                                <td>
                                                    <a href="{{ route('job-posts.show', $jobPost) }}" class="btn btn-info">View</a>
                                                    <a href="{{ route('job-posts.edit', $jobPost) }}" class="btn btn-warning">Edit</a>
                                                    <form action="{{ route('job-posts.destroy', $jobPost) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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