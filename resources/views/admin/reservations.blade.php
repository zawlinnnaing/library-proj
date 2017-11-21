@extends('admin.layout')
@section('content')
    <div class="column is-9">
        <section class="hero is-info welcome is-small">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Reservations
                    </h1>
                    @if(Session::has('success_message'))
                        <h1 class="subtitle">{{ Session::get('success_message') }}}</h1>
                    @endif
                </div>
            </div>
        </section>
        @if($reservations->isEmpty())
            <div class="notification is-primary title is-5">There is no reservation , yet .</div>
        @else

            <div class="reservation_list">
                <table class="table">
                    <thead>
                    <th>Book Title:</th>
                    <th>Reserved By:</th>
                    <th>Reserved Time:</th>
                    </thead>
                    <tbody>
                    @foreach($reservations as $reservation)
                        <tr>
                        <td>{{ $reservation->book->title}}</td>
                        <td>{{ $reservation->user->name }}</td>
                        <td>{{ $reservation->reserved_time }}</td>
                        <td><a class="button is-danger" href="{{ route('admin.delete_reservation',$reservation->id) }}">Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
@section('style')
    <style rel="stylesheet" type="text/css">
         h1.mes {
            color: #9e9e9e;
             margin-top: 5rem;
        }
    </style>
@endsection