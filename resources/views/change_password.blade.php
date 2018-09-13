@extends('layout')
@section('content')
    <div class="row">
        <div class="container">
            @include('admin.session_success_msg');
            <div class="col-md-8">
                <div class="heading">
                    Change Password
                </div>
                <div class="panel-body">
                    <form action="{{ route('change_password') }}" class="form-horizontal"
                          method="POST">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label" for="password">
                                Old Password
                            </label>
                            <div class="col-md-6">
                                <input class="form-control" name="old_password" required
                                       type="password">
                                @if ($errors->has('old_password'))
                                    <span class="help-block">
                                <strong>
                                    {{ $errors->first('old_password') }}
                                </strong>
                            </span>
                                    @endif
                                    </input>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label" for="password">
                                New Password
                            </label>
                            <div class="col-md-6">
                                <input class="form-control" name="password" required
                                       type="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                <strong>
                                    {{ $errors->first('password') }}
                                </strong>
                            </span>
                                    @endif
                                    </input>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="password-confirm">
                                Confirm Password
                            </label>
                            <div class="col-md-6">
                                <input class="form-control" name="password_confirmation"
                                       required type="password">
                                </input>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button class="btn btn-primary" type="submit">
                                    Change Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('style')
    <style type="text/css">
        .heading {
            text-align: center;
            padding: 1em;
            margin: 0 !important;
        }
        div.col-md-8{
            padding: 0;
        }
        #panel {
            overflow: hidden;
            height: 100vh;
        }

        @media screen and (min-width: 769px) {
            .footer {
                position: absolute;
                bottom: 0;
                right: 0;
                left: 0;
            }
        }
    </style>
@endsection
