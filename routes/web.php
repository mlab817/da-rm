<?php

use App\Http\Livewire\Commodities;
use App\Http\Livewire\Offices;
use App\Http\Livewire\Reports;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/offices', Offices::class)->name('offices');
Route::get('/commodities', Commodities::class)->name('commodities');
Route::get('/reports', Reports::class)->name('reports');
