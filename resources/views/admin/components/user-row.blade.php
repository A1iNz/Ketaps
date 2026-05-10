<div class="user-row" style="display: flex; justify-content: space-between; align-items: center; padding: 12px 16px; border-bottom: 1px solid #f1f5f9; background: #fff;">
    
    <div class="user-info" style="display: flex; align-items: center; gap: 12px;">
        @php
            $words = explode(' ', trim($user->name));
            $initials = strtoupper(substr($words[0], 0, 1) . (isset($words[1]) ? substr($words[1], 0, 1) : ''));
        @endphp
        
        <div class="avatar {{ $avClass }}" style="width: 38px; height: 38px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 800; flex-shrink: 0;">
            {{ $initials }}
        </div>

        <div style="display: flex; flex-direction: column; gap: 2px;">
            <div class="u-name" style="font-weight: 700; font-size: 13px; color: #1e293b; line-height: 1.2;">
                {{ $user->name }}
            </div>
            <div class="u-email" style="font-size: 11px; color: #64748b; font-weight: 500;">
                {{ $user->email }} <span style="margin: 0 4px; opacity: 0.5;">•</span> {{ $user->created_at->format('d/m/y') }}
            </div>
        </div>
    </div>

    @if ($user->role !== 'ADMIN')
        <div style="display: flex; gap: 8px; align-items: center;">
            
            <button type="button"
                onclick="openEditModal('{{ $user->id }}', '{{ $user->name }}', '{{ $user->email }}', '{{ $user->role }}')"
                class="del-btn" title="Edit Data" 
                style="color: #3b82f6; border: 1px solid #bfdbfe; background: #eff6ff; width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: 0.2s;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                </svg>
            </button>
            
            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Hapus pengguna ini?')" style="margin: 0;">
                @csrf
                @method('DELETE')
                <button type="submit" class="del-btn" title="Hapus Pengguna" 
                    style="color: #ef4444; border: 1px solid #fecaca; background: #fef2f2; width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: 0.2s;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 6h18"></path>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    </svg>
                </button>
            </form>
        </div>
    @else
        <div style="color: #94a3b8; padding-right: 10px;" title="Akun Dilindungi">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
            </svg>
        </div>
    @endif
</div>