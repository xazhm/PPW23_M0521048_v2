<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Account;

// Rute yang dapat diakses tanpa login
Route::get('/', function () {
    return view('hello');
});

Route::get('/tasks9', function () {
    return view('hello');
});

Route::get('/auth/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/auth/register', [RegisterController::class, 'register']);

Route::get('/auth/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/auth/login', [LoginController::class, 'login']);


// Rute yang memerlukan login
Route::middleware(['auth:web'])->group(function () {
    
    // Rute untuk role administrator
    Route::middleware(['can:access-admin'])->group(function () {
        Route::get('/table', function () {
            $users = User::all();
            return view('table', compact('users'));
        });

        Route::get('/form', function () {
            return view('form');
        });

        Route::post('/submit-form', [UserController::class, 'store']);

        Route::post('/submit-form', function (Illuminate\Http\Request $request) {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users,email',
            ]);

            $user = new User;
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->save();
            return redirect('/table');
        });

        Route::delete('/delete/{id}', function ($id) {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect('/table');
        });

        Route::get('/info/{id}', [UserController::class, 'info']);
        Route::get('/update/{id}', [UserController::class, 'edit']);
        Route::put('/update/{id}', [UserController::class, 'update']);

        Route::get('/confirm-delete/{id}', [UserController::class, 'confirmDelete'])->name('confirm-delete');
        Route::delete('/confirm-delete/{id}', [UserController::class, 'deleteConfirm'])->name('delete-confirm');
        
        Route::get('/home', function () {
            $submissions = User::latest()->take(1)->get();
            return view('home', compact('submissions'));
        })->name('home');
        
    });

    // Rute untuk role watcher
    Route::middleware(['can:access-watcher'])->group(function () {
        Route::get('/view', [UserController::class, 'view']);
    });
});

// Rute autentikasi
Auth::routes();