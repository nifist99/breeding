<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
            'id_privileges'     => 1,
            'name'              => 'admin',
            'status'            => 'active',
            'password'          => Hash::make('123456'),
            'email'             => 'admin@breeding.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'created_at'        => date('Y-m-d H:i:s'),
            ]);
    }
}
