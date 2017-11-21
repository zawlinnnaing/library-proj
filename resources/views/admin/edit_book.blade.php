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
                            <select id="categories" name="type" value="{{ $book->category->type }}">
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
                            <select disabled="" id="major" name="major" value="{{ $book->category->major }}">
                                <option value="Civil Engineering">
                                    Civil Engineering
                                </option>
                                <option value="Mechanical Engineering">
                                    Mechanical Engineering
                                </option>
                                <option value="Mechatronic">
                                    Mechatronic
                                </option>
                                <option value="Architeture">
                                    Architeture
                                </option>
                                <option value="Information Technology">
                                    Information Technology
                                </option>
                                <option value="Electronic Engineering">
                                    Electronic Engineering
                                </option>
                                <option value="Electrial Power">
                                    Electrical Power
                                </option>
                                <option value="Chemical Engineering">
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
                            <input disabled="" id="year" name="year" type="text" value="{{ $book->category->year }}">
                            </input>
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
