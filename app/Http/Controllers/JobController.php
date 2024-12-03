<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\JobPost;
use App\Models\User;

class JobController extends Controller
{
    public function __construct()
    {
        // Apply auth middleware to all methods except 'index'
        $this->middleware('auth')->except('index');
    }
    // Show all job posts
    public function index()
    {
        $searchRoute = route('search_job_post.search_job_post');
        $jobs = JobPost::paginate(20); // Fetch all jobs
        return view('client.all-job', compact('jobs', 'searchRoute')); // Return view with jobs
    }

    // Show a single job post
    public function show($id)
    {

        $searchRoute = route('search_job_post.search_job_post');
        $jobPost = JobPost::findOrFail($id); // Find the job post by ID or fail
        return view('client.single_job_show', compact('jobPost','searchRoute')); // Return single job view
    }
}

