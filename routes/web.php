<?php

use App\Http\Controllers\DaysController;
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

Route::get('/', [DaysController::class, 'index'])->name('index');
Route::get('day/{day}/part/{part}/', [DaysController::class, 'details'])->name('details');
Route::get('php', function (){
    phpinfo();
});
