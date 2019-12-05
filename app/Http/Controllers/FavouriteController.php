<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function savejob($id)
    {
        $jobId = Job::findOrFail($id);
        $jobId->favourite()->attach(auth()->user()->id);
        return redirect()->back();
    }
    public function unsavejob($id)
    {
        $jobId = Job::findOrFail($id);
        $jobId->favourite()->detach(auth()->user()->id);
        return redirect()->back();
    }
}
