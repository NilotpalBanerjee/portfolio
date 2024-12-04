<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\SkilsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('frontend.pages.index');
});

Route::get('/admin', [AuthController::class,'getLogin'])->name('getLogin');
Route::post('/admin/login', [AuthController::class,'postLogin'])->name('postLogin');

Route::group(['middleware'=>['admin_auth']],function(){
    
    Route::get('/admin/dashboard',[ProfileController::class,'dashboard'])->name('dashboard');
    Route::get('/admin/logout',[AuthController::class,'logout'])->name('logout');

    Route::get('/admin/skils-view', [SkilsController::class,'skils_view'])->name('skils');
    Route::get('/admin/skils-master', [SkilsController::class, 'skils_master'])->name('skils-master');
    Route::post('/admin/skils-master', [SkilsController::class, 'skils_master'])->name('skils-master');
    Route::post('/admin/skils-create-update', [SkilsController::class,'create_update'])->name('create-update');
    Route::post('/admin/skils-remove', [SkilsController::class,'skils_remove'])->name('remove-skils');

});

Route::get('/', [SkilsController::class,'show'])->name('skill');

