<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('hello');
});

Route::get('/tasks9', function () {
   return view('hello');
});

Route::get('/tasks10', function () {
    $submissions = App\Models\User::all();
    return view('home', compact('submissions'));
});

Route::get('/table', function () {
    $users = App\Models\User::all();
    return view('table', compact('users'));
});

Route::get('/form', function () {
    return view('form');
});

Route::post('/submit-form', function (Illuminate\Http\Request $request) {
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users,email',
    ]);

    $user = new App\Models\User;
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->save();
    return redirect('/table');
});

Route::delete('/delete/{id}', function ($id) {
    $user = App\Models\User::findOrFail($id);
    $user->delete();
    return redirect('/table');
});

Route::get('/info/{id}', [UserController::class, 'info']);
Route::get('/update/{id}', [UserController::class, 'edit']);
Route::put('/update/{id}', [UserController::class, 'update']);

Route::get('/confirm-delete/{id}', [UserController::class, 'confirmDelete'])->name('confirm-delete');
Route::delete('/confirm-delete/{id}', [UserController::class, 'deleteConfirm'])->name('delete-confirm');