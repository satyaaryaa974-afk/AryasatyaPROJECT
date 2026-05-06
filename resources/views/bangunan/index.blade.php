<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kostan</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f8f9fa; color: #333; margin: 0; padding: 20px; }
        .container { max-width: 900px; margin: 0 auto; background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h1 { font-size: 1.8rem; color: #4CAF50; margin-bottom: 20px; border-bottom: 2px solid #e0e0e0; padding-bottom: 10px; }
        .alert-success { background-color: #d4edda; color: #155724; padding: 12px; border-radius: 5px; margin-bottom: 15px; border: 1px solid #c3e6cb; }
        .btn { display: inline-block; padding: 8px 12px; text-decoration: none; border-radius: 4px; font-size: 14px; transition: 0.3s; }
        .btn-primary { background-color: #007bff; color: white; border: none; }
        .btn-primary:hover { background-color: #0056b3; }
        .btn-info { background-color: #17a2b8; color: white; }
        .btn-info:hover { background-color: #117a8b; }
        .btn-warning { background-color: #ffc107; color: #212529; }
        .btn-warning:hover { background-color: #e0a800; }
        .btn-danger { background-color: #dc3545; color: white; cursor: pointer; border: none; }
        .btn-danger:hover { background-color: #c82333; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; font-size: 14px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; }
        tr:hover { background-color: #f1f1f1; }
        .pagination-container { margin-top: 20px; text-align: center; }
        .pagination { display: flex; list-style: none; padding: 0; justify-content: center; gap: 5px; }
        .pagination li a, .pagination li span { display: block; padding: 8px 12px; background: #fff; border: 1px solid #ddd; border-radius: 4px; text-decoration: none; color: #007bff; }
        .pagination li.active span { background: #007bff; color: white; border-color: #007bff; }
        .pagination li a:hover { background: #e9ecef; }
        /* Memastikan SVG tailwind pagination default rapi */
        .pagination-container svg { width: 20px; height: 20px; }
        .pagination-container nav div.hidden { display: block !important; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Kostan</h1>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <div style="margin-bottom: 15px;">
            <a href="{{ route('bangunan.create') }}" class="btn btn-primary">+ Tambah Data Baru</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Alamat</th>
                    <th>Luas Kamar</th>
                    <th>Jenis Kamar</th>
                    <th>Full</th>
                    <th>Harga</th>
                    <th style="min-width: 170px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bangunans as $index => $item)
                    <tr>
                        <td>{{ $bangunans->firstItem() + $index }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->luas_kamar }} m²</td>
                        <td>{{ ucfirst($item->jenis_kamar) }}</td>
                        <td>{{ $item->is_full ? 'Penuh' : 'Tersedia' }}</td>
                        <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('bangunan.show', $item->id) }}" class="btn btn-info">></a>
                            <a href="{{ route('bangunan.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('bangunan.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center;">Tidak ada data kostan tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination Section -->
        <div class="pagination-container">
            {{ $bangunans->links() }}
        </div>
    </div>
</body>
</html>