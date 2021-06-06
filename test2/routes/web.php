<?php

use App\Http\Controllers\ValidateExcel;
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
    return view('welcome');
});
Route::get('/validate',[ValidateExcel::class, 'index'])->name('validate');
Route::get('/FormValidate',[ValidateExcel::class, 'validateForm'])->name('form');
Route::post('/FormValidate',[ValidateExcel::class, 'validateForm'])->name('formValidate');
