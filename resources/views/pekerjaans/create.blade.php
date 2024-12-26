<!DOCTYPE html>
<html>
<head>
    <title>Buat Lowongan Baru</title>
</head>
<body>
    <h1>Buat Lowongan Baru</h1>
    <form action="{{ route('pekerjaans.store') }}" method="POST">
        @csrf
        <label for="nama">Nama Posisi:</label>
        <input type="text" name="nama" id="nama" required>
        <br>

        <label for="kategori">Kategori:</label>
        <input type="text" name="kategori" id="kategori" required>
        <br>

        <label for="employer">Employer:</label>
        <input type="text" name="employer" id="employer" required>
        <br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
