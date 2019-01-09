@extends ('admin.index')

@section ('content')

    <div class="container-fluid">
        <div class="row" id="sortable">
            @foreach ($albums as $album)
                <div class="ui-state col-md-4 col-xs-4" id="item_{{ $album->id }}">
                    <a class="pictLink" href="{{ url("/admin/albums/$album->id/edit")  }}">
                        @if (!is_null($album->avatar))
                            <img class="photo img-responsive" src="{{ asset('images/'.$album->avatar) }}">
                        @endif
                            <div class="h5 pic-name"> {{ $album->name }} </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection