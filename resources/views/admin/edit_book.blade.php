@extends('admin.layout')
@section('content')
    <div class="column is-9">
        {{--Check errors--}}
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>
                        {{ $error }}
                    </p>
                @endforeach
            </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit a Book
                <a class="label label-primary pull-right" href="{{ route('admin.panel') }}">
                    Back
                </a>
            </div>
            <div class="panel-body">
                <form action="{{ route('admin.update_book',$book->id) }}" class="form-horizontal"
                      enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            @if(!empty($book->img_dir))
                                <img alt="picture" class="image" src="{{ asset('uploads/'.$book->img_dir) }}">
                            @else
                                <img alt="Default photo" class="image" src="{{ asset('uploads/default.png') }}">
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">
                            Title
                        </label>
                        <div class="col-sm-10">
                            <input class="form-control" id="title" name="title" type="text"
                                   value="{{ ucfirst($book->title) }}">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">
                            Author
                        </label>
                        <div class="col-sm-10">
                            <input class="form-control" id="author" name="author" value="{{ ucfirst($book->author) }}">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Summery Number(0-999)</label>
                        <div class="col-sm-10">
                            <input type="number" name="book_category" min="0" max="1000" class="form-control"
                                   value="{{ $book->book_category }}">
                            @if($errors->has('book_category'))
                                <span class="help-block"><strong>
                            {{ $errors->first('book_category') }}
                        </strong></span> @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">Book Number</label>
                        <div class="col-sm-10">
                            <input type="text" name="barcode_no" placeholder="6-digits" class="form-control"
                                value="{{ $book->barcode_no }}">
                            @if($errors->has('barcode_no'))
                                <span class="help-block"><strong>
                            {{ $errors->first('barcode_no') }}
                        </strong></span> @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">
                            Description
                        </label>
                        <div class="col-sm-10">
                        <textarea class="form-control" id="description" name="description" rows="10">
                            {{ $book->description }}
                        </textarea>
                        </div>
                    </div>
                    @if(empty($book->img_dir))
                        <div class="form-group">
                            <label class="control-label col-sm-2">
                                Image
                            </label>
                            <div class="col-sm-10">
                                <input class="form-control" id="image" name="image" type="file">

                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <label class="control-label col-sm-2">
                            Stock Counts
                        </label>
                        <div class="col-sm-10">
                            <input id="stock_counts" min="1" name="stock_counts" type="number"
                                   value="{{ $book->stock_count }}">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">
                            Categories
                        </label>
                        <div class="col-sm-10">
                            <select id="categories" name="type">
                                <option value="Others">
                                    Others
                                </option>
                                <option value="Reference">
                                    Reference
                                </option>
                                <option value="Old question">
                                    Old question
                                </option>
                                <option value="Thesis">
                                    Thesis
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">
                            Major
                        </label>
                        <div class="col-sm-10">
                            <select disabled="" id="major" name="major">
                                <option value="">-- Select major --</option>
                                <option value="Civil">
                                    Civil Engineering
                                </option>
                                <option value="Mechanical">
                                    Mechanical Engineering
                                </option>
                                <option value="Mechatronic">
                                    Mechatronic
                                </option>
                                <option value="Architeture">
                                    Architeture
                                </option>
                                <option value="IT">
                                    Information Technology
                                </option>
                                <option value="EC">
                                    Electronic Engineering
                                </option>
                                <option value="EP">
                                    Electrical Power
                                </option>
                                <option value="Chemical">
                                    Chemical Engineering
                                </option>
                                <option value="BioTech">
                                    BioTech
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">
                            Year
                        </label>
                        <div class="col-sm-10">
                            @if($book->category == null)
                                <input disabled="" id="year" name="year" type="text" value="">
                                </input>
                            @else
                                <input disabled="" id="year" name="year" type="text"
                                       value="{{ $book->category->year }}">
                                </input>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input class="btn btn-default" type="submit" value="Update Book"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@section('style')
    <style rel="stylesheet" type="text/css">
        .image {
            width: 200px;
            height: 300px;
        }

        .panel-heading {
            margin-bottom: 0em !important;
        }
    </style>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            // body...
            @if($book->category == null)
            $('#categories').val('Others');
            @else
            $('#categories').val("{{ $book->category->type }}");
            $('#major').val('{{ $book->category->major }}');
            @endif
                switch ($('#categories').val()) {
                case "Others":
                    $('#major,#year').prop('disabled', true);
                    break;
                case "Reference":
                    $('#major').prop('disabled', false);
                    $('#year').prop('disabled', true);
                    break;
                default:
                    $('#major,#year').prop('disabled', false);

            }

        });
    </script>
@endsection
