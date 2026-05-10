<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun — Siap Lulus Ketapang</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Fraunces:opsz,wght@9..144,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <style>
        /* CSS-ONLY TABS UNTUK MENAMPILKAN FORM SESUAI ROLE */
        input[type="radio"].role-radio {
            display: none;
        }

        .role-tabs {
            display: flex;
            gap: 8px;
            margin-bottom: 24px;
        }

        .rt {
            flex: 1;
            padding: 12px 8px;
            text-align: center;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            cursor: pointer;
            font-weight: 700;
            color: #64748b;
            background: #fff;
            transition: 0.2s;
            font-size: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        /* Pewarnaan Tab Aktif */
        #reg-siswa:checked~form .role-tabs label[for="reg-siswa"],
        #reg-per:checked~form .role-tabs label[for="reg-per"],
        #reg-lpk:checked~form .role-tabs label[for="reg-lpk"] {
            background: #ecfdf5;
            border-color: #10b981;
            color: #10b981;
        }

        /* Menyembunyikan semua field dinamis secara default */
        .dynamic-fields {
            display: none;
        }

        /* Menampilkan field sesuai Tab yang di-klik menggunakan CSS Sibling Selector (~) */
        #reg-siswa:checked~form #fields-siswa {
            display: block;
        }

        #reg-per:checked~form #fields-per {
            display: block;
        }

        #reg-lpk:checked~form #fields-lpk {
            display: block;
        }

        /* Style dasar input */
        .field {
            margin-bottom: 16px;
        }

        .field label {
            display: block;
            font-size: 12px;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 6px;
        }

        .field input,
        .field select {
            width: 100%;
            box-sizing: border-box;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            outline: none;
            font-family: inherit;
            font-size: 13px;
        }

        .field input:focus,
        .field select:focus {
            border-color: #10b981;
        }
    </style>
</head>

<body>
    <div class="canvas">
        <a href="{{ route('index') }}"
            style="position:fixed;top:12px;left:12px;z-index:999;display:flex;align-items:center;gap:6px;padding:7px 13px;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.15);border-radius:8px;font-family:'Plus Jakarta Sans',sans-serif;font-size:11px;color:rgba(255,255,255,.7);text-decoration:none;">←
            Beranda</a>
        <div class="left">
            <div class="left-mesh">
                <div class="orb1"></div>
                <div class="orb2"></div>
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
                        <div class="brand-name">Siap Lulus</div>
                        <div class="brand-sub">Ketapang, Kalimantan Barat</div>
                    </div>
                </div>
                <div class="left-headline">Satu platform,<br><span class="accent">semua peluang</span><br>Ketapang</div>
                <div class="left-desc">Daftar sekarang dan mulai bangun karir masa depanmu bersama ekosistem digital
                    Ketapang.</div>
            </div>
        </div>
        <div class="right" style="overflow-y: auto;">
            <div class="form-wrap" style="width: 100%; max-width: 420px; margin: 40px auto; padding-bottom: 40px;">
                <div class="form-header">
                    <div class="form-eyebrow">
                        <div class="ey-dot" style="background:#10b981"></div><span class="ey-txt"
                            style="color:#10b981">Daftar Akun</span>
                    </div>
                    <div class="form-title">Buat Akun Gratis</div>
                    <div class="form-sub">Pilih peranmu dan lengkapi data diri</div>
                </div>
                @if ($errors->any())
                    <div
                        style="background: #fef2f2; border: 1px solid #ef4444; border-radius: 10px; padding: 12px; font-size: 12px; color: #ef4444; margin-bottom: 16px;">
                        <ul style="margin: 0; padding-left: 15px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input type="radio" name="role_selector" id="reg-siswa" class="role-radio" checked>
                <input type="radio" name="role_selector" id="reg-per" class="role-radio">
                <input type="radio" name="role_selector" id="reg-lpk" class="role-radio">
                <form method="POST" action="{{ route('register.post') }}">
                    @csrf
                    <div class="role-tabs">
                        <label for="reg-siswa" class="rt"
                            onclick="document.getElementById('real-role').value='siswa'">🎓 Siswa</label>
                        <label for="reg-per" class="rt"
                            onclick="document.getElementById('real-role').value='perusahaan'">🏢 Perusahaan</label>
                        <label for="reg-lpk" class="rt"
                            onclick="document.getElementById('real-role').value='lpk'">📚 LPK</label>
                    </div>
                    <input type="hidden" name="role" id="real-role" value="siswa">
                    <div id="fields-siswa" class="dynamic-fields">
                        <div class="field">
                            <label>Nama Lengkap *</label>
                            <input type="text" name="fullname" placeholder="Masukkan nama lengkap Anda">
                        </div>
                        <div class="field">
                            <label>Email *</label>
                            <input type="email" name="email" placeholder="siswa@email.com">
                        </div>
                        <div class="field">
                            <label>Asal Sekolah *</label>
                            <select name="sekolah">
                                <option value="">Pilih sekolah</option>
                                <option value="SMKN 1 Ketapang">SMKN 1 Ketapang</option>
                                <option value="SMKN 2 Ketapang">SMKN 2 Ketapang</option>
                            </select>
                        </div>
                        <div class="field">
                            <label>Jurusan *</label>
                            <select name="jurusan">
                                <option value="">Pilih jurusan</option>
                                <option value="Agribisnis">Agribisnis</option>
                                <option value="Teknik Komputer">Teknik Komputer</option>
                            </select>
                        </div>
                    </div>
                    <div id="fields-per" class="dynamic-fields">
                        <div
                            style="background: #fff7ed; color: #ea580c; padding: 10px; border-radius: 8px; font-size: 11px; font-weight: 700; margin-bottom: 16px;">
                            ℹ️ Akun Perusahaan membutuhkan verifikasi Admin setelah pendaftaran.
                        </div>
                        <div class="field">
                            <label>Nama Perusahaan *</label>
                            <div style="display: flex; gap: 8px;">
                                <select name="company_type" style="flex: 0.4;">
                                    <option value="PT">PT</option>
                                    <option value="CV">CV</option>
                                    <option value="Yayasan">Yayasan</option>
                                    <option value="BUMN">BUMN</option>
                                    <option value="UD">UD</option>
                                </select>
                                <input type="text" name="company_name" placeholder="Nama PT/CV Anda"
                                    style="flex: 1;">
                            </div>
                        </div>
                        <div class="field">
                            <label>Email HR / Perusahaan *</label>
                            <input type="email" name="company_email" placeholder="hr@perusahaan.com">
                        </div>
                        <div class="field">
                            <label>Bidang Industri *</label>
                            <select name="company_sector">
                                <option value="">Pilih bidang usaha</option>
                                <option value="Pertanian & Perkebunan">Pertanian & Perkebunan</option>
                                <option value="Manufaktur">Manufaktur</option>
                                <option value="Teknologi">Teknologi</option>
                            </select>
                        </div>
                    </div>
                    <div id="fields-lpk" class="dynamic-fields">
                        <div class="field">
                            <label>Nama Lembaga (LPK/BLK) *</label>
                            <input type="text" name="lpk_name" placeholder="LPK Mekanisasi Ketapang">
                        </div>
                        <div class="field">
                            <label>Email Lembaga *</label>
                            <input type="email" name="lpk_email" placeholder="info@lpk.com">
                        </div>
                    </div>
                    <div class="field" style="margin-top: 16px;">
                        <label>Kata Sandi *</label>
                        <div style="position: relative;">
                            <input type="password" name="password" placeholder="Minimal 8 karakter" required>
                            <button type="button"
                                onclick="let i=this.previousElementSibling; i.type=i.type==='password'?'text':'password';"
                                style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: #94a3b8;">👁</button>
                        </div>
                    </div>
                    <div
                        style="display: flex; align-items: flex-start; gap: 8px; margin: 20px 0; font-size: 12px; color: #64748b; line-height: 1.5;">
                        <input type="checkbox" name="terms" required style="width: auto; margin-top: 2px;">
                        <label style="font-weight: 500; text-transform: none; margin: 0;">Saya setuju dengan Ketentuan
                            Layanan dan Kebijakan Privasi platform Siap Lulus.</label>
                    </div>
                    <button type="submit"
                        style="width: 100%; background: #10b981; color: #fff; padding: 14px; border: none; border-radius: 12px; font-weight: 800; font-family: inherit; font-size: 14px; cursor: pointer; transition: 0.3s; box-shadow: 0 4px 10px rgba(16, 185, 129, 0.2);">
                        Buat Akun Gratis →
                    </button>
                </form>
                <div style="text-align: center; margin-top: 24px; font-size: 13px; color: #64748b; font-weight: 600;">
                    Sudah punya akun? <a href="{{ route('login') }}"
                        style="color: #0f172a; font-weight: 800; text-decoration: none;">Masuk di sini</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
