@extends ('layouts.master')

@section ('content')

    <ul id="sortable">
        @foreach ($albums as $album)
            <a href="{{ url("front/album/$album->id") }}">
                <li class="ui-state-default">
                    @foreach ($photos as $photo)
                        @if ($album->id == $photo->album_id)
                            <img src="{{asset('images/'.$photo->file)}}"><br>
                            @break
                        @endif
                    @endforeach
                    {{ $album->name }}
                </li>
            </a>
        @endforeach
    </ul>

    <div style="clear:both">
        {{ $albums->links() }}
    </div>
@endsection