<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployerRegisterController extends Controller
{
    public function store(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type
        ]);
        //return $user;

        Company::create([
            'user_id' => $user->id,
            'cname' => $request->cname,
            'slug' => Str::slug($request->cname)
        ]);
        $user->sendEmailVerificationNotification();
        return redirect()->to('login');
    }
}
