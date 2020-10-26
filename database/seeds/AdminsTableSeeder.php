<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        DB::table('admins')->insert([
            'id' => 1,
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'type' => 'admin',
            'phone' => '03449050899',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
