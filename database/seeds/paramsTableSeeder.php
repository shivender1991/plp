<?php

use Illuminate\Database\Seeder;

class paramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pact_params')->insert([
            'name' => Str::random(10),
            'code' => Str::random(8),
            'value' => Str::random(10),
            'status' => 0,
            'createdBy' => 1
        ]);
    }
}
