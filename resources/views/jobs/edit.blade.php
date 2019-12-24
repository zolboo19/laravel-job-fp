@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ажлын байр засах</div>
                <div class="card-body">
                    <form action="{{ route('jobs.update', [$job->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                        <input type="text" name="title" id="" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="Гарчиг оруулах хэсэг" value="{{ $job->title }}">
                            @if($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                              </div>
                        <div class="form-group">
                            <textarea name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="Ажлын байрны талаарх мэдээлэл.">{{ $job->description }}</textarea>
                            @if($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                            </div>
                            <div class="form-group">
                                <input type="text" name="role" id="" class="form-control {{ $errors->has('role') ? ' is-invalid' : '' }}" placeholder="Ажлын байрны нэр" value="{{ $job->description }}">
                                @if($errors->has('role'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                    <input type="text" name="position" id="" class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}" placeholder="Ажлын үүргийн чиглэлийг бичиж өгнө үү?" value="{{ $job->position }}">
                                    @if($errors->has('position'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('position') }}<strong>
                                        </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <select name="category" class="form-control">
                                    @foreach(App\Category::all() as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $job->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea name="address" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="Ажлын хаягаа оруулна уу?">{{ $job->address }}</textarea>
                                  @if($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="text" name="number_of_vacancy" class="form-control {{ $errors->has('number_of_vacancy') ? ' is-invalid' : '' }}" placeholder="Ажлын байрны тоо оруулна уу?" value="{{ $job->number_of_vacancy }}">
                                @if($errors->has('number_of_vacancy'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('number_of_vacancy') }}</strong>
                                      </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" name="experience" class="form-control {{ $errors->has('experience') ? ' is-invalid' : '' }}" placeholder="Ажилтанд тавигдах ажлын байрны туршлагын талаарх мэдээлэл оруулна уу?" value="{{ $job->experience }}">
                                @if($errors->has('experience'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('experience') }}</strong>
                                      </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <select name="gender" class="form-control">
                                        <option value="">---хүйс сонгох---</option>
                                        <option value="male" {{ $job->gender =='male' ? 'selected':'' }}>Эрэгтэй</option>
                                        <option value="0" {{ $job->gender =='female' ? 'selected':'' }}>Эмэгтэй</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="salary">
                                    <option value="тохиролцох боломжтой" {{ $job->salary =='тохиролцох боломжтой' ? 'selected':'' }}>Тохиролцоно</option>
                                    <option value="male" {{ $job->salary =='500000-600000' ? 'selected':'' }}>500000-600000</option>
                                    <option value="600000-700000" {{ $job->salary =='600000-700000' ? 'selected':'' }}>Эмэ600000-700000гтэй</option>
                                    <option value="700000-800000" {{ $job->salary =='700000-800000' ? 'selected':'' }}>700000-800000</option>
                                    <option value="900000-1000000" {{ $job->salary =='900000-1000000' ? 'selected':'' }}>900000-1000000</option>
                                    <option value="1000000-11000000" {{ $job->salary =='1000000-11000000' ? 'selected':'' }}>1000000-11000000</option>

                                </select>
                            </div>
                              <div class="form-group">
                                  <select name="type" class="form-control">
                                      <option value="fulltime" {{ $job->type == 'fulltime' ? 'selected' : '' }}>Орон тооны ажилтан</option>
                                      <option value="parttime" {{ $job->type == 'parttime' ? 'selected' : '' }}>Цагийн ажилтан</option>
                                      <option value="casual" {{ $job->type == 'casual' ? 'selected' : '' }}>Орон тооны бус/Гэрээт ажилтан/</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label for="status">Нийтлэх эсэх</label>
                                      <select name="status" class="form-control">
                                          <option value="1" {{ $job->status =='1' ? 'selected':'' }}>Нийтлэх</option>
                                          <option value="0" {{ $job->status =='0' ? 'selected':'' }}>Нийтлэхгүй</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <input type="text" name="last_date" id="datepicker" class="form-control {{ $errors->has('last_date') ? ' is-invalid' : '' }}" placeholder="Ажлын байрнны анкет хүлээн авах хугацаа" value="{{ $job->last_date }}">
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
                    @if(Session::has('MessageUpdateJob'))
                        <div class="alert alert-success">
                            {{ Session::get('MessageUpdateJob') }}
                        </div>
                    @endif
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
