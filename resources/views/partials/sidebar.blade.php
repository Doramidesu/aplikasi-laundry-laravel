<div class="sidebar p-3">

    <h4 class="fw-bold mb-4 text-primary">
        🧺 PrimeLaundry
    </h4>

    <div class="d-flex align-items-center mb-4">
        <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
             class="rounded-circle me-2"
             width="42">
        <div>
            <div class="fw-semibold">{{ auth()->user()->name }}</div>
            <small class="text-success">● Online</small>
        </div>
    </div>

    <ul class="nav flex-column gap-1">
        <li class="nav-item">
            <a href="/dashboard"
               class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                📊 Dashboard
            </a>
        </li>

        <li class="nav-item">
            <a href="/kasir"
               class="nav-link {{ request()->is('kasir') ? 'active' : '' }}">
                ➕ Transaksi Baru
            </a>
        </li>

        <li class="nav-item">
            <a href="/kasir/transaksi"
               class="nav-link {{ request()->is('kasir/transaksi*') ? 'active' : '' }}">
                📋 Daftar Transaksi
            </a>
        </li>
    </ul>

    <hr class="my-4">

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-outline-danger w-100">
            🚪 Logout
        </button>
    </form>

</div>
