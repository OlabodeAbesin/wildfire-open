<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/instagram', 'Instagram\InstagramController@index')->name('home');


Route::get('twitterUserTimeLine', 'Twitter\TwitterController@twitterUserTimeLine');
Route::get('tweet', 'Twitter\TwitterController@gettweet');
Route::get('myinfo', 'Twitter\TwitterController@getusers');
Route::get('list', 'Twitter\TwitterController@getlists');
Route::get('testtweet', 'Twitter\TwitterController@testtweet');
Route::get('search', 'Twitter\TwitterController@userSearch');
Route::get('Dm', 'Twitter\TwitterController@sendDm');
Route::get('me', 'Twitter\TwitterController@me');
Route::get('mymessages', 'Twitter\TwitterController@mymessages');
Route::post('tweet', ['as'=>'post.tweet','uses'=>'Twitter\TwitterController@tweet']);


// Route::get('/', 'AppController@index');

// Route::get('/search', 'AppController@search');

Route::get('/instagram', 'Instagram\InstagramController@redirectToInstagramProvider');

Route::get('/instagram/callback', 'Instagram\InstagramController@handleProviderInstagramCallback');




Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'brand'], function () {
  Route::get('/login', 'BrandAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'BrandAuth\LoginController@login');
  Route::post('/logout', 'BrandAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'BrandAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'BrandAuth\RegisterController@register');

  Route::post('/password/email', 'BrandAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'BrandAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'BrandAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'BrandAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'agency'], function () {
  Route::get('/login', 'AgencyAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AgencyAuth\LoginController@login');
  Route::post('/logout', 'AgencyAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AgencyAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AgencyAuth\RegisterController@register');

  Route::post('/password/email', 'AgencyAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AgencyAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AgencyAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AgencyAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'influencer'], function () {
  Route::get('/login', 'InfluencerAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'InfluencerAuth\LoginController@login');
  Route::post('/logout', 'InfluencerAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'InfluencerAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'InfluencerAuth\RegisterController@register');

  Route::post('/password/email', 'InfluencerAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'InfluencerAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'InfluencerAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'InfluencerAuth\ResetPasswordController@showResetForm');
});
