@extends('admin.layout')
@section('content')
    <div class="column is-9">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update a user</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="/admin/update_user/{{ $user->id }}"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group" style="margin-top: 20px;">
                                <div class="col-md-4">
                                    @if(empty($user->img_dir))
                                        <img src="{{ asset('profiles/default_profile.png') }}" class="image is-128x128">
                                    @else
                                        <img src="{{asset('profiles/'.$user->img_dir)}}" class="image is-128x128">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ ucwords($user->name) }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('stud_id') ? ' has-error' : '' }}">
                                <label for="stud_id" class="col-md-4 control-label">Expired Date</label>

                                <div class="col-md-6">
                                    <input id="expired_date" type="date" class="form-control" name="expired_date"
                                           value="{{ $user->expired_date }}" required autofocus>

                                    @if ($errors->has('expired_date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('expired_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" hidden>--}}
                            {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                            {{--<div class="col-md-6">--}}
                            {{--<input id="email" type="email" class="form-control" name="email"--}}
                            {{--value="{{ $user->email }}" required>--}}

                            {{--@if ($errors->has('email'))--}}
                            {{--<span class="help-block">--}}
                            {{--<strong>{{ $errors->first('email') }}</strong>--}}
                            {{--</span>--}}
                            {{--@endif--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                            {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                            {{--<div class="col-md-6">--}}
                            {{--<input id="password" type="password" class="form-control" name="password" required>--}}

                            {{--@if ($errors->has('password'))--}}
                            {{--<span class="help-block">--}}
                            {{--<strong>{{ $errors->first('password') }}</strong>--}}
                            {{--</span>--}}
                            {{--@endif--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group{{ $errors->has('roll_no') ? ' has-error' : '' }}">
                                <label for="roll_no" class="col-md-4 control-label">Roll No</label>

                                <div class="col-md-6">
                                    <input id="roll_no" type="text" class="form-control" name="roll_no"
                                           value="{{ $user->roll_no }}" required>

                                    @if ($errors->has('roll_no'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('roll_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            {{--<div class="form-group">--}}
                            {{--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}

                            {{--<div class="col-md-6">--}}
                            {{--<input id="password-confirm" type="password" class="form-control"--}}
                            {{--name="password_confirmation" required>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            @if(empty($user->img_dir))
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                </div>
                            @endif

                            <div class="form-group{{ $errors->has('major') ? ' has-error' : '' }}">
                                <label for="major" class="col-md-4 control-label">Major</label>

                                <div class="col-md-6">
                                    <select name="major" id="major">
                                        <option value="Cvil Engineering">Cvil Engineering</option>
                                        <option value="Mechanical Engineering">Mechanical Engineering</option>
                                        <option value="Mechatronic">Mechatronic</option>
                                        <option value="Architeture">Architeture</option>
                                        <option value="Information Technology">Information Technology</option>
                                        <option value="Electronic Engineering">Electronic Engineering</option>
                                        <option value="Electrial Power">Electrical Power</option>
                                        <option value="Chemical Engineering">Chemical Engineering</option>
                                        <option value="BioTech">BioTech</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('year')?'has-error':'' }}">
                                <label for="year" class="col-md-4 control-label">Year</label>
                                <div class="col-md-6">
                                    <select name="year" id="year">
                                        <option value="1st year">First Year</option>
                                        <option value="2nd year">Second Year</option>
                                        <option value="3rd year">Third Year</option>
                                        <option value="4th year">Forth Year</option>
                                        <option value="5th year">Fifth year</option>
                                        <option value="final year">Final Year</option>
                                    </select>
                                </div>
                            </div>

                            <div class="issue_list tile is-ancestor is-vertical">
                                <h1 class="title is-4">Check out information</h1>
                                <hr>
                                @if($user->books->isEmpty())
                                    <p class="subtitle">There is no lent book for this user.</p>
                                @else
                                    <div class="tile is-parent is-vertical">
                                        @foreach($user->books as $index)
                                            <div class="tile is-vertical child">
                                                <p>Book title: {{ ucwords($index->title) }}</p>
                                                <p>Check out date: {{ $index->pivot->issue_date }}</p>
                                                <p>Due date: {{ $index->pivot->return_date }}</p>
                                                <a class="button is-danger"
                                                   href="/admin/delete_overdue/{{$index->pivot->book_id}}/{{ $index->pivot->user_id }}">Delete</a>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        document.getElementById('major').value = "{{ $user->major }}";
        document.getElementById('year').value = "{{ $user->year }}";
        //        $(document).ready(function () {
        //            $("input[type = file]").on('change',function () {
        //               $('.file-name').text($(this).val());
        //            });
        //        });


    </script>
@endsection
@section('style')
    <style type="text/css">
        .title {
            margin: 0 !important;
        }

        .issue_list {
            margin: 2em 0 !important;
        }

        .is-parent {
            margin:0 0.5em !important;
            padding: 0 !important;
        }
        .child{
            background-color: #81D4FA;
            margin: 1em 0 !important;
            padding:1em !important;
            justify-content: center;
        }
        .child .is-danger{
            display: inline-block !important;
        }
        hr{
            margin: 0.5em 0 !important;
        }
        .is-danger{
            background-color: #ff5367 !important;
        }
    </style>
@endsection