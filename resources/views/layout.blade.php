<!DOCTYPE html>
<html>

<head>
    @yield('title')
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="shortcut icon" href="{{ asset('mtu_VRn_icon.ico') }}" />
    <link crossorigin="anonymous" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.6.0 -->
    <link crossorigin="anonymous" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.0/css/bulma.min.css" integrity="sha256-HEtF7HLJZSC3Le1HcsWbz1hDYFPZCqDhZa9QsCgVUdw=" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js">
    </script>
    <style rel="stylesheet">
    .navbar-burger span {
        background-color: #f5f5f5;
    }

    a.navbar-item.is-active {
        color: white;
        border-bottom: 3px solid #e0e0e0;
    }

    a.navbar-item.is-active:hover {
        color: black;
        /*        border-bottom: 3px solid #212121;
*/
    }
    </style>
    @yield('style')
    </link>
    </link>
    </link>
    </meta>
    </meta>
    </meta>
</head>

</html>

<body>
    @yield('welcome')
    <!-- Navbar for mobile -->
    <nav class="menu" id="menu">
        <section class="menu-section">
            <ul class="menu-section-list">
                <li>
                    <div class="field" style="margin-bottom: 0;">
                        <div class="control has-icons-left">
                            <input class="input book" placeholder="Search a book" type="text">
                            <span class="icon is-small is-left">
                                        <i class="fa fa-search">
                                        </i>
                                    </span>
                            </input>
                        </div>
                    </div>
                </li>
                <li>
                    <a href=" /categories/0">
                        Explore
                        </a>
                </li>
                <li>
                    <a href="/about">
                        About
                    </a>
                </li>
                @guest
                <li><a href="/login">Log in</li>
                    @else
                    <li>
                        Profile name: {{ Auth::user()->name }}
                    </li>
                      @if(Auth::user()->checkExpiredDate())
                      <li style="color: #F44336">Expired at: {{ Auth::user()->expired_date }}</li>
                         @endif
                        <li><a href="/profile">See profile</a></li>
                <li> <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                    <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                @endguest
            </ul>
        </section>
    </nav>
    <div id="panel">
        <nav aria-label="main navigation" class="navbar" role="navigation" id="nav-panel">
            <div class="navbar-brand">
                <a class="navbar-item" href="/#panel">
                        MTU Library
                    </a>
                <div class="navbar-burger">
                    <span>
                        </span>
                    <span>
                        </span>
                    <span>
                        </span>
                </div>
            </div>
            <div class="navbar-menu">
                <!-- navbar-start, navbar-end... -->
                <div class="navbar-end">
                    <!-- Book search box -->
                    <div class="field column navbar-item" style="margin-bottom: 0;">
                        <div class="control has-icons-left">
                            <input class="input book" placeholder="Search a book" type="text">
                            <span class="icon is-small is-left">
                                        <i class="fa fa-search">
                                        </i>
                                    </span>
                            </input>
                        </div>
                    </div>
                    <a class="navbar-item {{ Request::path() == '/categories/0'?'is-active':''}}" href="/categories/0">
                        Explore
                    </a>
                    <a class="navbar-item {{ Request::path() == 'about'?'is-active':'' }}" href="/about">
                        About
                    </a> @guest
                    <a class="navbar-item {{ Request::path() == route('login')? 'is-active':''}}" href="{{ route('login') }}">
                        Log in
                    </a> @else
                    <div class="navbar-item has-dropdown">
                        <a class="navbar-link">
                            {{ Auth::user()->name }}
                             @if(Auth::user()->checkExpiredDate())
                                 <i class="fa fa-bell" aria-hidden="true" style="color: #E53935; padding: 0 1em;"></i>
                            @endif
                        </a>
                        <div class="navbar-dropdown">
                            @if(Auth::user()->checkExpiredDate())
                            <li class="navbar-item" style="color: #F44336">
                                Expired at: {{ Auth::user()->expired_date }}
                            </li>
                            @endif
                            <li class="navbar-item"><a href="/profile">
                                See profile</a>
                            </li>
                            <li class="navbar-item">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </div>
                    </div>
                    @endguest
                </div>
            </div>
        </nav>
        @yield('content') @include('footer')
    </div>
</body>
<script crossorigin="anonymous" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" src="https://code.jquery.com/jquery-3.2.1.min.js">
</script>
<script crossorigin="anonymous" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js">
</script>
<script src="{{ asset('js/script.js') }}" type="text/javascript">
</script>
<script src="{{ asset('js/slideout.js') }}" type="text/javascript">
</script>
<script type="text/javascript">
function bookResult(ui) {
    window.location.href = '/detail/' + ui.item.id;
}

var slideout = new Slideout({
    'panel': document.getElementById('panel'),
    'menu': document.getElementById('menu'),
    'side': 'right',
    'tolerance': 70

});

document.querySelector('.navbar-burger').addEventListener('click', function() {
    slideout.toggle();
});

$('.has-dropdown').click(function() {
    $(this).toggleClass('is-active');
})
</script>
@yield('script')