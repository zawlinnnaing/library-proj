@extends('admin.layout')
 @section('content')
<div class="column is-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            Change Password
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.change_password') }}" class="form-horizontal" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label" for="password">
                        Old Password
                    </label>
                    <div class="col-md-6">
                        <input class="form-control" id="password" name="old_password" required="" type="password">
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
                        <input class="form-control" id="password" name="password" required="" type="password">
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
                        <input class="form-control" id="password-confirm" name="password_confirmation" required="" type="password">
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
@endsection
