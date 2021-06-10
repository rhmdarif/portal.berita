
        <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>U</b>N</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>UPI</b>News</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#">
                                <img src="{{ asset('/') }}assets/admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{ auth()->user()->name ?? "" }}</span>
                            </a>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="{{ route('admin.logout') }}"><i class="fa fa-sign-out"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
