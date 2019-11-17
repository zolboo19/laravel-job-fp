@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <img src="{{ asset('avatar/man.jpg') }}" width="100">
        </div>

                <div class="col-md-6">
                        <form action="{{ route('user.profile.update') }}" method="POST">
                                @csrf
                        <div class="card">
                            <div class="card-header">Профайл мэдээллээ шинэчлэх</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Гэрийн хаяг</label>
                                    <input type="text" name="address" value="{{ auth()->user()->profile->address }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Ажлын туршлага/Ажилласан байдал/</label>
                                    <textarea name="experience" class="form-control">
                                        {{ auth()->user()->profile->experience }}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Таны бусдаас ялгарах давуу тал</label>
                                    <textarea name="bio" class="form-control">
                                            {{ auth()->user()->profile->bio }}
                                    </textarea>
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
                    </div>
                </div>

                <div class="card">
                        <div class="card-header">Хэрэглэгчийн ажил байдлын тодорхойлолт</div>
                        <div class="card-body">
                            <input type="file" class="form-control" name="cover_letter">
                            <button type="submit" class="btn btn-success float-right">Файл хуулах</button>
                        </div>
                    </div>
                <div class="card">
                    <div class="card-header">Хэрэглэгчийн ажлын анкет</div>
                    <div class="card-body">
                            <input type="file" class="form-control" name="resume">
                            <button type="submit" class="btn btn-success float-right">Файл хуулах</button>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
