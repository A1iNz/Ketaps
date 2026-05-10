<style>
    /* Reset & Sidebar Base */
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
        box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
    }

    .sidebar-header {
        padding: 24px;
        display: flex;
        align-items: center;
        gap: 12px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    .sidebar-menu {
        padding: 20px 16px;
        display: flex;
        flex-direction: column;
        gap: 8px;
        flex: 1;
    }

    /* Menu Items */
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

    .menu-item:hover {
        background: rgba(255, 255, 255, 0.05);
        color: #fff;
        transform: translateX(5px);
    }

    .menu-item.active {
        background: #10b981;
        color: #fff;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
    }

    .menu-icon {
        font-size: 18px;
    }

    /* Tombol Logout Khusus */
    .btn-logout {
        margin-top: auto;
        border: none;
        background: transparent;
        width: 100%;
        cursor: pointer;
        text-align: left;
        font-family: inherit;
    }

    .btn-logout:hover .menu-item {
        color: #ef4444;
        background: rgba(239, 68, 68, 0.05);
    }
</style>

<div class="sidebar">
    <div class="sidebar-header">
        <div style="background: #10b981; padding: 8px; border-radius: 8px; line-height: 1;">
            <span style="font-size: 18px;">🎓</span>
        </div>
        <div style="font-weight: 800; font-family: Georgia, serif; font-size: 18px; letter-spacing: 0.5px;">Admin Panel
        </div>
    </div>

    <div class="sidebar-menu">
        <a href="{{ route('admin.dashboard') }}" class="menu-item {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
            <span class="menu-icon">📊</span> Dashboard
        </a>

        <a href="{{ route('admin.users') }}" class="menu-item {{ Request::is('admin/users*') ? 'active' : '' }}">
            <span class="menu-icon">👥</span> Kelola Pengguna
        </a>

        <a href="{{ route('admin.jobs.index') }}" class="menu-item {{ Request::is('admin/jobs*') ? 'active' : '' }}">
            <span class="menu-icon">💼</span> Verifikasi Lowongan
        </a>

        <a href="{{ route('admin.sectors.index') }}"
            class="menu-item {{ Request::is('admin/sectors*') ? 'active' : '' }}">
            <span class="menu-icon">🏢</span> Sektor Industri
        </a>
        
        <a href="{{ route('admin.materi.index') }}"
            class="menu-item {{ Request::is('admin/materi*') ? 'active' : '' }}">
            <span class="menu-icon">📖</span> Materi Vokasi
        </a>

        <a href="{{ route('admin.logs') }}" class="menu-item {{ Request::is('admin/logs*') ? 'active' : '' }}">
            <span class="menu-icon">📜</span> Log Aktivitas
        </a>

        <a href="#" onclick="window.print()" class="menu-item" style="border-top: 10px; border-color: white;">
            <span class="menu-icon">🖨️</span> Cetak Laporan
        </a>

        <form action="{{ route('logout') }}" method="POST" class="btn-logout">
            @csrf
            <button type="submit" class="menu-item"
                style="width: 100%; background: none; border: none; color: inherit; font: inherit; cursor: pointer; display: flex; align-items: center; gap: 12px;">
                <span class="menu-icon">🚪</span> Keluar Sistem
            </button>
        </form>
    </div>
</div>
