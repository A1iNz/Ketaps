<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Sektor — Admin Siap Lulus</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { margin: 0; padding: 0; font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; color: #0f172a; display: flex; min-height: 100vh; }
        .main-content { flex: 1; margin-left: 260px; display: flex; flex-direction: column; }
        .topbar { background: #fff; padding: 16px 32px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e2e8f0; position: sticky; top: 0; z-index: 90; }
        .content-area { padding: 32px; }

        .card-container { background: #fff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 24px; box-shadow: 0 2px 4px rgba(0,0,0,0.02); }
        .form-group { display: flex; gap: 12px; margin-bottom: 32px; }
        .form-group input { flex: 1; padding: 12px 16px; border: 1px solid #cbd5e1; border-radius: 10px; font-family: inherit; font-size: 14px; outline: none; }
        .btn-add { background: #10b981; color: #fff; border: none; padding: 12px 24px; border-radius: 10px; font-weight: 800; cursor: pointer; transition: 0.2s; }
        
        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; padding: 12px 16px; font-size: 12px; font-weight: 800; color: #64748b; border-bottom: 1px solid #e2e8f0; text-transform: uppercase; }
        td { padding: 16px; border-bottom: 1px solid #f1f5f9; font-size: 14px; font-weight: 700; color: #1e293b; }
        
        .alert-success { background: #ecfdf5; color: #10b981; padding: 14px; border-radius: 10px; margin-bottom: 20px; font-weight: 700; border: 1px solid #a7f3d0; }
        .alert-error { background: #fef2f2; color: #ef4444; padding: 14px; border-radius: 10px; margin-bottom: 20px; font-weight: 700; border: 1px solid #fecaca; }
    </style>
</head>
<body>

    @include('partials.sidebar-admin')

    <div class="main-content">
        <div class="topbar">
            <div>
                <div style="font-size: 12px; font-weight: 700; color: #64748b;">Data Master</div>
                <div style="font-size: 18px; font-weight: 800;">Manajemen Sektor Industri</div>
            </div>
        </div>

        <div class="content-area">
            @if(session('success')) <div class="alert-success">✓ {{ session('success') }}</div> @endif
            @if($errors->any()) <div class="alert-error">⚠️ {{ $errors->first() }}</div> @endif

            <div style="margin-bottom: 24px;">
                <h1 style="margin: 0; font-size: 24px; font-weight: 800;">Kategori Sektor Industri</h1>
                <p style="color: #64748b; margin-top: 6px; font-size: 14px;">Tambahkan kategori industri agar perusahaan bisa memilih sektor saat membuat lowongan.</p>
            </div>

            <div class="card-container">
                <form action="{{ route('admin.sectors.store') }}" method="POST" class="form-group">
                    @csrf
                    <input type="text" name="nama_sektor" placeholder="Ketik nama sektor baru (Contoh: Teknologi Informasi, Manufaktur, Retail...)" required>
                    <button type="submit" class="btn-add">+ Tambah Sektor</button>
                </form>

                <table>
                    <thead>
                        <tr>
                            <th style="width: 50px;">NO</th>
                            <th>NAMA SEKTOR INDUSTRI</th>
                            <th>JUMLAH LOWONGAN</th>
                            <th style="text-align: right;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sectors as $index => $sector)
                        <tr>
                            <td style="color: #94a3b8;">{{ $index + 1 }}</td>
                            <td>{{ $sector->nama_sektor }}</td>
                            <td>
                                <span style="background: #f1f5f9; padding: 4px 10px; border-radius: 6px; font-size: 12px; color: #475569;">0 Lowongan</span>
                            </td>
                            <td style="text-align: right;">
                                <form action="{{ route('admin.sectors.destroy', $sector->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus sektor ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" title="Hapus Sektor" style="color: #ef4444; border: 1px solid #fecaca; background: #fef2f2; width: 32px; height: 32px; border-radius: 8px; display: inline-flex; align-items: center; justify-content: center; cursor: pointer;">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"></path><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="text-align: center; padding: 40px; color: #94a3b8;">Belum ada data sektor industri.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>
</html>