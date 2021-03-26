<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'super_admin@app.com',
            'password' => bcrypt('h1s1gh1l1'),
            'roles_name' => 'owner',
            'status' => 'مفعل',
        ]);
    }
}
