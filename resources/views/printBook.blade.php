<!DOCTYPE html>
<html>
<head>
	<title>Print Book</title>
    <link crossorigin="anonymous" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.0/css/bulma.min.css" integrity="sha256-HEtF7HLJZSC3Le1HcsWbz1hDYFPZCqDhZa9QsCgVUdw=" rel="stylesheet" /></head>
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