<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\SitemapXmlController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [PageController::class, 'index']);
Route::get('/post/{slug}', [PageController::class, 'show']);

Route::get('/sitemap.xml', [SitemapXmlController::class, 'index']);
