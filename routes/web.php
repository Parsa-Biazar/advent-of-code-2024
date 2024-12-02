<?php

use App\Http\Controllers\Days;
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

Route::get('/', [Days::class,'index'])->name('days');
Route::get('/{day}', [Days::class,'day'])->name('SingleDays');
Route::get('/{day}/{part}/', [Days::class,'solutions'])->name('Solutions');
