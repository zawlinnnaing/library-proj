@extends('admin.layout')
@section('content')
    <div class="column is-9">
        @include('admin.session_success_msg')
        <div class="columns">
            <div class="column is-6">
                <h1 class="title is-2">Books</h1>
            </div>
            {{--book search field --}}
            <div class="field column">
                <div class="control has-icons-left">
                    <input class="input book" type="text" placeholder="Search a book">
                    <span class="icon is-small is-left">
      <i class="fa fa-search"></i>
    </span>
                </div>
            </div>

        </div>
        @foreach($books as $book)
            <div class="columns">
                <div class="column">
                    <p class="subtitle">Title:</p>
                    <p>{{ ucfirst($book->title) }}</p>
                </div>
                <div class="column">
                    <p class="subtitle">Author:</p>
                    <p>{{ ucfirst($book->author) }}</p>
                </div>
                <div class="column col-btns">
                    <a class="button is-primary" href="{{ route('admin.edit_book',$book->id) }}">Edit</a>
                    <a class="button is-danger" href="{{route('admin.delete_book',$book->id)}}">Delete</a>
                </div>
            </div>
        @endforeach
        {{ $books->links() }}
    </div>
@endsection
@section('style')
    <style rel="stylesheet" type="text/css">
        .columns {
            border-bottom: 1px solid #bdbdbd;
        }

        .col-btns {
            padding: 2rem !important;
        }

        .col-btns a {
            margin: 0 0.5rem;
            width: 100px;
            color: #ffffff !important;
        }
        .field{
            padding-top: 1em;
        }
        h1.title{
            margin-top: 0 !important;
        }
        .subtitle{
            font-weight: bolder;
            color: #757575;
        }
    </style>
@endsection