@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">

            @if(!empty(Auth::user()->company->logo))
                <img src="{{ asset('upload/logo') }}/{{ Auth::user()->company->logo }}" width="100" style="width:100%;">
            @else
                <img src="{{ asset('avatar/man.jpg') }}" width="100" style="width:100%;">
            @endif


            <form action="{{ route('company.logo') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    {{-- <div class="card-header">
                        Профайл зураг шинэчлэх
                    </div> --}}
                    <div class="card-body">
                        <input type="file" class="form-control" name="logo">
                        @if($errors->has('logo'))
                            <div class="error" style="color: red;">
                                {{ $errors->first('logo') }}
                            </div>
                        @endif
                        <button type="submit" class="btn btn-success float-right">Шинэчлэх</button>
                    </div>
                </div>
            </form>
            @if(Session::has('MessageLogo'))
                <div class="alert alert-success">
                    {{ Session::get('MessageLogo') }}
                </div>
            @endif
        </div>

                <div class="col-md-5">
                        <form action="{{ route('company.update') }}" method="POST">
                                @csrf
                        <div class="card">
                            <div class="card-header">Ажил олгогч компаны мэдээлэл</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Компаны хаяг</label>
                                    <input type="text" name="address" value="{{ auth()->user()->company->address }}" class="form-control">
                                    @if($errors->has('address'))
                                        <div class="error" style="color: red;">
                                            {{ $errors->first('address') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                        <label for="">Холбоо барих утасны дугаар</label>
                                        <input type="text" name="phone" value="{{ auth()->user()->company->phone }}" class="form-control">
                                        @if($errors->has('phone'))
                                            <div class="error" style="color: red;">
                                                {{ $errors->first('phone') }}
                                            </div>
                                        @endif
                                </div>
                                <div class="form-group">
                                        <label for="">Цахим хуудас</label>
                                        <input type="text" name="website" value="{{ auth()->user()->company->website }}" class="form-control">
                                        @if($errors->has('website'))
                                            <div class="error" style="color: red;">
                                                {{ $errors->first('website') }}
                                            </div>
                                        @endif
                                </div>
                                <div class="form-group">
                                        <label for="">Мэдээ, мэдээлэл</label>
                                        <input type="text" name="slogan" value="{{ auth()->user()->company->slogan }}" class="form-control">
                                        @if($errors->has('slogan'))
                                            <div class="error" style="color: red;">
                                                {{ $errors->first('slogan') }}
                                            </div>
                                        @endif
                                </div>
                                <div class="form-group">
                                        <label for="">Тайлбар</label>
                                        <input type="text" name="description" value="{{ auth()->user()->company->description }}" class="form-control">
                                        @if($errors->has('description'))
                                            <div class="error" style="color: red;">
                                                {{ $errors->first('description') }}
                                            </div>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success">Шинэчлэх</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @if(Session::has('MessageCompany'))
                        <div class="alert alert-success">
                            {{ Session::get('MessageCompany') }}
                        </div>
                    @endif
                    </div>


        <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Ажил олгогчын дэлгэрэнгүй мэдээлэл</div>
                    <div class="card-body">
                        <p>Ажил олгогчын нэр: {{ auth()->user()->company->cname }}</p>
                        <p>Хаяг: {{ auth()->user()->company->address }}</p>
                        <p>Утасны дугаар: {{ auth()->user()->company->phone }}</p>
                        <p>Цахим хуудас: {{ auth()->user()->company->website }}</p>
                        <p>Мэдээ, мэдээлэл: {{ auth()->user()->company->slogan }}</p>
                        <p>Тайлбар: {{ auth()->user()->company->description }}</p>
                        <a href="company/{{ Auth::user()->company->slug }}">Компаны хуудасруу шилжих</a>

                    </div>
                </div>

                <div class="card">
                    <form action="{{ route('company.cover.photo') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="card-header">Компаны ковер зураг солих</div>
                            <div class="card-body">
                                <input type="file" class="form-control" name="cover_photo">
                                @if($errors->has('cover_photo'))
                                    <div class="error" style="color: red;">
                                        {{ $errors->first('cover_photo') }}
                                    </div>
                                @endif
                                <button type="submit" class="btn btn-success float-right">Файл хуулах</button>
                            </div>
                    </form>
                    @if(Session::has('MessageCoverPhoto'))
                        <div class="alert alert-success">
                            {{ Session::get('MessageCoverPhoto') }}
                        </div>
                    @endif
                </div>
        </div>
    </div>
</div>
@endsection
