<nav class="navbar navbar-expand-md navbar-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        <div class="navbar" id="navbarSupportedContent">
            <ul class="navbar-nav ">

                @guest

                @else
                    <li class="nav-item">
                        {{ Auth::user()->name }}
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>