<?php

use App\Livewire\Auth;
use App\Livewire\Logout;
use App\Livewire\Todo;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('todo', Todo::class);
Route::get('/', Auth::class);
Route::get('logout', Logout::class);