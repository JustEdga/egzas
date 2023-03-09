@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card text-center ">
                <div class="card-header">
                    <h4>Create country</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('country-create')}}" method="post">
                        <div class="mb-3">
                            <label class="form-label">Country name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Season start</label>
                            <input type="date" name="season_start" class="form-control" value="{{old('season_start')}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Season end</label>
                            <input type="date" name="season_end" class="form-control" value="{{old('season_end')}}">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
