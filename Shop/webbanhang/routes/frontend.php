<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;

Route::controller(FrontendController::class)
-> group(function(){
    Route::get('/','index') -> name('home_index');
    Route::get('/san-pham','showProducts') -> name('frontend.products');
    Route::get('/tin-tuc','showNews') -> name('frontend.news');
    Route::get('/lien-he','showContact') -> name('frontend.contact');
    Route::post('/gui-lien-he','postContact') -> name('frontend.contact.send');
    Route::get('/cart','showCart') -> name('frontend.cart');
    Route::get('/check-out','showCheckout') -> name('frontend.checkout');
    Route::post('/complete','completeCheckout') -> name('frontend.complete');

    // Route::get('/login', 'showLogin')->name('frontend.login');
    // Route::post('/login', 'postLogin')->name('frontend.login.post');
    // Route::get('/register', 'showRegister')->name('frontend.register');
    // Route::post('/register', 'postRegister')->name('frontend.register.post');


    //http://127.0.0.1:8000/1-san-pham-1 => SEO google , bing , yahoo
    Route::get('/{id}-{href_param}.phtml','showDetail') -> name('frontend.detail');

    //http://127.0.0.1:8000/1-san-pham-1.html => SEO google , bing , yahoo
    Route::get('/tin-tuc/{id}-{href_param}.html','showPost') -> name('frontend.post');



});