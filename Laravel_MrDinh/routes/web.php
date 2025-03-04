<?php

// use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SumController;

// Route::get('/', function () {
//     return view('welcome');
// });
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

//
use App\Http\Controllers\ApiController;

Route::get('/FormApi', [ApiController::class, 'getData']);
//
use App\Http\Controllers\ProductController;		
Route::resource('products', ProductController::class);

//
use App\Http\Controllers\PageController;
Route::get('index', [PageController::class, 'index'])->name('trang-chu');
//
use App\Http\Controllers\NewController;
Route::get('hehe', [NewController::class, 'index']);
//
// Thực hiện tạo table trong Database
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

Route::get('/create-products-table', function () {
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description')->nullable();
        $table->decimal('price', 10, 2);
        $table->integer('stock')->default(0);
        $table->timestamps();
    });

    return "Bảng products đã được tạo thành công!";
});

use App\Http\Controllers\DatabaseController;
Route::get('/database', [DatabaseController::class, 'createTables']);
