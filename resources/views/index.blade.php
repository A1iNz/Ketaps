<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siap Lulus Ketapang — Platform Karier & Belajar</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        /* RESET & BASE */
        body {
            margin: 0;
            padding: 0;
            background-color: #050b14; /* Warna dasar sangat gelap */
            color: #ffffff;
            font-family: 'Plus Jakarta Sans', sans-serif;
            /* KUNCI AGAR BISA SCROLL: Gunakan min-height */
            min-height: 100vh; 
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* BACKGROUND MESH & GRID */
        .bg-grid {
            position: fixed;
            inset: 0;
            background-image: linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px), 
                              linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 50px 50px;
            z-index: -2;
        }
        .bg-glow {
            position: fixed;
            top: -150px;
            left: 50%;
            transform: translateX(-50%);
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.15) 0%, transparent 70%);
            border-radius: 50%;
            z-index: -1;
        }

        /* CONTAINER UTAMA */
        .container {
            max-width: 1000px;
            width: 100%;
            padding: 60px 20px 40px 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            flex: 1; /* Mendorong footer ke bawah */
        }

        /* HEADER BRAND */
        .brand {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 60px;
        }
        .brand-icon {
            width: 48px;
            height: 48px;
            background: #10b981;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .brand-text {
            text-align: left;
        }
        .brand-title {
            font-size: 24px;
            font-weight: 800;
            line-height: 1.2;
            font-family: Georgia, serif;
        }
        .brand-sub {
            font-size: 12px;
            color: #94a3b8;
            font-weight: 500;
        }

        /* HERO SECTION */
        .hero-title {
            font-size: 64px;
            font-weight: 900;
            font-family: Georgia, serif;
            line-height: 1.1;
            margin: 0 0 24px 0;
            letter-spacing: -1px;
        }
        .hero-title .accent {
            color: #10b981;
            font-style: italic;
        }
        .hero-desc {
            font-size: 16px;
            color: #94a3b8;
            max-width: 600px;
            line-height: 1.6;
            margin: 0 0 40px 0;
        }

        /* MAIN BUTTON */
        .btn-main {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: #10b981;
            color: #fff;
            padding: 14px 24px;
            border-radius: 12px;
            text-decoration: none;
            font-size: 16px;
            font-weight: 800;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }
        .btn-main:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
        }
        .badge-pill {
            background: rgba(255, 255, 255, 0.2);
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            letter-spacing: 0.5px;
        }

        /* DIVIDER */
        .divider {
            display: flex;
            align-items: center;
            width: 100%;
            max-width: 700px;
            margin: 60px 0 40px 0;
            gap: 20px;
        }
        .divider-line {
            flex: 1;
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
        }
        .divider-text {
            color: #64748b;
            font-size: 13px;
            font-weight: 500;
        }

        /* CARDS GRID (6 Cards) */
        .cards-wrapper {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
            width: 100%;
            margin-bottom: 60px;
        }
        .nav-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 24px;
            padding: 40px 24px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: #fff;
            transition: all 0.3s ease;
        }
        .nav-card:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(16, 185, 129, 0.3);
            transform: translateY(-5px);
        }
        .card-icon {
            font-size: 40px;
            margin-bottom: 20px;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2));
        }
        .card-title {
            font-size: 18px;
            font-weight: 800;
            margin-bottom: 8px;
        }
        .card-desc {
            font-size: 13px;
            color: #94a3b8;
            margin-bottom: 24px;
            line-height: 1.5;
        }
        
        /* MINI BADGES DALAM CARD */
        .card-tag {
            font-size: 10px;
            font-weight: 800;
            padding: 6px 14px;
            border-radius: 20px;
            letter-spacing: 0.5px;
            margin-top: auto; /* Mendorong badge ke paling bawah kartu */
        }
        .tag-green { background: rgba(16, 185, 129, 0.1); color: #34d399; }
        .tag-purple { background: rgba(139, 92, 246, 0.1); color: #c084fc; }
        .tag-orange { background: rgba(245, 158, 11, 0.1); color: #fbbf24; }
        .tag-blue { background: rgba(59, 130, 246, 0.1); color: #60a5fa; }
        .tag-red { background: rgba(239, 68, 68, 0.1); color: #f87171; }

        /* FOOTER STATS */
        .footer-stats {
            display: flex;
            justify-content: center;
            gap: 60px;
            width: 100%;
            padding: 40px 20px;
            border-top: 1px solid rgba(255,255,255,0.05);
            flex-wrap: wrap; /* Agar rapi di HP */
        }
        .stat-item {
            text-align: left;
        }
        .stat-val {
            font-size: 36px;
            font-weight: 900;
            font-family: Georgia, serif;
            color: #fff;
            line-height: 1;
            margin-bottom: 8px;
        }
        .stat-lbl {
            font-size: 12px;
            color: #64748b;
            font-weight: 600;
            text-transform: capitalize;
        }

        /* RESPONSIVE FONT UNTUK HP */
        @media (max-width: 768px) {
            .hero-title { font-size: 42px; }
            .brand-title { font-size: 20px; }
            .container { padding: 40px 20px; }
            .footer-stats { gap: 30px; justify-content: space-around; }
            .stat-val { font-size: 28px; }
        }
    </style>
</head>
<body>

    <div class="bg-grid"></div>
    <div class="bg-glow"></div>

    <div class="container">
        
        <div class="brand">
            <div class="brand-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" stroke="white" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="brand-text">
                <div class="brand-title">Siap Lulus Ketapang</div>
                <div class="brand-sub">Kalimantan Barat · Platform Karier & Belajar</div>
            </div>
        </div>

        <h1 class="hero-title">
            Satu platform,<br>
            <span class="accent">semua peluang</span><br>
            Ketapang
        </h1>
        <p class="hero-desc">
            Siswa mencari kerja, perusahaan menemukan talenta, dan semua bisa belajar. 
            Kurikulum Merdeka · Data lokal · Gratis.
        </p>

        <a href="{{ route('login') }}" class="btn-main">
            🚀 Mulai Platform Lengkap <span class="badge-pill">ALL-IN-ONE</span>
        </a>

        <div class="divider">
            <div class="divider-line"></div>
            <div class="divider-text">atau buka halaman terpisah</div>
            <div class="divider-line"></div>
        </div>

        <div class="cards-wrapper">
            
            <a href="{{ route('login') }}" class="nav-card">
                <div class="card-icon">🔑</div>
                <div class="card-title">Login v2</div>
                <div class="card-desc">Halaman masuk dengan pilihan role siswa, perusahaan, dan LPK</div>
                <div class="card-tag tag-green">Siswa / Perusahaan</div>
            </a>

            <a href="#" class="nav-card">
                <div class="card-icon">📚</div>
                <div class="card-title">LMS Belajar</div>
                <div class="card-desc">Platform belajar SD–SMA/SMK, Kurikulum Merdeka, quiz & sertifikat</div>
                <div class="card-tag tag-purple">SD · SMP · SMA · SMK</div>
            </a>

            <a href="#" class="nav-card">
                <div class="card-icon">🏢</div>
                <div class="card-title">Portal Perusahaan</div>
                <div class="card-desc">Kelola lowongan, lihat pelamar, rekrut talenta muda Ketapang</div>
                <div class="card-tag tag-orange">HR & Rekrutmen</div>
            </a>

            <a href="{{ route('dashboard.index') }}" class="nav-card">
                <div class="card-icon">🎓</div>
                <div class="card-title">Portal Siswa</div>
                <div class="card-desc">Cari lowongan, filter AI match, lamar kerja dari satu halaman</div>
                <div class="card-tag tag-green">Cari Kerja</div>
            </a>

            <a href="{{ route('dashboard.lamaran') }}" class="nav-card">
                <div class="card-icon">📋</div>
                <div class="card-title">Status Lamaran</div>
                <div class="card-desc">Pantau semua lamaran, jadwal interview, dan progres seleksi</div>
                <div class="card-tag tag-blue">Tracking Lamaran</div>
            </a>

            <a href="{{ route('dashboard.profil') }}" class="nav-card">
                <div class="card-icon">👤</div>
                <div class="card-title">Profil Siswa</div>
                <div class="card-desc">Kelola data diri, CV, keahlian, dan match score profil karier</div>
                <div class="card-tag tag-red">Profil & CV</div>
            </a>

        </div>
    </div>

    <div class="footer-stats">
        <div class="stat-item">
            <div class="stat-val">5.6K</div>
            <div class="stat-lbl">Pengguna Aktif</div>
        </div>
        <div class="stat-item">
            <div class="stat-val">1.280</div>
            <div class="stat-lbl">Lowongan / Tahun</div>
        </div>
        <div class="stat-item">
            <div class="stat-val">88%</div>
            <div class="stat-lbl">Tingkat Serapan ATP</div>
        </div>
        <div class="stat-item">
            <div class="stat-val">18</div>
            <div class="stat-lbl">Sekolah Mitra</div>
        </div>
    </div>

</body>
</html>