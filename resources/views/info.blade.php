@extends('layout.app')

@section('content')


<body>
    <div class="container">
        <h1>Informasi User</h1>
        <p>ID User: {{ $user->id }}</p>
        <p>Nama: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <p>Data ditambahkan pada tanggal: {{ $user->created_at }}</p>
        <a href="/table" class="btn btn-warning">KEMBALI KE TABEL</a>
    </div>

    <!-- Menambahkan script Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
@endsection