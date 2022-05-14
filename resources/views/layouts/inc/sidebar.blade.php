<aside class="bg-gray-700 min-h-full w-[15rem] sidebar transition-all duration-300 fixed">
    <ul id="metismenu" class="space-y-2 pt-2 side">
        <span class="uppercase text-xs text-gray-400 px-4 py-2 flex side-head">navigation</span>
        <li class="mm-active relative group side-item">
            <a href="{{ route('dashboard') }}" aria-expanded="true"
                class="text-white group-hover:bg-gray-800 px-4 flex items-center space-x-4 py-2 side-item-link">
                <i class="fa-solid fa-gauge text-xl side-icon"></i>
                <span class="side-item-text text-sm">Dashboard</span>
            </a>
        </li>
        <li class="mm-active relative group side-item">
            <a href="{{ route('transaksi-siswa') }}" aria-expanded="true"
                class="text-white group-hover:bg-gray-800 px-4 flex items-center space-x-4 py-2 side-item-link">
                <i class="fa-solid fa-money-bill-transfer side-icon"></i>
                <span class="side-item-text text-sm">Transaksi Siswa</span>
            </a>
        </li>
        <li class="relative group side-item">
            <a href="#" aria-expanded="false"
                class="has-arrow group-hover:bg-gray-800  text-white px-4 flex items-center space-x-4 py-2 side-item-link">
                <i class="fa-solid fa-gear side-icon"></i>
                <span class="side-item-text text-sm">Pengaturan Pembayaran</span>
            </a>
            <ul class="side-child">
                <li class="hover:bg-gray-800">
                    <a href="{{ route('nama-pembayaran') }}" aria-expanded="true"
                        class="text-white pl-8 flex items-center space-x-4 py-2 side-child-item">
                        <i class='bx bxs-right-arrow-alt text-xl'></i>
                        <span class="text-sm">Nama Pembayaran</span>
                    </a>
                </li>
                <li class="hover:bg-gray-800">
                    <a href="{{ route('jenis-pembayaran') }}" aria-expanded="true"
                        class="text-white pl-8 flex items-center space-x-4 py-2 side-child-item">
                        <i class='bx bxs-right-arrow-alt text-xl'></i>
                        <span class="text-sm">Jenis Pembayaran</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="relative group side-item">
            <a href="#" aria-expanded="false"
                class="has-arrow group-hover:bg-gray-800  text-white px-4 flex items-center space-x-4 py-2 side-item-link">
                <i class="fa-solid fa-wrench side-icon"></i>
                <span class="side-item-text text-sm">Pengaturan Umum</span>
            </a>
            <ul class="side-child">
                <li class="hover:bg-gray-800">
                    <a href="{{ route('profile-sekolah') }}" aria-expanded="true"
                        class="text-white pl-8 flex items-center space-x-4 py-2 side-child-item">
                        <i class='bx bxs-right-arrow-alt text-xl'></i>
                        <span class="text-sm">Profile Sekolah</span>
                    </a>
                </li>
                <li class="hover:bg-gray-800">
                    <a href="{{ route('bulan') }}" aria-expanded="true"
                        class="text-white pl-8 flex items-center space-x-4 py-2 side-child-item">
                        <i class='bx bxs-right-arrow-alt text-xl'></i>
                        <span class="text-sm">Bulan</span>
                    </a>
                </li>
                <li class="hover:bg-gray-800">
                    <a href="{{ route('tahun-pelajaran') }}" aria-expanded="true"
                        class="text-white pl-8 flex items-center space-x-4 py-2 side-child-item">
                        <i class='bx bxs-right-arrow-alt text-xl'></i>
                        <span class="text-sm">Tahun Pelajaran</span>
                    </a>
                </li>
                <li class="hover:bg-gray-800">
                    <a href="{{ route('kelas') }}" aria-expanded="true"
                        class="text-white pl-8 flex items-center space-x-4 py-2 side-child-item">
                        <i class='bx bxs-right-arrow-alt text-xl'></i>
                        <span class="text-sm">Kelas</span>
                    </a>
                </li>
                <li class="hover:bg-gray-800">
                    <a href="{{ route('jurusan') }}" aria-expanded="true"
                        class="text-white pl-8 flex items-center space-x-4 py-2 side-child-item">
                        <i class='bx bxs-right-arrow-alt text-xl'></i>
                        <span class="text-sm">Jurusan</span>
                    </a>
                </li>
                <li class="hover:bg-gray-800">
                    <a href="{{ route('peserta-didik') }}" aria-expanded="true"
                        class="text-white pl-8 flex items-center space-x-4 py-2 side-child-item">
                        <i class='bx bxs-right-arrow-alt text-xl'></i>
                        <span class="text-sm">Peserta Didik</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="relative group side-item">
            <a href="#" aria-expanded="false"
                class="has-arrow group-hover:bg-gray-800  text-white px-4 flex items-center space-x-4 py-2 side-item-link">
                <i class="fa-solid fa-file-lines text-xl side-icon"></i>
                <span class="side-item-text text-sm">Laporan</span>
            </a>
            <ul class="side-child">
                <li class="hover:bg-gray-800">
                    <a href="#" aria-expanded="true"
                        class="text-white pl-8 flex items-center space-x-4 py-2 side-child-item">
                        <i class='bx bxs-right-arrow-alt text-xl'></i>
                        <span class="text-sm">Laporan Total Keuangan</span>
                    </a>
                </li>
                <li class="hover:bg-gray-800">
                    <a href="#" aria-expanded="true"
                        class="text-white pl-8 flex items-center space-x-4 py-2 side-child-item">
                        <i class='bx bxs-right-arrow-alt text-xl'></i>
                        <span class="text-sm">Laporan Per-Kelas</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="mm-active relative group side-item">
            <a href="{{ route('dashboard') }}" aria-expanded="true"
                class="text-white group-hover:bg-gray-800 px-4 flex items-center space-x-4 py-2 side-item-link">
                <i class="fa-solid fa-users side-icon"></i>
                <span class="side-item-text text-sm">Pengguna Aplikasi</span>
            </a>
        </li>
        <li class="mm-active relative group side-item">
            <a href="{{ route('dashboard') }}" aria-expanded="true"
                class="text-white group-hover:bg-gray-800 px-4 flex items-center space-x-4 py-2 side-item-link">
                <i class="fa-solid fa-database side-icon"></i>
                <span class="side-item-text text-sm">Backup Database</span>
            </a>
        </li>
    </ul>
</aside>
