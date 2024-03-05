<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="uploads/favicon.png">

    <title>Panoul de control</title>

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/font_awesome_5_free.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap-timepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/duotone-dark.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/iziToast.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/fontawesome-iconpicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap4-toggle.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/components.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/spacing.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/custom.css')}}">

    <script src="{{asset('dist/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('dist/js/popper.min.js')}}"></script>
    <script src="{{asset('dist/js/tooltip.js')}}"></script>
    <script src="{{asset('dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dist/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('dist/js/moment.min.js')}}"></script>
    <script src="{{asset('dist/js/stisla.js')}}"></script>
    <script src="{{asset('dist/js/jscolor.js')}}"></script>
    <script src="{{asset('dist/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('dist/js/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{asset('dist/js/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('dist/js/summernote-bs4.js')}}"></script>
    <script src="{{asset('dist/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dist/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('dist/js/iziToast.min.js')}}"></script>
    <script src="{{asset('dist/js/fontawesome-iconpicker.js')}}"></script>
    <script src="{{asset('dist/js/bootstrap4-toggle.min.js')}}"></script>
</head>

<body>
<div id="app">
    <div class="main-wrapper">

        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                </ul>
            </form>
            <ul class="navbar-nav navbar-right">
                <li class="nav-link">
                    <a href="/" target="_blank" class="btn btn-warning">Site-ul principal</a>
                </li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="{{ Auth::user()->image }}" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> Editare profil
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Deloghează-te
                            </button>
                        </form>
                    </div>
                </li>

            </ul>
        </nav>



        <div class="main-sidebar">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <style>
                        .logotype img {
                            width: 60px;
                            height: 50px;
                            overflow: hidden;
                            margin-top: 4px;
                            margin-bottom: 10px;
                        }
                    </style>
                    <div class="logotype">
                        <img src="{{asset('./assets/img/logo.gif')}}" class="img-fluid">
                    </div>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="#"></a>
                </div>

                <ul class="sidebar-menu">

                    <li class="active"><a class="nav-link" href="/admin"><i class="fas fa-home"></i> <span>Acasă</span></a></li>

                    <li class="nav-item dropdown active">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-pencil-alt"></i><span>Postează</span></a>
                        <ul class="dropdown-menu">
                            <li class="active"><a class="nav-link" href="/admin/anime/create"><i class="fas fa-angle-right"></i> Adaugă o serie</a></li>
                            <li class=""><a class="nav-link" href="/admin/episode/create"><i class="fas fa-angle-right"></i> Adaugă un episod</a></li>
                        </ul>
                    </li>

                    <li class=""><a class="nav-link" href="/admin/animes"><i class="fas fa-list"></i> <span>Lista de serii</span></a></li>

                    <li class=""><a class="nav-link" href="/admin/episodes"><i class="fas fa-bars"></i> <span>Lista episoade</span></a></li>

                    <li class=""><a class="nav-link" href="#"><i class="fas fa-users"></i> <span>Useri</span></a></li>

                    <li class=""><a class="nav-link" href="#"><i class="fas fa-envelope"></i> <span>Mesaje recrutari</span></a></li>

                </ul>
            </aside>
        </div>

        <div class="main-content">
            @yield('content')
        </div>
    </div>
</div>

<script src="{{asset('dist/js/scripts.js')}}"></script>
<script src="{{asset('dist/js/custom.js')}}"></script>

</body>
</html>
