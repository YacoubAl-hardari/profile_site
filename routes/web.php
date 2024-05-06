<?php

use App\Livewire\Home\ShowHomePage;
use App\Livewire\Blogs\ShowBlogPage;
use Illuminate\Support\Facades\Route;
use App\Livewire\About\ShowAboutMePage;
use App\Livewire\Blogs\ShowBlogDetailsPage;
use App\Livewire\ContactUs\ShowContactUSPage;
use App\Livewire\Services\ShowAllServicesPage;
use App\Livewire\Portfolios\ShowPortfoliosPage;
use App\Livewire\Portfolios\ShowPortfolioDetailsPage;


Route::get('/lang/{lang}',function($lang){

       
    if(array_key_exists($lang,config('app.support_langs')))
    {
        session()->put('lang',$lang);
    }

    app()->setLocale(session('lang'));
    return redirect()->back();

})->middleware('langSwicher')->name('lang-swicher');


Route::get('/', ShowHomePage::class)->name('home');
Route::get('/about', ShowAboutMePage::class)->name('about');
Route::get('/services', ShowAllServicesPage::class)->name('services');
Route::get('/portfolio', ShowPortfoliosPage::class)->name('portfolios');
Route::get('/portfolios-details/{slug}', ShowPortfolioDetailsPage::class)->name('portfolios-details');
Route::get('/blog', ShowBlogPage::class)->name('blogs');
Route::get('/blog-details/{slug}', ShowBlogDetailsPage::class)->name('blog-detilas');

Route::get('/contact-us', ShowContactUSPage::class)->name('contact-us');