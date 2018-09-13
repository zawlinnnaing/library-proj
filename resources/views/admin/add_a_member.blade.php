@extends('admin.layout')

@section('content')

    <div class="column is-9">
        <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('admin.insert_member') }}"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('stud_id') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Student ID</label>

                                <div class="col-md-6">
                                    <input id="stud_id" type="text" class="form-control" name="stud_id"
                                           value="{{ old('stud_id') }}" required autofocus>

                                    @if ($errors->has('stud_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('stud_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('roll_no') ? ' has-error' : '' }}">
                                <label for="roll_no" class="col-md-4 control-label">Roll No</label>

                                <div class="col-md-6">
                                    <input id="roll_no" type="text" class="form-control" name="roll_no" value="{{ old('roll_no') }}" required>

                                    @if ($errors->has('roll_no'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('roll_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('expired_date') ? ' has-error' : '' }}">
                                <label for="expired_date" class="col-md-4 control-label">Expired Date</label>

                                <div class="col-md-6">
                                    <input id="expired_date" type="date" class="form-control" name="expired_date"
                                           value="{{ old('expired_date') }}" required>

                                    @if ($errors->has('expired_date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('expired_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4">Image</label>
                                <div class="col-md-6">
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('major') ? ' has-error' : '' }}">
                                <label for="major" class="col-md-4 control-label">Major</label>

                                <div class="col-md-6">
                                    <select name="major">
                                        <option value="Cvil Engineering">Cvil Engineering</option>
                                        <option value="Mechanical Engineering">Mechanical Engineering</option>
                                        <option value="Mechatronics">Mechatronics</option>
                                        <option value="Architecture">Architecture</option>
                                        <option value="Information Technology">Information Technology</option>
                                        <option value="Electronic Engineering">Electronic Engineering</option>
                                        <option value="Electrical Power">Electrical Power</option>
                                        <option value="Chemical Engineering">Chemical Engineering</option>
                                        <option value="BioTech">BioTech</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('year')?'has-error':'' }}">
                                <label for="year" class="col-md-4 control-label">Year</label>
                                <div class="col-md-6">
                                    <select name="year">
                                        <option value="1st year">First Year</option>
                                        <option value="2nd year">Second Year</option>
                                        <option value="3rd year">Third Year</option>
                                        <option value="4th year">Forth Year</option>
                                        <option value="5th year">Fifth year</option>
                                        <option value="final year">Final Year</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
@endsection
