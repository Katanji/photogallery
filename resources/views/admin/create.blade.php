@extends ('admin.index')

@section ('content')

    <h1>Create an album</h1>

    <hr>

    <form method="POST" action="/create">
    {{ csrf_field() }}
    
    <div class="form-group">
        <label for="name">Title:</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    
    <div class="form-group">
        <label for="description">Body:</label>
        <textarea id="description" name="description" class="form-control"></textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Publish</button>
    
    @include ('layouts.errors')
</form>

@endsection