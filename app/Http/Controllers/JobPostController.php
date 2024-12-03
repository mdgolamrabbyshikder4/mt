<?php
namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class JobPostController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $jobPosts = JobPost::all();
        return view('client.control.admin-mt.job_post_list', compact('jobPosts'));
    }

    public function create()
    {
        return view('client.control.admin-mt.create_job_post');
    }

public function store(Request $request)
{
    $request->validate([
        'company_name' => 'required|string|max:255',
        'job_title' => 'required|string|max:255',
        'description' => 'required|string',
        'designation' => 'required|string|max:255',
        'salary' => 'required|numeric',
        'last_date_apply' => 'required|date',
        'publish_date' => 'required|date',
    ]);

    // Store the user_id
    JobPost::create(array_merge($request->all(), ['user_id' => auth()->id()]));
    return redirect()->route('job-posts.index')->with('success', 'Job Post created successfully.');
}

    public function show(JobPost $jobPost)
    {
        return view('client.control.admin-mt.job_post_single_view', compact('jobPost'));
    }

    public function edit(JobPost $jobPost)
    {
        return view('client.control.admin-mt.job_post_edit', compact('jobPost'));
    }

    public function update(Request $request, JobPost $jobPost)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'description' => 'required|string',
            'designation' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'last_date_apply' => 'required|date',
            'publish_date' => 'required|date',
        ]);

        $jobPost->update($request->all());
        return redirect()->route('job-posts.index')->with('success', 'Job Post updated successfully.');
    }

    public function destroy(JobPost $jobPost)
    {
        $jobPost->delete();
        return redirect()->route('job-posts.index')->with('success', 'Job Post deleted successfully.');
    }
}
