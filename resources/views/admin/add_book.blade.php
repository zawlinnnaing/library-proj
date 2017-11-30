@extends('admin.layout')
@section('content')
	<div class="column is-9">
		@if($errors->any())
            <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
            </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                Add a Book <a href="{{ route('admin.panel') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('admin.insert_book') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Author</label>
                        <div class="col-sm-10">
                            <input type="text" name="author" id="author" class="form-control"></input>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Description</label>
                        <div class="col-sm-10">
                            <textarea  name="description" id="description" class="form-control" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Image</label>
                        <div class="col-sm-10">
                        	<input type="file" name="image" id="image" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Stock Counts</label>
                        <div class="col-sm-10">
                            <input type="number" name="stock_counts" id="stock_counts" min="1">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Categories</label>
                        <div class="col-sm-10">
                            <select name="type" id="categories">
                            	<option value="Others">Others</option>
                            	<option value="Reference">Reference</option>
                            	<option value="Old question">Old question</option>
                            	<option value="Thesis">Thesis</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Major</label>
                        <div class="col-sm-10">
                            <select disabled="" id="major" name="major">
                                <option value=""></option>
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
                        <label class="control-label col-sm-2" >Year</label>
                        <div class="col-sm-10">
                            <input type="text" name="year" id="year" disabled="true">
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-default" value="Add Post" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
	</div>
@endsection
