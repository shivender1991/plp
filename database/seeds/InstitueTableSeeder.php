<?php

use Illuminate\Database\Seeder;

class InstitueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('institutes')->insert([
			[
				'name'=>"Maharshi dayanand institute",
				'code'=>1,
				'addressId'=>2,
				'instituteTypeId'=>1,
				'status'=>0,
				'created_by'=>1,
				'updated_by'=>1
			],
			[
				'name'=>"LNJP dayanand institute",
				'code'=>2,
				'addressId'=>3,
				'instituteTypeId'=>2,
				'status'=>0,
				'created_by'=>1,
				'updated_by'=>1
			],
			[
				'name'=>"RML dayanand institute",
				'code'=>2,
				'addressId'=>4,
				'instituteTypeId'=>3,
				'status'=>0,
				'created_by'=>1,
				'updated_by'=>1
			]
		]);
    }
}
