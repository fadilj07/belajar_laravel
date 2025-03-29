<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BljrController;
use App\Http\Middleware\LoginCheck;
use App\Http\Middleware\loggedIn;


Route::get('/', function () {
    return redirect()->route('login');
});
    Route::get('/login', [BljrController::class, 'login'])->name('login');
    Route::post('/proseslogin', [BljrController::class, 'proseslogin'])->name('proseslogin');


    Route::get('/dashboard', [BljrController::class, 'tampiladmin'])->name('dashboard');
    Route::get('/cobacontroller', [BljrController::class, 'tampil']);
    Route::get('/cobacontroller2', [BljrController::class, 'tampil2']);
    Route::get('/listbarang', [BljrController::class, 'listbarang'])->name('databarang');
    Route::get('/formhitung', [BljrController::class, 'fhitung'])->name('formhitung');
    Route::post('/proseshitung', [BljrController::class, 'calculate'])->name('proseshitung');
    Route::get('/listgempa', [BljrController::class, 'listgempa'])->name('datagempa');
    Route::get('/formregister', [BljrController::class, 'fregister'])->name('formregister');
    Route::post('/prosesregister', [BljrController::class, 'daftar'])->name('prosesregister');
    Route::get('/edituser/{id}', [BljrController::class, 'editUser'])->name('useredit');
    Route::post('/updateuser/{id}', [BljrController::class, 'updateuser'])->name('updateuser');
    Route::delete('/userdelete/{id}', [BljrController::class, 'deleteUser'])->name('userdelete');
    Route::get('/logout', [BljrController::class, 'logout'])->name('logout');
;