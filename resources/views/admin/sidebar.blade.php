    <div class="column is-3">
        <aside class="menu">
          <p class="menu-label">
            General
          </p>
          <ul class="menu-list">
            <li><a class="{{ Request::path() == 'admin/panel' ? 'is-active':'' }}" href="/admin/panel">Dashboard</a></li>
<!--             <li><a>Customers</a></li>
 -->          </ul>
          <p class="menu-label">
            Administration
          </p>
          <ul class="menu-list">
            <li>
              <p>Manage Library</p>
              <ul>
                <li><a class="{{ Request::path() == 'admin/add_book' ? 'is-active':'' }}" href="/admin/add_book">Add a book</a></li>
                <li><a class="{{ Request::path() == 'admin/overdue_books' ? 'is-active': '' }}" href="/admin/overdue_books">Overdue Books</a></li>
                <li><a class="{{ Request::path() == 'admin/add_a_member' ? 'is-active':'' }}" href="/admin/add_a_member">Add a member</a></li>
                <li><a class="{{ Request::path() == 'admin/issue_book' ? 'is-active':'' }}" href="/admin/issue_book">Lend a book</a></li>

              </ul>
            </li>
            <li><a class="{{ Request::path() == 'admin/reservations'? 'is-active':'' }}" href="{{ route('admin.reservations') }}">Reservations</a></li>
            <li><a class="{{ Request::path() == 'admin/manage_users' ? 'is-active':'' }}" href="/admin/manage_users">Manage users</a></li>
            <li><a href="{{ route('admin.print_book') }}">Print Book Table</li>

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
      