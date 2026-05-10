<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk — Siap Lulus Ketapang</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Fraunces:opsz,wght@9..144,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <style>
        /* CSS-ONLY TABS (Tanpa JavaScript) */
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

        .rt:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
        }

        /* Jika Radio dipilih, ubah warna Label Tab-nya */
        #role-siswa:checked~.role-tabs label[for="role-siswa"],
        #role-per:checked~.role-tabs label[for="role-per"],
        #role-lpk:checked~.role-tabs label[for="role-lpk"] {
            background: #ecfdf5;
            border-color: #10b981;
            color: #10b981;
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
                <div class="left-headline">Satu platform,<br><span class="accent">tiga pintu</span><br>menuju masa depan
                </div>
                <div class="left-desc">Siswa, perusahaan, dan lembaga pelatihan terhubung dalam satu ekosistem digital
                    untuk Ketapang yang lebih maju.</div>
            </div>
        </div>

        <div class="right">
            <div class="form-wrap" style="width: 100%; max-width: 400px; margin: 0 auto;">
                <div class="form-header">
                    <div class="form-eyebrow">
                        <div class="ey-dot" style="background:#10b981"></div><span class="ey-txt"
                            style="color:#10b981">Selamat Datang</span>
                    </div>
                    <div class="form-title">Masuk ke akun</div>
                    <div class="form-sub">Pilih peranmu untuk melanjutkan</div>
                </div>

                @if (session('error'))
                    <div
                        style="background: #fef2f2; border: 1px solid #ef4444; color: #ef4444; padding: 12px; border-radius: 10px; font-size: 13px; font-weight: 600; margin-bottom: 16px;">
                        {{ session('error') }}
                    </div>
                @endif
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

                <form method="POST" action="{{ route('login.post') }}">
                    @csrf

                    <input type="radio" name="role" id="role-siswa" value="siswa" class="role-radio" required
                        checked>
                    <input type="radio" name="role" id="role-per" value="perusahaan" class="role-radio" required>
                    <input type="radio" name="role" id="role-lpk" value="lpk" class="role-radio" required>

                    <div class="role-tabs">
                        <label for="role-siswa" class="rt">🎓 Siswa</label>
                        <label for="role-per" class="rt">🏢 Perusahaan</label>
                        <label for="role-lpk" class="rt">📚 LPK</label>
                    </div>

                    <a href="{{ route('google.role-selection') ?? '#' }}"
                        style="display: flex; align-items: center; justify-content: center; gap: 10px; background: #fff; border: 1px solid #e2e8f0; padding: 12px; border-radius: 12px; color: #1e293b; font-weight: 700; text-decoration: none; margin-bottom: 16px;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
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

                    <div class="or-divider" style="display: flex; align-items: center; gap: 10px; margin: 20px 0;">
                        <div style="flex: 1; height: 1px; background: #e2e8f0;"></div>
                        <div style="font-size: 12px; color: #94a3b8; font-weight: 600;">atau masuk dengan email</div>
                        <div style="flex: 1; height: 1px; background: #e2e8f0;"></div>
                    </div>

                    <div class="field" style="margin-bottom: 16px;">
                        <label
                            style="display: block; font-size: 12px; font-weight: 800; color: #1e293b; margin-bottom: 8px;">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            style="width: 100%; box-sizing: border-box; padding: 12px; border: 1px solid #cbd5e1; border-radius: 12px; outline: none; font-family: inherit;"
                            placeholder="nama@email.com" required>
                    </div>

                    <div class="field" style="margin-bottom: 24px;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                            <label style="font-size: 12px; font-weight: 800; color: #1e293b;">Kata Sandi</label>
                            <a href="#"
                                style="font-size: 11px; color: #10b981; text-decoration: none; font-weight: 700;">Lupa
                                sandi?</a>
                        </div>
                        <div style="position: relative;">
                            <input type="password" name="password"
                                style="width: 100%; box-sizing: border-box; padding: 12px; border: 1px solid #cbd5e1; border-radius: 12px; outline: none; font-family: inherit;"
                                placeholder="••••••••" required>
                            <button type="button"
                                onclick="let i=this.previousElementSibling; i.type=i.type==='password'?'text':'password';"
                                style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: #94a3b8;">👁</button>
                        </div>
                    </div>

                    <button type="submit"
                        style="width: 100%; background: #0f172a; color: #fff; padding: 14px; border: none; border-radius: 12px; font-weight: 800; font-family: inherit; font-size: 14px; cursor: pointer; transition: 0.3s;">
                        Masuk &rarr;
                    </button>
                </form>

                <div style="text-align: center; margin-top: 24px; font-size: 13px; color: #64748b; font-weight: 600;">
                    Belum punya akun? <a href="{{ route('register') }}"
                        style="color: #10b981; font-weight: 800; text-decoration: none;">Daftar gratis</a>
                </div>

                <div class="or-divider" style="display: flex; align-items: center; gap: 10px; margin: 20px 0;">
                    <div style="flex: 1; height: 1px; background: #e2e8f0;"></div>
                    <div style="font-size: 12px; color: #94a3b8; font-weight: 600;">atau</div>
                    <div style="flex: 1; height: 1px; background: #e2e8f0;"></div>
                </div>

                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <input type="hidden" name="form_type" value="guest">
                    <button type="submit"
                        style="width: 100%; background: #f8fafc; border: 1px solid #e2e8f0; color: #64748b; padding: 12px; border-radius: 12px; font-weight: 800; font-family: inherit; font-size: 13px; cursor: pointer; transition: 0.3s;"
                        onmouseover="this.style.background='#f1f5f9'; this.style.color='#0f172a'"
                        onmouseout="this.style.background='#f8fafc'; this.style.color='#64748b'">
                        Masuk sebagai Tamu
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
