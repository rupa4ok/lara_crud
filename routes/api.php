<?php

use Illuminate\Http\Request;

Route::resource('tasks', 'Api\TaskController', [
    'except' => ['create']
    ]);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
