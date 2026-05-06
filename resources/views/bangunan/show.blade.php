<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kostan</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f8f9fa; color: #333; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h1 { font-size: 1.8rem; color: #17a2b8; margin-bottom: 20px; border-bottom: 2px solid #e0e0e0; padding-bottom: 10px; }
        .btn-outline { background-color: transparent; color: #007bff; border: 1px solid #007bff; margin-bottom: 20px; display: inline-block; padding: 8px 15px; border-radius: 4px; text-decoration: none; font-size: 14px; transition: 0.3s; }
        .btn-outline:hover { background-color: #007bff; color: #fff; }
        table { width: 100%; border-collapse: collapse; font-size: 15px; }
        th, td { padding: 12px; border-bottom: 1px solid #f1f1f1; text-align: left; }
        th { width: 35%; color: #555; font-weight: bold; }
        td { color: #222; }
        tr:last-child th, tr:last-child td { border-bottom: none; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Data Kostan</h1>

        <a href="{{ route('bangunan.index') }}" class="btn-outline">&laquo; Kembali ke Daftar</a>

        <table>
            <tr>
                <th>ID Kostan</th>
                <td>: {{ $bangunan->id }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>: {{ $bangunan->alamat }}</td>
            </tr>
            <tr>
                <th>Luas Kamar</th>
                <td>: {{ $bangunan->luas_kamar }} m²</td>
            </tr>
            <tr>
                <th>Jenis Kamar</th>
                <td>: {{ ucfirst($bangunan->jenis_kamar) }}</td>
            </tr>
            <tr>
                <th>Ketersediaan</th>
                <td>: {{ $bangunan->is_full ? 'Penuh' : 'Tersedia' }}</td>
            </tr>
            <tr>
                <th>Harga</th>
                <td>: Rp {{ number_format($bangunan->harga, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Dibuat pada</th>
                <td>: {{ $bangunan->created_at }}</td>
            </tr>
            <tr>
                <th>Diperbarui pada</th>
                <td>: {{ $bangunan->updated_at }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
