@extends ('admin.index')

@section ('content')

    <ul id="sortable">
        @foreach ($albums as $album)
            <li class="ui-state-default" id="item_{{ $album->id }}"><a
                        href="{{ url("/admin/album/$album->id")  }}">{{ $album->name }}</a></li>
        @endforeach
    </ul>

@endsection