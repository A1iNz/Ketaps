@extends('layouts.app')

@section('isi')
<div class="app-wrapper">
    @include('partials.navbar')

    <div class="app-body" style="display: flex; gap: 20px; padding: 20px; max-width: 1300px; margin: 0 auto; width: 100%; box-sizing: border-box;">
        @include('partials.sidebar')
        <div class="main-col" style="flex: 1; min-height: 500px;">
            @yield('konten_tengah')
        </div>

        <div class="right-panel" style="width: 300px; flex-shrink: 0;">
            @include('partials.right_panel')
        </div>
    </div>
</div>

@include('dashboard.modal_edit')
@endsection