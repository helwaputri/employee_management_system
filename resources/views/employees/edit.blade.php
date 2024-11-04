<h2>Edit Karyawan</h2>
<form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    Nama: <input type="text" name="name" value="{{ $employee->name }}" required><br>
    Email: <input type="email" name="email" value="{{ $employee->email }}" required><br>
    Posisi: <input type="text" name="position" value="{{ $employee->position }}" required><br>
    Gaji: <input type="number" name="salary" value="{{ $employee->salary }}" required><br>
    Foto: <input type="file" name="photo"><br>
    <button type="submit">Simpan</button>
</form>
