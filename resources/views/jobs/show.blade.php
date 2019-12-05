@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $job->title }}</div>

                <div class="card-body">
                    <p>
                        <h3>Тайлбар</h3>{{ $job->description }}
                    </p>
                    <p>
                        {{ $job->role }}
                    </p>

                </div>
            </div>
        </div>
        <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Ажил олгогчын товч танилцуулга</div>

                    <div class="card-body">
                        <p>Компани:
                            <a href="{{ route('company.index', [$job->company->id, $job->company->slug]) }}">
                                    {{ $job->company->cname }}
                            </a>
                        </p>
                        <p>Хаяг: {{ $job->address }}</p>
                        <p>Ажлын байрны төлөв: {{ $job->type }}</p>
                        <p>Ажлын байрны чиг, үүрэг:{{ $job->position }}</p>
                        <p>Ажлын байрны зарласан огноо: {{ $job->created_at->diffForHumans() }}</p>

                    </div>
                </div>
                <br>
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
                @if(Session::has('MessageApply'))
                    <div class="alert alert-success">
                        {{ Session::get('MessageApply') }}
                    </div>
                @endif
            </div>
    </div>
</div>
@endsection
