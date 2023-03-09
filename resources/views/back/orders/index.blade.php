@extends('layouts.app')

@section('title', 'Rezervacijų sąrašas')

@section('content')

<div class='container'>
    <div class="card">
        <h3 class="fw-bold card-header text-center">
            Order list
        </h3>
        <ul class="list-group">
            @foreach($orders as $order)
            <li class="list-group-item d-flex">
                <div class='fw-bold col-1'># {{$order->id}}</div>
                <div class='fw-bold col-1'> {{$order->user->name}}</div>
                <ul class="list-group col-4">
                    @foreach($order->hotels->hotels as $hotel)
                    <li class="list-group-item">
                        <div class='text-center fw-bold'>{{$hotel->name}}</div>
                        <div class='text-center'>{{round($hotel->price, 0)}} Eur X {{$hotel->count}} vnt. = {{$hotel->price * $hotel->count}} Eur</div>
                    </li>
                    @endforeach
                </ul>
                <div class='col-2 text-center'>
                    <div class='fw-bold'>Total: </div>
                    <div>{{$order->hotels->total}} Eur</div>
                </div>
                <div class='col-2'> @if($order->status) Order confirmed @else Waiting for confirmation @endif </div>
                @if(Auth::user()?->role == 'admin')
                <form action='{{route('orders-destroy', $order->id)}}' method='post' class='col'>
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                    @method('delete')
                    @csrf
                </form>
                @if(!$order->status)
                <form action='{{route('orders-update', $order->id)}}' method='post' class='col'>
                    <button type="submit" class="btn btn-outline-success">OK</button>
                    @method('put')
                    @csrf
                </form>
                @endif
                @endif
            </li>
            @endforeach
        </ul>
    </div>
</div>


@endsection
