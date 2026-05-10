<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perusahaan — Siap Lulus</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { margin: 0; padding: 0; font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; color: #0f172a; display: flex; min-height: 100vh; }
        .main-content { flex: 1; margin-left: 260px; display: flex; flex-direction: column; }
        .topbar { background: #fff; padding: 16px 32px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e2e8f0; position: sticky; top: 0; z-index: 90; }
        .content-area { padding: 32px; }

        .stats-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 32px; }
        .stat-card { background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 24px; box-shadow: 0 2px 4px rgba(0,0,0,0.02); display: flex; align-items: center; gap: 16px; }
        .stat-icon { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px; }
        .stat-info h4 { margin: 0; font-size: 13px; color: #64748b; font-weight: 700; text-transform: uppercase; }
        .stat-info div { font-size: 24px; font-weight: 800; color: #0f172a; margin-top: 4px; }

        .card-container { background: #fff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 24px; }
        .header-action { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .btn-primary { background: #3b82f6; color: #fff; border: none; padding: 10px 20px; border-radius: 10px; font-weight: 800; cursor: pointer; }
        
        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; padding: 12px 16px; font-size: 12px; font-weight: 800; color: #64748b; border-bottom: 1px solid #e2e8f0; }
        td { padding: 16px; border-bottom: 1px solid #f1f5f9; font-size: 14px; font-weight: 600; }
        
        .badge { padding: 4px 12px; border-radius: 20px; font-size: 11px; font-weight: 800; }
        .badge-pending { background: #fff7ed; color: #ea580c; border: 1px solid #ffedd5; }
        .badge-active { background: #ecfdf5; color: #10b981; border: 1px solid #a7f3d0; }

        /* Form Modal Styles */
        .modal-input { width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 8px; margin-bottom: 12px; font-family: inherit; box-sizing: border-box; }
        .modal-label { display: block; font-size: 11px; font-weight: 800; color: #64748b; margin-bottom: 6px; text-transform: uppercase; }
    </style>
</head>
<body>

    @include('partials.sidebar-perusahaan')

    <div class="main-content">
        <div class="topbar">
            <div>
                <div style="font-size: 12px; font-weight: 700; color: #64748b;">Dashboard Utama</div>
                <div style="font-size: 18px; font-weight: 800;">Panel Perusahaan</div>
            </div>
            <div style="display: flex; align-items: center; gap: 12px;">
                <div style="text-align: right;">
                    <div style="font-size: 13px; font-weight: 800;">{{ auth()->user()->name }}</div>
                    <div style="font-size: 11px; font-weight: 600; color: #3b82f6;">Mitra Industri</div>
                </div>
            </div>
        </div>

        <div class="content-area">
            @if(session('success'))
                <div style="background: #ecfdf5; color: #10b981; padding: 14px; border-radius: 10px; margin-bottom: 20px; font-weight: 700; border: 1px solid #a7f3d0;">
                    ✓ {{ session('success') }}
                </div>
            @endif

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon" style="background: #eff6ff; color: #3b82f6;">💼</div>
                    <div class="stat-info"><h4>Total Lowongan</h4><div>{{ $jobs->count() }}</div></div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background: #ecfdf5; color: #10b981;">👥</div>
                    <div class="stat-info"><h4>Pelamar Masuk</h4><div>0</div></div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background: #fff7ed; color: #ea580c;">⏳</div>
                    <div class="stat-info"><h4>Menunggu Review</h4><div>{{ $jobs->where('status', 'PENDING')->count() }}</div></div>
                </div>
            </div>

            <div class="card-container">
                <div class="header-action">
                    <h3 style="margin: 0; font-size: 18px; font-weight: 800;">Lowongan Kerja Anda</h3>
                    <button class="btn-primary" onclick="openJobModal()">+ Posting Lowongan</button>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>POSISI PEKERJAAN</th>
                            <th>LOKASI & TIPE</th>
                            <th>STATUS</th>
                            <th style="text-align: right;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jobs as $job)
                        <tr>
                            <td>
                                <div style="color: #0f172a; font-weight: 800;">{{ $job->title }}</div>
                                <div style="color: #94a3b8; font-size: 12px; margin-top: 4px;">Diposting {{ $job->created_at->format('d M Y') }}</div>
                            </td>
                            <td>
                                <div>{{ $job->location }}</div>
                                <div style="color: #64748b; font-size: 12px; margin-top: 4px;">{{ $job->type }}</div>
                            </td>
                            <td>
                                <span class="badge {{ $job->status == 'PENDING' ? 'badge-pending' : 'badge-active' }}">{{ $job->status }}</span>
                            </td>
                            <td>
                                <div style="display: flex; justify-content: flex-end; gap: 8px;">
                                    <button type="button" 
                                        onclick="editJobModal({{ $job->id }}, '{{ $job->title }}', '{{ $job->location }}', '{{ $job->type }}', '{{ $job->sector_id }}', '{{ $job->salary }}', '{{ addslashes($job->description) }}')" 
                                        style="background: #eff6ff; color: #3b82f6; border: none; padding: 6px 12px; border-radius: 6px; font-weight: 700; cursor: pointer;">Edit</button>
                                    
                                    <form action="{{ route('company.jobs.destroy', $job->id) }}" method="POST" onsubmit="return confirm('Hapus lowongan ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" style="background: #fef2f2; color: #ef4444; border: none; padding: 6px 12px; border-radius: 6px; font-weight: 700; cursor: pointer;">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="text-align: center; padding: 40px; color: #94a3b8;">Belum ada lowongan kerja.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="jobModal" style="display:none; position:fixed; z-index:1000; left:0; top:0; width:100%; height:100%; background:rgba(0,0,0,0.5); align-items:center; justify-content:center;">
        <div style="background:#fff; width:100%; max-width:600px; border-radius:16px; overflow:hidden;">
            <div style="padding:20px; border-bottom:1px solid #e2e8f0; display:flex; justify-content:space-between; align-items:center;">
                <h3 id="modalTitle" style="margin:0; font-size:18px; font-weight:800;">Buat Lowongan Baru</h3>
                <button onclick="closeJobModal()" style="background:none; border:none; font-size:24px; cursor:pointer;">&times;</button>
            </div>
            
            <form id="jobForm" method="POST" action="{{ route('company.jobs.store') }}" style="padding:20px; max-height:70vh; overflow-y:auto;">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">

                <label class="modal-label">Judul Pekerjaan</label>
                <input type="text" name="title" id="job_title" class="modal-input" required>

                <div style="display: flex; gap: 12px;">
                    <div style="flex:1;">
                        <label class="modal-label">Lokasi</label>
                        <input type="text" name="location" id="job_location" class="modal-input" required>
                    </div>
                    <div style="flex:1;">
                        <label class="modal-label">Tipe Kerja</label>
                        <select name="type" id="job_type" class="modal-input" required>
                            <option value="Full-time">Full-time</option>
                            <option value="Part-time">Part-time</option>
                            <option value="Internship">Internship (Magang)</option>
                            <option value="Contract">Kontrak</option>
                        </select>
                    </div>
                </div>

                <div style="display: flex; gap: 12px;">
                    <div style="flex:1;">
                        <label class="modal-label">Sektor Industri</label>
                        <select name="sector_id" id="job_sector" class="modal-input" required>
                            <option value="">-- Pilih Sektor --</option>
                            @foreach($sectors as $s)
                                <option value="{{ $s->id }}">{{ $s->nama_sektor }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="flex:1;">
                        <label class="modal-label">Gaji (Opsional)</label>
                        <input type="text" name="salary" id="job_salary" class="modal-input" placeholder="Rp. 4.000.000 - Rp. 5.000.000">
                    </div>
                </div>

                <label class="modal-label">Deskripsi & Syarat</label>
                <textarea name="description" id="job_description" class="modal-input" rows="5" required></textarea>

                <div style="display:flex; gap:10px; margin-top: 10px;">
                    <button type="button" onclick="closeJobModal()" style="flex:1; padding:12px; background:#f1f5f9; color:#475569; border:none; border-radius:10px; font-weight:700; cursor:pointer;">Batal</button>
                    <button type="submit" id="btnSubmit" style="flex:1; padding:12px; background:#3b82f6; color:#fff; border:none; border-radius:10px; font-weight:700; cursor:pointer;">Simpan Lowongan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const modal = document.getElementById('jobModal');
        const form = document.getElementById('jobForm');
        
        function openJobModal() {
            document.getElementById('modalTitle').innerText = "Buat Lowongan Baru";
            form.action = "{{ route('company.jobs.store') }}";
            document.getElementById('formMethod').value = "POST";
            
            // Reset form
            form.reset();
            modal.style.display = 'flex';
        }

        function editJobModal(id, title, location, type, sector_id, salary, description) {
            document.getElementById('modalTitle').innerText = "Edit Lowongan Kerja";
            
            // Ubah action menjadi Update & Method spoofing jadi PUT
            form.action = "/company/jobs/" + id;
            document.getElementById('formMethod').value = "PUT";

            // Isi nilai input
            document.getElementById('job_title').value = title;
            document.getElementById('job_location').value = location;
            document.getElementById('job_type').value = type;
            document.getElementById('job_sector').value = sector_id;
            document.getElementById('job_salary').value = salary || '';
            document.getElementById('job_description').value = description;

            modal.style.display = 'flex';
        }

        function closeJobModal() {
            modal.style.display = 'none';
        }
    </script>
</body>
</html>