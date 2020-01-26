@extends('layouts.master')
@section('content')
    <div class="container">
        <h2>Ажил олгогч</h2>
        <div class="row">
            @foreach ($companies as $company)
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        @if(!empty($company->logo))
                            <img src="{{ asset('upload/logo') }}/{{ $company->logo }}" width="100"class="card-img-top">
                        @else
                            <img src="{{ asset('avatar/man.jpg') }}" width="100" class="card-img-top">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $company->cname }}</h5>
                            <p class="card-text">{{ $company->description }}</p>
                            <center>
                                <a href="{{ route('company.index', [$company->id, $company->slug]) }}" class="btn btn-primary">Дэлгэрэнгүй мэдээлэл</a>
                            </center>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        {{ $companies->links() }}
    </div>
@endsection
