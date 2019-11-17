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
</div>
@endsection
<style>
.fas{
    color: darkblue
}
</style>
