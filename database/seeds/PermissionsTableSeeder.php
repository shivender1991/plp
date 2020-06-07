<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
			[
				'permissionName'=>"Add",
				'permissionUrl'=>'Add',
				'customData'=>'This is add data',
				'status' =>0,
				'created_by'=>1,
				'updated_by'=>1
			],
			[
				'permissionName'=>"Edit",
				'permissionUrl'=>'Edit',
				'customData'=>'This is edit data',
				'status' =>0,
				'created_by'=>1,
				'updated_by'=>1
			],
			[
				'permissionName'=>"Delete",
				'permissionUrl'=>'Delete',
				'customData'=>'This is Delete data',
				'status' =>0,
				'created_by'=>1,
				'updated_by'=>1
			]
		]);
    }
}
