<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">

        <a class="navbar-brand brand-logo" style="color: #002a80" href="dashboard.php">
            <div class="container d-flex flex-column align-items-center">
                <img src="{{ asset('FrontEnd/images/logo.jpg') }}" style="width: 20%; height: auto;" alt="">
                <span
                    style="font-size: 15px; line-height: 17px; text-align: center;">{{ Auth::user()->company->comp_name }}</span>
            </div>
        </a>




    </div>

    <div class="navbar-menu-wrapper d-flex align-items-center">

        <!--        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">

        <li class="nav-item">

          <a href="#" class="nav-link">Schedule

            <span class="badge badge-primary ml-1">New</span>

          </a>

        </li>

        <li class="nav-item active">

          <a href="#" class="nav-link">

            <i class="mdi mdi-elevation-rise"></i>Reports</a>

        </li>

        <li class="nav-item">

          <a href="#" class="nav-link">

            <i class="mdi mdi-bookmark-plus-outline"></i>Score</a>

        </li>

      </ul>-->

        <ul class="navbar-nav navbar-nav-right">

            {{-- <li class="nav-item dropdown">

                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
                    data-toggle="dropdown" aria-expanded="false">

                    <i class="mdi mdi-file-document-box"></i>

                    <span class="count">7</span>

                </a>

                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                    aria-labelledby="messageDropdown">

                    <div class="dropdown-item">

                        <p class="mb-0 font-weight-normal float-left">You have 7 Pending orders

                        </p>

                        <span class="badge badge-info badge-pill float-right">View all</span>

                    </div>

                    <div class="dropdown-divider"></div>
                    @foreach ($collection as $item)
                        <a class="dropdown-item preview-item">
                            <div class="preview-item-content flex-grow">

                                <h6 class="preview-subject ellipsis font-weight-medium text-dark">David Grey

                                    <span class="float-right font-weight-light small-text">1 Minutes ago</span>

                                </h6>

                                <p class="font-weight-light small-text">

                                    The meeting is cancelled

                                </p>

                            </div>

                        </a>
                        <div class="dropdown-divider"></div>
                    @endforeach








                </div>

            </li>

            <li class="nav-item dropdown">

                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                    data-toggle="dropdown">

                    <i class="mdi mdi-bell"></i>

                    <span class="count">4</span>

                </a>

                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                    aria-labelledby="notificationDropdown">

                    <a class="dropdown-item">

                        <p class="mb-0 font-weight-normal float-left">You have 4 new notifications

                        </p>

                        <span class="badge badge-pill badge-warning float-right">View all</span>

                    </a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item preview-item">

                        <div class="preview-thumbnail">

                            <div class="preview-icon bg-success">

                                <i class="mdi mdi-alert-circle-outline mx-0"></i>

                            </div>

                        </div>

                        <div class="preview-item-content">

                            <h6 class="preview-subject font-weight-medium text-dark">Application Error</h6>

                            <p class="font-weight-light small-text">

                                Just now

                            </p>

                        </div>

                    </a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item preview-item">

                        <div class="preview-thumbnail">

                            <div class="preview-icon bg-warning">

                                <i class="mdi mdi-comment-text-outline mx-0"></i>

                            </div>

                        </div>

                        <div class="preview-item-content">

                            <h6 class="preview-subject font-weight-medium text-dark">Settings</h6>

                            <p class="font-weight-light small-text">

                                Private message

                            </p>

                        </div>

                    </a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item preview-item">

                        <div class="preview-thumbnail">

                            <div class="preview-icon bg-info">

                                <i class="mdi mdi-email-outline mx-0"></i>

                            </div>

                        </div>

                        <div class="preview-item-content">

                            <h6 class="preview-subject font-weight-medium text-dark">New user registration</h6>

                            <p class="font-weight-light small-text">

                                2 days ago

                            </p>

                        </div>

                    </a>

                </div>

            </li> --}}

            <li class="nav-item dropdown d-none d-xl-inline-block">

                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown"
                    aria-expanded="false">

                    <span class="profile-text">Hello,

                        {{ Auth::user()->emp_name }}
                    </span>

                    <img class="img-xs rounded-circle"
                        src="{{ asset(Config::get('vars.adminFolder') . '/images/faces/face1.jpg') }}"
                        alt="Profile image">

                </a>

                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">

                    <a class="dropdown-item p-0">

                        <div class="d-flex border-bottom">

                            <div class="py-3 px-4 d-flex align-items-center justify-content-center">

                                <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>

                            </div>

                            <div
                                class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">

                                <i class="mdi mdi-account-outline mr-0 text-gray"></i>

                            </div>

                            <div class="py-3 px-4 d-flex align-items-center justify-content-center">

                                <i class="mdi mdi-alarm-check mr-0 text-gray"></i>

                            </div>

                        </div>

                    </a>



                    <a class="dropdown-item" href="{{ route('changePassword') }}">

                        Change Password

                    </a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item" type="submit">Logout</button>
                    </form>



                </div>

            </li>

        </ul>

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">

            <span class="mdi mdi-menu"></span>

        </button>

    </div>

</nav>

<!-- partial -->
