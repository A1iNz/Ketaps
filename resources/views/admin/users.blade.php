<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengguna — Admin Siap Lulus</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        /* Base Reset & Layout */
        body { margin: 0; padding: 0; font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; color: #0f172a; display: flex; min-height: 100vh; }
        .main-content { flex: 1; margin-left: 260px; display: flex; flex-direction: column; height: 100vh; overflow: hidden; }
        .topbar { background: #fff; padding: 12px 24px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e2e8f0; z-index: 90; }
        .content-area { padding: 24px; flex: 1; overflow-y: auto; }

        /* Grid & Cards */
        .roles-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; }
        .role-card { background: #fff; border-radius: 12px; border: 1px solid #e2e8f0; display: flex; flex-direction: column; overflow: hidden; height: 340px; box-shadow: 0 2px 4px rgba(0,0,0,0.02); }
        .rc-header { padding: 12px 16px; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center; }
        .rc-header-title { font-weight: 800; font-size: 13px; display: flex; align-items: center; gap: 8px; }
        .rc-count { background: #fff; border-radius: 20px; padding: 2px 8px; font-size: 11px; font-weight: 800; }
        .rc-body { flex: 1; overflow-y: auto; background: #f8fafc; }

        /* Search & Alerts */
        .search-box { display: flex; gap: 8px; }
        .search-box input { padding: 8px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 12px; outline: none; width: 250px; }
        .search-box button { background: #0f172a; color: #fff; border: none; padding: 8px 16px; border-radius: 8px; font-size: 12px; font-weight: 700; cursor: pointer; }
        .alert { padding: 10px 14px; border-radius: 8px; margin-bottom: 16px; font-size: 12px; font-weight: 700; }
        .alert-success { background: #ecfdf5; color: #10b981; border: 1px solid #a7f3d0; }
    </style>
</head>
<body>

    @include('partials.sidebar-admin')

    <div class="main-content">
        <div class="topbar">
            <div style="font-weight: 800; font-size: 16px;">Manajemen Pengguna (Grup Role)</div>
            <div style="font-size: 12px; font-weight: 700; color: #64748b;">Administrator</div>
        </div>

        <div class="content-area">
            @if (session('success')) <div class="alert alert-success">✓ {{ session('success') }}</div> @endif

            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <div>
                    <h2 style="margin:0; font-size:18px; font-weight:800;">Daftar Akun Terdaftar</h2>
                    <div style="color:#64748b; font-size:12px;">Pemisahan berdasarkan hak akses sistem.</div>
                </div>
                <form action="{{ route('admin.users') }}" method="GET" class="search-box">
                    <input type="text" name="search" placeholder="Cari nama atau email..." value="{{ request('search') }}">
                    <button type="submit">Cari Data</button>
                </form>
            </div>

            <div class="roles-grid">
                <div class="role-card">
                    <div class="rc-header" style="background:#ecfdf5; color:#047857;">
                        <div class="rc-header-title">🎓 Siswa / Alumni</div>
                        <div class="rc-count">{{ $siswa->count() }} User</div>
                    </div>
                    <div class="rc-body">
                        @foreach($siswa as $user) @include('admin.components.user-row', ['user'=>$user, 'avClass'=>'av-siswa']) @endforeach
                    </div>
                </div>

                <div class="role-card">
                    <div class="rc-header" style="background:#fff7ed; color:#c2410c;">
                        <div class="rc-header-title">🏢 Perusahaan</div>
                        <div class="rc-count">{{ $perusahaan->count() }} User</div>
                    </div>
                    <div class="rc-body">
                        @foreach($perusahaan as $user) @include('admin.components.user-row', ['user'=>$user, 'avClass'=>'av-per']) @endforeach
                    </div>
                </div>

                <div class="role-card">
                    <div class="rc-header" style="background:#eff6ff; color:#1d4ed8;">
                        <div class="rc-header-title">📚 Lembaga LPK</div>
                        <div class="rc-count">{{ $lpk->count() }} User</div>
                    </div>
                    <div class="rc-body">
                        @foreach($lpk as $user) @include('admin.components.user-row', ['user'=>$user, 'avClass'=>'av-lpk']) @endforeach
                    </div>
                </div>

                <div class="role-card">
                    <div class="rc-header" style="background:#f8fafc; color:#334155;">
                        <div class="rc-header-title">🛡️ Administrator</div>
                        <div class="rc-count">{{ $admin->count() }} User</div>
                    </div>
                    <div class="rc-body">
                        @foreach($admin as $user) @include('admin.components.user-row', ['user'=>$user, 'avClass'=>'av-admin']) @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="editUserModal" style="display:none; position:fixed; z-index:1000; left:0; top:0; width:100%; height:100%; background:rgba(0,0,0,0.5); align-items:center; justify-content:center;">
        <div style="background:#fff; width:100%; max-width:400px; border-radius:16px; overflow:hidden;">
            <div style="padding:16px; border-bottom:1px solid #e2e8f0; font-weight:800; display:flex; justify-content:space-between;">
                <span>Edit Pengguna</span>
                <button onclick="closeModal()" style="background:none; border:none; cursor:pointer;">&times;</button>
            </div>
            <form id="editUserForm" method="POST" style="padding:20px;">
                @csrf
                @method('PUT')
                <div style="margin-bottom:12px;">
                    <label style="font-size:11px; font-weight:800; color:#64748b;">NAMA</label>
                    <input type="text" name="name" id="edit_name" style="width:100%; padding:8px; border:1px solid #cbd5e1; border-radius:6px; box-sizing:border-box;">
                </div>
                <div style="margin-bottom:12px;">
                    <label style="font-size:11px; font-weight:800; color:#64748b;">EMAIL</label>
                    <input type="email" name="email" id="edit_email" style="width:100%; padding:8px; border:1px solid #cbd5e1; border-radius:6px; box-sizing:border-box;">
                </div>
                <div style="margin-bottom:20px;">
                    <label style="font-size:11px; font-weight:800; color:#64748b;">ROLE</label>
                    <select name="role" id="edit_role" style="width:100%; padding:8px; border:1px solid #cbd5e1; border-radius:6px;">
                        <option value="SISWA">SISWA</option>
                        <option value="PERUSAHAAN">PERUSAHAAN</option>
                        <option value="LPK">LPK</option>
                        <option value="ADMIN">ADMIN</option>
                    </select>
                </div>
                <button type="submit" style="width:100%; padding:10px; background:#10b981; color:#fff; border:none; border-radius:8px; font-weight:800; cursor:pointer;">Simpan Perubahan</button>
            </form>
        </div>
    </div>

<script>
    function openEditModal(id, name, email, role) {
        const modal = document.getElementById('editUserModal');
        const form = document.getElementById('editUserForm');

        // Gunakan path absolut untuk menghindari error URL bertumpuk
        form.action = "/admin/users/" + id;

        document.getElementById('edit_name').value = name;
        document.getElementById('edit_email').value = email;
        document.getElementById('edit_role').value = role;

        modal.style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('editUserModal').style.display = 'none';
    }
</script>