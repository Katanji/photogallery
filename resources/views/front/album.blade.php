@extends ('layouts.master')

@section ('content')

<h1>Album: {{ $albumId->name }}</h1>
<h6>Created: {{ $albumId->created_at }}</h6>
<h4>Description: {{ $albumId->description }}</h4>

<ul id="sortable">  
    @foreach ($photos as $photo)
        <li class="ui-state-default" id="item_{{ $photo->id }}"><a  href="/images/{{ $photo->file }}" class="item"><img src="/public/images/{{ $photo->file }}"></a></li>
    @endforeach
</ul>

@endsection