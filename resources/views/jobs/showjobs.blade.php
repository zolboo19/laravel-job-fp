@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Компаны үүсгэсэн ажлын байрны зарууд</div>

                <div class="card-body">
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
                                                <button class="btn btn-success">Харах</button>
                                            </a>
                                            <a href="{{ route('jobs.edit', [$job->id, $job->slug]) }}">
                                                    <button class="btn btn-primary">Засах</button>
                                                </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
