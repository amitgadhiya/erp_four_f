<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <div class="nav-link">
          <div class="user-wrapper">
            <div class="profile-image">
              <img src="{{asset('FrontEnd/images/faces/face1.jpg')}}" alt="profile image">
            </div>
            <div class="text-wrapper">
              <p class="profile-name">{{ Auth::user()->name }}</p>
              <div>
                <small class="designation text-muted"></small>
                <span class="status-indicator online"></span>
              </div>
            </div>
          </div>

        </div>
      </li>

      <li class="nav-item">
      <a class="nav-link" href="/{{Config::get('vars.adminURL')}}/dashboard">
          <i class="menu-icon mdi mdi-television"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#master" aria-expanded="false" aria-controls="master">
          <i class="menu-icon mdi mdi-playlist-plus"></i>
          <span class="menu-title">Masters</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="master">
          <ul class="nav flex-column sub-menu">

            <li class="nav-item">
                <a class="nav-link" href="/{{Config::get('vars.adminURL')}}/board">Board</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="/{{Config::get('vars.adminURL')}}/classes">Class</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/{{Config::get('vars.adminURL')}}/subject">Subject</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/{{Config::get('vars.adminURL')}}/chapter">Chapter</a>
            </li>

            
            <li class="nav-item">
              <a class="nav-link" href="/{{Config::get('vars.adminURL')}}/question">Question</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/{{Config::get('vars.adminURL')}}/paperprice">Paper Price</a>
            </li>



          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#user" aria-expanded="false" aria-controls="master">
          <i class="menu-icon mdi mdi-playlist-plus"></i>
          <span class="menu-title">Users</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="user">
          <ul class="nav flex-column sub-menu">

          <li class="nav-item">
              <a class="nav-link" href="/{{Config::get('vars.adminURL')}}/order_pending">All Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/{{Config::get('vars.adminURL')}}/order_cancle">Block Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/{{Config::get('vars.adminURL')}}/order_success">Search Users</a>
            </li>

          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#report" aria-expanded="false" aria-controls="master">
          <i class="menu-icon mdi mdi-playlist-plus"></i>
          <span class="menu-title">Reports</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="report">
          <ul class="nav flex-column sub-menu">

          <li class="nav-item">
              <a class="nav-link" href="/{{Config::get('vars.adminURL')}}/order_pending">Sales</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/{{Config::get('vars.adminURL')}}/order_cancle">Registration</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/{{Config::get('vars.adminURL')}}/report/abstract">Abstract</a>
            </li>


          </ul>
        </div>
      </li>

    </ul>
  </nav>
