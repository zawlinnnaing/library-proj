<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.6.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.0/css/bulma.min.css" integrity="sha256-HEtF7HLJZSC3Le1HcsWbz1hDYFPZCqDhZa9QsCgVUdw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}"> {{--Materialize css--}} {{-- searchAuto complete--}}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    {{--
    <link href="{{ asset('css/jquery-ui.min.css') }}">--}} {{--
    <link href="{{ asset('css/jquery-ui.theme.min.css') }}">--}}
    <style rel="stylesheet">
    nav {
        margin-bottom: 1em;
    }

    .navbar-burger:hover {
        background-color: inherit;
    }
    </style>
    @yield('style')
</head>

<body>
    {{-- Nav bar for mobile--}}
    <nav id="menu" class="menu">
        <section class="menu-section">
            <ul class="menu-section-list">
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('admin.change_password_form') }}">Change password(Admin)</a></li>
            </ul>
        </section>
    </nav>
    <div id="panel">
        <nav class="navbar" role="navigation" aria-label="main navigation" id="panel">
            <div class="navbar-brand">
                <a class="navbar-item">
                Library Admin
            </a>
                <div class="navbar-burger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="navbar-menu">
                <!-- navbar-start, navbar-end... -->
                <div class="navbar-start">
                    <a class="navbar-item" href="/">
                    Home
                </a>
                    <a class="navbar-item" href="{{ route('admin.change_password_form') }}">Change password (Admin)</a>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="columns">
                @include('admin.sidebar') @yield('content')
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/slideout.js') }}"></script>
    <script type="text/javascript">
    function userResult(ui) {
        window.location.href = '/admin/edit_user/' + ui.item.id;
    }

    function bookResult(ui) {
        window.location.href = '/admin/edit_book/' + ui.item.id;
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
    //    //
    //        document.querySelector('.menu').addEventListener('click', function(eve) {
    //            if (eve.target.nodeName === 'A') { slideout.close(); }
    //        });
    </script>
    @yield('script')
</body>

</html>