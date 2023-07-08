@extends('layout.app')

@section('content')
<div class="container">
    <h1>Data Tabel</h1>
    <form id="deleteForm" action="{{ route('delete-confirm', ['id' => 0]) }}" method="POST"
        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data yang dipilih?')">
        @csrf
        @method('DELETE')
        <table class="table">
            <thead>
                <tr>
                    <th>
                        <input class="form-check-input" type="checkbox" id="selectAll" hidden>
                    </th>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $counter = 1;
                @endphp
                @foreach ($users as $user)
                <tr>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="selectedUsers[]"
                                value="{{ $user->id }}" checked>
                        </div>
                    </td>
                    <td>{{ $counter++ }}</td>
                    <td>
                        <img src="{{ asset('storage/images/'.$user->image) }}" alt="User Image" width="50" height="50">
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <div class="normal-actions">
                            <a href="/update/{{ $user->id }}" class="btn btn-primary">Update</a>
                            <a href="/info/{{ $user->id }}" class="btn btn-info">Informasi</a>
                            <a href="{{ route('confirm-delete', ['id' => $user->id]) }}"
                                class="btn btn-danger">Hapus</a>
                        </div>
                        <div class="delete-actions" style="display: none;">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="selectedUsers[]"
                                    value="{{ $user->id }}" checked>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="delete-actions" style="display: none; padding-bottom: 10px;">
            <button type="submit" class="btn btn-danger">Delete</button>
        </div>
        <div class="form-group">
            <button id="deleteButton" type="button" class="btn btn-danger">Hapus yang Dipilih</button>
            <button id="cancelButton" type="button" class="btn btn-secondary" style="display: none;">CANCEL</button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var deleteButton = document.getElementById('deleteButton');
    var cancelButton = document.getElementById('cancelButton');
    var checkboxes = document.querySelectorAll('.form-check-input');
    var normalActions = document.querySelectorAll('.normal-actions');
    var deleteActions = document.querySelectorAll('.delete-actions');

    document.getElementById('selectAll').addEventListener('change', function() {
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = this.checked;
        });
    });

    deleteButton.addEventListener('click', function() {
        var checkedCount = 0;

        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                checkedCount++;
            }
        });

        if (checkedCount === 0) {
            alert('Pilih setidaknya satu data untuk dihapus');
            return false;
        }

        normalActions.forEach(function(action) {
            action.style.display = 'none';
        });

        deleteActions.forEach(function(action) {
            action.style.display = 'block';
        });

        deleteButton.style.display = 'none';
        cancelButton.style.display = 'block';
    });

    cancelButton.addEventListener('click', function() {
        normalActions.forEach(function(action) {
            action.style.display = 'block';
        });

        deleteActions.forEach(function(action) {
            action.style.display = 'none';
        });

        deleteButton.style.display = 'block';
        cancelButton.style.display = 'none';
    });
});
</script>
@endsection