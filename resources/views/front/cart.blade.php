@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3">
            @include('front.categories')
        </div>
        <div class="col-9">
            <div class="card">
                <h3 class="card-header text-center">
                    Travel list
                </h3>
                <ul class="list-group">
                    <form action="{{route('update-cart')}}" method="post">
                        @forelse($cartList as $hotel)
                        <div class="container">
                            <div class="row">
                                <div class='col-2'>
                                    <div class=mt-3'>
                                        <div>{{$hotel->hotelCountry->name}}</div>
                                        <h3>{{$hotel->name}}</h3>
                                    </div>
                                </div>
                                @if($hotel->photo)
                                <img class='col-2' style="width: 150px; height: 150px" src="{{asset($hotel->photo)}}">
                                @else
                                <img class='col-2' src="{{asset('no.jpg')}}">
                                @endif
                                <div class="col-2">
                                    <div class='mt-3 ms-3'> People count:
                                        <input class='mt-2 col-10' type="number" min="1" name="count[]" value="{{$hotel->count}}">
                                    </div>
                                </div>
                                <input type="hidden" name="ids[]" value="{{$hotel->id}}">
                                <div class='col-1'>
                                    <div class='mt-3'>
                                        Price: <br>{{$hotel->sum}}$
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class='col mt-3'>
                                        Start: {{$hotel->start}}
                                        <br>
                                        End: {{$hotel->end}}
                                    </div>
                                </div>
                                <div class='col'>
                                    <div class='mt-3'>
                                        <button type="submit" name="delete" value="{{$hotel->id}}" class="btn btn-outline-danger">Delete</button>
                                    </div>
                                </div>
                                @empty
                                <li class="list-group-item d-flex">Cart Empty</li>
                                @endforelse
                                <li class="list-group-item d-flex">
                                    <button type="submit" class="btn btn-outline-primary">Update</button>
                                </li>
                                @csrf
                            </div>
                        </div>
                    </form>
                </ul>
                <ul class="list-group">
                    <li class="list-group-item">
                        <form action="{{route('make-order')}}" method="post">
                            <button type="submit" class="btn btn-outline-primary">Purchase</button>
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
