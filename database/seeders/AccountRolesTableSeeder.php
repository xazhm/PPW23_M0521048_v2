<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Account;
use App\Models\Role;

class AccountRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Hapus data existing di tabel account_role jika diperlukan
        // DB::table('account_role')->truncate();

        // Tambahkan data roles ke tabel account_role
        DB::table('account_role')->insert([
            [
                'account_id' => 1, // ID akun untuk role administrator
                'role_id' => 1, // ID role untuk administrator
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'account_id' => 2, // ID akun untuk role watcher
                'role_id' => 2, // ID role untuk watcher
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}