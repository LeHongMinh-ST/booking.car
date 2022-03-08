<header class='mb-3'>
    <nav class="navbar navbar-expand navbar-light ">
        <div class="container-fluid">
            @yield('header')


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown me-3">
                        <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <h6 class="dropdown-header">Notifications</h6>
                            </li>
                            <li><a class="dropdown-item">No notification available</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end me-3">
                                <h6 class="mb-0 text-gray-600">{{ auth('admin')->user()->name }}</h6>
                                <p class="mb-0 text-sm text-gray-600">{{ auth('admin')->user()->role->name }}</p>
                            </div>
                            <div class="user-img d-flex align-items-center">
                                <div class="avatar avatar-md">
                                    @if(auth('admin')->user()->thumbnail)
                                        <img src="{{ auth('admin')->user()->thumbnail }}">
                                    @else
                                        <img src="{{ asset('assets/images/faces/1.jpg') }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                        style="min-width: 11rem;">
                        <li>
                            <h6 class="dropdown-header">Xin chào, {{ auth('admin')->user()->name }}!</h6>
                        </li>
                        <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> Thông tin</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="post" method="{{ route('admin.logout') }}">
                                @csrf
                                <button class="dropdown-item" type="submit"><i
                                        class="icon-mid bi bi-box-arrow-left me-2"></i>
                                    Đăng xuất
                                </button>

                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
