<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/magnific-popup.css">
        <style>
            #sortable { list-style-type: none; margin: 0; padding: 0;  }
            #sortable li { margin: 3px 3px 3px 0; padding: 1px; float: left; width: 30%; height: 10%; text-align: center; }
            img {width: 100%;}
        </style>       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="/js/jquery.magnific-popup.min.js"></script>
        <script src="/js/common.js"></script>
        <title>Photogallery</title>
    </head>
    
    <body>
        
        @include ('layouts.nav')
        
        <div class="container">
            @yield ('content')
        </div>
        
    </body>
</html>