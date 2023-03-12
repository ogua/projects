<?php

use App\Http\Controllers\Webcontroller;
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

    return Redirect()->route('webhome');

});


Route::group(['prefix'=> ''], function(){

  Route::get('/home-welcome', [Webcontroller::class, 'home'])->name('webhome');

  Route::get('/about-us', [Webcontroller::class, 'about'])->name('bio');


  Route::get('/contact-us', [Webcontroller::class, 'contact'])->name('contactus');


  Route::get('/photos-of-stella-jomo', [Webcontroller::class, 'gallary'])->name('gallary');

  Route::get('/audio', [Webcontroller::class, 'audio'])->name('audio');

  Route::get('/shop', [Webcontroller::class, 'shop'])->name('shop');

  Route::get('/feeds', [Webcontroller::class, 'feeds'])->name('feeds');

  Route::get('/eventinfo/{id}', [Webcontroller::class, 'eventid'])->name('eventid');

  Route::get('/events', [Webcontroller::class, 'events'])->name('events');

  Route::get('/sitemap.xml', [Webcontroller::class, 'sitemap'])->name('events');




});


Route::group(['prefix'=> 'stellaadmin', 'middleware' => 'auth'], function(){

  Route::get('/dashboard', [Webcontroller::class, 'dashboard'])->name('dashboard');

  Route::get('/add-post', [Webcontroller::class, 'add_post'])->name('add_post');

  Route::post('/save-post', [Webcontroller::class, 'save_post'])->name('save_post');


  Route::get('/all-post', [Webcontroller::class, 'all_post'])->name('all_post');


  Route::get('/edit-post/{id}', [Webcontroller::class, 'edit_post'])->name('edit_post');

  Route::get('/delete-post/{id}', [Webcontroller::class, 'delete_post'])->name('delete_post');


  Route::get('/contacts', [Webcontroller::class, 'contacts'])->name('contacts');

  Route::get('/add-user', [Webcontroller::class, 'add_user'])->name('add-user');

   Route::get('/all-user', [Webcontroller::class, 'all_user'])->name('all-user');

  

});

//Auth::routes();


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
