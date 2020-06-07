<?php

use Illuminate\Database\Seeder;

class orderDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pact_orderDetails')->insert([
            'orderid' => Int::random(10),
            'cardDetails' => Str::random(10),
            'cardStatusId' => Int::random(2),
            'createdBy' => 1,
        ]);
    }
}
