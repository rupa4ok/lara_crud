<?php

use Illuminate\Http\Request;

Route::resource('tasks', 'TaskController', [
    'except' => ['create', 'edit', 'show']
    ]);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
