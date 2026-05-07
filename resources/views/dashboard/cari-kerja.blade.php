@extends('dashboard.index')

@section('konten_tengah')
    <div style="font-family: 'Nunito', sans-serif;">
        <div
            style="background: #0f172a; border-radius: 16px; padding: 24px; display: flex; align-items: center; gap: 24px; position: relative; overflow: hidden; margin-bottom: 24px; color: #fff; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">

            <div
                style="position: absolute; right: -50px; top: -50px; width: 300px; height: 300px; background: radial-gradient(circle, rgba(16, 185, 129, 0.15) 0%, transparent 70%); border-radius: 50%; z-index: 0;">
            </div>

            <div style="font-size: 42px; line-height: 1; position: relative; z-index: 1;">
                🎯
            </div>

            <div style="flex: 1; position: relative; z-index: 1;">
                <h2 style="margin: 0 0 6px 0; font-weight: 800; font-size: 12px; color: #ffffff;">
                    Profil 78% lengkap — Tambahkan CV untuk skor lebih tinggi
                </h2>
                <p style="margin: 0; color: #94a3b8; font-weight: 700; font-size: 11px;">
                    Profil lengkap meningkatkan peluang dilihat pemberi kerja hingga 3×
                </p>
            </div>

            <div style="position: relative; z-index: 1;">
                <a href="{{ route('dashboard.profil') }}"
                    style="display: inline-block; background: #10b981; color: #fff; padding: 12px 24px; border-radius: 10px; font-weight: 700; text-decoration: none; font-size: 14px; white-space: nowrap; transition: background 0.3s ease;">
                    Lengkapi Profil →
                </a>
            </div>

        </div>

        <div
            style="background: #fff; border: 1px solid #e2e8f0; border-radius: 10px; padding: 12px; box-shadow: 0 1px 2px rgba(0,0,0,0.02);">
            <div style="display: flex; gap: 8px; margin-bottom: 12px; flex-wrap: wrap;">
                <select
                    style="flex: 1; min-width: 110px; padding: 6px 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 11px; color: #475569; outline: none; font-weight: 600;">
                    <option>Semua Sektor</option>
                    <option>Pertanian & Sawit</option>
                </select>
                <select
                    style="flex: 1; min-width: 110px; padding: 6px 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 11px; color: #475569; outline: none; font-weight: 600;">
                    <option>Semua Kecamatan</option>
                    <option>Muara Pawan</option>
                </select>
                <select
                    style="flex: 1; min-width: 110px; padding: 6px 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 11px; color: #475569; outline: none; font-weight: 600;">
                    <option>Semua Tipe</option>
                    <option>Magang</option>
                </select>
                <button
                    style="background: #0f172a; color: #fff; border: none; padding: 6px 14px; border-radius: 6px; font-size: 11px; cursor: pointer; display: flex; align-items: center; gap: 4px;">
                    🔍 Filter
                </button>
                <button
                    style="background: #f8fafc; color: #475569; border: 1px solid #e2e8f0; padding: 6px 12px; border-radius: 6px; font-size: 11px; cursor: pointer;">
                    Reset
                </button>
            </div>

            <div style="display: flex; gap: 6px; flex-wrap: wrap;">
                <span
                    style="background: #0f172a; color: #fff; padding: 4px 10px; border-radius: 12px; font-size: 10px; cursor: pointer;">Semua
                    (28)</span>
                <span
                    style="background: #f8fafc; color: #475569; border: 1px solid #e2e8f0; padding: 4px 10px; border-radius: 12px; font-size: 10px; cursor: pointer;"
                    class="hover-bg">🎓 Magang (12)</span>
                <span
                    style="background: #f8fafc; color: #475569; border: 1px solid #e2e8f0; padding: 4px 10px; border-radius: 12px; font-size: 10px; cursor: pointer;"
                    class="hover-bg">💼 Full-time (10)</span>
                <span
                    style="background: #fef3c7; color: #d97706; border: 1px solid #fde68a; padding: 4px 10px; border-radius: 12px; font-size: 10px; cursor: pointer;">⭐
                    Match >80</span>
            </div>
        </div>

        <div style="display: flex; align-items: center; margin-top: 5px; margin-bottom: 2px; border-bottom: 1px solid #e2e8f0; gap: 20px;">
            <div
                style="padding-bottom: 8px; border-bottom: 2px solid #0f172a; color: #0f172a; font-size: 12px; cursor: pointer;">
                Semua Lowongan</div>
            <div style="padding-bottom: 8px; color: #64748b; font-size: 12px; cursor: pointer;" class="hover-text">
                Rekomendasi AI</div>
            <div style="padding-bottom: 8px; color: #64748b; font-size: 12px; cursor: pointer;" class="hover-text">Sedang
                Dilamar</div>
        </div>

        <div style="padding-top:5px; display: flex; justify-content: space-between; align-items: center;">
            <div style="font-size: 12px; color: #0f172a;">Menampilkan 28 lowongan</div>
            <select
                style="margin-top:5px; margin-bottom: 5px;; padding: 4px 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 11px; color: #475569; outline: none;">
                <option>Paling Relevan</option>
                <option>Terbaru Ditambahkan</option>
            </select>
        </div>

        <div style="display: flex; flex-direction: column; gap: 12px;">

            <div
                style="background: #fff; border: 2px solid #3b82f6; border-radius: 10px; padding: 12px; box-shadow: 0 2px 6px rgba(59, 130, 246, 0.1);">

                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 8px;">
                    <div style="display: flex; gap: 10px; align-items: center;">
                        <div
                            style="width: 36px; height: 36px; background: #ecfdf5; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 18px;">
                            🌿</div>
                        <div>
                            <div style="font-size: 14px; color: #0f172a;">Operator Kebun & Pemantau Lingkungan</div>
                            <div style="font-size: 11px; color: #64748b; font-weight: 600;">Cargill Ketapang Mill · Muara
                                Pawan</div>
                        </div>
                    </div>
                    <div
                        style="background: #10b981; color: #fff; font-size: 8px; padding: 3px 6px; border-radius: 4px; letter-spacing: 0.5px;">
                        ⭐ UNGGULAN</div>
                </div>

                <div style="display: flex; gap: 4px; margin-bottom: 8px; flex-wrap: wrap;">
                    <span
                        style="background: #ecfdf5; color: #10b981; font-size: 9px; padding: 3px 8px; border-radius: 10px;">Magang
                        &rarr; Full-time</span>
                    <span
                        style="background: #fef3c7; color: #d97706; font-size: 9px; padding: 3px 8px; border-radius: 10px;">Sawit
                        & Agrikultur</span>
                    <span
                        style="background: #f8fafc; color: #64748b; font-size: 9px; padding: 3px 8px; border-radius: 10px; border: 1px solid #e2e8f0;">RSPO</span>
                </div>

                <div
                    style="display: flex; gap: 12px; font-size: 10px; color: #64748b; font-weight: 600; margin-bottom: 8px;">
                    <div style="display: flex; align-items: center; gap: 4px;"><span
                            style="color: #ef4444; font-size: 12px;">📍</span> Muara Pawan</div>
                    <div style="display: flex; align-items: center; gap: 4px;"><span
                            style="color: #94a3b8; font-size: 12px;">⏱</span> 3 bln magang + tetap</div>
                </div>

                <div
                    style="font-size: 11px; color: #475569; line-height: 1.4; margin-bottom: 12px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                    Bergabung sebagai operator kebun di Cargill Ketapang Mill. Program magang langsung dengan pelatihan K3
                    dan sertifikasi RSPO resmi untuk persiapan karir jangka panjang.
                </div>

                <div
                    style="display: flex; justify-content: space-between; align-items: center; padding-top: 10px; border-top: 1px solid #f1f5f9;">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <div
                            style="background: #ecfdf5; color: #10b981; font-size: 10px; padding: 3px 8px; border-radius: 10px;">
                            ✓ Match 96/100</div>
                        <div style="font-size: 10px; color: #ef4444;">⏰ Tutup 15 Mei</div>
                    </div>
                    <div style="display: flex; gap: 6px;">
                        <button
                            style="background: #f8fafc; border: 1px solid #e2e8f0; color: #64748b; padding: 4px 10px; border-radius: 6px; font-size: 11px; cursor: pointer; display: flex; align-items: center; gap: 4px;"
                            class="hover-bg">
                            📌 Simpan
                        </button>
                        <button
                            style="background: #eff6ff; border: 1px solid #bfdbfe; color: #3b82f6; padding: 4px 10px; border-radius: 6px; font-size: 11px; cursor: default;">
                            ✓ Terkirim!
                        </button>
                    </div>
                </div>
            </div>

            <div
                style="background: #fff; border: 1px solid #e2e8f0; border-radius: 10px; padding: 12px; box-shadow: 0 1px 2px rgba(0,0,0,0.02);">

                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 8px;">
                    <div style="display: flex; gap: 10px; align-items: center;">
                        <div
                            style="width: 36px; height: 36px; background: #fef2f2; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 18px;">
                            💊</div>
                        <div>
                            <div style="font-size: 14px; color: #0f172a;">Asisten Bidan & Kader Posyandu</div>
                            <div style="font-size: 11px; color: #64748b; font-weight: 600;">Puskesmas Muara Pawan</div>
                        </div>
                    </div>
                    <div style="background: #fef2f2; color: #ef4444; font-size: 8px; padding: 3px 6px; border-radius: 4px;">
                        BARU</div>
                </div>

                <div style="display: flex; gap: 4px; margin-bottom: 12px; flex-wrap: wrap;">
                    <span
                        style="background: #fef2f2; color: #ef4444; font-size: 9px; padding: 3px 8px; border-radius: 10px;">Full-time</span>
                    <span
                        style="background: #ecfdf5; color: #10b981; font-size: 9px; padding: 3px 8px; border-radius: 10px;">Kesehatan</span>
                </div>

                <div
                    style="display: flex; justify-content: space-between; align-items: center; padding-top: 10px; border-top: 1px solid #f1f5f9;">
                    <div
                        style="background: #ecfdf5; color: #10b981; font-size: 10px; padding: 3px 8px; border-radius: 10px;">
                        ✓ Match 91/100</div>
                    <div style="display: flex; gap: 6px;">
                        <button
                            style="background: #f8fafc; border: 1px solid #e2e8f0; color: #64748b; padding: 4px 10px; border-radius: 6px; font-size: 11px; cursor: pointer;"
                            class="hover-bg">
                            📌 Simpan
                        </button>
                        <button
                            style="background: #10b981; border: none; color: #fff; padding: 4px 12px; border-radius: 6px; font-size: 11px; cursor: pointer;"
                            class="hover-green">
                            Lamar Sekarang
                        </button>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <style>
        .hover-bg:hover {
            background: #e2e8f0 !important;
            color: #0f172a !important;
        }

        .hover-text:hover {
            color: #0f172a !important;
        }

        .hover-green:hover {
            background: #059669 !important;
            box-shadow: 0 2px 6px rgba(16, 185, 129, 0.3);
        }
    </style>
@endsection
