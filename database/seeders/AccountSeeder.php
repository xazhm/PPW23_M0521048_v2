<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    public function run()
    {
        $accounts = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
                'username' => 'johndoe',
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
                'password' => Hash::make('password'),
                'username' => 'janedoe',
            ],
            // Tambahkan data akun lainnya sesuai kebutuhan
        ];

foreach ($accounts as $account) {
    \App\Models\Account::create($account);
}

    }
}