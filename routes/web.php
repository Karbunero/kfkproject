<?php

use App\Http\Controllers\AdminController;
// use App\Http\Controllers\Formulir1Controller;
// use App\Http\Controllers\Formulir2Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BakumpulController;
use App\Http\Controllers\BaomongController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BioskopController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\InternasionalController;
use App\Http\Controllers\JadwalContoller;
use App\Http\Controllers\JuryController;
use App\Http\Controllers\KFKController;
use App\Http\Controllers\KompetisiController;
use App\Http\Controllers\LayarController;
use App\Http\Controllers\PelajarController;
use App\Http\Controllers\PenghargaanController;
use App\Http\Controllers\TentangController;
use App\Models\Internasional;
use App\Models\Layar;
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


Route::get('/beranda', function () {
    return view('beranda');
})->middleware(['auth'])->name('beranda');

require __DIR__ . '/auth.php';


Route::get('/transaksi', [AdminController::class, 'detail_transaksi'])->name('detail_transaksi')->middleware('auth:anggota');
// Route::post('/formulir1', [HomeController::class, 'formulir1'])->name('formulir1');
// Route::post('/formulir2', [HomeController::class, 'formulir2'])->name('formulir2');
Route::get('/admin/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginadmin', [LoginController::class, 'loginadmin'])->name('loginadmin');
Route::get('/admin/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeradmin', [LoginController::class, 'registeradmin'])->name('registeradmin');
Route::get('/logout', [LoginController::class, 'logout']);

//admin
Route::get('/admin/index', [AdminController::class, 'tampil'])->middleware('auth:admin');
Route::get('/admin/program', [AdminController::class, 'show'])->middleware('auth:admin');
Route::resource('/admin/beranda', BerandaController::class)->middleware('auth:admin');
Route::resource('/admin/admin', AdminController::class)->middleware('auth:admin');
Route::resource('/admin/user', UserController::class)->middleware('auth:admin');
// Route::resource('/admin/formulir1', Formulir1Controller::class)->middleware('auth:admin');
// Route::resource('/admin/formulir2', Formulir2Controller::class)->middleware('auth:admin');
Route::resource('/admin/banner', BannerController::class)->middleware('auth:admin');
Route::resource('/admin/artikel', ArtikelController::class)->middleware('auth:admin');
Route::resource('/admin/film', FilmController::class)->middleware('auth:admin');
Route::resource('/admin/penghargaan', PenghargaanController::class)->middleware('auth:admin');
Route::resource('/admin/jury', JuryController::class)->middleware('auth:admin');
Route::resource('/admin/jadwal', JadwalController::class)->middleware('auth:admin');
Route::resource('/admin/tentang', TentangController::class)->middleware('auth:admin');
Route::resource('/admin/bakumpul', BakumpulController::class)->middleware('auth:admin');
Route::resource('/admin/baomong', BaomongController::class)->middleware('auth:admin');
Route::resource('/admin/bioskop', BioskopController::class)->middleware('auth:admin');
Route::resource('/admin/internasional', InternasionalController::class)->middleware('auth:admin');
Route::resource('/admin/kfk', KFKController::class)->middleware('auth:admin');
Route::resource('/admin/kompetisi', KompetisiController::class)->middleware('auth:admin');
Route::resource('/admin/layar', LayarController::class)->middleware('auth:admin');
Route::resource('/admin/pelajar', PelajarController::class)->middleware('auth:admin');

//user
// Route::get('/formulir1', function () {return view('user.formulir1');});
// Route::get('/formulir2', function () {return view('user.formulir2');});
Route::get('/', [BerandaController::class, 'show'])->name('welcome');
Route::get('/show', [ArtikelController::class, 'show'])->name('show');
Route::get('/media', [ArtikelController::class, 'tampil'])->name('media');
Route::get('/penghargaan', [PenghargaanController::class, 'tampil'])->name('penghargaan');
Route::get('/jadwal', [JadwalController::class, 'tampil'])->name('jadwal');
Route::get('/film', [FilmController::class, 'tampil'])->name('film');
Route::get('/banner', [BannerController::class, 'tampil'])->name('banner');
Route::get('/artikels', [ArtikelController::class, 'tampil'])->name('user.index');
Route::get('/artikels/{id}', [ArtikelController::class, 'show'])->name('user.show');
Route::get('/bioskop_pasiar', [BioskopController::class, 'show'])->name('user.program.bioskop_pasiar');
Route::get('/kompetisi_film', [KompetisiController::class, 'show'])->name('user.program.kompetisi_film');
Route::get('/layar_nusantara', [LayarController::class, 'show'])->name('user.program.layar_nusantara');
Route::get('/bakumpul_komunitas', [BakumpulController::class, 'show'])->name('user.program.bakumpul_komunitas');
Route::get('/kfk_film_lab', [KFKController::class, 'show'])->name('user.program.kfk_film_lab');
Route::get('/kompetisi_film_pelajar_ntt', [KompetisiController::class, 'show'])->name('user.program.kompetisi_film_pelajar_ntt');
Route::get('/layar_internasional', [InternasionalController::class, 'show'])->name('user.program.layar_internasional');
Route::get('/baomong_film', [BaomongController::class, 'show'])->name('user.program.baomong_film');
// Route::get('/film', function () {
//     return view('user.film');
// })->name('film');
// Route::get('/jadwal', function () {
//     return view('user.jadwal');
// })->name('jadwal');

//prgram
Route::get('/program', function () {
    return view('user.program');
})->name('program');
// ROUTING UNTUK PROGRAM
// // Route untuk masing-masing program
// Route::get('/bioskop_pasiar', function () {
//     return view('user.bioskop_pasiar');
// })->name('bioskop_pasiar');

// Route::get('/kompetisi-film', function () {
//     return view('user.program.kompetisi_film');
// })->name('kompetisi-film');

// Route::get('/layar-nusantara', function () {
//     return view('user.program.layar_nusantara');
// })->name('layar-nusantara');

// Route::get('/bakumpul-komunitas', function () {
//     return view('user.program.bakumpul_komunitas');
// })->name('bakumpul-komunitas');

// Route::get('/kfk-film-lab', function () {
//     return view('user.program.kfk_film_lab');
// })->name('kfk-film-lab');

// Route::get('/kompetisi-film-pelajar-ntt', function () {
//     return view('user.program.kompetisi_film_pelajar_ntt');
// })->name('kompetisi-film-pelajar-ntt');

// Route::get('/layar-internasional', function () {
//     return view('user.program.layar_internasional');
// })->name('layar-internasional');

// Route::get('/baomong-film', function () {
//     return view('user.program.baomong_film');
// })->name('baomong-film');




Route::get('/test-pdo', [UserController::class, 'testPdo']);
