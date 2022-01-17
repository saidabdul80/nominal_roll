<?php
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/allrank', [App\Http\Controllers\RankController::class, 'index']);
Route::get('/alllist', [App\Http\Controllers\RankController::class, 'alllist']);
Route::get('/alllistx', [App\Http\Controllers\RankController::class, 'alllistx']);
Route::post('/updateUser', [App\Http\Controllers\RankController::class, 'updateUser']);
Route::get('/addUser', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::get('/dismissal', [App\Http\Controllers\RankController::class, 'dismissal']);
Route::get('/transfer', [App\Http\Controllers\RankController::class, 'transfer']);
Route::get('/deathList', [App\Http\Controllers\RankController::class, 'deathList']);
Route::get('/phoneBook', [App\Http\Controllers\RankController::class, 'phoneBook']);

Auth::routes();
Route::post('/upload',[App\Http\Controllers\RegisterController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/add-user', [App\Http\Controllers\HomeController::class, 'addUser'])->name('add-user');
Route::get('/transfer', [App\Http\Controllers\HomeController::class, 'transfer'])->name('transfer');
Route::get('/death-list', [App\Http\Controllers\HomeController::class, 'deathList'])->name('death-list');
Route::get('/dismissal', [App\Http\Controllers\HomeController::class, 'dismissal'])->name('dismissal');
Route::get('/phone-book', [App\Http\Controllers\HomeController::class, 'phoneBook'])->name('phone-book');

//Route::get('/registerx', [App\Http\Controllers\RegisterController::class, 'index']);
