<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Aktivitas Sistem — Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { margin: 0; padding: 0; font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; color: #0f172a; display: flex; min-height: 100vh; }
        
        .main-content { flex: 1; margin-left: 260px; display: flex; flex-direction: column; }
        
        .topbar { background: #fff; padding: 16px 32px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e2e8f0; position: sticky; top: 0; z-index: 90; }
        
        .content-area { padding: 32px; }

        .log-container { background: #fff; border-radius: 16px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02); }

        table { width: 100%; border-collapse: collapse; }
        th { background: #f8fafc; text-align: left; padding: 14px 24px; font-size: 11px; font-weight: 800; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid #e2e8f0; }
        td { padding: 16px 24px; border-bottom: 1px solid #f1f5f9; font-size: 13px; font-weight: 600; color: #1e293b; }

        .admin-badge { background: #f1f5f9; color: #475569; padding: 4px 8px; border-radius: 6px; font-size: 11px; font-weight: 800; }
        .time-text { color: #94a3b8; font-size: 12px; font-weight: 500; }
        
        /* Indikator aksi berdasarkan kata kunci */
        .action-text { display: flex; align-items: center; gap: 8px; }
        .dot { width: 8px; height: 8px; border-radius: 50%; display: inline-block; }
        .dot-delete { background: #ef4444; }
        .dot-update { background: #3b82f6; }
        .dot-create { background: #10b981; }
    </style>
</head>
<body>

    @include('partials.sidebar-admin')

    <div class="main-content">
        <div class="topbar">
            <div>
                <div style="font-size: 12px; font-weight: 700; color: #64748b;">Keamanan & Audit</div>
                <div style="font-size: 18px; font-weight: 800; font-family: Georgia, serif;">Log Aktivitas Sistem</div>
            </div>
            <div style="display: flex; align-items: center; gap: 12px;">
                <div style="text-align: right;">
                    <div style="font-size: 13px; font-weight: 800;">Administrator</div>
                    <div style="font-size: 11px; font-weight: 600; color: #10b981;">Mode Audit Aktif</div>
                </div>
            </div>
        </div>

        <div class="content-area">
            <div style="margin-bottom: 24px;">
                <h2 style="font-weight: 800; font-size: 22px; margin: 0;">Riwayat Perubahan</h2>
                <p style="color: #64748b; font-size: 14px;">Memantau setiap aksi penting yang dilakukan oleh tim Administrator.</p>
            </div>

            <div class="log-container">
                <table>
                    <thead>
                        <tr>
                            <th>Waktu & Tanggal</th>
                            <th>Administrator</th>
                            <th>Aksi / Kegiatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($logs as $log)
                        <tr>
                            <td class="time-text">
                                📅 {{ $log->created_at->format('d M Y') }} <br>
                                🕒 {{ $log->created_at->format('H:i:s') }}
                            </td>
                            <td>
                                <span class="admin-badge">{{ $log->admin_name }}</span>
                            </td>
                            <td class="action-text">
                                @php
                                    // Logika warna dot sederhana
                                    $dotClass = 'dot-update';
                                    if(str_contains(strtolower($log->aksi), 'hapus') || str_contains(strtolower($log->aksi), 'delete')) $dotClass = 'dot-delete';
                                    if(str_contains(strtolower($log->aksi), 'tambah') || str_contains(strtolower($log->aksi), 'create')) $dotClass = 'dot-create';
                                @endphp
                                <span class="dot {{ $dotClass }}"></span>
                                {{ $log->aksi }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" style="text-align: center; padding: 60px; color: #94a3b8;">
                                <div style="font-size: 40px; margin-bottom: 10px;">📜</div>
                                Belum ada riwayat aktivitas yang tercatat.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>