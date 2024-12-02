<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
});
Route::get('/todo-list', function () {
    return view('pages.todo.list');
})->name("todo.list");
Route::get('/todo-add', function () {
    return view('pages.todo.add');
})->name("todo.add");
Route::get('/todo-edit', function () {
    return view('pages.todo.edit');
})->name("todo.edit");

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




$entities = ['enquiry','quotation','project', 'element_in_project','po','po_item','daily_entery'];

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
Route::get("/transaction/po-view", function () use ($entity) {
    return view("pages.po.view");
})->name("po.view");
Route::get("/transaction/daily_entery-manage", function () use ($entity) {
    return view("pages.daily_entery.manage");
})->name("daily_entery.manage");



$entities = ['in-ward','out-ward','stock','issue','received'];

foreach ($entities as $entity) {
    Route::get("/store/{$entity}-list", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.list");

    Route::get("/store/{$entity}-add", function () use ($entity) {
        return view("pages.{$entity}.add");
    })->name("{$entity}.add");

    Route::post("/store/{$entity}-add", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.add.post");

    Route::get("/store/{$entity}-edit", function () use ($entity) {
        return view("pages.{$entity}.edit");
    })->name("{$entity}.edit");

    Route::post("/store/{$entity}-edit", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.edit.post");

    Route::post("/store/{$entity}-delete", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.delete");
}
Route::get("/store/issue/element-list", function ()  {
    return view("pages.issue.element-list");
})->name("issue-elements.list");


$entities = ['purchase','sales','income','expences'];

foreach ($entities as $entity) {
    Route::get("/accounts/{$entity}-list", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.list");

    Route::get("/accounts/{$entity}-add", function () use ($entity) {
        return view("pages.{$entity}.add");
    })->name("{$entity}.add");

    Route::post("/accounts/{$entity}-add", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.add.post");

    Route::get("/accounts/{$entity}-edit", function () use ($entity) {
        return view("pages.{$entity}.edit");
    })->name("{$entity}.edit");

    Route::post("/accounts/{$entity}-edit", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.edit.post");

    Route::post("/accounts/{$entity}-delete", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.delete");
}

$entities = ['shift','leave-app','salary'];

foreach ($entities as $entity) {
    Route::get("/hr/{$entity}-list", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.list");

    Route::get("/hr/{$entity}-add", function () use ($entity) {
        return view("pages.{$entity}.add");
    })->name("{$entity}.add");

    Route::post("/hr/{$entity}-add", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.add.post");

    Route::get("/hr/{$entity}-edit", function () use ($entity) {
        return view("pages.{$entity}.edit");
    })->name("{$entity}.edit");

    Route::post("/hr/{$entity}-edit", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.edit.post");

    Route::post("/hr/{$entity}-delete", function () use ($entity) {
        return view("pages.{$entity}.list");
    })->name("{$entity}.delete");
}

Route::get("/tpm/schedule-task-list", function ()  {
    return view("pages.tpm.schedule.list");
})->name("schedule-task.list");

Route::get("/tpm/schedule-task-add", function ()  {
    return view("pages.tpm.schedule.add");
})->name("schedule-task.add");

Route::get("/tpm/pending-task-list", function ()  {
    return view("pages.tpm.task.pending");
})->name("pending-task.list");

Route::get("/tpm/completed-task-list", function ()  {
    return view("pages.tpm.task.completed");
})->name("completed-task.list");

