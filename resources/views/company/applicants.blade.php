<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pelamar — Siap Lulus</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { margin: 0; font-family: 'Plus Jakarta Sans', sans-serif; background: #f8fafc; display: flex; min-height: 100vh; }
        .main-content { flex: 1; margin-left: 260px; padding: 32px; }
    </style>
</head>
<body>
    @include('partials.sidebar-perusahaan')

    <div class="main-content">
        <div style="margin-bottom: 24px;">
            <h1 style="margin: 0; font-size: 24px; font-weight: 800;">Daftar Kandidat / Pelamar</h1>
            <p style="color: #64748b; margin-top: 6px; font-size: 14px;">Tinjau lamaran yang masuk untuk lowongan kerja Anda.</p>
        </div>

        <div style="background: #fff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 60px; text-align: center;">
            <div style="font-size: 40px; margin-bottom: 16px;">📂</div>
            <h3 style="margin: 0; color: #0f172a; font-weight: 800;">Fitur Sedang Dikembangkan</h3>
            <p style="color: #64748b; font-size: 14px; max-width: 400px; margin: 8px auto 0 auto;">
                Data pelamar akan muncul di sini setelah tabel relasi lamaran kerja dibuat oleh pengguna berstatus SISWA.
            </p>
        </div>
    </div>
</body>
</html>