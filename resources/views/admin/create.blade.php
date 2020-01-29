@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @include('admin.leftmenu')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Нийтлэл үүсгэх
                </div>
                <div class="card-body">
                    <form action=" {{ route('post.store') }} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}" placeholder="Гарчиг" autocomplete="title" autofocus>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <textarea name="content" id="" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror" autocomplete="title" autofocus></textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="file" name="image" class="form-control @error('content') is-invalid @enderror" autocomplete="image" autofocus>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <select name="status" class="form-control">
                                <option value="1">Нийтлэсэн</option>
                                <option value="0">Нийтлээгүй</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Хадгалах</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
