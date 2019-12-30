@extends('layouts.master')
@section('content')
    <div class="album text-muted">
        <div class="container">
            <div class="row" id="app">
                <div class="title" style="margin-top: 20px;">
                    <h2></h2>
                </div>

                @if(empty($company->cover_photo))
                    <img src="{{ asset('cover/tumblr-image-sizes-banner.png') }}" style="width:100%">
                @else
                    <img src="{{ asset('upload/coverphoto') }}/{{ $company->cover_photo }}" alt="cover_photo" style="width:100%">
                @endif

                <div class="col-lg-12">
                    <div class="p-4 mb-8 bg-white">
                        <!-- icon-book mr-3-->
                        <h3 class="h5 text-black mb-3"><i class="fa fa-book" style="color: blue;">&nbsp;</i>Description <a href="#"data-toggle="modal" data-target="#exampleModal1"><i class="fa fa-envelope-square" style="font-size: 34px;float:right;color:green;"></i></a></h3>

                    </div>

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
            <br>
        </div>
    </div>
@endsection
