<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="user-wrapper">
                    <div class="profile-image">
                        <img src="{{ asset('FrontEnd/images/faces/face1.jpg') }}" alt="profile image">
                    </div>
                    <div class="text-wrapper">
                        <p class="profile-name">
                            {{ Auth::user()->emp_name }}


                        </p>
                        <div>
                            <small class="designation text-muted"></small>
                            <span class="status-indicator online"></span>
                        </div>
                    </div>
                </div>

            </div>
        </li>

        <li class="nav-item  {{ request()->is('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="menu-icon mdi mdi-television"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('todo.list') }}">
                <i class="menu-icon fas fa-tasks"></i>
                <span class="menu-title">ToDo</span>
            </a>
        </li> --}}
        <li class="nav-item {{ request()->is('masters*') ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#master"
                aria-expanded="{{ request()->is('masters*') ? 'true' : 'false' }}" aria-controls="master">
                <i class="menu-icon mdi mdi-book-open-variant"></i>
                <span class="menu-title">Masters</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ request()->is('masters*') ? 'show' : '' }}" id="master">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('masters/department-*') ? 'active' : '' }}"
                            href="{{ route('department') }}">Departments</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{ request()->is('masters/emp-*') ? 'active' : '' }}"
                            href="{{ route('emp') }}">Employee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('masters/tax-*') ? 'active' : '' }}"
                            href="{{ route('tax') }}">Tax</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('masters/machine-*') ? 'active' : '' }}"
                            href="{{ route('machine') }}">Machines</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link {{ request()->is('masters/client-*') ? 'active' : '' }}"
                            href="{{ route('client') }}">Clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('masters/vender-*') ? 'active' : '' }}"
                            href="{{ route('vender') }}">Venders</a>
                    </li> --}}


                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('masters/party-*') ? 'active' : '' }}"
                            href="{{ route('party') }}">Party</a>
                    </li>




                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('masters/unit-*') ? 'active' : '' }}"
                            href="{{ route('unit') }}">Unit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('masters/work-catg-*') ? 'active' : '' }}"
                            href="{{ route('workCatg') }}">Work Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('masters/itemcategory-*') ? 'active' : '' }}"
                            href="{{ route('ic') }}">Item Category</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('masters/item-*') ? 'active' : '' }}"
                            href="{{ route('item') }}">Item</a>
                    </li>


                </ul>
            </div>
        </li>

        <li class="nav-item {{ request()->is('design*') ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#design"
                aria-expanded="{{ request()->is('design*') ? 'true' : 'false' }}" aria-controls="master">
                <i class="menu-icon fas fa-drafting-compass"></i>
                <span class="menu-title">Design</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ request()->is('design*') ? 'show' : '' }}" id="design">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('design/enquiry-*') ? 'active' : '' }}"
                            href="{{ route('enquiry') }}">Enquiry</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('design/quotation*') ? 'active' : '' }}"
                            href="{{ route('quotation') }}">Quotations</a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link {{ request()->is('design/project*') ? 'active' : '' }}"
                            href="{{ route('project') }}">Projects</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('design/work-*') ? 'active' : '' }}"
                            href="{{ route('designWork') }}">Design Work</a>
                    </li>

                </ul>
            </div>
        </li>
        <li class="nav-item {{ request()->is('purchase*') ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#purchase"
                aria-expanded="{{ request()->is('purchase*') ? 'true' : 'false' }}" aria-controls="purchase">
                <i class="menu-icon fas fa-credit-card"></i>
                <span class="menu-title">Purchase</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ request()->is('purchase*') ? 'show' : '' }}" id="purchase">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('purchase/po-*') ? 'active' : '' }}"
                            href="{{ route('po') }}">Purchase Order</a>
                    </li>


                </ul>
            </div>
        </li>
        <li class="nav-item {{ request()->is('gate*') ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#gate"
                aria-expanded="{{ request()->is('gate*') ? 'true' : 'false' }}" aria-controls="gate">
                <i class="menu-icon fas fa-archway"></i>
                <span class="menu-title">Gate</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ request()->is('gate*') ? 'show' : '' }}" id="gate">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('gate/entry*') ? 'active' : '' }}"
                            href="{{ route('gateEntry') }}">Gate Entery (DC)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('gate/purchase-in*') ? 'active' : '' }}"
                            href="{{ route('purchaseIn') }}">Purchase Inward</a>
                    </li>


                    {{-- <li class="nav-item">
              <a class="nav-link" href="{{ route('gate-invoice-out.list')}}">Invoice Out</a>
            </li> --}}


                </ul>
            </div>
        </li>
        <li class="nav-item {{ request()->is('store*') ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#store"
                aria-expanded="{{ request()->is('store*') ? 'true' : 'false' }}" aria-controls="store">
                <i class="menu-icon mdi mdi-store"></i>
                <span class="menu-title">Store</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ request()->is('store*') ? 'show' : '' }}" id="store">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item ">
                        <a class="nav-link {{ request()->is('store/inward*') ? 'active' : '' }}" data-toggle="collapse" href="#inward"
                            aria-expanded="{{ request()->is('store/inward*') ? 'true' : 'false' }}" aria-controls="inward">
                            <i class="menu-icon mdi mdi-import"></i>
                            <span class="menu-title">Inward</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse {{ request()->is('store/inward*') ? 'show' : '' }}" id="inward">
                        <ul class="nav flex-column sub-menu ">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('store/inward/dcir*') ? 'active' : '' }}" href="{{ route('dcir') }}">Returnable DC</a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('store/inward/dcinr*') ? 'active' : '' }}" href="{{ route('dcinr') }}">Non-Returnable DC</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="#">Purchase</a>
                            </li> --}}
                        </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{ request()->is('store/outward*') ? 'active' : '' }}" data-toggle="collapse" href="#outward"
                        aria-expanded="{{ request()->is('store/outward*') ? 'true' : 'false' }}" aria-controls="outward">
                        <i class="menu-icon mdi mdi-export"></i>
                        <span class="menu-title">Outward</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse {{ request()->is('store/outward*') ? 'show' : '' }}" id="outward">
                        <ul class="nav flex-column sub-menu ">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('store/outward/dcor*') ? 'active' : '' }}" href="{{ route('dcor') }}">Returnable DC</a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('store/outward/dconr*') ? 'active' : '' }}" href="{{ route('dconr') }}">Non-Returnable DC</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="#">Sales</a>
                            </li> --}}
                        </ul>
                    </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('store/grn*') ? 'active' : '' }}"
                            href="{{ route('grn') }}">GRN</a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('store/issue') ? 'active' : '' }}"
                            href="{{ route('issue') }}">Issue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('store/issue-search') ? 'active' : '' }}"
                            href="{{ route('issueSearch') }}">Issue By Project</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('receive.add') }}">Received</a>
                    </li>


                </ul>
            </div>
        </li>
        <li class="nav-item {{ request()->is('production*') ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#workshop" aria-expanded="{{ request()->is('production*') ? 'true' : 'false' }}"
                aria-controls="workshop">
                <i class="menu-icon fas fa-hammer"></i>
                <span class="menu-title">Production</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ request()->is('production*') ? 'show' : '' }}" id="workshop">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('productionWork') }}">Data conversion</a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('issue.add') }}">Transfer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('accept.add') }}">Accept</a>
                    </li>


                </ul>
            </div>
        </li>
        <li class="nav-item {{ request()->is('quality*') ? 'quality' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#quality" aria-expanded="{{ request()->is('quality*') ? 'true' : 'false' }}"
                aria-controls="quality">
                <i class="menu-icon fas fa-check-circle"></i>
                <span class="menu-title">Quality</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ request()->is('quality*') ? 'show' : '' }}" id="quality">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('issue.add') }}">Transfer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('accept.add') }}">Accept</a>
                    </li>


                </ul>
            </div>
        </li>
        <li class="nav-item {{ request()->is('assembly*') ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#assembly" aria-expanded="{{ request()->is('assembly*') ? 'true' : 'false' }}"
                aria-controls="assembly">
                <i class="menu-icon fas fa-cogs"></i>
                <span class="menu-title">Assembly</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ request()->is('assembly*') ? 'show' : '' }}" id="assembly">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('assemblyWork') }}">Data conversion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('issue.add') }}">Transfer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('accept.add') }}">Accept</a>
                    </li>


                </ul>
            </div>
        </li>
        <li class="nav-item {{ request()->is('accounts*') ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#accounts" aria-expanded="{{ request()->is('accounts*') ? 'true' : 'false' }}"
                aria-controls="accounts">
                <i class="menu-icon mdi mdi-cash-multiple"></i>
                <span class="menu-title">Accounts</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ request()->is('accounts*') ? 'show' : '' }}" id="accounts">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('purchase.list') }}">Purchase</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sales.list') }}">Sales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('income.list') }}">Income</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('expences.list') }}">Expences</a>
                    </li>

                </ul>
            </div>
        </li>

               
      <li class="nav-item {{ request()->is('report*') ? 'active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#report" aria-expanded="{{ request()->is('report*') ? 'true' : 'false' }}" aria-controls="report">
          <i class="menu-icon mdi mdi-file-chart"></i>
          <span class="menu-title">Reports</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse {{ request()->is('report*') ? 'show' : '' }}" id="report">
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
