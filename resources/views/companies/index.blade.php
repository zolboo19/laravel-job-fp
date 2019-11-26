@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="company-profile">
            @if(empty($company->cover_photo))
                <img src="{{ asset('cover/tumblr-image-sizes-banner.png') }}" style="width:100%">
            @else
                <img src="{{ asset('upload/coverphoto') }}/{{ $company->cover_photo }}" alt="cover_photo" style="width:100%">
            @endif
            <div class="company-desc">
                @if(!empty($company->logo))
                    <img src="{{ asset('upload/logo') }}/{{ $company->logo }}" width="100">
                @else
                    <img src="{{ asset('avatar/man.jpg') }}" width="100">
                @endif
                <p>{{ $company->description }}</p>
                <p>{{ $company->cname }}</p>
                <p><strong>Slogan</strong>&nbsp;{{ $company->slogan }}</p>
                <p>{{ $company->address }}</p>
                <p>{{ $company->phone }}</p>
                <p>{{ $company->website }}</p>
            </div>
        </div>
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
                    @foreach($company->jobs as $job)
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
