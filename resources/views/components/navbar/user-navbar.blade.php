<nav class="navbar navbar-expand-lg bg-white shadow-sm" style="position: relative; z-index: 9999;">
    <div class="container-fluid">
        <div class="logo-section d-flex align-items-center">
            <img src="{{ asset('css/asset/logo.jpg') }}" class="logo me-2" style="width: 40px; height: 40px;" />
            <span class="logo-text fw-bold fs-5 text-primary">MediRent</span>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('user/dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard.user') }}">Beranda</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('user/tentang') ? 'active' : '' }}"
                        href="{{ route('user.tentang.index') }}">Tentang</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('user/daftar-alat*') ? 'active' : '' }}"
                        href="{{ route('user.daftar-alat.index') }}">Daftar Alat</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('user/transaksi*') ? 'active' : '' }}"
                        href="{{ route('user.transaksi.index') }}">Transaksi</a>
                </li>

                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" style="font-weight: 600;">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
