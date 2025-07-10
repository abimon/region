<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Master Guide | {{ $title }}</title>
    <!-- plugins:css -->
    <link rel="shortcut icon" href="/logo.png" type="image/x-icon" />
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/storage/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.css"
        integrity="sha512-9Tu/Gu0+bXW+oGrTGJOeNz2RG4MaF52FznXCciXFrXehFTLF6phJnJFNVOU2mmj9FWIXk9ap0H1ocygu1ZTRqg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>
    <!-- container scroller -->
    <div class="container-scroller">
        <!-- Navbar -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="/">
                    <img src="/storage/images/Logo.png" alt="logo" class="logo-dark" />
                    <img src="/storage/images/Logo.png" alt="logo-light" class="logo-light">
                </a>
                <a class="navbar-brand brand-logo-mini" href="/"><img src="/logo.png" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center">
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
                        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img class="img-xs rounded-circle ms-2" src="{{Auth::user()->avatar ? asset(Auth::user()->avatar) : '/storage/images/user.png'}}" alt="Profile image">
                            <span class="font-weight-normal"> {{Auth()->user()->name}} </span></a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <p class="mb-1 mt-3">{{Auth()->user()->name}}</p>
                                <p class="font-weight-light text-muted mb-0">{{Auth()->user()->email}}</p>
                            </div>
                            <a class="dropdown-item" href="/profile">
                                <i class="dropdown-item-icon icon-user text-primary"></i> My
                                Profile</a>
                            <a class="dropdown-item">
                                <i class="dropdown-item-icon icon-layers text-primary"></i>Programs</a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="dropdown-item-icon icon-power text-danger"></i>Sign Out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- Navbar ends -->
        <!-- page body wrapper -->
        <div class="container-fluid page-body-wrapper">
            <!-- Side bar-->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item navbar-brand-mini-wrapper">
                        <a class="nav-link navbar-brand brand-logo-mini" href="/">
                            <img src="/storage/images/Logo.png" alt="logo" /></a>
                    </li>
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                            <div class="profile-image">
                                <img class="img-xs rounded-circle"
                                    src="{{Auth::user()->avatar ? asset(Auth::user()->avatar) : '/storage/images/user.png'}}"
                                    alt="profile image">
                                <div class="dot-indicator bg-success"></div>
                            </div>
                            <div class="text-wrapper">
                                <p class="profile-name">{{Auth::user()->name}}</p>
                                <p class="designation">{{Auth::user()->role ? Auth::user()->role : 'Guest'}}</p>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <span class="menu-title">Dashboard</span>
                            <i class="icon-screen-desktop menu-icon"></i>
                        </a>
                    </li>
                    <!-- <li class="nav-item nav-category"><span class="nav-link">CLIENT</span></li> -->
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#articles" aria-expanded="false"
                            aria-controls="articles">
                            <span class="menu-title">Articles</span>
                            <i class="icon-people menu-icon"></i>
                        </a>
                        <div class="collapse" id="articles">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('articles.index') }}">View Articles</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('articles.create') }}">Create Article</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#lessons" aria-expanded="false"
                            aria-controls="lessons">
                            <span class="menu-title">Lessons</span>
                            <i class="icon-people menu-icon"></i>
                        </a>
                        <div class="collapse" id="lessons">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('lessons.index') }}">View Articles</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('lessons.create') }}">Create Article</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- main panel -->
            <div class="main-panel">
                <!-- content wrapper -->
                <div class="content-wrapper">
                    @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- footer -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright &copy;
                            {{date('Y')}} Master Guide. All rights reserved. </span>
                    </div>
                </footer>
                <!-- footer ends -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- Add program Modal for universal access -->
    <!-- modal -->
    <div class="modal fade" id="createProgramModal" tabindex="-1" role="dialog" aria-labelledby="createProgramModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createProgramModalLabel">Create Program</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="title" class="form-label">Program Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="code" class="form-label">Program Code</label>
                            <input type="text" class="form-control" id="code" name="code" required placeholder="e.g. CEMA-MAL-2023">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Custom js for this page -->
    <script src="/storage/js/off-canvas.js"></script>
    <!-- bootstrap js CDNs -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.min.js"
        integrity="sha384-VQqxDN0EQCkWoxt/0vsQvZswzTHUVOImccYmSyhJTp7kGtPed0Qcx8rK9h9YEgx+"
        crossorigin="anonymous"></script>
</body>

</html>