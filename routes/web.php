<?php

use App\Http\Controllers\AssetsHandoverController;
use App\Http\Controllers\HardwareSoftwareController;
use App\Http\Controllers\JobRequestController;
use App\Http\Controllers\PreventiveAnnualController;
use App\Http\Controllers\PreventiveChecklistController;
use App\Http\Controllers\PreventiveDatasheetController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/job-request');

// IT Installation / Repair Job Request
Route::get('/job-request', [JobRequestController::class, 'create'])->name('job-request.form');
Route::post('/job-request', [JobRequestController::class, 'store'])->name('job-request.store');

// Assets Handover Form
Route::get('/assets-handover', [AssetsHandoverController::class, 'create'])->name('asset-handover.form');
Route::post('/assets-handover', [AssetsHandoverController::class, 'store'])->name('asset-handover.store');

// Hardware & Software Registration
Route::get('/hardware-software', [HardwareSoftwareController::class, 'create'])->name('hardware-software.form');
Route::post('/hardware-software', [HardwareSoftwareController::class, 'store'])->name('hardware-software.store');

// PM Annual Plan
Route::get('/preventive-annual', [PreventiveAnnualController::class, 'create'])->name('annual-plan.form');
Route::post('/preventive-annual', [PreventiveAnnualController::class, 'store'])->name('annual-plan.store');

// PM Checklist
Route::get('/preventive-checklist', [PreventiveChecklistController::class, 'create'])->name('pm-checklist.form');
Route::post('/preventive-checklist', [PreventiveChecklistController::class, 'store'])->name('pm-checklist.store');

// PM Data Sheet
Route::get('/preventive-datasheet', [PreventiveDatasheetController::class, 'create'])->name('preventive-maintenance.form');
Route::post('/preventive-datasheet', [PreventiveDatasheetController::class, 'store'])->name('preventive-maintenance.store');