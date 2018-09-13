    <div class="column is-3">
        <aside class="menu">
          <p class="menu-label">
            General
          </p>
          <ul class="menu-list">
            <li><a class="{{ Request::url() == route('admin.panel') ? 'is-active':'' }}" href="{{ route('admin.panel') }}">Dashboard</a></li>
<!--             <li><a>Customers</a></li>
 -->          </ul>
          <p class="menu-label">
            Administration
          </p>
          <ul class="menu-list">
            <li>
              <p>Manage Library</p>
              <ul>
                <li><a class="{{ Request::url() == route('admin.add_book') ? 'is-active':'' }}" href="{{ route('admin.add_book') }}">Add a book</a></li>
                <li><a class="{{ Request::url() ==  route('admin.overdue_books') ? 'is-active': '' }}" href="{{  route('admin.overdue_books') }}">Overdue Books</a></li>
                <li><a class="{{ Request::url() ==  route('admin.add_a_member') ? 'is-active':'' }}" href="{{ route('admin.add_a_member') }}">Add a member</a></li>
                <li><a class="{{ Request::url() == route('admin.issue_book') ? 'is-active':'' }}" href=" {{ route('admin.issue_book') }}">Lend a book</a></li>

              </ul>
            </li>
            <li><a class="{{ Request::url() == route('admin.reservations')? 'is-active':'' }}" href="{{ route('admin.reservations') }}">Reservations</a></li>
            <li><a class="{{ Request::url() == route('admin.manage_users')? 'is-active':'' }}" href="{{ route('admin.manage_users') }}">Manage users</a></li>
            <li><a href="{{ route('admin.print_book') }}">Print Book Table</a></li>

            <!--             <li><a>Cloud Storage Environment Settings</a></li>
                        <li><a>Authentication</a></li> -->
          </ul>
<!--           <p class="menu-label">
            Transactions
          </p>
          <ul class="menu-list">
            <li><a>Payments</a></li>
            <li><a>Transfers</a></li>
            <li><a>Balance</a></li>
          </ul> -->
        </aside>
      </div>
      