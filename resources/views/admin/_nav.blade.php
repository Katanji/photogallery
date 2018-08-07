<div class="blog-masthead">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">

            <ul class="nav navbar-nav navbar">
                <li><a href="{{ url('/admin')  }}"><span class="glyphicon glyphicon glyphicon-th"></span> Albums</a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar">
                <li><a href="{{ route('admin.albums.create') }}"><span class="glyphicon glyphicon-plus"></span> Add
                        Album</a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar">
                <li><a href="{{ route('admin.users.index') }}"><span class="glyphicon glyphicon-user"></span> Users</a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a><span class="glyphicon glyphicon-user"></span> {{ ucfirst(Auth::user()->name) }}</a></li>
                <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Log Out</a>
                </li>
            </ul>

        </div>
    </nav>
</div>