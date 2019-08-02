<?php





Route::get('/', 'PagesController@home')->name('welcome');
Route::get('products', 'PagesController@products')->name('products');
Route::get('show/{slug}', 'PagesController@singleproduct')->name('singleproduct');
Route::get('notesbycat/{cat}', 'PagesController@notesbycat')->name('notesbycat');
Route::get('thankyou', 'PagesController@thankyou')->name('thankyou');

Route::post('addtocart/{note}', 'PagesController@cart')->name('cart');
Route::get('getcart', 'PagesController@getcart')->name('getcart');
Route::get('removefromcart/{id}', 'PagesController@removeFromCart')->name('removefromcart');
Route::get('clearcart', 'PagesController@clearCart')->name('clearcart');


Route::group(['prefix' => 'shop', 'middleware'=>'auth'], function () {
    Route::get('checkout', 'CheckoutController@checkout')->name('checkout');
    Route::post('stripecheckout', 'CheckoutController@stripecheckout')->name('stripecheckout');
});


Route::group(['prefix' => 'user', 'middleware'=>'auth'], function () {
    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::post('updateprofile', 'ProfileController@updateprofile')->name('updateprofile');
});


Route::group(['prefix' => 'notes', 'middleware'=>'auth'], function () {
    Route::get('addnotes', 'NoteController@addnotes')->name('addnotes');
    Route::post('storenotes', 'NoteController@storenotes')->name('storenotes');
});









Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
