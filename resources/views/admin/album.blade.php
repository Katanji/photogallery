<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>photogallery</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            #sortable { list-style-type: none; margin: 0; padding: 0;  }
            #sortable li { margin: 3px 3px 3px 0; padding: 1px; float: left; width: 304px; height: 203px; text-align: center; }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $(function() {    
                $('#sortable').sortable({
                    update: function(event, ui) {
                        
                        var postData = $(this).sortable('serialize');
                        console.log(postData);
                        
                        $.post('/savePhotoOrder', {list: postData}, function(o) {
                            console.log(o);
                        });
                    }
                });
            });
        </script>
    </head>
    <body>
        
        @include ('layouts.nav')
        
        <div class="container">
            <h1>Album: {{ $album->name }}</h1>
            <a href="{{ url("admin/add_photos/$album->id") }}" class="button--style-red">Add photos</a>
            
            <ul id="sortable">  
                @foreach ($photos as $photo)
                <li class="ui-state-default" id="item_{{ $photo->id }}"><img src="{{asset('images/'.$photo->file)}}"></li>
                @endforeach
            </ul>
        </div>   
        
    </body>
</html>

