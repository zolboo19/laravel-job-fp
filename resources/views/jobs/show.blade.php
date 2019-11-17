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
                    <div class="card-header">Компаны товч танилцуулга</div>

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
            </div>
    </div>
</div>
@endsection
