@extends('layout') @component('title') {{ $title }} @endcomponent @section('content')
<div class="container">
    <div class="columns">
        <div class="column is-3 sidebar is-hidden-mobile">
            <aside class="menu">
                <p class="menu-label">Categories</p>
                <hr>
                <ul class="menu-list">
                    <li><a href="/categories/0">Generalities</a></li>
                    <li><a href="/categories/1">Philosophy &amp; Psychology</a></li>
                    <li><a href="/categories/2">Religion</a></li>
                    <li><a href="/categories/3">Social sciences</a></li>
                    <li><a href="/categories/4">Language</a></li>
                    <li><a href="/categories/5">Natural sciences &amp; mathematics</a></li>
                    <li><a href="/categories/6">Technology(Applied sciences)</a></li>
                    <li><a href="/categories/7">The arts Find and decorative arts</a></li>
                    <li><a href="/categories/8">Literature &amp; rhetoric</a></li>
                    <li><a href="/categories/9">Geography &amp; History</a></li>
                </ul>
                <p class="menu-label">Archives</p>
                <hr>
                <ul class="menu-list">
                    <li><a href="/archives/Reference">Reference</a></li>
                    <li><a href="/archives/Thesis">Thesis</a></li>
                    <li><a href="/archives/Old-questions">Old questions</a></li>
                </ul>
            </aside>
        </div>
        <!-- Dropdown for mobile -->
        <div class="column is-hidden-desktop is-hidden-tablet">
            <div class="dropdown">
                <div class="dropdown-trigger">
                    <button class="button" aria-haspopup="true" aria-controls="dropdown-menu">
                        <span>Categories</span>
                        <span class="icon is-small">
        <i class="fa fa-angle-down" aria-hidden="true"></i>
      </span>
                    </button>
                </div>
                <div class="dropdown-menu" id="dropdown-menu" role="menu">
                    <div class="dropdown-content">
                        <a href="/categories/0" class="dropdown-item">Generalities</a>
                        <a href="/categories/1" class="dropdown-item">Philosophy &amp; Psychology</a>
                        <a href="/categories/2" class="dropdown-item">Religion</a>
                        <a href="/categories/3" class="dropdown-item">Social sciences</a>
                        <a href="/categories/4" class="dropdown-item">Language</a>
                        <a href="/categories/5" class="dropdown-item">Natural sciences &amp; mathematics</a>
                        <a href="/categories/6" class="dropdown-item">Technology(Applied sciences)</a>
                        <a href="/categories/7" class="dropdown-item">The arts Find and decorative arts</a>
                        <a href="/categories/8" class="dropdown-item">Literature &amp; rhetoric</a>
                        <a href="/categories/9" class="dropdown-item">Geography &amp; History</a>
                        <hr class="dropdown-divider">
                        <p class="dropdown-item" style="font-weight: bold;">Archives</p>
                        <a href="/archives/Reference" class="dropdown-item">Reference</a>
                        <a href="/archives/Thesis" class="dropdown-item">Thesis</a> 
                        <a href="/archives/Old-questions" class="dropdown-item">Old questions</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="column content">
            <div class="descrip message is-dark">
                <div class="message-header">
                    {{ $title }}
                </div>
                @if($title == 'Reference')
                <div class="message-body">
                    Reference Book means :a book containing useful facts or specially organized information, as an encyclopedia, dictionary, atlas, yearbook, etc.
                </div>
                @elseif ($title == 'Thesis')
                <div class="message-body">
                    Thesis is a long essay or dissertation involving personal research, written by a candidate for a university degree.
                </div>
                @elseif($title == 'Old questions')
                <div class="message-body">
                    Old questions for exams.
                </div>
                @endif
            </div>
            <div class="content">
                <div class="dropdown-btns">
                    <form action="{{ route('archives.advanced_search',['keyowrd' => $title]) }}" method="GET">
                        {{ csrf_field() }}
                        <div class="columns">
                            @if($title == 'Reference')
                            <div class="column">
                                @include('major')
                            </div>
                            <div class="column">
                                <input class="button" type="submit" name="submit" value="Submit">
                            </div>
                            @elseif($title == 'Thesis'|| $title == 'Old questions')
                            <div class="column">
                                @include('major')
                            </div>
                            <div class="column">
                                <input type="text" name="year" placeholder="Year">
                                <!--  Error Message -->
                                @if ($errors->any())
                                <div class="message is-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                            <div class="column">
                                <input class="button" type="submit" name="submit" value="Submit">
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
                @foreach($books as $book)
                <div class="books">
                    <p class="book_title">Title: <span><a
                                            href="{{ route('detail',$book->id) }}">{{ $book->title }}</a></span></p>
                    <p class="author">Author: <span>{{ $book->author }}</span></p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection @section('style')
<style type="text/css">
.container {
    margin-top: 3em;
    margin-bottom: 3em;
}

.sidebar {
    border: 1px solid #bdbdbd;
    padding: 1em;
}

.descrip {
    margin: 0 1em;
}

.descrip .message-header {
    font-size: 24px;
}

.descrip .message-body {
    font-size: 16px;
}

.menu hr {
    margin: 0;
}

form {
    padding: 1em;
    margin: 2em 1em;
}

form input[type='text'] {
    background-color: #f5f5f5;
}

form input[type='submit'] {
    padding: 0.5em 2em;
    font-weight: bold;
    height: unset;
    vertical-align: middle;
}

div.books {
    padding: 1em;
    line-height: 2;
    border-bottom: 1px solid #616161;
}

div.books p {
    font-size: 16px;
    color: #9e9e9e;
}

div.books span {
    margin: 0 2em;
    font-weight: bold;
    color: #212121;
}
div.dropdown button{
    display: block;
    margin: 0 1em !important;
    font-size: 18px;
}



}
</style>
@endsection @section('script')
<script type="text/javascript">
$('#major').prop('disabled', false);
    $('.dropdown button').on('click',function(){
        $('.dropdown').toggleClass('is-active');
    });
</script>
@endsection