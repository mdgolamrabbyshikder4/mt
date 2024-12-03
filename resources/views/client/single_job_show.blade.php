@extends('/client/client')
@section('title')
{{ $jobPost->job_title }} - MT
@endsection
@section('client-content')
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                                          
                                <div class="col-sm-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <p>Wonner Name:{{$jobPost->user->name}}</p>
                                        </div>
                                        <div class="card-body">
                                            <img width="30%" height="80px" src="{{url('public/images')}}/{{$jobPost->user->img}}" class="rounded-circle justify-content-center" alt="img">
                                            <p>{{$wonne_info->discription}}</p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{url('inbox')}}/{{$jobPost->user->id}}" class="btn btn-primary">Contact Me</a>
                                        </div>
                                    </div>
                                </div>                  
                                <div class="col-sm-9">          
                                <div class="title">
                                    <h5>Company: {{ $jobPost->company_name }}</h5>
                                    <h5>Job Title: {{ $jobPost->job_title }}</h5>
                                    <h6>Designation: {{ $jobPost->designation }}</h6>
                                    <h6>Salary: {{ $jobPost->salary }}</h6>
                                    <p><strong>Job Description:</strong> {{ $jobPost->description }}</p>
                                    <p><strong>Last Date to Apply:</strong> {{ $jobPost->last_date_apply }}</p>
                                    <p><strong>Publish Date:</strong> {{ $jobPost->publish_date }}</p>
                                </div>

                                <div class="apply-button">
                                    <a href="{{ url('client/apply/job/'.$jobPost->id) }}" class="btn btn-primary">Apply Now</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->

    </div>

@endsection