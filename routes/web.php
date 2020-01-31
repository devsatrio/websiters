<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Admin

Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\AdminControl@index')->name('admin.login');
    Route::get('/logout', 'Admin\AdminControl@logout')->name('admin.logout');
    Route::post('/auth-login', 'Admin\AdminControl@login')->name('admin.auth');
});
Route::prefix('dashboard')->group(function () {
    Route::get('/', 'Admin\DashboardControl@index')->name('admin.dashboard');
});
Route::prefix('vid')->group(function () {
    Route::get('/', 'Admin\vidtube\VidtubesControl@index')->name('vid');
    Route::post('/vid-ad', 'Admin\vidtube\VidtubesControl@addvid')->name('vid.add');
    Route::post('/vid-up', 'Admin\vidtube\VidtubesControl@updatevid')->name('vid.update');
    Route::get('/vid-delete/{id}/{token}', 'Admin\vidtube\VidtubesControl@delvid')->name('vid.delete');
});
Route::prefix('image')->group(function () {
    Route::get('/', 'Admin\galeri\GaleriControl@index')->name('galeri');
    Route::post('/galeri-add', 'Admin\galeri\GaleriControl@galeriadd')->name('galeri.add');
    Route::get('/galeri-remove/{token}', 'Admin\galeri\GaleriControl@galeridel')->name('galeri.del');
    Route::get('/galeri-hapus/{id}/{nama}', 'Admin\galeri\GaleriControl@galerihapus')->name('galeri.hapus');
    Route::get('slider', 'Admin\galeri\GaleriControl@slider')->name('slider');
    Route::get('slider-hapus/{id}/{nama}', 'Admin\galeri\GaleriControl@sliderhapus')->name('slider.hapus');
    Route::get('/slider-del/{token}', 'Admin\galeri\GaleriControl@sliderdel')->name('slider.del');
    Route::get('/slider-hide/{id}/{ak}', 'Admin\galeri\GaleriControl@sliderhide')->name('slider.hide');
    Route::post('/slider-add', 'Admin\galeri\GaleriControl@addslider')->name('slider.add');
    Route::post('/slider-deskripsi', 'Admin\galeri\GaleriControl@deskslider')->name('slider.desk');
});
Route::prefix('artikel')->group(function () {
    Route::get('/', 'Admin\artikel\ArtikelControll@index')->name('artikel');
    Route::get('/add', 'Admin\artikel\ArtikelControll@add')->name('artikel.add');
    Route::post('/artikel-submit', 'Admin\artikel\ArtikelControll@addartikel')->name('artikel.submit');
    Route::post('/artikel-update', 'Admin\artikel\ArtikelControll@updateartikel')->name('artikel.update');
    Route::get('/artikel-delete/{id}/{token}', 'Admin\artikel\ArtikelControll@artikeldelete')->name('artikel.delete');
    Route::get('/artikel-lock/{id}/{a}', 'Admin\artikel\ArtikelControll@artikellock')->name('artikel.lock');
    Route::get('/kategori', 'Admin\artikel\ArtikelControll@kategori')->name('kategori');
    Route::post('/kategori-add', 'Admin\artikel\ArtikelControll@kategoriadd')->name('kategori.add');
    Route::post('/kategori-update', 'Admin\artikel\ArtikelControll@kategoriupdate')->name('kategori.update');
    Route::get('/kategori-delete/{id}/{token}', 'Admin\artikel\ArtikelControll@kategoridelete')->name('kategori.delete');
    Route::post('/subkategori-add', 'Admin\artikel\ArtikelControll@subkategoriadd')->name('subkategori.add');
    Route::post('/subkategori-update', 'Admin\artikel\ArtikelControll@subkategoriupdate')->name('subkategori.update');
    Route::get('/subkategori-delete/{id}/{token}', 'Admin\artikel\ArtikelControll@subkategoridelete')->name('subkategori.delete');
});
Route::prefix('user-role')->group(function () {
    Route::get('/', 'Admin\role\Role@index')->name('role');
    Route::post('/user-update', 'Admin\role\Role@updateuser')->name('user.update');
    Route::post('/user-add', 'Admin\role\Role@adduser')->name('user.add');
    Route::post('/user-update', 'Admin\role\Role@updateuser')->name('user.update');
    Route::get('/user-delete/{id}/{token}', 'Admin\role\Role@deleteuser')->name('user.delete');
    Route::post('/role-add', 'Admin\role\Role@addrole')->name('role.add');
    Route::get('/role-delete/{id}/{token}', 'Admin\role\Role@deleterole')->name('role.delete');
    Route::post('/role-update', 'Admin\role\Role@updaterole')->name('role.update');
    Route::post('/modul-add', 'Admin\role\Role@addmodul')->name('modul.add');
    Route::post('/modul-update', 'Admin\role\Role@updatemodul')->name('modul.update');
});
Route::prefix('produk')->group(function(){
    Route::get('/','Admin\barang\BarangControl@index')->name('katalog');
    Route::post('/add-bkategori','Admin\barang\BarangControl@addkategori')->name('add.bkategori');
    Route::post('/update-bkategori','Admin\barang\BarangControl@updatekategori')->name('update.bkategori');
    Route::get('/del-bkategori/{id}/{token}','Admin\barang\BarangControl@delkategori')->name('del.bkategori');
    Route::post('/add-produk','Admin\barang\BarangControl@addproduk')->name('add.produk');
    Route::post('/update-produk','Admin\barang\BarangControl@updateproduk')->name('update.produk');
    Route::post('/update-foto-produk','Admin\barang\BarangControl@upfoto')->name('update.foto.produk');
    Route::post('/add-produk-stok','Admin\barang\BarangControl@addprodukstok')->name('add.b.stok');
    Route::get('/del-produk/{id}/{token}','Admin\barang\BarangControl@delproduk')->name('del.bproduk');
    // pakan
    Route::get('/pakan','Admin\barang\BarangControl@indexpakan')->name('pakan');
    Route::post('/add-pakan','Admin\barang\BarangControl@addpakan')->name('add.pakan');
    Route::post('/update-pakan','Admin\barang\BarangControl@updatepakan')->name('update.pakan');
    Route::post('/update-foto-pakan','Admin\barang\BarangControl@upfotopakan')->name('update.foto.pakan');
    Route::post('/add-pakan-stok','Admin\barang\BarangControl@addpakanstok')->name('add.pakan.stok');
    Route::get('/del-pakan/{id}/{token}','Admin\barang\BarangControl@delpakan')->name('del.pakan');

});
Route::prefix('setting')->group(function () {
    Route::get('/', 'Admin\setting\SettingControl@index')->name('setting');
    Route::post('/setting-update', 'Admin\setting\SettingControl@update')->name('setting.update');
    Route::get('/akun','Admin\setting\AkunControl@index')->name('akun.setting');
    Route::post('/akun-update','Admin\setting\AkunControl@akunupdate')->name('akun.update');
});
Route::prefix('karyawan')->group(function(){
    Route::get('/','Admin\karyawan\KaryawanControl@index')->name('karyawan');
    Route::post('/add-karyawan','Admin\karyawan\KaryawanControl@simpan')->name('add.karyawan');
    Route::post('/update-karyawan','Admin\karyawan\KaryawanControl@update')->name('update.karyawan');
    Route::get('/del-karyawan/{id}/{token}','Admin\karyawan\KaryawanControl@hapus')->name('del.karyawan');
});
Route::prefix('laporan')->group(function(){
    Route::get('/track','Admin\laporan\LaporanControl@index')->name('laporan.track');
    Route::post('cari-track','Admin\laporan\LaporanControl@cari')->name('cari.track');
    Route::get('/print-track/{tgl1}/{tgl2}/{idk}/{img}','Admin\laporan\LaporanControl@print_track')->name('print.track');    
    Route::get('/del-track/{id}','Admin\laporan\LaporanControl@deltrack')->name('del.track');
});
Route::prefix('/')->group(function(){
    Route::get('/','User\FrontControl@index')->name('beranda');
    Route::get('/halaman-galeri','User\FrontControl@galeri')->name('halaman-galeri');
    // Route::get('/menu/{k}','User\FrontControl@kategori')->name('kategori');
    Route::get('info/{url}','User\FrontControl@artikel')->name('info');
    Route::get('/submenu/{sk}','User\FrontControl@subkategori')->name('subkategori');    
    Route::get('produk/{kode}','User\FrontControl@detailproduk')->name('info.detail.produk');        
});
Route::prefix('Customer')->group(function(){
    Route::get('/','admin\customer\CustomerControl@index')->name('customer');
    Route::get('/delc/{token}/{id}','admin\customer\CustomerControl@del')->name('del.customer');
    Route::post('/addc','admin\customer\CustomerControl@add')->name('add.customer');
    Route::post('/upc','admin\customer\CustomerControl@update')->name('update.customer');
    Route::post('/cari','admin\customer\CustomerControl@cari')->name('cari.customer');

});
Route::prefix('Transaksi')->group(function(){
    Route::get('/','Admin\Trx\TrxControl@index')->name('trx');    
    Route::get('/getPo','Admin\Trx\TrxControl@noPo')->name('noPo');    
    Route::get('/getSj','Admin\Trx\TrxControl@noSj')->name('noSj');   
    Route::get('/getCs','Admin\Trx\TrxControl@Cs')->name('get.cs');   
    Route::get('/getSP','Admin\Trx\TrxControl@suplemen')->name('txsp');   
    Route::get('/getPK','Admin\Trx\TrxControl@pakan')->name('txpk');   
    Route::get('/getStok/{id}/{pil}','Admin\Trx\TrxControl@stokProd')->name('txstok');       
    Route::get('/getCust','Admin\Trx\TrxControl@customer')->name('txcust');
    Route::get('/getDetCs/{id}','Admin\Trx\TrxControl@detCs')->name('detcust');    
    Route::get('/getListP/{id}/{pil}','Admin\Trx\TrxControl@listProd')->name('listp');       
    Route::get('/getDetailTrx/{id}','Admin\Trx\TrxControl@detailTrx')->name('txdetail');       
    Route::get('/delBarangTrx/{id}','Admin\Trx\TrxControl@delbarang');
    Route::get('/getTotalTrx/{id}','Admin\Trx\TrxControl@totalTrx');
    Route::post('/addDetailTrx','Admin\Trx\TrxControl@add_detailTrx')->name('add.txdetail');     
    // piutang
    Route::get('/piutang','Admin\Trx\TrxControl@piutang')->name('trx.piutang');    
    // pengeluaran
    Route::get('/pengeluaran','Admin\Trx\TrxControl@pengeluaran')->name('trx.pengeluaran');
    Route::get('/show-pengeluaran','Admin\Trx\TrxControl@showpengeluaran');
    Route::get('/del-pengeluaran/{id}','Admin\Trx\TrxControl@delpengeluaran');
    Route::post('/add-pengeluaran','Admin\Trx\TrxControl@addpengeluaran');
    Route::get('/cari-pengeluaran/{dt1}/{dt2}','Admin\Trx\TrxControl@caripengeluaran');

    Route::get('/lap-trx','Admin\Trx\TrxControl@laptrx')->name('trx.lap');    
    Route::get('/lap-stok','Admin\Trx\TrxControl@lapstok')->name('trx.stok');    
});
