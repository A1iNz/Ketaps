<div class="sidebar">
    @include('partials.sidebar-admin')
</div>
<div class="main-content" style="margin-left: 260px; padding: 32px;">
    <h2 style="font-weight: 800;">Persetujuan Akun Perusahaan</h2>
    <div style="background:#fff; border-radius:16px; border:1px solid #e2e8f0; overflow:hidden;">
        <table>
            <thead style="background:#f8fafc;">
                <tr>
                    <th style="padding:15px;">Nama Perusahaan</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pendingCompanies as $comp)
                    <tr>
                        <td style="padding:15px;">{{ $comp->name }}</td>
                        <td>{{ $comp->email }}</td>
                        <td>
                            <form action="{{ route('admin.approve', $comp->id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    style="background:#10b981; color:#fff; border:none; padding:8px 16px; border-radius:8px; cursor:pointer; font-weight:700;">Setujui
                                    Akun</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
