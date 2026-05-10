@extends('dashboard.index')
@section('konten_tengah')
    <div style="font-family: 'Plus Jakarta Sans', sans-serif;">
        
        @if (auth()->user()->role !== 'GUEST')
            <div style="background: #0f172a; border-radius: 16px; padding: 24px; display: flex; align-items: center; gap: 24px; position: relative; overflow: hidden; margin-bottom: 24px; color: #fff; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
                <div style="position: absolute; right: -50px; top: -50px; width: 300px; height: 300px; background: radial-gradient(circle, rgba(16, 185, 129, 0.15) 0%, transparent 70%); border-radius: 50%; z-index: 0;"></div>
                <div style="font-size: 42px; line-height: 1; position: relative; z-index: 1;">🎯</div>
                <div style="flex: 1; position: relative; z-index: 1;">
                    <h2 style="margin: 0 0 6px 0; font-weight: 800; font-size: 14px; color: #ffffff;">Profil 78% lengkap — Tambahkan CV untuk skor lebih tinggi</h2>
                    <p style="margin: 0; color: #94a3b8; font-weight: 700; font-size: 12px;">Profil lengkap meningkatkan peluang dilihat pemberi kerja hingga 3×</p>
                </div>
                <div style="position: relative; z-index: 1;">
                    <a href="{{ route('dashboard.profil') }}" style="display: inline-block; background: #10b981; color: #fff; padding: 12px 24px; border-radius: 10px; font-weight: 700; text-decoration: none; font-size: 14px; white-space: nowrap; transition: background 0.3s ease;" class="hover-green">Lengkapi Profil →</a>
                </div>
            </div>
        @endif

        <form id="filterForm" action="{{ route('dashboard.cari-kerja') }}" method="GET" style="margin-bottom: 16px;">
            <div class="search-bar-pill">
                
                <div class="search-input-group custom-dropdown" id="dropdownSector">
                    <div class="dropdown-selected">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
                        <span class="selected-text">Semua Sektor Industri</span>
                        <input type="hidden" name="sector" value="{{ request('sector') }}">
                        <svg class="chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="3"><path d="M19 9l-7 7-7-7"/></svg>
                    </div>
                    <div class="dropdown-menu-list">
                        <div class="dropdown-item" data-value="">Semua Sektor Industri</div>
                        @foreach($sectors as $sector)
                            <div class="dropdown-item" data-value="{{ $sector->slug }}">{{ $sector->nama_sektor }}</div>
                        @endforeach
                    </div>
                </div>

                <div class="search-divider"></div>

                <div class="search-input-group custom-dropdown" id="dropdownLocation">
                    <div class="dropdown-selected">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        <span class="selected-text">Semua Lokasi</span>
                        <input type="hidden" name="location" value="{{ request('location') }}">
                        <svg class="chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="3"><path d="M19 9l-7 7-7-7"/></svg>
                    </div>
                    <div class="dropdown-menu-list">
                        <div class="dropdown-item" data-value="">Semua Lokasi</div>
                        <div class="dropdown-item" data-value="Surabaya">Surabaya</div>
                        <div class="dropdown-item" data-value="Sidoarjo">Sidoarjo</div>
                    </div>
                </div>

                <button type="submit" class="btn-search-main">Cari</button>
            </div>

            <div class="filter-pills-row">
                <a href="{{ route('dashboard.cari-kerja', array_merge(request()->all(), ['type' => ''])) }}" class="pill-chip {{ !request('type') ? 'active' : '' }}">Semua</a>
                <a href="{{ route('dashboard.cari-kerja', array_merge(request()->all(), ['type' => 'Magang'])) }}" class="pill-chip {{ request('type') == 'Magang' ? 'active' : '' }}">🎓 Magang</a>
                <a href="{{ route('dashboard.cari-kerja', array_merge(request()->all(), ['type' => 'Full-time'])) }}" class="pill-chip {{ request('type') == 'Full-time' ? 'active' : '' }}">💼 Full-time</a>
            </div>
        </form>

        <div class="status-tabs">
            <a href="#" class="tab-link active">Semua Lowongan</a>
            <a href="#" class="tab-link">Rekomendasi AI ✨</a>
            <a href="#" class="tab-link">Sedang Dilamar</a>
        </div>

        <div style="display: flex; flex-direction: column; gap: 16px; margin-top: 24px;">
            @forelse($jobs as $job)
                <div class="job-card-wide">
                    @php
                        $words = explode(' ', trim($job->company_name));
                        $initials = strtoupper(substr($words[0], 0, 1) . (isset($words[1]) ? substr($words[1], 0, 1) : ''));
                    @endphp
                    <div class="company-logo-box">{{ $initials }}</div>
                    <div style="flex: 1;">
                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px;">
                            <h3 style="margin: 0; font-size: 17px; font-weight: 800; color: #0f172a;">{{ $job->title }}</h3>
                            <span class="verified-badge">✓ Verified</span>
                        </div>
                        <p style="margin: 0 0 12px 0; font-size: 13px; color: #3b82f6; font-weight: 700;">{{ $job->company_name }}</p>
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <span class="info-item">📍 {{ $job->location }}</span>
                            <span class="info-dot"></span>
                            <span class="info-item">💼 {{ $job->type }}</span>
                        </div>
                    </div>
                    <div style="text-align: right; min-width: 180px; border-left: 1px solid #f1f5f9; padding-left: 20px;">
                        <div style="font-size: 11px; color: #94a3b8; font-weight: 600; margin-bottom: 12px;">
                            Aktif {{ $job->created_at->diffForHumans() }}
                        </div>
                        <div style="display: flex; gap: 8px; justify-content: flex-end;">
                            <button type="button" class="btn-wide-outline">Detail</button>
                            <button type="button" class="btn-wide-primary">Lamar</button>
                        </div>
                    </div>
                </div>
            @empty
                <div style="text-align: center; padding: 60px; color: #64748b;">Belum ada lowongan.</div>
            @endforelse
        </div>
    </div>

    <style>
        /* CUSTOM DROPDOWN CSS */
        .custom-dropdown { position: relative; cursor: pointer; user-select: none; }
        
        .dropdown-selected {
            display: flex;
            align-items: center;
            gap: 10px;
            width: 100%;
            padding: 10px 15px;
        }

        .selected-text { font-size: 13px; font-weight: 700; color: #0f172a; flex: 1; }
        .chevron { transition: 0.3s; }
        
        /* INI TAMPILAN LIST MENU (KAYAK TABEL MODAL) */
        .dropdown-menu-list {
            position: absolute;
            top: calc(100% + 15px);
            left: 0;
            width: 100%;
            background: #fff;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            z-index: 99;
            display: none; /* Sembunyi secara default */
            overflow: hidden;
            padding: 8px;
        }

        .dropdown-item {
            padding: 12px 16px;
            font-size: 13px;
            font-weight: 600;
            color: #475569;
            border-radius: 10px;
            transition: 0.2s;
        }

        .dropdown-item:hover { background: #f1f5f9; color: #0f172a; }
        
        /* Efek Aktif */
        .custom-dropdown.active .dropdown-menu-list { display: block; }
        .custom-dropdown.active .chevron { transform: rotate(180deg); }

        /* SEARCH BAR PILL */
        .search-bar-pill { display: flex; align-items: center; background: #fff; border: 1px solid #e2e8f0; border-radius: 9999px; padding: 6px 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.03); margin-bottom: 12px; }
        .search-input-group { flex: 1; }
        .search-divider { width: 1px; height: 28px; background: #e2e8f0; margin: 0 8px; }
        .btn-search-main { background: #0f172a; color: #fff; border: none; padding: 10px 24px; border-radius: 9999px; font-weight: 800; font-size: 13px; cursor: pointer; transition: 0.2s; margin-left: 8px; }

        /* TIPE CHIPS & TAB LINKS */
        .filter-pills-row { display: flex; gap: 8px; margin-bottom: 24px; }
        .pill-chip { padding: 6px 16px; border-radius: 9999px; font-size: 12px; font-weight: 700; text-decoration: none; border: 1px solid #e2e8f0; background: #fff; color: #64748b; }
        .pill-chip.active { background: #eff6ff; color: #2563eb; border-color: #bfdbfe; }
        .status-tabs { display: flex; gap: 24px; border-bottom: 1px solid #e2e8f0; }
        .tab-link { padding-bottom: 12px; font-size: 13px; font-weight: 700; color: #64748b; text-decoration: none; position: relative; }
        .tab-link.active { color: #0f172a; }
        .tab-link.active::after { content: ''; position: absolute; bottom: -1px; left: 0; width: 100%; height: 2px; background: #0f172a; }

        /* WIDE CARD */
        .job-card-wide { background: #fff; border: 1px solid #e2e8f0; border-radius: 20px; padding: 24px; display: flex; align-items: center; gap: 24px; transition: 0.3s; }
        .job-card-wide:hover { border-color: #cbd5e1; transform: translateY(-2px); }
        .company-logo-box { width: 60px; height: 60px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 20px; font-weight: 800; color: #0f172a; flex-shrink: 0; }
        .verified-badge { background: #ecfdf5; color: #10b981; font-size: 9px; font-weight: 800; padding: 2px 8px; border-radius: 9999px; border: 1px solid #a7f3d0; text-transform: uppercase; }
        .info-item { font-size: 12px; color: #64748b; font-weight: 600; }
        .info-dot { width: 4px; height: 4px; background: #cbd5e1; border-radius: 50%; }
        .btn-wide-outline { background: #fff; color: #475569; border: 1px solid #cbd5e1; padding: 10px 18px; border-radius: 10px; font-weight: 700; font-size: 12px; cursor: pointer; }
        .btn-wide-primary { background: #0f172a; color: #fff; border: none; padding: 10px 24px; border-radius: 10px; font-weight: 800; font-size: 12px; cursor: pointer; }
        .hover-green:hover { background: #059669 !important; }
    </style>

    <script>
        document.querySelectorAll('.custom-dropdown').forEach(dropdown => {
            const selected = dropdown.querySelector('.dropdown-selected');
            const menu = dropdown.querySelector('.dropdown-menu-list');
            const input = dropdown.querySelector('input');
            const selectedText = dropdown.querySelector('.selected-text');

            // Klik untuk buka/tutup
            selected.addEventListener('click', (e) => {
                e.stopPropagation();
                // Tutup dropdown lain
                document.querySelectorAll('.custom-dropdown').forEach(d => {
                    if (d !== dropdown) d.classList.remove('active');
                });
                dropdown.classList.toggle('active');
            });

            // Klik item untuk pilih
            menu.querySelectorAll('.dropdown-item').forEach(item => {
                item.addEventListener('click', () => {
                    input.value = item.dataset.value;
                    selectedText.innerText = item.innerText;
                    dropdown.classList.remove('active');
                });
            });
        });

        // Klik di luar untuk tutup
        window.addEventListener('click', () => {
            document.querySelectorAll('.custom-dropdown').forEach(d => d.classList.remove('active'));
        });
    </script>
@endsection