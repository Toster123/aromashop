<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use App\Role;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Role::get() as $role) {
            $userId = DB::table('users')->insertGetId([
                'name' => $role->title,
                'email' => $role->title . '@gmail.com',
                'verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
                'remember_token' => Str::random(10),
                'role_id' => $role->id,
            ]);
            DB::table('orders')->insert([
                'type' => 1,
                'user_id' => $userId,
            ]);
            DB::table('orders')->insert([
                'type' => 2,
                'user_id' => $userId,
            ]);
            DB::table('dialogs')->insert([
                'user_id' => $userId,
            ]);
        }
    }
}
