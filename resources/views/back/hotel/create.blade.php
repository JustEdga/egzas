@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card text-center ">
                <div class="card-header">
                    <h4>Create Hotel</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('hotel-store')}}" method="post" enctype="multipart/form-data">

                        <div class="input-group mb-3">
                            <label class="input-group-text">Country</label>
                            <select class="form-select" name="country">
                                @foreach($country as $c)
                                <option value="{{$c->name}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label">Hotel name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="col-3">
                                <label class="form-label">Price</label>
                                <input type="text" class="form-control" name="price">
                            </div>
                            <div class="col-3">
                                <label class="form-label">Duration</label>
                                <input type="text" class="form-control" name="duration">
                            </div>

                        </div>
                        <div class="mt-3">
                            <label class="form-label">Photo</label>
                            <input type="file" class="form-control" name="photo">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>

                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
