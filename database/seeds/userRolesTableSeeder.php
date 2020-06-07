<?php

use Illuminate\Database\Seeder;

class userRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('userRoles')->insert([
            'userId' => 1,
            'roleId' => 1,
            'status' => 0,
            'createdBy' => 1,
        ]);
    }
}
