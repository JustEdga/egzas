@extends('layouts.app')

@section('content')

<div class='container text-center row'>
    <div class='col-3'>
        @include('front.categories')
    </div>
    <div class='col-9'>
        <div class="card">
            <div class="">
                @if($hotel->photo)
                <img class='card-img-top' style="width: 350px" src='{{asset($hotel->photo)}}'>
                @else
                <img class='card-img-top' style="width: 350px" src='{{asset('no.jpg')}}'>
                @endif
                <div class="card-body row">
                    <h4 class='card-title col-6'> {{$hotel->country}}</h4>
                    <div class='col-6'> {{$hotel->price}} Eur</div>
                    <h4 class='col-6'> {{$hotel->name}}</h4>
                    <div class='col-6'> {{$hotel->duration}} days</div>
                    @if(isset($user))
                    <form class='mt-3' action="{{route('add-to-cart')}}" method="post">
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text">People count: </label>
                                        <input type="number" min="1" name="count" value="2">
                                    </div>
                                </div>
                                <div class='col-6'>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text">Check in</label>
                                        <input type="date" name="check_in" class="form-control" required>
                                    </div>
                                </div>
                                <input type="hidden" name="hotel" value="{{$hotel->id}}">
                                <button type="submit" class="col-12 mt-3 btn btn-outline-primary">Order</button>
                            </div>
                        </div>
                        @csrf
                    </form>
                    @else
                    <a href='{{route('home')}}' class="col-12 mt-3 btn btn-outline-primary">Login required to order!</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
