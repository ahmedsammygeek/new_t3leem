<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Board\HomeController;
use App\Http\Controllers\Board\AdminController;
use App\Http\Controllers\Board\UniversityController;

Route::get('/test', [HomeController::class , 'test']);

Route::group(['prefix' => 'Board' , 'as' => 'board.'  , 'middleware' => 'auth' ] , function() {
    
    Route::get('/', [HomeController::class , 'index'] )->name('home');

    Route::resource('admins', AdminController::class);
    Route::resource('universities', UniversityController::class);

    // Route::get('/login', function(){
    //     return view('board.login');
    // })->name('login');

    Route::get('/users', function(){
        return view('board.users.index');
    })->name('users.index');

    Route::get('/users/1', function(){
        return view('board.users.show');
    })->name('users.show');

    Route::get('/users/1/notifications', function(){
        return view('board.users.notifications');
    })->name('users.notifications');

    Route::get('/users/1/courses', function(){
        return view('board.users.courses');
    })->name('users.courses');

    Route::get('/users/1/transactions', function(){
        return view('board.users.transactions');
    })->name('users.transactions');

    Route::get('/users/1/installments', function(){
        return view('board.users.installments');
    })->name('users.installments');

    Route::get('/users/1/courses_requests', function(){
        return view('board.users.courses_requests');
    })->name('users.courses_requests');

    Route::get('/users/1/library', function(){
        return view('board.users.library');
    })->name('users.library');
    Route::get('/users/1/actions', function(){
        return view('board.users.actions');
    })->name('users.actions');
});




Route::get('/', function () {
    return view('welcome');
});



require __DIR__.'/auth.php';
