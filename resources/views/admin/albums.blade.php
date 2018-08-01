@extends ('admin.index')

@section ('content')

    <div class="container-fluid">
        <div class="row" id="sortable">
            @foreach ($albums as $album)
                <div class="ui-state col-md-4 col-xs-4" id="item_{{ $album->id }}">
                    <a class="pictLink" href="{{ url("/admin/album/$album->id")  }}">
                        <img class="photo img-responsive"
                             src="{{ $album->avatar === null ? asset('images/1533110727.jpg') : asset('images/'.$album->avatar) }}">
                        <div class="h5 pic-name"> {{ $album->name }} </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection