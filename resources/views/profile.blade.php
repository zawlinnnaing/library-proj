@extends('layout')
@section('title')
 @component('title') {{ $user->name }} @endcomponent 
@endsection
 @section('content')
<div class="profile-img card">
    <h1 class="title">{{ $user->name }}<br>
    	<h1 class="subtitle">Email: {{ $user->email }}<br>
    		Expired Date: {{ $user-> expired_date }}
    	</h1>
    </h1>
</div>
<div class="container">
    @if($user->checkExpiredDate())
    <p class="message is-danger">Library card has expired !</p>
    @elseif($date_diff
    < 10 && $date_diff> 0)
        <p class="message is-warning">Library card will expire at {{ ++ $date_diff }} day(s)</p>
        @endif
        <div class="issue_books card">
            <h1 class="title">Check out information </h1>
            <hr> @if(!($user->books->isEmpty()))
            <table class="table">
                <thead>
                    <td>Book title</td>
                    <td>Check out date</td>
                    <td>Due date</td>
                </thead>
                <tbody>
                    @foreach($user->books as $index)
                    <tr>
                        <td>{{ ucwords($index->title) }}</td>
                        <td>{{ $index->pivot->issue_date }}</td>
                        <td>{{ $index->pivot->return_date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <h1 class="title null-msg">No check out book , yet</h1> @endif
        </div>
        <div class="card">
            <h1 class="title">Reservations</h1>
            <hr> @if(!($user->reservation->isEmpty()))
            <table class="table">
                <thead>
                    <td>Book title</td>
                    <td>Reserved Date</td>
                </thead>
                <tbody>
                    @foreach($user->reservation as $index)
                    <tr>
                        <td>{{ $index->book->title }}</td>
                        <td>{{ $index->reserved_time }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="title null-msg">No reservation ,yet</p>
            @endif
        </div>
</div>
@endsection @section('style')
<style type="text/css">
.profile-img {
    width: 100%;
    background: linear-gradient(rgba(42, 42, 42, .5),
    rgba(42, 42, 42, .5)),
    url('{{ asset("bg-img.jpg") }}');
    background-size: cover;
    background-position-y: center;
    height: 50vh;
    position: relative;
}

.profile-img h1 {
    color: #f5f5f5;
    padding: 0 1em;
    font-family: 'Josefin Sans', sans-serif;
    margin: 0;
}

.profile-img h1.subtitle {
    position: absolute;
    bottom: 0;
    left: 0;
    font-size: 20px !important;
    font-weight: lighter;
}

.profile-img h1.title {
    text-align: center;
    vertical-align: middle;
    line-height: 45vh;
    font-size: 2.5em;
}

p.message {
    text-align: center;
    font-size: 1.2em;
}

p.is-danger {
    color: #FF5722;
}

p.is-warning {
    color: #F9A825;
}

.issue_books {
    margin: 2em 0;
}

.card {
    padding: 2em;
}

.null-msg {
    text-align: center;
    margin: 2em 0;
    color: #BDBDBD;
}
</style>
@endsection 