@inject('cats', 'App\Services\CategoriesService')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href='{{route('index')}}' @if(!isset($country)) class="list-group-item active fs-4" @else class="list-group-item" @endif>All countries</a>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($cats->get() as $value)
                        <li class="list-group-item">
                            <div class="list-table cats">
                                <div class="list-table__content">
                                    <a href="{{route('show-cats-hotels', $value->name)}}">
                                        <h3>
                                            {{$value->name}}
                                            <div class="count">[{{$value->hotelCountry()->count()}}]</div>

                                        </h3>
                                    </a>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No countries yet</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
