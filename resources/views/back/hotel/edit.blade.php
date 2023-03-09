@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card text-center ">
                <div class="card-header">
                    <h4>Edit hotel</h4>
                </div>
                <div class="card-body">



                    <form action="{{route('hotel-update', $hotel)}}" method="post">

                        @if($hotel->photo)
                        <div class="col-12"> <img class="col-8" src='{{asset($hotel->photo)}}'></div>

                        @endif

                        <div class="input-group mb-3 mt-3">
                            <label class="input-group-text">Country</label>
                            <select class="form-select" name="country">
                                @foreach($country as $c)
                                <option {{ $hotel->country == $c->name ? 'selected' : '' }} value="{{$c->name}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <label class="input-group-text">Name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name', $hotel->name)}}">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text">Price</label>
                            <input type="text" class="form-control" name="price" value="{{old('price', $hotel->price)}}">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text">Duration</label>
                            <input type="text" class="form-control" name="duration" value="{{old('duration', $hotel->duration  )}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        @method('put')
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
