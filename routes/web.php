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
Route::get('/', function () {
    return view('admin-panel.documents.index');
});

Route::post('documents-store','App\Http\Controllers\AdminController@documentsStore');
Route::get('documents','App\Http\Controllers\AdminController@documents');
Route::get('documents-create','App\Http\Controllers\AdminController@documentsCreate');
Route::get('view-document/{id}','App\Http\Controllers\AdminController@viewDocument');
Route::get('/clear', function() {
     
     Artisan::call('config:cache');
     Artisan::call('cache:clear');
     Artisan::call('view:clear');
     return 'Routes cache cleared';
 });
