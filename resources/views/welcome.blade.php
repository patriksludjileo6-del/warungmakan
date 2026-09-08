<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung Nusantara - Sistem Manajemen Menu</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #fcfaf7; color: #1c1917; min-height: 100vh; display: flex; flex-direction: column; justify-content: space-between; padding: 40px 20px; }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .container { max-width: 900px; margin: 0 auto; width: 100%; text-align: center; animation: fadeInUp 0.6s ease-out forwards; }
        .badge { display: inline-block; background: #fef3c7; color: #92400e; font-size: 0.75rem; font-weight: 700; padding: 6px 14px; border-radius: 20px; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 20px; border: 1px solid #fde68a; }
        h1 { font-size: 3rem; font-weight: 800; color: #1c1917; line-height: 1.2; margin-bottom: 20px; }
        h1 span { color: #d97706; }
        p { font-size: 1.1rem; color: #78716c; max-width: 600px; margin: 0 auto 40px auto; line-height: 1.6; }
        .actions { display: flex; justify-content: center; gap: 15px; flex-wrap: wrap; margin-bottom: 60px; }
        .btn-primary { background: #1c1917; color: #ffffff; padding: 14px 28px; border-radius: 14px; text-decoration: none; font-weight: 600; font-size: 0.95rem; transition: all 0.2s; box-shadow: 0 10px 20px rgba(0,0,0,0.05); }
        .btn-primary:hover { background: #d97706; transform: translateY(-2px); }
        .btn-secondary { background: #ffffff; color: #1c1917; padding: 14px 28px; border-radius: 14px; text-decoration: none; font-weight: 600; font-size: 0.95rem; border: 1px solid #e7e5e4; transition: all 0.2s; }
        .btn-secondary:hover { background: #f5f5f4; border-color: #d97706; transform: translateY(-2px); }
        .features { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; text-align: left; }
        .feature-card { background: #ffffff; padding: 25px; border-radius: 20px; border: 1px solid #f0ede6; box-shadow: 0 8px 20px rgba(0,0,0,0.02); transition: all 0.2s; }
        .feature-card:hover { transform: translateY(-3px); box-shadow: 0 12px 25px rgba(0,0,0,0.05); }
        .feature-num { font-size: 0.8rem; font-weight: 800; color: #d97706; background: #fffbeb; width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-bottom: 12px; }
        .feature-title { font-size: 1rem; font-weight: 700; color: #1c1917; margin-bottom: 6px; }
        .feature-desc { font-size: 0.85rem; color: #78716c; line-height: 1.5; }
        footer { text-align: center; font-size: 0.8rem; color: #a8a29e; margin-top: 40px; }
    </style>
</head>
<body>
    <div class="container">
        <span class="badge">Praktikum Laravel 12</span>
        <h1>Warung Makan <span>Nusantara</span></h1>
        <p>Sistem informasi manajemen menu makanan & minuman berbasis Model, View, Controller, serta Migration Table Product Laravel.</p>

        <div class="actions">
            <a href="{{ route('products.index') }}" class="btn-primary">Eksplorasi Daftar Menu</a>
            <a href="{{ route('products.create') }}" class="btn-secondary">+ Tambah Menu Baru</a>
        </div>

        <div class="features">
            <div class="feature-card">
                <div class="feature-num">01</div>
                <div class="feature-title">Migration & Database</div>
                <div class="feature-desc">Skema tabel produk terstruktur lengkap dengan tipe data harga dan stok presisi.</div>
            </div>
            <div class="feature-card">
                <div class="feature-num">02</div>
                <div class="feature-title">Resource Controller</div>
                <div class="feature-desc">Operasi CRUD berjalan utuh terikat langsung dengan model Eloquent Laravel.</div>
            </div>
            <div class="feature-card">
                <div class="feature-num">03</div>
                <div class="feature-title">Tinker Integration</div>
                <div class="feature-desc">Mendukung pengujian dan manipulasi data instan via Artisan Console Shell.</div>
            </div>
        </div>
    </div>

    <footer>
        &copy; 2026 Warung Makan Nusantara &bull; Laravel Framework Architecture
    </footer>
</body>
</html>
