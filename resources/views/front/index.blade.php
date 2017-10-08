@extends ('layouts.master')

@section ('content')

<ul id="sortable">  
    @foreach ($albums as $album)
    <a href="http://photogallery.katanji.tk/front/album/{{ $album->name }}">
        <li class="ui-state-default">
            @foreach ($photos as $photo)
                @if ($album->id == $photo->album_id)
                    <img src="/public/images/{{ $photo->file }}"><br>
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