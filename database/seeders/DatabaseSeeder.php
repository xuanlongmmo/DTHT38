<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_groups')->insert([
            ['group_name'=>'Super Admin', 'slug'=>'super-admin', 'created_at' => date("Y-m-d H:i:s")],
            ['group_name'=>'Admin', 'slug'=>'sub-admin', 'created_at' => date("Y-m-d H:i:s")],
            ['group_name'=>'Người dùng', 'slug'=>'normal-user', 'created_at' => date("Y-m-d H:i:s")],
        ]);

        DB::table('users')->insert([
            ['phone'=>'0989735559', 'email'=>'admin@gmail.com', 'username'=>'admin', 'password'=>'$2y$10$EXdJJlzJiD7k9Xfl3KAu9Oer7GEc4amUufH4wxxKwmc85Nz1w5V4m', 'group_id'=>'1', 'created_at' => date("Y-m-d H:i:s")],
            ['phone'=>'0123456789', 'email'=>'nv@gmail.com', 'username'=>'nv', 'password'=>'$2y$10$EXdJJlzJiD7k9Xfl3KAu9Oer7GEc4amUufH4wxxKwmc85Nz1w5V4m', 'group_id'=>'3', 'created_at' => date("Y-m-d H:i:s")],
        ]);
    }
}
