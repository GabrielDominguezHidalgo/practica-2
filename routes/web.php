<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\MonedaController;

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

//Route::get('backend', [BackendController::class, 'main'])->name('backend.main');
//Route::resource('ticket', TicketController::class, ['names' => 'ticket'])->only(['index', 'show']);
//Route::resource('backend/ticket', BackendTicketController::class, ['names' => 'backend.ticket']);
//Route::resource('backend/enterprise', BackendEnterpriseController::class, ['names' => 'backend.enterprise']);
// https://..../backend/ticket/create?identerprise=1
// https://..../backend/ticket/{identerprise}/create
// https://..../backend/ticket/create/{identerprise}
//Route::get('backend/ticket/create/{identerprise}', [BackendTicketController::class, 'createTicketEp'])->name('backend.ticket.createticketep');
//Route::get('backend/ticket/{identerprise}/tickets', [BackendTicketController::class, 'showTickets'])->name('backend.ticket.showtickets');

Route::get('backend', [BackendController::class, 'main'])->name('backend.main');
Route::get('sesion', [MonedaController::class, 'sesion'])->name('sesion');

Route::resource('backend/moneda', MonedaController::class, ['names' => 'backend.moneda']);
//Route::post('backend/moneda', [MonedaController::class, 'store'])->name('backend.store');

Route::get('backend/moneda/create/{idmoneda}', [MonedaController::class, 'create'])->name('backend.moneda.createmonedas');
Route::get('backend/moneda/{idmoneda}', [MonedaController::class, 'show'])->name('backend.moneda.show');


