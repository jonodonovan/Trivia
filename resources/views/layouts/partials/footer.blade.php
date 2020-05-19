<div class="container">
    <div class="row">
        <div class="col-md-12">
            @guest

            @else
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <i>{{ __('logout') }}</i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </div>
    </div>
</div>
