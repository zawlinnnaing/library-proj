@extends('layout') @component('title') {{ $book->title .'-MTU Library'}} @endcomponent @section('content')
    <div class="bg card">
        <h1>{{ ucwords($book->title) }}<br>
            <span>Author: {{ ucwords($book->author) }}</span>
        </h1>
    </div>
    <div class="container">
        <h1 class="title">
            Description
        </h1>
        <p>{{ $book->description }}</p>

        <div class="aditional-info">
            <h1 class="title">Additional Information
                <i class="fa fa-info-circle" aria-hidden="true" style="padding: 0.2em 0.5em;"></i>
            </h1>
            <hr>
            <table class="table">
                <tr>
                    <td>
                        <p>Stock Count:</p>
                    </td>
                    <td>
                        <p>{{ $book->stock_count }}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Availability</p>
                    </td>
                    @if($book->stock_count > 0)
                        <td>
                            <p><i class="fa fa-check-circle" aria-hidden="true" style="color: #00E676;"></i>
                            </p>
                        </td>
                    @else
                        <td>
                            <p><i class="fa fa-times" aria-hidden="true" style="color: #F44336"></i>
                            </p>
                        </td>
                    @endif
                </tr>
                <tr>
                    <td>
                        <p>Category</p>
                    </td>
                    <td>
                        <p>{{ $book->category->type }}</p>
                    </td>
                </tr>
                @if($book->category->type != "Others")
                    <tr>
                        <td>
                            <p>Major</p>
                        </td>
                        <td>
                            <p>{{ ucwords($book->category->major) }}</p>
                        </td>
                    </tr>
                @endif @if($book->category->type == 'Old question'|| $book->category->type =='Thesis')
                    <tr>
                        <td>
                            <P>Year</P>
                        </td>
                        <td>
                            <p>{{$book->category->year}}</p>
                        </td>
                    </tr>
                @endif
                <tr>
                    <td><p>Barcode</p></td>
                    <td>
                        <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($book->barcode_no,"C39") }}">
                    </td>
                </tr>
            </table>
        </div>

        <div class="reservation card column is-10">
            <h1 class="title">Reservation <i class="fa fa-shopping-cart" aria-hidden="true"
                                             style="padding: 0 0.5em"></i>
            </h1>
            @if(Auth::check() && !Session::has('msg') && $book->stock_count > 0)
                <form class="form" action="{{ route('reserve_book',['id' => $book->id]) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="field">
                        <label>Reserved Date:</label>
                        <input type="date" name="reserved_time">
                        @if ($errors->has('reserved_time'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('reserved_time') }}</strong>
                                    </span>
                        @endif
                        @if(!empty($checkoutTime = \App\GlobalHelper::instantiate()->checkOutTime($book->id)))
                            <span class="help-block"><strong>You must reserve after {{ $checkoutTime
                             }} (YYYY-MM-DD)</strong></span>
                            @php
                                unset($checkoutTime);
                            @endphp
                        @endif
                    </div>
                    <input type="submit" name="Submit" value="Reserve" class="button">
                </form>

            @elseif(Session::has('msg'))
                <div class="msg">
                    <h1 class="msg subtitle is-3">{{ Session::get('msg') }}</h1>
                </div>
            @else
                @if($book->stock_count > 0)
                    <h1 class="msg subtitle is-3">* Please log in to reserve book *</h1>
                @else
                    <h1 class="msg subtitle is-3" style="margin-top: 2em !important;">There is no book left</h1>
                @endif
            @endif
        </div>
    </div>
@endsection @section('style')
    <style type="text/css">
        .bg {
            width: 100%;
            background: linear-gradient(rgba(0, 0, 0, .5),
            rgba(0, 0, 0, .5)),
    @if(empty($book->img_dir)) url('{{ asset('uploads/default-book.gif') }}');
        @else    url('{{ asset("uploads/".$book->img_dir)}}   ');
            @endif    background-size: cover;
            background-position-y: center;
            height: 70vh;
            position: relative;
        }

        .bg h1 {
            color: white;
            position: absolute;
            bottom: 0;
            left: 0;
            padding: 0 1em;
            font-family: 'Josefin Sans', sans-serif;
            font-weight: bold;
        }

        .bg h1 span {
            font-size: 0.6em;
            font-weight: 500;
        }

        .container .title {
        }

        @media screen and (min-width: 700px) {
            .container {
                padding: 2em;
            }
        }

        @media screen and (max-width: 700px) {
            .bg {
                height: 50vh;
            }
        }

        .container div {
            margin: 2em 0;
        }

        .table td {
            border: 0px !important;
        }

        .table td img {
            width: 150px;
            height: auto;
        }

        .form label {
            padding-right: 1em;
        }

        .form {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .form input[type='submit'] {
            padding: 0 2em;
            margin-top: 2.5em;
            font-size: 12px;
            color: white;
            background-color: #039BE5;
        }

        .reservation {
            padding: 2em;
            background: #616161;
            margin: 2em 0 !important;
            display: block;
        }

        .reservation .title, label {
            color: white;
        }

        h1.msg {
            text-align: center;
            color: #ffffff;
        }

        div.msg {
            padding: 2em;
            background-color: #0277BD;
        }

        span.help-block strong {
            color: #EF5350 !important;
        }
    </style>
@endsection