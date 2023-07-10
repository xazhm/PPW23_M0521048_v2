<?php

namespace App\Http\Controllers\Auth;

use App\Models\Account;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    // protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:accounts'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'username' => ['required', 'string', 'max:255', 'unique:accounts'],
        ]);
    }

    protected function create(array $data)
    {
        return Account::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'username' => $data['username'],
            'role' => 'watcher', // Menambahkan role 'watcher' secara otomatis pada saat registrasi
        ]);
    }

    protected function registered(Request $request, $user)
    {
        return redirect('/view'); // Mengarahkan pengguna ke halaman /view setelah registrasi berhasil
    }
}