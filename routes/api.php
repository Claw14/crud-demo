<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/students', function () {
    $studentController = new StudentController();
    return $studentController->index();
});

Route::post('/students/store', function (Request $request) {
    $studentController = new StudentController();
    return $studentController->store($request);
});

Route::post('/students/show', function (Request $request) {
    $studentController = new StudentController();
    return $studentController->show($request->id);
});

Route::post('/students/update', function (Request $request) {
    $studentController = new StudentController();
    return $studentController->update($request, $request->id);
});

Route::post('/students/destroy', function (Request $request) {
    $studentController = new StudentController();
    return $studentController->destroy($request->id);
});

Route::apiResource('students', StudentController::class);