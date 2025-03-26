<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="active">
            <h1><a href="index.html" class="logo">F.</a></h1>
            <ul class="list-unstyled components mb-5">
                 <!-- Home -->
                 <li class="active">
                    <a href="/admin/home"><span class="fa fa-home"></span> Home</a>
                </li>
                <!-- Kategori -->
                <li>
                    <a href="/admin/kategori"><span class="fa fa-list-alt"></span> Kategori</a>
                </li>
                <!-- Barang -->
                <li>
                    <a href="{{ route('admin.barang') }}"><span class="fa fa-archive"></span> Barang</a>
                </li>
                <li>
                    <a href="/transaksi"><span class="fa fa-archive"></span> Transaksi</a>
                </li>
                <!-- Logout -->
                <li>
                    <a href="/logout"><span class="fa fa-sign-out"></span> Logout</a>
                </li>
            </ul>
        </nav>
        @include('sweetalert::alert')
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 flex-grow-1">
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav">
                            <li class="nav-item {{ Request::is('admin/home') ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('admin/kategori') ? 'active' : '' }}" href="/admin/kategori">Kategori</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('admin/barang') ? 'active' : '' }}" href="{{ route('admin.barang') }}">Barang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('admin/transaksi') ? 'active' : '' }}" href="{{ route('admin.transaksi') }}">Transaksi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            @include('sweetalert::alert')
            <!-- Konten Utama -->
            <div id="ha" class="container" style="margin-top: 70px;">
                @yield('content')
            </div>
        </div>
    </div>

    {{-- javascript --}}
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
