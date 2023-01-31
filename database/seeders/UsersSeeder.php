<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'admin' => true,
            'name' => 'Admin',
            'email' => 'admin123@admin.com',
            'password' => bcrypt('admin123')
        ]);
    }
}
