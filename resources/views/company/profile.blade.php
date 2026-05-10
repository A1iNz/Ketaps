<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Perusahaan — Siap Lulus</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { margin: 0; font-family: 'Plus Jakarta Sans', sans-serif; background: #f8fafc; display: flex; min-height: 100vh; }
        .main-content { flex: 1; margin-left: 260px; padding: 32px; }
        .form-card { background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 24px; max-width: 600px; }
        label { display: block; font-size: 12px; font-weight: 800; color: #64748b; margin-bottom: 8px; text-transform: uppercase; }
        input { width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 10px; margin-bottom: 16px; font-family: inherit; box-sizing: border-box; }
        .btn-save { background: #3b82f6; color: #fff; border: none; padding: 12px 24px; border-radius: 10px; font-weight: 800; cursor: pointer; }
    </style>
</head>
<body>
    @include('partials.sidebar-perusahaan')

    <div class="main-content">
        <div style="margin-bottom: 24px;">
            <h1 style="margin: 0; font-size: 24px; font-weight: 800;">Profil Perusahaan</h1>
            <p style="color: #64748b; margin-top: 6px; font-size: 14px;">Lengkapi data instansi Anda agar lebih meyakinkan bagi pelamar.</p>
        </div>

        <div class="form-card">
            <form action="#" method="POST">
                <label>Nama Perusahaan / Instansi</label>
                <input type="text" value="{{ $user->name }}" readonly style="background: #f1f5f9;">

                <label>Email Kontak</label>
                <input type="email" value="{{ $user->email }}" readonly style="background: #f1f5f9;">

                <label>Alamat Lengkap (Opsional)</label>
                <input type="text" placeholder="Masukkan alamat kantor pusat...">

                <label>Website / Portofolio (Opsional)</label>
                <input type="text" placeholder="https://...">

                <button type="button" class="btn-save" onclick="alert('Fitur Update Profil akan segera tersedia!')">Simpan Pembaruan</button>
            </form>
        </div>
    </div>
</body>
</html>