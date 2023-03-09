@extends('layouts.app')


@section('content')

<div class="container col-6">
    <div class="card-body">
        @if(Session::has('ok'))
        <h6 class="alert alert-success alert-dismissible fade show fs-5" role="alert">{{Session::get('ok')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></h6>

        @elseif(Session::has('bad'))
        <h6 class="alert alert-danger alert-dismissible fade show fs-5" role="alert">{{Session::get('bad')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></h6>

        @endif

        <ul class="list-group">
            @forelse($countries as $country)
            <li class="list-group-item">
                <div class="list-table">
                    <div class="list-table__content">
                        <div class="container">
                            <div class="col-6 d-inline-block">
                                <h4 class="mt-2"><span style="font-weight: bold; color: #957DAD;">Country name</span>: {{$country->name}}</h4>
                                <h4 class="mt-2"><span style="font-weight: bold; color: #F7A3DB;">Season start</span>: {{$country->season_start}}</h4>
                                <h4 class="mt-2"><span style="font-weight: bold; color: #F7A3DB;">Season end</span>: {{$country->season_end}}</h4>
                            </div>
                            <div class="mt-3 m-3 d-inline-block float-end" role="group" aria-label="Basic mixed styles example">
                                <form action="{{route('country-delete', $country)}}" method="post">
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>
                            <div class="mt-3 m-3 d-inline-block float-end" role="group" aria-label="Basic mixed styles example">
                                <a href="{{route('country-edit', $country)}}" class="btn btn-outline-secondary">Edit</a>
                            </div>

                        </div>
                    </div>
                </div>
            </li>
            @empty
            <li class="list-group-item">No countries yet</li>
            @endforelse
        </ul>
    </div>
</div>

@endsection
