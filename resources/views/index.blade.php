@extends('layout') 
@component('title') MTU Library @endcomponent
@section('welcome')@include('welcome')
@endsection
@section('content')
    <div class="container">
        <div class="latest-books">
            <h1 class="title headings">
                Latest Arrivals
            </h1>
            <div class="columns">
                @foreach($books as $book)
                    <div class="column img-col">
                        <div class="book">
                            <div class="thumbnail">
                                @if(empty($book->img_dir))
                                    <a href="{{ route('detail',['id' => $book->id]) }}"><img class="image" src="{{ asset('uploads/default-book.gif') }}"></a>
                                @else
                                    <a href="{{ route('detail',['id' => $book->id]) }}"><img class="image" src="{{ asset('uploads/'.$book->img_dir) }}"></a>                                @endif
                            </div>
                            <p class="caption">
                                <a class="caption-link" href="{{ route('detail',['id' => $book->id]) }}">
                                    {{ ucwords($book->title)}}
                                </a>
                                <br> By {{ ucwords($book->author) }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- Library Information --}}
        <div class="library-info card">
            <h1 class="headings subtitle is-3" style="padding: 1em; margin-bottom: 0 !important;
            justify-content: flex-start;
        ">
                <i class="fa fa-info-circle" aria-hidden="true" style="padding: 0.2em 0.5em;"></i>
                Library Information
            </h1>
            <div class="card-content">
                <div class="columns">
                    <div class="column">
                        <p>Opening Hours</p>
                        <p>9am - 4pm</p>
                        <p>Email: <a>blabla@gmail.com</a></p>
                    </div>
                    <div class="column">
                        <p class="title is-5" style="margin-bottom: 0 !important;">Archives</p>
                        <ul>
                            <li><a href="{{ route('archives','References') }}">References</a></li>
                            <li><a href="{{ route('archives','Thesis') }}">Thesis</a></li>
                            <li><a href="{{ route('archives','Old-questions') }}">Old questions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="library-news">
        <h1 class="title">Library News</h1>
        <div class="columns">
            <div class="column news">
                <h1>News Title</h1>
                <span class="date">November 27,2017</span>
                <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum.</h5>
            </div>
            <div class="column news">
                <h1>News Title</h1>
                <span class="date">November 27,2017</span>
                <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum.</h5>
            </div>
            <div class="column news">
                <h1>News Title</h1>
                <span class="date">November 27,2017</span>
                <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum.</h5>
            </div>
        </div>
    </div>
@endsection @section('style')
    <style type="text/css">
        h1.headings {
            border-bottom: 1px solid #BDBDBD;
            display: flex;
            justify-content: space-between;
            color: #424242 !important;
        }

        h1.headings a {
            font-size: medium !important;
            padding-top: 1em;
        }

        .image {
            max-width: 250px;
            height: 250px !important;
        }

        @media only screen and (max-width: 600px) {
            .image {
                max-width: 180px;
                height: 400px !important;
            }
        }

        .img-col {
            display: flex;
        }

        .thumbnail {
            margin: 0 !important;
        }

        .book {
            display: block;
            margin: 0 auto;
        }

        .caption {
            text-align: center;
            margin: 0 !important;
        }

        .card {
            background-color: #757575;
            color: #eeeeee !important;
        }

        .card h1.headings,
        .card .title {
            color: #eeeeee !important;
        }

        .card a {
            color: #B3E5FC;
        }

        .library-news {
            background: linear-gradient(rgba(0, 0, 0, .5),
            rgba(0, 0, 0, .5)),
            url('{{ asset('bg-img.jpg') }}');
            background-size: cover;
            background-position: top center;
            padding: 2em 0;

        }

        .library-news h1.title {
            font-size: 3em;
            font-family: 'Josefin Sans', sans-serif;
            color: white;
            text-align: center;
        }

        .news {
            color: white;
            padding: 0 2em;
        }
        .latest-books{
            margin-bottom: 2em;
        }
        .thumbnail {
            transition:all ease 0.3s;
        }
        .thumbnail:hover{
            /*box-shadow: 3px 3px 1px 2px #B3E5FC;*/
            background-color: #B3E5FC;
            /*padding: 6px;*/
        }
        #panel{
            overflow: scroll;
        }
        .slideout-panel{
            height: 100vh;
        }
    </style>
    @endsection @section('script')
    <script type="text/javascript">
          </script>
     @endsection
    </div>