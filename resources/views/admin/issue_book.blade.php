@extends('admin.layout') @section('content')
    <div class="column is-9">
        <div class="row">
            <div class="panel">
                <div class="panel-heading">Lend a book</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.lend_book')}}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('barcode_no') ? ' has-error' : '' }}">
                            <label for="barcode_no" class="col-md-4 control-label">Book Number</label>
                            <div class="col-md-6">
                                <input id="barcode_no" type="text" class="form-control" name="barcode_no" required
                                       autofocus placeholder="6-digit book number"> @if ($errors->has('barcode_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('barcode_no') }}</strong>
                                    </span> @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('stud_id') ? ' has-error' : '' }}">
                            <label for="stud_id" class="col-md-4 control-label">Student ID</label>
                            <div class="col-md-6">
                                <input id="stud_id" type="text" class="form-control" name="stud_id" required
                                       autofocus> @if ($errors->has('stud_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('stud_id') }}</strong>
                                    </span> @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('issue_date') ? ' has-error' : '' }}">
                            <label for="issue_date" class="col-md-4 control-label">Check out Date</label>
                            <div class="col-md-6">
                                <input id="issue_date" type="date" class="form-control" name="issue_date" required
                                       autofocus> @if ($errors->has('issue_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('issue_date') }}</strong>
                                    </span> @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('return_date') ? ' has-error' : '' }}">
                            <label for="return_date" class="col-md-4 control-label">Due Date</label>
                            <div class="col-md-6">
                                <input id="return_date" type="date" class="form-control" name="return_date" required
                                       autofocus> @if ($errors->has('return_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('return_date') }}</strong>
                                    </span> @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if(Session::has('message'))
            <article class="message is-info">
                <div class="message-header">
                    {{ Session::get('message') }}
                </div>
                <div class="message-body">
                    Book title:
                    @if(Session::has('book'))
                        {{ Session::get('book')}}
                    @else
                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Book not found.
                    @endif
                    <br>
                    User name:
                    @if(Session::has('user'))
                        {{ Session::get('user')}}
                    @else
                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i> User not found.
                    @endif
                </div>
            </article>
        @endif
    </div>
@endsection @section('style')
    <style type="text/css">
        .message-body{
            line-height: 2;
            font-size: 1.2em;
        }
        .message-header{
            font-size: 2.4em;
        }
        .message-body i{
            padding: 0 1em;
            color: #E53935;
        }
    </style>
@endsection