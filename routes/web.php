<?php

use App\Http\Livewire\Commodities;
use App\Http\Livewire\Focals;
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

Route::group(['prefix' => '/','middleware'=>'auth:sanctum'], function() {
    Route::get('', function() {
        return view('welcome');
    })->name('welcome');
    Route::get('offices', Offices::class)->name('offices');
    Route::get('focals', Focals::class)->name('focals');
    Route::get('commodities', Commodities::class)->name('commodities');

    Route::get('/reports/create', Reports\CreateReport::class)->name('reports.create');
    Route::get('/reports/{id}', Reports\ShowReport::class)->name('reports.show');
    Route::get('reports', Reports::class)->name('reports');
});
