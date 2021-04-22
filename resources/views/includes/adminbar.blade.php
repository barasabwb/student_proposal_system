
<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Admin</div>
        <div class="list-group list-group-flush">
            <a href="{{route('admin.supervisors')}}" class="list-group-item list-group-item-action bg-light">Supervisors</a>
            <a href="{{route('admin.students')}}" class="list-group-item list-group-item-action bg-light">Students</a>
{{--            <a href="{{route('admin.adduser')}}" class="list-group-item list-group-item-action bg-light">Add User</a>--}}
{{--            <a href="#" class="list-group-item list-group-item-action bg-light">Supervisors</a>--}}
{{--            <a href="#" class="list-group-item list-group-item-action bg-light">Students</a>--}}
            <a href="{{route('files.index')}}" class="list-group-item list-group-item-action bg-light">Submitted Files</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Approved Files Progress</a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
{{--            <label class="switch" >--}}
{{--                <input type="checkbox" id="menu-toggle" name="check"   checked>--}}
{{--                <span class="slider round"  ></span>--}}
{{--            </label>--}}

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
{{--                    <li class="nav-item active">--}}
{{--                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#">Link</a>--}}
{{--                    </li>--}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{auth()->user()->name}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">

                    </li>
                </ul>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form class="form-inline my-2 my-lg-0" id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </nav>
