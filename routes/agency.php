<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('agency')->user();

    //dd($users);

    return view('agency.home');
})->name('home');

