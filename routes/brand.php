<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('brand')->user();

    //dd($users);

    return view('brand.home');
})->name('home');

