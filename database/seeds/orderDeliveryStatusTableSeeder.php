<?php

use Illuminate\Database\Seeder;

class orderDeliveryStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pact_orderDeliveryStatus')->insert([
            'orderid' => Int::random(10),
            'deliveryStatusId' => Int::random(10),
            'createdBy' => 1,
        ]);
    }
}
