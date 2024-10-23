<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
});


$entities = ['vender', 'client', 'user', 'machine', 'gst','element','row_item'];

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




$entities = ['quotation','project', 'element_in_project','po','po_item'];

foreach ($entities as $entity) {
    Route::get("/transaction/{$entity}-list", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.list");

    Route::get("/transaction/{$entity}-add", function () use ($entity) {
        return view("pages.{$entity}.add");
    })->name("{$entity}.add");

    Route::post("/transaction/{$entity}-add", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.add.post");

    Route::get("/transaction/{$entity}-edit", function () use ($entity) {
        return view("pages.{$entity}.edit");
    })->name("{$entity}.edit");

    Route::post("/transaction/{$entity}-edit", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.edit.post");

    Route::post("/transaction/{$entity}-delete", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.delete");
}

Route::get("/transaction/quotation-view", function () use ($entity) {
    return view("pages.quotation.view");
})->name("quotation.view");
Route::get("/transaction/po-convert", function () use ($entity) {
    return view("pages.po.convert");
})->name("po.convert");
