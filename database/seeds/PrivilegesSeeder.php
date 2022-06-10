<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrivilegesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('privileges')->insert(
            [
            'name'       => 'admin',
            'created_at' => date('Y-m-d H:i:s'),
            ],[
            'name'       => 'user',
            'created_at' => date('Y-m-d H:i:s'),
            ]);
    }
}
