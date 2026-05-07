<div class="sidebar-wrapper" style="background: #fff; border: 1px solid #e2e8f0; border-radius: 20px; padding: 16px; font-family: 'Nunito', sans-serif; width: 260px; box-sizing: border-box; display: flex; flex-direction: column; gap: 16px; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">

    <div style="display: flex; flex-direction: column; align-items: center; text-align: center;">
        
        <div style="width: 56px; height: 56px; background: linear-gradient(135deg, #10b981, #3b82f6); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 20px; font-weight: 900; font-family: Georgia, serif; color: #fff; margin-bottom: 8px; box-shadow: 0 4px 10px rgba(16, 185, 129, 0.2);">
            {{ strtoupper(substr(auth()->user()->name ?? 'AR', 0, 2)) }}
        </div>

        <div style="font-size: 14px; font-weight: 800; color: #0f172a; margin-bottom: 2px;">
            {{ auth()->user()->name ?? 'Aldi Ramadan' }}
        </div>
        <div style="font-size: 10px; color: #64748b; font-weight: 600; margin-bottom: 12px;">
            {{ auth()->user()->jurusan ?? 'SMK ATP' }} · XII · {{ auth()->user()->sekolah ?? 'SMKN 1 Ketapang' }}
        </div>

        <div style="background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 12px; padding: 12px; width: 100%; box-sizing: border-box;">
            <div style="font-size: 32px; font-weight: 900; color: #10b981; font-family: Georgia, serif; line-height: 1;">
                {{ auth()->user()->match_score ?? 88 }}
            </div>
            <div style="font-size: 10px; color: #64748b; font-weight: 700; margin-top: 4px; margin-bottom: 8px; text-transform: uppercase;">
                Match Score
            </div>
            
            <div style="width: 100%; height: 4px; background: #e2e8f0; border-radius: 10px; overflow: hidden; display: flex;">
                <div style="width: 88%; height: 100%; background: #10b981;"></div>
            </div>
        </div>

        <div style="display: flex; gap: 6px; justify-content: center; margin-top: 12px;">
            <span style="background: #d1fae5; color: #059669; font-size: 10px; font-weight: 800; padding: 2px 8px; border-radius: 12px;">Agribisnis</span>
            <span style="background: #fef3c7; color: #d97706; font-size: 10px; font-weight: 800; padding: 2px 8px; border-radius: 12px;">RSPO</span>
            <span style="background: #e0f2fe; color: #2563eb; font-size: 10px; font-weight: 800; padding: 2px 8px; border-radius: 12px;">Sawit</span>
        </div>
    </div>

    <div style="background: #0b1120; border-radius: 12px; padding: 12px; text-align: center; position: relative; overflow: hidden;">
        <div style="font-size: 22px; font-weight: 900; color: #f59e0b; font-family: Georgia, serif; margin-bottom: 4px; position: relative; z-index: 1;">
            {{ number_format(auth()->user()->xp ?? 1240, 0, ',', '.') }} XP
        </div>
        <div style="font-size: 9px; color: #94a3b8; font-weight: 600; margin-bottom: 8px; position: relative; z-index: 1;">
            Level 8 · 260 XP menuju Level 9
        </div>
        
        <div style="width: 100%; height: 4px; background: rgba(255,255,255,0.1); border-radius: 10px; overflow: hidden; position: relative; z-index: 1;">
            <div style="width: 82%; height: 100%; background: linear-gradient(90deg, #10b981, #8b5cf6);"></div>
        </div>
    </div>

    <div style="height: 1px; background: #e2e8f0; width: 100%;"></div>

    <div>
        <div style="font-size: 10px; font-weight: 800; color: #64748b; letter-spacing: 0.5px; margin-bottom: 8px;">
            CARI KERJA
        </div>
        
        <div style="display: flex; flex-direction: column; gap: 2px;">
            <a href="{{ route('dashboard.index') }}" class="sb-item {{ $active_page == 'kerja' ? 'active' : '' }}">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div class="sb-icon" style="background: #e0f2fe;">🔍</div>
                    <span>Semua Lowongan</span>
                </div>
                <div class="sb-badge" style="color: #10b981;">28</div>
            </a>

            <a href="#" class="sb-item">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div class="sb-icon" style="background: #fef3c7;">⭐</div>
                    <span>Rekomendasi AI</span>
                </div>
                <div class="sb-badge" style="color: #f59e0b;">6</div>
            </a>

            <a href="{{ route('dashboard.lamaran') }}" class="sb-item {{ $active_page == 'lamaran' ? 'active' : '' }}">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div class="sb-icon" style="background: #f1f5f9;">📋</div>
                    <span>Lamaranku</span>
                </div>
                <div class="sb-badge" style="color: #3b82f6;">{{ auth()->user()->total_lamar ?? 3 }}</div>
            </a>

            <a href="#" class="sb-item">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div class="sb-icon" style="background: #ffe4e6;">🔖</div>
                    <span>Disimpan</span>
                </div>
                <div class="sb-badge" style="color: #c084fc;">{{ auth()->user()->total_simpan ?? 5 }}</div>
            </a>
        </div>
    </div>

    <div style="height: 1px; background: #e2e8f0; width: 100%;"></div>

    <div>
        <div style="font-size: 10px; font-weight: 800; color: #64748b; letter-spacing: 0.5px; margin-bottom: 8px;">
            BELAJAR & KARIER
        </div>
        
        <div style="display: flex; flex-direction: column; gap: 2px;">
            <a href="{{ route('dashboard.lms') }}" class="sb-item {{ $active_page == 'lms' ? 'active' : '' }}">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div class="sb-icon" style="background: #f3e8ff;">📚</div>
                    <span>LMS Belajar</span>
                </div>
                <div style="background: #d1fae5; color: #10b981; font-size: 9px; font-weight: 800; padding: 2px 6px; border-radius: 10px;">Baru</div>
            </a>

            <a href="#" class="sb-item">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div class="sb-icon" style="background: #ffedd5;">🏫</div>
                    <span>LPK & Pelatihan</span>
                </div>
            </a>

            <a href="#" class="sb-item">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div class="sb-icon" style="background: #fef3c7;">🏢</div>
                    <span>Portal Perusahaan</span>
                </div>
            </a>

            <a href="{{ route('dashboard.profil') }}" class="sb-item {{ $active_page == 'profil' ? 'active' : '' }}">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div class="sb-icon" style="background: transparent;">👤</div>
                    <span>Profil Saya</span>
                </div>
            </a>
        </div>
    </div>

</div>

<style>
    /* Style Dasar Item Menu (COMPACT) */
    .sb-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 6px 10px; /* Padding dikurangi */
        border-radius: 10px;
        text-decoration: none;
        color: #475569;
        font-weight: 700;
        font-size: 12px; /* Ukuran font menu dikecilkan */
        transition: all 0.2s ease;
    }

    .sb-item:hover {
        background: #f8fafc;
        color: #0f172a;
    }

    /* Kotak Ikon di dalam Menu (COMPACT) */
    .sb-icon {
        width: 26px; /* Ikon dikecilkan */
        height: 26px;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
    }

    .sb-badge {
        font-size: 11px;
        font-weight: 800;
        opacity: 0.8;
    }

    .sb-item.active {
        background: #ecfdf5;
        color: #10b981;
    }
    .sb-item.active .sb-icon {
        color: #10b981;
    }
</style>