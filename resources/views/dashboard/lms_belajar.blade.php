@extends('dashboard.index')

@section('konten_tengah')
    <div
        style="background: linear-gradient(135deg, #1e1b4b, #2e1065); border-radius: 16px; padding: 24px; color: #fff; margin-bottom: 20px; position: relative; overflow: hidden; font-family: 'Nunito', sans-serif; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">

        <div
            style="position: absolute; inset: 0; background-image: linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px); background-size: 20px 20px; z-index: 0;">
        </div>

        <div style="position: relative; z-index: 1;">
            <div
                style="display: inline-flex; align-items: center; gap: 6px; background: rgba(255,255,255,0.1); padding: 4px 12px; border-radius: 20px; font-size: 10px; font-weight: 800; letter-spacing: 1px; text-transform: uppercase; color: #c4b5fd; margin-bottom: 12px;">
                <span style="font-size: 12px;">📚</span> LMS BELAJAR KETAPANG
            </div>

            <h1 style="font-size: 26px; font-weight: 800; margin: 0 0 6px 0; color: #fff; letter-spacing: -0.5px;">
                Belajar Lebih Seru, <span style="font-style: italic; color: #34d399; font-family: Georgia, serif;">Raih Masa
                    Depan</span>
            </h1>
            <p style="color: #94a3b8; font-size: 13px; margin: 0 0 20px 0; font-weight: 500;">
                Kurikulum Merdeka 2024 · SD Kelas 1-6 · SMP 7-9 · SMA 10-12 · SMK Kejuruan · Gratis
            </p>

            <div
                style="background: rgba(255,255,255,0.06); border-radius: 12px; padding: 16px 20px; display: flex; align-items: center; gap: 20px; margin-bottom: 20px;">

                <div style="min-width: 80px;">
                    <div style="font-size: 24px; font-weight: 900; color: #fbbf24; line-height: 1;">
                        {{ number_format(auth()->user()->xp ?? 1240, 0, ',', '.') }}
                    </div>
                    <div
                        style="font-size: 11px; color: #94a3b8; font-weight: 600; margin-top: 4px; text-transform: uppercase;">
                        XP Terkumpul</div>
                </div>

                <div style="flex: 1;">
                    <div
                        style="display: flex; justify-content: space-between; font-size: 12px; color: #cbd5e1; font-weight: 600; margin-bottom: 8px;">
                        <span>Level 8 &rarr; Level 9 (82%)</span>
                    </div>
                    <div
                        style="width: 100%; height: 6px; background: rgba(255,255,255,0.1); border-radius: 10px; overflow: hidden;">
                        <div
                            style="width: 82%; height: 100%; background: linear-gradient(90deg, #34d399, #a855f7); border-radius: 10px;">
                        </div>
                    </div>
                </div>

                <div style="min-width: 80px; text-align: right;">
                    <div style="font-size: 24px; font-weight: 800; color: #fff; line-height: 1;">14</div>
                    <div
                        style="font-size: 11px; color: #94a3b8; font-weight: 600; margin-top: 4px; text-transform: uppercase;">
                        Materi Selesai</div>
                </div>
            </div>

            <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                <button
                    style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #cbd5e1; padding: 8px 16px; border-radius: 8px; font-weight: 700; font-size: 12px; cursor: pointer; display: flex; align-items: center; gap: 6px; transition: 0.3s;">
                    🌱 SD (Kls 1-6)
                </button>
                <button
                    style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #cbd5e1; padding: 8px 16px; border-radius: 8px; font-weight: 700; font-size: 12px; cursor: pointer; display: flex; align-items: center; gap: 6px; transition: 0.3s;">
                    📖 SMP (Kls 7-9)
                </button>
                <button
                    style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #cbd5e1; padding: 8px 16px; border-radius: 8px; font-weight: 700; font-size: 12px; cursor: pointer; display: flex; align-items: center; gap: 6px; transition: 0.3s;">
                    🔬 SMA (Kls 10-12)
                </button>

                <button
                    style="background: rgba(16, 185, 129, 0.1); border: 1px solid #10b981; color: #10b981; padding: 8px 16px; border-radius: 8px; font-weight: 800; font-size: 12px; cursor: pointer; display: flex; align-items: center; gap: 6px;">
                    ⚙️ SMK Kejuruan
                </button>
            </div>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 24px; padding: 20px;">
        @forelse($materis as $materi)
            <div style="background: #fff; border-radius: 20px; border: 1px solid #e2e8f0; overflow: hidden; transition: 0.3s; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02);"
                class="hover-card">
                <div
                    style="height: 140px; background: {{ $materi->kategori == 'Kesiapan Kerja' ? '#eff6ff' : '#ecfdf5' }}; display: flex; align-items: center; justify-content: center; font-size: 50px;">
                    {{ $materi->kategori == 'Kesiapan Kerja' ? '💼' : '🚀' }}
                </div>

                <div style="padding: 24px;">
                    <div style="display: flex; gap: 8px; margin-bottom: 12px;">
                        <span
                            style="font-size: 10px; font-weight: 800; color: #3b82f6; text-transform: uppercase; background: #eff6ff; padding: 4px 8px; border-radius: 6px;">{{ $materi->kategori }}</span>
                        <span
                            style="font-size: 10px; font-weight: 800; color: #64748b; text-transform: uppercase; background: #f1f5f9; padding: 4px 8px; border-radius: 6px;">PDF</span>
                    </div>

                    <h3 style="font-size: 16px; font-weight: 800; color: #0f172a; margin: 0 0 8px 0; line-height: 1.4;">
                        {{ $materi->judul }}</h3>
                    <p style="font-size: 13px; color: #64748b; line-height: 1.5; margin-bottom: 24px;">
                        {{ Str::limit($materi->deskripsi, 80) }}</p>

                    <a href="{{ asset('storage/' . $materi->file_pdf) }}" target="_blank"
                        style="display: block; text-align: center; background: #0f172a; color: #fff; padding: 12px; border-radius: 12px; text-decoration: none; font-weight: 700; font-size: 14px;">
                        Baca Modul
                    </a>
                </div>
            </div>
        @empty
            <p>Belum ada modul tersedia.</p>
        @endforelse
    </div>
@endsection
