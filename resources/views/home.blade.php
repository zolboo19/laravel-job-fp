@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @foreach ($jobs as $job)
                <div class="card">
                    <div class="card-header">{{ $job->title }}</div>
                    <br>
                    <small style="width:200px" class="badge badge-primary">
                        {{ $job->position }}
                    </small>

                    <div class="card-body">
                        {{ $job->description }}
                    </div>
                    <div class="card-footer">
                        <span>
                            <a href="{{ route('jobs.show', [$job->id, $job->slug]) }}">Дэлгэрэнгүй</a>
                        </span>
                        <span class="float-right">Ажлын байрны зарлагдсан хугацаа дуусах огноо: {{ $job->last_date }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
