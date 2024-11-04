<h2>Tambah Karyawan</h2>
<form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    Nama: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Posisi: <input type="text" name="position" required><br>
    Gaji: <input type="number" name="salary" required><br>
    Foto: <input type="file" name="photo"><br>
    <button type="submit">Simpan</button>
</form>
