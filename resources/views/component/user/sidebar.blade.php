<ul class="menu">
    <li class="sidebar-title">Menu</li>

    <li class="sidebar-item {{ request()->is('user/dashboard*') ? 'active' : ' ' }} ">
        <a href={{ route('user.dashboard') }} class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Peminjaman Buku</span>
        </a>
        <ul class="submenu ">
            <li class="submenu-item ">
                <a href="{{ route('user.peminjaman.form') }}">Formulir Peminjaman Buku</a>
            </li>
            <li class="submenu-item">
                <a href="{{ route('user.peminjaman.riwayat') }}">Riwayat Peminjaman Buku</a>
            </li>
        </ul>
    </li>

    <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-collection-fill"></i>
            <span>Pengembalian Buku</span>
        </a>
        <ul class="submenu ">
            <li class="submenu-item">
                <a href="{{ route('user.pengembalian.form') }}">Formulir Pengembalian Buku</a>
            </li>
            <li class="submenu-item">
                <a href="{{ route('user.pengembalian.riwayat') }}">Riwayat Pengembalian Buku</a>
            </li>
        </ul>
    </li>

    {{-- <li class="sidebar-item  ">
        <a href="{{ route('user.pesan') }}" class='sidebar-link'>
            <i class="bi bi-file-earmark-medical-fill"></i>
            <span>Pesan</span>
        </a>
    </li> --}}

    <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-collection-fill"></i>
            <span>Pesan</span>
        </a>
        <ul class="submenu ">
            <li class="submenu-item">
                <a href="{{ route('user.pesan.masuk') }}">Pesan masuk
                    <span class="badge bg-light-danger badge-pill badge-round float-right mt-50">
                        {{ count($pesan) }}

               </span>
                </a>
            </li>
            <li class="submenu-item">
                <a href="{{ route('user.pesan.terkirim') }}">Pesan terkirim</a>
            </li>
        </ul>
    </li>

    <li class="sidebar-item">
        <a href="{{ route('user.profile') }}" class='sidebar-link'>
            <i class="bi bi-file-earmark-medical-fill"></i>
            <span>Profile Saya </span>
        </a>
    </li>

    <li class="sidebar-item {{ request()->is('logout*') ? 'active' : '' }} ">
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
document.getElementById('logout-form').submit();" class="sidebar-link">
            <i class="bi bi-arrow-left-square-fill"></i>
            <span>Logout</span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
</ul>
