<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('influencer')->user();

    //dd($users);

    return view('influencer.home');
})->name('home');

