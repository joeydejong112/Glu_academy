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
Route::middleware(['cache_control','adminchecker'])->group(function () {

    Route::get('/', 'Homecontroller@home' );
    Route::get('/home', 'Homecontroller@home' )->name('home');

    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

    Route::post('signup', 'Homecontroller@signup');

});
Route::middleware(['cache_control','adminacces'])->group(function () {
    Route::get('/logout_admin', '\App\Http\Controllers\Auth\LoginController@logout');
    Route::get('/admin', 'admincontroller@home' )->name('admin');
    Route::get('/admin/delete/{token}', 'admincontroller@delete' );
    Route::post('adminupdate', 'admincontroller@update');
    Route::post('vraagdelete', 'admincontroller@vraagdelete');
    Route::post('vraagadd', 'admincontroller@vraagadd');
    Route::post('vraagedit', 'admincontroller@vraagedit');
    Route::get('/clear-cache', function() {
        Artisan::call('cache:clear');
        return "Cache is cleared";
    });
});
Auth::routes(['reset' => false]);







