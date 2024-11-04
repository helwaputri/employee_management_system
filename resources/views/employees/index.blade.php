<!DOCTYPE html>
<html>
<head>
    <title>Sistem Menejemen Karyawan</title>
</head>
<body>
    <h1>Daftar Karyawan</h1>

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('employees.index') }}">
        <input type="text" name="search" placeholder="Cari nama atau posisi..." value="{{ $search }}">
        <button type="submit">Cari</button>
    </form>

    <a href="{{ route('employees.create') }}">Tambah Karyawan</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Posisi</th>
            <th>Gaji</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        @foreach ($employees as $employee)
        <tr>
            <td>{{ $employee->id }}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->position }}</td>
            <td>{{ $employee->salary }}</td>
            <td><img src="{{ asset('uploads/' . $employee->photo) }}" width="50" /></td>
            <td>
                <a href="{{ route('employees.show', $employee->id) }}">Lihat</a> |
                <a href="{{ route('employees.edit', $employee->id) }}">Edit</a> |
                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $employees->links() }}
</body>
</html>
