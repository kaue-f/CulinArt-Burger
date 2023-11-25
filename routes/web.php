<?php

use App\Livewire\Page\Dashboard;
use App\Livewire\Page\FinalizarPedido;
use App\Livewire\Page\Login;
use Illuminate\Support\Facades\Route;

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
    return redirect('login');
});

Route::get('/', Login::class)->name('login');
Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::get('/finalizar-pedido', FinalizarPedido::class)->name('finalizar');
