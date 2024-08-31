<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->paginate(9);
        return view('jobs.index', ['jobs' => $jobs]);
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

        $validateData = $request->validate([
            'job' => 'required|min:4',
            'salary' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $validateData['employer_id'] = 3;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' .  $request->image->extension();
            $request->image->storeAs('public/images', $imageName);
            $validateData['image'] = 'images/' . $imageName;
        }
        // dd($validateData);
        Job::create($validateData);
        return redirect('/jobs')->with('success', 'Item created successfully.');
    }

    // Destroy
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/jobs');
    }

    // Update
    public function update(Job $job)
    {

        $data = [
            'job' => request('job'),
            'salary' => request('salary')
        ];

        $job->update($data);
        return redirect('/jobs');
    }

    // Edit page contant
    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }
}
