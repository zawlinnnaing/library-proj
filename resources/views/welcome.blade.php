  
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="{{ asset('mtu_VRn_icon.ico') }}" />

    <!-- Styles -->
    <style>
    @import url('https://fonts.googleapis.com/css?family=Lobster');
    body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Aerial', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
        overflow: hidden;
    }
    .welcome {
        background: linear-gradient( rgba(0, 0, 0, .5),
        rgba(0, 0, 0, .5)),
        url('{{ asset('library-image.jpg') }}');
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh;
        background-size: cover;
        min-width: 100%;
    }
    .welcome-msg{
        color: white !important;
        font-family: 'Lobster', cursive;
        font-size: 4em !important;
        text-align: center;
    }
    .hero-body{
        margin-top: 0%;
    }
    .logo{
        margin: 0 auto !important;
        display: block;
        height: auto;
    }
    .welcome-quote{
        text-align: center;
        color: white !important;
        font-weight: bold !important;
        margin: 10% 0 !important;
        font-size: 1.5em !important;
    }
    .explore-btn{
        font-size: 3em;
        color: white;
        text-align: center;
        display: block;
    }
    .explore-msg{
        text-align: center;
        color: white;
    }
    .explore-part{
        position: absolute;
        bottom: 5%;
        display: block;
        left: 0;
        right: 0;
        margin: 0 auto;        
    }
    #explore-icon{
        color: white !important;
    }
    </style>
    <div class="welcome">
        <div class="hero library-msg">
            <div class="hero-body">
                <img src="{{ asset('MTU.png') }}" class="logo">
                <h1 class="title welcome-msg">MTU Library</h1>
                <h1 class="subtitle welcome-quote is-hidden-mobile">“I have always imagined that Paradise will be a kind of library.”<br>
                    ― Jorge Luis Borges
</h1>          <div class="explore-part is-mobile">
                <p class="explore-msg">Explore our libray</p>
                <div class="explore-btn">
                    <a href="#panel" id="explore-icon"><i class="fa fa-angle-double-down" aria-hidden="true"></i></a>
                </div>
            </div>
            </div>
        </div>
    </div>
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js">
    </script>

        <script type="text/javascript">
        $('#explore-icon').click(function (e) {
            e.preventDefault();
            $('#').css('overflow','scroll');
            // body...
            $('body').animate({
                scrollTop: $($(this).attr('href')).offset().top
            },500,function(){
                $('.welcome').hide();
            });
            return false;
        });
            </script>
