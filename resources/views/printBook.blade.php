<!DOCTYPE html>
<html>
<head>
	<title>Print Book</title>
	<style type="text/css">
		td{
			border: 1px solid black;
			padding: 0 1em;
		}
	</style>
	</head>
<body>

	<table class="table">
		<thead>
			<td>Id</td>
			<td>Title</td>
			<td>Author</td>
			<td>Summary No</td>
			<td>Barcode Number</td>
		</thead>
		@foreach($books as $book)
		<tr>
			<td> {{ $book->id  }}</td>
			<td> {{ $book->title }}</td>
			<td> {{ $book->author }}</td>
			<td> {{ $book->book_category }}</td>
			<td> {{ $book->barcode_no }}</td>
		</tr>
		@endforeach
	</table>

</body>
</html>