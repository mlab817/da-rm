<?php

use App\Http\Livewire\Commodities;
use App\Http\Livewire\FocalAddForm;
use App\Http\Livewire\FocalListing;
use App\Http\Livewire\Focals;
use App\Http\Livewire\Offices;
use App\Http\Livewire\ReportAddForm;
use App\Http\Livewire\ReportListing;
use App\Http\Livewire\RoadmapAddForm;
use App\Http\Livewire\RoadmapListing;
use App\Http\Livewire\RoadmapShow;
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
    Route::get('focals/{focal}/edit', FocalAddForm::class)->name('focals.edit');
    Route::get('focals/create', FocalAddForm::class)->name('focals.create');
    Route::get('focals', FocalListing::class)->name('focals');
    Route::get('commodities', Commodities::class)->name('commodities');

    Route::get('/reports/create', ReportAddForm::class)->name('reports.create');
    Route::get('/reports/{report}/edit', ReportAddForm::class)->name('reports.edit');
    Route::get('/reports', ReportListing::class)->name('reports');

    Route::get('/roadmaps/create', RoadmapAddForm::class)->name('roadmaps.create');
    Route::get('/roadmaps/{roadmap}/edit', RoadmapAddForm::class)->name('roadmaps.edit');
    Route::get('/roadmaps/{roadmap}', RoadmapShow::class)->name('roadmaps.show');
    Route::get('/roadmaps', RoadmapListing::class)->name('roadmaps.index');
});
