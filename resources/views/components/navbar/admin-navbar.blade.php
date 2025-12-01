<header>
    <div class="logo">
        <img src="{{ asset('css/asset/logo.jpg') }}">
        MediRent
    </div>

    <nav>
        <a href="{{ route('dashboard.admin') }}">Beranda</a>
        <a href="{{ route('admin.users.index') }}">Kelola Pengguna</a>
        <a href="{{ route('admin.data-alat.index') }}">Kelola Alat</a>
        <a href="{{ route('admin.booking.index') }}">Kelola Booking</a>
        <a href="{{ route('admin.transaksi.index') }}">Kelola Transaksi</a>
        <a href="{{ route('admin.profil.index') }}">Profil</a>
    </nav>
</header>
