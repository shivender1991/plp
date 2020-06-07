<?php

use Illuminate\Database\Seeder;

class paymentStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pact_paymentStatus')->insert([
            'statusName' => Str::random(10),
            'code' => Str::random(10),
            'status' => 0,
            'createdBy' => 1
        ]);
    }
}
