<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
});


Route::get('/master/user-list', function () {
    return view('pages.user.list');
});
Route::get('/master/user-add', function () {
    return view('pages.user.add');
});
Route::post('/master/user-add', function () {
    return view('pages.user.list');
});
Route::get('/master/user-edit', function () {
    return view('pages.user.edit');
});
Route::post('/master/user-edit', function () {
    return view('pages.user.list');
});


Route::get('/master/client-list', function () {
    return view('pages.client.list');
});
Route::get('/master/client-add', function () {
    return view('pages.client.add');
});
Route::post('/master/client-add', function () {
    return view('pages.client.list');
});
Route::get('/master/client-edit', function () {
    return view('pages.client.edit');
});
Route::post('/master/client-edit', function () {
    return view('pages.client.list');
});


Route::get('/master/vender-list', function () {
    return view('pages.vender.list');
});
Route::get('/master/vender-add', function () {
    return view('pages.vender.add');
});
Route::post('/master/vender-add', function () {
    return view('pages.vender.list');
});
Route::get('/master/vender-edit', function () {
    return view('pages.vender.edit');
});
Route::post('/master/vender-edit', function () {
    return view('pages.vender.list');
});


Route::get('/master/gst-list', function () {
    return view('pages.gst.list');
});
Route::get('/master/gst-add', function () {
    return view('pages.gst.add');
});
Route::post('/master/gst-add', function () {
    return view('pages.gst.list');
});
Route::get('/master/gst-edit', function () {
    return view('pages.gst.edit');
});
Route::post('/master/gst-edit', function () {
    return view('pages.gst.list');
});