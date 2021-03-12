<?php

use App\Http\Livewire\Commodities;
use App\Http\Livewire\ComplianceReviewForm;
use App\Http\Livewire\FocalAddForm;
use App\Http\Livewire\FocalListing;
use App\Http\Livewire\Focals;
use App\Http\Livewire\Offices;
use App\Http\Livewire\ReportAddForm;
use App\Http\Livewire\ReportListing;
use App\Http\Livewire\RoadmapAddForm;
use App\Http\Livewire\RoadmapComplianceReview;
use App\Http\Livewire\RoadmapListing;
use App\Http\Livewire\RoadmapShow;
use App\Http\Livewire\RoadmapUpdateAdd;
use App\Http\Livewire\UploadListing;
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

    Route::get('commodities', Commodities::class)->name('commodities');

    Route::group(['prefix' => 'focals'], function() {
        Route::get('{focal}/edit', FocalAddForm::class)->name('focals.edit');
        Route::get('create', FocalAddForm::class)->name('focals.create');
        Route::get('/', FocalListing::class)->name('focals');
    });

    Route::group(['prefix' => 'progress-reports'], function() {
        Route::get('create', ReportAddForm::class)->name('reports.create');
        Route::get('{report}/edit', ReportAddForm::class)->name('reports.edit');
        Route::get('/', ReportListing::class)->name('reports.index');
    });

    Route::group(['prefix' => 'roadmaps'], function() {
        Route::get('/create', RoadmapAddForm::class)->name('roadmaps.create');
        Route::get('/{roadmap}/edit', RoadmapAddForm::class)->name('roadmaps.edit');
        Route::get('/{roadmap}', RoadmapShow::class)->name('roadmaps.show');
        Route::get('/', RoadmapListing::class)->name('roadmaps.index');
    });

    Route::get('/compliance-review/{roadmap_version}', RoadmapComplianceReview::class)->name('compliance.review');

    Route::get('/uploads', UploadListing::class)->name('uploads.index');

    Route::get('/roadmap-updates/create', RoadmapUpdateAdd::class)->name('roadmap-updates.create');
});
