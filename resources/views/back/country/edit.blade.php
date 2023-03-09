@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card text-center ">
                <div class="card-header">
                    <h4>Edit country</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('country-update', $country)}}" method="post">
                        <div class="mb-3">
                            <label class="form-label"><span style="font-weight: bold; color: #957DAD;">Country name:</span> {{$country->name}}</label>
                            <input type="text" class="form-control" name="name" value="{{old('name', $country->name)}}">

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Season start</label>
                            <input type="date" name="season_start" class="form-control" value="{{old('season_start', $country->season_start)}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Season end</label>
                            <input type="date" name="season_end" class="form-control" value="{{old('season_end', $country->season_end)}}">
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
