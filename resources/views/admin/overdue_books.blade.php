@extends('admin.layout')
@section('content')

    <div class="column is-9">

        <section class="hero is-info welcome is-small">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Overdue Books
                    </h1>
                </div>
            </div>
        </section>
        <div class="no_overdue message is-primary">There is no overdue book , yet .</div>
        <div class="overdue_books_list">
            <table class="table">
                <thead class="table_head">
                <th>Book Title</th>
                <th>Patron 's Name</th>
                <th> Checked out date</th>
                <th> Due date</th>
                </thead>
                <tbody>

                @foreach($books as $book)
                    @foreach ($book->users as $index)
                        @if( $index->pivot->return_date < date('Y-m-d'))
                            <script type="text/javascript">
                                $('.no_overdue').hide();
                            </script>
                            <tr>
                                <td> {{ $book->title }}</td>
                                <td>{{ $index->name }}</td>
                                <td>{{ $index->pivot->issue_date }}</td>
                                <td> {{ $index->pivot->return_date }}</td>
                                <td><a class="button is-danger"
                                       href="/admin/delete_overdue/{{$index->pivot->book_id}}/{{ $index->pivot->user_id }}">Delete</a>
                                </td>
                            </tr>

                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        if ($('.no_overdue').is(':hidden')) {
            $('.table_head').show();
        }else {
            $('.table_head').hide();
        }
    </script>
@endsection
@section('style')
    <style>
        .no_overdue{
            font-size: larger;
        }
    </style>
    @endsection

