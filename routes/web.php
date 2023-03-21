<?php

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

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('page.home');

Auth::routes();

Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::get('dashboard', [App\Http\Controllers\adminController::class, 'dashboard'])->name('dashboard.page');

//property
Route::get('properties', [App\Http\Controllers\propertyController::class, 'index'])->name('property.index');
Route::get('property/create', [App\Http\Controllers\propertyController::class, 'create'])->name('property.create');
Route::post('property/create', [App\Http\Controllers\propertyController::class, 'store'])->name('property.store');
Route::get('property/{code}/edit', [App\Http\Controllers\propertyController::class, 'edit'])->name('property.edit');
Route::post('property/{code}/update', [App\Http\Controllers\propertyController::class, 'update'])->name('property.update');

Route::get('property/{code}/units', [App\Http\Controllers\propertyController::class, 'units'])->name('property.units');
Route::post('property/unit/upload', [App\Http\Controllers\propertyController::class, 'upload_units'])->name('property.units.upload');
Route::post('property/individual/unit/add', [App\Http\Controllers\propertyController::class, 'upload_individual_units'])->name('property.unit.individual.add');
Route::get('unit/import/sample', [App\Http\Controllers\propertyController::class, 'download_sample'])->name('unit.import.sample');

Route::get('property/{code}/files', [App\Http\Controllers\propertyController::class, 'files'])->name('property.files');
Route::get('property/{code}/floor_plans', [App\Http\Controllers\propertyController::class, 'floor_plans'])->name('property.floor.plans');
Route::post('property/floor_plans/upload', [App\Http\Controllers\propertyController::class, 'floor_plan_upload'])->name('property.floor.plan.upload');
Route::post('property/files/upload', [App\Http\Controllers\propertyController::class, 'file_upload'])->name('property.files.upload');
Route::get('property/files/{fileCode}/delete', [App\Http\Controllers\propertyController::class, 'file_delete'])->name('property.files.delete');

Route::get('property/{code}/cashflow/values', [App\Http\Controllers\cashflowController::class, 'cashflow_values'])->name('property.cashflow.values');
Route::post('property/cashflow/values/update', [App\Http\Controllers\cashflowController::class, 'cashflow_values_update'])->name('property.cashflow.values.update');
Route::post('property/cashflow/forecasting/update', [App\Http\Controllers\cashflowController::class, 'cashflow_forecasting'])->name('property.cashflow.forecasting.update');
Route::get('property/{code}/cashflow', [App\Http\Controllers\cashflowController::class, 'cashflow'])->name('property.cashflow');
Route::post('property/cashflow/units', [App\Http\Controllers\cashflowController::class, 'cashflow_unit'])->name('property.cashflow.unit');

Route::get('property/{code}/videos', [App\Http\Controllers\propertyController::class, 'videos'])->name('property.videos');
Route::post('property/video/add', [App\Http\Controllers\propertyController::class, 'add_video'])->name('property.video.add');
Route::get('property/video/{code}/delete', [App\Http\Controllers\propertyController::class, 'delete_video'])->name('property.video.delete');

Route::get('property/deals/{code}/settings', [App\Http\Controllers\propertyController::class, 'deals_settings'])->name('property.deals.settings');
Route::post('property/deals/{code}/settings/update', [App\Http\Controllers\propertyController::class, 'deals_settings_update'])->name('property.deals.settings.update');

//reserve
Route::get('reserved', [App\Http\Controllers\propertyController::class, 'reserved'])->name('property.reserved');
Route::get('reserved/{code}/details', [App\Http\Controllers\propertyController::class, 'reserved_details'])->name('property.reserved.details');
Route::get('reserved/{code}/approve', [App\Http\Controllers\propertyController::class, 'approve_reserve_unit'])->name('property.approve.reserved.unit');
Route::get('reserved/{code}/stop/reservation', [App\Http\Controllers\propertyController::class, 'stop_reservation'])->name('property.reserved.stop');
Route::post('reserved/{code}/reject', [App\Http\Controllers\propertyController::class, 'reject_reservation'])->name('property.reserved.reject');

//businesses
Route::get('businesses', [App\Http\Controllers\businessesController::class, 'index'])->name('page.businesses');
Route::get('businesses/{code}/details', [App\Http\Controllers\businessesController::class, 'details'])->name('page.business.details');

//deals
Route::get('deals/list', [App\Http\Controllers\dealsController::class, 'index'])->name('property.deals');
Route::post('deals/store', [App\Http\Controllers\dealsController::class, 'store'])->name('property.deals.store');
Route::get('deals/{code}/view', [App\Http\Controllers\dealsController::class, 'view'])->name('property.deals.view');
Route::post('deals/units', [App\Http\Controllers\dealsController::class, 'add_unit'])->name('property.deals.units');
Route::get('deals/{unit}/{deal}/remove', [App\Http\Controllers\dealsController::class, 'remove'])->name('property.deals.remove');

//marketing
Route::get('marketing', [App\Http\Controllers\marketingController::class, 'index'])->name('marketing.index');
Route::get('marketing/{unitCode}/', [App\Http\Controllers\marketingController::class, 'unit'])->name('marketing.unit');
Route::get('marketing/{unitCode}/iframe', [App\Http\Controllers\marketingController::class, 'iframe'])->name('marketing.iframe');

//fact search
Route::get('factSearch', [App\Http\Controllers\factSearchController::class, 'index'])->name('fact.search.index');

//charts
Route::get('charts', [App\Http\Controllers\ChartController::class, 'charts'])->name('charts.chart');
Route::get('table', [App\Http\Controllers\ChartController::class, 'table'])->name('charts.table');


