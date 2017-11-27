@extends('admin.layout')
@section('content')
<div class="column is-9">
        <!-- <nav class="breadcrumb" aria-label="breadcrumbs">
          <ul>
            <li><a href="../">Bulma</a></li>
            <li><a href="../">Templates</a></li>
            <li><a href="../">Examples</a></li>
            <li class="is-active"><a href="#" aria-current="page">Admin</a></li>
          </ul>
        </nav> -->
  @if(Session::has('success_message'))
    <div class="alert alert-success">{{ Session::get('success_message') }}</div>
  @endif
        <section class="hero is-info welcome is-small">
          <div class="hero-body">
            <div class="container">
              <h1 class="title">
                Hello, Admin.
              </h1>
              <h2 class="subtitle">
                I hope you are having a great day!
              </h2>
            </div>
          </div>
        </section>
        <section class="info-tiles">
          <div class="tile is-ancestor has-text-centered">
            <div class="tile is-parent">
              <article class="tile is-child box">
                <p class="title">{{ $users->count() }}</p>
                <p class="subtitle">Members</p>
              </article>
            </div>
            <div class="tile is-parent">
              <article class="tile is-child box">
                <p class="title" >{{ $books_count  }}</p>
                <p class="subtitle">Books</p>
              </article>
            </div>
            <div class="tile is-parent">
              <article class="tile is-child box">
                <p class="title" >{{ $reservations->count() }}</p>
                <p class="subtitle">Reservations</p>
              </article>
            </div>
          </div>
        </section>

        <div class="columns">
          <div class="column is-6">
            <div class="card events-card">
              <header class="card-header">
                <p class="card-header-title">
                  Books
                </p>
                <!-- <a href="#" class="card-header-icon" aria-label="more options">
                  <span class="icon">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                  </span>
                </a>
 -->              </header>
              <div class="card-table">
                <div class="content">
                  <table class="table is-fullwidth is-striped">
                    <tbody>

                    @foreach( $books as $book )
                      <tr>
                        <td width="5%"><i class="fa fa-book"></i></td>
                        <td>{{ $book->title }}</td>
                        <td><a class="button is-small is-primary" href="/admin/edit_book/{{$book->id}}">Edit</a></td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <footer class="card-footer">
                <a href="{{ route('admin.book_list') }}" class="card-footer-item">View All</a>
              </footer>
            </div>


          </div>

          <div class="column is-6">
            <div class="card">
              <header class="card-header">
                <p class="card-header-title">
                  Inventory Search
                </p>
                <a href="#" class="card-header-icon" aria-label="more options">
                  <span class="icon">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                  </span>
                </a>
              </header>
              <div class="card-content">
                <div class="content">
                  <div class="control has-icons-left has-icons-right">
                    <input class="input is-large" type="text" placeholder="" id="book" name="term">
                    <span class="icon is-medium is-left">
                      <i class="fa fa-search"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <header class="card-header">
                <p class="card-header-title">
                  User Search
                </p>
                <a href="#" class="card-header-icon" aria-label="more options">
                  <span class="icon">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                  </span>
                </a>
              </header>
              <div class="card-content">
                <div class="content">
                  <div class="control has-icons-left has-icons-right">
                    <input class="input is-large" type="text" name="term" id="q" placeholder="">
                    <span class="icon is-medium is-left">
                      <i class="fa fa-search"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>


          </div>

        </div>

      </div>
@endsection


