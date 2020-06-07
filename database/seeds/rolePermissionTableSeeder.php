<?php

use Illuminate\Database\Seeder;

class rolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pact_rolePermission')->insert([
            'roleId' => 1,
            'permissionId' => 1,
            'status' => 0,
            'createdBy' => 1,
        ]);
    }
}
