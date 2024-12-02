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
        <a class="nav-link" href="{{ route('todo.list')}}">
            <i class="menu-icon mdi mdi-television"></i>
            <span class="menu-title">ToDo</span>
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
                <a class="nav-link" href="{{ route('user.list')}}">Users</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('client.list')}}">Clients</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('vender.list')}}">Venders</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('machine.list')}}">Machines</a>
            </li>
            

            
            <li class="nav-item">
              <a class="nav-link" href="{{ route('gst.list')}}">GST</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/master/department-list">Departments</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('row_item.list')}}">Row Item</a>
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
              <a class="nav-link" href="{{ route('enquiry.list')}}">Enquiry</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('quotation.list')}}">Quotations</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="{{ route('project.list')}}">Projects</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('po.list')}}">Purchase Order</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('daily_entery.list')}}">Daily Entery</a>
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
              <a class="nav-link" href="{{ route('in-ward.list')}}">In-ward</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('out-ward.list')}}">Out-Ward</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="{{ route('issue.list')}}">Issue</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('received.list')}}">Received</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('stock.list')}}">Stock</a>
            </li>

          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#quality" aria-expanded="false" aria-controls="master">
          <i class="menu-icon mdi mdi-cash-multiple"></i>
          <span class="menu-title">Quality</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="quality">
          <ul class="nav flex-column sub-menu">

          <li class="nav-item">
              <a class="nav-link" href="{{ route('purchase.list')}}">Receive</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('sales.list')}}">Issue</a>
            </li>
            

          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#assembly" aria-expanded="false" aria-controls="master">
          <i class="menu-icon mdi mdi-cash-multiple"></i>
          <span class="menu-title">Assembly</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="assembly">
          <ul class="nav flex-column sub-menu">

          <li class="nav-item">
              <a class="nav-link" href="{{ route('purchase.list')}}">Receive</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('sales.list')}}">Issue</a>
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
              <a class="nav-link" href="{{ route('purchase.list')}}">Purchase</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('sales.list')}}">Sales</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('income.list')}}">Income</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('expences.list')}}">Expences</a>
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
              <a class="nav-link" href="{{ route('salary.list')}}">Salary</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('shift.list')}}">Shift</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('leave-app.list')}}">Leave Application</a>
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
              <a class="nav-link" href="{{ route('schedule-task.list')}}">Schedule</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('pending-task.list')}}">Pending Task</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('completed-task.list')}}">Completed Task</a>
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
