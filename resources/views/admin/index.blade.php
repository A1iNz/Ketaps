<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin — Siap Lulus</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        /* CSS Reset & Sidebar */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 260px;
            background: #0b1120;
            color: #fff;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            z-index: 100;
        }

        .main-content {
            flex: 1;
            margin-left: 260px;
            display: flex;
            flex-direction: column;
        }

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

        /* Stats Cards Layout */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: #fff;
            padding: 24px;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
            display: flex;
            flex-direction: column;
            gap: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
        }

        .stat-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 800;
            margin: 0;
        }

        .stat-label {
            font-size: 13px;
            font-weight: 700;
            color: #64748b;
        }

        /* Section Split Layout */
        .dashboard-split {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 24px;
        }

        .card {
            background: #fff;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
        }

        .card-header {
            padding: 20px 24px;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            font-weight: 800;
            font-size: 16px;
            margin: 0;
        }

        /* Table & Lists */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 12px 24px;
            background: #f8fafc;
            font-size: 11px;
            font-weight: 800;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 16px 24px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 14px;
            font-weight: 600;
        }

        /* Badges */
        .status-badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 800;
        }

        .bg-pending {
            background: #fff7ed;
            color: #ea580c;
        }

        .bg-success {
            background: #ecfdf5;
            color: #10b981;
        }

        /* Action Buttons */
        .btn-approve {
            background: #10b981;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 800;
            font-size: 12px;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-approve:hover {
            background: #059669;
        }

        /* User List Items */
        .user-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 24px;
            border-bottom: 1px solid #f1f5f9;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 12px;
            color: #64748b;
        }

        .sidebar {
            width: 260px;
            background: #0b1120;
            color: #fff;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            z-index: 100;
        }

        .sidebar-header {
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .sidebar-menu {
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 6px;
            flex: 1;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            color: #94a3b8;
            text-decoration: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            transition: 0.3s;
        }

        .menu-item:hover,
        .menu-item.active {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        .menu-item.active {
            background: #10b981;
            color: #fff;
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
                <div style="font-size: 12px; font-weight: 700; color: #64748b;">Ringkasan Sistem</div>
                <div style="font-size: 18px; font-weight: 800; font-family: Georgia, serif;">Dashboard Utama</div>
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

            @if (session('success'))
                <div
                    style="background: #ecfdf5; color: #10b981; padding: 14px; border-radius: 12px; border: 1px solid #a7f3d0; margin-bottom: 24px; font-size: 13px; font-weight: 700;">
                    ✓ {{ session('success') }}
                </div>
            @endif

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-head">
                        <div class="stat-icon" style="background: #ecfdf5; color: #10b981;">🎓</div>
                        <div style="font-size: 11px; font-weight: 800; color: #10b981;">+ Aktif</div>
                    </div>
                    <h3 class="stat-value">{{ $totalSiswa }}</h3>
                    <span class="stat-label">Total Siswa & Alumni</span>
                </div>

                <div class="stat-card">
                    <div class="stat-head">
                        <div class="stat-icon" style="background: #fff7ed; color: #ea580c;">🏢</div>
                        <div style="font-size: 11px; font-weight: 800; color: #ea580c;">Terverifikasi</div>
                    </div>
                    <h3 class="stat-value">{{ $totalPerusahaan }}</h3>
                    <span class="stat-label">Perusahaan Mitra</span>
                </div>

                <div class="stat-card">
                    <div class="stat-head">
                        <div class="stat-icon" style="background: #eff6ff; color: #3b82f6;">💼</div>
                        <div style="font-size: 11px; font-weight: 800; color: #3b82f6;">Lowongan</div>
                    </div>
                    <h3 class="stat-value">{{ $lowonganAktif }}</h3>
                    <span class="stat-label">Loker Tayang & Aktif</span>
                </div>

                <div class="stat-card">
                    <div class="stat-head">
                        <div class="stat-icon" style="background: #fdf2f8; color: #db2777;">📚</div>
                        <div style="font-size: 11px; font-weight: 800; color: #db2777;">E-Learning</div>
                    </div>
                    <h3 class="stat-value">{{ $totalMateri }}</h3>
                    <span class="stat-label">Materi Vokasi & LMS</span>
                </div>
            </div>

            <div class="dashboard-split">

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Persetujuan Perusahaan Baru</h4>
                        <span class="status-badge bg-pending">{{ $pendingCompanies->count() }} Menunggu</span>
                    </div>
                    <div style="max-height: 400px; overflow-y: auto;">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nama Instansi</th>
                                    <th>Email PIC</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pendingCompanies as $comp)
                                    <tr>
                                        <td>
                                            <div style="font-weight: 800;">{{ $comp->name }}</div>
                                            <div style="font-size: 11px; color: #64748b;">Mendaftar
                                                {{ $comp->created_at->diffForHumans() }}</div>
                                        </td>
                                        <td style="color: #64748b;">{{ $comp->email }}</td>
                                        <td>
                                            <form action="{{ route('admin.approve', $comp->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn-approve">Approve</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" style="text-align: center; padding: 40px; color: #94a3b8;">
                                            <div style="font-size: 24px; margin-bottom: 8px;">🎉</div>
                                            Semua pengajuan sudah diproses.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Aktivitas User Terbaru</h4>
                    </div>
                    <div style="max-height: 400px; overflow-y: auto;">
                        @foreach ($usersTerbaru as $u)
                            <div class="user-item">
                                @php
                                    $words = explode(' ', trim($u->name));
                                    $init = strtoupper(
                                        substr($words[0], 0, 1) . (isset($words[1]) ? substr($words[1], 0, 1) : ''),
                                    );
                                @endphp
                                <div class="user-avatar">{{ $init }}</div>
                                <div style="flex: 1;">
                                    <div style="font-weight: 800; font-size: 13px;">{{ $u->name }}</div>
                                    <div style="font-size: 11px; color: #94a3b8;">{{ $u->role }} •
                                        {{ $u->created_at->format('H:i') }}</div>
                                </div>
                                <span class="status-badge bg-success" style="font-size: 9px;">New</span>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>
