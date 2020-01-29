<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Str;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function create(){
        return view('admin.create');
    }

    public function store(Request $request){
        //return $request->all();
        $this->validate($request, [
            'title' => 'required|min:3',
            'content' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = $file->store('uploads', 'public');
            Post::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'content' => $request->content,
                'image' => $path,
                'staus' => $request->status
            ]);
        }
        return redirect('/dashboard')->with('message', 'Нийтлэл амжилттаа хадгалагдлаа.');
    }
}
