<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, Company $company)
    {
        return view('companies.index', compact('company'));
    }

    public function coverphoto(Request $request)
    {
        $user_id = auth()->user()->id;
        //dd($request);
        if ($request->hasfile('cover_photo')) {
            $file = $request->file('cover_photo');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('upload/coverphoto', $filename);
            Company::where('user_id', $user_id)->update([
                'cover_photo' => $filename
            ]);
        }
        return redirect()->back()->with('MessageCoverPhoto', 'Ажил олгогчын нүүр зургийг амжилттай шинэчиллээ.');
    }

    public function logo(Request $request)
    {
        $user_id = auth()->user()->id;
        //dd($request);
        if ($request->hasfile('logo')) {
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('upload/logo', $filename);
            Company::where('user_id', $user_id)->update([
                'logo' => $filename
            ]);
        }
        return redirect()->back()->with('MessageLogo', 'Ажил олгогчын лого зургийг амжилттай шинэчиллээ.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user_id = auth()->user()->id;
        Company::where('user_id', $user_id)->update([
            'address' => $request->address,
            'phone' => $request->phone,
            'website' => $request->website,
            'slogan' => $request->slogan,
            'description' => $request->description
        ]);
        return redirect()->back()->with('MessageCompany', 'Ажил олгогчын мэдээллийг амжилттай шинэчилэлээ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
