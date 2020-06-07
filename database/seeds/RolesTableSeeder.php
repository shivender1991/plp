<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
			[
			
				'roleName'=>"Admin",
				'instituteId'=>0,
				'status'=>0,
				'created_by'=>1,
				'updated_by'=>1
			],
			[
			
				'roleName'=>"Deapartment1",
				'instituteId'=>0,
				'status'=>0,
				'created_by'=>1,
				'updated_by'=>1
			],
			[
			
				'roleName'=>"Manager2",
				'instituteId'=>0,
				'status'=>0,
				'created_by'=>1,
				'updated_by'=>1
			],
			[
			
				'roleName'=>"Deapartment3",
				'instituteId'=>0,
				'status'=>0,
				'created_by'=>1,
				'updated_by'=>1
			],
			[
			
				'roleName'=>"Manager4",
				'instituteId'=>0,
				'status'=>0,
				'created_by'=>1,
				'updated_by'=>1
			]
		]);
    }
}
