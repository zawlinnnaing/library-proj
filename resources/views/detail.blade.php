@extends('layout') @component('title') {{ $book->title .'-MTU Library'}} @endcomponent @section('content')
<div class="bg card">
    <h1>{{ ucwords($book->title) }}<br>
    	<span>Author: {{ ucwords($book->author) }}</span>
    </h1>
</div>
<div class="container">
    <h1 class="title">
		Description
	</h1>
    <p>{{ $book->description }}</p>
    <div class="aditional-info">
        <h1 class="title">Additional Information
        	                <i class="fa fa-info-circle" aria-hidden="true" style="padding: 0.2em 0.5em;"></i>
        </h1>
        <hr>
        <table class="table">
            <tr>
                <td>
                    <p>Stock Count:</p>
                </td>
                <td>
                    <p>{{ $book->stock_count }}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Availability</p>
                </td>
                @if($book->availability)
                <td>
                    <p><i class="fa fa-check-circle" aria-hidden="true" style="color: #00E676;"></i>
                    </p>
                </td>
                @else
                <td>
                    <p><i class="fa fa-times" aria-hidden="true" style="color: #F44336"></i>
                    </p>
                </td>
                @endif
            </tr>
            <tr>
                <td>
                    <p>Category</p>
                </td>
                <td>
                    <p>{{ $book->category->type }}</p>
                </td>
            </tr>
            @if($book->category->type != "Others")
            <tr>
                <td>
                    <p>Major</p>
                </td>
                <td>
                    <p>{{ ucwords($book->category->major) }}</p>
                </td>
            </tr>
            @endif @if($book->category->type == 'Old question'|| $book->category->type =='Thesis')
            <tr>
                <td>
                    <P>Year</P>
                </td>
                <td>
                    <p>{{$book->category->year}}</p>
                </td>
            </tr>
            @endif
        </table>
    </div>
</div>
@endsection @section('style')
<style type="text/css">
.bg {
    width: 100%;
    background: linear-gradient(rgba(0, 0, 0, .5),
    rgba(0, 0, 0, .5)),
    @if(empty($book->img_dir)) url('{{ asset('uploads/default-book.gif') }}');
    @else url('{{ asset("uploads/".$book->img_dir)}}');
    @endif background-size: cover;
    background-position-y: center;
    height: 70vh;
    position: relative;
}

.bg h1 {
    color: white;
    position: absolute;
    bottom: 0;
    left: 0;
    padding: 0 1em;
    font-family: 'Josefin Sans', sans-serif;
    font-weight: bold;
}

.bg h1 span {
    font-size: 0.6em;
    font-weight: 500;
}

.container .title {}

@media screen and (min-width: 700px) {
    .container {
        padding: 2em;
    }
}
@media screen and (max-width: 700px){
	.bg{
    	height: 50vh;
    }

}

.container div {
    margin: 2em 0;
}


.table td {
    border: 0px !important;
}
</style>
@endsection