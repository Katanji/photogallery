<div class="blog-masthead">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">

            @if (Auth::check())
                @if (Auth::user()->email == 'admin@admin.com')

                    <ul class="nav navbar-nav navbar">
                        <li><a href="{{ url('/admin')  }}"><span class="glyphicon glyphicon glyphicon-th"></span> Albums</a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar">
                        <li><a href="{{ url('/create') }}"><span class="glyphicon glyphicon-plus"></span> Add Album</a>
                        </li>
                    </ul>

                @else

                    <ul class="nav navbar-nav navbar">
                        <li><a href="{{ url('/')  }}"><span class="glyphicon glyphicon glyphicon-th"></span> Albums</a>
                        </li>
                    </ul>

                @endif

                <ul class="nav navbar-nav navbar-right">
                    <li><a><span class="glyphicon glyphicon-user"></span> {{ ucfirst(Auth::user()->name) }}</a></li>
                    <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Log Out</a>
                    </li>
                </ul>

            @else

                <ul class="nav navbar-nav navbar">
                    <li><a href="{{ url('/') }}"><span class="glyphicon glyphicon glyphicon-th"></span>
                            Albums</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span>
                            Login</a></li>
                </ul>

            @endif

        </div>
    </nav>
</div>