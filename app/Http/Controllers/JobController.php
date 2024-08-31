<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $jobs = Job::with('employer')->latest()->paginate(9);
        $deletedJobs = Job::onlyTrashed()->get();
        return view(
            'jobs.index',
            compact('jobs', 'deletedJobs')
        );
    }

    public function create()
    {
        return view('jobs.create');
    }

    // Retrieve One job
    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    // Storing
    public function store(Request $request)
    {
        // $req = request()->all();
        // dd($req);
        // Validations::validate
        // dd('Here');

        $validateData = $request->validate([
            'job' => 'required|min:4',
            'salary' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $validateData['employer_id'] = Auth::id();


        if ($request->hasFile('image')) {
            $imageName = time() . '.' .  $request->image->extension();
            $request->image->storeAs('public/images', $imageName);
            $validateData['image'] = 'images/' . $imageName;
        }
        // dd($validateData);
        // $validateData['employer_id'] = Auth::login();
        Job::create($validateData);

        return redirect('/jobs')->with('success', 'Item created successfully.');
    }

    // Destroy
    public function destroy(Job $job)
    {
        if ($job->employer_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $job->delete();

        if ($job->image) {
            Storage::delete('public/' . $job->image);
        }

        return redirect('/jobs');
    }

    // Update
    public function update(Job $job, Request $request)
    {

        if ($job->employer_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }


        // Validate the request
        $validateData = $request->validate([
            'job' => 'required|string|min:3',
            'salary' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Check if an image file is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($job->image) {
                Storage::delete('public/' . $job->image);
            }
            // Store the new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $imageName);
            $validateData['image'] = 'images/' . $imageName;
        }

        // Update the job with validated data
        $job->update($validateData);

        return redirect('/jobs')->with('success', 'Job updated successfully.');
    }

    // Edit page contant
    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }
}
