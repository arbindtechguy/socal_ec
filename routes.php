<?php
require_once('services/route.php');

Route::get('/', 'Auction@index');
Route::get('/index', 'Auction@query');
Route::get('/post', 'Auction@post');
Route::get('/item', 'Item@index');
Route::get('/message', 'Message@index');
Route::get('/login', 'Login@index');
Route::get('/register', 'Register@index');
Route::get('/createuser', 'Register@regist');
Route::get('/profile', 'Profile@index');
Route::get('/user_profile', 'Profile@userProfile');
Route::get('/logout', 'Login@logout');
