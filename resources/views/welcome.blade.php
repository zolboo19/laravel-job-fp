@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Ажлын байрны жагсаалт</h1>
        <table class="table">
            <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                <tr>
                    <td>
                        <img src="{{ asset('avatar/man.jpg') }}" width="80">
                    </td>
                    <td>

                        Position: {{ $job->position }}
                        <div>
                            <i class="fas fa-clock" aria-hidden="true"></i> Үндсэн ажилтан
                        </div>
                    </td>
                    <td><i class="fas fa-map-marker" aria-hidden="true"></i>&nbsp; Address: {{ $job->address }}</td>
                    <td>
                        <i class="fas fa-globe"></i>&nbsp;
                        Date: {{ $job->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="{{ route('jobs.show', [$job->id, $job->slug]) }}">
                            <button class="btn btn-success">Дэлгэрэнгүй</button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <button class="btn btn-success btn-lg" style="width: 100%;">Бүх ажлын байрын харах</button>
    </div>
    <h1>Онцлох ажил олгогчид (Компани)</h1>
</div>

<div class="container">
    <div class="row">
        @foreach ($companies as $company)
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    @if(!empty(Auth::user()->company->logo))
                    <img src="{{ asset('upload/logo') }}/{{ $company->logo }}" class="card-img-top" alt="..." width="80">
                    @else
                    <img src="{{ asset('cover/1574172205.png') }}" width="80">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $company->cname }}</h5>
                            <p class="card-text">{{ Str::limit($company->description, 35) }}</p>
                            <a href="{{ route('company.index', [$company->id, $company->slug]) }}" class="btn btn-primary">Дэлгэрэнгүй мэдээлэл</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

<style>
.fas{
    color: darkblue
}
</style>
