<div class="topbar"
    style="background: #0b1120; border-bottom: 1px solid rgba(255,255,255,0.05); padding: 12px 24px; display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 1000; font-family: 'Nunito', sans-serif;">

    <div style="display: flex; align-items: center; gap: 5px; min-width: 250px;">
        <a href="{{ route('dashboard.index') }}"
            style="display: flex; align-items: center; gap: 10px; text-decoration: none;">
            <div
                style="background: #10b981; padding: 6px; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L2 7L12 12L22 7L12 2Z" fill="white" />
                    <path d="M2 12L12 17L22 12" stroke="white" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M2 17L12 22L22 17" stroke="white" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>
            <div style="color: #fff; font-weight: 900; font-size: 20px; font-family: Georgia, serif;">Siap Lulus</div>
        </a>
        <div
            style="background: #10b981; color: #fff; font-size: 10px; font-weight: 800; padding: 4px 10px; border-radius: 12px; letter-spacing: 0.5px;">
            SISWA
        </div>
    </div>

    <div style="flex: 1; max-width: 450px; position: relative;">
        <form action="#" method="GET" style="margin: 0;">
            <input type="text" name="search" placeholder="Cari lowongan, materi, LPK..."
                style="width: 100%; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.05); padding: 10px 15px 10px 40px; border-radius: 12px; color: #fff; font-family: inherit; font-size: 14px; outline: none; transition: 0.3s; box-sizing: border-box;">
            <svg style="position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: #64748b;"
                width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="rsound" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </form>
    </div>

    <div style="display: flex; align-items: center;">
        <div style="display: flex; margin-left: 6px">
            <a href="{{ route('dashboard.index') }}" class="nav-item {{ $active_page == 'kerja' ? 'active' : '' }}">
                <div class="nav-dot" style="background: #10b981;"></div> Cari Kerja
            </a>
            <a href="{{ route('dashboard.lms') }}" class="nav-item {{ $active_page == 'lms' ? 'active' : '' }}">
                <div class="nav-dot" style="background: #8b5cf6;"></div> LMS Belajar
            </a>
            <a href="{{ route('dashboard.lamaran') }}" class="nav-item {{ $active_page == 'lamaran' ? 'active' : '' }}">
                <div class="nav-dot" style="background: #3b82f6;"></div> Lamaranku
            </a>
            <a href="{{ route('dashboard.profil') }}" class="nav-item {{ $active_page == 'profil' ? 'active' : '' }}">
                <div class="nav-dot" style="background: #f59e0b;"></div> Profil
            </a>
        </div>

        <div style="margin-right: 4px; width: 2px; height: 24px; background: rgba(255,255,255,0.1);"></div>

        <div
            style="display: flex; align-items: center; background: rgba(245, 158, 11, 0.1); border: 1px solid rgba(245, 158, 11, 0.3); color: #fbbf24; padding: 6px 14px;margin-right: 4px; border-radius: 20px; font-weight: 800; font-size: 13px;">
            ⚡ {{ number_format(auth()->user()->xp ?? 1240, 0, ',', '.') }} XP
        </div>

        <button
            style="margin-right: 4px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.05); width: 40px; height: 40px; border-radius: 12px; display: flex; align-items: center; justify-content: center; cursor: pointer; position: relative; color: #cbd5e1; transition: 0.3s;"
            class="btn-hover">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                </path>
            </svg>
            <div
                style="position: absolute; top: 10px; right: 12px; width: 8px; height: 8px; background: #ef4444; border-radius: 50%; border: 2px solid #0b1120;">
            </div>
        </button>

        <div class="dropdown-profile" style="margin-right: -5px; position: relative; cursor: pointer;">
            <div style="display: flex; align-items: center; gap: 10px; background: rgba(255,255,255,0.05); padding: 4px 14px 4px 4px; border-radius: 30px; border: 1px solid rgba(255,255,255,0.05); transition: 0.3s;"
                class="btn-hover">
                <div
                    style="background: #10b981; width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px; color: #fff;">
                    {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                </div>
                <div style="color: #fff; font-weight: 700; font-size: 14px;">
                    {{ explode(' ', auth()->user()->name)[0] }}
                </div>
            </div>

            <div class="dropdown-content">
                <label for="edit-modal-toggle"
                    style="display: block; padding: 12px 16px; cursor: pointer; color: #1e293b; font-weight: 700; font-size: 14px; transition: 0.2s;">⚙️
                    Pengaturan Profil</label>
                <form action="{{ route('logout') }}" method="POST" style="margin: 0; border-top: 1px solid #f1f5f9;">
                    @csrf
                    <button type="submit"
                        style="width: 100%; text-align: left; background: none; border: none; padding: 12px 16px; color: #ef4444; font-weight: 700; cursor: pointer; font-family: inherit; font-size: 14px; transition: 0.2s;">🚪
                        Keluar Akun</button>
                </form>
            </div>
        </div>

    </div>
</div>

<style>
    /* Style untuk Item Navigasi */
    .nav-item {
        display: flex;
        align-items: center;
        gap: 2px;
        color: rgba(255, 255, 255, 0.7);
        text-decoration: none;
        font-size: 14px;
        padding: 8px 8px;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .nav-item:hover {
        color: #fff;
        background: rgba(255, 255, 255, 0.05);
    }

    .nav-item.active {
        background: rgba(255, 255, 255, 0.1);
        color: #fff;
    }

    /* Titik Warna Navigasi */
    .nav-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
    }

    /* Efek Hover Umum */
    .btn-hover:hover {
        background: rgba(255, 255, 255, 0.1) !important;
    }

    /* Input Search Focus */
    input[name="search"]:focus {
        border-color: rgba(255, 255, 255, 0.2) !important;
        background: rgba(255, 255, 255, 0.08) !important;
    }

    /* Dropdown Logic */
    .dropdown-profile:hover .dropdown-content {
        display: block;
        opacity: 1;
        transform: translateY(0);
        pointer-events: auto;
    }

    .dropdown-content {
        display: block;
        opacity: 0;
        transform: translateY(10px);
        pointer-events: none;
        position: absolute;
        right: 0;
        top: 110%;
        background: #fff;
        min-width: 180px;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
    }

    .dropdown-content label:hover,
    .dropdown-content button:hover {
        background: #f8fafc;
    }
</style>
