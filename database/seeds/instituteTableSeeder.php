<?php

use Illuminate\Database\Seeder;

class instituteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pact_institute')->insert([
            'name' => Str::random(10),
            'code' => Str::random(10),
            'addressId' => Str::random(10),
            'instituteTypeId' => Int::random(8),
            'status' => 0,
            'createdBy' => 1
        ]);
    }
}
