<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk — Siap Lulus Ketapang</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,700;1,9..144,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="canvas">
        <a href="{{ route('index') }}"
            style="position:fixed;top:12px;left:12px;z-index:999;display:flex;align-items:center;gap:6px;padding:7px 13px;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.15);border-radius:8px;font-family:'Plus Jakarta Sans',sans-serif;font-size:11px;color:rgba(255,255,255,.7);text-decoration:none;transition:.15s;"
            onmouseover="this.style.background='rgba(255,255,255,.16)'"
            onmouseout="this.style.background='rgba(255,255,255,.08)'">
            ← Beranda
        </a>
        <div class="left">
            <div class="left-mesh">
                <div class="orb1"></div>
                <div class="orb2"></div>
                <div class="orb3"></div>
                <div class="grid-lines"></div>
            </div>
            <div class="left-content">
                <div class="brand">
                    <div class="brand-hex">
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" stroke="white"
                                stroke-width="2.2" stroke-linecap="round" />
                        </svg>
                    </div>
                    <div>
                        <div class="brand-name">Siap Lulus Ketapang</div>
                        <div class="brand-sub">Kalimantan Barat · Platform Terpadu </div>
                    </div>
                </div>
                <div class="left-headline">Satu platform,<br><span class="accent">semua peluang</span><br>Ketapang</div>
                <div class="left-desc">Siswa mencari kerja, Perusahaan menemukan talenta, dan semua bisa belajar.
                    Kurikulum Merdeka · Data lokal · Gratis</div>
                <div class="role-showcase">
                    <div class="rs-card" onclick="selectRole('siswa')">
                        <div class="rs-icon">🎓</div>
                        <div class="rs-name">Siswa & Lulusan</div>
                        <div class="rs-count">5.600+ terdaftar</div>
                    </div>
                    <div class="rs-card" onclick="selectRole('perusahaan')">
                        <div class="rs-icon">🏢</div>
                        <div class="rs-name">Perusahaan</div>
                        <div class="rs-count">48 mitra aktif</div>
                    </div>
                    <div class="rs-card" onclick="selectRole('lms')">
                        <div class="rs-icon">📚</div>
                        <div class="rs-name">LMS Belajar</div>
                        <div class="rs-count">SD–SMK, gratis</div>
                    </div>
                </div>
            </div>
            <div class="left-stats">
                <div class="ls-item">
                    <div class="ls-val">5.6K</div>
                    <div class="ls-lbl">Pengguna Aktif</div>
                </div>
                <div class="ls-item">
                    <div class="ls-val">1.2K</div>
                    <div class="ls-lbl">Lowongan / th</div>
                </div>
                <div class="ls-item">
                    <div class="ls-val">88%</div>
                    <div class="ls-lbl">Serapan ATP</div>
                </div>
                <div class="ls-item">
                    <div class="ls-val">4</div>
                    <div class="ls-lbl">Program LPK</div>
                </div>
            </div>
        </div>

        <div class="right">
            <div class="form-wrap">

                <div class="view active" id="view-role">
                    <div class="form-header">
                        <div class="form-eyebrow">
                            <div class="ey-dot" style="background:var(--teal)"></div><span class="ey-txt"
                                style="color:var(--teal)">Selamat Datang</span>
                        </div>
                        <div class="form-title">Masuk sebagai apa?</div>
                        <div class="form-sub">Pilih peranmu untuk melanjutkan</div>
                    </div>

                    @if (session('error'))
                        <div
                            style="background: var(--coral-lt); border: 1px solid var(--coral); border-radius: 10px; padding: 12px; font-size: 12px; color: var(--coral); margin-bottom: 16px;">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any() && old('form_type') === 'login')
                        <div
                            style="background: var(--coral-lt); border: 1px solid var(--coral); border-radius: 10px; padding: 12px; font-size: 12px; color: var(--coral); margin-bottom: 16px;">
                            <ul style="list-style-position: inside; padding-left: 5px; margin: 0;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="role-tabs" id="login-role-tabs">
                        <div class="rt on" id="rt-siswa" onclick="setRole('siswa')">
                            <div class="rt-icon">🎓</div>
                            <div class="rt-label">Siswa</div>
                        </div>
                        <div class="rt" id="rt-perusahaan" onclick="setRole('perusahaan')">
                            <div class="rt-icon">🏢</div>
                            <div class="rt-label">Perusahaan</div>
                        </div>
                        <div class="rt" id="rt-lpk" onclick="setRole('lpk')">
                            <div class="rt-icon">📚</div>
                            <div class="rt-label">LPK</div>
                        </div>
                    </div>

                    <div style="text-align: center; margin-top: 20px;">
                        <p style="color: #64748b; font-size: 14px; margin-bottom: 15px;">Atau masuk dengan</p>

                        <a href="#" onclick="showView('google-role'); return false;"
                            style="display: flex; align-items: center; justify-content: center; gap: 10px; background: #fff; border: 1px solid #e2e8f0; padding: 12px; border-radius: 12px; color: #1e293b; font-weight: 700; text-decoration: none; transition: 0.3s; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                                    fill="#4285F4" />
                                <path
                                    d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                                    fill="#34A853" />
                                <path
                                    d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                                    fill="#FBBC05" />
                                <path
                                    d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                                    fill="#EA4335" />
                            </svg>
                            Lanjutkan dengan Google
                        </a>
                    </div>

                    <div class="or-divider">
                        <div class="or-line"></div>
                        <div class="or-txt">atau</div>
                        <div class="or-line"></div>
                    </div>

                    <form method="POST" action="{{ route('login') }}" id="login-form">
                        @csrf
                        <input type="hidden" name="form_type" value="login">
                        <input type="hidden" name="role" id="login-role-input" value="siswa">
                        <div class="field">
                            <label class="field-label">Email</label>
                            <input type="email" class="field-input" name="email" id="login-email"
                                placeholder="nama@email.com" required>
                        </div>

                        <div class="field" style="margin-bottom: 5px;">
                            <label class="field-label">
                                Kata Sandi
                                <a href="#" onclick="showView('forgot')"
                                    style="font-size: 10px; font-weight: 500; text-decoration: none; color: var(--teal);">Lupa
                                    kata sandi?</a>
                            </label>
                            <div class="pw-wrap">
                                <input type="password" class="field-input" name="password" id="login-pw"
                                    placeholder="Minimal 8 karakter" oninput="checkStrength(this.value)" required>
                                <button type="button" class="eye-btn"
                                    onclick="togglePw('login-pw', this)">👁</button>
                            </div>
                            <div class="pw-bars">
                                <div class="pw-bar" id="pb1"></div>
                                <div class="pw-bar" id="pb2"></div>
                                <div class="pw-bar" id="pb3"></div>
                                <div class="pw-bar" id="pb4"></div>
                            </div>
                            <div class="pw-hint" id="pw-hint">Min. 8 karakter</div>
                        </div>

                        <button type="submit" class="submit-btn" id="login-submit-btn">Masuk →</button>
                    </form>

                    <div style="text-align: center; margin-top: 16px; font-size: 12px; color: var(--muted);">
                        Belum punya akun? <a href="#" onclick="showView('register')"
                            style="color: var(--teal); font-weight: 700; text-decoration: none;">Daftar di sini</a>
                    </div>

                    <div class="or-divider" style="margin: 12px 0;">
                        <div class="or-line"></div>
                        <div class="or-txt">atau</div>
                        <div class="or-line"></div>
                    </div>
                    <form method="POST" action="{{ route('login') }}" id="guest-login-form">
                        @csrf
                        <input type="hidden" name="form_type" value="guest">
                        <div class="field"></div>
                        <button type="submit" class="guest-btn" id="guest-login-btn">Masuk sebagai Tamu</button>
                    </form>
                </div>

                <div class="view" id="view-google-role">
                    <div class="form-header">
                        <div class="form-eyebrow">
                            <div class="ey-dot" style="background:#4285F4"></div>
                            <span class="ey-txt"
                                style="color:#4285F4; text-transform: uppercase; font-weight: 800; letter-spacing: 1px;">Google</span>
                        </div>
                        <div class="form-title">Masuk sebagai apa?</div>
                        <div class="form-sub">Pilih peranmu untuk melanjutkan dengan Google</div>
                    </div>

                    <div
                        style="display: flex; flex-direction: column; gap: 16px; margin-top: 24px; margin-bottom: 32px;">

                        <a href="{{ route('google.redirect', ['role' => 'siswa']) }}"
                            style="display: flex; justify-content: space-between; align-items: center; padding: 16px 20px; background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; text-decoration: none; transition: 0.3s; box-shadow: 0 2px 4px rgba(0,0,0,0.02);"
                            onmouseover="this.style.borderColor='#4285F4'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 10px 15px -3px rgba(66, 133, 244, 0.1)';"
                            onmouseout="this.style.borderColor='#e2e8f0'; this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 4px rgba(0,0,0,0.02)';">
                            <div style="display: flex; gap: 16px; align-items: center;">
                                <div
                                    style="font-size: 28px; line-height: 1; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1));">
                                    🎓</div>
                                <div>
                                    <div style="font-weight: 800; color: #0f172a; font-size: 15px;">Siswa / Alumni
                                    </div>
                                    <div style="color: #64748b; font-size: 12px; margin-top: 2px;">Cari kerja, magang &
                                        belajar LMS</div>
                                </div>
                            </div>
                            <div style="color: #cbd5e1; font-weight: 800; font-size: 16px;">❯</div>
                        </a>

                        <a href="{{ route('google.redirect', ['role' => 'perusahaan']) }}"
                            style="display: flex; justify-content: space-between; align-items: center; padding: 16px 20px; background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; text-decoration: none; transition: 0.3s; box-shadow: 0 2px 4px rgba(0,0,0,0.02);"
                            onmouseover="this.style.borderColor='#4285F4'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 10px 15px -3px rgba(66, 133, 244, 0.1)';"
                            onmouseout="this.style.borderColor='#e2e8f0'; this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 4px rgba(0,0,0,0.02)';">
                            <div style="display: flex; gap: 16px; align-items: center;">
                                <div
                                    style="font-size: 28px; line-height: 1; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1));">
                                    🏢</div>
                                <div>
                                    <div style="font-weight: 800; color: #0f172a; font-size: 15px;">Perusahaan /
                                        Pemberi Kerja</div>
                                    <div style="color: #64748b; font-size: 12px; margin-top: 2px;">Posting lowongan,
                                        cari talenta terbaik</div>
                                </div>
                            </div>
                            <div style="color: #cbd5e1; font-weight: 800; font-size: 16px;">❯</div>
                        </a>

                        <a href="{{ route('google.redirect', ['role' => 'lms']) }}"
                            style="display: flex; justify-content: space-between; align-items: center; padding: 16px 20px; background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; text-decoration: none; transition: 0.3s; box-shadow: 0 2px 4px rgba(0,0,0,0.02);"
                            onmouseover="this.style.borderColor='#4285F4'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 10px 15px -3px rgba(66, 133, 244, 0.1)';"
                            onmouseout="this.style.borderColor='#e2e8f0'; this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 4px rgba(0,0,0,0.02)';">
                            <div style="display: flex; gap: 16px; align-items: center;">
                                <div
                                    style="font-size: 28px; line-height: 1; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1));">
                                    📚</div>
                                <div>
                                    <div style="font-weight: 800; color: #0f172a; font-size: 15px;">LMS — Platform
                                        Belajar</div>
                                    <div style="color: #64748b; font-size: 12px; margin-top: 2px;">Akses materi
                                        SD–SMA/SMK gratis</div>
                                </div>
                            </div>
                            <div style="color: #cbd5e1; font-weight: 800; font-size: 16px;">❯</div>
                        </a>

                        <a href="{{ route('google.redirect', ['role' => 'lpk']) }}"
                            style="display: flex; justify-content: space-between; align-items: center; padding: 16px 20px; background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; text-decoration: none; transition: 0.3s; box-shadow: 0 2px 4px rgba(0,0,0,0.02);"
                            onmouseover="this.style.borderColor='#4285F4'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 10px 15px -3px rgba(66, 133, 244, 0.1)';"
                            onmouseout="this.style.borderColor='#e2e8f0'; this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 4px rgba(0,0,0,0.02)';">
                            <div style="display: flex; gap: 16px; align-items: center;">
                                <div
                                    style="font-size: 28px; line-height: 1; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1));">
                                    🏫</div>
                                <div>
                                    <div style="font-weight: 800; color: #0f172a; font-size: 15px;">LPK / BLK</div>
                                    <div style="color: #64748b; font-size: 12px; margin-top: 2px;">Kelola program
                                        pelatihan vokasi</div>
                                </div>
                            </div>
                            <div style="color: #cbd5e1; font-weight: 800; font-size: 16px;">❯</div>
                        </a>

                    </div>

                    <button class="back-link" onclick="showView('role')">← Kembali</button>
                </div>

                <div class="view" id="view-register">
                    <div class="form-header">
                        <div class="form-eyebrow">
                            <div class="ey-dot" style="background:var(--teal)"></div><span class="ey-txt"
                                style="color:var(--teal)">Daftar</span>
                        </div>
                        <div class="form-title">Buat Akun Gratis</div>
                        <div class="form-sub">Bergabunglah dengan komunitas Ketapang</div>
                    </div>

                    @if ($errors->any() && old('form_type') === 'register')
                        <div
                            style="background: var(--coral-lt); border: 1px solid var(--coral); border-radius: 10px; padding: 12px; font-size: 12px; color: var(--coral); margin-bottom: 16px;">
                            <ul style="list-style-position: inside; padding-left: 5px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <div class="role-tabs">
                        <div class="rt on" id="rtr-siswa" onclick="setRegRole('siswa')">
                            <div class="rt-icon">🎓</div>
                            <div class="rt-label">Siswa</div>
                        </div>
                        <div class="rt" id="rtr-perusahaan" onclick="setRegRole('perusahaan')">
                            <div class="rt-icon">🏢</div>
                            <div class="rt-label">Perusahaan</div>
                        </div>
                        <div class="rt" id="rtr-lpk" onclick="setRegRole('lpk')">
                            <div class="rt-icon">📚</div>
                            <div class="rt-label">LPK</div>
                        </div>
                    </div>

                    <div id="reg-siswa-fields">
                        <div class="field-row">
                            <div class="field">
                                <label class="field-label">Nama Depan *</label>
                                <input type="text" class="field-input" id="reg-fname" placeholder="Aldi">
                            </div>
                            <div class="field">
                                <label class="field-label">Nama Belakang *</label>
                                <input type="text" class="field-input" id="reg-lname" placeholder="Ramadan">
                            </div>
                        </div>

                        <div class="field">
                            <label class="field-label">Email *</label>
                            <input type="email" class="field-input" id="reg-email" placeholder="aldi@email.com">
                        </div>

                        <div class="field">
                            <label class="field-label">No. HP *</label>
                            <input type="tel" class="field-input" id="reg-hp" placeholder="081234567890">
                        </div>

                        <div class="field">
                            <label class="field-label">Sekolah *</label>
                            <select class="field-select" id="reg-school">
                                <option value="">Pilih sekolah</option>
                                <option>SMKN 1 Ketapang</option>
                                <option>SMKN 2 Ketapang</option>
                                <option>SMAN 1 Ketapang</option>
                                <option>SMA Muhammadiyah Ketapang</option>
                            </select>
                        </div>

                        <div class="field">
                            <label class="field-label">Jurusan *</label>
                            <select class="field-select" id="reg-major">
                                <option value="">Pilih jurusan</option>
                                <option>Agribisnis</option>
                                <option>Teknik Mesin</option>
                                <option>Teknik Elektro</option>
                                <option>Akuntansi</option>
                            </select>
                        </div>

                        <div class="field">
                            <label class="field-label">Kelas *</label>
                            <select class="field-select" id="reg-grade">
                                <option value="">Pilih kelas</option>
                                <option>X (10)</option>
                                <option>XI (11)</option>
                                <option>XII (12)</option>
                                <option>Lulusan</option>
                            </select>
                        </div>
                    </div>

                    <div id="reg-perusahaan-fields" style="display:none">
                        <div class="company-badge">
                            <span>🏢</span> Perusahaan Mitra
                        </div>

                        <div class="field">
                            <label class="field-label">Nama Perusahaan *</label>
                            <input type="text" class="field-input" id="reg-company-name"
                                placeholder="PT. Sawit Jaya">
                        </div>

                        <div class="field">
                            <label class="field-label">Email Perusahaan *</label>
                            <input type="email" class="field-input" id="reg-company-email"
                                placeholder="hr@sawitjaya.com">
                        </div>

                        <div class="field">
                            <label class="field-label">No. HP PIC *</label>
                            <input type="tel" class="field-input" id="reg-company-hp"
                                placeholder="081234567890">
                        </div>

                        <div class="field">
                            <label class="field-label">Bidang Usaha *</label>
                            <select class="field-select" id="reg-company-sector">
                                <option value="">Pilih bidang</option>
                                <option>Pertanian & Perkebunan</option>
                                <option>Manufaktur</option>
                                <option>Jasa</option>
                                <option>Perdagangan</option>
                            </select>
                        </div>
                    </div>

                    <div class="field">
                        <label class="field-label">Kata Sandi *</label>
                        <div class="pw-wrap">
                            <input type="password" class="field-input" id="reg-pw"
                                placeholder="Minimal 8 karakter" oninput="checkStrength(this.value)">
                            <button class="eye-btn" onclick="togglePw('reg-pw', this)">👁</button>
                        </div>
                        <div class="pw-bars">
                            <div class="pw-bar" id="pb1"></div>
                            <div class="pw-bar" id="pb2"></div>
                            <div class="pw-bar" id="pb3"></div>
                            <div class="pw-bar" id="pb4"></div>
                        </div>
                        <div class="pw-hint" id="pw-hint">Min. 8 karakter</div>
                    </div>

                    <div class="cb-row">
                        <input type="checkbox" id="terms">
                        <label for="terms">Saya setuju dengan <a href="#">Syarat & Ketentuan</a> serta <a
                                href="#">Kebijakan Privasi</a></label>
                    </div>

                    <button class="submit-btn" onclick="doRegister()">Buat Akun Gratis →</button>

                    <button class="back-link" onclick="showView('role')">← Sudah punya akun? Masuk</button>
                </div>

                <div class="view" id="view-onboard">
                    <div class="form-header">
                        <div class="form-eyebrow">
                            <div class="ey-dot" style="background:var(--teal)"></div><span class="ey-txt"
                                style="color:var(--teal)">Onboarding</span>
                        </div>
                        <div class="form-title">Lengkapi Profilmu</div>
                        <div class="form-sub">Data ini akan membantu kami match kamu dengan peluang terbaik</div>
                    </div>

                    <div class="ob-steps">
                        <div class="ob-step">
                            <div class="ob-dot active" id="ob-dot-1">1</div>
                            <div class="ob-label">Data Diri</div>
                        </div>
                        <div class="ob-line" id="ob-line-1"></div>
                        <div class="ob-step">
                            <div class="ob-dot todo" id="ob-dot-2">2</div>
                            <div class="ob-label">Pendidikan</div>
                        </div>
                        <div class="ob-line" id="ob-line-2"></div>
                        <div class="ob-step">
                            <div class="ob-dot todo" id="ob-dot-3">3</div>
                            <div class="ob-label">Preferensi</div>
                        </div>
                    </div>

                    <div id="ob-s1">
                        <div class="field-row">
                            <div class="field">
                                <label class="field-label">Nama Depan *</label>
                                <input type="text" class="field-input" id="ob-fname" placeholder="Aldi">
                            </div>
                            <div class="field">
                                <label class="field-label">Nama Belakang *</label>
                                <input type="text" class="field-input" id="ob-lname" placeholder="Ramadan">
                            </div>
                        </div>

                        <div class="field">
                            <label class="field-label">Tanggal Lahir *</label>
                            <input type="date" class="field-input" id="ob-dob">
                        </div>

                        <div class="field">
                            <label class="field-label">Jenis Kelamin *</label>
                            <select class="field-select" id="ob-gender">
                                <option value="">Pilih</option>
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>

                        <div class="field">
                            <label class="field-label">No. HP *</label>
                            <input type="tel" class="field-input" id="ob-hp" placeholder="081234567890">
                        </div>

                        <button class="submit-btn" onclick="obNext(1)">Lanjut →</button>
                    </div>

                    <div id="ob-s2" style="display:none">
                        <div class="field">
                            <label class="field-label">Sekolah *</label>
                            <select class="field-select" id="ob-school">
                                <option value="">Pilih sekolah</option>
                                <option>SMKN 1 Ketapang</option>
                                <option>SMKN 2 Ketapang</option>
                                <option>SMAN 1 Ketapang</option>
                                <option>SMA Muhammadiyah Ketapang</option>
                            </select>
                        </div>

                        <div class="field">
                            <label class="field-label">Jurusan *</label>
                            <select class="field-select" id="ob-major">
                                <option value="">Pilih jurusan</option>
                                <option>Agribisnis</option>
                                <option>Teknik Mesin</option>
                                <option>Teknik Elektro</option>
                                <option>Akuntansi</option>
                            </select>
                        </div>

                        <div class="field">
                            <label class="field-label">Kelas *</label>
                            <select class="field-select" id="ob-grade">
                                <option value="">Pilih kelas</option>
                                <option>X (10)</option>
                                <option>XI (11)</option>
                                <option>XII (12)</option>
                                <option>Lulusan</option>
                            </select>
                        </div>

                        <div style="display:flex;gap:8px;margin-top:20px">
                            <button class="back-link" onclick="obBack(2)">← Kembali</button>
                            <button class="submit-btn" onclick="obNext(2)" style="flex:1">Lanjut →</button>
                        </div>
                    </div>

                    <div id="ob-s3" style="display:none">
                        <div class="field">
                            <label class="field-label">Kecamatan Domisili *</label>
                            <select class="field-select" id="ob-kec">
                                <option value="">Pilih kecamatan</option>
                                <option>Ketapang</option>
                                <option>Delta Pawan</option>
                                <option>Simpang Hulu</option>
                                <option>Sungai Laur</option>
                            </select>
                        </div>

                        <div class="field">
                            <label class="field-label">Status Ketersediaan *</label>
                            <select class="field-select" id="ob-avail">
                                <option value="">Pilih status</option>
                                <option>Sedang mencari kerja</option>
                                <option>Tersedia untuk magang</option>
                                <option>Tidak tersedia saat ini</option>
                            </select>
                        </div>

                        <div class="field">
                            <label class="field-label">Avatar (Opsional)</label>
                            <div class="avatar-pick">
                                <div class="av-opt on" onclick="pickAv(this)">🌿</div>
                                <div class="av-opt" onclick="pickAv(this)">🌸</div>
                                <div class="av-opt" onclick="pickAv(this)">🌻</div>
                                <div class="av-opt" onclick="pickAv(this)">🌺</div>
                                <div class="av-opt" onclick="pickAv(this)">🌹</div>
                                <div class="av-opt" onclick="pickAv(this)">🌷</div>
                                <div class="av-opt" onclick="pickAv(this)">🌼</div>
                                <div class="av-opt" onclick="pickAv(this)">🌵</div>
                            </div>
                        </div>

                        <div style="display:flex;gap:8px;margin-top:20px">
                            <button class="back-link" onclick="obBack(3)">← Kembali</button>
                            <button class="submit-btn" id="ob-finish-btn" onclick="obFinish()">Simpan & Masuk
                                →</button>
                        </div>
                    </div>
                </div>

                <div class="view" id="view-forgot">
                    <div class="form-header">
                        <div class="form-eyebrow">
                            <div class="ey-dot" style="background:var(--amber)"></div><span class="ey-txt"
                                style="color:var(--amber)">Lupa Kata Sandi</span>
                        </div>
                        <div class="form-title">Reset Kata Sandi</div>
                        <div class="form-sub">Masukkan email terdaftar untuk menerima tautan reset.</div>
                    </div>

                    @if (session('status'))
                        <div
                            style="background: var(--teal-lt); border: 1px solid var(--teal); border-radius: 10px; padding: 12px; font-size: 12px; color: var(--teal); margin-bottom: 16px;">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" id="forgot-form">
                        @csrf
                        <input type="hidden" name="form_type" value="forgot">
                        <div class="field">
                            <label for="email" class="field-label">Email</label>
                            <input id="email" class="field-input" type="email" name="email"
                                value="{{ old('email') }}" required autofocus placeholder="nama@email.com" />
                        </div>

                        <button type="submit" class="submit-btn">Kirim Tautan Reset →</button>
                    </form>

                    <button class="back-link" onclick="showView('role')">← Kembali ke Masuk</button>
                </div>

            </div>
        </div>
    </div>

    <div class="toast" id="toast">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none">
            <path d="M22 11.08V12a10 10 0 11-5.93-9.14" stroke="#00D49A" stroke-width="2.5" />
            <path d="M22 4L12 14.01l-3-3" stroke="#00D49A" stroke-width="2.5" stroke-linecap="round" />
        </svg>
        <span id="toast-msg"></span>
    </div>

    <script src="{{ asset('js/login_v2.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if ($errors->any())
                var formType = '{{ old('form_type') }}';
                if (formType === 'register') {
                    showView('register');
                    setRegRole('{{ old('role', 'siswa') }}');
                } else if (formType === 'forgot') {
                    showView('forgot');
                }
            @endif
        });
    </script>
</body>

</html>
