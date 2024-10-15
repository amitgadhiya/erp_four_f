<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <div class="nav-link">
          <div class="user-wrapper">
            <div class="profile-image">
              <img src="{{asset('FrontEnd/images/faces/face1.jpg')}}" alt="profile image">
            </div>
            <div class="text-wrapper">
              <p class="profile-name">
                {{-- {{ Auth::user()->name }} --}}

                User name
              </p>
              <div>
                <small class="designation text-muted"></small>
                <span class="status-indicator online"></span>
              </div>
            </div>
          </div>

        </div>
      </li>

      <li class="nav-item">
      <a class="nav-link" href="/dashboard">
          <i class="menu-icon mdi mdi-television"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#master" aria-expanded="false" aria-controls="master">
          <i class="menu-icon mdi mdi-book-open-variant"></i>
          <span class="menu-title">Masters</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="master">
          <ul class="nav flex-column sub-menu">

            <li class="nav-item">
                <a class="nav-link" href="/master/user-list">User</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="/master/client-list">Client</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/master/vender-list">Vender</a>
            </li>
            

            
            <li class="nav-item">
              <a class="nav-link" href="/master/gst-list">GST</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/master/department-list">Department</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/master/element-list">Element</a>
            </li>


          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#user" aria-expanded="false" aria-controls="master">
          <i class="menu-icon mdi mdi-swap-horizontal"></i>
          <span class="menu-title">Transaction</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="user">
          <ul class="nav flex-column sub-menu">

          <li class="nav-item">
              <a class="nav-link" href="/quotation">Quotaion</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/po">Purchase Order</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/project">Project</a>
            </li>

          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#accounts" aria-expanded="false" aria-controls="master">
          <i class="menu-icon mdi mdi-cash-multiple"></i>
          <span class="menu-title">Accounts</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="accounts">
          <ul class="nav flex-column sub-menu">

          <li class="nav-item">
              <a class="nav-link" href="/inward">Purchase</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/outward">Sales</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/stock">Income</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/stock">Expences</a>
            </li>

          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#store" aria-expanded="false" aria-controls="master">
          <i class="menu-icon mdi mdi-store"></i>
          <span class="menu-title">Store</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="store">
          <ul class="nav flex-column sub-menu">

          <li class="nav-item">
              <a class="nav-link" href="/inward">In-ward</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/outward">Out-Ward</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/stock">Stock</a>
            </li>

          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#hr" aria-expanded="false" aria-controls="master">
          <i class="menu-icon mdi mdi-account"></i>
          <span class="menu-title">HR</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="hr">
          <ul class="nav flex-column sub-menu">

          <li class="nav-item">
              <a class="nav-link" href="/salary">Salary</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/Shift">Shift</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/leave_app">Leave Application</a>
            </li>


          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#tpm" aria-expanded="false" aria-controls="master">
          <i class="menu-icon mdi mdi-factory"></i>
          <span class="menu-title">TPM</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="tpm">
          <ul class="nav flex-column sub-menu">

          <li class="nav-item">
              <a class="nav-link" href="/schedule">Schedule</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/pending_task">Pending Task</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/completed_task">Completed Task</a>
            </li>


          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#report" aria-expanded="false" aria-controls="master">
          <i class="menu-icon mdi mdi-file-chart"></i>
          <span class="menu-title">Reports</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="report">
          <ul class="nav flex-column sub-menu">

          <li class="nav-item">
              <a class="nav-link" href="/order_pending">Sales</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/order_cancle">Registration</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/report/abstract">Abstract</a>
            </li>


          </ul>
        </div>
      </li>

    </ul>
  </nav>
