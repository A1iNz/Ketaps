<style>
    /* Reset & Base Sidebar */
    .sidebar { 
        width: 260px; 
        background: #0f172a; /* Warna slate dark yang elegan */
        color: #fff; 
        display: flex; 
        flex-direction: column; 
        position: fixed; 
        height: 100vh; 
        left: 0; 
        top: 0; 
        z-index: 1000; /* Pastikan selalu di atas elemen lain */
        box-shadow: 4px 0 15px rgba(0,0,0,0.05);
    }

    /* Header Sidebar (Logo/Judul) */
    .sidebar-header { 
        padding: 24px; 
        display: flex; 
        align-items: center; 
        gap: 12px; 
        border-bottom: 1px solid rgba(255,255,255,0.05); 
    }

    .sh-icon {
        background: #3b82f6; 
        padding: 8px; 
        border-radius: 8px; 
        line-height: 1;
        font-size: 18px;
    }

    .sh-title {
        font-weight: 800; 
        font-family: 'Plus Jakarta Sans', sans-serif; 
        font-size: 18px;
        letter-spacing: 0.5px;
    }

    /* Menu Container */
    .sidebar-menu { 
        padding: 20px 16px; 
        display: flex; 
        flex-direction: column; 
        gap: 8px; 
        flex: 1; 
        overflow-y: auto; /* Memungkinkan scroll jika menu bertambah banyak */
    }

    /* Item Menu Standar */
    .menu-item { 
        display: flex; 
        align-items: center; 
        gap: 12px; 
        padding: 12px 16px; 
        color: #94a3b8; 
        text-decoration: none; 
        border-radius: 10px; 
        font-size: 14px; 
        font-weight: 600; 
        transition: all 0.3s ease;
    }

    /* Fix Lebar Ikon agar Teks Sejajar Rapi */
    .menu-icon {
        font-size: 18px;
        width: 24px; 
        text-align: center;
        display: inline-block;
    }

    /* Efek Hover & Active */
    .menu-item:hover { 
        background: rgba(255,255,255,0.05); 
        color: #fff; 
        transform: translateX(5px); /* Efek geser kanan yang modern */
    }

    .menu-item.active { 
        background: #3b82f6; 
        color: #fff; 
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.25);
    }

    /* Khusus Tombol Logout di Bawah */
    .logout-wrapper {
        margin-top: auto; /* Mendorong tombol logout otomatis ke paling bawah */
        padding-top: 10px;
    }

    .btn-logout { 
        width: 100%; 
        border: none; 
        background: transparent; 
        cursor: pointer; 
        padding: 0; 
        font-family: inherit;
    }

    .btn-logout .menu-item {
        color: #f87171; /* Warna merah pudar saat diam */
    }

    .btn-logout:hover .menu-item { 
        color: #ef4444; 
        background: rgba(239, 68, 68, 0.1); 
        transform: translateX(5px);
    }
    
    /* Percantik Scrollbar di Sidebar */
    .sidebar-menu::-webkit-scrollbar { width: 4px; }
    .sidebar-menu::-webkit-scrollbar-track { background: transparent; }
    .sidebar-menu::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 10px; }
</style>

<div class="sidebar">
    <div class="sidebar-header">
        <div class="sh-icon">🏢</div>
        <div class="sh-title">Mitra Industri</div>
    </div>
    
    <div class="sidebar-menu">
        <a href="{{ route('company.dashboard') }}" class="menu-item {{ Request::is('company/dashboard*') ? 'active' : '' }}">
            <span class="menu-icon">📊</span> Dashboard & Lowongan
        </a>
        
        <a href="{{ route('company.applicants') }}" class="menu-item {{ Request::is('company/applicants*') ? 'active' : '' }}">
            <span class="menu-icon">👥</span> Daftar Pelamar
        </a>
        
        <a href="{{ route('company.profile') }}" class="menu-item {{ Request::is('company/profile*') ? 'active' : '' }}">
            <span class="menu-icon">⚙️</span> Profil Instansi
        </a>
        
        <div class="logout-wrapper">
            <form action="{{ route('logout') }}" method="POST" class="btn-logout">
                @csrf
                <button type="submit" class="menu-item" style="width: 100%; text-align: left;">
                    <span class="menu-icon">🚪</span> Keluar Sistem
                </button>
            </form>
        </div>
    </div>
</div>