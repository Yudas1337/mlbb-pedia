<?php

use App\Http\Controllers\HomeController;
use App\Http\Livewire\Lane\LaneIndex;
use App\Http\Livewire\Matchmaking\MatchmakingIndex;
use App\Http\Livewire\Role\RoleIndex;
use Illuminate\Support\Facades\Auth;
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

Auth::routes([
    'register'  => false, // Registration Routes...
    'reset'     => false, // Password Reset Routes...
    'verify'    => false, // Email Verification Routes...
]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::get('lane', LaneIndex::class)->name('lane.homepage');
    Route::get('hero', LaneIndex::class)->name('hero.homepage');
    Route::get('role', RoleIndex::class)->name('role.homepage');
    Route::get('matchmaking', MatchmakingIndex::class)->name('matchmaking.homepage');
});
