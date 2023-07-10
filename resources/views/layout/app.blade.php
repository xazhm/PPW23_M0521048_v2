<!DOCTYPE html>
<html>

<head>
    <title>MY APP</title>
    <!-- Menambahkan link CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
    .navbar .navbar-toggler {
        border: none;
        outline: none;
        padding: 0;
        background: transparent;
    }

    .navbar .navbar-toggler-icon {
        width: 30px;
        height: 30px;
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%280, 0, 0, 0.5%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }
    </style>
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/tasks9">My App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @guest
                    <!-- Menampilkan link Login -->
                    <li class="nav-item{{ request()->is('auth/login') ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    @else
                    <!-- Menampilkan link Home, Form, Table, dan Logout -->
                    @cannot('access-watcher')
                    <li class="nav-item{{ request()->is('home') ? ' active' : '' }}">
                        <a class="nav-link" href="/home">Home</a>
                    </li>
                    @endcannot
                    @can('access-admin')
                    <li class="nav-item{{ request()->is('form') ? ' active' : '' }}">
                        <a class="nav-link" href="/form">Form</a>
                    </li>
                    <li class="nav-item{{ request()->is('table') ? ' active' : '' }}">
                        <a class="nav-link" href="/table">Table</a>
                    </li>
                    @endcan
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">Logout</button>
                        </form>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5">
        <p>Created with ❤</p>
    </footer>

    <!-- Menambahkan script Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
    // Tambahkan script berikut ini
    document.addEventListener('DOMContentLoaded', function() {
        var navItems = document.querySelectorAll('.navbar-nav .nav-item');
        navItems.forEach(function(item) {
            item.addEventListener('click', function() {
                navItems.forEach(function(navItem) {
                    navItem.classList.remove('active');
                });
                this.classList.add('active');
            });
        });
    });
    </script>
</body>

</html>