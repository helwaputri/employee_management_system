<h2>Detail Karyawan</h2>
<p>Nama: {{ $employee->name }}</p>
<p>Email: {{ $employee->email }}</p>
<p>Posisi: {{ $employee->position }}</p>
<p>Gaji: {{ $employee->salary }}</p>
<p>Foto: <img src="{{ asset('uploads/' . $employee->photo) }}" width="100" /></p>
