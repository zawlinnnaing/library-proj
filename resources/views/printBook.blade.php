<!DOCTYPE html>
<html>

<head>
    <title>Library - Manadalay Technological University</title>
    <style type="text/css">
    td {
        border: 1px solid black;
        padding: 0 1em;
    }
    table{
    	margin: 0 auto;
    }
    </style>
</head>

<body>
    <a href="" onclick="printTable(event)">Print this book</a>
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
            <td> {{ $book->id }}</td>
            <td> {{ $book->title }}</td>
            <td> {{ $book->author }}</td>
            <td> {{ $book->book_category }}</td>
            <td> {{ $book->barcode_no }}</td>
        </tr>
        @endforeach
    </table>
    <script type="text/javascript">
    function printTable(event) {
        event.target.style.display = "none";
        window.print();
        return false;
    }
    </script>
</body>

</html>