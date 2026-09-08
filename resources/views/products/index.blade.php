<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu Warung - Dashboard</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #fcfaf7; color: #1c1917; min-height: 100vh; padding: 30px 20px; }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(15px); } to { opacity: 1; transform: translateY(0); } }
        .wrapper { max-width: 1000px; margin: 0 auto; animation: fadeInUp 0.5s ease-out forwards; }
        .navbar { background: #ffffff; border: 1px solid #f0ede6; border-radius: 20px; padding: 20px 25px; display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; box-shadow: 0 10px 25px rgba(0,0,0,0.02); }
        .nav-left { display: flex; align-items: center; gap: 15px; }
        .back-icon { background: #f5f5f4; color: #78716c; width: 40px; height: 40px; border-radius: 12px; display: flex; align-items: center; justify-content: center; text-decoration: none; font-size: 1.1rem; transition: all 0.2s; }
        .back-icon:hover { background: #e7e5e4; color: #1c1917; }
        .nav-title h1 { font-size: 1.25rem; font-weight: 800; color: #1c1917; }
        .nav-title p { font-size: 0.8rem; color: #78716c; margin-top: 2px; }
        .btn-add { background: #d97706; color: #ffffff; padding: 10px 20px; border-radius: 12px; text-decoration: none; font-weight: 600; font-size: 0.9rem; transition: all 0.2s; box-shadow: 0 4px 12px rgba(217, 119, 6, 0.2); }
        .btn-add:hover { background: #b45309; transform: translateY(-1px); }
        .alert-success { background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; padding: 14px 20px; border-radius: 14px; font-size: 0.9rem; font-weight: 600; margin-bottom: 25px; }
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; margin-bottom: 25px; }
        .stat-card { background: #ffffff; border: 1px solid #f0ede6; border-radius: 18px; padding: 20px; display: flex; justify-content: space-between; align-items: center; }
        .stat-label { font-size: 0.75rem; font-weight: 700; color: #78716c; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 4px; }
        .stat-value { font-size: 1.4rem; font-weight: 800; color: #1c1917; }
        .stat-icon { font-size: 1.5rem; background: #fafaf9; width: 45px; height: 45px; border-radius: 12px; display: flex; align-items: center; justify-content: center; }
        .table-card { background: #ffffff; border: 1px solid #f0ede6; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.02); }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th { background: #fafaf9; color: #78716c; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; padding: 15px 20px; border-bottom: 1px solid #f0ede6; }
        td { padding: 16px 20px; border-bottom: 1px solid #f5f5f4; font-size: 0.9rem; color: #1c1917; vertical-align: middle; }
        tr:hover td { background: #fffbeb33; }
        .menu-name { font-weight: 700; color: #1c1917; }
        .menu-id { font-size: 0.75rem; color: #a8a29e; margin-top: 2px; }
        .menu-desc { color: #78716c; font-size: 0.85rem; max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .menu-price { font-weight: 700; color: #b45309; }
        .badge-stock { display: inline-block; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 700; border: 1px solid transparent; }
        .stock-high { background: #ecfdf5; color: #065f46; border-color: #a7f3d0; }
        .stock-low { background: #fffbeb; color: #b45309; border-color: #fde68a; }
        .stock-empty { background: #fef2f2; color: #991b1b; border-color: #fecaca; }
        .actions-cell { display: flex; gap: 8px; align-items: center; justify-content: center; }
        .btn-action { background: #f5f5f4; color: #57534e; padding: 8px 12px; border-radius: 10px; text-decoration: none; font-size: 0.85rem; font-weight: 600; border: none; cursor: pointer; transition: all 0.2s; }
        .btn-edit:hover { background: #fef3c7; color: #b45309; }
        .btn-delete:hover { background: #fee2e2; color: #991b1b; }
        .empty-row { text-align: center; padding: 40px; color: #a8a29e; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="navbar">
            <div class="nav-left">
                <a href="{{ url('/') }}" class="back-icon" title="Beranda">&larr;</a>
                <div class="nav-title">
                    <h1>Manajemen Menu Warung</h1>
                    <p>Daftar makanan & minuman terdaftar</p>
                </div>
            </div>
            <a href="{{ route('products.create') }}" class="btn-add">+ Tambah Menu</a>
        </div>

        @if(session('success'))
            <div class="alert-success">&check; {{ session('success') }}</div>
        @endif

        <div class="stats-grid">
            <div class="stat-card">
                <div>
                    <div class="stat-label">Total Variasi</div>
                    <div class="stat-value">{{ $products->count() }} Menu</div>
                </div>
                <div class="stat-icon">&#127828;</div>
            </div>
            <div class="stat-card">
                <div>
                    <div class="stat-label">Total Stok</div>
                    <div class="stat-value">{{ $products->sum('stock') }} Porsi</div>
                </div>
                <div class="stat-icon">&#128230;</div>
            </div>
            <div class="stat-card">
                <div>
                    <div class="stat-label">Sistem Status</div>
                    <div class="stat-value" style="color: #059669; font-size: 1.1rem; margin-top: 4px;">&#9679; Online</div>
                </div>
                <div class="stat-icon">&#9881;</div>
            </div>
        </div>

        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th style="width: 60px; text-align: center;">#</th>
                        <th>Nama Menu</th>
                        <th>Deskripsi</th>
                        <th style="text-align: right;">Harga</th>
                        <th style="text-align: center;">Stok</th>
                        <th style="width: 130px; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $index => $product)
                    <tr>
                        <td style="text-align: center; font-weight: 700; color: #a8a29e;">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>
                        <td>
                            <div class="menu-name">{{ $product->name }}</div>
                            <div class="menu-id">ID: #{{ $product->id }}</div>
                        </td>
                        <td>
                            <div class="menu-desc">{{ $product->description ?? '-' }}</div>
                        </td>
                        <td style="text-align: right;">
                            <div class="menu-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                        </td>
                        <td style="text-align: center;">
                            <span class="badge-stock {{ $product->stockClass }}">{{ $product->stockLabel }}</span>
                        </td>
                        <td style="text-align: center;">
                            <div class="actions-cell">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn-action btn-edit" title="Edit">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete" title="Hapus">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="empty-row">Belum ada data menu di dalam database.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
