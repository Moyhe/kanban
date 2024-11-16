<?php

use App\Http\Controllers\MemeberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('members', MemeberController::class)->names([
    'index' => 'members.index',
    'store' => 'members.store',
    'show' => 'members.show',
    'update' => 'members.update',
    'destroy' => 'members.delete',
]);
