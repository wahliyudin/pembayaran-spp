<?php

use App\Http\Livewire\Admin\BulanComponent;
use App\Http\Livewire\Admin\DashboardComponent;
use App\Http\Livewire\Admin\JenisPembayaranComponent;
use App\Http\Livewire\Admin\JurusanComponent;
use App\Http\Livewire\Admin\KelasComponent;
use App\Http\Livewire\Admin\NamaPembayaranComponent;
use App\Http\Livewire\Admin\PesertaDidikComponent;
use App\Http\Livewire\Admin\ProfileSekolahComponent;
use App\Http\Livewire\Admin\TahunPelajaranComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', DashboardComponent::class)->name('dashboard');
    Route::get('/profile-sekolah', ProfileSekolahComponent::class)->name('profile-sekolah');
    Route::get('/bulan', BulanComponent::class)->name('bulan');
    Route::get('/tahun-pelajaran', TahunPelajaranComponent::class)->name('tahun-pelajaran');
    Route::get('/kelas', KelasComponent::class)->name('kelas');
    Route::get('/jurusan', JurusanComponent::class)->name('jurusan');
    Route::get('/peserta-didik', PesertaDidikComponent::class)->name('peserta-didik');
    Route::get('/nama-pembayaran', NamaPembayaranComponent::class)->name('nama-pembayaran');
    Route::get('/jenis-pembayaran', JenisPembayaranComponent::class)->name('jenis-pembayaran');
});
