@extends('layouts.app')


@section('content')

<div class='container'>
    <div class="card">
        <h3 class="card-header text-center">
            Hotel list
        </h3>
        <ul class="list-group">
            @foreach($hotel as $h)
            <li class="list-group-item d-flex">

                <h3 class='fw-bold col'> {{$h->name}}</h3>
                <h3 class='col'> {{$h->country}}</h3>
                <h3 class='col'> {{$h->price}} Eur</h3>
                <h3 class='col'> {{$h->duration}} days</h3>
                @if($h->photo)
                <div class='col-1'> <img class='col-6' src='{{asset($h->photo)}}'></div>
                @else
                <div class='col-1'> <img class='col-6 img-fluid img-thumbnail' src='{{asset('no.jpg')}}'></div>
                @endif
                <div class="me-2">
                    <a href='{{route('hotel-edit', $h)}}' class="btn btn-outline-primary">Edit</a>
                </div>
                <form action='{{route('hotel-delete', $h)}}' method='post' class='col'>
                    <button type="submit" class="btn btn-outline-danger ">Delete</button>
                    @method('delete')
                    @csrf
                </form>

            </li>
            @endforeach
        </ul>
    </div>
</div>


@endsection
