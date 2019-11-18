@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">

            @if(!empty(Auth::user()->profile->avatar))
                <img src="{{ asset('upload/avatar') }}/{{ Auth::user()->profile->avatar }}" width="100" style="width:100%;">
            @else
                <img src="{{ asset('avatar/man.jpg') }}" width="100" style="width:100%;">
            @endif


            <form action="{{ route('user.profile.avatar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    {{-- <div class="card-header">
                        Профайл зураг шинэчлэх
                    </div> --}}
                    <div class="card-body">
                        <input type="file" class="form-control" name="avatar">
                        @if($errors->has('avatar'))
                            <div class="error" style="color: red;">
                                {{ $errors->first('avatar') }}
                            </div>
                        @endif
                        <button type="submit" class="btn btn-success float-right">Шинэчлэх</button>
                    </div>
                </div>
            </form>
            @if(Session::has('MessageAvatar'))
                <div class="alert alert-success">
                    {{ Session::get('MessageAvatar') }}
                </div>
            @endif
        </div>

                <div class="col-md-5">
                        <form action="{{ route('user.profile.update') }}" method="POST">
                                @csrf
                        <div class="card">
                            <div class="card-header">Профайл мэдээллээ шинэчлэх</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Гэрийн хаяг</label>
                                    <input type="text" name="address" value="{{ auth()->user()->profile->address }}" class="form-control">
                                    @if($errors->has('address'))
                                        <div class="error" style="color: red;">
                                            {{ $errors->first('address') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Утасны дугаар</label>
                                    <input type="text" name="phone_number" value="{{ auth()->user()->profile->phone_number }}" class="form-control">
                                    @if($errors->has('phone_number'))
                                        <div class="error" style="color: red;">
                                            {{ $errors->first('phone_number') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Ажлын туршлага/Ажилласан байдал/</label>
                                    <textarea name="experience" class="form-control">{{ auth()->user()->profile->experience }}</textarea>
                                    @if($errors->has('experience'))
                                        <div class="error" style="color: red;">
                                            {{ $errors->first('experience') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Таны бусдаас ялгарах давуу тал</label>
                                    <textarea name="bio" class="form-control">{{ auth()->user()->profile->bio }}</textarea>
                                    @if($errors->has('bio'))
                                        <div class="error" style="color: red;">
                                            {{ $errors->first('bio') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success">Шинэчлэх</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @if(Session::has('Message'))
                        <div class="alert alert-success">
                            {{ Session::get('Message') }}
                        </div>
                    @endif
                    </div>


        <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Хэрэглэгчийн мэдээлэл</div>
                    <div class="card-body">
                        <p>Хэрэглэгчийн нэр: {{ auth()->user()->name }}</p>
                        <p>Хэрэглэгчийн И-мэйл: {{ auth()->user()->email }}</p>
                        <p>Хэрэглэгчийн хаяг: {{ auth()->user()->profile->address }}</p>
                        <p>Хүйс: {{ auth()->user()->profile->gender }}</p>
                        <p>Ажлын туршлага: {{ auth()->user()->profile->experience }}</p>
                        <p>Таны бусдаас ялгарах давуу тал: {{ auth()->user()->profile->bio }}</p>
                        <p>Бүртгэгдсэн огноо: {{ auth()->user()->created_at }}</p>

                        @if(!empty(Auth::user()->profile->cover_letter))
                            <p>
                                <a href="{{ Storage::url(Auth::user()->profile->cover_letter) }}">Ажил байдлын тодорхойлолт</a>
                            </p>
                        @else
                            <p>Ажил байдлын тодорхойлолтоо оруулна уу?</p>
                        @endif
                        @if(!empty(Auth::user()->profile->resume))
                            <p>
                                <a href="{{ Storage::url(Auth::user()->profile->resume) }}">Ажын анкет</a>
                            </p>
                        @else
                            <p>Ажын анкетаа оруулна уу?</p>
                        @endif
                    </div>
                </div>

                <div class="card">
                    <form action="{{ route('user.profile.coverletter') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="card-header">Хэрэглэгчийн ажил байдлын тодорхойлолт</div>
                            <div class="card-body">
                                <input type="file" class="form-control" name="cover_letter">
                                @if($errors->has('cover_letter'))
                                    <div class="error" style="color: red;">
                                        {{ $errors->first('cover_letter') }}
                                    </div>
                                @endif
                                <button type="submit" class="btn btn-success float-right">Файл хуулах</button>
                            </div>
                    </form>
                    @if(Session::has('MessageCoverLetter'))
                        <div class="alert alert-success">
                            {{ Session::get('MessageCoverLetter') }}
                        </div>
                    @endif
                    </div>
                <div class="card">
                    <form action="{{ route('user.profile.resume') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                    <div class="card-header">Хэрэглэгчийн ажлын анкет</div>
                    <div class="card-body">
                            <input type="file" class="form-control" name="resume">
                            @if($errors->has('resume'))
                                <div class="error" style="color: red;">
                                    {{ $errors->first('resume') }}
                                </div>
                            @endif
                            <button type="submit" class="btn btn-success float-right">Файл хуулах</button>
                    </div>
                    </form>
                    @if(Session::has('MessageResume'))
                        <div class="alert alert-success">
                            {{ Session::get('MessageResume') }}
                        </div>
                    @endif
                </div>
        </div>
    </div>
</div>
@endsection
