@extends('dashboard.index')

@section('konten_tengah')
<div style="font-family: 'Nunito', sans-serif;">
    <h1 style="font-size: 20px; font-weight: 900; color: #0f172a; margin-bottom: 16px; font-family: Georgia, serif; display: flex; align-items: center; gap: 8px;">
        👤 Profil Saya
    </h1>

    <div style="background: #0b1120; border-radius: 16px; padding: 24px; display: flex; justify-content: space-between; align-items: center; color: #fff; margin-bottom: 20px; position: relative; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
        
        <div style="position: absolute; right: 5%; top: -60px; width: 180px; height: 180px; background: radial-gradient(circle, rgba(16, 185, 129, 0.1) 0%, transparent 70%); border-radius: 50%; z-index: 0;"></div>

        <div style="display: flex; gap: 20px; align-items: center; position: relative; z-index: 1;">
            <div style="width: 64px; height: 64px; background: linear-gradient(135deg, #10b981, #3b82f6); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px; font-weight: 900; font-family: Georgia, serif; border: 3px solid rgba(255,255,255,0.1); flex-shrink: 0;">
                {{ strtoupper(substr(auth()->user()->name ?? 'AR', 0, 2)) }}
            </div>

            <div>
                <h2 style="font-size: 22px; font-weight: 900; margin: 0 0 4px 0; font-family: Georgia, serif; letter-spacing: -0.5px;">
                    {{ auth()->user()->name ?? 'Aldi Ramadan' }}
                </h2>
                <p style="font-size: 12px; color: #94a3b8; margin: 0 0 10px 0; font-weight: 500;">
                    {{ auth()->user()->jurusan ?? 'SMK ATP' }} · Kelas XII · {{ auth()->user()->sekolah ?? 'SMKN 1 Ketapang' }}
                </p>
                
                <div style="display: flex; gap: 6px; margin-bottom: 12px;">
                    <span style="background: #064e3b; color: #34d399; font-size: 10px; font-weight: 800; padding: 3px 10px; border-radius: 20px;">Agribisnis ATP</span>
                    <span style="background: #451a03; color: #fbbf24; font-size: 10px; font-weight: 800; padding: 3px 10px; border-radius: 20px;">RSPO</span>
                </div>

                <div style="display: flex; gap: 10px;">
                    <button style="background: #10b981; color: #fff; border: none; padding: 6px 14px; border-radius: 6px; font-weight: 700; font-size: 12px; cursor: pointer; transition: 0.3s;">
                        ⬇ Unduh CV
                    </button>
                    <button style="background: rgba(255,255,255,0.05); color: #cbd5e1; border: 1px solid rgba(255,255,255,0.1); padding: 6px 14px; border-radius: 6px; font-weight: 700; font-size: 12px; cursor: pointer; transition: 0.3s;">
                        🔗 Bagikan
                    </button>
                </div>
            </div>
        </div>

        <div style="text-align: center; position: relative; z-index: 1;">
            <div style="font-size: 48px; font-weight: 900; color: #10b981; line-height: 1; font-family: Georgia, serif; font-style: italic;">
                {{ auth()->user()->match_score ?? 88 }}
            </div>
            <p style="font-size: 10px; color: #64748b; font-weight: 700; margin-top: 2px; text-transform: uppercase;">
                Match Score
            </p>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 16px;">

        <div style="background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 16px;">
            <div style="font-size: 11px; font-weight: 800; color: #64748b; text-transform: uppercase; margin-bottom: 10px;">
                KELENGKAPAN PROFIL (78%)
            </div>
            
            <div style="width: 100%; height: 6px; background: #e2e8f0; border-radius: 10px; overflow: hidden; margin-bottom: 16px;">
                <div style="width: 78%; height: 100%; background: #10b981;"></div>
            </div>

            <div style="display: flex; flex-direction: column; gap: 8px; margin-bottom: 16px;">
                <div style="display: flex; align-items: center; gap: 8px; color: #475569; font-size: 12px; font-weight: 600;">
                    <div style="width: 14px; height: 14px; background: #10b981; border-radius: 3px; display: flex; align-items: center; justify-content: center;"><svg width="8" height="8" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                    Foto profil
                </div>
                <div style="display: flex; align-items: center; gap: 8px; color: #475569; font-size: 12px; font-weight: 600;">
                    <div style="width: 14px; height: 14px; background: #10b981; border-radius: 3px; display: flex; align-items: center; justify-content: center;"><svg width="8" height="8" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                    Data diri lengkap
                </div>
                <div style="display: flex; align-items: center; gap: 8px; color: #64748b; font-size: 12px; font-weight: 600; opacity: 0.6;">
                    <div style="width: 14px; height: 14px; background: #ddd6fe; border-radius: 3px;"></div>
                    Upload CV <span style="color: #f59e0b; font-weight: 800;">+20 pts</span>
                </div>
            </div>

            <button style="width: 100%; background: #0f172a; color: #fff; padding: 10px; border: none; border-radius: 8px; font-size: 12px; font-weight: 700; cursor: pointer;">
                Upload CV →
            </button>
        </div>

        <div style="background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 16px;">
            <div style="font-size: 11px; font-weight: 800; color: #64748b; text-transform: uppercase; margin-bottom: 16px;">
                DETAIL MATCH SCORE
            </div>

            <div style="display: flex; flex-direction: column; gap: 12px;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div style="width: 110px; font-size: 11px; color: #64748b; font-weight: 700;">Jurusan</div>
                    <div style="flex: 1; height: 5px; background: #f1f5f9; border-radius: 4px; overflow: hidden; margin: 0 12px;">
                        <div style="width: 96%; height: 100%; background: #10b981;"></div>
                    </div>
                    <div style="width: 24px; text-align: right; font-size: 12px; font-weight: 800; color: #10b981;">96</div>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div style="width: 110px; font-size: 11px; color: #64748b; font-weight: 700;">Pengalaman</div>
                    <div style="flex: 1; height: 5px; background: #f1f5f9; border-radius: 4px; overflow: hidden; margin: 0 12px;">
                        <div style="width: 80%; height: 100%; background: #10b981;"></div>
                    </div>
                    <div style="width: 24px; text-align: right; font-size: 12px; font-weight: 800; color: #10b981;">80</div>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div style="width: 110px; font-size: 11px; color: #64748b; font-weight: 700;">Sertifikasi</div>
                    <div style="flex: 1; height: 5px; background: #f1f5f9; border-radius: 4px; overflow: hidden; margin: 0 12px;">
                        <div style="width: 70%; height: 100%; background: #f59e0b;"></div>
                    </div>
                    <div style="width: 24px; text-align: right; font-size: 12px; font-weight: 800; color: #f59e0b;">70</div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
