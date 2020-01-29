@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
    <div class="row">
        <div class="col-md-4">
            @include('admin.leftmenu')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Нийтлэлүүд
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>

                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
