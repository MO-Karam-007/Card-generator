<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $jobs = Job::where('job', 'LIKE', '%' . $query . '%')->orWhere('salary', 'like', "%{$query}%")->with('employer')->latest()->paginate(9);
        // dd($jobs);
        return view('jobs.index', ['jobs' => $jobs]);
    }
    public function restore($id)
    {

        $job = Job::onlyTrashed()->findOrFail($id);

        if ($job->employer_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }


        if ($job) {
            $job->restore();
            return redirect('/jobs')->with('success', 'Job restored successfully.');
        }

        return redirect('/jobs')->with('error', 'Job not found.');
    }
}
