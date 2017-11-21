@extends('admin.layout')
@section('content')
    <div class="column is-9">
        @include('admin.session_success_msg')
        {{--<div class="columns">--}}
            {{--<div class="column">--}}
            {{--</div>--}}
            <div class="field">
                <div class="control has-icons-left">
                    <input class="input" type="text" placeholder="Enter username" id="q">
                    <span class="icon is-small is-left"><i class="fa fa-search"></i></span>
                </div>
            </div>
        {{--</div>--}}
        @foreach($users as $user)
            <div class="columns users">
                <div class="column" style="overflow: hidden">
                    <figure>
                        @if(empty($user->img_dir))
                            <img src="{{ asset('profiles/default_profile.png') }}" class="image is-96x96">
                        @else
                            <img src="{{ asset('profiles/'.$user->img_dir) }}" class="image is-96x96">
                        @endif
                    </figure>
                </div>
                <div class="column">
                    <p class="label">Name:</p>
                    <p>{{ $user->name }}</p>
                </div>
                <div class="column">
                    <p class="label">Roll No: </p>
                    <p>{{ $user->roll_no }}</p>
                </div>
                <div class="column">
                    <p class="label">Major:</p>
                    <p>{{ $user->major }}</p>
                </div>
                <div class="column">
                    <p class="label">Year:</p>
                    <p>{{ $user->year }}</p>
                </div>
                <div class="column">
                    <a class="button is-primary" href="/admin/edit_user/{{$user->id}}">Edit</a><br
                            class="is-hidden-mobile">
                    <a class="button is-danger" href="/admin/delete_user/{{ $user->id }}">Delete</a>
                </div>
            </div>
        @endforeach
        {{ $users->links() }}
    </div>
@endsection
@section('style')
    <style rel="stylesheet" type="text/css">
        .users:hover {
            background-color: #B3E5FC;
        }

        .users {
            border-bottom: 1px solid gray;
        }

        .users .column p {
            margin: auto;
        }

        .image {
            /*border-radius: 50%;*/
        }

        .column .button {
            width: 100px;
            margin: 8px 0;
            color: white !important;
        }

        .column .label {
            color: #9e9e9e;
            font-weight: 400;
        }
        .field{
            display: flex;
            justify-content: flex-end;
            margin-bottom: 3em !important;
        }
    </style>
@endsection
