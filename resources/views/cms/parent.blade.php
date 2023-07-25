<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> CMS PROJECT 05 | @yield('title') </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('cms/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('cms/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/cms/plugins/bootstarpCss/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href=" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="" class="nav-link">Contact</a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{asset('cms/dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="{{asset('cms/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('cms/dist/img/images.jpg')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Online shop</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./index.html" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard v1</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    @canany(['index-role' , 'create-role' , 'index-permission' , 'create-permission'])
                    <li class="nav-header">Roles && Permissions</li>
                    @canany(['index-role' , 'create-role'])
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fab fa-product-hunt"></i>
                            {{-- <i class="far fa-user"></i> --}}
                            <p>
                                roles
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('index-role')
                            <li class="nav-item">
                                <a href="{{route('roles.index')}}" class="nav-link">
                                    <i class="fas fa-list-ul nav-icon"></i>
                                    {{-- <i class="fas fa-list-ul"></i> --}}
                                    <p>Index</p>
                                </a>
                            </li>
                            @endcan
                            @can('create-role')
                            <li class="nav-item">
                                <a href="{{route('roles.create')}}" class="nav-link">
                                    {{-- <i class="fas fa-plus nav-icon"></i> --}}
                                    <i class="fa-sharp fa-solid fa-folder-plus"></i>
                                    {{-- <i class="fas fa-plus"></i> --}}
                                    <p>Create</p>
                                </a>
                            </li>
                                @endcan
                                <li class="nav-item">
                                    <a href="{{ route('roles.deleted') }}" class="nav-link">
                                        <i class="fas fa-folder-plus"></i>
                                        <p>Deleted Roles</p>
                                    </a>
                                </li>
                        </ul>
                    </li>
                        @endcanany
                    @canany(['index-permission' , 'create-permission'])
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fab fa-product-hunt"></i>
                            {{-- <i class="far fa-user"></i> --}}
                            <p>
                                permission
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        @can('index-permission')
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('permissions.index')}}" class="nav-link">
                                    <i class="fas fa-list-ul nav-icon"></i>
                                    {{-- <i class="fas fa-list-ul"></i> --}}
                                    <p>Index</p>
                                </a>
                            </li>
                            @endcan
                            @can('create-permission')
                            <li class="nav-item">
                                <a href="{{route('permissions.create')}}" class="nav-link">
                                    {{-- <i class="fas fa-plus nav-icon"></i> --}}
                                    <i class="fa-sharp fa-solid fa-folder-plus"></i>
                                    {{-- <i class="fas fa-plus"></i> --}}
                                    <p>Create</p>
                                </a>
                            </li>
                                @endcan
                            <li class="nav-item">
                                <a href="{{ route('permissions.deleted') }}" class="nav-link">
                                    <i class="fas fa-folder-plus"></i>
                                    <p>Deleted Permissions</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                        @endcanany

                    @endcanany
                    @canany(['index-admin' , 'create-admin' , 'index-author' , 'create-author'])
                    <li class="nav-header">User Mangment </li>
                    @canany(['index-admin' , 'create-admin'])
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fab fa-product-hunt"></i>
                            {{-- <i class="far fa-user"></i> --}}
                            <p>
                                admin
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('index-admin')
                            <li class="nav-item">
                                <a href="{{route('admins.index')}}" class="nav-link">
                                    <i class="fas fa-list-ul nav-icon"></i>
                                    {{-- <i class="fas fa-list-ul"></i> --}}
                                    <p>Index</p>
                                </a>
                            </li>
                            @endcan
                            @can('create-admin')
                            <li class="nav-item">
                                <a href="{{route('admins.create')}}" class="nav-link">
                                    {{-- <i class="fas fa-plus nav-icon"></i> --}}
                                    <i class="fa-sharp fa-solid fa-folder-plus"></i>
                                    {{-- <i class="fas fa-plus"></i> --}}
                                    <p>Create</p>
                                </a>
                            </li>
                                @endcan
                                <li class="nav-item">
                                    <a href="{{ route('admins.deleted') }}" class="nav-link">
                                        <i class="fas fa-folder-plus"></i>
                                        <p>Deleted Admins</p>
                                    </a>
                                </li>

                        </ul>
                    </li>
                        @endcan
                        @canany(['index-author', 'create-author'])
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fab fa-product-hunt"></i>
                            {{-- <i class="far fa-user"></i> --}}
                            <p>
                                author
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('index-author')
                            <li class="nav-item">
                                <a href="{{route('authors.index')}}" class="nav-link">
                                    <i class="fas fa-list-ul nav-icon"></i>
                                    {{-- <i class="fas fa-list-ul"></i> --}}
                                    <p>Index</p>
                                </a>
                            </li>
                            @endcan
                            @can('create-author')
                            <li class="nav-item">
                                <a href="{{route('authors.create')}}" class="nav-link">
                                    {{-- <i class="fas fa-plus nav-icon"></i> --}}
                                    <i class="fa-sharp fa-solid fa-folder-plus"></i>
                                    {{-- <i class="fas fa-plus"></i> --}}
                                    <p>Create</p>
                                </a>
                            </li>
                                @endcan
                                <li class="nav-item">
                                    <a href="{{ route('authors.deleted') }}" class="nav-link">
                                        <i class="fas fa-folder-plus"></i>
                                        <p>Deleted Authors</p>
                                    </a>
                                </li>
                        </ul>
                    </li>
                        @endcanany
                    @endcanany
                    @canany(['index-product' , 'create-product' , 'index-homepage' , 'create-homepage' , 'index-opinion','create-opinion'])
                        <li class="nav-header">accessors</li>
                    @canany(['index-product', 'create-product'])

                            <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fab fa-product-hunt"></i>
                            {{-- <i class="far fa-user"></i> --}}
                            <p>
                                product
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('index-product')
                            <li class="nav-item">
                                <a href="{{route('products.index')}}" class="nav-link">
                                    <i class="fas fa-list-ul nav-icon"></i>
                                    {{-- <i class="fas fa-list-ul"></i> --}}
                                    <p>Index</p>
                                </a>
                            </li>
                            @endcan
                            @can('create-product')
                            <li class="nav-item">
                                <a href="{{route('products.create')}}" class="nav-link">
                                    {{-- <i class="fas fa-plus nav-icon"></i> --}}
                                    <i class="fa-sharp fa-solid fa-folder-plus"></i>
                                    {{-- <i class="fas fa-plus"></i> --}}
                                    <p>Create</p>
                                </a>
                            </li>
                                @endcan
                                <li class="nav-item">
                                    <a href="{{ route('products.deleted') }}" class="nav-link">
                                        <i class="fas fa-folder-plus"></i>
                                        <p>Deleted Products</p>
                                    </a>
                                </li>
                        </ul>
                    </li>
                        @endcanany

                    @canany(['index-homepage' , 'create-homepage'])
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fab fa-product-hunt"></i>
                            {{-- <i class="far fa-user"></i> --}}
                            <p>
                                home page
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('index-homepage')
                            <li class="nav-item">
                                <a href="{{route('homepages.index')}}" class="nav-link">
                                    <i class="fas fa-list-ul nav-icon"></i>
                                    {{-- <i class="fas fa-list-ul"></i> --}}
                                    <p>Index</p>
                                </a>
                            </li>
                            @endcan
                            @can('create-homepage')
                            <li class="nav-item">
                                <a href="{{route('homepages.create')}}" class="nav-link">
                                    {{-- <i class="fas fa-plus nav-icon"></i> --}}
                                    <i class="fa-sharp fa-solid fa-folder-plus"></i>
                                    {{-- <i class="fas fa-plus"></i> --}}
                                    <p>Create</p>
                                </a>
                            </li>
                                @endcan
                                <li class="nav-item">
                                    <a href="{{ route('homepages.deleted') }}" class="nav-link">
                                        <i class="fas fa-folder-plus"></i>
                                        <p>Deleted HomePages</p>
                                    </a>
                                </li>
                        </ul>
                    </li>
                        @endcanany
                     @canany(['index-opinion', 'create-opinion'])
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fab fa-product-hunt"></i>
                            {{-- <i class="far fa-user"></i> --}}
                            <p>
                                opinion
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('index-opinion')
                            <li class="nav-item">
                                <a href="{{route('opinions.index')}}" class="nav-link">
                                    <i class="fas fa-list-ul nav-icon"></i>
                                    {{-- <i class="fas fa-list-ul"></i> --}}
                                    <p>Index</p>
                                </a>
                            </li>
                            @endcan
                            @can('create-opinion')
                            <li class="nav-item">
                                <a href="{{route('opinions.create')}}" class="nav-link">
                                    {{-- <i class="fas fa-plus nav-icon"></i> --}}
                                    <i class="fa-sharp fa-solid fa-folder-plus"></i>
                                    {{-- <i class="fas fa-plus"></i> --}}
                                    <p>Create</p>
                                </a>
                            </li>
                                @endcan
                                <li class="nav-item">
                                    <a href="{{ route('opinions.deleted') }}" class="nav-link">
                                        <i class="fas fa-folder-plus"></i>
                                        <p>Deleted Opinions</p>
                                    </a>
                                </li>
                        </ul>
                    </li>
                  @endcanany

                    @endcanany



                    <li class="nav-item">

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-gear"></i>

                            <p>
                                Setting
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">




                            {{-- <i class="fa-solid fa-gear"></i> --}}
                            <li class="nav-header"></li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    {{-- <i class="fas fa-user-edit nav-icon"></i> --}}
                                    <i class="fa-regular fa-user-pen"></i>
                                    {{-- <i class="far fa-user-edit"></i> --}}
                                    <p>Edit Your Profile</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-lock-open nav-icon"></i>
                                    {{-- <i class="far fa-lock-open"></i> --}}
                                    <p>Change Password</p>
                                </a>
                            </li>

                            @auth('admin')
                                <li class="nav-item">
                                    <a href="{{ route('logout', ['guard' => 'admin']) }}" class="nav-link">
                                        <i class="far fa-sign-out nav-icon"></i>
                                        <i class="fas fa-sign-out"></i>
                                        <p>Logout (Admin)</p>
                                    </a>
                                </li>
                            @endauth

                            <!-- Author logout button -->
                            @auth('author')
                                <li class="nav-item">
                                    <a href="{{ route('logout', ['guard' => 'author']) }}" class="nav-link">
                                        <i class="far fa-sign-out nav-icon"></i>
                                        <i class="fas fa-sign-out"></i>
                                        <p>Logout (Author)</p>
                                    </a>
                                </li>
                            @endauth

                        </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('main-title')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">@yield('sub-title')</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        @yield('content')
    </div>
    <footer class="main-footer">
        <strong>Copyright &copy; {{ now()->year }} - {{now()->year+1}} <a href="https://adminlte.io">{{env('app_name')}}</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> {{env('APP_VERSION')}}
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('cms/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('cms/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('cms/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('cms/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('cms/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('cms/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('cms/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('cms/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('cms/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('cms/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('cms/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('cms/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('cms/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('cms/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('cms/dist/js/pages/dashboard.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script src="{{asset('cms/jss/crud.js')}}"></script>

@yield('scripts')
</body>
</html>
