<aside class="bg-gray-700 min-h-full w-[15rem] sidebar transition-all duration-300 fixed">
    <ul id="metismenu" class="space-y-2 pt-2 side">
        <span class="uppercase text-xs text-gray-400 px-4 py-2 flex side-head">navigation</span>
        <li class="relative group side-item {{ request()->routeIs('dashboard') ? 'mm-active' : '' }}">
            <a href="{{ route('dashboard') }}"
                class="text-white {{ request()->routeIs('dashboard') ? 'bg-gray-800' : '' }} group-hover:bg-gray-800 px-4 flex items-center space-x-4 py-2 side-item-link">
                <i class="fa-solid fa-gauge text-xl side-icon"></i>
                <span class="side-item-text text-sm">Dashboard</span>
            </a>
        </li>
        <li class="relative group side-item {{ request()->routeIs('transaksi-siswa') ? 'mm-active' : '' }}">
            <a href="{{ route('transaksi-siswa') }}"
                class="text-white group-hover:bg-gray-800 {{ request()->routeIs('transaksi-siswa') ? 'bg-gray-800' : '' }} px-4 flex items-center space-x-4 py-2 side-item-link">
                <i class="fa-solid fa-money-bill-transfer side-icon"></i>
                <span class="side-item-text text-sm">Transaksi Siswa</span>
            </a>
        </li>
        <li
            class="relative group side-item {{ request()->routeIs('nama-pembayaran') || request()->routeIs('jenis-pembayaran') ? 'mm-active' : '' }}">
            <a href="#"
                aria-expanded="{{ request()->routeIs('nama-pembayaran') || request()->routeIs('jenis-pembayaran') }}"
                class="has-arrow group-hover:bg-gray-800 {{ request()->routeIs('nama-pembayaran') || request()->routeIs('jenis-pembayaran') ? 'bg-gray-800' : '' }} text-white px-4 flex items-center space-x-4 py-2 side-item-link">
                <i class="fa-solid fa-gear side-icon"></i>
                <span class="side-item-text text-sm">Pengaturan Pembayaran</span>
            </a>
            <ul class="side-child">
                <li class="hover:bg-gray-800 {{ request()->routeIs('nama-pembayaran') ? 'bg-gray-800' : '' }}">
                    <a href="{{ route('nama-pembayaran') }}"
                        class="text-white pl-8 flex items-center space-x-4 py-2 side-child-item">
                        <i class='bx bxs-right-arrow-alt text-xl'></i>
                        <span class="text-sm">Nama Pembayaran</span>
                    </a>
                </li>
                <li class="hover:bg-gray-800 {{ request()->routeIs('jenis-pembayaran') ? 'bg-gray-800' : '' }}">
                    <a href="{{ route('jenis-pembayaran') }}"
                        class="text-white pl-8 flex items-center space-x-4 py-2 side-child-item">
                        <i class='bx bxs-right-arrow-alt text-xl'></i>
                        <span class="text-sm">Jenis Pembayaran</span>
                    </a>
                </li>
            </ul>
        </li>
        <li
            class="relative group side-item {{ request()->routeIs('profile-sekolah') || request()->routeIs('bulan') || request()->routeIs('tahun-pelajaran') || request()->routeIs('kelas') || request()->routeIs('jurusan') || request()->routeIs('peserta-didik') ? 'mm-active' : '' }}">
            <a href="#"
                aria-expanded="{{ request()->routeIs('profile-sekolah') || request()->routeIs('bulan') || request()->routeIs('tahun-pelajaran') || request()->routeIs('kelas') || request()->routeIs('jurusan') || request()->routeIs('peserta-didik') }}"
                class="has-arrow group-hover:bg-gray-800 {{ request()->routeIs('profile-sekolah') || request()->routeIs('bulan') || request()->routeIs('tahun-pelajaran') || request()->routeIs('kelas') || request()->routeIs('jurusan') || request()->routeIs('peserta-didik') ? 'bg-gray-800' : '' }} text-white px-4 flex items-center space-x-4 py-2 side-item-link">
                <i class="fa-solid fa-wrench side-icon"></i>
                <span class="side-item-text text-sm">Pengaturan Umum</span>
            </a>
            <ul class="side-child">
                <li class="hover:bg-gray-800 {{ request()->routeIs('profile-sekolah') ? 'bg-gray-800' : '' }}">
                    <a href="{{ route('profile-sekolah') }}"
                        class="text-white pl-8 flex items-center space-x-4 py-2 side-child-item">
                        <i class='bx bxs-right-arrow-alt text-xl'></i>
                        <span class="text-sm">Profile Sekolah</span>
                    </a>
                </li>
                <li class="hover:bg-gray-800 {{ request()->routeIs('bulan') ? 'bg-gray-800' : '' }}">
                    <a href="{{ route('bulan') }}"
                        class="text-white pl-8 flex items-center space-x-4 py-2 side-child-item">
                        <i class='bx bxs-right-arrow-alt text-xl'></i>
                        <span class="text-sm">Bulan</span>
                    </a>
                </li>
                <li class="hover:bg-gray-800 {{ request()->routeIs('tahun-pelajaran') ? 'bg-gray-800' : '' }}">
                    <a href="{{ route('tahun-pelajaran') }}"
                        class="text-white pl-8 flex items-center space-x-4 py-2 side-child-item">
                        <i class='bx bxs-right-arrow-alt text-xl'></i>
                        <span class="text-sm">Tahun Pelajaran</span>
                    </a>
                </li>
                <li class="hover:bg-gray-800 {{ request()->routeIs('kelas') ? 'bg-gray-800' : '' }}">
                    <a href="{{ route('kelas') }}"
                        class="text-white pl-8 flex items-center space-x-4 py-2 side-child-item">
                        <i class='bx bxs-right-arrow-alt text-xl'></i>
                        <span class="text-sm">Kelas</span>
                    </a>
                </li>
                <li class="hover:bg-gray-800 {{ request()->routeIs('jurusan') ? 'bg-gray-800' : '' }}">
                    <a href="{{ route('jurusan') }}"
                        class="text-white pl-8 flex items-center space-x-4 py-2 side-child-item">
                        <i class='bx bxs-right-arrow-alt text-xl'></i>
                        <span class="text-sm">Jurusan</span>
                    </a>
                </li>
                <li class="hover:bg-gray-800 {{ request()->routeIs('peserta-didik') ? 'bg-gray-800' : '' }}">
                    <a href="{{ route('peserta-didik') }}"
                        class="text-white pl-8 flex items-center space-x-4 py-2 side-child-item">
                        <i class='bx bxs-right-arrow-alt text-xl'></i>
                        <span class="text-sm">Peserta Didik</span>
                    </a>
                </li>
            </ul>
        </li>
        {{-- <li class="relative group side-item">
            <a href="#" aria-expanded="false"
                class="has-arrow group-hover:bg-gray-800  text-white px-4 flex items-center space-x-4 py-2 side-item-link">
                <i class="fa-solid fa-file-lines text-xl side-icon"></i>
                <span class="side-item-text text-sm">Laporan</span>
            </a>
            <ul class="side-child">
                <li class="hover:bg-gray-800">
                    <a href="#" class="text-white pl-8 flex items-center space-x-4 py-2 side-child-item">
                        <i class='bx bxs-right-arrow-alt text-xl'></i>
                        <span class="text-sm">Laporan Total Keuangan</span>
                    </a>
                </li>
                <li class="hover:bg-gray-800">
                    <a href="#" class="text-white pl-8 flex items-center space-x-4 py-2 side-child-item">
                        <i class='bx bxs-right-arrow-alt text-xl'></i>
                        <span class="text-sm">Laporan Per-Kelas</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="relative group side-item">
            <a href="{{ route('pengguna-aplikasi') }}"
                class="text-white group-hover:bg-gray-800 px-4 flex items-center space-x-4 py-2 side-item-link">
                <i class="fa-solid fa-users side-icon"></i>
                <span class="side-item-text text-sm">Pengguna Aplikasi</span>
            </a>
        </li> --}}
        <li class="relative group side-item {{ request()->routeIs('backup.database') ? 'mm-active' : '' }}">
            <a href="{{ route('backup.database') }}"
                class="text-white group-hover:bg-gray-800 {{ request()->routeIs('backup.database') ? 'bg-gray-800' : '' }} px-4 flex items-center space-x-4 py-2 side-item-link">
                <i class="fa-solid fa-database side-icon"></i>
                <span class="side-item-text text-sm">Backup Database</span>
            </a>
        </li>
        <li class="relative group side-item">
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <a href="{{ route('logout') }}" @click.prevent="$root.submit();"
                    class="text-white group-hover:bg-gray-800 px-4 flex items-center space-x-4 py-2 side-item-link">
                    <i class='bx bx-log-out-circle side-icon text-xl'></i>
                    <span class="side-item-text text-sm">Logout</span>
                </a>
            </form>
        </li>
    </ul>
</aside>
