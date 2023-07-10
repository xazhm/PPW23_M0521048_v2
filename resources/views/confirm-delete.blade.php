@extends('layout.app')

@section('content')
<div class="container">
    <h1>Konfirmasi Hapus Data</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Apakah Anda yakin ingin menghapus data berikut?</h5>
            <p>Nama: {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>
            <form action="/delete/{{ $user->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>
</div>
@endsection