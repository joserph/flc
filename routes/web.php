<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PdfController;
use App\Livewire\Logistics;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/{slug}', [HomeController::class, 'view']);
Route::get('return-report-pdf/{id}', [PdfController::class, 'returnReportPdf'])->name('return-report.pdf');
