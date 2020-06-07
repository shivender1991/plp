<?php

use Illuminate\Database\Seeder;

class cardTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pact_cardTypes')->insert([
            'name' => Str::random(10),
            'type' => Str::random(10),
            'status' => 0,
            'createdBy' => 1
        ]);
    }
}
