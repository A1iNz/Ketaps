<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Materi — Admin Siap Lulus</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { margin: 0; padding: 0; font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; color: #0f172a; display: flex; min-height: 100vh; }
        .main-content { flex: 1; margin-left: 260px; display: flex; flex-direction: column; }
        .topbar { background: #fff; padding: 16px 32px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e2e8f0; position: sticky; top: 0; z-index: 90; }
        .content-area { padding: 32px; }

        .card-container { background: #fff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 24px; box-shadow: 0 2px 4px rgba(0,0,0,0.02); }
        .btn-add { background: #0f172a; color: #fff; border: none; padding: 12px 24px; border-radius: 10px; font-weight: 800; cursor: pointer; transition: 0.2s; }
        .btn-add:hover { background: #1e293b; }
        
        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; padding: 12px 16px; font-size: 12px; font-weight: 800; color: #64748b; border-bottom: 1px solid #e2e8f0; text-transform: uppercase; }
        td { padding: 16px; border-bottom: 1px solid #f1f5f9; font-size: 14px; font-weight: 600; color: #1e293b; }
        
        .alert-success { background: #ecfdf5; color: #10b981; padding: 14px; border-radius: 10px; margin-bottom: 20px; font-weight: 700; border: 1px solid #a7f3d0; }
        .alert-error { background: #fef2f2; color: #ef4444; padding: 14px; border-radius: 10px; margin-bottom: 20px; font-weight: 700; border: 1px solid #fecaca; }

        /* Modal Styles */
        .modal-input { width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 10px; margin-bottom: 16px; font-family: inherit; box-sizing: border-box; }
        .modal-label { display: block; font-size: 11px; font-weight: 800; color: #64748b; margin-bottom: 6px; text-transform: uppercase; }
    </style>
</head>
<body>

    @include('partials.sidebar-admin')

    <div class="main-content">
        <div class="topbar">
            <div>
                <div style="font-size: 12px; font-weight: 700; color: #64748b;">Learning Management System</div>
                <div style="font-size: 18px; font-weight: 800;">Manajemen Materi Vokasi</div>
            </div>
        </div>

        <div class="content-area">
            @if(session('success')) <div class="alert-success">✓ {{ session('success') }}</div> @endif
            @if($errors->any()) <div class="alert-error">⚠️ {{ $errors->first() }}</div> @endif

            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                <div>
                    <h1 style="margin: 0; font-size: 24px; font-weight: 800;">Modul Pembelajaran</h1>
                    <p style="color: #64748b; margin-top: 6px; font-size: 14px;">Unggah modul PDF (Kesiapan Kerja / Kewirausahaan) untuk pengguna.</p>
                </div>
                <button onclick="openMateriModal()" class="btn-add">+ Tambah Materi</button>
            </div>

            <div class="card-container">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 50px;">NO</th>
                            <th>JUDUL MODUL</th>
                            <th>KATEGORI</th>
                            <th>TARGET AUDIENS</th>
                            <th style="text-align: right;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($materis as $index => $m)
                        <tr>
                            <td style="color: #94a3b8;">{{ $index + 1 }}</td>
                            <td>
                                <div style="color: #0f172a; font-weight: 800;">{{ $m->judul }}</div>
                                <div style="color: #64748b; font-size: 12px; margin-top: 4px;">{{ Str::limit($m->deskripsi, 50) }}</div>
                            </td>
                            <td>
                                <span style="background: #eff6ff; color: #3b82f6; padding: 4px 10px; border-radius: 6px; font-size: 11px; font-weight: 700;">{{ $m->kategori }}</span>
                            </td>
                            <td>
                                <span style="background: {{ $m->target_audience == 'SISWA' ? '#ecfdf5' : '#fef2f2' }}; color: {{ $m->target_audience == 'SISWA' ? '#10b981' : '#ef4444' }}; padding: 4px 10px; border-radius: 6px; font-size: 11px; font-weight: 700;">{{ $m->target_audience }}</span>
                            </td>
                            <td style="text-align: right;">
                                <div style="display: flex; justify-content: flex-end; gap: 8px;">
                                    @if($m->file_pdf)
                                        <a href="{{ asset('storage/' . $m->file_pdf) }}" target="_blank" style="background: #f1f5f9; color: #475569; border: none; padding: 6px 12px; border-radius: 6px; font-weight: 700; cursor: pointer; text-decoration: none; font-size: 12px; display: flex; align-items: center;">Lihat PDF</a>
                                    @endif
                                    <form action="{{ route('admin.materi.destroy', $m->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus materi ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" style="color: #ef4444; border: 1px solid #fecaca; background: #fef2f2; width: 32px; height: 32px; border-radius: 8px; display: inline-flex; align-items: center; justify-content: center; cursor: pointer;">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"></path><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 40px; color: #94a3b8;">Belum ada materi pembelajaran yang diunggah.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="materiModal" style="display:none; position:fixed; z-index:1000; left:0; top:0; width:100%; height:100%; background:rgba(0,0,0,0.5); align-items:center; justify-content:center;">
        <div style="background:#fff; width:100%; max-width:500px; padding:32px; border-radius:24px; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                <h2 style="margin: 0; font-weight: 800; font-size: 20px;">Tambah Materi Baru</h2>
                <button type="button" onclick="closeMateriModal()" style="background: none; border: none; font-size: 24px; cursor: pointer; color: #64748b;">&times;</button>
            </div>
            
            <form action="{{ route('admin.materi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="modal-label">JUDUL MODUL</label>
                <input type="text" name="judul" class="modal-input" placeholder="Contoh: Modul Kesiapan Kerja Bab 1" required>
                
                <div style="display:flex; gap:16px;">
                    <div style="flex:1;">
                        <label class="modal-label">KATEGORI</label>
                        <select name="kategori" class="modal-input" required>
                            <option value="Kesiapan Kerja">Kesiapan Kerja</option>
                            <option value="Kewirausahaan">Kewirausahaan</option>
                        </select>
                    </div>
                    <div style="flex:1;">
                        <label class="modal-label">TARGET AUDIENS</label>
                        <select name="target_audience" class="modal-input" required>
                            <option value="SISWA">Siswa / Alumni</option>
                            <option value="GURU">Guru / Instruktur</option>
                        </select>
                    </div>
                </div>

                <label class="modal-label">FILE PDF MODUL</label>
                <input type="file" name="file_pdf" accept="application/pdf" class="modal-input" required style="padding: 9px;">

                <label class="modal-label">DESKRIPSI SINGKAT</label>
                <textarea name="deskripsi" rows="3" class="modal-input" placeholder="Jelaskan ringkasan isi modul..." required></textarea>

                <div style="display:flex; gap:12px; margin-top: 8px;">
                    <button type="button" onclick="closeMateriModal()" style="flex:1; padding:14px; background:#f1f5f9; color: #475569; border:none; border-radius:12px; font-weight:700; cursor: pointer;">Batal</button>
                    <button type="submit" style="flex:1; padding:14px; background:#10b981; color:#fff; border:none; border-radius:12px; font-weight:800; cursor: pointer;">Upload Materi</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openMateriModal() {
            document.getElementById('materiModal').style.display = 'flex';
        }
        function closeMateriModal() {
            document.getElementById('materiModal').style.display = 'none';
        }
    </script>
</body>
</html>