<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Controllers\DataController;
use App\Http\Controllers\MemberController;
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

Route::redirect('/', '/login');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)->name('login');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', LogoutController::class)->name('logout');

});

Route::group(['prefix' => 'admin', 'middleware' => ['check_admin', 'auth']], function(){
    Route::get('dashboard', [DataController::class, 'index'])->name('index');
    Route::get('data/{id}', [DataController::class, 'getData']);
    Route::get('create/data', [DataController::class, 'createData']); 
    Route::post('register', [Register::class, 'register'])->name('register');
    Route::get('edit/data/{id}', [DataController::class, 'editData']);
    Route::patch('update/data/{id}', [Register::class, 'updateData'])->name('update');
    Route::delete('delete/data/{id}', [DataController::class, 'deleteData'])->name('delete');
});

Route::group(['middleware' => ['check_member', 'auth']], function(){
    Route::get('dashboard', [MemberController::class, 'index'])->name('home');
});


