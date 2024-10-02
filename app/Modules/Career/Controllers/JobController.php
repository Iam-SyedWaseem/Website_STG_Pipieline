<?php

namespace app\Modules\Career\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Career\Models\JobPost;
use App\Modules\Department\Models\Department;
use Illuminate\Support\Str;

class JobController extends Controller
{

    public function __construct(){
        view()->share('job_menuactive','active');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = JobPost::with(['department']);//->query();

        // Apply search filter
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function($query) use ($search) {
                $query->where('title', 'like', "%{$search}%");

            });
        }

        $data = $query->paginate(10);
      // $data =  JobPost::with(['department'])->paginate(3);

       return view('careers::backend.job_posts.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view('careers::backend.job_posts.create',compact('departments'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required',
            'location' => 'required',
            'job_type' => 'required',
            'department'=>'required',
            'skills'=>'required|max:250',
          //  'posted_date'=>'required',
            'expiry_date'=>'required',

        ]);

        JobPost::create([
            'title' => $request->title,
            'description' => $request->description,
            'dept_id'=>$request->department,
            'job_type' => $request->job_type,
            'location' => $request->location,
            'skills' => $request->skills,
            'posted_date' => date('Y-m-d H:i:s'),
            'expiry_date' => $request->expiry_date,

        ]);
        return redirect()->route('jobposts.index')
                         ->with('success', 'Job post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $departments = Department::all();

        $jobPost = JobPost::find($id);
        return view('careers::backend.job_posts.edit',compact('jobPost','departments'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'department'=>'required',
            'skills'=>'required',
           // 'posted_date'=>'required',
            'expiry_date'=>'required',

        ]);

        JobPost::where('id',$id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'dept_id'=>$request->department,
            'job_type' => $request->job_type,
            'location' => $request->location,
            'skills' => $request->skills,
            //'posted_date' => $request->posted_date,
            'expiry_date' => $request->expiry_date,
            'is_active'=>$request->status
        ]);
        return redirect()->route('jobposts.index')
                         ->with('success', 'Job post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        JobPost::where('id',$id)->delete();
        return redirect()->route('jobposts.index')
                         ->with('success', 'Job post deleted successfully.');
    }
}
