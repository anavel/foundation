<header class="main-header">
    <!-- Logo -->
    <a href="{{ route('adoadomin.dashboard') }}" class="logo">{!! config('adoadomin.site_name') !!}</a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        @if ($hasSidebar)
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        @endif

        @if ($modules)
        <ul class="nav navbar-nav">
            @foreach ($modules as $module)
            <li class="active"><a href="{{ $module->mainRoute() }}">{{ $module->name() }} <span class="sr-only">(current)</span></a></li>
            @endforeach
        </ul>
        @endif

        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                {{--@if ($user)--}}
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="dist/img/user2-160x160.jpg" class="user-image" alt=""/>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">Ana Valla Suiza</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="" />
                            <p>Ana Valla Suiza</p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                {{--@endif--}}
            </ul>
        </div>
    </nav>
  </header>