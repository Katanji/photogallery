@extends ('layouts.master')

@section ('content')

    {{--<ul id="sortable">--}}
        {{--@foreach ($albums as $album)--}}
            {{--<a href="{{ url("front/album/$album->id") }}">--}}
                {{--<li class="ui-state-default">--}}
                    {{--@foreach ($photos as $photo)--}}
                        {{--@if ($album->id == $photo->album_id)--}}
                            {{--<img src="{{asset('images/'.$photo->file)}}"><br>--}}
                            {{--@break--}}
                            {{--{{ $album->name }}--}}
                        {{--@endif--}}
                    {{--@endforeach--}}
                {{--</li>--}}
            {{--</a>--}}
        {{--@endforeach--}}
    {{--</ul>--}}

    <div class="container-fluid">
        <div class="row" id="sortable">
            @foreach ($albums as $album)
                <div class="ui-state col-md-4 col-xs-4" id="item_{{ $album->id }}">
                    <a class="pictLink" href="{{ url("front/album/$album->id")  }}">
                        <img class="photo img-responsive"
                             src="{{ $album->avatar === null ? asset('images/1533110727.jpg') : asset('images/'.$album->avatar) }}">
                        <div class="h5 pic-name"> {{ $album->name }} </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div style="clear:both">
        {{ $albums->links() }}
    </div>
@endsection