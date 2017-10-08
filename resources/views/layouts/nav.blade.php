<div class="blog-masthead">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            
            @if (Auth::check())            
                <ul class="nav navbar-nav navbar">
                    <li><a href="http://photogallery.katanji.tk/admin"><span class="glyphicon glyphicon glyphicon-th"></span> Albums</a></li>
                </ul>
                <ul class="nav navbar-nav navbar">
                    <li><a href="http://photogallery.katanji.tk/create"><span class="glyphicon glyphicon-plus"></span> Add album</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }}</a></li>
                    <li><a href="http://photogallery.katanji.tk/logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
                </ul>
            @else
                <ul class="nav navbar-nav navbar">
                    <li><a href="http://photogallery.katanji.tk"><span class="glyphicon glyphicon glyphicon-th"></span> Albums</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="http://photogallery.katanji.tk/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            @endif
            
        </div>
    </nav>
</div>