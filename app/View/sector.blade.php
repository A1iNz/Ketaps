<div class="sidebar">
    @include('partials.sidebar-admin')
</div>

<div class="main-content" style="margin-left: 260px; padding: 32px;">
    <h2 style="font-weight: 800;">Manajemen Sektor Industri</h2>
    
    <div style="background:#fff; padding:20px; border-radius:16px; margin-bottom:24px; border:1px solid #e2e8f0;">
        <form action="{{ route('admin.sectors.store') }}" method="POST" style="display:flex; gap:10px;">
            @csrf
            <input type="text" name="nama_sektor" placeholder="Nama Sektor Baru (ex: Perbankan)" style="flex:1; padding:10px; border-radius:8px; border:1px solid #cbd5e1;" required>
            <button type="submit" style="background:#10b981; color:#fff; border:none; padding:10px 20px; border-radius:8px; font-weight:700; cursor:pointer;">+ Tambah Sektor</button>
        </form>
    </div>

    <div style="background:#fff; border-radius:16px; border:1px solid #e2e8f0; overflow:hidden;">
        <table style="width:100%; border-collapse:collapse;">
            <thead style="background:#f8fafc;">
                <tr>
                    <th style="padding:15px; text-align:left;">Nama Sektor</th>
                    <th style="padding:15px; text-align:right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sectors as $s)
                <tr style="border-bottom:1px solid #f1f5f9;">
                    <td style="padding:15px; font-weight:600;">{{ $s->nama_sektor }}</td>
                    <td style="padding:15px; text-align:right;">
                        <form action="{{ route('admin.sectors.destroy', $s->id) }}" method="POST" onsubmit="return confirm('Hapus sektor ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" style="color:#ef4444; background:none; border:none; cursor:pointer; font-weight:700;">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>