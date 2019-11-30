@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form action="{{ route('alljobs') }}" method="GET">
            <div class="form-inline">
                <div class="form-group">
                    <label for="">Хайх түлхүүр үг&nbsp;</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">&nbsp;&nbsp;Ажлын нөхцөл&nbsp;</label>
                    <select name="type" class="form-control">
                        <option value="">Ажлын нөхцөл сонгох</option>
                        <option value="fulltime">Бүтэн цагийн</option>
                        <option value="parttime">Цагийн</option>
                        <option value="casual">Гэрээт</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">&nbsp;&nbsp;Ангилал&nbsp;</label>
                    <select name="category_id" class="form-control">
                            <option value="">Ангилал сонгох</option>
                        @foreach (App\Category::all() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">&nbsp;&nbsp;Хаяг&nbsp;</label>
                    <input type="text" name="address" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success">Хайх</button>
                </div>
            </div>
        </form>
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
        {{ $jobs->appends(request()->except('page'))->links() }}

    </div>
</div>


@endsection

<style>
.fas{
    color: darkblue
}
</style>
