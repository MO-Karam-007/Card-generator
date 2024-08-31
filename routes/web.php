<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;





// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/', 'welcome');

Route::get('contact', function () {
    // Fetch soft-deleted items
    $deletedJobs = Job::onlyTrashed()->get();

    // Pass the deleted items to the view
    return view('contact', ['deletedJobs' => $deletedJobs]);
});


// Route::post('jobs', [JobController::class, 'store']);
Route::resource('jobs', JobController::class, []);
Route::post('jobs', [JobController::class, 'search']);
Route::post('jobs/restore/{id}', [JobController::class, 'restore'])->name('jobs.restore');


Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/login', [SessionController::class, 'index']);
Route::post('/login', [SessionController::class, 'store']);


Route::post('/logout', [SessionController::class, 'destroy']);

// Route::get('/jobs', function () {
//     $jobs = Job::with('employer')->latest()->paginate(5);
//     return view('jobs.index', ['jobs' => $jobs]);
// });



// Route::get('/jobs/create', function () {
//     return view('jobs.create');
// });


// Route::get('/jobs/{job}', function (Job $job) {
//     return view('jobs.show', ['job' => $job]);
// });


// Route::delete('/jobs/{job}', function (Job $job) {
//     $job->delete();
//     return redirect('/jobs');
// });


// Route::get('/jobs/{job}/edit', function (Job $job) {
//     return view('jobs.edit', ['job' => $job]);
// });


// Route::get('/jobs/{job}/edit', function (Job $job) {
//     return view('jobs.edit', ['job' => $job]);
// });



// Route::PATCH('/jobs/{job}', function (Job $job) {

//     $data = [
//         'job' => request('job'),
//         'salary' => request('salary')
//     ];

//     $job->update($data);
//     return redirect('/jobs');
// });




// Route::post('/jobs', function () {
//     // $req = request()->all();
//     // dd($req);
//     // Validations::validate
//     request()->validate([
//         'job' => 'required|min:4',
//         'salary' => 'required'
//     ]);

//     Job::create([
//         'job' => request('job'),
//         'salary' => request('salary'),
//         'employer_id' => 1
//     ]);
//     return redirect('/jobs');
// });
