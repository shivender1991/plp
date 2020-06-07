<?php

use Illuminate\Database\Seeder;

class orderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pact_order')->insert([
            'orderNumber' => Str::random(10),
            'orderDate' => date('Y-m-d'),
            'deliveryDate' => date('Y-m-d'),
            'instituteId' => Int::random(10),
            'orderStatusId' => Int::random(2),
            'paymentId' => Int::random(2),
            'deliveryStatusId' => Int::random(2),
            'numberofCards' => Int::random(2),
            'Instructions' => Str::random(100),
            'customData' => Str::random(100),
            'cardTypeId' => 1,
            'createdBy' => 1
        ]);
    }
}
