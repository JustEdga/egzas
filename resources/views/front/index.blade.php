@extends('layouts.app')

@section('content')

<div class='container text-center'>
    <div class='row'>
        @if(Session::has('ok'))
        <h6 class="alert alert-success alert-dismissible fade show fs-5" role="alert">{{Session::get('ok')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></h6>

        @elseif(Session::has('bad'))
        <h6 class="alert alert-danger alert-dismissible fade show fs-5" role="alert">{{Session::get('bad')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></h6>

        @endif

        <div class='col-4'>
            @include('front.categories')
        </div>


        <div class='col-8'>
            <div class="card">
                <div class='card-header'>
                    <h3 class='mb-3'>Choose your travel</h3>
                    <form class='row' @if(isset($country)) action="{{route('show-cats-hotels', $country)}}" @else action="{{route('index')}}" @endif method='get'>
                        <div class='col-4'>
                            <input name='s' type="text" class="form-control" placeholder="Search by name" value="{{$s}}">
                        </div>
                        <div class='col-4'>
                            <select class="form-select" name='sort'>
                                <option value='all' selected>Order</option>
                                @foreach($sortSelect as $index => $value)
                                <option value="{{$index}}" @if($sortShow==$index) selected @endif>{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="ms-3 col-1 btn btn-outline-primary">Show</button>
                        <a href='{{route('index')}}' class='ms-3 col-1 btn btn-outline-warning'>Clear</a>
                    </form>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($hotels as $value)
                <div class="col-5 mt-5">
                    <a href='{{route('show', $value)}}' class="btn btn-outline-primary">
                        @if($value->photo)
                        <img class='img-fluid img-thumbnail' src='{{asset($value->photo)}}'>
                        @else
                        <img class='img-fluid img-thumbnail' src='{{asset('no.jpg')}}'>
                        @endif
                        <div> {{$value->country}}</div>
                        <div class='fw-bold col'> {{$value->name}}</div>
                        <div> {{round($value->price, 0)}} Eur</div>
                        <div> {{$value->duration}} days</div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
