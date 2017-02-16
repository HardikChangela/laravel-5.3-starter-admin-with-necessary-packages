<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');

Route::get('profile','AdminAuth\ProfileController@index');
Route::post('profile/info','AdminAuth\ProfileController@info')->name('profile.info');
Route::post('profile/password','AdminAuth\ProfileController@password')->name('profile.password');


Route::get('home','AdminAuth\HomeController@index');
Route::resource('category','AdminAuth\CategoryController');

