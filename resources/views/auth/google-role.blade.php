<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Peran Google — Siap Lulus Ketapang</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Fraunces:opsz,wght@9..144,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <style>
        /* Desain Khusus Kartu Pilihan Role */
        .role-card {
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            padding: 16px 20px; 
            background: #fff; 
            border: 1px solid #e2e8f0; 
            border-radius: 16px; 
            text-decoration: none; 
            transition: all 0.3s ease; 
            box-shadow: 0 2px 4px rgba(0,0,0,0.02);
            margin-bottom: 16px;
        }
        .role-card:hover {
            border-color: #4285F4; /* Warna Biru Google */
            transform: translateY(-2px); 
            box-shadow: 0 10px 15px -3px rgba(66, 133, 244, 0.1);
        }
    </style>
</head>
<body>
    <div class="canvas">
        <a href="{{ route('index') }}" style="position:fixed;top:12px;left:12px;z-index:999;display:flex;align-items:center;gap:6px;padding:7px 13px;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.15);border-radius:8px;font-family:'Plus Jakarta Sans',sans-serif;font-size:11px;color:rgba(255,255,255,.7);text-decoration:none;transition:.15s;" onmouseover="this.style.background='rgba(255,255,255,.16)'" onmouseout="this.style.background='rgba(255,255,255,.08)'">
            ← Beranda
        </a>
        
        <div class="left">
            <div class="left-mesh">
                <div class="orb1"></div>
                <div class="orb2"></div>
            </div>
            <div class="left-content">
                <div class="brand">
                    <div class="brand-hex">
                        <svg viewBox="0 0 24 24" fill="none"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" stroke="white" stroke-width="2.2" stroke-linecap="round" /></svg>
                    </div>
                    <div>
                        <div class="brand-name">Siap Lulus</div>
                        <div class="brand-sub">Ketapang, Kalimantan Barat</div>
                    </div>
                </div>
                <div class="left-headline">Satu platform,<br><span class="accent">tiga pintu</span><br>menuju masa depan</div>
                <div class="left-desc">Siswa, perusahaan, dan lembaga pelatihan terhubung dalam satu ekosistem digital untuk Ketapang yang lebih maju.</div>
            </div>
        </div>

        <div class="right">
            <div class="form-wrap" style="width: 100%; max-width: 420px; margin: 0 auto;">
                
                <div class="form-header">
                    <div class="form-eyebrow">
                        <div class="ey-dot" style="background:#4285F4"></div>
                        <span class="ey-txt" style="color:#4285F4; text-transform: uppercase; font-weight: 800; letter-spacing: 1px;">Google Auth</span>
                    </div>
                    <div class="form-title">Masuk sebagai apa?</div>
                    <div class="form-sub">Pilih peranmu untuk melanjutkan dengan akun Google</div>
                </div>

                <a href="{{ route('google.redirect', ['role' => 'siswa']) }}" class="role-card">
                    <div style="display: flex; gap: 16px; align-items: center;">
                        <div style="font-size: 28px; line-height: 1; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1));">🎓</div>
                        <div>
                            <div style="font-weight: 800; color: #0f172a; font-size: 15px;">Siswa / Alumni</div>
                            <div style="color: #64748b; font-size: 12px; margin-top: 2px;">Cari kerja, magang & belajar LMS</div>
                        </div>
                    </div>
                    <div style="color: #cbd5e1; font-weight: 800; font-size: 16px;">❯</div>
                </a>

                <a href="{{ route('google.redirect', ['role' => 'perusahaan']) }}" class="role-card">
                    <div style="display: flex; gap: 16px; align-items: center;">
                        <div style="font-size: 28px; line-height: 1; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1));">🏢</div>
                        <div>
                            <div style="font-weight: 800; color: #0f172a; font-size: 15px;">Perusahaan / Pemberi Kerja</div>
                            <div style="color: #64748b; font-size: 12px; margin-top: 2px;">Posting lowongan, cari talenta</div>
                        </div>
                    </div>
                    <div style="color: #cbd5e1; font-weight: 800; font-size: 16px;">❯</div>
                </a>

                <a href="{{ route('google.redirect', ['role' => 'lpk']) }}" class="role-card">
                    <div style="display: flex; gap: 16px; align-items: center;">
                        <div style="font-size: 28px; line-height: 1; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1));">📚</div>
                        <div>
                            <div style="font-weight: 800; color: #0f172a; font-size: 15px;">LPK / BLK</div>
                            <div style="color: #64748b; font-size: 12px; margin-top: 2px;">Kelola program pelatihan vokasi</div>
                        </div>
                    </div>
                    <div style="color: #cbd5e1; font-weight: 800; font-size: 16px;">❯</div>
                </a>

                <div style="text-align: center; margin-top: 24px;">
                    <a href="{{ route('login') }}" style="color: #64748b; font-weight: 700; text-size: 13px; text-decoration: none; padding: 8px 16px; border-radius: 8px; transition: 0.2s;" onmouseover="this.style.background='#f1f5f9'" onmouseout="this.style.background='transparent'">
                        ← Kembali ke Halaman Masuk
                    </a>
                </div>

            </div>
        </div>
    </div>
</body>
</html>