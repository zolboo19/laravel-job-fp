@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach ($applicants as $applicant)
                    <div class="card-header">{{ $applicant->title }}</div>

                    <div class="card-body">
                        @foreach ($applicant->users as $user)
                        <table class="table">
                                <thead>
                                    <tr>
                                        <th>Нэр</th>
                                        <th>Цахим хаяг</th>
                                        <th>Гэрийн хаяг</th>
                                        <th>Хүйс</th>
                                        <th>Утас</th>
                                        <th>Bio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->profile['address'] }}</td>
                                            <td>{{ $user->profile['gender'] }}</td>
                                            <td>{{ $user->profile['phone_number'] }}</td>
                                            <td>{{ $user->profile['bio'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
