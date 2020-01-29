<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\Sendjob;

class EmailController extends Controller
{
    public function email(Request $request){
        $homeUrl = url('/');
        $jobId = $request->job_id;
        $jobSlug = $request->job_slug;
        $jobUrl = $homeUrl . '/jobs/' . $jobId . '/' . $jobSlug;

        $data = array(
            'your_name' => $request->your_name,
            'your_email' => $request->your_email,
            'friend_email' => $request->friend_email,
            'jobUrl' => $jobUrl
        );

        $emailTo = $request->friend_email;
        try{
            Mail::to($emailTo)->send(new Sendjob($data));
            return redirect()->back()->with('message', 'Ажлын байрны линкийг амжилттай илгээлээ.');
        }catch(\Exception $e){
            return redirect()->back()->with('error-message', 'Ажлын байрны линкийг илгээж чадсангүй. Та дахин оролдоно уу?');
        }

    }
}
