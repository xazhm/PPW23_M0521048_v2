@extends('layout.app')

@section('content')

<body>
    <div class="container">
        <h1>Selamat Datang di Halaman Home</h1>
        <p>Tugas: Home, View Table, and Form</p>
        <ul class="nav">
            <li class="nav-item"><a href="/form" class="btn btn-primary">Tambah Data</a></li>
        </UL>
        <BR>
        <ul class="nav">
            <li class=" nav-item"><a class="btn btn-primary" href="/table">Lihat Tabel</a></li>
        </ul>
    </div>

    <div class="container mt-4">
        <h2>Riwayat Submit</h2>
        <ul class="list-group">
            @if ($submissions->count() > 0)
            <li class="list-group-item">{{ $submissions->last()->name }} - {{ $submissions->last()->email }}</li>
            @else
            <li class="list-group-item">Tidak ada data submit</li>
            @endif
        </ul>
    </div>

    <!-- Menambahkan script Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
@endsection