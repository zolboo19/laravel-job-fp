@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ажлын байр зарлах</div>
                <div class="card-body">
                    <form action="{{ route('jobs.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                        <input type="text" name="title" id="" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="Гарчиг оруулах хэсэг" >
                                @if($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                              </div>
                              <div class="form-group">
                                  <textarea name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="Ажлын байрны талаарх мэдээлэл."></textarea>
                                 @if($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                @endif
                              </div>
                              <div class="form-group">
                                  <input type="text" name="role" id="" class="form-control {{ $errors->has('role') ? ' is-invalid' : '' }}" placeholder="Ажлын байрны нэр">
                                  @if($errors->has('role'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                                @endif
                              </div>
                              <div class="form-group">
                                    <input type="text" name="position" id="" class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}" placeholder="Ажлын үүргийн чиглэлийг бичиж өгнө үү?">
                                    @if($errors->has('position'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('position') }}</strong>
                                          </span>
                                  @endif
                                </div>
                              <div class="form-group">
                                  <select name="category" class="form-control">
                                      @foreach(App\Category::all() as $category)
                                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="form-group">
                                  <textarea name="address" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="Ажлын хаягаа оруулна уу?"></textarea>
                                  @if($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                @endif
                              </div>
                              <div class="form-group">
                                  <select name="type" class="form-control">
                                      <option value="fulltime">Орон тооны ажилтан</option>
                                      <option value="parttime">Цагийн ажилтан</option>
                                      <option value="casual">Орон тооны бус/Гэрээт ажилтан/</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label for="status">Нийтлэх эсэх</label>
                                      <select name="status" class="form-control">
                                          <option value="1">Нийтлэх</option>
                                          <option value="0">Нийтлэхгүй</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <input type="text" name="last_date" id="datepicker" class="form-control {{ $errors->has('last_date') ? ' is-invalid' : '' }}" placeholder="Ажлын байрны анкет хүлээн авах хугацаа">
                                  @if($errors->has('last_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('last_date') }}</strong>
                                        </span>
                                @endif
                              </div>
                              <div class="form-group">
                                  <button type="submit" class="btn btn-dark">Ажлын байрны зар үүсгэх</button>
                              </div>
                    </form>
                    @if(Session::has('MessageJob'))
                        <div class="alert alert-success">
                            {{ Session::get('MessageJob') }}
                        </div>
                    @endif
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
