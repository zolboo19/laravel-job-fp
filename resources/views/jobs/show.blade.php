@extends('layouts.master')
@section('content')
    <div class="album text-muted">
        <div class="container">
            @if(Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            @if(Session::has('error-message'))
                <div class="alert alert-danger">{{ Session::get('error-message') }}</div>
            @endif
            <div class="row" id="app">
                <div class="title" style="margin-top: 20px;">
                    <h2>{{$job->title}}</h2>
                </div>

                <img src="{{ asset('hero-job-image.jpg') }}" style="width: 100%;">

                <div class="col-lg-8">
                    <div class="p-4 mb-8 bg-white">
                        <!-- icon-book mr-3-->
                        <h3 class="h5 text-black mb-3"><i class="fa fa-book" style="color: blue;">&nbsp;</i>Дэлгэрэнгүй мэдээлэл <a href="#" data-toggle="modal" data-target="#exampleModal1"><i class="fa fa-envelope-square" style="font-size: 34px;float:right;color:green;"></i></a></h3>
                        <p> {{$job->description}}.</p>

                    </div>
                    <div class="p-4 mb-8 bg-white">
                        <!--icon-align-left mr-3-->
                        <h3 class="h5 text-black mb-3"><i class="fa fa-user" style="color: blue;">&nbsp;</i>Roles and Responsibilities</h3>
                        <p>{{$job->role}} .</p>

                    </div>
                    <div class="p-4 mb-8 bg-white">
                        <h3 class="h5 text-black mb-3"><i class="fa fa-users" style="color: blue;">&nbsp;</i>Number of vacancy</h3>
                        <p>{{$job->number_of_vacancy }} .</p>

                    </div>
                    <div class="p-4 mb-8 bg-white">
                        <h3 class="h5 text-black mb-3"><i class="fa fa-clock-o" style="color: blue;">&nbsp;</i>Experience</h3>
                        <p>{{$job->experience}}&nbsp;years</p>

                    </div>
                    <div class="p-4 mb-8 bg-white">
                        <h3 class="h5 text-black mb-3"><i class="fa fa-venus-mars" style="color: blue;">&nbsp;</i>Gender</h3>
                        <p>{{ $job->gender }}</p>

                    </div>
                    <div class="p-4 mb-8 bg-white">
                        <h3 class="h5 text-black mb-3"><i class="fa fa-dollar" style="color: blue;">&nbsp;</i>Salary</h3>
                        <p>{{ $job->salary }}</p>
                    </div>

                </div>

                <div class="col-md-4 p-4 site-section bg-light">
                        <h3 class="h5 text-black mb-3 text-center">Short Info</h3>
                            <p>Company name:{{$job->company->cname}}</p>
                            <p>Address:{{$job->address}}</p>
                            <p>Employment Type:{{$job->type}}</p>
                            <p>Position:{{$job->position}}</p>
                            <p>Posted:{{$job->created_at->diffForHumans()}}</p>
                            <p>Last date to apply:{{ date('F d, Y', strtotime($job->last_date)) }}</p>
                            <p>
                                <a href="{{route('company.index',[$job->company->id,$job->company->slug])}}" class="btn btn-warning" style="width: 100%;">Visit Company Page</a>
                            </p>
                            <p>
                                @if(Auth::check() && Auth::user()->user_type == 'simple_user')
                                    @if(!$job->checkApplication())
                                    <apply-job-component jobid={{ $job->id }}></apply-job-component>
                                        {{-- <form action="{{  route('apply', [$job->id]) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-success" style="width: 100%">Ажилд орох хүсэлт илгээх</button>
                                        </form> --}}
                                    @endif
                                    <br>
                                    <favourite-job-component jobid={{ $job->id }} :favourited={{ $job->checkSaved() ? 'true' : 'false' }}></favourite-job-component>
                                @endif
                                {{-- @if(Auth::check()&&Auth::user()->user_type == 'simple_user')
                                    @if(!$job->checkApplication())
                                        <apply-job-component :jobid={{$job->id}}></apply-job-component>
                                    @else
                                        <center>
                                            <span style="color: #000;">You applied this job</span>
                                        </center>
                                    @endif
                                    <br>
                                    <favourite-job-component jobid={{ $job->id }} :favourited={{ $job->checkSaved() ? 'true' : 'false' }}></favourite-job-component>
                                @else
                                    Please login to apply this job
                                @endif --}}
                            </p>
                    </div>

                </div>
                    {{-- @foreach($jobRecommendations as $jobRecommendation)
                    <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <p class="badge badge-success">{{$jobRecommendation->type}}</p>
                        <h5 class="card-title">{{$jobRecommendation->position}}</h5>
                        <p class="card-text">{{str_limit($jobRecommendation->description,90)}}
                    <center> <a href="{{route('jobs.show',[$jobRecommendation->id,$jobRecommendation->slug])}}" class="btn btn-success">Apply</a></center>
                    </div>
                    </div>
                    @endforeach --}}


            <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Санал болгох ажлын байр</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form action="{{ route('email') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="job_id" value="{{ $job->id }}">
                    <input type="hidden" name="job_slug" value="{{ $job->slug }}">
                    <div class="form-group">
                        <label for="">Таны нэр</label>
                        <input type="text" name="your_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Таны цахим хаяг</label>
                        <input type="email" name="your_email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Санал болгох хүний нэр</label>
                        <input type="text" name="friend_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Санал болгох хүний цахим шуудан</label>
                        <input type="email" name="friend_email" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Цуцлах</button>
                <button type="submit" class="btn btn-primary">Цахим шуудан илгээх</button>
            </form>
            </div>
        </div>
        </div>
    </div>
            </div>
            <br>
        </div>
    </div>
@endsection
