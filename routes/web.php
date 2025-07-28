<?php

use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\NewsUpdateController;
use App\Models\NewsUpdate;
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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('login', function () {
    return redirect('/admin/login');
})->name('admin.login');
/*
Route::get('/', function(){
    return view('public.home');
});
*/
//Route::get('/', [HomeController::class, 'showNewsUpdates'])->name('home');
//Route::get('/', [HomeController::class, 'showFeaturedProjects'])->name('home');

// Displaying featured news and featured projects to the home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// About pages
Route::view('/about', 'public.about.about')->name('about');
Route::view('/about/mps-message', 'public.about.mps-message')->name('mps-message');

Route::get('/news', [NewsUpdateController::class, 'index'])->name('public.news-updates');
Route::get('/news/{slug}', [NewsUpdateController::class, 'show'])->name('public.news-updates.show');

