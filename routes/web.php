<?php

use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\NewsUpdateController;
use App\Http\Controllers\Public\ProjectController;
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

Route::view('/sectoral-profile', 'public.sectoral-profile')->name('sectoral-profile');
Route::view('/sectoral-profile/education', 'public.sectoral-profile.education')->name('sectoral-profile.education');
Route::view('/sectoral-profile/health', 'public.sectoral-profile.health')->name('sectoral-profile.health');
Route::view('/sectoral-profile/community-development', 'public.sectoral-profile.community-development')->name('sectoral-profile.community-development');



Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/news', [NewsUpdateController::class, 'index'])->name('public.news-updates');
Route::get('/news/{slug}', [NewsUpdateController::class, 'show'])->name('public.news-updates.show');



