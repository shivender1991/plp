<?php

use Illuminate\Database\Seeder;

class cardStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pact_cardStatus')->insert([
            'statusName' => Str::random(10),
            'code' => Str::random(10),
            'status' => 0,
            'createdBy' => 1
        ]);
    }
}
