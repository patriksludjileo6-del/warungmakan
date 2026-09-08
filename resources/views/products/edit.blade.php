<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu - Warung Nusantara</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #fcfaf7; color: #1c1917; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .card { background: #ffffff; width: 100%; max-width: 550px; border-radius: 24px; padding: 40px; box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05); border: 1px solid #f0ede6; animation: fadeInUp 0.5s ease-out forwards; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; padding-bottom: 15px; border-bottom: 1px solid #f0ede6; }
        .subtitle { font-size: 0.75rem; font-weight: 700; color: #d97706; text-transform: uppercase; letter-spacing: 1px; }
        .title { font-size: 1.5rem; font-weight: 800; color: #1c1917; margin-top: 4px; }
        .back-btn { background: #f5f5f4; color: #78716c; width: 38px; height: 38px; border-radius: 12px; display: flex; align-items: center; justify-content: center; text-decoration: none; font-size: 1.1rem; transition: all 0.2s; }
        .back-btn:hover { background: #e7e5e4; color: #1c1917; }
        .alert-error { background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; padding: 12px 16px; border-radius: 12px; font-size: 0.85rem; margin-bottom: 20px; }
        .alert-error ul { padding-left: 18px; margin-top: 4px; }
        .form-group { margin-bottom: 20px; }
        .form-label { display: block; font-size: 0.8rem; font-weight: 700; color: #57534e; text-transform: uppercase; margin-bottom: 8px; letter-spacing: 0.5px; }
        .form-input { width: 100%; padding: 12px 16px; background: #fafaf9; border: 1px solid #e7e5e4; border-radius: 12px; font-size: 0.95rem; color: #1c1917; outline: none; transition: all 0.2s; }
        .form-input:focus { background: #ffffff; border-color: #d97706; box-shadow: 0 0 0 4px rgba(217, 119, 6, 0.1); }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
        .footer-actions { display: flex; justify-content: flex-end; gap: 10px; margin-top: 30px; padding-top: 20px; border-top: 1px solid #f0ede6; }
        .btn-cancel { background: #f5f5f4; color: #57534e; padding: 12px 20px; border-radius: 12px; text-decoration: none; font-weight: 600; font-size: 0.9rem; transition: all 0.2s; }
        .btn-cancel:hover { background: #e7e5e4; }
        .btn-submit { background: #1c1917; color: #ffffff; padding: 12px 24px; border-radius: 12px; border: none; font-weight: 600; font-size: 0.9rem; cursor: pointer; transition: all 0.2s; }
        .btn-submit:hover { background: #d97706; transform: translateY(-1px); }
    </style>
</head>
<body>
    <div class="card">
        <div class="header">
            <div>
                <div class="subtitle">Pembaruan Data</div>
                <div class="title">Edit Menu Kuliner</div>
            </div>
            <a href="{{ route('products.index') }}" class="back-btn" title="Kembali">&larr;</a>
        </div>

        @if ($errors->any())
            <div class="alert-error">
                <strong>Periksa kembali inputan Anda:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="form-label">Nama Kuliner / Menu</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label">Deskripsi & Komposisi</label>
                <textarea name="description" rows="3" class="form-input" style="resize: vertical;">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Harga Jual (Rp)</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" class="form-input" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Stok Porsi</label>
                    <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="form-input" required>
                </div>
            </div>

            <div class="footer-actions">
                <a href="{{ route('products.index') }}" class="btn-cancel">Batal</a>
                <button type="submit" class="btn-submit">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</body>
</html>
