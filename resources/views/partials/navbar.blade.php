<div class="sidebar bg-white border-end vh-100 p-3" style="width:260px">
    
    {{-- Profil Kasir --}}
    <div class="d-flex align-items-center mb-4">
        <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
             class="rounded-circle me-2"
             width="40">
        <div>
            <strong>{{ auth()->user()->name }}</strong><br>
            <span class="text-success small">● Online</span>
        </div>
    </div>

    <hr>

    {{-- Menu --}}
    <ul class="nav flex-column gap-2">
        <li class="nav-item">
            <a href="/dashboard" class="nav-link">
                📊 Dashboard
            </a>
        </li>

        <li class="nav-item">
            <a href="/kasir" class="nav-link">
                ➕ Transaksi Baru
            </a>
        </li>

        <li class="nav-item">
            <a href="/kasir/transaksi" class="nav-link">
                📋 Daftar Transaksi
            </a>
        </li>
    </ul>

    <hr>

    {{-- Logout --}}
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-outline-danger w-100">
            🚪 Logout
        </button>
    </form>
</div>
