@extends ('layouts.master')

@section ('content')

<h1>Album: {{ $album->name }}</h1>
<h6>Created: {{ $album->created_at }}</h6>
<h4>Description: {{ $album->description }}</h4>

<ul id="sortable">  
    @foreach ($photos as $photo)
        <li class="ui-state-default" id="item_{{ $photo->id }}"><a  href="/images/{{ $photo->file }}" class="item"><img src="{{asset('images/'.$photo->file)}}"></a></li>
    @endforeach
</ul>

@endsection