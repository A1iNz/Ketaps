@extends('dashboard.index')

@section('konten_tengah')
    <div style="font-family: 'Nunito', sans-serif;">
        <h1
            style="font-size: 20px; font-weight: 900; color: #0f172a; margin-bottom: 16px; font-family: Georgia, serif; display: flex; align-items: center; gap: 8px;">
            📋 Status Lamaranku
        </h1>

        <div
            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(130px, 1fr)); gap: 12px; margin-bottom: 24px;">
            <div
                style="background: #fff; border: 1px solid #e2e8f0; border-top: 3px solid #0f172a; padding: 16px; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
                <div style="font-size: 28px; font-weight: 900; color: #0f172a; line-height: 1; font-family: Georgia, serif;">
                    3</div>
                <div style="font-size: 12px; font-weight: 600; color: #64748b; margin-top: 6px;">Total Lamaran</div>
            </div>

            <div
                style="background: #fff; border: 1px solid #e2e8f0; border-top: 3px solid #10b981; padding: 16px; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
                <div style="font-size: 28px; font-weight: 900; color: #10b981; line-height: 1; font-family: Georgia, serif;">
                    1</div>
                <div style="font-size: 12px; font-weight: 600; color: #64748b; margin-top: 6px;">Interview</div>
            </div>

            <div
                style="background: #fff; border: 1px solid #e2e8f0; border-top: 3px solid #f59e0b; padding: 16px; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
                <div
                    style="font-size: 28px; font-weight: 900; color: #f59e0b; line-height: 1; font-family: Georgia, serif;">
                    2</div>
                <div style="font-size: 12px; font-weight: 600; color: #64748b; margin-top: 6px;">Diproses</div>
            </div>

            <div
                style="background: #fff; border: 1px solid #e2e8f0; border-top: 3px solid #cbd5e1; padding: 16px; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
                <div
                    style="font-size: 28px; font-weight: 900; color: #94a3b8; line-height: 1; font-family: Georgia, serif;">
                    0</div>
                <div style="font-size: 12px; font-weight: 600; color: #64748b; margin-top: 6px;">Ditolak</div>
            </div>
        </div>

        <div style="display: flex; flex-direction: column; gap: 16px;">

            <div
                style="background: #fff; border: 2px solid #10b981; border-radius: 12px; padding: 16px; box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.1);">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px;">
                    <div style="display: flex; gap: 12px; align-items: center;">
                        <div
                            style="width: 42px; height: 42px; background: #ecfdf5; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 20px;">
                            🌿</div>
                        <div>
                            <div style="font-size: 15px; font-weight: 800; color: #0f172a;">Operator Kebun & Pemantau
                                Lingkungan</div>
                            <div style="font-size: 12px; font-weight: 600; color: #64748b; margin-top: 2px;">Cargill
                                Ketapang Mill</div>
                        </div>
                    </div>
                    <div
                        style="background: #ecfdf5; color: #10b981; font-size: 10px; font-weight: 800; padding: 6px 10px; border-radius: 6px; letter-spacing: 0.5px; text-transform: uppercase;">
                        ✓ DIPANGGIL INTERVIEW
                    </div>
                </div>

                <div
                    style="background: #ecfdf5; border-radius: 8px; padding: 12px; margin-bottom: 16px; color: #059669; font-size: 12px; font-weight: 500; line-height: 1.5;">
                    🎉 <strong style="font-weight: 800;">Interview dijadwalkan!</strong> Senin, 12 Mei 2026 · 09.00 WIB ·
                    Kantor Cargill. Bawa KTP & ijazah.
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div
                        style="background: #ecfdf5; color: #10b981; font-size: 12px; font-weight: 800; padding: 6px 12px; border-radius: 20px;">
                        Match 96/100
                    </div>
                    <div style="display: flex; gap: 8px;">
                        <button
                            style="background: transparent; border: 1px solid #cbd5e1; color: #0f172a; padding: 8px 14px; border-radius: 8px; font-size: 12px; font-weight: 700; cursor: pointer; transition: 0.3s;">Jadwal
                            Ulang</button>
                        <button
                            style="background: #10b981; border: none; color: #fff; padding: 8px 14px; border-radius: 8px; font-size: 12px; font-weight: 700; cursor: pointer; transition: 0.3s;">✓
                            Konfirmasi Hadir</button>
                    </div>
                </div>
            </div>

            <div
                style="background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 16px; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px;">
                    <div style="display: flex; gap: 12px; align-items: center;">
                        <div
                            style="width: 42px; height: 42px; background: #f8fafc; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 20px;">
                            💻</div>
                        <div>
                            <div style="font-size: 15px; font-weight: 800; color: #0f172a;">Operator SIPADES & Admin Desa
                            </div>
                            <div style="font-size: 12px; font-weight: 600; color: #64748b; margin-top: 2px;">BUMDes
                                Sejahtera · Delta Pawan</div>
                        </div>
                    </div>
                    <div
                        style="background: #fef3c7; color: #d97706; font-size: 10px; font-weight: 800; padding: 6px 10px; border-radius: 6px; letter-spacing: 0.5px; text-transform: uppercase;">
                        ⏳ DIPROSES
                    </div>
                </div>

                <div style="color: #64748b; font-size: 12px; margin-bottom: 16px;">
                    Lamaran sedang ditinjau oleh tim BUMDes. Estimasi respon 5–7 hari kerja.
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div
                        style="background: #eff6ff; color: #3b82f6; font-size: 12px; font-weight: 800; padding: 6px 12px; border-radius: 20px;">
                        Match 82/100
                    </div>
                    <button
                        style="background: transparent; border: 1px solid #cbd5e1; color: #0f172a; padding: 8px 14px; border-radius: 8px; font-size: 12px; font-weight: 700; cursor: pointer; transition: 0.3s;">Detail
                        Status</button>
                </div>
            </div>

            <div
                style="background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 16px; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px;">
                    <div style="display: flex; gap: 12px; align-items: center;">
                        <div
                            style="width: 42px; height: 42px; background: #fef2f2; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 20px;">
                            💊</div>
                        <div>
                            <div style="font-size: 15px; font-weight: 800; color: #0f172a;">Asisten Bidan & Kader Posyandu
                            </div>
                            <div style="font-size: 12px; font-weight: 600; color: #64748b; margin-top: 2px;">Puskesmas Muara
                                Pawan</div>
                        </div>
                    </div>
                    <div
                        style="background: #fef3c7; color: #d97706; font-size: 10px; font-weight: 800; padding: 6px 10px; border-radius: 6px; letter-spacing: 0.5px; text-transform: uppercase;">
                        ⏳ DIPROSES
                    </div>
                </div>

                <div style="color: #64748b; font-size: 12px; margin-bottom: 16px;">
                    Menunggu seleksi berkas dari Puskesmas.
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div
                        style="background: #ecfdf5; color: #10b981; font-size: 12px; font-weight: 800; padding: 6px 12px; border-radius: 20px;">
                        Match 91/100
                    </div>
                    <button
                        style="background: transparent; border: 1px solid #cbd5e1; color: #0f172a; padding: 8px 14px; border-radius: 8px; font-size: 12px; font-weight: 700; cursor: pointer; transition: 0.3s;">Detail</button>
                </div>
            </div>

        </div>
    </div>
@endsection
