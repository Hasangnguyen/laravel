<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SumController;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/sumAB',[SumController::class,"sumAB"]);

Route::group(['prefix' => 'tutorial'], function() {
    Route::get('/aws', function() {
        echo "aws tutorial";
    });

    Route::get('/jira', function() {
        echo "jira tutorial";
    });

    Route::get('/testng', function() {
        echo "testng tutorial";
    });
});
//phương thức resource
use App\Http\Controllers\PostController;
Route::resource('/post', PostController::class);
// Route::get('post',[PostController::class,"index"]);

///router cho form
use App\Http\Controllers\signupController;

Route::get('/signup', [signupController::class, 'index']);
Route::post('/signup', [signupController::class, 'displayInfor']);