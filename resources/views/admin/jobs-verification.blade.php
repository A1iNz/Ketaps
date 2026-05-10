<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Lowongan — Admin Siap Lulus</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        /* Base Styling - Sama dengan Dashboard & Users */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
            display: flex;
            min-height: 100vh;
        }

        .main-content {
            flex: 1;
            margin-left: 260px;
            display: flex;
            flex-direction: column;
        }

        /* Topbar / Navbar Styling - Disinkronkan */
        .topbar {
            background: #fff;
            padding: 16px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e2e8f0;
            position: sticky;
            top: 0;
            z-index: 90;
        }

        .content-area {
            padding: 32px;
        }

        /* Job Card Styling */
        .job-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
            transition: 0.3s;
        }

        .job-card:hover {
            border-color: #10b981;
        }

        .job-info h3 {
            margin: 0 0 8px 0;
            font-size: 18px;
            font-weight: 800;
            color: #0f172a;
        }

        .job-meta {
            font-size: 13px;
            color: #64748b;
            font-weight: 600;
            display: flex;
            gap: 16px;
            align-items: center;
        }

        .badge-pending {
            background: #fff7ed;
            color: #ea580c;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 800;
            border: 1px solid #ffedd5;
        }

        /* Button Styling */
        .btn-approve {
            background: #10b981;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 800;
            font-family: inherit;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-approve:hover {
            background: #059669;
            transform: translateY(-2px);
        }

        .btn-detail {
            background: #f1f5f9;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 700;
            color: #475569;
            font-family: inherit;
            cursor: pointer;
        }

        .alert {
            padding: 14px;
            border-radius: 12px;
            margin-bottom: 24px;
            font-size: 13px;
            font-weight: 700;
            border: 1px solid #a7f3d0;
            background: #ecfdf5;
            color: #10b981;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        @include('partials.sidebar-admin')
    </div>
    <div class="main-content">
        <div class="topbar">
            <div>
                <div style="font-size: 12px; font-weight: 700; color: #64748b;">Konten & Lowongan</div>
                <div style="font-size: 18px; font-weight: 800; font-family: Georgia, serif;">Verifikasi Lowongan Kerja
                </div>
            </div>
            <div style="display: flex; align-items: center; gap: 12px;">
                <div style="text-align: right;">
                    <div style="font-size: 13px; font-weight: 800;">Administrator</div>
                    <div style="font-size: 11px; font-weight: 600; color: #10b981;">Online</div>
                </div>
                <div
                    style="width: 40px; height: 40px; background: #0f172a; color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800;">
                    AD</div>
            </div>
        </div>

        <div class="content-area">

            <div style="margin-bottom: 32px;">
                <h2 style="font-weight: 800; font-size: 24px; margin: 0;">Persetujuan Lowongan</h2>
                <p style="color: #64748b; font-size: 14px;">Terdapat <b>{{ $jobs->count() }}</b> lowongan yang menunggu
                    antrean verifikasi.</p>
            </div>

            @if (session('success'))
                <div class="alert">✓ {{ session('success') }}</div>
            @endif

            @forelse($jobs as $job)
                <div class="job-card">
                    <div class="job-info">
                        <span class="badge-pending">MENUNGGU REVIEW</span>
                        <h3 style="margin-top: 12px;">{{ $job->title }}</h3>
                        <div class="job-meta">
                            <span>🏢 {{ $job->user->name ?? $job->company_name }}</span>
                            <span>📍 {{ $job->location }}</span>
                            <span>💰 {{ $job->salary ?? 'Gaji tidak dicantumkan' }}</span>
                        </div>
                        <div style="margin-top: 12px; font-size: 12px; color: #94a3b8;">
                            Diajukan oleh HR pada {{ $job->created_at->format('d M Y') }}
                        </div>
                    </div>

                    <div style="display: flex; gap: 12px;">
                        <button class="btn-detail">Lihat Deskripsi</button>

                        <form action="{{ route('admin.jobs.approve', $job->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-approve">Approve Loker</button>
                        </form>
                    </div>
                </div>
            @empty
                <div
                    style="text-align: center; padding: 60px; background: #fff; border-radius: 20px; border: 2px dashed #e2e8f0;">
                    <div style="font-size: 40px; margin-bottom: 16px;">✨</div>
                    <h4 style="margin: 0; color: #0f172a; font-weight: 800;">Antrean Kosong</h4>
                    <p style="color: #64748b; font-size: 14px;">Belum ada lowongan baru yang perlu diverifikasi.</p>
                </div>
            @endforelse
        </div>
    </div>

</body>

</html>
