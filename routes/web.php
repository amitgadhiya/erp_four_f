<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
});


$entities = ['vender', 'client', 'user', 'machine', 'gst'];

foreach ($entities as $entity) {
    Route::get("/master/{$entity}-list", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.list");

    Route::get("/master/{$entity}-add", function () use ($entity) {
        return view("pages.{$entity}.add");
    })->name("{$entity}.add");

    Route::post("/master/{$entity}-add", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.add.post");

    Route::get("/master/{$entity}-edit", function () use ($entity) {
        return view("pages.{$entity}.edit");
    })->name("{$entity}.edit");

    Route::post("/master/{$entity}-edit", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.edit.post");

    Route::post("/master/{$entity}-delete", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.delete");
}


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