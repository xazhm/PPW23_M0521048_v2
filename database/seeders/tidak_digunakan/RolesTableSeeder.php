<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
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
            'account_id' => Account::where('username', 'admin')->value('id'), // ID akun untuk role administrator
            'role_id' => Role::where('name', 'administrator')->value('id'), // ID role untuk administrator
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'account_id' => Account::where('username', 'watcher')->value('id'), // ID akun untuk role watcher
            'role_id' => Role::where('name', 'watcher')->value('id'), // ID role untuk watcher
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
}

}