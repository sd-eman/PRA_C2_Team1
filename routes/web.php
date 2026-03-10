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

/*
2017-10-30 setup for urls
Home:			/
Brand:			/52/AEG/
Type:			/52/AEG/53/Superdeluxe/
Manual:			/52/AEG/53/Superdeluxe/8023/manual/
				/52/AEG/456/Testhandle/8023/manual/

If we want to add product categories later:
Productcat:		/category/12/Computers/
*/

use App\Models\Brand;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ManualController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\LocaleController;
use App\Models\Manual;

Route::get('/', function () {
    $Team = 'Team-A';
    $brands = Brand::all()->sortBy('name');

    // Top 10 populairste handleidingen
    $topManuals = Manual::with('brand')
        ->orderBy('views', 'desc')
        ->limit(10)
        ->get();

    return view('pages.homepage', [
        'Team' => $Team,
        'brands' => $brands,
        'topManuals' => $topManuals
    ]);
})->name('home');

Route::get('/contact', function () {
    return view('pages.contactformulier');
})->name('contact');

Route::get('/brandsbyletter', function () {
    return view('pages.brandsbyletter');
})->name('brandsbyletter');

// Alphabet index pages for SEO (e.g. /merken/B)
Route::get('/merken/{letter}', [BrandController::class, 'byLetter'])
    ->where('letter', '[A-Za-z]')
    ->name('brands.by-letter');

Route::get('/manual/{language}/{brand_slug}/', [RedirectController::class, 'brand']);
Route::get('/manual/{language}/{brand_slug}/brand.html', [RedirectController::class, 'brand']);

Route::get('/datafeeds/{brand_slug}.xml', [RedirectController::class, 'datafeed']);

// Locale routes
Route::get('/language/{language_slug}/', [LocaleController::class, 'changeLocale']);

// List of manuals for a brand
Route::get('/{brand_id}/{brand_slug}/', [BrandController::class, 'show']);

// Detail page for a manual
Route::get('/{brand_id}/{brand_slug}/{manual_id}/', [ManualController::class, 'show'])
    ->name('manual.show');

// Generate sitemaps
Route::get('/generateSitemap/', [SitemapController::class, 'generate']);
